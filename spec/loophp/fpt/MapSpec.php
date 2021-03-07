<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\Map;
use PhpSpec\ObjectBehavior;

class MapSpec extends ObjectBehavior
{
    public function it_can_map()
    {
        $input = array_combine(range('a', 'e'), range(0, 4));
        $map = static fn (int $int, string $key): string => sprintf('Key: %s, Value: %s', $key, $int * 2);

        $this::of()($map)($input)
            ->shouldIterateAs([
                'a' => 'Key: a, Value: 0',
                'b' => 'Key: b, Value: 2',
                'c' => 'Key: c, Value: 4',
                'd' => 'Key: d, Value: 6',
                'e' => 'Key: e, Value: 8',
            ]);

        $input = array_combine(range('a', 'e'), range(0, 4));
        $map = static fn (int $int): int => $int * 2;

        $this::of()($map)($input)
            ->shouldIterateAs(['a' => 0, 'b' => 2, 'c' => 4, 'd' => 6, 'e' => 8]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Map::class);
    }
}
