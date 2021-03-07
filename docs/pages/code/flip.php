<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Example;

use loophp\fpt\FPT;

$f = static fn (string ...$x): string => implode('', $x);

$flip = FPT::flip()($f)('a', 'b', 'c'); // bac
