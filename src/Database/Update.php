<?php

namespace Database;

class Update
{
    /**
     * @param string $table
     * @param array $columns
     * @param array $where
     * @return string
     */
    public static function getQuery($table, array $columns = [], array $where = [])
    {
        $sql = "UPDATE " . $table . " SET ";


        $sql .= implode(', ', array_map(function ($v, $k)
                {
                    return $k . '=:' . $k;
                },
                $columns, array_keys($columns))
        );

        if (count($where) > 0)
        {
            $sql .= " WHERE ";
            if (count($where) > 0)
            {
                foreach ($where as $column => $value)
                {
                    $sql .= $column . '=:' . $column . ' AND ';
                }

                $sql = substr($sql, 0, -4);
            }
        }

        return $sql;
    }
}