<?php

namespace Felix\TwitterStream\Contracts;

use Psr\Http\Message\ResponseInterface;

interface StreamManager
{
    public function stopListening(): self;

    public function createdAt(): int;

    public function timeElapsedInSeconds(): float|int;

    public function tweetsReceived(): int;

    public function response(): ResponseInterface;
}
