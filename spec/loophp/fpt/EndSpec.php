<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\End;
use PhpSpec\ObjectBehavior;
use stdClass;

class EndSpec extends ObjectBehavior
{
    public function it_can_end()
    {
        $args = range('a', 'e');

        $this::of()(null)($args)
            ->shouldReturn('e');

        $foo = new stdClass();

        $this::of()($foo)([])
            ->shouldReturn($foo);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(End::class);
    }
}
