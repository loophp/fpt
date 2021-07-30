<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Closure;
use InvalidArgumentException;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 */
final class Operator
{
    public const OP_AND = 'and';

    public const OP_BINARY_AND = '&';

    public const OP_BINARY_OR = '|';

    public const OP_BINARY_SHIFT_LEFT = '<<';

    public const OP_BINARY_SHIFT_RIGHT = '>>';

    public const OP_BINARY_XOR = '^';

    public const OP_DIV = '/';

    public const OP_EQUAL = '===';

    public const OP_GT = '>';

    public const OP_GTE = '>=';

    public const OP_INSTANCEOF = 'instanceof';

    public const OP_LIKE = '==';

    public const OP_LT = '<';

    public const OP_LTE = '<=';

    public const OP_MINUS = '-';

    public const OP_MODULO = '%';

    public const OP_MULT = '*';

    public const OP_NOT_EQUAL = '!==';

    public const OP_NOT_LIKE = '!=';

    public const OP_OR = 'or';

    public const OP_PLUS = '+';

    public const OP_SPACESHIP = '<=>';

    public const OP_XOR = 'xor';

    /**
     * @pure
     *
     * @return pure-Closure(string): Closure(mixed): Closure(mixed): (bool|int|numeric)
     */
    public static function of(): Closure
    {
        return
            /**
             * @return pure-Closure(mixed): Closure(mixed): (bool|int|numeric)
             */
            static fn (string $operator): Closure =>
                /**
                 * @param mixed $left
                 *
                 * @return pure-Closure(mixed): (bool|int|numeric)
                 */
                static fn (mixed $left): Closure =>
                    /**
                     * @return bool|int|numeric
                     *
                     * @psalm-suppress PossiblyInvalidOperand
                     * @psalm-suppress InvalidOperand
                     */
                    static function (mixed $right) use ($operator, $left): mixed {
                        return match ($operator) {
                            self::OP_AND, '&&' => $left && $right,
                            self::OP_MINUS => $left - $right,
                            self::OP_PLUS => $left + $right,
                            self::OP_MODULO => $left % $right,
                            self::OP_DIV => $left / $right,
                            self::OP_MULT => $left * $right,
                            self::OP_OR, '||' => $left || $right,
                            self::OP_XOR => $left xor $right,
                            '<<' => $left << $right,
                            '>>' => $left >> $right,
                            '&' => $left & $right,
                            '|' => $left | $right,
                            '^' => $left ^ $right,
                            '>' => $left > $right,
                            '>=' => $left >= $right,
                            '<' => $left < $right,
                            '<=' => $left <= $right,
                            'instanceof' => $left instanceof $right,
                            '!==' => $left !== $right,
                            '!=', '<>' => $left != $right,
                            '===' => $left === $right,
                            '==' => $left == $right,
                            '<=>' => $left <=> $right,
                            default => throw new InvalidArgumentException('Unable to find the operator.')
                        };
                    };
    }
}
