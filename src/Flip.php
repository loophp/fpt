<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

/**
 * Alternative name: C combinator - except that it is not curried.
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 *
 * @psalm-template T
 * @psalm-template U
 * @psalm-template V
 * @psalm-template W
 *
 * @psalm-immutable
 */
final class Flip
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param callable(U, T, ...V): W $callable
             *
             * @psalm-return callable(T, U, ...V): W
             */
            static fn (callable $callable): Closure =>
                /**
                 * @psalm-param T $a
                 * @psalm-param U $b
                 * @psalm-param V ...$rest
                 *
                 * @no-named-arguments
                 */
                static fn ($a, $b, ...$rest) => $callable($b, $a, ...$rest);
    }
}
