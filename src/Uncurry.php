<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 */
final class Uncurry
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure => static fn (...$xs) => array_reduce($xs, static fn (callable $acc, $item) => $acc($item), $callable);
    }
}
