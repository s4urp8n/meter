<?php

namespace Zver {

    class Meter
    {

        protected static $meters = [];

        protected static function getTime()
        {
            return number_format(microtime(true), 2, '.', '');
        }

        protected static function getDuration($start, $end)
        {
            return number_format($end - $start, 2, '.', '');
        }

        public static function start($key)
        {
            static::$meters[$key] = ['start' => static::getTime()];
        }

        public static function end($key)
        {
            if (array_key_exists($key, static::$meters)) {
                static::$meters[$key]['end'] = static::getTime();
                static::$meters[$key]['duration'] = static::getDuration(static::$meters[$key]['start'], static::$meters[$key]['end']);
            }
        }

        public static function getMeters()
        {
            return static::$meters;
        }

        public static function resetMeters()
        {
            static::$meters = [];
        }

    }
}