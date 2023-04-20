<?php

namespace Felix\TwitterStream\Exceptions;

/**
 * Heavily based on salisfy/jsonstreamingparser, all credits go to them.
 * @see https://github.com/salsify/jsonstreamingparser
 */
class ParsingException extends \Exception
{
    public function __construct(int $line, int $char, string $message)
    {
        parent::__construct(sprintf('Parsing error in [%d:%d]. %s', $line, $char, $message));
    }
}
