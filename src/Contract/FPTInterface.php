<?php

declare(strict_types=1);

namespace loophp\fpt\Contract;

use Closure;

interface FPTInterface
{
    public static function compose(): Closure;

    public static function curryLeft(): Closure;

    public static function curryRight(): Closure;

    public static function flip(): Closure;

    public static function fold(): Closure;

    public static function identity(): Closure;

    public static function nary(): Closure;

    public static function not(): Closure;

    public static function operator(): Closure;

    public static function partialLeft(): Closure;

    public static function partialRight(): Closure;

    public static function thunk(): Closure;

    public static function uncurry(): Closure;
}
