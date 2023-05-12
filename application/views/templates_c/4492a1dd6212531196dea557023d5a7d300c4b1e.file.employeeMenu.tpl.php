<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-13 18:19:10
         compiled from "application/views/templates/crm/employeeMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20600946345751750388f024-33864515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4492a1dd6212531196dea557023d5a7d300c4b1e' => 
    array (
      0 => 'application/views/templates/crm/employeeMenu.tpl',
      1 => 1465508945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20600946345751750388f024-33864515',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575175038a5735_36957832',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575175038a5735_36957832')) {function content_575175038a5735_36957832($_smarty_tpl) {?><table><td valign="top" style="text-align:top;padding:10px;">
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
