<?php

declare(strict_types=1);

namespace Booklet\Contract;

interface Path
{
    public function current(): string;

    public function consumed(): bool;

    public function consume(): self;
}
