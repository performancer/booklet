<?php

declare(strict_types=1);

namespace Booklet;

use Booklet\Contract\User;
use Booklet\Enum\RequestMethod;

final class Request
{
    public function __construct(
        private readonly User $user,
        private readonly string $remote,
        private readonly string $path,
        private readonly RequestMethod $method,
        private readonly string $contentType,
    ) {
    }

    public function user(): User
    {
        return $this->user;
    }

    public function remoteAddress(): string
    {
        return $this->remote;
    }

    public function path(): string
    {
        return $this->path;
    }

    public function method(): RequestMethod
    {
        return $this->method;
    }

    public function body(): array
    {
        if (strcasecmp($this->contentType, 'application/json') === 0) {
            $content = file_get_contents('php://input');

            return json_decode($content, true) ?? [];
        }

        return [];
    }
}
