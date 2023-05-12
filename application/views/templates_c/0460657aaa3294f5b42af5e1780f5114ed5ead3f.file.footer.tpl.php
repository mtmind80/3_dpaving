<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-09 21:49:29
         compiled from "application/views/templates/core/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:904987917573b837af295d7-30765669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0460657aaa3294f5b42af5e1780f5114ed5ead3f' => 
    array (
      0 => 'application/views/templates/core/footer.tpl',
      1 => 1465508940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '904987917573b837af295d7-30765669',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573b837b001d98_86388606',
  'variables' => 
  array (
    'from' => 0,
    'to' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573b837b001d98_86388606')) {function content_573b837b001d98_86388606($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
?></div>
<!-- / #content-wrapper -->
<?php $_smarty_tpl->tpl_vars["from"] = new Smarty_variable(2014, null, 0);?>
<?php ob_start();?><?php echo smarty_modifier_date_format(time(),"%Y");?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["to"] = new Smarty_variable($_tmp1, null, 0);?>
<div id='copyright' style='float:right;padding-right:50px;'>copyright&copy; 3D Paving
    <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['to']->value+1 - ($_smarty_tpl->tpl_vars['from']->value) : $_smarty_tpl->tpl_vars['from']->value-($_smarty_tpl->tpl_vars['to']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = $_smarty_tpl->tpl_vars['from']->value, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
    <?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
,
    <?php }} ?>
</div>
</div>



<!-- / #main-wrapper -->
<?php echo '<script'; ?>
 type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.PixelAdmin.start(init);
<?php echo '</script'; ?>
><?php }} ?>
