<?php

use Felix\TwitterStream\Exceptions\TwitterException;
use GuzzleHttp\Psr7\Response;

it('can not be instantiated', function () {
    new TwitterException();
})->throws(\Error::class);

it('can create an exception from a message', function () {
    $exception = TwitterException::sprintf('foo %s', 'bar');

    expect($exception)->getMessage()->toBe('foo bar');
});

it('can create an exception from a twitter error', function () {
    $exception = TwitterException::fromResponse(
        new Response(200, [], json_encode($response = [
            'errors' => [
                $error = [
                    'value' => 'h:m',
                    'details' => [
                        "Reference to invalid operator 'h' (at position 1).",
                        "Reference to invalid field 'h' (at position 1).",
                    ],
                    'title' => 'UnprocessableEntity',
                    'type' => 'https://api.twitter.com/2/problems/invalid-rules',
                ],
            ],
        ]))
    );

    expect($exception)->getMessage()->toBe(json_encode($error));
});

it('can handle 429s', function () {
    $exception = TwitterException::fromResponse(
        new Response(429, ['x-rate-limit-reset' => '1234567890'], '{"status": 429}')
    );

    expect($exception)
        ->getMessage()->toBe('Too many requests (reset in: 1234567890).');
});

it('can handle 429s without the rate limit reset header', function () {
    $exception = TwitterException::fromResponse(
        new Response(429, [], '{"status": 429}')
    );

    expect($exception)->getMessage()->toBe('Too many requests (reset in: unknown).');
});

it('can handle 429 with a status of 429 and an empty payload (see #23)', function () {
    $exception = TwitterException::fromResponse(
        new Response(429, [])
    );

    expect($exception)->getMessage()->toBe('Too many requests (reset in: unknown).');
});
