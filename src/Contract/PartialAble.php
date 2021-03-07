<?php

declare(strict_types=1);

namespace loophp\fpt\Contract;

use Closure;

interface PartialAble
{
    public static function of(): Closure;
}
