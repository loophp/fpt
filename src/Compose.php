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
 * @psalm-template T
 * @psalm-template U
 * @psalm-template V
 */
final class Compose
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return Fold::of()(Compose::of1())(Identity::of());
    }

    private static function of1(): Closure
    {
        return
            /**
             * @psalm-param callable(U): V $f
             */
            static fn (callable $f): Closure =>
            /**
             * @psalm-param callable(...T): U $g
             */
            static fn (callable $g): Closure =>
            /**
             * @psalm-param T ...$x
             *
             * @psalm-return V
             */
            static fn (...$x): mixed => $f($g(...$x));
    }
}
