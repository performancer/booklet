<?php

declare(strict_types=1);

namespace Booklet\User;

use Booklet\Contract\User;
use Booklet\Enum\UserAccess;

final class GuestUser implements User
{
    public function id(): string
    {
        return 'guest';
    }

    public function name(): string
    {
        return 'Guest';
    }

    public function access(): UserAccess
    {
        return UserAccess::GUEST;
    }
}