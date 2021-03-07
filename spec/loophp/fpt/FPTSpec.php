<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\FPT;
use PhpSpec\ObjectBehavior;
use stdClass;

use function func_get_args;

class FPTSpec extends ObjectBehavior
{
    public function it_arg()
    {
        $args = range('a', 'e');

        $this::arg()(1)(...$args)
            ->shouldReturn('b');

        $this::arg()(0)(...$args)
            ->shouldReturn('a');
    }

    public function it_can_get_a_specific_arguments()
    {
        $args = range('a', 'e');

        $this::args()(0)(2)(...$args)
            ->shouldReturn(['a', 'b']);

        $this::args()(1)(2)(...$args)
            ->shouldReturn([1 => 'b', 2 => 'c']);
    }

    public function it_can_wrap()
    {
        $args = range('a', 'e');

        $this::wrap()(...$args)
            ->shouldReturn($args);
    }

    public function it_compose()
    {
        $closure1 = static fn (int $i): int => $i + 1;
        $closure2 = static fn (int $i): int => $i * 10;

        $this::compose()(
            $closure1,
            $closure2,
        )(3)
            ->shouldReturn(31);

        $this::compose()(
            $closure2,
            $closure1,
        )(3)
            ->shouldReturn(40);
    }

    public function it_current()
    {
        $args = range('a', 'e');

        $this::current()(null)($args)
            ->shouldReturn('a');

        $foo = new stdClass();

        $this::current()($foo)([])
            ->shouldReturn($foo);
    }

    public function it_curryLeft()
    {
        $closure = 'explode';

        $this::curryLeft()($closure)(':', 'a:b')
            ->shouldReturn([
                'a',
                'b',
            ]);

        $this::curryLeft()($closure)(':')('a:b', 1)
            ->shouldReturn([
                'a:b',
            ]);

        $closure = static fn ($a, $b, $c, $d): string => implode('', func_get_args());

        $this::curryLeft()($closure)('d', 'e')('f', 'g')
            ->shouldReturn('defg');
    }

    public function it_curryRight()
    {
        $closure = 'explode';

        $this::curryRight()($closure)('a:b', ':')
            ->shouldReturn([
                'a',
                'b',
            ]);

        $this::curryRight()($closure)(1)('a:b', ':')
            ->shouldReturn([
                'a:b',
            ]);

        $closure = static fn ($a, $b, $c, $d): string => implode('', func_get_args());

        $this::curryRight()($closure)('d', 'e')('f', 'g')
            ->shouldReturn('gfed');
    }

    public function it_end()
    {
        $args = range('a', 'e');

        $this::end()(null)($args)
            ->shouldReturn('e');

        $ifEmpty = new stdClass();

        $this::end()($ifEmpty)([])
            ->shouldReturn($ifEmpty);
    }

    public function it_filter()
    {
        $input = range(1, 10);
        $filter = static fn (int $int): bool => 0 === $int % 2;

        $this::filter()($filter)($input)
            ->shouldIterateAs([1 => 2, 3 => 4, 5 => 6, 7 => 8, 9 => 10]);
    }

    public function it_flip()
    {
        $closure = static fn ($left, $right) => $left / $right;

        $this::flip()($closure)(1, 2)
            ->shouldReturn(2);
    }

    public function it_fold()
    {
        $reducer = static fn (callable $a) => static fn (callable $b) => static fn (...$xs) => $a($b(...$xs));
        $accumulator = static fn ($v) => '[' . $v . ']';
        $callable = ['strtoupper', static fn ($s) => $s . $s];

        $this::fold()($reducer)($accumulator)(...$callable)('hello')
            ->shouldReturn('[HELLOHELLO]');
    }

    public function it_identity()
    {
        $value = 'foobar';

        $this::identity()($value)
            ->shouldReturn($value);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(FPT::class);
    }

    public function it_map()
    {
        $input = array_combine(range('a', 'e'), range(0, 4));
        $map = static fn (int $int): int => $int * 2;

        $this::map()($map)($input)
            ->shouldIterateAs(['a' => 0, 'b' => 2, 'c' => 4, 'd' => 6, 'e' => 8]);
    }

    public function it_nary()
    {
        $closure = static fn ($a = 'a', $b = 'b', $c = 'c'): string => implode('', func_get_args());

        $this::nary()(1)($closure)
            ->shouldReturnAnInstanceOf(Closure::class);

        $this::nary()(1)($closure)('a', 'b', 'c')
            ->shouldReturn('a');

        $this::nary()(2)($closure)('d', 'e', 'f')
            ->shouldReturn('de');

        $this::nary()(3)($closure)('d', 'e', 'f')
            ->shouldReturn('def');

        $this::nary()(1, 1)($closure)('d', 'e', 'f')
            ->shouldReturn('e');

        $this::nary()(1, 2)($closure)('d', 'e', 'f')
            ->shouldReturn('f');
    }

    public function it_not()
    {
        $closure = static fn (bool $flag): bool => $flag;

        $this::not()($closure)
            ->shouldReturnAnInstanceOf(Closure::class);

        $this::not()($closure)(true)
            ->shouldReturn(false);
    }

    public function it_operator()
    {
        $this::operator()
            ->shouldReturnAnInstanceOf(Closure::class);
    }

    public function it_partialLeft()
    {
        $closure = 'explode';

        $this::partialLeft()($closure)('a:b', 2)(':')
            ->shouldReturn([
                'a',
                'b',
            ]);

        $this::partialLeft()($closure)(2)(':', 'a:b')
            ->shouldReturn([
                'a',
                'b',
            ]);

        $closure = static fn ($a = 'a', $b = 'b', $c = 'c', $d = 'd'): string => implode('', func_get_args());

        $this::partialLeft()($closure)('d', 'e')('f', 'g')
            ->shouldReturn('fgde');
    }

    public function it_partialRight()
    {
        $closure = 'explode';

        $closure = static fn ($a = 'a', $b = 'b', $c = 'c', $d = 'd'): string => implode('', func_get_args());

        $this::partialRight()($closure)('d', 'e')('f', 'g')
            ->shouldReturn('defg');
    }

    public function it_reduce()
    {
        $input = range(0, 5);
        $reducer = static fn (int $acc, int $int): int => $int + $acc;

        $this::reduce()($reducer)(0)($input)
            ->shouldReturn(15);

        $init = new stdClass();
        $this::reduce()($reducer)($init)([])
            ->shouldReturn($init);
    }

    public function it_thunk()
    {
        $closure = static fn ($value) => $value;

        $this::thunk()($closure)
            ->shouldReturnAnInstanceOf(Closure::class);

        $this::thunk()($closure)('foo')('bar')
            ->shouldReturn('bar');
    }

    public function it_uncurry()
    {
        $closure1 = static fn (string $a): Closure => static fn (string $b): string => implode('', [$a, $b]);

        $this::uncurry()($closure1)('a', 'b')
            ->shouldReturn('ab');
    }
}
