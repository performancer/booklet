<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Booklet\DataStructure\ImmutableDictionary;
use Booklet\DataStructure\ImmutablePath;
use Booklet\Module;
use Booklet\User\GuestUser;
use MediaSite\Handler\ArticleHandler;
use MediaSite\Handler\ProfileHandler;
use MediaSite\Handler\SiteIndexHandler;
use MediaSite\Handler\UserSettingsHandler;
use MediaSite\Middleware\UserLoginMiddleware;

const TEMPLATE_DIRECTORY = __DIR__ . '/templates/';

$path = '/user/123' ;//$_SERVER['REQUEST_URI'];
$site = new UserLoginMiddleware(
    next: new Module(
        name: 'SiteIndex',
        value: '',
        handler: new SiteIndexHandler,
        modules: [
            new Module(
                name: 'Users',
                value: 'user',
                handler: new UserSettingsHandler,
                modules: [
                    new Module(
                        name: 'Profile',
                        value: '{user_id<\d+>}',
                        handler: new ProfileHandler,
                        modules: [],
                    ),
                ],
            ),
            new Module(
                name: 'Article',
                value: '{article_id}',
                handler: new ArticleHandler,
                modules: [],
            ),
        ],
    )
);
$response = $site->handle(
    user: new GuestUser,
    path: ImmutablePath::fromString($path),
    params: new ImmutableDictionary,
);
$response->handle();