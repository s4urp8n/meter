<?php

use Zver\Meter;

class MeterTest extends PHPUnit\Framework\TestCase
{

    public static function setUpBeforeClass()
    {

    }

    public static function tearDownAfterClass()
    {

    }

    public function testStart()
    {

        $this->assertTrue(empty(Meter::getMeters()));

        Meter::start(__METHOD__);

        sleep(3);

        Meter::end(__METHOD__);

        $this->assertTrue(!empty(Meter::getMeters()));

        $meters = Meter::getMeters();

        Meter::resetMeters();

        $this->assertTrue(empty(Meter::getMeters()));

    }

}