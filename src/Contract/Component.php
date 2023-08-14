<?php

declare(strict_types=1);

namespace Booklet\Contract;

interface Component
{
    public function render(): string;
}
