# Twitter Stream API (v2)

[![Tests](https://github.com/redwebcreation/twitter-stream-api/actions/workflows/tests.yml/badge.svg?branch=master)](https://github.com/redwebcreation/twitter-stream-api/actions/workflows/tests.yml)
[![Formats](https://github.com/redwebcreation/twitter-stream-api/actions/workflows/formats.yml/badge.svg?branch=master)](https://github.com/redwebcreation/twitter-stream-api/actions/workflows/formats.yml)
[![Version](https://poser.pugx.org/redwebcreation/twitter-stream-api/version)](//packagist.org/packages/redwebcreation/twitter-stream-api)
[![Total Downloads](https://poser.pugx.org/redwebcreation/twitter-stream-api/downloads)](//packagist.org/packages/redwebcreation/twitter-stream-api)

Consume the Twitter Stream API v2 in real-time.

This package is the spiritual successor of `fennb/phirehose`.

## Getting started

> Requires [PHP 8.1+](https://www.php.net/releases/)

You can install the package via composer:

```bash
composer require redwebcreation/twitter-stream-api
```

> **Updating from v2 to v3?** Read the [upgrade guide](UPGRADE.md).

## Usage

```php
use Felix\TwitterStream\TwitterConnection;
use Felix\TwitterStream\Streams\FilteredStream;
use Felix\TwitterStream\Streams\VolumeStream;

$twitterStream  = new FilteredStream();
// or
$twitterStream  = new VolumeStream();
$connection     = new TwitterConnection(bearerToken: '...');
$rule           = new RuleManager($connection);

$rule->new(tag: 'cat_filter_1')
    ->query('cats')
    ->hasImages()
    ->andHasGeo()
    ->save()

$twitterStream->listen($connection, function (object $tweet) {
   echo $tweet->data->text;
        
   if ($this->received >= 100) {
      $this->stopListening();
   }
});
```

## Rules

Rules are made of one or many operators that are combined using boolean logic and parentheses to help define which
Tweets your stream receives. Rules are saved by Twitter and are persistent.

### Client

```php
use Felix\TwitterStream\Manager;

$rules = new Manager($connection);
```

### Listing all the rules

```php
$rules->all();
```

#### Saving a rule

```php
use Felix\TwitterStream\Rule;

$rules->save(
  'cat has:image',
  'tweet with an image of a cat'
)

// Using saveMany to create many rules is more efficient than using save
// as it only sends one request to Twitter as opposed to sending one request per rule.
$rules->saveMany([
    new Rule('cat has:image', 'cat with an image'),
    new Rule('cat has:video', 'cat with a video'),
    new Rule ('dog -has:image', 'dog without an image'),
])
```

If no tag is provided, it fallbacks to the rule itself.

#### Deleting a rule

```php
use Felix\TwitterStream\Rule;

$rules->delete('THE_RULE_ID_HERE');


// Using deleteMany to delete many rules is more efficient than using delete
// as it only sends one request to Twitter as opposed to sending one request per rule.
$rules->deleteMany([
    'RULE_IDS_HERE'
    'RULE_IDS_HERE'
    'RULE_IDS_HERE'
])
```

## Rule Builder

```php
use Felix\TwitterStream\Rule\RuleBuilder;

$rules->new()
    ->query('php')
    ->group(fn (RuleBuilder $builder) => $builder->raw('tip')->or->raw('🔥'))
    ->isRetweets()
    ->hasImages()
    ->hasNotLinks()
    ->save();

// Produces #php (tip OR 🔥) is:retweet has:images -has:links
```

You can negate an operator using the magic property `not`.

```php
use Felix\TwitterStream\Rule\RuleBuilder;

$rules->new()
    ->query('#php')
    ->exceptRetweets() 
    ->hasLinks()
    ->save()

// Produces: #php -is:retweet has:links
```

You can also group operators together :

```php
use Felix\TwitterStream\Rule\RuleBuilder;

$rules->query('#laravel')
    ->group(function (RuleBuilder $builder) {
        $builder->raw('tip')->or->raw('tips')->or->raw('🔥');
    });

// Produces: #laravel (tip OR tips OR 🔥)
```

## Testing

```bash
composer test
```

**Twitter Stream API** was created by [Félix Dorn](https://twitter.com/afelixdorn) under
the [MIT License](https://opensource.org/licenses/MIT).

<!-- (179) -->
