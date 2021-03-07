<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\Fold;
use PhpSpec\ObjectBehavior;

class FoldSpec extends ObjectBehavior
{
    public function it_fold()
    {
        $reducer = static fn (callable $a) => static fn (callable $b) => static fn (...$xs) => $a($b(...$xs));
        $accumulator = static fn ($v) => '[' . $v . ']';
        $callable = ['strtoupper', static fn ($s) => $s . $s];

        $this::of()($reducer)($accumulator)(...$callable)('hello')
            ->shouldReturn('[HELLOHELLO]');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Fold::class);
    }
}
