<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

use function array_slice;

// phpcs:disable Generic.Files.LineLength.TooLong

final class Nary
{
    public static function of(): Closure
    {
        return static fn (int $count, int $offset = 0): Closure => static fn (callable $callable): Closure => static fn (...$args) => $callable(...array_slice($args, $offset, $count));
    }
}
