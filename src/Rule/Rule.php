<?php

namespace Felix\TwitterStream\Rule;

class Rule
{
    public function __construct(
        public ?string $value,
        public ?string $tag,
        public ?string $id = null,
    ) {
    }
}
