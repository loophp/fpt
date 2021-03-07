<?php

declare(strict_types=1);

namespace loophp\fpt;

use loophp\fpt\Contract\CurryAble;

final class CurryLeft extends Curry implements CurryAble
{
    protected static function getArguments(array $argsA = [], array $argsB = []): array
    {
        return [...$argsB, ...$argsA];
    }
}
