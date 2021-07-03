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
             * @psalm-param callable(T, TKey, iterable<TKey, T>): bool $callable
             */
            static fn (callable $callable): Closure =>
                /**
                 * @psalm-param iterable<TKey, T> $iterable
                 *
                 * @psalm-return Generator<TKey, T>
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
