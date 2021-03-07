<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Closure;
use Generator;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-template TKey
 * @psalm-template T
 * @psalm-template U
 *
 * @psalm-immutable
 */
final class Reduction
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param callable(U, T, TKey, iterable<TKey, T>): U ...$callables
             */
            static fn (callable ...$callables): Closure =>
                /**
                 * @psalm-param U $accumulator
                 */
                static fn ($accumulator): Closure =>
                    /**
                     * @psalm-param iterable<TKey, T> ...$iterables
                     */
                    static function (iterable ...$iterables) use ($callables, $accumulator): Generator {
                        foreach ($iterables as $iterable) {
                            foreach ($iterable as $key => $item) {
                                yield $key => ($accumulator = array_reduce(
                                    $callables,
                                    /**
                                     * @psalm-param U $accumulator
                                     * @psalm-param callable(U, T, TKey, iterable<TKey, T>): U $callback
                                     *
                                     * @psalm-return U
                                     */
                                    static fn ($accumulator, callable $callback) => $callback($accumulator, $item, $key, $iterable),
                                    $accumulator
                                ));
                            }
                        }
                    };
    }
}
