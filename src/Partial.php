<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
     *
     * @psalm-template T
     * @psalm-template U
     * @psalm-template V
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param callable(...T|U): V $callable
             */
            static fn (callable $callable): Closure =>
                /**
                 * @psalm-param T ...$args
                 */
                static fn (...$args): Closure =>
                    /**
                     * @psalm-param U ...$argsNext
                     *
                     * @psalm-return V
                     */
                    static fn (...$argsNext) => $callable(...static::getArguments($args, $argsNext));
    }

    /**
     * @psalm-pure
     *
     * @psalm-template T
     * @psalm-template U
     *
     * @psalm-param list<T> $args
     * @psalm-param list<U> $argsNext
     *
     * @psalm-return list<T|U>
     */
    abstract protected static function getArguments(array $args = [], array $argsNext = []): array;
}
