<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-16 16:31:19
         compiled from "application/views/templates/common/reminders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1461558511587d49b7416510-31489511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24bdba0c4fded5c3db4d5c4b537e5b47851c03eb' => 
    array (
      0 => 'application/views/templates/common/reminders.tpl',
      1 => 1465508939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1461558511587d49b7416510-31489511',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'crmreminders' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_587d49b7427375_22143228',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587d49b7427375_22143228')) {function content_587d49b7427375_22143228($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/devdashboard/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Reminders</h2>
            <div class="notifications-list">
<?php if ($_smarty_tpl->tpl_vars['crmreminders']->value) {?>

<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['crmreminders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>

                <div class="notification">
                    <div class="notification-description"><span class=" fa fa-clock-o"></span>&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotReminderDate'],"%A %B %d");?>
</div>
                    <div class="notification-description"><?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['cntLastName'];?>
</div>
                    <div class="notification-description"><?php echo $_smarty_tpl->tpl_vars['d']->value['cnotNote'];?>
</div>
                </div>
                <!-- / .notification -->
<?php } ?>
<?php }?>            </div>

        </div>
        <!--reminders end-->



<?php }} ?>
