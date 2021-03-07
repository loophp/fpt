<?php

declare(strict_types=1);

namespace Example;

use loophp\fpt\FPT;
use loophp\fpt\Operator;

FPT::operator()(Operator::OP_PLUS)(40)(2); // 42
