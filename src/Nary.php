<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

use function array_slice;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 */
final class Nary
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param positive-int $count
             */
            static fn (int $count, int $offset = 0): Closure => static fn (callable $callable): Closure => static fn (...$args) => $callable(...array_slice($args, $offset, $count));
    }
}
