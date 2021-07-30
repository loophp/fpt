<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

use function array_slice;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 *
 * @template T
 */
final class Args
{
    /**
     * @pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @param positive-int $index
             */
            static fn (int $offset): Closure =>
                /**
                 * @param positive-int $index
                 */
                static fn (int $length): Closure =>
                    /**
                     * @param T ...$args
                     *
                     * @return array<array-key, T>
                     */
                    static fn (...$args): array => array_slice($args, $offset, $length, true);
    }
}
