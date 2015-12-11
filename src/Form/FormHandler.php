<?php

namespace Form;

class FormHandler
{
    /**
     * @var array $fields
     */
    private $fields;



    /**
     * add field object
     * @param object $field
     */
    public function addField($field)
    {
        if (!isset($this->fields[$field->getName()]))
        {
            $this->fields[$field->getName()] = $field;
        }
    }

    /**
     * @return array $fields
     */
    public function getFields()
    {
        return $this->fields;
    }
}