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
 */
final class Nary
{
    /**
     * @pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @param positive-int $count
             */
            static fn (int $count, int $offset = 0): Closure => static fn (callable $callable): Closure => static fn (mixed ...$args): mixed => $callable(...array_slice($args, $offset, $count));
    }
}
