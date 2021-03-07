<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\CurryRight;
use PhpSpec\ObjectBehavior;
use function func_get_args;

class CurryRightSpec extends ObjectBehavior
{
    public function it_can_curry()
    {
        $closure = Closure::fromCallable('explode');

        $this::of()($closure, 2)('a:b', ':')
            ->shouldReturn([
                'a',
                'b',
            ]);

        $this::of()($closure, 2)('a:b', ':')
            ->shouldReturn([
                'a',
                'b',
            ]);

        $closure = static fn ($a, $b, $c, $d): string => implode('', func_get_args());

        $this::of()($closure)('d', 'e')('f', 'g')
            ->shouldReturn('gfed');

        $closure = static fn (...$c) => implode('', $c);
        $curryRight = $this::of()($closure, 4);

        $curryRight('d', 'e')('f', 'g')
            ->shouldReturn('gfed');
        $curryRight('d', 'e', 'f')('g')
            ->shouldReturn('gfed');
        $curryRight('d', 'e', 'f')('g', 'h')
            ->shouldReturn('hgfed');

        $curryRight('a')('b')('c', 'd')
            ->shouldReturn('dcba');
        $curryRight('a')('b', 'c')('d')
            ->shouldReturn('dcba');
        $curryRight('a')('b')('c')('d')
            ->shouldReturn('dcba');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CurryRight::class);
    }
}
