<?php

namespace Zver {

    class Meter
    {

        protected static $meters = [];

        protected static function getTime()
        {
            return number_format(microtime(true), 2, '.', '');
        }

        protected static function getTimeDuration($start, $end)
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
                static::$meters[$key]['duration'] = static::getTimeDuration(static::$meters[$key]['start'], static::$meters[$key]['end']);
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

        public static function dump($file)
        {
            $meters = static::getMeters();

            if (!empty($meters)) {

                ob_start();
                print_r($meters);
                $output = ob_get_clean();

                file_put_contents($file, $output, FILE_APPEND | LOCK_EX);

            }

        }

        public static function getDuration($key)
        {
            $meters = static::getMeters();
            if (!empty($meters[$key]['duration'])) {
                return $meters[$key]['duration'];
            }

            return false;
        }

    }
}