<?php

namespace perf\Enumeration;

/**
 *
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testCreateImmutable()
    {
        $values = array(
            'abc',
            'def',
        );

        $collection = Collection::createImmutable($values);
    }



    /**
     *
     */
    public function testCreateMutable()
    {
        $items = array(
            'abc',
            'def',
        );

        $collection = Collection::createMutable($items);
    }

    /**
     *
     */
    public function testCollectionIsTraversable()
    {
        $values = array(
            'abc',
            'def',
        );

        $collection = Collection::createImmutable($values);

        $iterations = 0;
        foreach ($collection as $pair) {
            ++$iterations;
        }

        $this->assertEquals(count($values), $iterations);
    }

    /**
     *
     */
    public function testContainsWithContainedValueWillReturnTrue()
    {
        $value = 'abc';
        
        $values = array(
            $value,
            'def',
        );

        $collection = Collection::createImmutable($values);

        $this->assertTrue($collection->contains($value));
    }

    /**
     *
     */
    public function testContainsWithEmptyCollectionWillReturnFalse()
    {
        $value = 'abc';
        
        $values = array();

        $collection = Collection::createImmutable($values);

        $this->assertFalse($collection->contains($value));
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

        $collection = Collection::createImmutable($values);

        $this->assertFalse($collection->contains($value));
    }

    /**
     *
     */
    public function testHasWithExistingIndexWillReturnTrue()
    {
        $index = 0;
        
        $values = array(
            'foo',
        );

        $collection = Collection::createImmutable($values);

        $this->assertTrue($collection->has($index));
    }

    /**
     *
     */
    public function testHasWithEmptyCollectionWillReturnFalse()
    {
        $index = 0;
        
        $values = array();

        $collection = Collection::createImmutable($values);

        $this->assertFalse($collection->has($index));
    }

    /**
     *
     */
    public function testHasWithNonExistentIndexWillReturnFalse()
    {
        $index = 123;
        
        $values = array(
            'foo',
            'bar',
        );

        $collection = Collection::createImmutable($values);

        $this->assertFalse($collection->has($index));
    }

    /**
     *
     */
    public function testGetWithExistingIndexWillReturnExpected()
    {
        $index = 1;
        $value = 'foo';
        
        $values = array(
            'bar',
            $value,
            'baz',
        );

        $collection = Collection::createImmutable($values);

        $this->assertSame($value, $collection->get($index));
    }

    /**
     *
     * @expectedException \DomainException
     */
    public function testGetWithNonExistentIndexWillThrowException()
    {
        $index = 123;
        
        $values = array();

        $collection = Collection::createImmutable($values);

        $collection->get($index);
    }

    /**
     *
     * @expectedException \UnderflowException
     */
    public function testFirstWithEmptyCollectionWillThrowException()
    {
        $values = array();

        $collection = Collection::createImmutable($values);

        $collection->first();
    }

    /**
     *
     */
    public function testFirstWithNonEmptyCollectionWillReturnExpected()
    {
        $value = 'foo';

        $values = array(
            $value,
            'bar',
        );

        $collection = Collection::createImmutable($values);

        $this->assertSame($value, $collection->first());
    }

    /**
     *
     * @expectedException \UnderflowException
     */
    public function testLastWithEmptyCollectionWillThrowException()
    {
        $values = array();

        $collection = Collection::createImmutable($values);

        $collection->last();
    }

    /**
     *
     */
    public function testLastWithNonEmptyCollectionWillReturnExpected()
    {
        $value = 'foo';

        $values = array(
            'bar',
            $value,
        );

        $collection = Collection::createImmutable($values);

        $this->assertSame($value, $collection->last());
    }

    /**
     *
     */
    public function testToArrayWithEmptyCollection()
    {
        $values = array();

        $collection = Collection::createImmutable($values);

        $this->assertSame($values, $collection->toArray());
    }

    /**
     *
     */
    public function testToArrayWithNonEmptyCollection()
    {
        $values = array(
            'foo',
            'bar',
        );

        $collection = Collection::createImmutable($values);

        $this->assertSame($values, $collection->toArray());
    }
}
