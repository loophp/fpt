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

use function array_slice;
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
     * @pure
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
                    $arity = $parameters === $requiredParameters ? $parameters : $arity;
                }

                return self::curryN(
                    $callable,
                    $arity,
                    $parameters ?? $arity,
                    $requiredParameters ?? $arity,
                    ...$arguments
                );
            };
    }

    /**
     * @param Closure|callable-string $callable
     */
    private static function curryN(callable $callable, int $arity, int $parameters, int $requiredParameters, mixed ...$arguments): mixed
    {
        $countArguments = count($arguments);

        return match (true) {
            0 === $requiredParameters => static fn (): mixed => ($callable)(),
            $countArguments >= $parameters, $countArguments >= $requiredParameters => ($callable)(...array_slice($arguments, 0, 0 !== $arity ? $arity : $countArguments)),
            default => static fn (mixed ...$args): mixed => self::curryN($callable, $arity, $parameters, $requiredParameters, ...self::getArguments($arguments, $args))
        };
    }

    /**
     * @pure
     *
     * @param list<mixed> $args
     * @param list<mixed> $argsNext
     *
     * @return Generator<int, mixed>
     */
    private static function getArguments(array $args, array $argsNext): Generator
    {
        return yield from array_merge($args, $argsNext);
    }
}
