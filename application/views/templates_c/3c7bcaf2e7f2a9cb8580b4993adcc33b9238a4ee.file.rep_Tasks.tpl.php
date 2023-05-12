<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-27 14:56:50
         compiled from "application/views/templates/reports/rep_Tasks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5568567005929da029cb393-89746537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c7bcaf2e7f2a9cb8580b4993adcc33b9238a4ee' => 
    array (
      0 => 'application/views/templates/reports/rep_Tasks.tpl',
      1 => 1465508952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5568567005929da029cb393-89746537',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'd' => 0,
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5929da02ac3ad6_52550583',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5929da02ac3ad6_52550583')) {function content_5929da02ac3ad6_52550583($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>
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
    <title>3D Paving CRM Profile</title>
</head>

<body>
<H2>Tasks</h2>
</H2><table >
    <thead>
    <tr>
        <td >Date Due</td>
        <td >Task</td>
        <td >Created</td>
        <td style='width:10%;'>Mark Completed</td>
    </tr>
    </thead>
    <tbody>
    <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
    <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
        <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
            <td><span class="note-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['taskDueDate'],"%A %B %d,  %Y");?>
</span></td>

            <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['taskDescription'];?>

                <?php if ($_smarty_tpl->tpl_vars['d']->value['taskStatus']) {?>
                    <br/>Response:<?php echo $_smarty_tpl->tpl_vars['d']->value['taskResponse'];?>

                <?php }?>
            </td>
            <td class="text-left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['taskCreatedDateTime'],"%A %B %d,  %Y");?>

                <br/><?php echo $_smarty_tpl->tpl_vars['d']->value['Creator'];?>

            </td>

            <td class="text-center">
                <?php if (!$_smarty_tpl->tpl_vars['d']->value['taskStatus']) {?>
                <span class="btn-label icon fa fa-angle-right">&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
tasks/completeTask/<?php echo $_smarty_tpl->tpl_vars['d']->value['taskID'];?>
">Complete</a>
                    <?php } else { ?>
                    Completed
                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['taskCompletedDateTime'],"%B %d,  %Y at %I:%M %p");?>

                    <?php }?>
            </td>
        </tr>
    <?php } ?>

    <?php }?>

    </tbody>
</table>
</body>
</html>
<?php }} ?>
