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
    public function testHasWithExistingKeyWillReturnTrue()
    {
        $key = 'foo';
        
        $values = array(
            $key => 'bar',
        );

        $map = Map::createImmutable($values);

        $this->assertTrue($map->has($key));
    }

    /**
     *
     */
    public function testHasWithNonExistingKeyWillReturnFalse()
    {
        $key = 'foo';
        
        $values = array();

        $map = Map::createImmutable($values);

        $this->assertFalse($map->has($key));
    }

    /**
     *
     */
    public function testGetWithExistingKeyWillReturnExpected()
    {
        $key   = 'foo';
        $value = 'bar';

        $values = array(
            $key => $value,
        );
        
        $map = Map::createImmutable($values);

        $this->assertSame($value, $map->get($key));
    }

    /**
     *
     * @expectedException \perf\Enumeration\NonExistentMapKeyException
     */
    public function testGetWithNonExistingKeyWillThrowException()
    {
        $key   = 'foo';

        $values = array();
        
        $map = Map::createImmutable($values);

        $map->get($key);
    }

    /**
     *
     * @expectedException \perf\Enumeration\NotMutableEnumerationException
     */
    public function testSetWithImmutableMapWillThrowException()
    {
        $key   = 'foo';
        $value = 'bar';
        
        $map = Map::createImmutable(array());

        $map->set($key, $value);
    }

    /**
     *
     */
    public function testSetWithMutableMap()
    {
        $key   = 'foo';
        $value = 'bar';
        
        $map = Map::createMutable();

        $map->set($key, $value);

        $this->assertTrue($map->has($key));
        $this->assertSame($value, $map->get($key));
    }

    /**
     *
     * @expectedException \perf\Enumeration\NotMutableEnumerationException
     */
    public function testRemoveWithImmutableMapWillThrowException()
    {
        $key = 'foo';
        
        $map = Map::createImmutable(array());

        $map->remove($key);
    }

    /**
     *
     */
    public function testRemoveWithMutableMap()
    {
        $key   = 'foo';
        $value = 'bar';

        $values = array(
            $key => $value,
        );
        
        $map = Map::createMutable($values);

        $map->remove($key);

        $this->assertFalse($map->has($key));
    }

    /**
     *
     */
    public function testMapConvertedToArray()
    {
        $key   = 'foo';
        $value = 'bar';

        $values = array(
            $key => $value,
        );
        
        $map = Map::createImmutable($values);

        $this->assertSame($values, $map->toArray());
    }
}
