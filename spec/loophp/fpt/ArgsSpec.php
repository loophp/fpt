<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\Args;
use PhpSpec\ObjectBehavior;

class ArgsSpec extends ObjectBehavior
{
    public function it_can_get_a_specific_arguments()
    {
        $args = range('a', 'e');

        $this::of()(0)(2)(...$args)
            ->shouldReturn(['a', 'b']);

        $this::of()(1)(2)(...$args)
            ->shouldReturn([1 => 'b', 2 => 'c']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Args::class);
    }
}
