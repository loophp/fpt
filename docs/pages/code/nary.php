<?php

declare(strict_types=1);

namespace Example;

use loophp\fpt\FPT;

$closure = static fn (...$args): string => implode(';', $args);

$newClosure = FPT::nary()(1)($closure);
$newClosure('a', 'b'); // a

$newClosure = FPT::nary()(2)($closure);
$newClosure('a', 'b'); // a;b
