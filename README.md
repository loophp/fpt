[![Latest Stable Version][latest stable version]][packagist fpt]
 [![GitHub stars][github stars]][packagist fpt]
 [![Total Downloads][total downloads]][packagist fpt]
 [![GitHub Workflow Status][github workflow status]][fpt actions]
 [![Scrutinizer code quality][code quality]][scrutinizer code quality]
 [![Type Coverage][type coverage]][sheperd type coverage]
 [![Code Coverage][code coverage]][scrutinizer code quality]
 [![License][license]][packagist fpt]
 [![Read the Docs][read the docs badge]][read the docs link]
 [![Donate!][donate github]][github sponsor]
 [![Donate!][donate paypal]][paypal sponsor]

# Functional Programming Toolbox

## Description

**F**unctional **P**rogramming **T**oolbox (***FPT** for the friends*) is a set of
stateless and immutable helper classes to facilitate the use of functional programming(*FP*) concepts.

This projects doesn't aim to transform PHP into a full featured FP language,
but it will helps users willing to use and understand a subset of FP concepts in
their own code.

## Installation

```shell
composer require loophp/fpt
```

## Usage

```php
<?php

declare(strict_types=1);

namespace Example;

include __DIR__ . '/vendor/autoload.php';

use loophp\fpt\FPT;

$closure = static fn (string $first, string $second): string => sprintf("My cats names are %s and %s.", $first, $second);

$composedClosure = FPT::compose()('strtoupper', $closure);

$composedClosure('Izumi', 'Nakano'); // "MY CATS NAMES ARE IZUMI AND NAKANO."
```

## Documentation

[The API][fpt api] will give you a pretty good idea of the existing methods and what
you can do with it.

I'm doing my best to keep the documentation up to date, if you found something odd,
please let me know in the [issue queue][fpt issue queue].

## Code quality, tests and benchmarks

Every time changes are introduced into the library, [Github][fpt actions] run the
tests.

The library has tests written with [PHPSpec][phpspec].
Feel free to check them out in the `spec` directory. Run `composer phpspec` to trigger the tests.

Before each commit some inspections are executed with [GrumPHP][grumphp],
run `composer grumphp` to check manually.

The quality of the tests is tested with [Infection][infection] a PHP Mutation testing
framework,  run `composer infection` to try it.

Static analysers are also controlling the code. [PHPStan][phpstan] and
[PSalm][psalm] are enabled to their maximum level.

## Contributing

Feel free to contribute by sending Github pull requests. I'm quite reactive :-)

If you can't contribute to the code, you can also sponsor me on [Github][github sponsor] or [Paypal][paypal sponsor].

## Changelog

See [CHANGELOG.md][changelog-md] for a changelog based on [git commits][git-commits].

For more detailed changelogs, please check [the release changelogs][changelog-releases].

## Thanks

The API documentation has been inspired by the [Ramda][http ramda] project.

[packagist fpt]: https://packagist.org/packages/loophp/fpt
[latest stable version]: https://img.shields.io/packagist/v/loophp/fpt.svg?style=flat-square
[github stars]: https://img.shields.io/github/stars/loophp/fpt.svg?style=flat-square
[total downloads]: https://img.shields.io/packagist/dt/loophp/fpt.svg?style=flat-square
[github workflow status]: https://img.shields.io/github/workflow/status/loophp/fpt/Unit%20tests?style=flat-square
[code quality]: https://img.shields.io/scrutinizer/quality/g/loophp/fpt/master.svg?style=flat-square
[scrutinizer code quality]: https://scrutinizer-ci.com/g/loophp/fpt/?branch=master
[type coverage]: https://img.shields.io/badge/dynamic/json?style=flat-square&color=color&label=Type%20coverage&query=message&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Floophp%2Ffpt%2Fcoverage
[sheperd type coverage]: https://shepherd.dev/github/loophp/fpt
[code coverage]: https://img.shields.io/scrutinizer/coverage/g/loophp/fpt/master.svg?style=flat-square
[license]: https://img.shields.io/packagist/l/loophp/fpt.svg?style=flat-square
[read the docs badge]: https://img.shields.io/readthedocs/loophp-fpt?style=flat-square
[read the docs link]: https://loophp-fpt.readthedocs.io/
[donate github]: https://img.shields.io/badge/Sponsor-Github-brightgreen.svg?style=flat-square
[donate paypal]: https://img.shields.io/badge/Sponsor-Paypal-brightgreen.svg?style=flat-square
[fpt documentation site]: https://loophp-fpt.rtfd.io
[fpt api]: https://loophp-fpt.readthedocs.io/en/latest/pages/api.html
[fpt usage]: https://loophp-fpt.readthedocs.io/en/latest/pages/usage.html
[fpt examples]: https://loophp-fpt.readthedocs.io/en/latest/pages/examples.html
[fpt issue queue]: https://github.com/loophp/fpt/issues
[fpt actions]: https://github.com/loophp/fpt/actions
[phpspec]: http://www.phpspec.net/
[grumphp]: https://github.com/phpro/grumphp
[infection]: https://github.com/infection/infection
[phpstan]: https://github.com/phpstan/phpstan
[psalm]: https://github.com/vimeo/psalm
[github sponsor]: https://github.com/sponsors/drupol
[paypal sponsor]: https://www.paypal.me/drupol
[changelog-md]: https://github.com/loophp/fpt/blob/master/CHANGELOG.md
[git-commits]: https://github.com/loophp/fpt/commits/master
[changelog-releases]: https://github.com/loophp/fpt/releases
[http ramda]: https://ramdajs.com/