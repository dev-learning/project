<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/vendor/autoload.php');

use Template\Template;
use Module\Module;

$template = new Template();
$template->config();
$template->addTemplate('header');
$template->addTemplate('sidebar');

$module = new Module();
$modules = $module->loadModules();
$activeModule = $module->getActiveModule();
$template->assign('modules', $modules);
$template->assign('activeModule', $activeModule);

if ($activeModule)
{
    $method = ($module->getMethod() == Module::_list) ? 'list' : 'edit';
    require_once(__DIR__ . '/modules/' . $activeModule['name'] . '/' . $method . '.php');
    $module->run();
    $template->addTemplate($method);

    if ($module->getMethod() == Module::_list)
    {
        $template->assign('nextMethod', Module::_edit);
        $template->assign('data', $module->getListData());
    }

    if ($module->getMethod() == Module::_edit || $module->getMethod() == Module::_new)
    {
        if ($module->getMethod() == Module::_edit)
        {
            $template->assign('ID', $module->getID());
        }

        $template->assign('data', $module->getFormData());

        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $status = $module->handlePost($_POST);
            if ($status['status'] == false)
            {
                $template->assign('invalidFields', $status['invalidFields']);
            }
            elseif ($status['status'] == true)
            {
                header('Location: /' . $status['location']);
            }
        }
    }
}

$template->addTemplate('footer');
$template->run();