<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-09 21:49:32
         compiled from "application/views/templates/common/womedia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1481399538573b84e5a09142-38419910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '473161742069e37d343773c7f37e086bf93eb0b5' => 
    array (
      0 => 'application/views/templates/common/womedia.tpl',
      1 => 1465508939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1481399538573b84e5a09142-38419910',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573b84e5a21c50_60225577',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'pid' => 0,
    'pmedia' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573b84e5a21c50_60225577')) {function content_573b84e5a21c50_60225577($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
?><!--events -->
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Work Order Media</h2>

            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMedia/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"><span class="btn center-block text-center"> Add Media </span></a>

            <div class="notifications-list">
<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pmedia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
                    <div class="notification">
                        <div class="notification-description">
                            <div class="notification-icon fa fa-circle"></div>&nbsp;
                            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
media/projects/<?php echo $_smarty_tpl->tpl_vars['t']->value['jobmdFileName'];?>
" target='doc' title='View Document'><?php echo $_smarty_tpl->tpl_vars['t']->value['PODocTypeName'];?>
</a>
                        </div>
                        <div class="notification-description">
                            <?php if ($_smarty_tpl->tpl_vars['t']->value['jordName']!='') {
echo $_smarty_tpl->tpl_vars['t']->value['jordName'];?>
<br/><?php }?>
                            <?php echo $_smarty_tpl->tpl_vars['t']->value['jobmdDescription'];?>

                            <br />
                            Uploaded on:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['t']->value['jobmdCreatedDateTime'],"%m/%d/%Y");?>

                        </div>
                <!-- / .notification -->
                    </div>
<?php } ?>

            </div>
        </div>
        <!--events end-->



<?php }} ?>
