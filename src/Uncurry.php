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
 */
final class Uncurry
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure =>
        /**
         * @psalm-param mixed ...$xs
         */
        static fn (...$xs) => array_reduce(
            $xs,
            /**
             * @psalm-param mixed $item
             *
             * @return mixed
             */
            static fn (callable $acc, $item) => $acc($item),
            $callable
        );
    }
}
