<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-08-27 09:34:42
         compiled from "application/views/templates/reports/Letter_follow-upE.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5281131815d653f82951832-13581565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1adf0134858023b9e85eccb664873c894cfc6ce' => 
    array (
      0 => 'application/views/templates/reports/Letter_follow-upE.tpl',
      1 => 1497341015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5281131815d653f82951832-13581565',
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
  'unifunc' => 'content_5d653f82a95d98_60325625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d653f82a95d98_60325625')) {function content_5d653f82a95d98_60325625($_smarty_tpl) {?>Dear <?php echo $_smarty_tpl->tpl_vars['clientname']->value;?>
,

I hope this letter finds you well. I wanted to take this opportunity to follow-up on our proposal for
<?php echo $_smarty_tpl->tpl_vars['communityname']->value;?>
 at <?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 in <?php echo $_smarty_tpl->tpl_vars['city']->value;?>
.
I am committed to giving you the best price possible on the scope of work you requested.
If there is anything that you would like to discuss, be it expanding the range of a service offered,
adding additional solutions, or re-issuing the proposal
with any administrative changes, please do not hesitate to call me @ 1-855-735-7623.
In addition, I can help clarify any areas of your proposal that you may be unsure about,
as well as answer any technical questions you may have.

Finally,
If you would like me to make a formal presentation to the Board of Directors, that option is always available.

I look forward to seeing you (and your signature) soon!

Sincerely,
<?php echo $_smarty_tpl->tpl_vars['manager']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

<?php }} ?>
