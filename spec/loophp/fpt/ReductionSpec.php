<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\fpt;

use Generator;
use loophp\fpt\Reduction;
use PhpSpec\ObjectBehavior;

class ReductionSpec extends ObjectBehavior
{
    public function it_can_reduction()
    {
        $inputs = range('a', 'f');

        $callback = static fn (string $acc, $item) => sprintf('[%s]', $item);

        $generator = static function (): Generator {
            yield 0 => '[a]';

            yield 1 => '[b]';

            yield 2 => '[c]';

            yield 3 => '[d]';

            yield 4 => '[e]';

            yield 5 => '[f]';
        };

        $this::of()($callback)('')($inputs)
            ->shouldIterateAs($generator());
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Reduction::class);
    }
}
