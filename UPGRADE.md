# Upgrade Guide

## From v2 to v3

### Major

* The callable in the `listen()` method is no longer bound to the stream.
  ```php
  $stream->listen($connection, function (object $tweet, \Felix\TwitterStream\TwitterStream $stream) {
    $stream->stopListening();
    // instead of
    $this->stopListening(); # does not work anymore  
  })
  ```

### Namespaces

We recommend that you simply Find and Replace in the order below to avoid any issues.

* The top-level namespace has been changed from "RWC" to "Felix", update accordingly.
* The filtered and volume stream are now under a common `Streams` directory
  * `\RWC\TwitterStream\VolumeStream` becomes `\Felix\TwitterStream\Streams\VolumeStream`
  * `\RWC\TwitterStream\FilteredStream` becomes `\Felix\TwitterStream\Streams\FilteredStream`
* `\RWC\TwitterStream\Connection` becomes `\Felix\TwitterStream\TwitterConnection`
* `\RWC\TwitterStream\Operators` becomes `\Felix\TwitterStream\Rule\Operators` **These classes are now marked as internal**.
* `\RWC\TwitterStream\RuleBuilder` becomes `\Felix\TwitterStream\Rule\RuleBuilder`
* `\RWC\TwitterStream\RuleManager` becomes `\Felix\TwitterStream\Rule\RuleManager`
* `\RWC\TwitterStream\Rule` becomes `\Felix\TwitterStream\Rule\Rule`
### Other
* The "operator" classes (found in src/Rule/Operators) are now marked as internal.
* `\Felix\TwitterStream\Support\Str` is now marked as internal.
* `\Felix\TwitterStream\Support\Flag` is now marked as internal.