<?php

$config = require __DIR__ . '/vendor/drupol/php-conventions/config/php73/php_cs_fixer.config.php';

$rules = $config->getRules();

$rules['strict_comparison'] = false;

return $config->setRules($rules);
