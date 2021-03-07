<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 */
final class Fold
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn (callable $reducer): Closure => static fn (callable $acc): Closure => static fn (callable ...$xs) => array_reduce($xs, Uncurry::of()($reducer), $acc);
    }
}
