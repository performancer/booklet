<?php

declare(strict_types=1);

namespace MediaSite\Component;

use Booklet\Contract\Component;
use Booklet\View;
use MediaSite\Model\ArticleModel;

final class ArticleComponent implements Component
{
    public function __construct(
        private readonly ArticleModel $article
    ) {
    }

    public function render(): string
    {
        return View::render(
            directory: TEMPLATE_DIRECTORY,
            template: 'Article.phtml',
            variables: [
                'creator' => $this->article->creator()->name(),
                'timestamp' => $this->article->timestamp(),
                'title' => $this->article->title(),
                'content' => $this->article->content(),
            ],
        );
    }
}
