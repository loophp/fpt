<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use Generator;
use loophp\fpt\Reduction;
use PhpSpec\ObjectBehavior;

class ReductionSpec extends ObjectBehavior
{
    public function it_can_reduction()
    {
        $inputs = [
            range('a', 'c'),
            range('d', 'f'),
        ];

        $callbacks = [
            static fn (string $acc, $item) => sprintf('%s%s', $item, $item),
            static fn (string $acc, $item) => sprintf('[%s]', $acc),
        ];

        $generator = static function (): Generator {
            yield 0 => '[aa]';

            yield 1 => '[bb]';

            yield 2 => '[cc]';

            yield 0 => '[dd]';

            yield 1 => '[ee]';

            yield 2 => '[ff]';
        };

        $this::of()(...$callbacks)('')(...$inputs)
            ->shouldIterateAs($generator());
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Reduction::class);
    }
}
