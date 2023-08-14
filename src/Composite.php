<?php

declare(strict_types=1);

namespace Booklet;

use Booklet\Contract\Component;

final class Composite implements Component
{
    /**
     * @var Component[]
     */
    private readonly array $components;

    public function __construct(
        Component ...$components,
    ) {
        $this->components = $components;
    }

    public function render(): string
    {
        $content = '';
        foreach($this->components as $component) {
            $content .= $component->render() . PHP_EOL;
        }

        return $content;
    }
}
