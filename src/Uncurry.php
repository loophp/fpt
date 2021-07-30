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
     * @pure
     */
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure => static fn (mixed ...$xs): mixed => array_reduce(
            $xs,
            static fn (callable $acc, mixed $item): mixed => $acc($item),
            $callable
        );
    }
}
