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
final class Map
{
    /**
     * @psalm-pure
     *
     * @psalm-return Closure(callable(T, TKey, iterable<TKey, T>): U)
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param callable(T, TKey, iterable<TKey, T>): U $callable
             */
            static fn (callable $callable): Closure =>
                /**
                 * @psalm-param iterable<TKey, T> $iterable
                 *
                 * @psalm-return Generator<TKey, U>
                 */
                static function (iterable $iterable) use ($callable): Generator {
                    foreach ($iterable as $key => $item) {
                        yield $key => $callable($item, $key, $iterable);
                    }
                };
    }
}
