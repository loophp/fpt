<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
        $callable = 'explode';

        $this::of()($callable)(':', 'a:b')
            ->shouldReturn([
                'a',
                'b',
            ]);

        $this::of()($callable)(':')('a:b', 1)
            ->shouldReturn([
                'a:b',
            ]);

        $this::of()($callable, 3)(':', 'a:b')
            ->shouldReturnAnInstanceOf(Closure::class);

        $this::of()($callable, 3)(':', 'a:b')(1)
            ->shouldReturn([
                'a:b',
            ]);

        $this::of()($callable)(':')('a:b', 1)
            ->shouldReturn([
                'a:b',
            ]);

        $this::of()($callable, 2)(':')('a:b', 1)
            ->shouldReturn([
                'a:b',
            ]);

        $this::of()($callable, 3)(':')('a:b', 1)
            ->shouldReturn([
                'a:b',
            ]);

        $closure = static fn ($a, $b, $c, $d) => implode('', func_get_args());

        $this::of()($closure)('d', 'e')('f', 'g')
            ->shouldReturn('defg');

        $closure = static fn (...$c) => implode('', $c);
        $curryLeft = $this::of()($closure, 4);

        $curryLeft('d', 'e')('f', 'g')
            ->shouldReturn('defg');
        $curryLeft('d', 'e', 'f')('g')
            ->shouldReturn('defg');
        $curryLeft('d', 'e', 'f')('g', 'h')
            ->shouldReturn('defgh');

        $curryLeft('a')('b')('c', 'd')
            ->shouldReturn('abcd');
        $curryLeft('a')('b', 'c')('d')
            ->shouldReturn('abcd');
        $curryLeft('a')('b')('c')('d')
            ->shouldReturn('abcd');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CurryLeft::class);
    }
}
