<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Example;

include __DIR__ . '/../../../vendor/autoload.php';

use loophp\fpt\FPT;

$reducer = static fn (callable $a) => static fn (callable $b) => static fn (...$xs) => $a($b(...$xs));
$accumulator = static fn ($v): string => sprintf('[%s]', $v);
$callable = ['strtoupper', static fn ($s): string => sprintf('%s%s', $s, $s)];

FPT::fold()($reducer)($accumulator)(...$callable)('hello'); // [HELLOHELLO]
