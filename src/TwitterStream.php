<?php

namespace RWC\TwitterStream;

use Generator;
use GuzzleHttp\Client;
use Psr\Http\Message\StreamInterface;

class TwitterStream
{
    protected Client $httpClient;
    protected ?StreamInterface $streamConnection = null;

    public function __construct(
        protected string $bearerToken,
        protected string $apiKey,
        protected string $apiSecretKey,
    ) {
        $this->httpClient = new Client([
            'headers' => [
                'Authorization' => "Bearer {$this->bearerToken}",
            ],
        ]);
        Rule::useHttpClient($this->httpClient);
    }

    public function filteredTweets(Sets $sets = null): Generator
    {
        $this->streamConnection = $this->connectToFilteredStream($sets);

        while (!$this->streamConnection->eof()) {
            $char = $this->streamConnection->read(2);
            $tweets = $char;

            while ($char !== "\r\n") {
                $char = $this->streamConnection->read(2);
                $tweets .= $char;
            }

            $tweets = trim($tweets);

            if (empty($tweets)) {
                continue;
            }

            $tweets = explode("\r\n", $tweets);
            foreach($tweets AS $tweet) {
                yield json_decode($tweet, true, 512, JSON_THROW_ON_ERROR);
            }
        }
    }

    protected function connectToFilteredStream(Sets $sets = null): StreamInterface
    {
        // Could use the null object pattern
        $sets ??= new Sets();

        return $this->httpClient->get('https://api.twitter.com/2/tweets/search/stream?' . $sets, [
            'stream' => true,
        ])->getBody();
    }

    public function __destruct()
    {
        $this->stopListening();
    }

    public function stopListening(): self
    {
        if ($this->streamConnection) {
            $this->streamConnection->close();
        }

        return $this;
    }

    public function reconnect(): self
    {
        $this->stopListening();
        $this->streamConnection = $this->connectToFilteredStream();

        return $this;
    }
}
