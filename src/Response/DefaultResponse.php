<?php

declare(strict_types=1);

namespace Booklet\Response;

use Booklet\Contract\Response;

final class DefaultResponse implements Response
{
    public function __construct(
        private readonly string $content,
        private readonly int $code,
    )
    {
    }

    public function handle(): void
    {
        http_response_code($this->code);
        header('Content-Type: text/html; charset=UTF-8');
        echo $this->content;
    }
}
