<?php

namespace perf\Enumeration;

/**
 *
 *
 */
class EnumerationPair
{

    /**
     *
     *
     * @var int|string
     */
    private $key;

    /**
     *
     *
     * @var mixed
     */
    private $value;

    /**
     *
     *
     * @var int
     */
    private $rank;

    /**
     *
     *
     * @var int
     */
    private $count;

    /**
     * Constructor.
     *
     * @param int|string $key
     * @param mixed $value
     * @param int $rank
     * @param int $count
     * @return void
     */
    public function __construct($key, $value, $rank, $count)
    {
        $this->key   = $key;
        $this->value = $value;
        $this->rank  = $rank;
        $this->count = $count;
    }

    /**
     *
     *
     * @return int|string
     */
    public function key()
    {
        return $this->key;
    }

    /**
     *
     *
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     *
     *
     * @return int
     */
    public function index()
    {
        return ($this->rank - 1);
    }

    /**
     *
     *
     * @return int
     */
    public function rank()
    {
        return $this->rank;
    }

    /**
     *
     *
     * @return bool
     */
    public function odd()
    {
        return (1 === ($this->rank % 2));
    }

    /**
     *
     *
     * @return bool
     */
    public function even()
    {
        return (0 === ($this->rank % 2));
    }

    /**
     *
     *
     * @return bool
     */
    public function first()
    {
        return (1 === $this->rank);
    }

    /**
     *
     *
     * @return bool
     */
    public function last()
    {
        return ($this->count === $this->rank);
    }
}
