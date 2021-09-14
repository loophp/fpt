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
 * @immutable
 */
final class ComposeSimple
{
    /**
     * @pure
     */
    public static function of(): Closure
    {
        return
            static function (callable ...$fs): Closure {
                // Identity
                $initial = static fn ($v) => $v;

                foreach ($fs as $f) {
                    $initial = ComposeSimple::of1()($initial)($f);
                }

                return $initial;
            };
    }

    private static function of1(): Closure
    {
        return
            static fn (callable $f): Closure => static fn (callable $g): Closure => static fn (...$x): mixed => $f($g(...$x));
    }
}
