<?php

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
