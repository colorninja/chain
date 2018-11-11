<?php

namespace Cocur\Chain\Link;

use Cocur\Chain\Chain;
use PHPUnit_Framework_TestCase;

/**
 * MergeTest.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015-2018 Florian Eckerstorfer
 */
class MergeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers Cocur\Chain\Link\Merge::merge()
     */
    public function mergeMergesArray()
    {
        /** @var \Cocur\Chain\Link\Merge $mock */
        $mock        = $this->getMockForTrait('Cocur\Chain\Link\Merge');
        $mock->array = [0, 1, 2];
        $mock->merge([3, 4]);

        $this->assertEquals([0, 1, 2, 3, 4], $mock->array);
    }

    /**
     * @test
     * @covers Cocur\Chain\Link\Merge::merge()
     */
    public function mergeMergesChain()
    {
        /** @var \Cocur\Chain\Link\Merge $mock */
        $mock        = $this->getMockForTrait('Cocur\Chain\Link\Merge');
        $mock->array = [0, 1, 2];
        $mock->merge(Chain::create([3, 4]));

        $this->assertEquals([0, 1, 2, 3, 4], $mock->array);
    }

    /**
     * @test
     * @covers Cocur\Chain\Link\Merge::merge()
     */
    public function mergeMergesRecursiveArray()
    {
        /** @var \Cocur\Chain\Link\Merge $mock */
        $mock        = $this->getMockForTrait('Cocur\Chain\Link\Merge');
        $mock->array = ['foo' => [0, 1], 'bar' => ['a', 'b']];
        $mock->merge(['foo' => [2, 3], 'bar' => ['c', 'd']], ['recursive' => true]);

        $this->assertEquals(['foo' => [0, 1, 2, 3], 'bar' => ['a', 'b', 'c', 'd']], $mock->array);
    }

    /**
     * @test
     * @covers Cocur\Chain\Link\Merge::merge()
     */
    public function mergeMergesRecursiveChain()
    {
        /** @var \Cocur\Chain\Link\Merge $mock */
        $mock        = $this->getMockForTrait('Cocur\Chain\Link\Merge');
        $mock->array = ['foo' => [0, 1], 'bar' => ['a', 'b']];
        $mock->merge(Chain::create(['foo' => [2, 3], 'bar' => ['c', 'd']]), ['recursive' => true]);

        $this->assertEquals(['foo' => [0, 1, 2, 3], 'bar' => ['a', 'b', 'c', 'd']], $mock->array);
    }
}
