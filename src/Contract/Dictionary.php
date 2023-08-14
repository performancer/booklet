<?php

declare(strict_types=1);

namespace Booklet\Contract;

/**
 * @template T
 */
interface Dictionary
{
    /**
     * @param string $key
     * @return T
     */
    public function get(string $key);

    /**
     * @param string $key
     * @param T $value
     * @return self
     */
    public function insert(string $key, $value): self;
}
