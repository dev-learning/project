<?php /* Smarty version 3.1.27, created on 2015-12-06 07:08:50
         compiled from "/home/bahtiyar/Bureaublad/project/src/Template/html/header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1816029395663d0f2569ef8_44067141%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '421584846dc6d79eb6c673b5c8e47bc72f3fc5b2' => 
    array (
      0 => '/home/bahtiyar/Bureaublad/project/src/Template/html/header.tpl',
      1 => 1449382129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1816029395663d0f2569ef8_44067141',
  'variables' => 
  array (
    'activeModule' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5663d0f2573299_67954582',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5663d0f2573299_67954582')) {
function content_5663d0f2573299_67954582 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1816029395663d0f2569ef8_44067141';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['activeModule']->value['config']['label'];?>
</title>
    <link href="/src/Template/html/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="/src/Template/html/plugins/bootstrap/css/bootstrap-theme.css" rel="stylesheet" media="screen">
    <link href="/src/Template/html/css/default.css" rel="stylesheet" media="screen">
    <link href="/src/Template/html/plugins/jQuery/datetimepicker.css" rel="stylesheet" media="screen">
    <?php echo '<script'; ?>
 type="text/javascript" src="/src/Template/html/plugins/jQuery/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/src/Template/html/plugins/jQuery/datetimepicker.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/src/Template/html/plugins/tinyMCE/js/tinymce.min.js"><?php echo '</script'; ?>
>
</head>

<body>
    <div class="container-fluid">
        <div class="row"><?php }
}
?>