<?php

namespace Database;

class Insert
{
    public static function getQuery($table, $fields)
    {
        $sql = "INSERT INTO " . $table . " SET ";
        $sql .= implode(', ', array_map(function ($v, $k)
                {
                    return $k . '=:' . $k;
                },
                $fields, array_keys($fields))
        );

        return $sql;
    }
}