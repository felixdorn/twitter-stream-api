<?php


use Felix\TwitterStream\Rule\Operators\NamedOperator;
use Felix\TwitterStream\Rule\Operators\Operator;

it('correctly joins many arguments', function (int $kind, string $expected) {
    $operator = new NamedOperator(
        $kind,
        'from',
        ['@first', '@second'],
    );

    expect($operator->compile())->toBe($expected);
})->with([
    [0, 'from:@first from:@second'],
    [Operator::AND_OPERATOR, 'from:@first AND from:@second'],
    [Operator::OR_OPERATOR, 'from:@first OR from:@second'],
]);
