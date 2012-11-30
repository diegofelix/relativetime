<?php
class TestGeneral extends PHPUnit_Framework_TestCase {
    
    public function testRelativeTimeIsCreated()
    {
        Bundle::start('relativetime');
        $this->assertEquals(RelativeTime::get(), 'just now');
    }

    public function testRelativeTimeIsCreatedWithDate()
    {
        Bundle::start('relativetime');

        $date = date('Y-m-d H:i:s', time() - 36000);

        $this->assertEquals(RelativeTime::get($date), '10 hours ago');
    }

    public function testRelativeTimeIsCreatedWithTime()
    {
        Bundle::start('relativetime');

        $time = time() - 36000;

        $this->assertEquals(RelativeTime::get($time), '10 hours ago');
    }
}