<?php

declare(strict_types=1);

namespace Booklet\Contract;

use Booklet\Enum\UserAccess;

interface User
{
    public function id(): string;

    public function name(): string;

    public function access(): UserAccess;
}
