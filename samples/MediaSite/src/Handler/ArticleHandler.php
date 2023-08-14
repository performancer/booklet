<?php

declare(strict_types=1);

namespace MediaSite\Handler;

use Booklet\Composite;
use Booklet\Contract\Dictionary;
use Booklet\Contract\Handler;
use Booklet\Contract\Response;
use Booklet\Contract\User;
use Booklet\Response\DefaultResponse;
use MediaSite\Component\ArticleComponent;
use MediaSite\Component\CommentComponent;
use MediaSite\Repository\ArticleRepository;
use MediaSite\Repository\ModelRepository as CommentRepository;

final class ArticleHandler implements Handler
{
    public function handle(User $user, Dictionary $params): Response
    {
        $articleRepository = new ArticleRepository;
        $commentRepository = new CommentRepository;

        $id = $params->get('article_id');

        $component = new Composite(
            new ArticleComponent($articleRepository->getArticleById($id)),
            ...array_map(
                callback: static fn ($comment) => new CommentComponent($comment),
                array: $commentRepository->getCommentsByArticle($id),
            ),
        );

        return new DefaultResponse(
            content: $component->render(),
            code: 200
        );
    }
}
