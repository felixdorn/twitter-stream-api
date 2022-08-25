<?php

namespace Felix\TwitterStream\Generator;

/**
 * @codeCoverageIgnore (internal tool)
 *
 * @internal
 */
class Generator
{
    // excluded here: sample, bounding_box, point_radius
    public const PARAMETERIZED_OPERATORS = ['from', 'to', 'url', 'retweetsOf', 'context', 'entity', 'conversationId', 'bio', 'bioName', 'bioLocation', 'place', 'placeCountry', 'lang'];

    public const STANDALONE_OPERATORS = [
        // excluded here, -is:nullcast
        'is'  => ['retweet', 'reply', 'quote', 'verified'],
        'has' => ['hashtags', 'cashtags', 'links', 'mentions', 'media', 'images', 'videos', 'geo'],
    ];

    public static function tests(): array
    {
        $tests = [];

        foreach (self::cases() as $case) {
            $tests = [...$tests, ...$case->tests()];
        }

        return $tests;
    }

    public static function cases(): \Generator
    {
        foreach (self::STANDALONE_OPERATORS as $name => $values) {
            foreach ($values as $value) {
                yield new StandaloneOperator($name, $value);
            }
        }

        foreach (self::PARAMETERIZED_OPERATORS as $name) {
            yield new ParameterizedOperator($name);
        }
    }

    public static function methods(): array
    {
        $methods = [];

        foreach (self::cases() as $case) {
            $methods = [...$methods, $case->methods()];
        }

        return $methods;
    }
}
