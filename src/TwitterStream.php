<?php

namespace Felix\TwitterStream;

use Felix\TwitterStream\Contracts\StreamManager;
use JsonCollectionParser\Listener;
use JsonCollectionParser\Stream\DataStream;
use JsonStreamingParser\Parser;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

abstract class TwitterStream implements StreamManager
{
    protected int $received                   = 0;
    protected ?ResponseInterface $response    = null;
    protected ?StreamInterface $stream        = null;
    private int $tweetLimit                   = PHP_INT_MAX;
    private int $backfill                     = 0;
    private array $fields                     = [];
    private array $expansions                 = [];
    private int $createdAt;
    private ?Parser $parser = null;
    private int $bufferSize = 85;

    public function createdAt(): int
    {
        return $this->createdAt;
    }

    public function withBufferSize(int $size): static
    {
        $this->bufferSize = $size;

        return $this;
    }

    public function withTweetLimit(int $limit): static
    {
        $this->tweetLimit = $limit;

        return $this;
    }

    public function listen(TwitterConnection $connection, callable $callback): void
    {
        $this->response  = $connection->request('GET', $this->toURL(), ['stream' => true]);
        $this->stream    = $this->response->getBody();
        $this->createdAt = hrtime()[0];

        $this->parser = new Parser(
            DataStream::get($this->response),
            new Listener(
                function (object $item) use ($callback) {
                    if ($this->tweetLimit <= $this->received) {
                        $this->stopListening();

                        return;
                    }

                    $callback($item, $this);

                    $this->received++;
                },
                false
            ),
            "\r\n",
            false,
            $this->bufferSize
        );

        $this->parser->parse();
    }

    public function toURL(): string
    {
        $parameters = [];

        foreach ($this->fields as $type => $fields) {
            $parameters[$type . '.fields'] = implode(',', is_array($fields) ? $fields : [$fields]);
        }

        if (count($this->expansions) > 0) {
            $parameters['expansions'] = implode(',', $this->expansions);
        }

        if ($this->backfill > 0) {
            $parameters['backfill_minutes'] = $this->backfill;
        }

        return sprintf('%s?%s', $this->endpoint(), http_build_query($parameters));
    }

    abstract public function endpoint(): string;

    public function stopListening(): self
    {
        $this->parser?->stop();
        $this->stream?->close();

        return $this;
    }

    public function timeElapsedInSeconds(): float|int
    {
        return max(0, hrtime()[0] - $this->createdAt);
    }

    public function __destruct()
    {
        $this->stopListening();
    }

    public function backfill(int $minutes): self
    {
        $this->backfill = $minutes;

        return $this;
    }

    public function expansions(string ...$expansions): self
    {
        $this->expansions = [...$this->expansions, ...$expansions];

        return $this;
    }

    public function fields(array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }
}
