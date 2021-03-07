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
        $closure = static fn (string $a): Closure => static fn (string $b): Closure => static fn (string $c): string => implode('', [$a, $b, $c]);

        $this::of()($closure)('a', 'b', 'c')
            ->shouldReturn('abc');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Uncurry::class);
    }
}
