<?php

namespace Felix\TwitterStream\Exceptions;

use Psr\Http\Message\ResponseInterface;

class TwitterException extends \Exception
{
    protected function __construct(string $message, ...$args)
    {
        parent::__construct($message);
    }

    public static function fromResponse(ResponseInterface $response): TwitterException
    {
        if ($response->getStatusCode() === 429) {
            return self::handleTooManyRequests($response);
        }

        try {
            $body = json_decode($response->getBody()->getContents(), true, 512, flags: JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            return TwitterException::sprintf(
                'Twitter response was not valid JSON: %s (error while parsing: %s)',
                $response->getBody()->getContents(),
                $e->getMessage(),
            );
        }

        if (self::errorIsFromTheAuthAuthService($body)) {
            return self::handleAuthAuthErrors($response, $body);
        }

        // The error doesn't have the expected structure (['errors' => [...]])
        if (!array_key_exists('errors', $body) || count($body['errors']) < 1) {
            return TwitterException::sprintf(
                'Twitter returns an error unknown to us, please open an issue at https://github.com/felixdorn/twitter-stream-api/issues with the following: ' .
                json_encode(['payload' => $body, 'status' => $response->getStatusCode()]),
            );
        }

        // Encoding to JSON here as $decoded['errors'][0] contains an
        // inconsistent object, in the sense that its properties may
        // change from one request to another.
        return new self(json_encode($body['errors'][0], JSON_THROW_ON_ERROR));
    }

    private static function handleTooManyRequests(ResponseInterface $response): TwitterException
    {
        $reset = implode('', $response->getHeader('x-rate-limit-reset'));

        if ($reset == '') {
            $reset = 'unknown';
        }

        return TwitterException::sprintf('Too many requests (reset in: %s).', $reset);
    }

    public static function sprintf(string $message, ...$args): self
    {
        return new self(sprintf($message, ...$args));
    }

    private static function errorIsFromTheAuthAuthService(array $body): bool
    {
        return array_key_exists('status', $body);
    }

    private static function handleAuthAuthErrors(ResponseInterface $response, array $body): TwitterException
    {
        if ($body['status'] == 401 || $response->getStatusCode() == 401) {
            return TwitterException::sprintf('Unauthorized. (payload: %s)', json_encode($body));
        }

        return TwitterException::sprintf(
            'Twitter returned an error that we don\'t know about, please open an issue at https://github.com/felixdorn/twitter-stream-api/issues with the following:  %s',
            json_encode(['payload' => $body, 'status' => $response->getStatusCode()])
        );
    }
}
