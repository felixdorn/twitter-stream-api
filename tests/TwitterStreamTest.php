<?php

it('can build a URL', function (int $backfill, array $fields, array $expansions, string $expected) {
    $stream = new class() extends Felix\TwitterStream\TwitterStream {
        public function endpoint(): string
        {
            return '';
        }
    };

    $url = $stream
        ->backfill($backfill)
        ->fields($fields)
        ->expansions(...$expansions)
        ->toURL();

    expect($url)->toBe('?' . str_replace(',', '%2C', $expected));
})->with([
    [
        'backfill_minutes' => 0,
        'fields'           => [],
        'expansions'       => [],
        'url'              => '',
    ],
    [
        'backfill_minutes' => 4,
        'fields'           => [],
        'expansions'       => [],
        'url'              => 'backfill_minutes=4',
    ],
    [
        'backfill_minutes' => 0,
        'fields'           => [
            'media' => 'url'
        ],
        'expansions'       => [],
        'url'              => 'media.fields=url',
    ],
    [
        'backfill_minutes' => 0,
        'fields'           => [
            'media' => ['url', 'name']
        ],
        'expansions'       => [],
        'url'              => 'media.fields=url,name',
    ],
    [
        'backfill_minutes' => 0,
        'fields'           => [],
        'expansions'       => ['media.url'],
        'url'              => 'expansions=media.url',
    ],
    [
        'backfill_minutes' => 0,
        'fields'           => [],
        'expansions'       => ['media.url', 'user.name'],
        'url'              => 'expansions=media.url,user.name',
    ],
]);
