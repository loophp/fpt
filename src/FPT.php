<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
     * @pure
     */
    public static function arg(): Closure
    {
        return Arg::of();
    }

    /**
     * @pure
     */
    public static function args(): Closure
    {
        return Args::of();
    }

    /**
     * @pure
     */
    public static function compose(): Closure
    {
        return Compose::of();
    }

    /**
     * @pure
     */
    public static function current(): Closure
    {
        return Current::of();
    }

    /**
     * @pure
     */
    public static function curry(): Closure
    {
        return Curry::of();
    }

    /**
     * @pure
     */
    public static function end(): Closure
    {
        return End::of();
    }

    /**
     * @pure
     */
    public static function filter(): Closure
    {
        return Filter::of();
    }

    /**
     * @pure
     */
    public static function flip(): Closure
    {
        return Flip::of();
    }

    /**
     * @pure
     */
    public static function fold(): Closure
    {
        return Fold::of();
    }

    /**
     * @pure
     *
     * @template T
     *
     * @return Closure(T): T
     */
    public static function identity(): Closure
    {
        return Identity::of();
    }

    /**
     * @pure
     *
     * @template TKey
     * @template T
     * @template U
     *
     * @return Closure(callable(T, TKey, iterable<TKey, T>): U)
     */
    public static function map(): Closure
    {
        return Map::of();
    }

    /**
     * @pure
     */
    public static function nary(): Closure
    {
        return Nary::of();
    }

    /**
     * @pure
     *
     * @template T
     * @template U
     *
     * @return Closure(callable(T...): U): Closure(mixed): bool
     */
    public static function not(): Closure
    {
        return Not::of();
    }

    /**
     * @pure
     */
    public static function operator(): Closure
    {
        return Operator::of();
    }

    /**
     * @pure
     */
    public static function reduce(): Closure
    {
        return Reduce::of();
    }

    /**
     * @pure
     */
    public static function reduction(): Closure
    {
        return Reduction::of();
    }

    /**
     * @pure
     */
    public static function thunk(): Closure
    {
        return Thunk::of();
    }

    /**
     * @pure
     */
    public static function uncurry(): Closure
    {
        return Uncurry::of();
    }

    /**
     * @pure
     */
    public static function wrap(): Closure
    {
        return Wrap::of();
    }
}
