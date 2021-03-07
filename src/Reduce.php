<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

use function call_user_func_array;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 */
final class Reduce
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn (callable $callable): Closure => static fn ($init = null): Closure => static function (iterable $iterable) use ($callable, $init) {
            foreach ($iterable as $key => $item) {
                $init = call_user_func_array($callable, [$init, $item, $key]);
            }

            return $init;
        };
    }
}
