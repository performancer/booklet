<?php

declare(strict_types=1);

namespace MediaSite\Model;

final class CreatorModel
{
    public function __construct(
        private readonly string $name,
    ) {
    }

    public function name(): string
    {
        return $this->name;
    }
}
