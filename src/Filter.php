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
        return static fn (callable $callable): Closure => static function (iterable $iterable) use ($callable): Generator {
            foreach ($iterable as $key => $value) {
                if ($callable($value, $key)) {
                    yield $key => $value;
                }
            }
        };
    }
}
