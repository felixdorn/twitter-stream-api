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
            throw TwitterException::fromPayload($payload);
        }

        return new self($response, $payload);
    }

    public function getBody()
    {
        return $this->response->getBody();
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getProtocolVersion()
    {
        return $this->response->getProtocolVersion();
    }

    public function getHeaders()
    {
        return $this->response->getHeaders();
    }

    public function hasHeader($name)
    {
        return $this->response->hasHeader($name);
    }

    public function getHeader($name)
    {
        return $this->response->getHeader($name);
    }

    public function getHeaderLine($name)
    {
        return $this->response->getHeaderLine($name);
    }

    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    public function getReasonPhrase()
    {
        return $this->response->getReasonPhrase();
    }

    /** @return mixed[] */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /** @codeCoverageIgnore */
    public function withProtocolVersion($version)
    {
        throw new \BadMethodCallException('Not implemented');
    }

    /** @codeCoverageIgnore */
    public function withAddedHeader($name, $value)
    {
        throw new \BadMethodCallException('Not implemented');
    }

    /** @codeCoverageIgnore */
    public function withHeader($name, $value)
    {
        throw new \BadMethodCallException('Not implemented');
    }

    /** @codeCoverageIgnore */
    public function withoutHeader($name)
    {
        throw new \BadMethodCallException('Not implemented');
    }

    /** @codeCoverageIgnore */
    public function withBody(StreamInterface $body)
    {
        throw new \BadMethodCallException('Not implemented');
    }

    /** @codeCoverageIgnore */
    public function withStatus($code, $reasonPhrase = '')
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
