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
final class Not
{
    /**
     * @pure
     *
     * @return Closure(callable(mixed...): mixed): Closure(mixed): bool
     */
    public static function of(): Closure
    {
        return
            /**
             * @param callable(mixed...): mixed $callable
             */
            static fn (callable $callable): Closure => static fn (mixed ...$args): bool => !$callable(...$args);
    }
}
