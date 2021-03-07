<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Example;

use loophp\fpt\FPT;

$closure = static fn (string $left, string $right): bool => $left === $right;

$closure('a', 'b'); // false
$closure('a', 'a'); // true

$notClosure = FPT::not()($closure);
$notClosure('a', 'b'); // true

$notClosure = FPT::not()($closure);
$notClosure('a', 'a'); // false
