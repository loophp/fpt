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
 */
final class Arg
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
            static fn (int $index): Closure => static fn (mixed ...$args): mixed => $args[$index];
    }
}
