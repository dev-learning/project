<?php

namespace Form\Fields;

use Form\Field;

class RadioField extends Field
{
    /**
     * @var string $validation
     */
    private $validation;

    /**
     * @var array $options
     */
    private $options;

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
     * @param string $key
     * @param string $value
     */
    public function addOption($key, $value)
    {
        $this->options[$key] = $value;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        $html  = '';
        foreach ($this->getOptions() as $key => $value)
        {
            $html .= '<input type="radio" name="' . $this->getName() . '"';
            $html .= ($this->getValue() != null && $this->getValue() == $key) ? ' checked="checked" ' : '';
            $html .= ' value="' . $key . '">';
            $html .= '<label class="radio-label">';
            $html .= $value;
            $html .= '</label><br />';
        }
        return $html;
    }


}