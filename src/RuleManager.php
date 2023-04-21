<?php

namespace Felix\TwitterStream;

class RuleManager
{
    public function __construct(public TwitterConnection $connection)
    {
    }

    /** @return Rule[] */
    public function all(): array
    {
        $rules = $this->connection->request('GET', 'https://api.twitter.com/2/tweets/search/stream/rules');

        return array_map(fn (array $rule) => new Rule(
            $rule['value'],
            $rule['tag'] ?? null,
            $rule['id'] ?? null,
        ), $rules->getPayload()['data'] ?? []);
    }

    /**
     * @deprecated Use delete() instead
     */
    public function deleteMany(Rule|string|array $id): TwitterResponse
    {
        return $this->delete($id);
    }

    /** @param string|string[]|Rule[] $ids */
    public function delete(Rule|string|array $ids): ?TwitterResponse
    {
        if (!is_array($ids)) {
            $ids = [$ids];
        }

        if (count($ids) == 0) {
            return null;
        }

        $ids = array_filter(
            array_map(fn ($id) => $id instanceof Rule ? $id->id : $id, $ids)
        );

        return $this->connection->request('POST', 'https://api.twitter.com/2/tweets/search/stream/rules', [
            'body' => [
                'delete' => ['ids' => $ids],
            ],
        ]);
    }

    public function new(string $tag = ''): RuleBuilder
    {
        return new RuleBuilder($this, $tag);
    }

    public function validate(string $rule): array
    {
        return $this->save($rule, dryRun: true)->getPayload();
    }

    public function save(Rule|string $value, ?string $tag = null, bool $dryRun = false): TwitterResponse
    {
        if ($value instanceof Rule) {
            return $this->saveMany([$value], $dryRun);
        }

        return $this->saveMany([new Rule($value, $tag)], $dryRun);
    }

    /** @param Rule[] $rules */
    public function saveMany(array $rules, bool $dryRun = false): TwitterResponse
    {
        $dryRun = $dryRun ? '?dry_run=true' : '';

        return $this->connection->request('POST', 'https://api.twitter.com/2/tweets/search/stream/rules' . $dryRun, [
            'body' => [
                'add' => array_map(fn ($rule) => ['value' => $rule->value, 'tag' => $rule->tag], $rules),
            ],
        ]);
    }
}
