<?php

declare(strict_types=1);

namespace Booklet\DataStructure;

use Booklet\Contract\Path;
use Booklet\Service\PathService;

final class ImmutablePath implements Path
{
    public function __construct(
        private readonly array $parts,
    ) {
    }

    public function current(): string
    {
        return $this->parts[0] ?? '';
    }

    public function consumed(): bool
    {
        return !$this->parts;
    }

    public function consume(): self
    {
        $parts = $this->parts;

        array_shift($parts);

        return new self($parts);
    }

    public static function fromString(string $path): self
    {
        return new self(PathService::explode($path));
    }
}
