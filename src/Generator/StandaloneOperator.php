<?php

namespace Felix\TwitterStream\Generator;

/**
 * @codeCoverageIgnore (internal tool)
 *
 * @internal
 */
class StandaloneOperator
{
    public string $valueAsMethodName;
    public string $nameAsMethodName;

    public function __construct(public string $name, public string $value)
    {
        $this->nameAsMethodName  = ucfirst($name);
        $this->valueAsMethodName = ucfirst($this->value);
    }

    public function tests(): array
    {
        $tests = [
            [$this->name . $this->valueAsMethodName, [], "{$this->name}:{$this->value}"],
            ["{$this->name}Not{$this->valueAsMethodName}", [], "-{$this->name}:{$this->value}"],
            ["{$this->name}Not{$this->valueAsMethodName}", [], "-{$this->name}:{$this->value}"],
            ["or{$this->nameAsMethodName}{$this->valueAsMethodName}", [], "OR {$this->name}:{$this->value}"],
            ["or{$this->nameAsMethodName}Not{$this->valueAsMethodName}", [], "OR -{$this->name}:{$this->value}"],
            ["and{$this->nameAsMethodName}{$this->valueAsMethodName}", [], "AND {$this->name}:{$this->value}"],
            ["and{$this->nameAsMethodName}Not{$this->valueAsMethodName}", [], "AND -{$this->name}:{$this->value}"],
        ];

        if ($this->name === 'is') {
            $tests = [
                ...$tests,
                ["except{$this->valueAsMethodName}", [], "-{$this->name}:{$this->value}"],
                ["exceptNot{$this->valueAsMethodName}", [], "{$this->name}:{$this->value}"],
                ["orExcept{$this->valueAsMethodName}", [], "OR -{$this->name}:{$this->value}"],
                ["orExceptNot{$this->valueAsMethodName}", [], "OR {$this->name}:{$this->value}"],
                ["andExcept{$this->valueAsMethodName}", [], "AND -{$this->name}:{$this->value}"],
                ["andExceptNot{$this->valueAsMethodName}", [], "AND {$this->name}:{$this->value}"],
            ];
        }

        return $tests;
    }

    public function methods(): array
    {
        $methods = [
            $this->name . $this->valueAsMethodName,
            $this->name . 'Not' . $this->valueAsMethodName,
            'or' . $this->nameAsMethodName . $this->valueAsMethodName,
            'or' . $this->nameAsMethodName . 'Not' . $this->valueAsMethodName,
            'and' . $this->nameAsMethodName . $this->valueAsMethodName,
            'and' . $this->nameAsMethodName . 'Not' . $this->valueAsMethodName,
        ];

        if ($this->name === 'is') {
            $methods = [
                ...$methods,
                "except{$this->valueAsMethodName}",
                "exceptNot{$this->valueAsMethodName}",
                "orExcept{$this->valueAsMethodName}",
                "orExceptNot{$this->valueAsMethodName}",
                "andExcept{$this->valueAsMethodName}",
                "andExceptNot{$this->valueAsMethodName}",
            ];
        }

        return $methods;
    }
}
