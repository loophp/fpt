<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;
use Generator;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-template TKey
 * @psalm-template TKey of array-key
 * @psalm-template T
 * @psalm-template U
 *
 * @psalm-immutable
 */
final class Map
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param callable(T|U, TKey, iterable<TKey, T>): U ...$callables
             */
            static fn (callable ...$callables): Closure =>
                /**
                 * @psalm-param iterable<TKey, T> ...$iterables
                 *
                 * @psalm-return Generator<TKey, T|U>
                 */
                static function (iterable ...$iterables) use ($callables): Generator {
                    foreach ($iterables as $iterable) {
                        foreach ($iterable as $key => $item) {
                            yield $key => array_reduce(
                                $callables,
                                /**
                                 * @psalm-param T|U $accumulator
                                 * @psalm-param callable(T|U, TKey, iterable<TKey, T>): U $callback
                                 *
                                 * @psalm-return U
                                 */
                                static fn ($accumulator, callable $callback) => $callback($accumulator, $key, $iterable),
                                $item
                            );
                        }
                    }
                };
    }
}
