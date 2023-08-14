<?php

declare(strict_types=1);

namespace Booklet;

use Booklet\Contract\Dictionary;
use Booklet\Contract\Handler;
use Booklet\Contract\Path;
use Booklet\Contract\Response;
use Booklet\Contract\User;
use Booklet\Contract\Ware;
use Booklet\Service\ParameterService;

final class Module implements Ware
{
    /**
     * @param string $name
     * @param string $value
     * @param Handler $handler
     * @param array<string, Ware> $modules
     */
    public function __construct(
        private readonly string $name,
        private readonly string $value,
        private readonly Handler $handler,
        private readonly array $modules,
    )
    {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function handle(User $user, Path $path, Dictionary $params): Response
    {
        if ($path->consumed()) {
            return $this->handler->handle($user, $params);
        }

        foreach ($this->modules as $child) {
            if (self::traversable($child, $path)) {
                [$params, $path] = self::onTraverse($child, $params, $path);

                return $child->handle($user, $path, $params);
            }
        }

        throw new \RuntimeException();
    }

    private static function traversable(Ware $ware, Path $path): bool
    {
        return ParameterService::match($ware, $path);
    }

    private static function onTraverse(Ware $ware, Dictionary $params, Path $path): array
    {
        $params = $params->insert(ParameterService::extractKey($ware->value()), $path->current());
        $path = $path->consume();

        return [$params, $path];
    }
}
