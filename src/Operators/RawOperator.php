<?php

namespace Felix\TwitterStream\Operators;

use Felix\TwitterStream\Support\Flags;

class RawOperator implements Operator
{
    public function __construct(public Flags $flags, public string $value)
    {
    }

    public function compile(): string
    {
        $join = $this->flags->has(Operator::OR_FLAG) ? 'OR ' : '';

        return $join . $this->value;
    }
}
