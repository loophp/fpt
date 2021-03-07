<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\Reduce;
use PhpSpec\ObjectBehavior;
use stdClass;

class ReduceSpec extends ObjectBehavior
{
    public function it_can_reduce()
    {
        $input = range('a', 'e');
        $reducer = static fn (string $acc, string $value, int $key): string => sprintf('%s[k%sv%s]', $acc, $key, $value);

        $this::of()($reducer)('')($input)
            ->shouldReturn('[k0va][k1vb][k2vc][k3vd][k4ve]');

        $init = new stdClass();
        $this::of()($reducer)($init)([])
            ->shouldReturn($init);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Reduce::class);
    }
}
