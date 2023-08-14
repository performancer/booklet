<?php

declare(strict_types=1);

namespace Booklet\DataStructure;

use Booklet\Contract\Dictionary;

/**
 * @template T
 */
final class ImmutableDictionary implements Dictionary
{
    /**
     * @param array<string, T> $dictionary
     */
    public function __construct(
        private readonly array $dictionary = [],
    )
    {
    }

    /**
     * @param string $key
     * @return T
     */
    public function get(string $key)
    {
        return $this->dictionary[$key];
    }

    /**
     * @param string $key
     * @param T $value
     * @return self
     */
    public function insert(string $key, $value): self
    {
        $params = $this->dictionary;
        $params[$key] = $value;

        return new self($params);
    }
}
