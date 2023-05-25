<?php

namespace Felix\TwitterStream\Parser;

use Felix\TwitterStream\Contracts\ListenerInterface;

/**
 * Heavily based on maxakawizard/json-collection-parser, all credits go to them.
 *
 * @see https://github.com/MAXakaWIZARD/JsonCollectionParser
 */
class Listener implements ListenerInterface
{
    protected array $stack = [];

    protected ?string $key;

    protected int $level = 0;

    protected int $objectLevel = 0;

    protected array $objectKeys = [];

    public function __construct(
        /** @var callable */
        protected $callback,
        protected bool $assoc = true)
    {
    }

    public function startDocument(): void
    {
        $this->stack       = [];
        $this->key         = null;
        $this->objectLevel = 0;
        $this->level       = 0;
        $this->objectKeys  = [];
    }

    public function endDocument(): void
    {
        $this->stack = [];
    }

    public function startObject(): void
    {
        $this->objectLevel++;

        $this->startCommon();
    }

    public function startCommon(): void
    {
        $this->level++;
        $this->objectKeys[$this->level] = ($this->key) ? $this->key : null;
        $this->key                      = null;

        array_push($this->stack, []);
    }

    public function endObject(): void
    {
        $this->endCommon();

        $this->objectLevel--;
        if ($this->objectLevel === 0) {
            $obj = array_pop($this->stack);
            $obj = reset($obj);

            call_user_func($this->callback, $obj);
        }
    }

    public function endCommon(bool $isObject = true): void
    {
        $obj = array_pop($this->stack);

        if ($isObject && !$this->assoc) {
            $obj = (object) $obj;
        }

        if (!empty($this->stack)) {
            $parentObj = array_pop($this->stack);

            if ($this->objectKeys[$this->level]) {
                $objectKey             = $this->objectKeys[$this->level];
                $parentObj[$objectKey] = $obj;
                unset($this->objectKeys[$this->level]);
            } else {
                $parentObj[] = $obj;
            }
        } else {
            $parentObj = [$obj];
        }

        array_push($this->stack, $parentObj);

        $this->level--;
    }

    public function startArray(): void
    {
        $this->startCommon();
    }

    public function endArray(): void
    {
        $this->endCommon(false);
    }

    public function key(string $key): void
    {
        $this->key = $key;
    }

    public function value($value): void
    {
        $obj = array_pop($this->stack);

        if ($this->key) {
            $obj[$this->key] = $value;
            $this->key       = null;
        } else {
            array_push($obj, $value);
        }

        array_push($this->stack, $obj);
    }

    public function whitespace(string $whitespace): void
    {
    }
}
