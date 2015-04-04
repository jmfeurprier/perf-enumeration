<?php

namespace perf\Enumeration;

/**
 *
 */
class MapTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testCreateMutable()
    {
        $items = array(
            'foo' => 'abc',
            'bar' => 'def',
        );

        $map = Map::createMutable($items);
    }



    /**
     *
     */
    public function testCreateImmutable()
    {
        $items = array(
            'foo' => 'abc',
            'bar' => 'def',
        );

        $map = Map::createImmutable($items);
    }

    /**
     *
     */
    public function testMapIsTraversable()
    {
        $items = array(
            'foo' => 'abc',
            'bar' => 'def',
        );

        $map = Map::createMutable($items);

        $iterations = 0;
        foreach ($map as $pair) {
            ++$iterations;
        }

        $this->assertEquals(count($items), $iterations);
    }

    /**
     *
     */
    public function testIsEmptyWithEmptyMapReturnsTrue()
    {
        $items = array();

        $map = Map::createMutable($items);

        $this->assertTrue($map->isEmpty());
    }

    /**
     *
     */
    public function testIsEmptyWithNonEmptyMapReturnsFalse()
    {
        $items = array(
            'foo' => 'abc',
        );

        $map = Map::createMutable($items);

        $this->assertFalse($map->isEmpty());
    }

    /**
     *
     */
    public function testContainsWithContainedValueWillReturnTrue()
    {
        $value = 'abc';
        
        $values = array(
            'foo' => $value,
            'bar' => 'def',
        );


        $map = Map::createImmutable($values);

        $this->assertTrue($map->contains($value));
    }

    /**
     *
     */
    public function testContainsWithEmptyCollectionWillReturnFalse()
    {
        $value = 'abc';
        
        $values = array();

        $map = Map::createImmutable($values);

        $this->assertFalse($map->contains($value));
    }

    /**
     *
     */
    public function testContainsWithNonIdenticalValue()
    {
        $value = '0';
        
        $values = array(
            0,
        );

        $map = Map::createImmutable($values);

        $this->assertFalse($map->contains($value));
    }

    /**
     *
     */
    public function testHasWithExistingIndexWillReturnTrue()
    {
        $key = 'foo';
        
        $values = array(
            $key => 'bar',
        );

        $map = Map::createImmutable($values);

        $this->assertTrue($map->has($key));
    }
}
