.. _api:

API
===

Static constructors
-------------------

compose
~~~~~~~

Performs right-to-left function composition. The last argument may have any arity; the remaining arguments must be unary.

.. warning:: The result of `compose` is not automatically curried.

.. literalinclude:: code/compose.php
  :language: php

curryLeft
~~~~~~~~~

Returns a curried equivalent of the provided function.

.. literalinclude:: code/curryLeft.php
  :language: php

curryRight
~~~~~~~~~~

Returns a curried equivalent of the provided function.

.. literalinclude:: code/curryRight.php
  :language: php

filter
~~~~~~

flip
~~~~

Returns a new function much like the supplied one, except that the first two arguments' order is reversed.

.. literalinclude:: code/flip.php
  :language: php

fold
~~~~

Returns a single item by iterating through the list,
successively calling the reducer function and passing it an accumulator value and
the current value from the array, and then passing the result to the next call.

The iterator function receives two values: ``$acc`` and ``$value``.

.. literalinclude:: code/fold.php
  :language: php

identity
~~~~~~~~

A function that does nothing but return the parameter supplied to it.

.. literalinclude:: code/identity.php
  :language: php

map
~~~

Takes a function and an iterable, applies the function to each of the iterable values,
and yield the result.

.. literalinclude:: code/map.php
  :language: php

nary
~~~~

Wraps a function of any arity in a function that accepts exactly n parameters. Any extraneous parameters will not be passed to the supplied function.

.. literalinclude:: code/nary.php
  :language: php

not
~~~

Wraps a function in a function that returns the ! of the original function return value.

.. literalinclude:: code/not.php
  :language: php

operator
~~~~~~~~

Apply an operator on two arguments.

This method is curried and take first the operator, then its left and right members.

Available operators are constants in Operator class.

.. literalinclude:: code/operator.php
  :language: php

partialLeft
~~~~~~~~~~~

partialRight
~~~~~~~~~~~~

reduce
~~~~~~

thunk
~~~~~

uncurry
~~~~~~~
