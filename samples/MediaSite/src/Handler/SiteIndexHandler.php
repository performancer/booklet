<?php

declare(strict_types=1);

namespace MediaSite\Handler;

use Booklet\Composite;
use Booklet\Contract\Dictionary;
use Booklet\Contract\Handler;
use Booklet\Contract\Response;
use Booklet\Contract\User;
use Booklet\Response\DefaultResponse;
use MediaSite\Component\ArticlePreviewComponent;
use MediaSite\Repository\ArticleRepository;

final class SiteIndexHandler implements Handler
{
    public function handle(User $user, Dictionary $params): Response
    {
        $articleRepository = new ArticleRepository;

        $component = new Composite(
            ...array_map(
                callback: static fn($article) => new ArticlePreviewComponent($article),
                array: $articleRepository->getPreviews(0, 20),
            ),
        );

        return new DefaultResponse($component->render(), 200);
    }
}
