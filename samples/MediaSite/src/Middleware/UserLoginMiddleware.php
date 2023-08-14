<?php

declare(strict_types=1);

namespace MediaSite\Middleware;

use Booklet\Contract\Dictionary;
use Booklet\Contract\Path;
use Booklet\Contract\Response;
use Booklet\Contract\User;
use Booklet\Contract\Ware;
use MediaSite\Repository\UserRepository;

final class UserLoginMiddleware implements Ware
{
    public function __construct(
        private readonly Ware $next,
    )
    {
    }

    public function name(): string
    {
        return $this->next->name();
    }

    public function value(): string
    {
        return $this->next->value();
    }

    public function handle(User $user, Path $path, Dictionary $params): Response
    {
        //TODO: fetch user by session

        $userRepository = new UserRepository;
        $user = $userRepository->getUserById(0);

        return $this->next->handle($user, $path, $params);
    }
}
