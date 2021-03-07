<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Example;

use loophp\fpt\FPT;

$curryRight = FPT::curryRight()('explode');

[$firstName, $lastName] = $curryRight('James Bond')(' ');

$curryRight = FPT::curryRight()('explode', 3);

[$evil, $good] = $curryRight(2)('Jaws,James,Bond')(',');
