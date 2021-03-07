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
final class Reduce
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
                     *
                     * @psalm-return U
                     */
                    static function (iterable ...$iterables) use ($callables, $accumulator) {
                        return FPT::end()($accumulator)(FPT::reduction()(...$callables)($accumulator)(...$iterables));
                    };
    }
}
