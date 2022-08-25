<?php

namespace Felix\TwitterStream;

use Felix\TwitterStream\Exceptions\TwitterException;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class TwitterResponse implements ResponseInterface
{
    /** @var mixed[] */
    protected array $payload = [];

    public function __construct(protected ResponseInterface $response)
    {
        // Is the response a stream?
        if ($response->getBody()->getMetadata('wrapper_type') === 'http') {
            return;
        }

        $payload = json_decode($response->getBody()->getContents(), true, flags: JSON_THROW_ON_ERROR);

        if (array_key_exists('errors', $payload)) {
            throw TwitterException::fromPayload($payload);
        }

        $this->payload = $payload ?? [];
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

    public function withProtocolVersion($version)
    {
        $this->response->withProtocolVersion($version);

        return $this;
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

    public function withHeader($name, $value)
    {
        $this->response->withHeader($name, $value);

        return $this;
    }

    public function withAddedHeader($name, $value)
    {
        $this->response->withAddedHeader($name, $value);

        return $this;
    }

    public function withoutHeader($name)
    {
        $this->response->withoutHeader($name);

        return $this;
    }

    public function withBody(StreamInterface $body)
    {
        $this->response->withBody($body);

        return $this;
    }

    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    public function withStatus($code, $reasonPhrase = '')
    {
        $this->response->withStatus($code, $reasonPhrase);

        return $this;
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
}
