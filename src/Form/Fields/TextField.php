<?php

namespace Form\Fields;

use Form\Field;

class TextField extends Field
{
    /**
     * @var string $validation
     */
    private $validation;

    /**
     * @param string $name
     * set default values
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->setStorable(true);
        $this->setDataType('varchar(255)');
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
     * @return string
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        $html  = '';
        $html .= '<input type="text" name="' . $this->getName() . '" value="' . $this->getValue() . '"';
        $html .= ($this->isRequired() ? 'class="required"  required="required"' : '');
        $html .= ($this->isReadOnly() ? 'readOnly="readonly"' : '');
        $html .= '>';
        return $html;
    }
}

