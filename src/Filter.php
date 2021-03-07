<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;
use Generator;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 */
final class Filter
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn (callable ...$callables): Closure => static function (iterable ...$iterables) use ($callables): Generator {
            foreach ($iterables as $iterable) {
                foreach ($iterable as $key => $value) {
                    if (array_reduce($callables, static fn (bool $acc, callable $callback): bool => $acc || $callback($value, $key, $iterable), false)) {
                        yield $key => $value;
                    }
                }
            }
        };
    }
}
