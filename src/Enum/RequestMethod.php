<?php

declare(strict_types=1);

namespace Booklet\Enum;

enum RequestMethod: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PATCH = 'PATCH';
    case DELETE = 'DELETE';
}
