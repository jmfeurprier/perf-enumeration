<?php

namespace perf\Enumeration;

/**
 *
 *
 */
class EnumerationIterator implements \Iterator
{

    const RANK_FIRST = 1;

    /**
     *
     *
     * @var {int|string:mixed}
     */
    private $items;

    /**
     *
     *
     * @var int
     */
    private $rank = self::RANK_FIRST;

    /**
     *
     *
     * @var int
     */
    private $count;

    /**
     * Constructor.
     *
     * @param {int|string:mixed} $items
     * @return EnumerationIterator
     */
    public static function create(array $items)
    {
        return new self($items);
    }

    /**
     * Constructor.
     *
     * @param {int|string:mixed} $items
     * @return void
     */
    private function __construct(array $items)
    {
        $this->items = $items;
        $this->count = count($items);
    }

    /**
     *
     *
     * @return EnumerationPair
     */
    public function current()
    {
        return new EnumerationPair(
            $this->key(),
            current($this->items),
            $this->rank,
            $this->count
        );
    }

    /**
     *
     *
     * @return void
     */
    public function next()
    {
        next($this->items);

        ++$this->rank;
    }

    /**
     *
     *
     * @return int|string
     */
    public function key()
    {
        return key($this->items);
    }

    /**
     *
     *
     * @return bool
     */
    public function valid()
    {
        return ($this->rank <= $this->count);
    }

    /**
     *
     *
     * @return void
     */
    public function rewind()
    {
        reset($this->items);

        $this->rank = self::RANK_FIRST;
    }
}
