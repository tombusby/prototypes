<?php
class ExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Right Message
     */
    public function testExceptionHasRightMessage()
    {
        throw new InvalidArgumentException('Right Message', 10);
    }

    /**
     * @expectedException              InvalidArgumentException
     * @expectedExceptionMessageRegExp #Right.*#
     */
    public function testExceptionMessageMatchesRegExp()
    {
        throw new InvalidArgumentException('Right Message', 10);
    }

    /**
     * @expectedException     InvalidArgumentException
     * @expectedExceptionCode 20
     */
    public function testExceptionHasRightCode()
    {
        throw new InvalidArgumentException('Right Message', 20);
    }
}
