<?php

declare(strict_types=1);

namespace Booklet;

final class View
{
    public static function render(string $directory, string $template, array $variables): string
    {
        extract($variables, EXTR_OVERWRITE);
        ob_start();
        require $directory . $template;

        return trim(ob_get_clean());
    }
}
