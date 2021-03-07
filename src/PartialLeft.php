<?php

declare(strict_types=1);

namespace loophp\fpt;

use loophp\fpt\Contract\PartialAble;

final class PartialLeft extends Partial implements PartialAble
{
    protected static function getArguments(array $argsA = [], array $argsB = []): array
    {
        return [...$argsB, ...$argsA];
    }
}
