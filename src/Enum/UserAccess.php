<?php

declare(strict_types=1);

namespace Booklet\Enum;

enum UserAccess: string
{
    case ADMIN = 'ADMINISTRATOR';
    case MODERATOR = 'MODERATOR';
    case STANDARD = 'STANDARD';
    case GUEST = 'GUEST';
}
