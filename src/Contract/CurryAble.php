<?php

declare(strict_types=1);

namespace loophp\fpt\Contract;

use Closure;

interface CurryAble
{
    public static function of(): Closure;
}
