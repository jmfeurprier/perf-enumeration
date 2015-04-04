<?php

namespace perf\Enumeration;

/**
 *
 *
 */
class Collection implements Enumeration
{

    /**
     *
     *
     * @var bool
     */
    private $immutable;

    /**
     *
     *
     * @var mixed[]
     */
    private $values = array();

    /**
     * Static constructor.
     *
     * @param mixed[] $values Key-value pairs.
     * @return Collection
     */
    public static function createImmutable(array $values)
    {
        $collection = new self();
        $collection->immutable = true;
        $collection->values    = array_values($values);

        return $collection;
    }

    /**
     * Static constructor.
     *
     * @param mixed[] $values Key-value pairs.
     * @return Collection
     */
    public static function createMutable(array $values = array())
    {
        $collection = new self();
        $collection->immutable = false;
        $collection->values    = array_values($values);

        return $collection;
    }

    /**
     * Constructor.
     *
     * @return void
     */
    private function __construct()
    {
    }

    /**
     *
     *
     * @return \Traversable
     */
    public function getIterator()
    {
        return EnumerationIterator::create($this->values);
    }

    /**
     *
     *
     * @param mixed $value
     * @return bool
     */
    public function contains($value)
    {
        return in_array($value, $this->values, true);
    }

    /**
     *
     *
     * @param mixed $value
     * @return Collection Fluent return.
     */
    public function pushBack($value)
    {
        $this->assertMutable();

        $this->values[] = $value;

        return $this;
    }

    /**
     *
     *
     * @param mixed $value
     * @return Collection Fluent return.
     */
    public function pushFront($value)
    {
        $this->assertMutable();

        array_unshift($this->values, $value);

        return $this;
    }

    /**
     *
     *
     * @return mixed
     * @throws \UnderflowException
     */
    public function popBack()
    {
        $this->assertMutable();

        if (count($this->values) > 0) {
            return array_pop($this->values);
        }

        throw new \UnderflowException();
    }

    /**
     *
     *
     * @return mixed
     * @throws \UnderflowException
     */
    public function popFront()
    {
        $this->assertMutable();

        if (count($this->values) > 0) {
            return array_shift($this->values);
        }

        throw new \UnderflowException();
    }

    /**
     *
     *
     * @param int $index
     * @return mixed
     * @throws \DomainException
     */
    public function get($index)
    {
        if ($this->has($index)) {
            return $this->values[$index];
        }

        throw new \DomainException("No value for index '{$index}'.");
    }

    /**
     *
     *
     * @param int $index
     * @return bool
     */
    public function has($index)
    {
        return array_key_exists($index, $this->values);
    }

    /**
     *
     *
     * @return mixed
     * @throws \UnderflowException
     */
    public function first()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException();
        }

        return reset($this->values);
    }

    /**
     *
     *
     * @return mixed
     * @throws \UnderflowException
     */
    public function last()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException();
        }

        return end($this->values);
    }

    /**
     *
     *
     * @return int
     */
    public function isEmpty()
    {
        return ($this->size() < 1);
    }

    /**
     *
     *
     * @return int
     */
    public function size()
    {
        return count($this->values);
    }

    /**
     *
     *
     * @return array
     */
    public function toArray()
    {
        return $this->values;
    }

    /**
     *
     *
     * @param Enumeration $other
     * @return bool
     */
    public function equals(Enumeration $other)
    {
        return (($other instanceof self) && ($other->values === $this->values));
    }

    /**
     *
     *
     * @return void
     * @throws \RuntimeException
     */
    private function assertMutable()
    {
        if ($this->immutable) {
            throw new \RuntimeException('Collection is not mutable.');
        }
    }
}
