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
     * @psalm-pure
     *
     * @psalm-return pure-Closure(string): Closure(bool|numeric): Closure(bool|numeric): (bool|numeric)
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-return pure-Closure(bool|numeric): Closure(bool|numeric): (bool|numeric)
             */
            static fn (string $operator): Closure =>
                /**
                 * @psalm-param bool|numeric $left
                 *
                 * @psalm-return pure-Closure(bool|numeric): (bool|numeric)
                 */
                static fn ($left): Closure =>
                    /**
                     * @psalm-param bool|numeric $right
                     *
                     * @param mixed $right
                     *
                     * @psalm-return bool|int|numeric
                     *
                     * @psalm-suppress PossiblyInvalidOperand
                     */
                    static function ($right) use ($operator, $left): mixed {
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
