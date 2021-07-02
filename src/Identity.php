<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

/**
 * Alternative name: I combinator.
 *
 * @psalm-immutable
 *
 * @psalm-template T
 */
final class Identity
{
    /**
     * @psalm-pure
     *
     * @psalm-return Closure(T): T
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param T $value
             *
             * @psalm-return T
             */
            static fn ($value) => $value;
    }
}
