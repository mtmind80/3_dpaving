<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-05 14:36:59
         compiled from "application/views/templates/reports/Letter_follow-up.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12086170015745def72fa654-60157978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4505425a1e02d4155341bf3e8e3d50fc3878d103' => 
    array (
      0 => 'application/views/templates/reports/Letter_follow-up.tpl',
      1 => 1465508951,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12086170015745def72fa654-60157978',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5745def730f403_11036078',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5745def730f403_11036078')) {function content_5745def730f403_11036078($_smarty_tpl) {?>
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
    <title>3D Paving Follow Up Letter</title>
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
<!-- Proposal Follow-Up -->
Dear <?php echo $_smarty_tpl->tpl_vars['clientname']->value;?>
,
            <br/>
            <br/>
I hope this letter finds you well. I wanted to take this opportunity to follow-up on our proposal for
<?php echo $_smarty_tpl->tpl_vars['communityname']->value;?>
 at
<?php echo $_smarty_tpl->tpl_vars['location']->value;?>
 in <?php echo $_smarty_tpl->tpl_vars['city']->value;?>
.
I am committed to giving you the best price possible on the scope of work you requested.
If there is anything that you would like to discuss, be it expanding the range of a service offered,
adding additional solutions, or re-issuing the proposal
with any administrative changes, please do not hesitate to call me @ 1-855-735-7623.
            <br/>
            <br/>
In addition, I can help clarify any areas of your proposal that you may be unsure about,
            as well as answer any technical questions you may have.
            <br/>
            <br/>
            Finally,
If you would like me to make a formal presentation to the Board of Directors, that option is always available.
<br/>
I look forward to seeing you (and your signature) soon!
<br/>
            Sincerely,
<br/><br/>
<?php echo $_smarty_tpl->tpl_vars['manager']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['title']->value;?>



        </td>
    </tr>
</table>
</body>
</html><?php }} ?>
