<?php

namespace Zver {

    class Meter
    {

        protected $start    = null;
        protected $duration = null;
        protected $end      = null;

        public static function prepareAndStart()
        {
            $meter = new static();
            $meter->start();

            return $meter;
        }

        protected static function getTime()
        {
            return number_format(microtime(true), 2, '.', '');
        }

        protected static function getTimeDuration($start, $end)
        {
            return number_format($end - $start, 2, '.', '');
        }

        public function start()
        {
            $this->start = static::getTime();
        }

        public function end()
        {
            if (is_null($this->start)) {
                throw new \Exception('Meter is not started');
            }

            if (is_null($this->end)) {
                $this->end = static::getTime();
                $this->duration = static::getTimeDuration($this->start, $this->end);
            }
        }

        public function getDuration()
        {
            if (is_null($this->end)) {
                $this->end();
            }

            return $this->duration;
        }

    }
}