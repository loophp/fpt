<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Closure;
use Generator;
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
     * @template T
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param positive-int|null $arity
             */
            static fn (callable $callable, ?int $arity = null): Closure =>
            /**
             * @psalm-param mixed ...$args
             *
             * @return mixed
             */
            static fn (...$args) => static::curryN(
                ($arity ?? (new ReflectionFunction($callable))->getNumberOfRequiredParameters()) - count($args),
                $callable,
                ...static::getArguments([], $args)
            );
    }

    /**
     * @psalm-pure
     *
     * @psalm-param list<mixed> $args
     * @psalm-param list<mixed> $argsNext
     *
     * @psalm-return Generator<int, mixed>
     */
    abstract protected static function getArguments(array $args = [], array $argsNext = []): Generator;

    /**
     * @return mixed
     */
    private static function curryN(int $numberOfArguments, callable $function, ...$args)
    {
        return (0 >= $numberOfArguments)
            ? $function(...$args)
            :
            /**
             * @psalm-param mixed ...$argsNext
             *
             * @return mixed
             */
            static fn (...$argsNext) => self::curryN($numberOfArguments - count($argsNext), $function, ...static::getArguments($args, $argsNext));
    }
}
