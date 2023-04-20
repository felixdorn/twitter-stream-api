<?php

namespace Felix\TwitterStream\Support;

/** @internal */
class Flags
{
    public function __construct(protected int $flags)
    {
    }

    public function has(int $flag): bool
    {
        return ($this->flags & $flag) === $flag;
    }

    public function toggle(int $flag): self
    {
        $this->flags ^= $flag;

        return $this;
    }

    public static function zero(): self
    {
        return new static(0);
    }
}
