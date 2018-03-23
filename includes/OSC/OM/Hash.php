<?php
/*
Innoblitz	
02-02-2016
Mental Toughness Research Institute
http://www.innoblitztechnologies.com
Copyright (c) 2016 Innoblitz Technologies
*/

namespace OSC\OM;

use OSC\OM\OSCOM;

class Hash
{
    public static function encrypt($plain)
    {
        if (!class_exists('PasswordHash', false)) {
            include(OSCOM::BASE_DIR . 'classes/passwordhash.php');
        }

        $hasher = new \PasswordHash(10, true);

        return $hasher->HashPassword($plain);
    }
}
