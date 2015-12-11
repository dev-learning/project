<?php

namespace Data;

class DataHandler
{

    /**
     * @var array $columns
     */
    private $columns;

    /**
     * add column object
     * @param object $column
     */
    public function addColumn($column)
    {
        if (!isset($this->columns[$column->getName()]))
        {
            $this->columns[$column->getName()] = $column;
        }
    }

    /**
     * @return array $columns
     */
    public function getColumns()
    {
        return $this->columns;
    }

}