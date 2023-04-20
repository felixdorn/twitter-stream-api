<?php

namespace Felix\TwitterStream\Exceptions;

use Psr\Http\Message\ResponseInterface;

class TwitterException extends \Exception
{
    public array $raw;

    public function __construct(string $message, array $raw = [])
    {
        parent::__construct($message);

        $this->raw = $raw;
    }

    public static function fromResponse(ResponseInterface $response): TwitterException
    {
        $decoded = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        // We hit the Authn/Authz service in front of Twitter's API.
        if (array_key_exists('status', $decoded)) {
            return (match ($decoded['status']) {
                429 => function () use ($response, $decoded) {
                    $reset = implode('', $response->getHeader('x-rate-limit-reset'));

                    if ($reset == '') {
                        $reset = 'unknown';
                    }

                    return new self('Too many requests (reset in: ' . $reset . ').', $decoded);
                },
                401     => fn () => new self('Unauthorized.', $decoded),
                default => fn () => new self('Should not happen: please open an issue at https://github.com/felixdorn/twitter-stream-api/issues (include the payload)', $decoded)
            })();
        }

        if (!array_key_exists('errors', $decoded) || count($decoded['errors']) < 1) {
            return new self('Should not happen: please open an issue at https://github.com/felixdorn/twitter-stream-api/issues (include the payload)', $decoded);
        }

        // Encoding to JSON here as $decoded['errors'][0] contains an
        // inconsistent object, in the sense that its properties may
        // change from one request to another.
        return new self(json_encode($decoded['errors'][0], JSON_THROW_ON_ERROR), $decoded);
    }

    public static function fromPayload(array $payload): TwitterException
    {
        if (array_key_exists('errors', $payload) && count($payload['errors']) > 0) {
            /* @phpstan-ignore-next-line */
            return new self(json_encode($payload['errors'][0]), $payload);
        }

        if (array_key_exists('status', $payload) && $payload['status'] === 429) {
            return new self('Too many requests (reset in: unknown).', $payload);
        }

        return new self(json_encode($payload, JSON_THROW_ON_ERROR), $payload);
    }
}
