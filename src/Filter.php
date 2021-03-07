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
 * @psalm-immutable
 *
 * @psalm-template TKey
 * @psalm-template T
 */
final class Filter
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param callable(T, TKey, iterable<TKey, T>): bool ...$callables
             */
            static fn (callable ...$callables): Closure =>
                /**
                 * @psalm-param iterable<TKey, T> ...$iterables
                 *
                 * @psalm-return Generator<TKey, T>
                 */
                static function (iterable ...$iterables) use ($callables): Generator {
                    foreach ($iterables as $iterable) {
                        foreach ($iterable as $key => $value) {
                            if (array_reduce($callables, static fn (bool $acc, callable $callback): bool => $acc || $callback($value, $key, $iterable), false)) {
                                yield $key => $value;
                            }
                        }
                    }
                };
    }
}
