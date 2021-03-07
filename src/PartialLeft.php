<?php

declare(strict_types=1);

namespace loophp\fpt;

use loophp\fpt\Contract\PartialAble;

/**
 * @psalm-immutable
 */
final class PartialLeft extends Partial implements PartialAble
{
    /**
     * @psalm-pure
     */
    protected static function getArguments(array $args = [], array $argsNext = []): array
    {
        return [...$argsNext, ...$args];
    }
}
