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

        sleep(1);

        Meter::end(__METHOD__);

        $this->assertTrue(!empty(Meter::getMeters()));

        $meters = Meter::getMeters();

        Meter::resetMeters();

        $this->assertTrue(empty(Meter::getMeters()));

        $dump = __DIR__ . DIRECTORY_SEPARATOR . 'dump.log';

        @unlink($dump);

        Meter::start(__METHOD__);

        sleep(1);

        Meter::end(__METHOD__);

        Meter::dump($dump);
        Meter::dump($dump);

        @unlink($dump);

    }

}