<?php
class DependencyAndDataProviderComboTest extends PHPUnit_Framework_TestCase
{
    public function provider()
    {
        return array(array('provider1'), array('provider2'));
    }

    public function testProducerFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     * @dataProvider provider
     *
     * The data provider's data always comes first in the arg list
     */
    public function testConsumer()
    {
        list($arg1, $arg2, $arg3) = func_get_args();

        $this->assertRegExp('/provider[1-2]/', $arg1);
        $this->assertEquals(['first', 'second'], [$arg2, $arg3]);
    }
}
