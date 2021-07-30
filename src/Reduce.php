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
 * @template TKey
 * @template T
 * @template U
 *
 * @psalm-immutable
 */
final class Reduce
{
    /**
     * @pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @param callable(U, T, TKey, iterable<TKey, T>): U $callable
             */
            static fn (callable $callable): Closure =>
                /**
                 * @param U $accumulator
                 */
                static fn ($accumulator): Closure =>
                    /**
                     * @param iterable<TKey, T> $iterable
                     *
                     * @return U
                     */
                    static fn (iterable $iterable): mixed => FPT::end()($accumulator)(FPT::reduction()($callable)($accumulator)($iterable));
    }
}
