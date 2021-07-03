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
 * @psalm-template TKey
 * @psalm-template T
 * @psalm-template U
 *
 * @psalm-immutable
 */
final class Reduce
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param callable(U, T, TKey, iterable<TKey, T>): U $callable
             */
            static fn (callable $callable): Closure =>
                /**
                 * @psalm-param U $accumulator
                 */
                static fn ($accumulator): Closure =>
                    /**
                     * @psalm-param iterable<TKey, T> $iterable
                     *
                     * @psalm-return U
                     */
                    static fn (iterable $iterable) => FPT::end()($accumulator)(FPT::reduction()($callable)($accumulator)($iterable));
    }
}
