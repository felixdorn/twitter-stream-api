<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Felix\TwitterStream\TwitterConnection;
use Felix\TwitterStream\Rule\Rule;
use Felix\TwitterStream\Rule\RuleManager;

function mockTwitter(&$container): RuleManager
{
    $mock = new MockHandler([
        new Response(200, ['Content-Type' => 'application/json'], '[]'),
    ]);
    $history = Middleware::history($container);
    $handlerStack = HandlerStack::create($mock);
    $handlerStack->push($history);

    $client = new Client(['handler' => $handlerStack]);

    $connection = new TwitterConnection('some token');
    $connection->setClient($client);

    return new RuleManager($connection);
}

it('can create a rule', function () {
    $requests = [];
    $manager = mockTwitter($requests);

    $manager->save('cats has:links', 'cats with links');

    expect($requests[0]['request'])
        ->getMethod()->toBe('POST')
        ->getUri()->__toString()->toBe('https://api.twitter.com/2/tweets/search/stream/rules')
        ->getBody()->getContents()->toBe('{"add":[{"value":"cats has:links","tag":"cats with links"}]}');
});

it('can create many rules', function () {
    $requests = [];
    $manager = mockTwitter($requests);

    $manager->saveMany([
        new Rule('cats has:links', 'cats with links'),
        new Rule('dogs has:links', 'dogs with links'),
    ]);

    expect($requests[0]['request'])
        ->getMethod()->toBe('POST')
        ->getUri()->__toString()->toBe('https://api.twitter.com/2/tweets/search/stream/rules')
        ->getBody()->getContents()->toBe('{"add":[{"value":"cats has:links","tag":"cats with links"},{"value":"dogs has:links","tag":"dogs with links"}]}');
});

it('can delete a rule', function () {
    $requests = [];
    $manager = mockTwitter($requests);

    $manager->delete('1234');

    expect($requests[0]['request'])
        ->getMethod()->toBe('POST')
        ->getUri()->__toString()->toBe('https://api.twitter.com/2/tweets/search/stream/rules')
        ->getBody()->getContents()->toBe('{"delete":{"ids":["1234"]}}');
});

it('can delete many rules', function () {
    $requests = [];
    $manager = mockTwitter($requests);

    $manager->deleteMany(['1234', '5678']);

    expect($requests[0]['request'])
        ->getMethod()->toBe('POST')
        ->getUri()->__toString()->toBe('https://api.twitter.com/2/tweets/search/stream/rules')
        ->getBody()->getContents()->toBe('{"delete":{"ids":["1234","5678"]}}');
});

