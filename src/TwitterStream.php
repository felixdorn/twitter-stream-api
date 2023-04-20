<?php

namespace Felix\TwitterStream;

use Felix\TwitterStream\Contracts\StreamManager;
use Felix\TwitterStream\Parser\Listener;
use Felix\TwitterStream\Parser\Parser;
use Felix\TwitterStream\Support\Clock;
use GuzzleHttp\Psr7\StreamWrapper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

abstract class TwitterStream implements StreamManager
{
    protected int $backfill     = 0;
    protected array $fields     = [];
    protected array $expansions = [];

    protected ?ResponseInterface $response = null;
    protected ?StreamInterface $stream     = null;
    protected ?Parser $parser              = null;
    protected int $received                = 0;
    protected int $createdAt;

    protected int $tweetLimit = PHP_INT_MAX;

    /** @var int The minimum payload length for a tweet. It assumes no content, no expansions, no fields. */
    protected int $bufferSize = 85;

    public function response(): ResponseInterface
    {
        // If used wrong, this could be null.
        /* @phpstan-ignore-next-line */
        return $this->response;
    }

    public function createdAt(): int
    {
        return $this->createdAt;
    }

    public function tweetsReceived(): int
    {
        return $this->received;
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
        $this->createdAt = Clock::now();

        dump('now');

        $this->parser = new Parser(
            stream: StreamWrapper::getResource($this->response->getBody()),
            listener: new Listener(
                callback: function (object $item) use ($callback) {
                    dump('in callback');
                    $this->received++;

                    $callback($item, $this);

                    if ($this->tweetLimit <= $this->received) {
                        $this->stopListening();
                    }
                },
                assoc: false
            ),
            lineEnding: "\r\n",
            emitWhitespace: false,
            bufferSize: $this->bufferSize
        );

        try {
            $this->parser->parse();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            $this->stopListening();
        }
    }

    public function toURL(): string
    {
        $parameters = array_filter([
            'expansions'       => implode(',', $this->expansions),
            'backfill_minutes' => $this->backfill,
        ]);

        foreach ($this->fields as $type => $fields) {
            $parameters[$type . '.fields'] = implode(',', is_array($fields) ? $fields : [$fields]);
        }

        return sprintf('%s%s', $this->endpoint(), count($parameters) > 0 ? '?' . http_build_query($parameters) : '');
    }

    abstract public function endpoint(): string;

    public function stopListening(): self
    {
        $this->parser?->stopParsing();
        $this->stream?->close();

        return $this;
    }

    public function timeElapsedInSeconds(): float|int
    {
        return max(0, Clock::now() - $this->createdAt);
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
