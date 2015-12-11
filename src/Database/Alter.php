<?php

namespace Database;

class Alter
{
    /**
     * @param string $table
     * @param array $columns
     */
    public static function getQuery($table, $columns)
    {
        $sql  = "ALTER TABLE `" . $table . "`  ADD COLUMN ";
        $sql .= implode(',  ADD COLUMN ', array_map(function ($v, $k)
                            {
                                return $k . ' ' . $v;
                            },
                            $columns, array_keys($columns))
                        );
        return $sql;
    }
}