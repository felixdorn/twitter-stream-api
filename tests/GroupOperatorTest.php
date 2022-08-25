<?php

use Felix\TwitterStream\Rule\Operators\GroupOperator;
use Felix\TwitterStream\Rule\Operators\Operator;
use Felix\TwitterStream\Rule\RuleBuilder;

it('can compile', function () {
    $op = new GroupOperator(
        0,
        fn (RuleBuilder $builder) => $builder->from('me')->orFrom('you'),
    );

    expect($op->compile())->toBe('(from:me OR from:you)');
});
it('negates each operator', function () {
    $op = new GroupOperator(
        Operator::NOT_OPERATOR,
        fn (RuleBuilder $builder) => $builder->from('me')->orFrom('you'),
    );

    expect($op->compile())->toBe('(-from:me OR -from:you)');
});
