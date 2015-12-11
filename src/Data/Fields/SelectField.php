<?php

namespace Data\Fields;

class SelectField
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $label
     */
    private $label;

    /**
     * @var boolean $link
     */
    private $link;

    /**
     * @var string $sourceTable
     */
    private $sourceTable;

    /**
     * @var string $sourceColumn
     */
    private $sourceColumn;

    /**
     * @var array $valueColumns
     */
    private $valueColumns;

    /**
     * field type
     */
    const fieldType = 'select';


    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return boolean
     */
    public function isLink()
    {
        return $this->link;
    }

    /**
     * @param boolean $link
     */
    public function setLink($link)
    {
        $this->link = ($link === true || $link === 1) ? true : false;
    }

    /**
     * @return string
     */
    public function getSourceTable()
    {
        return $this->sourceTable;
    }

    /**
     * @param string $sourceTable
     */
    public function setSourceTable($sourceTable)
    {
        $this->sourceTable = $sourceTable;
    }

    /**
     * @return string
     */
    public function getSourceColumn()
    {
        return $this->sourceColumn;
    }

    /**
     * @param string $sourceColumn
     */
    public function setSourceColumn($sourceColumn)
    {
        $this->sourceColumn = $sourceColumn;
    }

    /**
     * @return string
     */
    public function getValueColumns()
    {
        return $this->valueColumns;
    }

    /**
     * @param array $valueColumns
     */
    public function setValueColumns(array $valueColumns)
    {
        $this->valueColumns = $valueColumns;
    }
}