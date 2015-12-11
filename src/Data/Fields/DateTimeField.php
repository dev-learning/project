<?php

namespace Data\Fields;

class DateTimeField
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
     * field type
     */
    const fieldType = 'input';

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
}