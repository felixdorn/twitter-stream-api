<?php

namespace Felix\TwitterStream;

use Felix\TwitterStream\Exceptions\TwitterException;
use Felix\TwitterStream\Operators\BoundingBoxOperator;
use Felix\TwitterStream\Operators\CountOperator;
use Felix\TwitterStream\Operators\GroupOperator;
use Felix\TwitterStream\Operators\KeyValueOperator;
use Felix\TwitterStream\Operators\NotNullCastOperator;
use Felix\TwitterStream\Operators\Operator;
use Felix\TwitterStream\Operators\PointRadiusOperator;
use Felix\TwitterStream\Operators\RawOperator;
use Felix\TwitterStream\Operators\SampleOperator;
use Felix\TwitterStream\Support\Flags;
use Felix\TwitterStream\Support\Str;
use Psr\Http\Message\ResponseInterface;

/**
 * @property RuleBuilder $and
 * @property RuleBuilder $or
 *
 * @method self sample(int $percentage)
 * @method self pointRadius(string $longitude, string $latitude, string $radius)
 * @method self orPointRadius(string $longitude, string $latitude, string $radius)
 * @method self andPointRadius(string $longitude, string $latitude, string $radius)
 * @method self notPointRadius(string $longitude, string $latitude, string $radius)
 * @method self boundingBox(string $westLongitude, string $southLatitude, string $eastLongitude, string $northLatitude)
 * @method self orBoundingBox(string $westLongitude, string $southLatitude, string $eastLongitude, string $northLatitude)
 * @method self andBoundingBox(string $westLongitude, string $southLatitude, string $eastLongitude, string $northLatitude)
 * @method self notBoundingBox(string $westLongitude, string $southLatitude, string $eastLongitude, string $northLatitude)
 * @method self orRaw(string|array $property)
 * @method self andRaw(string|array $property)
 * @method self andNotNullcast()
 * @method self orNotNullcast()
 * @method self group(callable $callable)
 * @method self orGroup(callable $callable)
 * @method self andGroup(callable $callable)
 */
class RuleBuilder extends _RuleBuilder
{
    public const KEY_VALUE_OPERATORS = [
        'from'                 => 'from',
        'to'                   => 'to',
        'url'                  => 'url',
        'retweets_of'          => 'retweets_of',
        'context'              => 'context',
        'entity'               => 'entity',
        'conversation_id'      => 'conversation_id',
        'bio'                  => 'bio',
        'bio_name'             => 'bio_name',
        'bio_location'         => 'bio_location',
        'place'                => 'place',
        'place_country'        => 'place_country',
        'lang'                 => 'lang',
        'url_title'            => 'url_title',
        'url_description'      => 'url_description',
        'url_contains'         => 'url_contains',
        'source'               => 'source',
        'in_reply_to_tweet_id' => 'in_reply_to_tweet_id',
        'retweets_of_tweet_id' => 'retweets_of_tweet_id',
    ];
    public const IS_OPERATORS = [
        'retweet'  => 'retweet',
        'reply'    => 'reply',
        'quote'    => 'quote',
        'verified' => 'verified',
    ];
    public const HAS_OPERATORS = [
        'hashtags' => 'hashtags',
        'cashtags' => 'cashtags',
        'links'    => 'links',
        'mentions' => 'mentions',
        'media'    => 'media',
        'images'   => 'images',
        'videos'   => 'videos',
        'geo'      => 'geo',
    ];
    public const COUNT_OPERATOR = [
        'followers' => 'followers',
        'tweets'    => 'tweets',
        'following' => 'following',
        'listed'    => 'listed',
    ];
    public const CUSTOM_OPERATORS = [
        'raw'          => RawOperator::class,
        'sample'       => SampleOperator::class,
        'null_cast'    => NotNullCastOperator::class,
        'bounding_box' => BoundingBoxOperator::class,
        'point_radius' => PointRadiusOperator::class,
        'group'        => GroupOperator::class,
    ];

    /** @param \SplStack<Operator> $operators */
    public function __construct(
        public ?RuleManager $manager = null,
        public ?string $tag = null,
        public \SplStack $operators = new \SplStack()
    ) {
    }

    public function __get(string $name): self
    {
        match ($name) {
            // skip it because everything is an AND unless specified
            'and'   => null,
            'or'    => $this->push(new RawOperator(Flags::zero(), 'OR')),
            default => trigger_error('Undefined property: ' . static::class . '::$' . $name, PHP_MAJOR_VERSION === 8 ? E_USER_WARNING : E_USER_ERROR)
        };

        return $this;
    }

    public function push(Operator $operator): self
    {
        $this->operators->push($operator);

        return $this;
    }

    public function __call(string $methodName, array $arguments): self
    {
        [$name, $flags] = $this->getNameAndFlags($methodName);

        if (array_key_exists($name, self::CUSTOM_OPERATORS)) {
            return $this->push(new (self::CUSTOM_OPERATORS[$name])($flags, ...$arguments));
        }

        return $this->push(match (true) {
            array_key_exists($name, self::KEY_VALUE_OPERATORS) => new KeyValueOperator($flags, $name, ...$arguments),

            $flags->has(Operator::IS_FLAG) && array_key_exists($name, self::IS_OPERATORS) => new KeyValueOperator($flags, 'is', $name),
            $flags->has(Operator::IS_FLAG) && $name === ''                                => new KeyValueOperator($flags, 'is', ...$arguments),

            $flags->has(Operator::HAS_FLAG) && array_key_exists($name, self::HAS_OPERATORS) => new KeyValueOperator($flags, 'has', $name),
            $flags->has(Operator::HAS_FLAG) && $name === ''                                 => new KeyValueOperator($flags, 'has', ...$arguments),

            $flags->has(Operator::COUNT_FLAG) && array_key_exists($name, self::COUNT_OPERATOR) => new CountOperator($flags, $name, ...$arguments),
            true                                                                               => throw new \BadMethodCallException(sprintf('Call to undefined method %s::%s()', static::class, $methodName))
        });
    }

    private function getNameAndFlags(string $name): array
    {
        $name  = Str::snake($name);
        $flags = new Flags(0);

        foreach (Operator::OPERATORS as $operator => $flag) {
            if (str_starts_with($name, $operator)) {
                $flags->toggle($flag);
                $name = substr($name, strlen($operator . '_'));
            } elseif (str_ends_with($name, $operator)) {
                $flags->toggle($flag);
                $name = substr($name, 0, -strlen($operator . '_'));
            }
        }

        return [$name, $flags];
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
            $query = $this->operators->pop()->compile() . ' ' . $query;
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

    public function build(): Rule
    {
        return new Rule($this->compile(), $this->tag);
    }
}
