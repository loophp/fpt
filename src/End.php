<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 *
 * @template T
 * @template U
 */
final class End
{
    /**
     * @pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @param U $ifEmpty
             */
            static function (mixed $ifEmpty): Closure {
                return
                    /**
                     * @param iterable<T> $iterable
                     *
                     * @return T|U
                     */
                    static function (iterable $iterable) use ($ifEmpty): mixed {
                        foreach ($iterable as $ifEmpty) {
                        }

                        return $ifEmpty;
                    };
            };
    }
}
