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
                    static function ($right) use ($operator, $left) {
                        switch ($operator) {
                                    case self::OP_AND:
                                    case '&&':
                                        return $left && $right;

                                    case self::OP_MINUS:
                                        return $left - $right;

                                    case self::OP_PLUS:
                                        return $left + $right;

                                    case self::OP_MODULO:
                                        return $left % $right;

                                    case self::OP_DIV:
                                        return $left / $right;

                                    case self::OP_MULT:
                                        return $left * $right;

                                    case self::OP_OR:
                                    case '||':
                                        return $left || $right;

                                    case self::OP_XOR:
                                        return $left xor $right;

                                    case '<<':
                                        return $left << $right;

                                    case '>>':
                                        return $left >> $right;

                                    case '&':
                                        return $left & $right;

                                    case '|':
                                        return $left | $right;

                                    case '^':
                                        return $left ^ $right;

                                    case '>':
                                        return $left > $right;

                                    case '>=':
                                        return $left >= $right;

                                    case '<':
                                        return $left < $right;

                                    case '<=':
                                        return $left <= $right;

                                    case 'instanceof':
                                        return $left instanceof $right;

                                    case '!==':
                                        return $left !== $right;

                                    case '!=':
                                    case '<>':
                                        return $left != $right;

                                    case '===':
                                        return $left === $right;

                                    case '==':
                                        return $left == $right;

                                    case '<=>':
                                        return $left <=> $right;
                        }

                        throw new InvalidArgumentException('Unable to find the operator.');
                    };
    }
}
