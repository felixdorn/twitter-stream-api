<?php

namespace Felix\TwitterStream\Exceptions;

use Psr\Http\Message\ResponseInterface;

class TwitterException extends \Exception
{
    private const PRETTY_PRINT_FLAGS = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;

    protected function __construct(string $message)
    {
        parent::__construct($message);
    }

    /**
     * @throws \JsonException
     */
    public static function fromResponse(ResponseInterface $response): TwitterException
    {
        if ($response->getStatusCode() == 429) {
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

        if ($response->getStatusCode() == 401) {
            return self::sprintf(
                'Unauthorized. Is your bearer token correct? (error: %s)',
                json_encode($body, self::PRETTY_PRINT_FLAGS)
            );
        }

        if (array_key_exists('title', $body) && array_key_exists('detail', $body)) {
            return self::handleTitleDetailErrors($body);
        }

        // The error doesn't have the expected structure (['errors' => [...]])
        if (!array_key_exists('errors', $body) || count($body['errors']) < 1) {
            return TwitterException::sprintf(
                'Twitter returns an error unknown to us, please open an issue at https://github.com/felixdorn/twitter-stream-api/issues with the following: ' .
                json_encode(['payload' => $body, 'status' => $response->getStatusCode()], self::PRETTY_PRINT_FLAGS),
            );
        }

        // Encoding to JSON here as $decoded['errors'][0] contains an
        // inconsistent object, in the sense that its properties may
        // change from one request to another.
        return new self(json_encode($body['errors'][0], self::PRETTY_PRINT_FLAGS));
    }

    private static function handleTooManyRequests(ResponseInterface $response): TwitterException
    {
        $reset = implode('', $response->getHeader('x-rate-limit-reset'));

        if ($reset == '') {
            $reset = 'unknown';
        }

        return TwitterException::sprintf('Too many requests (reset in: %s).', $reset);
    }

    public static function sprintf(string $message, mixed ...$args): self
    {
        return new self(sprintf($message, ...$args));
    }

    private static function handleTitleDetailErrors(array $body): self
    {
        $title  = $body['title'];
        $detail = $body['detail'];

        // Remove the detail if it's the same as the title
        if ($title === $detail) {
            $detail = '';
        }

        return self::sprintf(
            '%s: %s',
            $title,
            $detail
        );
    }
}
