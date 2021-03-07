<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;
use loophp\fpt\Contract\FPTInterface;

/**
 * @psalm-immutable
 */
final class FPT implements FPTInterface
{
    /**
     * @psalm-pure
     */
    public static function arg(): Closure
    {
        return Arg::of();
    }

    /**
     * @psalm-pure
     */
    public static function args(): Closure
    {
        return Args::of();
    }

    /**
     * @psalm-pure
     */
    public static function compose(): Closure
    {
        return Compose::of();
    }

    /**
     * @psalm-pure
     */
    public static function current(): Closure
    {
        return Current::of();
    }

    /**
     * @psalm-pure
     */
    public static function curryLeft(): Closure
    {
        return CurryLeft::of();
    }

    /**
     * @psalm-pure
     */
    public static function curryRight(): Closure
    {
        return CurryRight::of();
    }

    /**
     * @psalm-pure
     */
    public static function end(): Closure
    {
        return End::of();
    }

    /**
     * @psalm-pure
     */
    public static function filter(): Closure
    {
        return Filter::of();
    }

    /**
     * @psalm-pure
     */
    public static function flip(): Closure
    {
        return Flip::of();
    }

    /**
     * @psalm-pure
     */
    public static function fold(): Closure
    {
        return Fold::of();
    }

    /**
     * @psalm-pure
     */
    public static function identity(): Closure
    {
        return Identity::of();
    }

    /**
     * @psalm-pure
     */
    public static function map(): Closure
    {
        return Map::of();
    }

    /**
     * @psalm-pure
     */
    public static function nary(): Closure
    {
        return Nary::of();
    }

    /**
     * @psalm-pure
     */
    public static function not(): Closure
    {
        return Not::of();
    }

    /**
     * @psalm-pure
     */
    public static function operator(): Closure
    {
        return Operator::of();
    }

    /**
     * @psalm-pure
     */
    public static function partialLeft(): Closure
    {
        return PartialLeft::of();
    }

    /**
     * @psalm-pure
     */
    public static function partialRight(): Closure
    {
        return PartialRight::of();
    }

    /**
     * @psalm-pure
     */
    public static function reduce(): Closure
    {
        return Reduce::of();
    }

    /**
     * @psalm-pure
     */
    public static function reduction(): Closure
    {
        return Reduction::of();
    }

    /**
     * @psalm-pure
     */
    public static function thunk(): Closure
    {
        return Thunk::of();
    }

    /**
     * @psalm-pure
     */
    public static function uncurry(): Closure
    {
        return Uncurry::of();
    }

    /**
     * @psalm-pure
     */
    public static function wrap(): Closure
    {
        return Wrap::of();
    }
}
