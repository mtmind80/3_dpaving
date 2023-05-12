<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-12-23 19:21:29
         compiled from "application/views/templates/reports/Letter_check_inE.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1278163575585d79390ac798-86801723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f66f04c15132f8768a1e057f056712d23a818773' => 
    array (
      0 => 'application/views/templates/reports/Letter_check_inE.tpl',
      1 => 1465508951,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1278163575585d79390ac798-86801723',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'clientname' => 0,
    'communityname' => 0,
    'location' => 0,
    'city' => 0,
    'manager' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_585d79391152b7_04596534',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585d79391152b7_04596534')) {function content_585d79391152b7_04596534($_smarty_tpl) {?>
Dear <?php echo $_smarty_tpl->tpl_vars['clientname']->value;?>
,

I hope this letter finds you well. It has now been some time since we wrapped up our work for
<?php echo $_smarty_tpl->tpl_vars['communityname']->value;?>
 at <?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 in <?php echo $_smarty_tpl->tpl_vars['city']->value;?>
.

I trust that everything went according to plan and that your property is not experiencing any new maintenance issues that need to be addressed.
In the event a situation arises that needs to be solved, we would love the opportunity to work with you again, and we are always available to offer a free estimate on a new scope of work.

Please don’t hesitate to contact me,

<?php echo $_smarty_tpl->tpl_vars['manager']->value;?>
 @ 1-855-735-7623 for more information or to set up a meeting!

Sincerely,
<?php echo $_smarty_tpl->tpl_vars['manager']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['title']->value;?>



<?php }} ?>
