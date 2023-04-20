# Twitter Stream API (v2)

[![Tests](https://github.com/redwebcreation/twitter-stream-api/actions/workflows/tests.yml/badge.svg?branch=master)](https://github.com/redwebcreation/twitter-stream-api/actions/workflows/tests.yml)
[![Formats](https://github.com/redwebcreation/twitter-stream-api/actions/workflows/formats.yml/badge.svg?branch=master)](https://github.com/redwebcreation/twitter-stream-api/actions/workflows/formats.yml)
[![Version](https://poser.pugx.org/redwebcreation/twitter-stream-api/version)](//packagist.org/packages/redwebcreation/twitter-stream-api)
[![Total Downloads](https://poser.pugx.org/redwebcreation/twitter-stream-api/downloads)](//packagist.org/packages/redwebcreation/twitter-stream-api)
[![codecov](https://codecov.io/gh/felixdorn/twitter-stream-api/branch/main/graph/badge.svg?token=0bB80l3Hgt)](https://codecov.io/gh/felixdorn/twitter-stream-api)

Consume the Twitter Stream API v2 in real-time.

This package is the spiritual successor of `fennb/phirehose`. It also uses some of `salsify/jsonstreamingparser` and `maxakawizard/json-collection-parser`.

## Getting started

You need an approved developer account. If you don't have
one, [apply here](https://developer.twitter.com/en/docs/twitter-api/getting-started/getting-access-to-the-twitter-api).
Once you are in, create an "Application" in the Developer Portal and generate a new bearer token.

> Requires [PHP 8.1+](https://www.php.net/releases/)


You can install the package via composer:

```bash
composer require redwebcreation/twitter-stream-api
```

Then, create a connection:

```php
$connection = new \Felix\TwitterStream\TwitterConnection(
    bearerToken: '...' # the one you got from the Developer Portal
);
```

## Usage

### Streams

* [\Felix\TwitterStream\Streams\VolumeStream](src/Streams/VolumeStream.php)
* [\Felix\TwitterStream\Streams\FilteredStream](src/Streams/FilteredStream.php)

### Creating a stream

```phpf
$stream = new \Felix\TwitterStream\Streams\VolumeStream();
// or
$stream = new \Felix\TwitterStream\Streams\FilteredStream();
```

### Configuring a stream

* `withTweetLimit(int)` - Limit the number of tweets a connection should process
    ```php
    $stream->withTweetLimit(100_000);
    ```
* `fields(string[])` - See [Fields](#fields)
* `expansions(...string)` - See [Expansions](#expansions)

#### For advanced use

* `withBufferSize(int = 85)` - How many bytes should the parser store before trying to parse the JSON, on very
  high-volume streams, using a larger buffer size is recommended (2500, 10000, depending on the volume). Setting it to a
  value smaller than 85 is inefficient as the shortest payload returned is at least 85 characters long. Setting to a big
  value > 2000 on a low-volume stream would result in 0 tweets being processed until there is 2000 bytes in the buffer.

### Interacting with a stream

* `stopListening()` - Stops listening to the stream.
* `createdAt(): int` - The UNIX timestamp at which you started listening
* `timeElapsedInSeconds(): int` - How much time passed since you started listening
* `tweetsReceived(): int` - How much the stream sent

#### For advanced use

* `response(): Psr\Http\Message\ResponseInterface` - The response sent by Twitter

### Listening to a stream

```php
$stream->listen($connection, function (object $tweet) {
    echo $tweet->data->text . PHP_EOL;
});
```

## Filtering the stream

**This part only applies if you're interested in the *filtered stream*.**

### Building a rule

> Note, If you change your rules while connected to the stream, Twitter will use the new rules immediately.

#### Save, read and delete rules

> You can not update rules.

```php
use Felix\TwitterStream\Rule\RuleManager;

$rule = new RuleManager($connection);
```

Let's create a rule:

```php
$rule->save(
	# tweets must contain the word cat and have at least one image
	"cat has:images",
	"images of cats"
);
```

You may now retrieve your newly saved rule:

```php
$rule->all();
```

Which returns an array of `Felix\TwitterStream\Rule\Rule`:

```php
[
	0 => Felix\TwitterStream\Rule\Rule{
		+value: "cat has:images",
		+tag: "images of cats",
		+id: "4567654567654567654"
	}
]
```
> Note, the `Felix\TwitterStream\Rule\Rule` is merely a Data Object, it does not contain any method.

To delete the rule pass its ID to the `delete` method:
```php
$rule->delete('4567654567654567654');
```

##### Batch Processing

To save many rules at once:

```php
use Felix\TwitterStream\Rule\Rule;

$rule->saveMany([  
   new Rule("cats has:images", "cat pictures"),  
   new Rule("dogs has:images", "dog pictures"),  
   new Rule("horses has:images", "horse picture"),  
]);
```

To delete these new rules,

```php
$rule->deleteMany([
	'[A RULE ID]',
	'[A RULE ID]',
	'[A RULE ID]',
]);
```

#### Validating your rules

You can either use the `validate()` method:

```php
$rule->validate('cats ha:images');
```

Or, the `save` and `saveMany` method both have a dryRun parameter:

```php
$rule->save('...', '...', dryRun: true);

$rule->saveMany([...], dryRun: true);
```

#### Rule Builder

Every operator is available, here's an example:

```php
$rule->new('listening to music')
    ->raw('#nowplaying')
    ->isNotRetweet()
    ->lang('en')
    ->save();
```

You may also use `and[Operator]`, `or[Operator]`.

To add a raw string to the rule, use `raw(string)`

You may call `dump()` or `dd()` to quickly debug your rule.

Compiling this would produce the following:
```
#nowplaying -is:retweet lang:en sample:10
```

## Fields

Fields allow for more customization regarding the payload returned per tweet. Let's see that in an example below:

```php
$stream
    ->fields([
        'tweet' => 'author_id'
         // or,
         // 'tweet' => ['author_id', '...']
    ])
    ->listen(...);
```

Which could return:

```json
{
  "data": {
    "id": "1234321234321234321",
    "text": "Hello world!",
    "author_id": "5678765678765678765"
  }
}
```

Here's the list of all the available field types and their respective object model (last updated: Aug. 2022):

* Tweet
* User
* Media
* Poll
* Place

You can also check out [Twitter’s documentation](https://developer.twitter.com/en/docs/twitter-api/fields) for more
details.

## Expansions

Expansions let you expand ids to their complete object, for example, if you request an extra author_id field, you may
expand it using the author_id expansion:

```php
$stream
    ->fields(['tweet' => 'author_id'])
    ->expansions('author_id')
    ->listen(...);
```

Which could return:

```json
{
  "data": {
    "id": "1234321234321234321",
    "text": "Hello world!",
    "author_id": "5678765678765678765"
  },
  "includes": {
    "users": [
      {
        "id": "5678765678765678765",
        "name": "John Doe",
        "username": "johndoe"
      }
    ]
  }
}
```

The list of expansions is quite extensive and not all expansions work the same, please check
out [Twitter's documentation](https://developer.twitter.com/en/docs/twitter-api/expansions). on the subject.

## Testing

```bash
composer test
```

**Twitter Stream API** was created by [Félix Dorn](https://twitter.com/afelixdorn) under
the [MIT License](https://opensource.org/licenses/MIT).

<!-- (179) -->
