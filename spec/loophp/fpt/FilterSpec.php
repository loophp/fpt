<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\Filter;
use PhpSpec\ObjectBehavior;

class FilterSpec extends ObjectBehavior
{
    public function it_can_filter()
    {
        $input = range(1, 10);
        $filter = static fn (int $int): bool => 0 === $int % 2;

        $this::of()($filter)($input)
            ->shouldIterateAs([1 => 2, 3 => 4, 5 => 6, 7 => 8, 9 => 10]);

        $input = range('a', 'e');
        $filter = static fn (string $value, int $key): bool => 0 === $key % 2;

        $this::of()($filter)($input)
            ->shouldIterateAs([0 => 'a', 2 => 'c', 4 => 'e']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Filter::class);
    }
}
