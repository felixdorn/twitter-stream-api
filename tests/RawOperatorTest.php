<?php

use Felix\TwitterStream\Rule\Operators\RawOperator;

it('can compile', function () {
    $operator = new RawOperator(['someThing']);

    expect($operator->compile())->toBe('someThing');
});
