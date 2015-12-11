<?php

namespace Form\Fields;

use Form\Field;

class TextBoxField extends Field
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
        $html .= '<textarea name="' . $this->getName() . '"';
        $html .= 'id="textbox_' . $this->getName() . '"';
        $html .= ($this->isRequired() ? 'class="required"' : '');
        $html .= '>';
        $html .= $this->getValue();
        $html .= '</textarea>';
        $html .= '<script type="text/javascript">';
        $html .= 'tinymce.init({"selector": "textarea#textbox_' . $this->getName() . '", "language": "nl"';
        $html .= ($this->isReadOnly() ? ',"readonly": 1' : '');
        $html .= '})';
        $html .='</script>';
        return $html;
    }


}

