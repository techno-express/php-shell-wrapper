<?php

namespace AdamBrett\ShellWrapper\Tests\Command\Collections;

use AdamBrett\ShellWrapper\Command\Param;
use AdamBrett\ShellWrapper\Command\Collections\Params as ParamList;

class ParamsTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreateInstance()
    {
        $paramList = new ParamList();
        $this->assertInstanceOf('AdamBrett\ShellWrapper\Command\Collections\Params', $paramList);
    }

    public function testToString()
    {
        $paramList = new ParamList();
        $paramList->addParam(new Param('test'));
        $this->assertEquals("'test'", (string) $paramList, 'ParamList should cast to a string');
    }

    public function testMultipleParams()
    {
        $paramList = new ParamList();
        $paramList->addParam(new Param('hello'));
        $paramList->addParam(new Param('world'));
        $this->assertEquals("'hello' 'world'", (string) $paramList, 'ParamList should have multiple params');
    }

    public function testDuplicateParams()
    {
        $paramList = new ParamList();
        $paramList->addParam(new Param('test'));
        $paramList->addParam(new Param('test'));
        $this->assertEquals("'test' 'test'", (string) $paramList, 'ParamList should allow duplicates');
    }
}
