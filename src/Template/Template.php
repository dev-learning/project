<?php

namespace Template;

use Smarty;

class Template
{

    /**
     * @var array $templates
     */
    private $templates;

    /**
     * @var Smarty $smarty
     */
    private $smarty;

    /**
     * set config
     */
    public function config()
    {
        $this->smarty = new Smarty();
        $this->smarty->caching = 0;
        return true;
    }


    /**
     * @return array
     */
    public function getTemplates()
    {
        return $this->templates;
    }

    /**
     * add template file (use only template name) it will be get from Template/html
     * @param string $template
     */
    public function addTemplate($template)
    {
        $this->templates[] = dirname(__FILE__) . '/html/' . $template . '.tpl';
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    public function assign($key, $value)
    {
        $this->smarty->assign($key, $value);
        return true;
    }

    /**
     * @return bool
     */
    public function run()
    {
        $templates = $this->getTemplates();
        if (is_array($templates))
        {
            foreach($templates as $template)
            {
                $this->smarty->display($template);
            }
        }
        return true;
    }
}