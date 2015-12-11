<?php

namespace Validation;

class ValidateInteger
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        if (filter_var($this->getValue(), FILTER_VALIDATE_INT))
        {
            return true;
        }
        return false;
    }
}