<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

/**
 * Alternative name: C combinator - except that it is not curried.
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 *
 * @psalm-immutable
 */
final class Flip
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure =>
            /**
             * @no-named-arguments
             */
            static fn ($a, $b, ...$rest) => $callable($b, $a, ...$rest);
    }
}
