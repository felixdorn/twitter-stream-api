<?php

namespace Felix\TwitterStream\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

class TwitterException extends Exception
{
    protected array $raw;

    public function __construct(string $message, array $raw = [])
    {
        $this->raw = $raw;

        parent::__construct($message);
    }

    public static function fromResponse(ResponseInterface $response): TwitterException
    {
        $decoded = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        if ($decoded['status'] === 429) {
            $reset = implode('', $response->getHeader('x-rate-limit-reset'));

            if ($reset == '') {
                $reset = 'unknown';
            }

            return new self('Too many requests (reset in: ' . $reset . ').');
        }

        $error = $decoded['errors'][0];

        return new self($error['message'], $decoded);
    }

    public static function fromPayload(array $payload): TwitterException
    {
        $buffer = '';

        foreach ($payload['errors'] as $error) {
            // For errors like DuplicateRule, no details are provided.
            // For most errors related to rule creation, details are provided.
            $hasDetails = array_key_exists('details', $error);

            $errorIdOrType = $error['id'] ?? ($error['type'] ?? 'Generic Problem');

            $buffer .= sprintf("[%s] %s %s [%s]\n", $error['title'], $error['value'], $hasDetails ? ': ' . implode('; ', $error['details']) : '', $errorIdOrType);
        }

        return new self(
            $buffer,
            $payload
        );
    }
}
