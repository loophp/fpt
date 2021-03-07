<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;
use Generator;

use function call_user_func;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 */
final class Map
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure => static function (iterable $iterable) use ($callable): Generator {
            foreach ($iterable as $key => $item) {
                yield $key => call_user_func($callable, $item, $key);
            }
        };
    }
}
