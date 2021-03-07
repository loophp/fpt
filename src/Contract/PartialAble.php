<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt\Contract;

use Closure;

interface PartialAble
{
    public static function of(): Closure;
}
