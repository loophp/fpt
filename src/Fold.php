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
final class Fold
{
    /**
     * @pure
     */
    public static function of(): Closure
    {
        return static fn (callable $reducer): Closure => static fn (callable $acc): Closure => static fn (callable ...$xs): Closure => array_reduce($xs, Uncurry::of()($reducer), $acc);
    }
}
