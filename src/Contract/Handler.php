<?php

declare(strict_types=1);

namespace Booklet\Contract;

interface Handler
{
    public function handle(User $user, Dictionary $params): Response;
}
