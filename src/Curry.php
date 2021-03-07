<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Closure;
use ReflectionFunction;

use function count;

/**
 * @psalm-immutable
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
abstract class Curry
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param positive-int|null $arity
             */
            static fn (callable $callable, ?int $arity = null): Closure => static fn (...$args) => static::curryN(
                ($arity ?? (new ReflectionFunction($callable))->getNumberOfRequiredParameters()) - count($args),
                $callable,
                static::getArguments([], $args)
            );
    }

    /**
     * @psalm-pure
     *
     * @psalm-param list<mixed> $args
     * @psalm-param list<mixed> $argsNext
     */
    abstract protected static function getArguments(array $args = [], array $argsNext = []): array;

    private static function curryN(int $numberOfArguments, callable $function, array $args = [])
    {
        return (0 >= $numberOfArguments)
            ? $function(...$args)
            : static fn (...$argsNext) => self::curryN($numberOfArguments - count($argsNext), $function, static::getArguments($args, $argsNext));
    }
}
