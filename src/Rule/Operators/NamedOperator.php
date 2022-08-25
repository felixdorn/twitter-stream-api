<?php

namespace Felix\TwitterStream\Rule\Operators;

use Felix\TwitterStream\Support\Flag;

/** @internal */
class NamedOperator extends Operator
{
    /** @param string[] $values */
    public function __construct(
        protected int $flags,
        protected string $name,
        protected array $values,
    ) {
    }

    public function compile(): string
    {
        $join = match (true) {
            Flag::has($this->flags, self::OR_OPERATOR) => ' OR ',
            Flag::has($this->flags, self::AND_OPERATOR) => ' AND ',
            default => ' ',
        };
        $negation = Flag::has($this->flags, self::NOT_OPERATOR) ? '-' : '';
        $buffer   = array_reduce(
            $this->values,
            fn (string $_, string $value) => $_ . sprintf('%s%s%s:%s', $join, $negation, $this->name, $value),
            ''
        );

        if (count($this->values) === 1 && $join !== ' ') {
            return $buffer;
        }

        // remove the leading join character and return
        return substr($buffer, strlen($join));
    }
}
