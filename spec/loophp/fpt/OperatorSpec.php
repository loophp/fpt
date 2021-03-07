<?php

declare(strict_types=1);

namespace spec\loophp\fpt;

use Closure;
use loophp\fpt\Operator;
use PhpSpec\ObjectBehavior;
use stdClass;

class OperatorSpec extends ObjectBehavior
{
    public function it_can_do_AND()
    {
        $this::of()(Operator::OP_AND)(true)(true)
            ->shouldReturn(true);
        $this::of()(Operator::OP_AND)(false)(true)
            ->shouldReturn(false);
        $this::of()(Operator::OP_AND)(true)(false)
            ->shouldReturn(false);
        $this::of()(Operator::OP_AND)(false)(false)
            ->shouldReturn(false);

        $this::of()('&&')(true)(true)
            ->shouldReturn(true);
        $this::of()('&&')(false)(true)
            ->shouldReturn(false);
        $this::of()('&&')(true)(false)
            ->shouldReturn(false);
        $this::of()('&&')(false)(false)
            ->shouldReturn(false);
    }

    public function it_can_do_BINARY_AND()
    {
        $this::of()(Operator::OP_BINARY_AND)(3)(7)
            ->shouldReturn(3);
        $this::of()(Operator::OP_BINARY_AND)(7)(3)
            ->shouldReturn(3);
        $this::of()(Operator::OP_BINARY_AND)(10)(5)
            ->shouldReturn(0);
        $this::of()(Operator::OP_BINARY_AND)(5)(10)
            ->shouldReturn(0);
    }

    public function it_can_do_BINARY_OR()
    {
        $this::of()(Operator::OP_BINARY_OR)(5)(2)
            ->shouldReturn(7);
        $this::of()(Operator::OP_BINARY_OR)(2)(5)
            ->shouldReturn(7);
    }

    public function it_can_do_BINARY_SHIFT_LEFT()
    {
        $this::of()(Operator::OP_BINARY_SHIFT_LEFT)(7)(1)
            ->shouldReturn(14);
    }

    public function it_can_do_BINARY_SHIFT_RIGHT()
    {
        $this::of()(Operator::OP_BINARY_SHIFT_RIGHT)(7)(1)
            ->shouldReturn(3);
    }

    public function it_can_do_BINARY_XOR()
    {
        $this::of()(Operator::OP_BINARY_XOR)(7)(5)
            ->shouldReturn(2);
    }

    public function it_can_do_DIV()
    {
        $this::of()(Operator::OP_DIV)(10)(5)
            ->shouldReturn(2);
    }

    public function it_can_do_EQUAL()
    {
        $id = uniqid('prefix', true);

        $this::of()(Operator::OP_EQUAL)($id)($id)
            ->shouldReturn(true);

        $this::of()(Operator::OP_EQUAL)('1')(1)
            ->shouldReturn(false);
    }

    public function it_can_do_EQUAL_LIKE()
    {
        $this::of()(Operator::OP_LIKE)('1')(1)
            ->shouldReturn(true);
    }

    public function it_can_do_GREATER_THAN()
    {
        $this::of()(Operator::OP_GT)(5)(2)
            ->shouldReturn(true);

        $this::of()(Operator::OP_GT)(2)(5)
            ->shouldReturn(false);

        $this::of()(Operator::OP_GT)(5)(5)
            ->shouldReturn(false);
    }

    public function it_can_do_GREATER_THAN_OR_EQUAL()
    {
        $this::of()(Operator::OP_GTE)(5)(2)
            ->shouldReturn(true);

        $this::of()(Operator::OP_GTE)(2)(5)
            ->shouldReturn(false);

        $this::of()(Operator::OP_GTE)(5)(5)
            ->shouldReturn(true);
    }

    public function it_can_do_INSTANCEOF()
    {
        $this::of()(Operator::OP_INSTANCEOF)(static fn () => 1)(Closure::class)
            ->shouldReturn(true);

        $this::of()(Operator::OP_INSTANCEOF)(static fn () => 1)(new stdClass())
            ->shouldReturn(false);
    }

