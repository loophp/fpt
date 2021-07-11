<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

/**
 * @psalm-immutable
 *
 * @psalm-template T
 */
final class Wrap
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn (mixed ...$values): array => $values;
    }
}
