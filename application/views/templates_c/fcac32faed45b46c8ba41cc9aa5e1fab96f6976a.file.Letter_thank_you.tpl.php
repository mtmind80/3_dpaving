<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-25 17:22:12
         compiled from "application/views/templates/reports/Letter_thank_you.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9608649235745df445c79d0-10903339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcac32faed45b46c8ba41cc9aa5e1fab96f6976a' => 
    array (
      0 => 'application/views/templates/reports/Letter_thank_you.tpl',
      1 => 1463771798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9608649235745df445c79d0-10903339',
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
  'unifunc' => 'content_5745df445debe6_27290255',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5745df445debe6_27290255')) {function content_5745df445debe6_27290255($_smarty_tpl) {?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <style>
        td{
            font-family:Verdana; font-size:10px;
            vertical-align: top;
            text-align: left;
            color:#000;
        }
    </style>
    <title>3D Paving Thank You Letter</title>
</head>

<body>
<table width="600">
    <tr>
        <td>
            <img src="./assets/images/all_logo2.jpg" border="0" alt="3D Paving" />
        </td>
        <td>
            3D Paving
            <br />6714 NW 20th Avenue
            <br />Fort Lauderdale, Florida 33309
            <br />Phone: 1-855-SFL-Road
        </td>
    </tr>
</table>
<br />
<table width="90%">
    <tr>
        <td>
            <!-- Welcome/Thank You -->

Dear <?php echo $_smarty_tpl->tpl_vars['clientname']->value;?>
,
<br />        <br/>
Thank you for accepting our proposal for work to be performed for
<?php echo $_smarty_tpl->tpl_vars['communityname']->value;?>
 at
<?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 in
<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
.
<br />
We’re excited for the opportunity to provide all of your parking lot and roadway needs.
<br />
If you have any questions regarding scheduling, permitting, or the scope of work to be performed, please do not hesitate to contact your Project Manager,
<?php echo $_smarty_tpl->tpl_vars['manager']->value;?>
 @
<?php echo $_smarty_tpl->tpl_vars['managerphone']->value;?>
 or
<?php echo $_smarty_tpl->tpl_vars['manageremail']->value;?>
.
            <br/><br />
If at any time you are interested in expanding your project, your Estimator
<?php echo $_smarty_tpl->tpl_vars['manager']->value;?>
 is always available to discuss your options, as well.
<br />
<br />
Congratulations on making a decision that will have a lasting impact on the value and look of your property. Welcome to the 3D Paving family!
<br /><br />
Sincerely,
            <br/>
            <br />Patrick Daly, Owner




        </td>
    </tr>
</table>
</body>
</html><?php }} ?>
