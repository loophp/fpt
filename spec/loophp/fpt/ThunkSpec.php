<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\Thunk;
use PhpSpec\ObjectBehavior;

class ThunkSpec extends ObjectBehavior
{
    public function it_can_thunk()
    {
        $closure = static fn ($value) => $value;

        $this::of()($closure)
            ->shouldReturnAnInstanceOf(Closure::class);

        $this::of()($closure)('foo')('bar')
            ->shouldReturn('bar');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Thunk::class);
    }
}
