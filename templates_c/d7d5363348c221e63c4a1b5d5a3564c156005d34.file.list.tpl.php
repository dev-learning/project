<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-03 14:43:45
         compiled from "/home/bahtiyar/Bureaublad/project/src/Template/html/list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:801946929566047111ef5c3_59348321%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7d5363348c221e63c4a1b5d5a3564c156005d34' => 
    array (
      0 => '/home/bahtiyar/Bureaublad/project/src/Template/html/list.tpl',
      1 => 1449145226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '801946929566047111ef5c3_59348321',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'activeModule' => 0,
    'data' => 0,
    'col' => 0,
    'column' => 0,
    'key' => 0,
    'nextMethod' => 0,
    'element' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5660471125bee6_51003431',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5660471125bee6_51003431')) {
function content_5660471125bee6_51003431 ($_smarty_tpl) {
?>
<div class="col-sm-10 col-sm-offset-2 main">
    <div class="header col-sm-12">
        <div class="col-sm-3 nopadding">
            <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['activeModule']->value['config']['label'];?>
</h1>
        </div>
        <div class="col-sm-1 col-sm-offset-8 nopadding list-buttons">
            <a href="/<?php echo $_smarty_tpl->tpl_vars['activeModule']->value['name'];?>
/new" class="pull-right btn btn-success">
                Nieuw
            </a>
        </div>
    </div>
    <div class="col-sm-12 content nopadding">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['col']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value) {
$_smarty_tpl->tpl_vars['col']->_loop = true;
?>
                            <th><?php echo $_smarty_tpl->tpl_vars['col']->value['label'];?>
</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_smarty_tpl->tpl_vars['columnKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['columnKey']->value = $_smarty_tpl->tpl_vars['column']->key;
?>
                        <tr>
                            <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['column']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['element']->key;
?>
                                <td>
                                    <?php if (($_smarty_tpl->tpl_vars['data']->value['columns'][$_smarty_tpl->tpl_vars['key']->value]['isLink'])) {?>
                                        <a href="/<?php echo $_smarty_tpl->tpl_vars['activeModule']->value['name'];?>
/<?php echo $_smarty_tpl->tpl_vars['nextMethod']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['column']->value[key($_smarty_tpl->tpl_vars['column']->value)];?>
">
                                    <?php }?>

                                        <?php echo $_smarty_tpl->tpl_vars['element']->value;?>


                                    <?php if (($_smarty_tpl->tpl_vars['data']->value['columns'][$_smarty_tpl->tpl_vars['key']->value]['isLink'])) {?>
                                        </a>
                                    <?php }?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div><?php }
}
?>