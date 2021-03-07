<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;
use ReflectionFunction;

use function call_user_func_array;
use function count;

abstract class Curry
{
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure => static fn (...$args) => static::curryN(
            (new ReflectionFunction($callable))->getNumberOfRequiredParameters() - count($args),
            $callable,
            $args
        );
    }

    abstract protected static function getArguments(array $argsA = [], array $argsB = []): array;

    private static function curryN(int $numberOfArguments, callable $function, array $args = [])
    {
        return (0 >= $numberOfArguments)
            ? $function(...$args)
            : static fn (...$argsNext) => (0 <= $argsLeft = $numberOfArguments - count($argsNext))
                    ? call_user_func_array($function, static::getArguments($argsNext, $args))
                    : self::curryN($argsLeft, $function, static::getArguments($argsNext, $args));
    }
}
