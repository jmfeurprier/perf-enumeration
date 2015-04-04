<?php

namespace perf\Enumeration;

/**
 *
 *
 */
interface Enumeration extends \IteratorAggregate
{

    /**
     *
     *
     * @param mixed $item
     * @return bool
     */
    public function contains($item);

    /**
     *
     *
     * @return int
     */
    public function size();

    /**
     *
     *
     * @return array
     */
    public function isEmpty();

    /**
     *
     *
     * @return array
     */
    public function toArray();

    /**
     *
     *
     * @param Enumeration $other
     * @return bool
     */
    public function equals(Enumeration $other);
}
