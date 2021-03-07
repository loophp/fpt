<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\Identity;
use PhpSpec\ObjectBehavior;

class IdentitySpec extends ObjectBehavior
{
    public function it_can_identity()
    {
        $value = 'foobar';

        $this::of()
            ->shouldBeAnInstanceOf(Closure::class);

        $this::of()($value)
            ->shouldReturn($value);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Identity::class);
    }
}
