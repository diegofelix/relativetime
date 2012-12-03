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

    public function testRelativeTimeFutureTime5econds()
    {
        Bundle::start('relativetime');

        $time = time() + 5;

        $this->assertEquals(RelativeTime::get($time), 'in just a moment');
    }

    public function testRelativeTimeFutureTime15Seconds()
    {
        Bundle::start('relativetime');

        $time = time() + 15;

        $this->assertEquals(RelativeTime::get($time), '15 seconds from now');
    }

    public function testRelativeTimeFutureTime10Hours()
    {
        Bundle::start('relativetime');

        $time = time() + 36000;

        $this->assertEquals(RelativeTime::get($time), '10 hours from now');
    }
}