<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

/**
 * Alternative name: K combinator.
 */
final class Thunk
{
    public static function of(): Closure
    {
        return static fn ($value): Closure => static fn () => $value;
    }
}
