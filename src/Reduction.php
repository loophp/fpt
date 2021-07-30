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
 * @template TKey
 * @template T
 * @template U
 *
 * @psalm-immutable
 */
final class Reduction
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
                     */
                    static function (iterable $iterable) use ($callable, $accumulator): Generator {
                        foreach ($iterable as $key => $item) {
                            yield $key => $accumulator = $callable($accumulator, $item, $key, $iterable);
                        }
                    };
    }
}
