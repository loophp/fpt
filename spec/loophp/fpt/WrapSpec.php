<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\Wrap;
use PhpSpec\ObjectBehavior;

class WrapSpec extends ObjectBehavior
{
    public function it_can_wrap()
    {
        $args = range('a', 'e');

        $this::of()(...$args)
            ->shouldReturn($args);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Wrap::class);
    }
}
