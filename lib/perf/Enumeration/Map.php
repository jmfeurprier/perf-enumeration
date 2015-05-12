<?php

namespace perf\Enumeration;

/**
 *
 *
 */
class Map implements Enumeration
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
     * @var {string:mixed}
     */
    private $values = array();

    /**
     * Static constructor.
     *
     * @param {string:mixed} $values Key-value pairs.
     * @return Map
     */
    public static function createImmutable(array $values)
    {
        $map = new self();
        $map->immutable = true;
        $map->values    = $values;

        return $map;
    }

    /**
     * Static constructor.
     *
     * @param {string:mixed} $values Key-value pairs.
     * @return Map
     */
    public static function createMutable(array $values = array())
    {
        $map = new self();
        $map->immutable = false;
        $map->values    = $values;

        return $map;
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
     * @param string $key
     * @param mixed $value
     * @return Map
     */
    public function set($key, $value)
    {
        $this->assertMutable();

        $this->values[$key] = $value;

        return $this;
    }

    /**
     *
     *
     * @param string $key
     * @return Map
     */
    public function remove($key)
    {
        $this->assertMutable();

        unset($this->values[$key]);

        return $this;
    }

    /**
     *
     *
     * @param string $key
     * @return mixed
     * @throws NonExistentMapKeyException
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return $this->values[$key];
        }

        throw new NonExistentMapKeyException("No value for key '{$key}'.");
    }

    /**
     *
     *
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->values);
    }

    /**
     *
     *
     * @return bool
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
     * @throws NotMutableEnumerationException
     */
    private function assertMutable()
    {
        if ($this->immutable) {
            throw new NotMutableEnumerationException('Map is not mutable.');
        }
    }
}
