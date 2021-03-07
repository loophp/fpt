<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

/**
 * Alternative name: K combinator.
 *
 * @psalm-immutable
 */
final class Thunk
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn ($value): Closure => static fn () => $value;
    }
}
