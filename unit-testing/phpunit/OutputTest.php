<?php
class OutputTest extends PHPUnit_Framework_TestCase
{
    public function testExpectFooActualFoo()
    {
        $this->expectOutputString('foo');
        print 'foo';
    }

    public function testExpectBar()
    {
        $this->expectOutputString('bar');
        print 'bar';
    }
}
