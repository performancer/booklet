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
use MediaSite\Component\ProfileComponent;
use MediaSite\Repository\ArticleRepository;
use MediaSite\Repository\UserRepository;

final class ProfileHandler implements Handler
{
    public function handle(User $user, Dictionary $params): Response
    {
        $userRepository = new UserRepository;
        $articleRepository = new ArticleRepository;

        $id = (int)$params->get('user_id');

        $component = new Composite(
            new ProfileComponent($userRepository->getProfileById($id)),
            ...array_map(
                callback: static fn($article) => new ArticlePreviewComponent($article),
                array: $articleRepository->getPreviewsByUser($id)
            ),
        );

        return new DefaultResponse($component->render(), 200);
    }
}
