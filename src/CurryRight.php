<?php

declare(strict_types=1);

namespace loophp\fpt;

use loophp\fpt\Contract\CurryAble;

/**
 * @psalm-immutable
 */
final class CurryRight extends Curry implements CurryAble
{
    /**
     * @psalm-pure
     */
    protected static function getArguments(array $args = [], array $argsNext = []): array
    {
        return [...array_reverse($argsNext), ...$args];
    }
}
