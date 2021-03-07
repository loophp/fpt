<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-template TKey
 * @psalm-template TKey of array-key
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
                    static function (iterable ...$iterables) use ($callables, $accumulator) {
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
