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
 *
 * @template T
 * @template U
 * @template V
 */
final class Compose
{
    /**
     * @pure
     */
    public static function of(): Closure
    {
        return Fold::of()(Compose::of1())(Identity::of());
    }

    /**
     * @pure
     */
    private static function of1(): Closure
    {
        return
            /**
             * @param callable(U): V $f
             */
            static fn (callable $f): Closure =>
            /**
             * @param callable(...T): U $g
             */
            static fn (callable $g): Closure =>
            /**
             * @param T ...$x
             *
             * @return V
             */
            static fn (...$x): mixed => $f($g(...$x));
    }
}
