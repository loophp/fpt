<?php

declare(strict_types=1);

namespace Example;

use loophp\fpt\FPT;

$curryRight = FPT::curryRight()('explode');

[$firstName, $lastName] = $curryRight('James Bond')(' ');

$curryRight = FPT::curryRight()('explode', 3);

[$evil, $good] = $curryRight(2)('Jaws,James,Bond')(',');
