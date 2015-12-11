<?php

namespace Form\Fields;

use Form\Field;

class DateField extends Field
{
    /**
     * @var string $validation
     */
    private $validation;

    /**
     * @var string $format
     */
    private $format;

    /**
     * @param string $name
     * set default values
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->setStorable(true);
        $this->setDataType('varchar(10)');
        $this->setFormat('d-m-Y H:i');
    }

    /**
     * set validationType from Validation class
     * @param string $validationType
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
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * for example d-m-Y H:i
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        $html  = '';
        $html .= '<input type="text" name="' . $this->getName() . '" value="' . $this->getValue() . '"';
        $html .= ($this->isReadOnly() ? 'readOnly="readonly"' : '');
        $html .= 'id="datetime_' . $this->getName() . '"';
        $html .= ($this->isRequired() ? ' class="required"  required="required"' : '');
        $html .= '>';
        $html .= '<script type="text/javascript">
                    $("#datetime_' . $this->getName() . '").datetimepicker({"format":"' . $this->getFormat() . '"});
                 </script>';
        return $html;
    }


}