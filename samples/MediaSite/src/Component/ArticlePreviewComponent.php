<?php

declare(strict_types=1);

namespace MediaSite\Component;

use Booklet\Contract\Component;
use Booklet\View;
use MediaSite\Model\ArticlePreviewModel;

final class ArticlePreviewComponent implements Component
{
    public function __construct(
        private readonly ArticlePreviewModel $article
    ) {
    }

    public function render(): string
    {
        return View::render(
            directory: TEMPLATE_DIRECTORY,
            template: 'ArticlePreview.phtml',
            variables: [
                'creator' => $this->article->creator()->name(),
                'timestamp' => $this->article->timestamp(),
                'title' => $this->article->title(),
            ],
        );
    }
}
