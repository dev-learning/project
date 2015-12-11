<?php

namespace Database;

class Describe
{
    /**
     * @param string $table
     * @return string
     */
    public static function getQuery($table)
    {
        $sql = "DESCRIBE " . $table;
        return $sql;
    }
}