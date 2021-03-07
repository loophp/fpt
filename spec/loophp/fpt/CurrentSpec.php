<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\Current;
use PhpSpec\ObjectBehavior;
use stdClass;

class CurrentSpec extends ObjectBehavior
{
    public function it_can_current()
    {
        $args = range('a', 'e');

        $this::of()(null)($args)
            ->shouldReturn('a');

        $foo = new stdClass();

        $this::of()($foo)([])
            ->shouldReturn($foo);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Current::class);
    }
}
