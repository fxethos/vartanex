<?php
/*
Innoblitz	
02-02-2016
Mental Toughness Research Institute
http://www.innoblitztechnologies.com
Copyright (c) 2016 Innoblitz Technologies
*/

namespace OSC\OM;

class Registry
{
    private static $data = [];

    public static function get($key)
    {
        if (substr($key, 0, 6) != 'OSCOM_') {
            $key = 'OSCOM_' . $key;
        }

        if (!static::exists($key)) {
            trigger_error('OSCOM_Registry::get - ' . $key . ' is not registered');

            return false;
        }

        return static::$data[$key];
    }

    public static function set($key, $value, $force = false)
    {
        if (substr($key, 0, 6) != 'OSCOM_') {
            $key = 'OSCOM_' . $key;
        }

        if (static::exists($key) && ($force !== true)) {
            trigger_error('OSCOM_Registry::set - ' . $key . ' already registered and is not forced to be replaced');

            return false;
        }

        static::$data[$key] = $value;
    }

    public static function exists($key)
    {
        if (substr($key, 0, 6) != 'OSCOM_') {
            $key = 'OSCOM_' . $key;
        }

        return array_key_exists($key, static::$data);
    }
}
