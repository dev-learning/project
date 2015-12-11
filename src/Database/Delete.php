<?php

namespace Database;

class Delete
{
    public static function getQuery($table, array $where)
    {
        $sql = "DELETE FROM " . $table;

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