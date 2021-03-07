<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\Flip;
use PhpSpec\ObjectBehavior;

class FlipSpec extends ObjectBehavior
{
    public function it_can_flip()
    {
        $closure = static fn ($left, $right) => $left / $right;

        $this::of()($closure)(1, 2)
            ->shouldReturn(2);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Flip::class);
    }
}
