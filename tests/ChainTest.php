<?php

namespace Cocur\Chain;

/**
 * ChainTest.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015-2018 Florian Eckerstorfer
 * @group     unit
 */
class ChainTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @covers Cocur\Chain\Chain::__construct()
     */
    public function constructorCreatesChain()
    {
        $this->assertEquals([1, 2, 3], (new Chain([1, 2, 3]))->array);
    }

    /**
     * @test
     * @covers Cocur\Chain\Chain::create()
     */
    public function createCreatesChain()
    {
        $this->assertEquals([1, 2, 3], Chain::create([1, 2, 3])->array);
    }

    /**
     * @test
     * @covers Cocur\Chain\Chain::createFromString()
     */
    public function createCreatesChainBySplittingStringWithDelimiter()
    {
        $this->assertEquals([1, 2, 3], Chain::createFromString(',', '1,2,3')->array);
    }

    /**
     * @test
     * @covers Cocur\Chain\Chain::createFromString()
     */
    public function createCreatesChainBySplittingStringWithRegExp()
    {
        $this->assertEquals([1, 2, 3, 4], Chain::createFromString('/[a-z]/', '1a2b3c4', ['regexp' => true])->array);
    }

    /**
     * @test
     */
    public function chainHasTraits()
    {
        $c = new Chain();

        $this->assertTrue(method_exists($c, 'changeKeyCase'));
        $this->assertTrue(method_exists($c, 'combine'));
        $this->assertTrue(method_exists($c, 'count'));
        $this->assertTrue(method_exists($c, 'countValues'));
        $this->assertTrue(method_exists($c, 'diff'));
        $this->assertTrue(method_exists($c, 'fill'));
        $this->assertTrue(method_exists($c, 'filter'));
        $this->assertTrue(method_exists($c, 'find'));
        $this->assertTrue(method_exists($c, 'first'));
        $this->assertTrue(method_exists($c, 'flip'));
        $this->assertTrue(method_exists($c, 'intersect'));
        $this->assertTrue(method_exists($c, 'intersectAssoc'));
        $this->assertTrue(method_exists($c, 'intersectKey'));
        $this->assertTrue(method_exists($c, 'join'));
        $this->assertTrue(method_exists($c, 'keys'));
        $this->assertTrue(method_exists($c, 'last'));
        $this->assertTrue(method_exists($c, 'map'));
        $this->assertTrue(method_exists($c, 'merge'));
        $this->assertTrue(method_exists($c, 'pad'));
        $this->assertTrue(method_exists($c, 'pop'));
        $this->assertTrue(method_exists($c, 'product'));
        $this->assertTrue(method_exists($c, 'push'));
        $this->assertTrue(method_exists($c, 'rand'));
        $this->assertTrue(method_exists($c, 'reduce'));
        $this->assertTrue(method_exists($c, 'replace'));
        $this->assertTrue(method_exists($c, 'reverse'));
        $this->assertTrue(method_exists($c, 'search'));
        $this->assertTrue(method_exists($c, 'shift'));
        $this->assertTrue(method_exists($c, 'shuffle'));
        $this->assertTrue(method_exists($c, 'slice'));
        $this->assertTrue(method_exists($c, 'sort'));
        $this->assertTrue(method_exists($c, 'sortKeys'));
        $this->assertTrue(method_exists($c, 'splice'));
        $this->assertTrue(method_exists($c, 'sum'));
        $this->assertTrue(method_exists($c, 'unique'));
        $this->assertTrue(method_exists($c, 'unshift'));
        $this->assertTrue(method_exists($c, 'values'));
    }

    /**
     * @test
     * @covers Cocur\Chain\AbstractChain::getIterator()
     */
    public function chainIsTraversable()
    {
        $data = ['a', 'b'];
        $c    = Chain::create($data);

        $this->assertInstanceOf('\Traversable', $c);

        foreach ($c as $key => $value) {
            $this->assertEquals($data[$key], $value);
        }
    }

    /**
     * @test
     * @covers Cocur\Chain\AbstractChain::offsetExists()
     * @covers Cocur\Chain\AbstractChain::offsetGet()
     * @covers Cocur\Chain\AbstractChain::offsetSet()
     * @covers Cocur\Chain\AbstractChain::offsetUnset()
     */
    public function chainAllowsArrayAccess()
    {
        $c = Chain::create();

        $this->assertFalse(isset($c[0]));
        $c[0] = 'foo';
        $this->assertTrue(isset($c[0]));
        $this->assertEquals('foo', $c[0]);
        unset($c[0]);
        $this->assertFalse(isset($c[0]));
    }

    /**
     * @test
     * @covers Cocur\Chain\Chain::count()
     */
    public function chainIsCountable()
    {
        $c = Chain::create([0, 1, 2]);

        $this->assertInstanceOf('\Countable', $c);
        $this->assertEquals(3, count($c));
    }

    /**
     * @test
     * @covers Cocur\Chain\Chain::jsonSerialize()
     */
    public function chainIsJsonSerializable()
    {
        $c = Chain::create([0, 1, 2]);

        $this->assertInstanceOf('\JsonSerializable', $c);
        $this->assertEquals('[0,1,2]', json_encode($c));
    }
}
