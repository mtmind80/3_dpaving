<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-15 19:40:15
         compiled from "application/views/templates/resources/materialsList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49622212575874d6cfa321-05909650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d806761b72e931834d4e386e00f9a365c1bee76' => 
    array (
      0 => 'application/views/templates/resources/materialsList.tpl',
      1 => 1465508955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49622212575874d6cfa321-05909650',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575874d6d16895_27466353',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575874d6d16895_27466353')) {function content_575874d6d16895_27466353($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/system/smarty/libs/plugins/function.cycle.php';
?>
<div class="panel" >
<div class="panel-heading">
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveMaterials/" name="dataform">
    <h2>Material Costs</h2>
    <a class="topbut btn btn-success" href="Javascript:dataform.submit();"><span class="btn-label icon fa fa-fighter-jet"></span> Save Materials</a>
</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Material</th>
                    <th >Rate</th>
                    <th >Preferred Rate</th>
                </tr>
                </thead>
                <tbody>
                <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                    <td><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['d']->value['matName'];?>
</span></td>
                    <td class="text-center"><input type='text' name='matcost_<?php echo $_smarty_tpl->tpl_vars['d']->value['matID'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['d']->value['matCost'];?>
'></td>
                    <td class="text-center"><input type='text' name='mataltcost_<?php echo $_smarty_tpl->tpl_vars['d']->value['matID'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['d']->value['matAltCost'];?>
'></td>
                </tr>
            <?php } ?>



                </tbody>
            </table>
    </form>

</div>
    </div>
</div>

<?php }} ?>
