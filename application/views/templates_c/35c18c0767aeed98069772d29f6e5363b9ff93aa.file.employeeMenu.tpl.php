<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-01-31 01:39:07
         compiled from "application/views/templates/crm/employeeMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142658594460160a3b9bbd02-32874375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35c18c0767aeed98069772d29f6e5363b9ff93aa' => 
    array (
      0 => 'application/views/templates/crm/employeeMenu.tpl',
      1 => 1497340975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142658594460160a3b9bbd02-32874375',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_60160a3bb03eb8_84934314',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60160a3bb03eb8_84934314')) {function content_60160a3bb03eb8_84934314($_smarty_tpl) {?><table><td valign="top" style="text-align:top;padding:10px;">
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
