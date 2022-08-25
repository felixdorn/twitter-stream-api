<?php

namespace Felix\TwitterStream\Rule\Operators;

use Felix\TwitterStream\Rule\RuleBuilder;
use Felix\TwitterStream\Support\Flag;
use SplStack;

/** @internal */
class GroupOperator extends Operator
{
    /** @var callable */
    protected $builder;

    public function __construct(
        protected int $flags,
        callable $builder,
    ) {
        $this->builder = $builder;
    }

    public function compile(): string
    {
        $stub = new RuleBuilder();
        ($this->builder)($stub);

        if (Flag::hasAny($this->flags, [self::OR_OPERATOR, self::AND_OPERATOR])) {
            $stack = clone $stub->operators;
            $stub->operators->rewind();

            foreach ($stub->operators as $index => $operator) {
                // the last index is the first operator in the stack
                // so, we don't want to prepend OR/AND in this case
                if ($index === $stub->operators->count() - 1) {
                    continue;
                }

                $stack->add($index, new RawOperator([
                    Flag::has($this->flags, self::OR_OPERATOR) ? 'OR' : 'AND',
                ]));
            }

            $stack->rewind();
            $stub->operators = $stack;
        }

        if (Flag::has($this->flags, self::NOT_OPERATOR)) {
            /** @var SplStack<Operator> $negatedStack */
            $negatedStack = new SplStack();
            $stub->operators->rewind();

            while (!$stub->operators->isEmpty()) {
                $op = $stub->operators->pop();
                $op->setFlags($op->flags() === 0 ? self::NOT_OPERATOR : $op->flags() ^ self::NOT_OPERATOR);
                $negatedStack->unshift($op);
            }

            $negatedStack->rewind();
            $stub->operators = $negatedStack;
        }

        return '(' . $stub->compile() . ')';
    }
}
