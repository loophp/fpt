<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\Nary;
use PhpSpec\ObjectBehavior;

class NarySpec extends ObjectBehavior
{
    public function it_can_nary_a_closure()
    {
        $closure = static fn (...$args): string => implode('', $args);

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
