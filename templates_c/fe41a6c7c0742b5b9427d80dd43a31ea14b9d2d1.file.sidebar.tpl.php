<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-03 14:43:45
         compiled from "/home/bahtiyar/Bureaublad/project/src/Template/html/sidebar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:429128395566047111dd994_32179566%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe41a6c7c0742b5b9427d80dd43a31ea14b9d2d1' => 
    array (
      0 => '/home/bahtiyar/Bureaublad/project/src/Template/html/sidebar.tpl',
      1 => 1449059855,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '429128395566047111dd994_32179566',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'modules' => 0,
    'activeModule' => 0,
    'key' => 0,
    'module' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_566047111ed085_08975194',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_566047111ed085_08975194')) {
function content_566047111ed085_08975194 ($_smarty_tpl) {
?>
<div class="col-sm-2 sidebar nopadding">
    <ul class="nav nav-sidebar">
        <?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value) {
$_smarty_tpl->tpl_vars['module']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['module']->key;
?>
                <?php if (($_smarty_tpl->tpl_vars['activeModule']->value != false)) {?>
                    <?php if (($_smarty_tpl->tpl_vars['activeModule']->value['name'] == $_smarty_tpl->tpl_vars['key']->value)) {?>
                        <li class="active">
                    <?php } else { ?>
                        <li>
                    <?php }?>
                <?php }?>
                <a class="glyphicon glyphicon-<?php echo $_smarty_tpl->tpl_vars['module']->value['config']['icon'];?>
" href="/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                    <label><?php echo $_smarty_tpl->tpl_vars['module']->value['config']['label'];?>
</label>
                </a>
            </li>
        <?php } ?>
    </ul>
</div><?php }
}
?>