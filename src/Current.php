<?php

declare(strict_types=1);

namespace loophp\fpt;

use Closure;

// phpcs:disable Generic.Files.LineLength.TooLong

/**
 * @psalm-immutable
 *
 * @psalm-template T
 */
final class Current
{
    /**
     * @psalm-pure
     */
    public static function of(): Closure
    {
        return
            /**
             * @psalm-param T $ifEmpty
             *
             * @param mixed $ifEmpty
             */
            static function ($ifEmpty): Closure {
                return
                    /**
                     * @psalm-param iterable<T> $iterable
                     * @psalm-return ?T
                     */
                    static function (iterable $iterable) use ($ifEmpty) {
                        $current = $ifEmpty;

                        foreach ($iterable as $current) {
                            break;
                        }

                        return $current;
                    };
            };
    }
}