    public function it_can_do_LOWER_THAN()
    {
        $this::of()(Operator::OP_LT)(5)(2)
            ->shouldReturn(false);

        $this::of()(Operator::OP_LT)(2)(5)
            ->shouldReturn(true);

        $this::of()(Operator::OP_LT)(5)(5)
            ->shouldReturn(false);
    }

    public function it_can_do_LOWER_THAN_OR_EQUAL()
    {
        $this::of()(Operator::OP_LTE)(5)(2)
            ->shouldReturn(false);

        $this::of()(Operator::OP_LTE)(2)(5)
            ->shouldReturn(true);

        $this::of()(Operator::OP_LTE)(5)(5)
            ->shouldReturn(true);
    }

    public function it_can_do_MINUS()
    {
        $this::of()(Operator::OP_MINUS)(5)(2)
            ->shouldReturn(3);

        $this::of()(Operator::OP_MINUS)(2)(5)
            ->shouldReturn(-3);

        $this::of()(Operator::OP_MINUS)(5)(5)
            ->shouldReturn(0);
    }

    public function it_can_do_MODULO()
    {
        $this::of()(Operator::OP_MODULO)(5)(2)
            ->shouldReturn(1);

        $this::of()(Operator::OP_MODULO)(2)(5)
            ->shouldReturn(2);

        $this::of()(Operator::OP_MODULO)(5)(5)
            ->shouldReturn(0);
    }

    public function it_can_do_MULT()
    {
        $this::of()(Operator::OP_MULT)(5)(2)
            ->shouldReturn(10);

        $this::of()(Operator::OP_MULT)(3)(4)
            ->shouldReturn(12);
    }

    public function it_can_do_NOT_EQUAL()
    {
        $this::of()(Operator::OP_NOT_EQUAL)(5)(2)
            ->shouldReturn(true);

        $this::of()(Operator::OP_NOT_EQUAL)(5)(5)
            ->shouldReturn(false);
    }

    public function it_can_do_NOT_EQUAL_LIKE()
    {
        $this::of()(Operator::OP_NOT_LIKE)(5)(2)
            ->shouldReturn(true);

        $this::of()(Operator::OP_NOT_LIKE)(5)(5)
            ->shouldReturn(false);

        $this::of()(Operator::OP_NOT_LIKE)('1')(1)
            ->shouldReturn(false);

        $this::of()('<>')('1')(1)
            ->shouldReturn(false);
    }

    public function it_can_do_OR()
    {
        $this::of()(Operator::OP_OR)(true)(true)
            ->shouldReturn(true);
        $this::of()(Operator::OP_OR)(false)(true)
            ->shouldReturn(true);
        $this::of()(Operator::OP_OR)(true)(false)
            ->shouldReturn(true);
        $this::of()(Operator::OP_OR)(false)(false)
            ->shouldReturn(false);

        $this::of()('||')(true)(true)
            ->shouldReturn(true);
        $this::of()('||')(false)(true)
            ->shouldReturn(true);
        $this::of()('||')(true)(false)
            ->shouldReturn(true);
        $this::of()('||')(false)(false)
            ->shouldReturn(false);
    }

    public function it_can_do_PLUS()
    {
        $this::of()(Operator::OP_PLUS)(5)(2)
            ->shouldReturn(7);

        $this::of()(Operator::OP_PLUS)(3)(4)
            ->shouldReturn(7);
    }

    public function it_can_do_SPACESHIP()
    {
        $this::of()(Operator::OP_SPACESHIP)(5)(2)
            ->shouldReturn(1);

        $this::of()(Operator::OP_SPACESHIP)(3)(4)
            ->shouldReturn(-1);

        $this::of()(Operator::OP_SPACESHIP)(3)(3)
            ->shouldReturn(0);
    }

    public function it_can_do_XOR()
    {
        $this::of()(Operator::OP_XOR)(true)(true)
            ->shouldReturn(false);
        $this::of()(Operator::OP_XOR)(false)(true)
            ->shouldReturn(true);
        $this::of()(Operator::OP_XOR)(true)(false)
            ->shouldReturn(true);
        $this::of()(Operator::OP_XOR)(false)(false)
            ->shouldReturn(false);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Operator::class);
    }
}
