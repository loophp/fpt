<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt\Contract;

use Closure;

interface FPTInterface
{
    /**
     * Performs right-to-left function composition.
     *
     * The last argument may have any arity; the remaining arguments must be unary.
     * The result of compose is not automatically curried.
     *
     * @pure
     */
    public static function compose(): Closure;

    /**
     * Returns a new function much like the supplied one,
     * except that the first two arguments' order is reversed.
     *
     * @pure
     */
    public static function flip(): Closure;

    /**
     * Returns a single item by iterating through the list,
     * successively calling the iterator function and
     * passing it an accumulator value and the current value from the array,
     * and then passing the result to the next call.
     *
     * @pure
     */
    public static function fold(): Closure;

    /**
     * A function that does nothing but return the parameter supplied to it.
     * Good as a default or placeholder function.
     *
     * @pure
     */
    public static function identity(): Closure;

    /**
     * Wraps a function of any arity (including nullary) in a function that accepts
     * exactly n parameters.
     * Any extraneous parameters will not be passed to the supplied function.
     *
     * @pure
     */
    public static function nary(): Closure;

    /**
     * @pure
     */
    public static function not(): Closure;

    /**
     * @pure
     */
    public static function operator(): Closure;

    /**
     * Creates a thunk out of a function.
     *
     * A thunk delays a calculation until its result is needed, providing lazy evaluation of arguments.
     *
     * @pure
     */
    public static function thunk(): Closure;

    /**
     * Returns a function of arity n from a curried function.
     *
     * @pure
     */
    public static function uncurry(): Closure;
}
