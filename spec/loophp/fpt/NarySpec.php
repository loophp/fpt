<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\Nary;
use PhpSpec\ObjectBehavior;
use function func_get_args;

class NarySpec extends ObjectBehavior
{
    public function it_can_nary_a_closure()
    {
        $closure = static fn ($a = 'a', $b = 'b', $c = 'c'): string => implode('', func_get_args());

        $this::of()(1)($closure)
            ->shouldReturnAnInstanceOf(Closure::class);

        $this::of()(1)($closure)('a', 'b', 'c')
            ->shouldReturn('a');

        $this::of()(2)($closure)('d', 'e', 'f')
            ->shouldReturn('de');

        $this::of()(3)($closure)('d', 'e', 'f')
            ->shouldReturn('def');

        $this::of()(1, 1)($closure)('d', 'e', 'f')
            ->shouldReturn('e');

        $this::of()(1, 2)($closure)('d', 'e', 'f')
            ->shouldReturn('f');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Nary::class);
    }
}
