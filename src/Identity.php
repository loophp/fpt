<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

/**
 * Alternative name: I combinator.
 */
final class Identity
{
    public static function of(): Closure
    {
        return static fn ($value) => $value;
    }
}
