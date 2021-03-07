Functional Programming Toolbox
==============================

Functional Programming Toolbox (**FPT** for the friends) is a set of
stateless helper classes to facilitate the use of functional programming concepts.

Documentation
-------------

The API will give you a pretty good idea of the existing
methods and what you can do with it.

I'm doing my best to keep the documentation up to date, if you found
something odd, please let me know in the issue queue.

Code quality, tests and benchmarks
----------------------------------

Every time changes are introduced into the library, Github run the tests.

The library has tests written with PHPSpec. Feel free to
check them out in the ``spec`` directory. Run ``composer phpspec`` to
trigger the tests.

Before each commit some inspections are executed with
GrumPHP, run ``composer grumphp`` to check manually.

The quality of the tests is tested with Infection a PHP
Mutation testing framework, run ``composer infection`` to try it.

Static analysers are also controlling the code. PHPStan and PSalm are
enabled to their maximum level.

Contributing
------------

Feel free to contribute by sending Github pull requests. I'm quite
reactive :-)

If you can't contribute to the code, you can also sponsor me on
Github or Paypal.

Changelog
---------

See CHANGELOG.md for a changelog based on git commits.

For more detailed changelogs, please check the release changelogs.

.. toctree::
    :hidden:

    FPT <self>

.. toctree::
   :hidden:
   :caption: Table of Contents

   Requirements <pages/requirements>
   Installation <pages/installation>
   Usage <pages/usage>
   API <pages/api>
   Tests <pages/tests>
   Contributing <pages/contributing>
