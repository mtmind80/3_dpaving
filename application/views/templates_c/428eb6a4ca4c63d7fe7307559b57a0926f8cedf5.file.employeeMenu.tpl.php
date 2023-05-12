<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-19 14:19:30
         compiled from "application/views/templates/crm/employeeMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78509795858811f524994d0-35804663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '428eb6a4ca4c63d7fe7307559b57a0926f8cedf5' => 
    array (
      0 => 'application/views/templates/crm/employeeMenu.tpl',
      1 => 1465508945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78509795858811f524994d0-35804663',
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
  'unifunc' => 'content_58811f524b35d0_81298438',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58811f524b35d0_81298438')) {function content_58811f524b35d0_81298438($_smarty_tpl) {?><table><td valign="top" style="text-align:top;padding:10px;">
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
