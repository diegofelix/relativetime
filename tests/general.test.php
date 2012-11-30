<?php
class TestGeneral extends PHPUnit_Framework_TestCase {
    
    public function testRelativeTimeIsCreated()
    {
        Bundle::start('relative');
        $this->assertEquals(Relative::get(), 'just now');
    }

    public function testRelativeTimeIsCreatedWithDate()
    {
        Bundle::start('relative');

        $date = date('Y-m-d H:i:s', time() - 36000);

        $this->assertEquals(Relative::get($date), '10 hours ago');
    }

    public function testRelativeTimeIsCreatedWithTime()
    {
        Bundle::start('relative');

        $time = time() - 36000;

        $this->assertEquals(Relative::get($time), '10 hours ago');
    }
}