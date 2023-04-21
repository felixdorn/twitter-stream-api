<?php

namespace Felix\TwitterStream;

use Felix\TwitterStream\Exceptions\TwitterException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class TwitterResponse implements ResponseInterface
{
    protected function __construct(protected ResponseInterface $response, protected array $payload = [])
    {
    }

    public static function fromPsrResponse(ResponseInterface $response): self
    {
        // Is the response a stream?
        if ($response->getBody()->getMetadata('wrapper_type') === 'http') {
            return new self($response, []);
        }

        $payload = json_decode($response->getBody()->getContents(), true, flags: JSON_THROW_ON_ERROR);

        if (array_key_exists('errors', $payload)) {
            // Rewind the stream so that the exception can read it
            $response->getBody()->rewind();

            throw TwitterException::fromResponse($response);
        }

        return new self($response, $payload);
    }

    public function getBody(): StreamInterface
    {
        return $this->response->getBody();
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getProtocolVersion(): string
    {
        return $this->response->getProtocolVersion();
    }

    public function getHeaders(): array
    {
        return $this->response->getHeaders();
    }

    public function hasHeader($name): bool
    {
        return $this->response->hasHeader($name);
    }

    public function getHeader($name): array
    {
        return $this->response->getHeader($name);
    }

    public function getHeaderLine($name): string
    {
        return $this->response->getHeaderLine($name);
    }

    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    public function getReasonPhrase(): string
    {
        return $this->response->getReasonPhrase();
    }

    /** @return mixed[] */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /** @codeCoverageIgnore */
    public function withProtocolVersion($version): self
    {
        throw new \BadMethodCallException('Not implemented');
    }

    /** @codeCoverageIgnore */
    public function withAddedHeader($name, $value): self
    {
        throw new \BadMethodCallException('Not implemented');
    }

    /** @codeCoverageIgnore */
    public function withHeader($name, $value): self
    {
        throw new \BadMethodCallException('Not implemented');
    }

    /** @codeCoverageIgnore */
    public function withoutHeader($name): self
    {
        throw new \BadMethodCallException('Not implemented');
    }

    /** @codeCoverageIgnore */
    public function withBody(StreamInterface $body): self
    {
        throw new \BadMethodCallException('Not implemented');
    }

    /** @codeCoverageIgnore */
    public function withStatus($code, $reasonPhrase = ''): self
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
