<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 */
abstract class Partial
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure => static fn (...$args): Closure => static fn (...$argsNext) => $callable(...static::getArguments($args, $argsNext));
    }

    /**
     * @psalm-pure
     *
     * @psalm-param list<mixed> $args
     * @psalm-param list<mixed> $argsNext
     */
    abstract protected static function getArguments(array $args = [], array $argsNext = []): array;
}
