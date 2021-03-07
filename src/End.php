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
 * @psalm-template T
 * @psalm-template U
 */
final class End
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @param mixed $ifEmpty
             * @psalm-param U $ifEmpty
             */
            static function ($ifEmpty): Closure {
                return
                    /**
                     * @psalm-param iterable<T> $iterable
                     * @psalm-return T|U
                     */
                    static function (iterable $iterable) use ($ifEmpty) {
                        foreach ($iterable as $ifEmpty) {
                        }

                        return $ifEmpty;
                    };
            };
    }
}
