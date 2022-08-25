<?php

require __DIR__ . '/vendor/autoload.php';

use Felix\TwitterStream\Generator\Generator;


echo sprintf(<<<EOF
<?php

use Felix\TwitterStream\Rule\RuleBuilder;
/** Do not edit manually; changes will be lost. */
it('compiles', function (\$value, \$arguments, \$expected) {
    expect((new RuleBuilder())->{\$value}(...\$arguments)->compile())->toBe(\$expected);
})->with(%s);
EOF, var_export(Generator::tests(), true)) . PHP_EOL;
