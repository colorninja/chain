<?php

namespace Cocur\Chain\Link;

/**
 * KeysTest.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015-2018 Florian Eckerstorfer
 * @group     unit
 */
class KeysTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @covers Cocur\Chain\Link\Keys::keys()
     */
    public function keysChangesArrayToKeys()
    {
        /** @var \Cocur\Chain\Link\Keys $mock */
        $mock        = $this->getMockForTrait('Cocur\Chain\Link\Keys');
        $mock->array = ['foo' => 1, 'bar' => 2];
        $mock->keys();

        $this->assertEquals(['foo', 'bar'], $mock->array);
    }
}
