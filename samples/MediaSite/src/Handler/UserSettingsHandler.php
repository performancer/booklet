<?php

declare(strict_types=1);

namespace MediaSite\Handler;

use Booklet\Contract\Dictionary;
use Booklet\Contract\Handler;
use Booklet\Contract\Response;
use Booklet\Contract\User;
use Booklet\Response\DefaultResponse;

final class UserSettingsHandler implements Handler
{
    public function handle(User $user, Dictionary $params): Response
    {
        return new DefaultResponse('Hey, this is the user settings page!', 200);
    }
}
