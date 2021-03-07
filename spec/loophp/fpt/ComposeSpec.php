<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\Compose;
use PhpSpec\ObjectBehavior;

class ComposeSpec extends ObjectBehavior
{
    public function it_can_compose()
    {
        $closure1 = static fn (int $i): int => $i + 1;
        $closure2 = static fn (int $i): int => $i * 10;

        $this::of()(
            $closure1,
            $closure2,
        )(3)
            ->shouldReturn(31);

        $this::of()(
            $closure2,
            $closure1,
        )(3)
            ->shouldReturn(40);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Compose::class);
    }
}
