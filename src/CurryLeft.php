<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Generator;
use loophp\fpt\Contract\CurryAble;

/**
 * @psalm-immutable
 */
final class CurryLeft extends Curry implements CurryAble
{
    /**
     * @psalm-pure
     */
    protected static function getArguments(array $args = [], array $argsNext = []): Generator
    {
        return yield from [...$args, ...$argsNext];
    }
}
