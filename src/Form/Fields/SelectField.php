<?php

namespace Form\Fields;

use Database\Database;
use Form\Field;

class SelectField extends Field
{
    /**
     * @var string $validation
     */
    private $validation;

    /**
     * @var string $sourceTable
     */
    private $sourceTable;

    /**
     * @var string $sourceColumn
     */
    private $sourceColumn;

    /**
     * @var string $valueColumn
     */
    private $valueColumn;

    /**
     * @param string $name
     * set default values
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->setStorable(true);
        $this->setDataType('int(11)');
    }

    /**
     * set validationType from Validation class
     * @param $validationType string
     */
    public function setValidation($validationType)
    {
        $this->validation = $validationType;
    }

    /**
     * @return string $validation
     */
    public function getValidation()
    {
        return $this->validation;
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
    public function getValueColumn()
    {
        return $this->valueColumn;
    }

    /**
     * @param string $valueColumn
     */
    public function setValueColumn($valueColumn)
    {
        $this->valueColumn = $valueColumn;
    }

    /**
     * @return array
     */
    private function fetch()
    {
        $database = new Database();
        return $database->select([$this->getSourceColumn(), $this->getValueColumn()], $this->getSourceTable());
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        $html  = '';
        $html .= '<select name="' . $this->getName() . '"';
        $html .= ($this->isReadOnly() ? 'readOnly="readonly"' : '');
        $html .= ($this->isRequired() ? 'class="required"  required="required' : '');
        $html .= '>';

        $html .= '<option value="0">Kies een optie</option>';
        foreach ($this->fetch() as $value)
        {
            $selected = ($this->getValue() == $value[$this->getSourceColumn()]) ? 'selected="selected"' : '';
            $html .= '<option ' . $selected . ' value="' . $value[$this->getSourceColumn()] . '">';
            $html .= $value[$this->getValueColumn()];
            $html .= '</option>';
        }

        $html .= '</select>';
        return $html;
    }


}