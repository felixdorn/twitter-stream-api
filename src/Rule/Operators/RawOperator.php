<?php

namespace Felix\TwitterStream\Rule\Operators;

/** @internal */
class RawOperator extends Operator
{
    /** @param scalar[] $raw */
    public function __construct(
        protected array $raw
    ) {
    }

    public function compile(): string
    {
        return implode(' ', $this->raw);
    }
}
