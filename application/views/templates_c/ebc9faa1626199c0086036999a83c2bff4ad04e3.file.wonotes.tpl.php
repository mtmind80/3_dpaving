<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-09 21:49:32
         compiled from "application/views/templates/common/wonotes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1562473481573b84e59fb7b1-31068528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebc9faa1626199c0086036999a83c2bff4ad04e3' => 
    array (
      0 => 'application/views/templates/common/wonotes.tpl',
      1 => 1465508939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1562473481573b84e59fb7b1-31068528',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573b84e5a077e5_34974577',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'pid' => 0,
    'pnotelist' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573b84e5a077e5_34974577')) {function content_573b84e5a077e5_34974577($_smarty_tpl) {?><!--events -->
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Work Order Notes</h2>

            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WONotes/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"><span class="btn center-block text-center"> Add Note </span></a>

            <div class="notifications-list">
<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pnotelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
                    <div class="notification">
                        <div class="notification-description"><?php echo $_smarty_tpl->tpl_vars['t']->value['jnotNote'];?>
</div>
                        <div class="notification-description"><div class="notification-icon fa fa-clock-o"></div>&nbsp;<?php echo $_smarty_tpl->tpl_vars['t']->value['jnotCreatedDate'];?>

                    </div>
                </div>

                <!-- / .notification -->

<?php } ?>

            </div>
        </div>
        <!--events end-->



<?php }} ?>
