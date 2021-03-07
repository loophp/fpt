[![Latest Stable Version][latest stable version]][packagist fpt]
 [![GitHub stars][github stars]][packagist fpt]
 [![Total Downloads][total downloads]][packagist fpt]
 [![GitHub Workflow Status][github workflow status]][fpt actions]
 [![Scrutinizer code quality][code quality]][scrutinizer code quality]
 [![Type Coverage][type coverage]][sheperd type coverage]
 [![Code Coverage][code coverage]][scrutinizer code quality]
 [![License][license]][packagist fpt]
 [![Donate!][donate github]][github sponsor]
 [![Donate!][donate paypal]][paypal sponsor]

# Functional Programming Toolbox

## Description

**F**unctional **P**rogramming **T**oolbox (***FPT** for the friends*) is a set of
stateless helper classes to facilitate the use of functional programming concepts.

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

[PHP Insights][php insights] is also launched in Github actions just for
information. (_[example of PHP Insights report][php insights report], you must be logged on Github to see it_)

## Contributing

Feel free to contribute by sending Github pull requests. I'm quite reactive :-)

If you can't contribute to the code, you can also sponsor me on [Github][github sponsor] or [Paypal][paypal sponsor].

## On the internet


## Changelog

See [CHANGELOG.md][changelog-md] for a changelog based on [git commits][git-commits].

For more detailed changelogs, please check [the release changelogs][changelog-releases].

[packagist fpt]: https://packagist.org/packages/loophp/fpt
[latest stable version]: https://img.shields.io/packagist/v/loophp/fpt.svg?style=flat-square
[github stars]: https://img.shields.io/github/stars/loophp/fpt.svg?style=flat-square
[total downloads]: https://img.shields.io/packagist/dt/loophp/fpt.svg?style=flat-square
[github workflow status]: https://img.shields.io/github/workflow/status/loophp/fpt/Unit%20tests?style=flat-square
[code quality]: https://img.shields.io/scrutinizer/quality/g/loophp/fpt/master.svg?style=flat-square
[scrutinizer code quality]: https://scrutinizer-ci.com/g/loophp/fpt/?branch=master
[type coverage]: https://shepherd.dev/github/loophp/fpt/coverage.svg
[sheperd type coverage]: https://shepherd.dev/github/loophp/fpt
[code coverage]: https://img.shields.io/scrutinizer/coverage/g/loophp/fpt/master.svg?style=flat-square
[license]: https://img.shields.io/packagist/l/loophp/fpt.svg?style=flat-square
[donate github]: https://img.shields.io/badge/Sponsor-Github-brightgreen.svg?style=flat-square
[donate paypal]: https://img.shields.io/badge/Sponsor-Paypal-brightgreen.svg?style=flat-square
[pure function on wikipedia]: https://en.wikipedia.org/wiki/Pure_function
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
[php insights]: https://packagist.org/packages/nunomaduro/phpinsights
[php insights report]: https://github.com/loophp/fpt/runs/818917887?check_suite_focus=true#step:11:221
[github sponsor]: https://github.com/sponsors/drupol
[paypal sponsor]: https://www.paypal.me/drupol
[changelog-md]: https://github.com/loophp/fpt/blob/master/CHANGELOG.md
[git-commits]: https://github.com/loophp/fpt/commits/master
[changelog-releases]: https://github.com/loophp/fpt/releases
