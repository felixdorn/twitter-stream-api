<?php

require __DIR__ . '/vendor/autoload.php';

use Felix\TwitterStream\Generator\Generator;
use Felix\TwitterStream\Generator\ParameterizedOperator;

$cases = Generator::cases();

$boilerplate = <<<EOF
<?php

namespace Felix\TwitterStream\Rule;

/**
%s
*/
class _RuleBuilder {

}
EOF;

$doc = '';

foreach ($cases as $case) {
    $parameterized = $case instanceof ParameterizedOperator;

    foreach ($case->methods() as $method) {
        $doc .= $parameterized ?
            sprintf('* @method RuleBuilder %s(string|array $value)', $method) :
            sprintf('* @method RuleBuilder %s()', $method);
        $doc .= PHP_EOL;
    }
}

$doc = rtrim($doc, PHP_EOL);

echo sprintf($boilerplate, $doc);