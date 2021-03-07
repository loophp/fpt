<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

use function call_user_func;

// phpcs:disable Generic.Files.LineLength.TooLong
final class Uncurry
{
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure => static fn ($x, $y) => call_user_func(call_user_func($callable, $x), $y);
    }
}
