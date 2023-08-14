<?php

declare(strict_types=1);

namespace MediaSite\Model;

final class ProfileModel
{
    public function __construct(
        private readonly string $name,
        private readonly int $timestamp,
        private readonly string $desc,
    )
    {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function timestamp(): int
    {
        return $this->timestamp;
    }

    public function desc(): string
    {
        return $this->desc;
    }
}
