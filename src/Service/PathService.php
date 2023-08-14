<?php

declare(strict_types=1);

namespace Booklet\Service;

final class PathService
{
    /**
     * @param string $path
     * @return string[]
     */
    public static function explode(string $path): array
    {
        if (str_starts_with($path, '/')) {
            $path = substr($path, 1);
        }

        if (str_ends_with($path, '/')) {
            $path = substr($path, 0, -1);
        }

        if ($path !== '') {
            return explode('/', $path);
        }

        return [];
    }
}
