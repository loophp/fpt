<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt;

use Closure;
use Generator;
use ReflectionFunction;

use function count;

/**
 * Stateless "Curry" application.
 *
 * @psalm-immutable
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class Curry
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @param Closure|callable-string $callable
             */
            static function (callable $callable, int $arity = 0, mixed ...$arguments): mixed {
                if (0 === $arity) {
                    $reflection = (new ReflectionFunction($callable));
                    $parameters = $reflection->getNumberOfParameters();
                    $requiredParameters = $reflection->getNumberOfRequiredParameters();
                }

                return self::curryN(
                    $callable,
                    $parameters ?? $arity,
                    $requiredParameters ?? $arity,
                    ...$arguments
                );
            };
    }

    /**
     * @param Closure|callable-string $callable
     */
    private static function curryN(callable $callable, int $parameters, int $requiredParameters, mixed ...$arguments): mixed
    {
        $countArguments = count($arguments);

        return match (true) {
            0 === $requiredParameters => static fn (): mixed => ($callable)(),
            $countArguments >= $parameters, $countArguments >= $requiredParameters => ($callable)(...$arguments),
            default => static fn (mixed ...$args): mixed => self::curryN($callable, $parameters, $requiredParameters, ...self::getArguments($arguments, $args))
        };
    }

    /**
     * @psalm-pure
     *
     * @psalm-param list<mixed> $args
     * @psalm-param list<mixed> $argsNext
     *
     * @psalm-return Generator<int, mixed>
     */
    private static function getArguments(array $args, array $argsNext): Generator
    {
        return yield from array_merge($args, $argsNext);
    }
}
