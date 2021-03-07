<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Example;

use loophp\fpt\FPT;

$closure = static fn (...$args): string => implode(';', $args);

$newClosure = FPT::nary()(1)($closure);
$newClosure('a', 'b'); // a

$newClosure = FPT::nary()(2)($closure);
$newClosure('a', 'b'); // a;b
