<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-19 06:38:23
         compiled from "application/views/templates/common/projectmedia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:917976585880b33fb09a69-21072070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a57011b7c8b62f5eba54316716c700e36c01f2dd' => 
    array (
      0 => 'application/views/templates/common/projectmedia.tpl',
      1 => 1465508938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '917976585880b33fb09a69-21072070',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'pid' => 0,
    'pmedia' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5880b33fb256e1_05953479',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5880b33fb256e1_05953479')) {function content_5880b33fb256e1_05953479($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?><!--events -->
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Project Media</h2>

            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Media/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
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
