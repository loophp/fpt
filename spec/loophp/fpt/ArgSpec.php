<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\Arg;
use PhpSpec\ObjectBehavior;

class ArgSpec extends ObjectBehavior
{
    public function it_can_get_a_specific_argument()
    {
        $args = range('a', 'e');

        $this::of()(1)(...$args)
            ->shouldReturn('b');

        $this::of()(0)(...$args)
            ->shouldReturn('a');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Arg::class);
    }
}
