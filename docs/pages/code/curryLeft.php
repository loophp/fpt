<?php

declare(strict_types=1);

namespace Example;

use loophp\fpt\FPT;

$curryLeft = FPT::curryLeft()('explode');

[$firstName, $lastName] = $curryLeft(' ')('James Bond');

$curriedLeft = FPT::curryLeft()('explode', 3);

[$evil, $good] = $curriedLeft(',')('Jaws,James,Bond')(2);
