<?php

namespace Database;

class Select
{
    /**
     * @var array
     */
    private $columns;

    /**
     * @var string
     */
    private $table;

    /**
     * @var array
     */
    private $where;

    /**
     * @var string
     */
    private $orderBy;

    /**
     * @var string
     */
    private $orderDir;

    /**
     * @var int
     */
    private $limit;

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param array $columns
     */
    public function setColumns( array $columns)
    {
        $this->columns = $columns;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @return array
     */
    public function getWhere()
    {
        return $this->where;
    }

    /**
     * @param array $where
     */
    public function setWhere( array $where)
    {
        $this->where = $where;
    }

    /**
     * @return string
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * @param string $orderBy
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;
    }

    /**
     * @return string
     */
    public function getOrderDir()
    {
        return $this->orderDir;
    }

    /**
     * @param string $orderDir
     */
    public function setOrderDir($orderDir)
    {
        $this->orderDir = $orderDir;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        $sql = "SELECT " . implode(', ', $this->getColumns()) . " FROM " . $this->getTable();

        if (count($this->getWhere()) > 0)
        {
            $sql .= " WHERE ";
            foreach ($this->getWhere() as $column => $value)
            {
                $sql .= $column . '=:' . $column . ' AND ';
            }

            $sql = substr($sql, 0, -4);
        }

        if ($this->getOrderBy())
        {
            $sql .= " ORDER BY " . $this->getOrderBy();
        }

        if ($this->getOrderBy() && $this->getOrderDir())
        {
            $sql .= " " . $this->getOrderDir();
        }

        if ($this->getLimit())
        {
            $sql .= " LIMIT " . $this->getLimit();
        }

        return $sql;
    }
}