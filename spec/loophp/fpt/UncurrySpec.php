<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\Uncurry;
use PhpSpec\ObjectBehavior;

class UncurrySpec extends ObjectBehavior
{
    public function it_can_uncurry()
    {
        $closure1 = static fn (string $a): Closure => static fn (string $b): string => implode('', [$a, $b]);

        $this::of()($closure1)('a', 'b')
            ->shouldReturn('ab');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Uncurry::class);
    }
}
