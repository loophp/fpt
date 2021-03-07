<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\CurryLeft;
use PhpSpec\ObjectBehavior;
use function func_get_args;

class CurryLeftSpec extends ObjectBehavior
{
    public function it_can_curry()
    {
        $closure = Closure::fromCallable('explode');

        $this::of()($closure)(':', 'a:b')
            ->shouldReturn([
                'a',
                'b',
            ]);

        $this::of()($closure)(':')('a:b', 1)
            ->shouldReturn([
                'a:b',
            ]);

        $closure = static fn ($a, $b, $c, $d) => implode('', func_get_args());

        $this::of()($closure)('d', 'e')('f', 'g')
            ->shouldReturn('defg');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CurryLeft::class);
    }
}
