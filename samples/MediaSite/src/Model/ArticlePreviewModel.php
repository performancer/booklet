<?php

declare(strict_types=1);

namespace MediaSite\Model;

final class ArticlePreviewModel
{
    public function __construct(
        private readonly int $timestamp,
        private readonly CreatorModel $creator,
        private readonly string $title,
    ) {
    }

    public function timestamp(): int
    {
        return $this->timestamp;
    }

    public function creator(): CreatorModel
    {
        return $this->creator;
    }

    public function title(): string
    {
        return $this->title;
    }
}
