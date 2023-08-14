<?php

declare(strict_types=1);

namespace Booklet\User;

use Booklet\Contract\User;
use Booklet\Enum\UserAccess;

final class DefaultUser implements User
{
    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly UserAccess $access,
    )
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function access(): UserAccess
    {
        return $this->access;
    }
}
