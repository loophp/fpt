<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 *
 * @psalm-template T
 */
final class Arg
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param positive-int $index
             */
            static fn (int $index): Closure =>
                /**
                 * @psalm-param T ...$args
                 *
                 * @psalm-return T
                 */
                static fn (...$args) => $args[$index];
    }
}
