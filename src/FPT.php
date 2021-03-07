<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;
use loophp\fpt\Contract\FPTInterface;

final class FPT implements FPTInterface
{
    public static function compose(): Closure
    {
        return Compose::of();
    }

    public static function curryLeft(): Closure
    {
        return CurryLeft::of();
    }

    public static function curryRight(): Closure
    {
        return CurryRight::of();
    }

    public static function flip(): Closure
    {
        return Flip::of();
    }

    public static function fold(): Closure
    {
        return Fold::of();
    }

    public static function identity(): Closure
    {
        return Identity::of();
    }

    public static function nary(): Closure
    {
        return Nary::of();
    }

    public static function not(): Closure
    {
        return Not::of();
    }

    public static function operator(): Closure
    {
        return Operator::of();
    }

    public static function partialLeft(): Closure
    {
        return PartialLeft::of();
    }

    public static function partialRight(): Closure
    {
        return PartialRight::of();
    }

    public static function thunk(): Closure
    {
        return Thunk::of();
    }

    public static function uncurry(): Closure
    {
        return Uncurry::of();
    }
}
