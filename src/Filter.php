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
 * @template TKey
 * @template T
 */
final class Filter
{
    /**
     * @pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @param callable(T, TKey, iterable<TKey, T>): bool $callable
             */
            static fn (callable $callable): Closure =>
                /**
                 * @param iterable<TKey, T> $iterable
                 *
                 * @return Generator<TKey, T>
                 */
                static function (iterable $iterable) use ($callable): Generator {
                    foreach ($iterable as $key => $value) {
                        if ($callable($value, $key, $iterable)) {
                            yield $key => $value;
                        }
                    }
                };
    }
}
