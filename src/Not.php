<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

use function call_user_func_array;

// phpcs:disable Generic.Files.LineLength.TooLong

final class Not
{
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure => static fn (...$args): bool => !call_user_func_array($callable, $args);
    }
}
