<?php

namespace Felix\TwitterStream\Rule;

use Felix\TwitterStream\Exceptions\TwitterException;
use Felix\TwitterStream\Rule\Operators\GroupOperator;
use Felix\TwitterStream\Rule\Operators\NamedOperator;
use Felix\TwitterStream\Rule\Operators\Operator;
use Felix\TwitterStream\Rule\Operators\Operator as OperatorContract;
use Felix\TwitterStream\Rule\Operators\ParameterizedOperator;
use Felix\TwitterStream\Rule\Operators\RawOperator;
use Felix\TwitterStream\Support\Flag;
use Felix\TwitterStream\Support\Str;
use Psr\Http\Message\ResponseInterface;
use SplStack;

/**
 * @property RuleBuilder $and
 * @property RuleBuilder $or
 * @property RuleBuilder $not
 *
 * @method self sample(int $percent)
 * @method self pointRadius(string $longitude, string $latitude, string $radius)
 * @method self boundingBox(string $westLongitude, string $southLatitude, string $eastLongitude, string $northLatitude)
 * @method self notNullCast()
 * @method self has(string|array $properties)
 * @method self raw(string|array $property)
 * @method self query(string|array $query)
 */
class RuleBuilder extends _RuleBuilder
{
    // Be careful, the order matters here.
    protected const OPERATORS_FLAGS = [
        'or'     => OperatorContract::OR_OPERATOR,
        'and'    => OperatorContract::AND_OPERATOR,
        'is'     => OperatorContract::IS_OPERATOR,
        'has'    => OperatorContract::HAS_OPERATOR,
        'except' => OperatorContract::IS_OPERATOR | OperatorContract::NOT_OPERATOR,
        'not'    => OperatorContract::NOT_OPERATOR,
    ];

    public function __construct(
        public ?RuleManager $manager = null,
        public ?string $tag = null,
        /** @var SplStack<OperatorContract> $operators */
        public SplStack $operators = new SplStack()
    ) {
    }

    public function __get(string $name): self
    {
        match ($name) {
            'and' => $this->push(new RawOperator(['AND'])),
            'or'  => $this->push(new RawOperator(['OR'])),
            /* @see https://wiki.php.net/rfc/undefined_property_error_promotion */
            default => trigger_error('Undefined property: ' . static::class . '::$' . $name, PHP_MAJOR_VERSION === 8 ? E_USER_WARNING : E_USER_ERROR)
        };

        return $this;
    }

    public function push(OperatorContract $operator): self
    {
        $this->operators->push($operator);

        return $this;
    }

    /** @param mixed[] $arguments */
    public function __call(string $name, array $arguments): self
    {
        $flags     = 0;
        $arguments = self::flattenArgumentsAndQuoteStrings($arguments);

        foreach (self::OPERATORS_FLAGS as $flag => $id) {
            // if the name is the flag, skip, that's to handle calls like is([...]) and has([...])
            // if the flag (or, and, not....) is not found, skip
            if ($name === $flag || !str_starts_with(strtolower($name), $flag)) {
                continue;
            }

            $flags ^= $id;
            $name = substr($name, strlen($flag));
        }

        $name = Str::snake($name);

        if ($name === 'group') {
            return $this->group($arguments[0] ?? null, $flags);
        }

        if (Flag::hasAny($flags, [Operator::IS_OPERATOR, Operator::HAS_OPERATOR])) {
            // Methods like is, hasNot will be empty with the flags IS_OPERATOR, NOT_OPERATOR... set.
            // If that's the case, then it means the caller looks like x([...]) or y('...')
            // so we just pass in the normalized arguments.
            $arguments = $name === '' ? $arguments : [lcfirst($name)];

            return $this->push(new NamedOperator(
                $flags,
                Flag::has($flags, Operator::IS_OPERATOR) ? 'is' : 'has',
                $arguments,
            ));
        }

        return $this->push(match ($name) {
            // notNullCast will be transformed to null_cast with a NOT_OPERATOR flag
            // This means that calling $this->NullCast() or $this->null_cast() would work the same as $this->notNullCast().
            'null_cast'    => new RawOperator(['-is:nullcast']),
            'sample'       => new RawOperator(['sample:' . $arguments[0]]),
            'point_radius' => new ParameterizedOperator($flags, 'point_radius', $arguments),
            'bounding_box' => new ParameterizedOperator($flags, 'bounding_box', $arguments),
            'raw', 'query' => new RawOperator($arguments),
            // As the method is in camelCase, we need to lowercase the first letter after the 'is' or 'has'
            default => new NamedOperator($flags, lcfirst($name), $arguments)
        });
    }

    private static function flattenArgumentsAndQuoteStrings(array $array): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, self::flattenArgumentsAndQuoteStrings($value));
            } else {
                $result[$key] = Str::quote($value);
            }
        }

        return $result;
    }

    public function group(callable $builder, int $flags = 0): self
    {
        return $this->push(new GroupOperator($flags, $builder));
    }

    public function __toString(): string
    {
        return $this->compile();
    }

    public function compile(): string
    {
        // loop over all operatorss and build the query
        $query = '';

        while (!$this->operators->isEmpty()) {
            $compiled = $this->operators->pop()->compile();
            if (!str_starts_with($compiled, ' ')) {
                $compiled = ' ' . $compiled;
            }

            $query = $compiled . $query;
        }

        return trim($query);
    }

    public function save(): ?ResponseInterface
    {
        return $this->manager?->save($this->compile(), $this->tag);
    }

    /**
     * @codeCoverageIgnore Hard to test, not much to gain from testing. Skipping.
     */
    public function dd(): never
    {
        if (function_exists('dd')) {
            dd($this->compile());
        }

        var_dump($this->compile());
        exit;
    }

    public function validate(): array
    {
        return $this->manager?->validate($this->compile()) ?? throw new TwitterException('Manager not set in the rule builder. Are you using it correctly?');
    }
}
