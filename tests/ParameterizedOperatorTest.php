<?php

use Felix\TwitterStream\Rule\Operators\Operator;
use Felix\TwitterStream\Rule\Operators\ParameterizedOperator;

it('can compile', function () {
    $op = new ParameterizedOperator(0, 'name', ['value1', 'value2']);

    expect($op->compile())->toBe('name:[value1 value2]');
});

it('can be negated', function () {
    $op = new ParameterizedOperator(Operator::NOT_OPERATOR, 'name', ['value1', 'value2']);

    expect($op->compile())->toBe('-name:[value1 value2]');
});
