<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\PartialLeft;
use PhpSpec\ObjectBehavior;
use function func_get_args;

class PartialLeftSpec extends ObjectBehavior
{
    public function it_can_partial()
    {
        $closure = Closure::fromCallable('explode');

        $this::of()($closure)('a:b', 2)(':')
            ->shouldReturn([
                'a',
                'b',
            ]);

        $this::of()($closure)(2)(':', 'a:b')
            ->shouldReturn([
                'a',
                'b',
            ]);

        $closure = static fn ($a = 'a', $b = 'b', $c = 'c', $d = 'd'): string => implode('', func_get_args());

        $this::of()($closure)('d', 'e')('f', 'g')
            ->shouldReturn('fgde');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PartialLeft::class);
    }
}
