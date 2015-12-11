<?php

namespace Form;

class Field
{

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $value
     */
    private $value;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @param string $label
     */
    private $label;

    /**
     * @param boolean $readOnly
     */
    private $readOnly;

    /**
     * @var boolean $storable
     */
    private $storable;

    /**
     * @var string $dataType
     */
    private $dataType;

    /**
     * @param string $name
     * set default values
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->setStorable(true);
        $this->setDataType('varchar(255)');
    }
    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $value string
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return boolean true/false
     */
    public function isReadOnly()
    {
        if ($this->readOnly === true)
        {
            return true;
        }
        return false;
    }

    /**
     * @param boolean $readOnly
     */
    public function setReadOnly($readOnly)
    {
        $this->readOnly = ($readOnly === true || $readOnly === 1) ? true : false;
    }

    /**
     * @return boolean true/false
     */
    public function isRequired()
    {
        if ($this->required === true)
        {
            return true;
        }
        return false;
    }

    /**
     * @param boolean $required
     */
    public function setRequired($required)
    {
        $this->required = ($required === true || $required === 1) ? true : false;
    }

    /**
     * @return boolean
     */
    public function isStorable()
    {
        return $this->storable;
    }

    /**
     * @param boolean $storable
     */
    public function setStorable($storable)
    {
        $this->storable = ($storable === true || $storable === 1) ? true : false;
    }

    /**
     * @return string
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * @param string $dataType
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
    }
}