<?php

use Felix\TwitterStream\Streams\FilteredStream;

it('has the correct endpoint', function () {
    $stream = new FilteredStream();

    expect($stream->endpoint())->toBe('https://api.twitter.com/2/tweets/search/stream');
});
