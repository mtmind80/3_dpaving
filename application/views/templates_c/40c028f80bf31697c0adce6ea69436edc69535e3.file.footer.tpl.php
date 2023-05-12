<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-13 03:19:04
         compiled from "application/views/templates/core/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15489649295925caa4adb305-80993655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40c028f80bf31697c0adce6ea69436edc69535e3' => 
    array (
      0 => 'application/views/templates/core/footer.tpl',
      1 => 1497340949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15489649295925caa4adb305-80993655',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925caa4b48720_17793787',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'from' => 0,
    'to' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925caa4b48720_17793787')) {function content_5925caa4b48720_17793787($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?></div>

<!-- / #content-wrapper -->

<?php $_smarty_tpl->tpl_vars["from"] = new Smarty_variable(2014, null, 0);?>

<?php ob_start();?><?php echo smarty_modifier_date_format(time(),"%Y");?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["to"] = new Smarty_variable($_tmp1, null, 0);?>

<div class="pull-left collapse" style="margin-left: 9px;">
	<img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/images/3D_Footer.png" alt="footer-logo" width="99.5%" height="50%">
</div>

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
