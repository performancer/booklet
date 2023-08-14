<?php

declare(strict_types=1);

namespace Booklet\Contract;

interface Ware
{
    public function name(): string;

    public function value(): string;

    public function handle(User $user, Path $path, Dictionary $params): Response;
}
