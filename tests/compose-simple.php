<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

use loophp\fpt\ComposeSimple;

include __DIR__ . '/../vendor/autoload.php';

$stringToInt = static fn (string $n): int => (int) $n;
$intToBool = static fn (int $n): bool => 0 === $n % 2;
$boolToInt = static fn (bool $n): int => (int) $n;
$intToString = static fn (int $n): string => 0 === $n ? 'zero' : 'one';

function compose_check_string(string $data): void
{
    var_dump($data);
}

function compose_check_int(int $data): void
{
    var_dump($data);
}

compose_check_string(
    ComposeSimple::of()($intToString, $boolToInt, $intToBool, $stringToInt)('50') // 'one'
);

compose_check_int(
    ComposeSimple::of()($boolToInt, $intToBool, $stringToInt)('51') // 0
);
