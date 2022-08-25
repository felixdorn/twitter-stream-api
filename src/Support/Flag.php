<?php

namespace Felix\TwitterStream\Support;

/** @internal */
class Flag
{
    public static function has(int $flags, int $flag): bool
    {
        return ($flags & $flag) === $flag;
    }

    /** @param int[] $flag */
    public static function hasAny(int $flags, array $flag): bool
    {
        foreach ($flag as $f) {
            if (self::has($flags, $f)) {
                return true;
            }
        }

        return false;
    }
}
