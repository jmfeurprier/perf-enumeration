perf-enumeration
================

This library allows to interact with specialized arrays: collections and maps, which can be declared mutable or immutable.

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

### Collections

#### Basic operations

```php
<?php

use perf\Enumeration\Collection;

$array = array(
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

if ($collection->has(1)) { // true
	$value = $collection->get(1); // 'bar'

	// ...
}

$firstValue = $collection->first(); // 'foo'

$lastValue = $collection->last(); // 'baz'

```

#### Iteration

```php
<?php

use perf\Enumeration\Collection;

$array = array(
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

### Maps

#### Basic operations

```php
<?php

use perf\Enumeration\Map;

$array = array(
	'foo' => 123,
	'bar' => 234,
	'baz' => 345,
);

$map = Map::createMutable($array);

if ($map->contains(123)) { // true
	// ...
}

if ($map->isEmpty()) { // false
	// ...
}

$size = $map->getSize(); // 3

if ($map->has('foo')) { // true
	$value = $map->get('foo'); // 123

	// ...
}

```

#### Iteration

```php
<?php

use perf\Enumeration\Map;

$array = array(
	'foo' => 123,
	'bar' => 234,
	'baz' => 345,
);

$map = Map::createImmutable($array);

foreach ($map as $pair) {
	$pair->key();   // 'foo', 'bar', 'baz'
	$pair->value(); // 123,   234,   345
	$pair->index(); // 0,     1,     2
	$pair->rank();  // 1,     2,     3
	$pair->odd();   // true,  false, true
	$pair->even();  // false, true,  false
	$pair->first(); // true,  false, false
	$pair->last();  // false, false, true
}

```
