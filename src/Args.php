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
 * @psalm-template T
 */
final class Args
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param positive-int $index
             */
            static fn (int $offset): Closure =>
                /**
                 * @psalm-param positive-int $index
                 */
                static fn (int $length): Closure =>
                    /**
                     * @psalm-param T ...$args
                     *
                     * @psalm-return array<array-key, T>
                     */
                    static fn (...$args) => array_slice($args, $offset, $length, true);
    }
}
