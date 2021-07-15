<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\fpt;

use loophp\fpt\Curry;
use PhpSpec\ObjectBehavior;
use function count;
use function func_get_args;

class CurrySpec extends ObjectBehavior
{
    public function it_can_curry_a_binary_method_and_provide_more_parameters_than_needed()
    {
        $this::of()('explode')(':', 'a:b:c')
            ->shouldReturn(['a', 'b', 'c']);

        $this::of()('explode')(':', 'a:b:c', 2)
            ->shouldReturn(['a', 'b:c']);

        $this::of()('explode', 2)(':', 'a:b:c')
            ->shouldReturn(['a', 'b', 'c']);

        // Last argument is ignored.
        $this::of()('explode', 2)(':', 'a:b:c', 2)
            ->shouldReturn(['a', 'b', 'c']);

        // Last argument is ignored.
        $this::of()('explode', 2)(':', 'a:b:c', 3)
            ->shouldReturn(['a', 'b', 'c']);
    }

    public function it_can_curry_a_method_and_automatically_set_the_arity_based_on_parameters_and_required_parameters()
    {
        $this::of()('is_iterable')(['a', 'b', 'c'])
            ->shouldReturn(true);
    }

    public function it_can_curry_a_method_and_provide_the_right_amount_of_parameters_when_the_arity_is_set()
    {
        $fun = static fn ($a, $b, ...$rest): int => count(func_get_args());

        $this::of()($fun)('a', 'b', 'c', 'd', 'e')
            ->shouldReturn(5);

        $this::of()($fun, 2)('a', 'b', 'c', 'd', 'e')
            ->shouldReturn(2);
    }

    public function it_can_curry_a_method_with_a_multiple_arguments()
    {
        $this::of()('explode')(',')('a,b,c')
            ->shouldReturn([
                'a',
                'b',
                'c',
            ]);

        $this::of()('explode')(',', 'a,b,c')
            ->shouldReturn([
                'a',
                'b',
                'c',
            ]);
    }

    public function it_can_curry_a_method_with_a_multiple_arguments_with_arity()
    {
        $this::of()('explode', 3)(',')('a,b,c')(2)
            ->shouldReturn([
                'a',
                'b,c',
            ]);

        $this::of()('explode', 3)(',', 'a,b,c', 2)
            ->shouldReturn([
                'a',
                'b,c',
            ]);
    }

    public function it_can_curry_a_method_with_a_single_argument()
    {
        $this::of()('strtoupper')('strtoupper')
            ->shouldReturn('STRTOUPPER');

        $this::of()('strtoupper', 1)('strtoupper')
            ->shouldReturn('STRTOUPPER');
    }

    public function it_can_curry_a_method_with_no_argument()
    {
        $fun = static fn (): string => 'hello world';

        $this::of()($fun)()
            ->shouldReturn('hello world');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Curry::class);
    }
}
