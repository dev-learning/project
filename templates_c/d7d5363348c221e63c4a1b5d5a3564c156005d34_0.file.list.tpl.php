<?php /* Smarty version 3.1.27, created on 2015-12-03 20:52:48
         compiled from "/home/bahtiyar/Bureaublad/project/src/Template/html/list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:203148109356609d90ed02f8_43939110%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7d5363348c221e63c4a1b5d5a3564c156005d34' => 
    array (
      0 => '/home/bahtiyar/Bureaublad/project/src/Template/html/list.tpl',
      1 => 1449169201,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203148109356609d90ed02f8_43939110',
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
  'version' => '3.1.27',
  'unifunc' => 'content_56609d9103ba72_16342593',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56609d9103ba72_16342593')) {
function content_56609d9103ba72_16342593 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '203148109356609d90ed02f8_43939110';
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
            <div class="col-lg-12">
                <table class="table list-table">
                    <thead>
                        <tr>
                            <?php
$_from = $_smarty_tpl->tpl_vars['data']->value['columns'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['col'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['col']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['col']->value) {
$_smarty_tpl->tpl_vars['col']->_loop = true;
$foreach_col_Sav = $_smarty_tpl->tpl_vars['col'];
?>
                                <th><?php echo $_smarty_tpl->tpl_vars['col']->value['label'];?>
</th>
                            <?php
$_smarty_tpl->tpl_vars['col'] = $foreach_col_Sav;
}
?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->tpl_vars['data']->value['rows'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['column'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['column']->_loop = false;
$_smarty_tpl->tpl_vars['columnKey'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['columnKey']->value => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
$foreach_column_Sav = $_smarty_tpl->tpl_vars['column'];
?>
                            <tr>
                                <?php
$_from = $_smarty_tpl->tpl_vars['column']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['element'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['element']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->_loop = true;
$foreach_element_Sav = $_smarty_tpl->tpl_vars['element'];
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
                                <?php
$_smarty_tpl->tpl_vars['element'] = $foreach_element_Sav;
}
?>
                            </tr>
                        <?php
$_smarty_tpl->tpl_vars['column'] = $foreach_column_Sav;
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php }
}
?>