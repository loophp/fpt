<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

use function call_user_func;
use function call_user_func_array;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 */
final class Compose
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return static fn (callable ...$fs): Closure => Fold::of()(Compose::of1())(Identity::of())(...$fs);
    }

    private static function of1(): Closure
    {
        return static fn (callable $f): Closure => static fn (callable $g): Closure => static fn (...$x) => call_user_func($f, call_user_func_array($g, $x));
    }
}
