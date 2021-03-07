<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

/**
 * Alternative name: K combinator.
 *
 * @psalm-immutable
 *
 * @psalm-template T
 */
final class Thunk
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param T $value
             *
             * @psalm-return Closure(): T
             */
            static fn ($value): Closure => static fn () => $value;
    }
}
