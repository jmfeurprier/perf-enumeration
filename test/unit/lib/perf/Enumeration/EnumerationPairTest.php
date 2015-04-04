<?php

namespace perf\Enumeration;

/**
 *
 */
class EnumerationPairTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testConstructor()
    {
        $key = 'key';
        $value = 'value';
        $rank = 2;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);
    }

    /**
     *
     */
    public function testKey()
    {
        $key = 'key';
        $value = 'value';
        $rank = 2;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $this->assertEquals($key, $pair->key());
    }

    /**
     *
     */
    public function testValue()
    {
        $key = 'key';
        $value = 'value';
        $rank = 2;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $this->assertEquals($value, $pair->value());
    }

    /**
     *
     */
    public function testIndex()
    {
        $key = 'key';
        $value = 'value';
        $rank = 2;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $expectedIndex = $rank - 1;
        $this->assertEquals($expectedIndex, $pair->index());
    }

    /**
     *
     */
    public function testRank()
    {
        $key = 'key';
        $value = 'value';
        $rank = 2;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $this->assertEquals($rank, $pair->rank());
    }

    /**
     *
     */
    public function testOdd()
    {
        $key = 'key';
        $value = 'value';
        $rank = 3;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $this->assertTrue($pair->odd());
    }

    /**
     *
     */
    public function testNotOdd()
    {
        $key = 'key';
        $value = 'value';
        $rank = 2;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $this->assertFalse($pair->odd());
    }

    /**
     *
     */
    public function testEven()
    {
        $key = 'key';
        $value = 'value';
        $rank = 2;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $this->assertTrue($pair->even());
    }

    /**
     *
     */
    public function testNotEven()
    {
        $key = 'key';
        $value = 'value';
        $rank = 3;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $this->assertFalse($pair->even());
    }

    /**
     *
     */
    public function testFirst()
    {
        $key = 'key';
        $value = 'value';
        $rank = 1;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $this->assertTrue($pair->first());
    }

    /**
     *
     */
    public function testNotFirst()
    {
        $key = 'key';
        $value = 'value';
        $rank = 2;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $this->assertFalse($pair->first());
    }

    /**
     *
     */
    public function testLast()
    {
        $key = 'key';
        $value = 'value';
        $rank = 5;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $this->assertTrue($pair->last());
    }

    /**
     *
     */
    public function testNotLast()
    {
        $key = 'key';
        $value = 'value';
        $rank = 4;
        $count = 5;

        $pair = new EnumerationPair($key, $value, $rank, $count);

        $this->assertFalse($pair->last());
    }
}
