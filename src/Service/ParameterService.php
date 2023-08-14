<?php

declare(strict_types=1);

namespace Booklet\Service;

use Booklet\Contract\Path;
use Booklet\Contract\Ware;

final class ParameterService
{
    private const paramStartChar = '{';
    private const paramEndChar = '}';
    private const patternDefStartChar = '<';
    private const patternDefEndChar = '>';

    public static function match(Ware $ware, Path $path): bool
    {
        return (bool)preg_match(
            pattern: self::extractRegex($ware->value()),
            subject: $path->current(),
        );
    }

    public static function extractKey(string $pattern): string
    {
        return preg_replace(
            pattern: '/' . self::patternDefStartChar . '(.*?)' . self::patternDefEndChar . '$/',
            replacement: '',
            subject: substr($pattern, 1, -1),
        );
    }

    private static function extractRegex(string $pattern): string
    {
        if (!self::isParameter($pattern)) {
            return '/^' . $pattern . '$/';
        }

        if (preg_match('/<(.*?)>}$/', $pattern, $match) > 0) {
            return '/^(' . $match[1] . ')$/';
        }

        return '/^([a-z0-9\-]+)$/';
    }

    private static function isParameter(string $part): bool
    {
        return str_starts_with($part, self::paramStartChar) && str_ends_with($part, self::paramEndChar);
    }
}
