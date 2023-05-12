<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-25 17:23:23
         compiled from "application/views/templates/reports/Letter_thank_youE.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4906514565745df8bd4dd85-53274506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c235e57b70206506eea2ce13e003a2e1d5e1f384' => 
    array (
      0 => 'application/views/templates/reports/Letter_thank_youE.tpl',
      1 => 1463771798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4906514565745df8bd4dd85-53274506',
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
    'managerphone' => 0,
    'manageremail' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5745df8bd61708_26483349',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5745df8bd61708_26483349')) {function content_5745df8bd61708_26483349($_smarty_tpl) {?>

Dear <?php echo $_smarty_tpl->tpl_vars['clientname']->value;?>
,

Thank you for accepting our proposal for work to be performed for
<?php echo $_smarty_tpl->tpl_vars['communityname']->value;?>
 at <?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 in <?php echo $_smarty_tpl->tpl_vars['city']->value;?>
.

We’re excited for the opportunity to provide all of your parking lot and roadway needs.

If you have any questions regarding scheduling, permitting, or the scope of work to be performed, please do not hesitate to contact your Project Manager,
<?php echo $_smarty_tpl->tpl_vars['manager']->value;?>
 @ <?php echo $_smarty_tpl->tpl_vars['managerphone']->value;?>
 or <?php echo $_smarty_tpl->tpl_vars['manageremail']->value;?>
.

If at any time you are interested in expanding your project, your Estimator
<?php echo $_smarty_tpl->tpl_vars['manager']->value;?>
 is always available to discuss your options, as well.

Congratulations on making a decision that will have a lasting impact on the value and look of your property. Welcome to the 3D Paving family!

Sincerely,

Patrick Daly, Owner

<?php }} ?>
