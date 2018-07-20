<?php

use Zver\Meter;

class MeterTest extends PHPUnit\Framework\TestCase
{

    public function testStart()
    {
        $meter = new Meter();
        $meter->start();
        sleep(2);
        $this->assertTrue($meter->getDuration() >= 1);
    }

    public function testPrepare()
    {
        $meter = Meter::prepareAndStart();
        sleep(2);
        $this->assertTrue($meter->getDuration() >= 1);
    }

}