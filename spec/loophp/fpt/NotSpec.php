<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\Not;
use PhpSpec\ObjectBehavior;

class NotSpec extends ObjectBehavior
{
    public function it_can_not()
    {
        $closure = static fn (bool $flag): bool => $flag;

        $this::of()($closure)
            ->shouldReturnAnInstanceOf(Closure::class);

        $this::of()($closure)(true)
            ->shouldReturn(false);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Not::class);
    }
}
