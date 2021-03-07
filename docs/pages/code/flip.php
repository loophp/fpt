<?php

declare(strict_types=1);

namespace Example;

use loophp\fpt\FPT;

$f = static fn (string ...$x): string => implode('', $x);

$flip = FPT::flip()($f)('a', 'b', 'c'); // bac
