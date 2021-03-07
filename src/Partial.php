<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

use function call_user_func_array;

// phpcs:disable Generic.Files.LineLength.TooLong

abstract class Partial
{
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure => static fn (...$args): Closure => static fn (...$argsNext) => call_user_func_array($callable, static::getArguments($args, $argsNext));
    }

    abstract protected static function getArguments(array $argsA = [], array $argsB = []): array;
}
