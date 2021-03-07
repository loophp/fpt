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
final class Not
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param callable(...T): U $callable
             */
            static fn (callable $callable): Closure =>
                /**
                 * @psalm-param T ...$args
                 */
                static fn (...$args): bool => !$callable(...$args);
    }
}
