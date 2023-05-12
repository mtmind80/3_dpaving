<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-26 09:40:09
         compiled from "application/views/templates/crm/employeeMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1962457609592891529b6593-03838945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de4fd52594f24fadb25ba236aaf38cb7b2823bb4' => 
    array (
      0 => 'application/views/templates/crm/employeeMenu.tpl',
      1 => 1497340975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1962457609592891529b6593-03838945',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59289152a1aa59_89793359',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59289152a1aa59_89793359')) {function content_59289152a1aa59_89793359($_smarty_tpl) {?><table><td valign="top" style="text-align:top;padding:10px;">
        <br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editEmployee/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Basic Information</a>
        <br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeNotes/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Notes/Reminders</a>
        <br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/ProfileToPDF/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Print Profile</a>

    </td><td  valign="top"  style="text-align:top;padding:10px;">
        <?php if (!isset($_smarty_tpl->tpl_vars['USER_ROLE'])) $_smarty_tpl->tpl_vars['USER_ROLE'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['USER_ROLE']->value = 1) {?>
<br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
tasks/addtask/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Add Task</a>
<?php }?>
        <br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
messages/myMessages/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Send Message</a>
<!--
<br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
comingsoon/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Upload Image</a>
-->
        <br /><span class="fa fa-arrow-circle-o-down" ></span>&nbsp;<a  href="Javascript:HideControls();">Close</a>
</td></table><br />
<?php }} ?>
