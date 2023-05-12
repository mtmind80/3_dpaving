<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-10 13:03:55
         compiled from "application/views/templates/resources/serviceColors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:534194453573dd1af2f6f38-88609286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c97675244d150e2bc7d4cee607fd5d7d66554ec6' => 
    array (
      0 => 'application/views/templates/resources/serviceColors.tpl',
      1 => 1465508955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '534194453573dd1af2f6f38-88609286',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573dd1af305305_77853477',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573dd1af305305_77853477')) {function content_573dd1af305305_77853477($_smarty_tpl) {?>


<div class="panel">
    <div class="panel-heading">

        <h2>Service Colors</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/serviceList/"><span class="btn-label icon fa fa-shield"></span> View Services</a>

    </div>
    <div class="panel-body">

        <table width="300px;">
            <tr>
                <td>Service</td>
                <td>Color</td>
            </tr>
<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['d']->value['catname'];?>
</td>
        <td bgcolor="<?php echo $_smarty_tpl->tpl_vars['d']->value['catcolor'];?>
" align='center'><strong>Color</strong></td>
    </tr>

<?php } ?>
        </table>

        </div>
        </div>




<?php }} ?>
