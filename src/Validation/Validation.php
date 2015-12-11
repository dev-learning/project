<?php

namespace Validation;

class Validation
{
    const FORM_TEXT = "text";
    const FORM_INTEGER = "integer";


    /**
     * @param $type
     * @param $value
     * @return Validation
     */
    public static function validate($type, $value)
    {
        $validationClass = '\Validation\Validate' . ucfirst($type);
        return new $validationClass($value);
    }
}