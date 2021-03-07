<?php

// phpcs:disable Generic.Files.LineLength.TooLong

declare(strict_types=1);

namespace Example;

use loophp\fpt\FPT;

$closure = static fn (string $first, string $second): string => sprintf('My cats names are %s and %s.', $first, $second);

$composedClosure = FPT::compose()('strtoupper', $closure);

$composedClosure('Izumi', 'Nakano'); // "MY CATS NAMES ARE IZUMI AND NAKANO."
