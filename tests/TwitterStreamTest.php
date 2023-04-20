<?php

use Felix\TwitterStream\Support\Clock;
use Felix\TwitterStream\TwitterConnection;
use Felix\TwitterStream\TwitterResponse;
use Felix\TwitterStream\TwitterStream;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\Response;

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

    expect($url)->toBe(str_replace(',', '%2C', $expected));
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
        'url'              => '?backfill_minutes=4',
    ],
    [
        'backfill_minutes' => 0,
        'fields'           => [
            'media' => 'url',
        ],
        'expansions' => [],
        'url'        => '?media.fields=url',
    ],
    [
        'backfill_minutes' => 0,
        'fields'           => [
            'media' => ['url', 'name'],
        ],
        'expansions' => [],
        'url'        => '?media.fields=url,name',
    ],
    [
        'backfill_minutes' => 0,
        'fields'           => [],
        'expansions'       => ['media.url'],
        'url'              => '?expansions=media.url',
    ],
    [
        'backfill_minutes' => 0,
        'fields'           => [],
        'expansions'       => ['media.url', 'user.name'],
        'url'              => '?expansions=media.url,user.name',
    ],
]);

it('can return the time elapsed in seconds', function () {
    $stream = new class() extends Felix\TwitterStream\TwitterStream {
        public function __construct()
        {
            $this->createdAt = 10;
        }

        public function endpoint(): string
        {
            return '';
        }
    };

    Clock::freeze(15, fn () => expect($stream->timeElapsedInSeconds())->toBe(5));
});

it('can set a buffer size', function () {
    $stream = new class() extends Felix\TwitterStream\TwitterStream {
        public function endpoint(): string
        {
            return '';
        }

        public function getBufferSize()
        {
            return $this->bufferSize;
        }
    };

    expect($stream->getBufferSize())->toBe(85); // default
    $stream->withBufferSize(1000);
    expect($stream->getBufferSize())->toBe(1000);
});

it('can set a tweet limit', function () {
    $stream = new class() extends Felix\TwitterStream\TwitterStream {
        public function endpoint(): string
        {
            return '';
        }

        public function getTweetLimit()
        {
            return $this->tweetLimit;
        }
    };

    expect($stream->getTweetLimit())->toBe(PHP_INT_MAX); // default
    $stream->withTweetLimit(1000);
    expect($stream->getTweetLimit())->toBe(1000);
});

function useStream(): array
{
    $stream = (new HttpFactory())->createStream(json_encode([
        ['data' => ['text' => 1]],
        ['data' => ['text' => 2]],
        ['data' => ['text' => 3]],
        ['data' => ['text' => 4]],
        ['data' => ['text' => 5]],
        ['data' => ['text' => 6]],
        ['data' => ['text' => 7]],
        ['data' => ['text' => 8]],
        ['data' => ['text' => 9]],
        ['data' => ['text' => 10]],
        ['data' => ['text' => 11]],
    ]));

    $body = mock($stream)
        ->makePartial()
        ->shouldReceive('getMetadata')->with('wrapper_type')->andReturn('http')
        ->getMock();
    $connection = mock(TwitterConnection::class)
        ->shouldReceive('request')
        ->withArgs(['GET', 'https://url', ['stream' => true]])
        ->andReturn($response = TwitterResponse::fromPsrResponse(
            new Response(200, [], $body)
        ))
        ->getMock();

    $stream = new class() extends TwitterStream {
        public function endpoint(): string
        {
            return 'https://url';
        }
    };

    return [$stream->withTweetLimit(10), $connection, $response, $body];
}

it('can listen to a stream', function () {
    [$stream, $connection, $response, $body] = useStream();

    expect($stream->tweetsReceived())->toBe(0);

    $i = 0;
    Clock::queue([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], function () use ($stream, $connection, $response, $body, &$i) {
        return $stream->listen($connection, function (object $tweet, TwitterStream $stream) use ($response, $body, &$i) {
            $i++;

            // tweet limit is set to 10 in useStream(), so this should be called 10 times
            expect($i)->not->toBe(11);

            expect($tweet)->data->text->toBe($i);
            expect($stream)
                ->createdAt()->toBe(0)
                ->timeElapsedInSeconds()->toBe($i)
                ->tweetsReceived()->toBe($i);
        });
    });

    expect(Clock::now())->toBe(11);
});
