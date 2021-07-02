<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

$config = require __DIR__ . '/vendor/drupol/php-conventions/config/php73/php_cs_fixer.config.php';

$rules = $config->getRules();

$rules['strict_comparison'] = false;

return $config->setRules($rules);
