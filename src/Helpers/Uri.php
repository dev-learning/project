<?php

namespace Helpers;

class Uri
{
    /**
     * @return array
     */
    public static function getPathAsArray()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $array = array_filter($uri, function($a)
            {
                return is_string($a) && trim($a) !== "";
            }
        );
        return array_values($array);
    }


    public static function getFullPath()
    {
        return $_SERVER['REQUEST_URI'];
    }
}