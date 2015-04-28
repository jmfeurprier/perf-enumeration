perf-enumeration
================

This library allows to interact with specialized arrays: collections and maps, which can be declared as mutable or immutable.

Collections are arrays which consist of a list of values, with numeric indexes (keys).
Maps are arrays which consist of key-value pairs.
When a collection or a map is declared "mutable", it is allowed to alter its content (ie, add, set or remove values).
When a collection or a map is declared "immutable", it is not allowed to alter its content.

## Installation & Requirements

There are no dependencies on other libraries.

Install with [Composer](http://getcomposer.org):

```json
{
	"require":
	{
		"perf-enumeration" : "~1.0"
	}
}
```

## Usage

1. Collections

1.1. Basic operations

```php
<?php

use perf\Enumeration\Collection;

$array = (
	'foo',
	'bar',
	'baz',
);

$collection = Collection::createMutable($array);

if ($collection->contains('bar')) { // true
	// ...
}

if ($collection->isEmpty()) { // false
	// ...
}

$size = $collection->getSize(); // 3

if ($collection->has(1)) {
	$value = $collection->get(1); // 'bar'

	// ...
}

$firstValue = $collection->first(); // 'foo'

$lastValue = $collection->last(); // 'baz'

```

1.2. Iteration

```php
<?php

use perf\Enumeration\Collection;

$array = (
	'foo',
	'bar',
	'baz',
);

$collection = Collection::createImmutable($array);

foreach ($collection as $pair) {
	$pair->key();   // 0,     1,     2
	$pair->value(); // 'foo', 'bar', 'baz'
	$pair->index(); // 0,     1,     2
	$pair->rank();  // 1,     2,     3
	$pair->odd();   // true,  false, true
	$pair->even();  // false, true,  false
	$pair->first(); // true,  false, false
	$pair->last();  // false, false, true
}

```
