<?php

namespace Felix\TwitterStream\Contracts;

interface StreamManager
{
    public function stopListening(): self;

    public function createdAt(): int;

    public function timeElapsedInSeconds(): float|int;
}
