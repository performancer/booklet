<?php

declare(strict_types=1);

namespace Booklet\Contract;

interface Response
{
    public function handle(): void;
}
