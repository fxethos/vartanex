<?php
/*
Innoblitz	
02-02-2016
Mental Toughness Research Institute
http://www.innoblitztechnologies.com
Copyright (c) 2016 Innoblitz Technologies
*/

namespace OSC\OM;

class HTTP
{
    public static function redirect($url)
    {
        if ((strstr($url, "\n") === false) && (strstr($url, "\r") === false)) {
            if ( strpos($url, '&amp;') !== false ) {
                $url = str_replace('&amp;', '&', $url);
            }

            header('Location: ' . $url);
        }

        exit;
    }
}
