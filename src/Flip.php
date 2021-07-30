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
 * @template T
 * @template U
 * @template V
 * @template W
 *
 * @psalm-immutable
 */
final class Flip
{
    /**
     * @pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @param callable(U, T, ...V): W $callable
             *
             * @return callable(T, U, ...V): W
             */
            static fn (callable $callable): Closure =>
                /**
                 * @param T $a
                 * @param U $b
                 * @param V ...$rest
                 *
                 * @no-named-arguments
                 */
                static fn ($a, $b, ...$rest): mixed => $callable($b, $a, ...$rest);
    }
}
