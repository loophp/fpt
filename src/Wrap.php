<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

/**
 * @psalm-immutable
 *
 * @psalm-template T
 */
final class Wrap
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param T ...$values
             *
             * @psalm-return list<T>
             */
            static fn (...$values): array => $values;
    }
}
