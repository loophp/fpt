<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

use function call_user_func_array;

/**
 * Alternative name: C combinator - except that it is not curried.
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 *
 * @psalm-immutable
 */
final class Flip
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure => static fn ($a, $b, ...$rest) => call_user_func_array($callable, [$b, $a, ...$rest]);
    }
}
