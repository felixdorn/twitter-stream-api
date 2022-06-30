<?php

use RWC\TwitterStream\Operators\NamedOperator;
use RWC\TwitterStream\Operators\Operator;


it('correctly joins many arguments', function (int $kind, string $expected) {
    $attribute = new NamedOperator(
        $kind,
        'from',
        ['@first', '@second'],
    );

    expect($attribute->compile())->toBe($expected);
})->with([
    [0, 'from:@first from:@second'],
    [Operator::AND_OPERATOR, 'from:@first and from:@second'],
    [Operator::OR_OPERATOR, 'from:@first or from:@second'],
]);
