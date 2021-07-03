<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Generator;
use loophp\fpt\Contract\PartialAble;

/**
 * @psalm-immutable
 */
final class PartialRight extends Partial implements PartialAble
{
    /**
     * @psalm-pure
     *
     * @psalm-template T
     * @psalm-template U
     *
     * @psalm-param list<T> $args
     * @psalm-param list<U> $argsNext
     *
     * @psalm-return Generator<int, T|U>
     */
    protected static function getArguments(array $args = [], array $argsNext = []): Generator
    {
        return yield from [...$args, ...$argsNext];
    }
}
