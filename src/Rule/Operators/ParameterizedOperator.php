<?php

namespace Felix\TwitterStream\Rule\Operators;

use Felix\TwitterStream\Support\Flag;

/** @internal */
class ParameterizedOperator extends Operator
{
    /** @param scalar[] $values */
    public function __construct(
        protected int $flags,
        protected string $name,
        protected array $values = [],
    ) {
    }

    public function compile(): string
    {
        return sprintf('%s%s:[%s]',
            Flag::has($this->flags, self::NOT_OPERATOR) ? '-' : '',
            $this->name,
            implode(' ', $this->values),
        );
    }
}
