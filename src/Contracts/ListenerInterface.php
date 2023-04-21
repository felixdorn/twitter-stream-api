<?php

namespace Felix\TwitterStream\Contracts;

/**
 * Heavily based on salisfy/jsonstreamingparser, all credits go to them.
 *
 * @see https://github.com/salsify/jsonstreamingparser
 */
interface ListenerInterface
{
    public function startDocument(): void;

    public function endDocument(): void;

    public function startObject(): void;

    public function endObject(): void;

    public function startArray(): void;

    public function endArray(): void;

    public function key(string $key): void;

    /**
     * @param mixed $value the value as read from the parser, it may be a string, integer, boolean, etc
     */
    public function value($value): void;

    public function whitespace(string $whitespace): void;
}
