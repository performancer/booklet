<?php

declare(strict_types=1);

namespace MediaSite\Model;

final class CommentModel
{
    public function __construct(
        private readonly int $id,
        private readonly int $timestamp,
        private readonly CreatorModel $creator,
        private readonly string $content,
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function timestamp(): int
    {
        return $this->timestamp;
    }

    public function creator(): CreatorModel
    {
        return $this->creator;
    }

    public function content(): string
    {
        return $this->content;
    }
}
