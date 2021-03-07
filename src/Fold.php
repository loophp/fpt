<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

// phpcs:disable Generic.Files.LineLength.TooLong

final class Fold
{
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure => static fn (callable $acc): Closure => static fn (callable ...$xs) => array_reduce($xs, Uncurry::of()($callable), $acc);
    }
}
