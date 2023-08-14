<?php

declare(strict_types=1);

namespace MediaSite\Component;

use Booklet\Contract\Component;
use Booklet\View;
use MediaSite\Model\CommentModel;

final class CommentComponent implements Component
{
    public function __construct(
        private readonly CommentModel $comment
    ) {
    }

    public function render(): string
    {
        return View::render(
            directory: TEMPLATE_DIRECTORY,
            template: 'Comment.phtml',
            variables: [
                'id' => $this->comment->id(),
                'creator' => $this->comment->creator()->name(),
                'timestamp' => $this->comment->timestamp(),
                'content' => $this->comment->content(),
            ],
        );
    }
}
