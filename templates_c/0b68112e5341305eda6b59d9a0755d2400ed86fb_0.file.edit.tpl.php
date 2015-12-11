<?php /* Smarty version 3.1.27, created on 2015-12-06 07:07:51
         compiled from "/home/bahtiyar/Bureaublad/project/src/Template/html/edit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10084659635663d0b7ef8809_50044493%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b68112e5341305eda6b59d9a0755d2400ed86fb' => 
    array (
      0 => '/home/bahtiyar/Bureaublad/project/src/Template/html/edit.tpl',
      1 => 1449382069,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10084659635663d0b7ef8809_50044493',
  'variables' => 
  array (
    'activeModule' => 0,
    'ID' => 0,
    'data' => 0,
    'invalidFields' => 0,
    'column' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5663d0b7f24ac4_53366881',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5663d0b7f24ac4_53366881')) {
function content_5663d0b7f24ac4_53366881 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10084659635663d0b7ef8809_50044493';
?>
<div class="col-sm-10 col-sm-offset-2 main">
    <div class="header col-sm-12">
        <div class="col-sm-3 nopadding">
            <h1 class="page-header">
                <a href="/<?php echo $_smarty_tpl->tpl_vars['activeModule']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['activeModule']->value['config']['label'];?>
</a>
                <?php if (isset($_smarty_tpl->tpl_vars['ID']->value)) {?>
                    / <?php echo $_smarty_tpl->tpl_vars['ID']->value;?>

                <?php }?>
            </h1>
        </div>
    </div>
    <div class="col-sm-12 content nopadding">
        <div class="table-responsive">
            <form method="POST">
                <table class="table form-table">
                    <tbody>
                        <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
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
                            <?php if (isset($_smarty_tpl->tpl_vars['invalidFields']->value) && count($_smarty_tpl->tpl_vars['invalidFields']->value) > 0 && $_smarty_tpl->tpl_vars['invalidFields']->value[$_smarty_tpl->tpl_vars['column']->value['name']]) {?>
                                <tr class="invalid">
                            <?php } else { ?>
                                <tr>
                            <?php }?>
                                <td class="col-sm-2">
                                    <?php echo $_smarty_tpl->tpl_vars['column']->value['label'];?>

                                    <?php if ($_smarty_tpl->tpl_vars['column']->value['required'] > 0) {?>
                                        <sup class="required">*</sup>
                                    <?php }?>
                                </td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['column']->value['html'];?>

                                    <?php if (!empty($_smarty_tpl->tpl_vars['column']->value['description'])) {?>
                                       <label class="description">
                                           (<?php echo $_smarty_tpl->tpl_vars['column']->value['description'];?>
)
                                       </label>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php
$_smarty_tpl->tpl_vars['column'] = $foreach_column_Sav;
}
?>
                    </tbody>
                </table>
                <div class="form-buttons">
                    <button type="submit" name="delete" value="1" class="btn btn-danger">Verwijderen</button>
                    <input type="submit" value="Opslaan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
?>