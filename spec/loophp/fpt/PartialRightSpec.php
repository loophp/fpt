<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\PartialRight;
use PhpSpec\ObjectBehavior;
use function func_get_args;

class PartialRightSpec extends ObjectBehavior
{
    public function it_can_partial()
    {
        $closure = Closure::fromCallable('explode');

        $closure = static fn ($a = 'a', $b = 'b', $c = 'c', $d = 'd') => implode('', func_get_args());

        $this::of()($closure)('d', 'e')('f', 'g')
            ->shouldReturn('defg');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PartialRight::class);
    }
}
