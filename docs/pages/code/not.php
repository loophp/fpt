<?php

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
