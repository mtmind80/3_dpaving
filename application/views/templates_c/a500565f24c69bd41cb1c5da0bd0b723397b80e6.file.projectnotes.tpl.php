<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-13 10:05:44
         compiled from "application/views/templates/common/projectnotes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202486679359286a0b8446c5-78496839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a500565f24c69bd41cb1c5da0bd0b723397b80e6' => 
    array (
      0 => 'application/views/templates/common/projectnotes.tpl',
      1 => 1497340939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202486679359286a0b8446c5-78496839',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59286a0b88ac63_03896163',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'pid' => 0,
    'pnotelist' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59286a0b88ac63_03896163')) {function content_59286a0b88ac63_03896163($_smarty_tpl) {?><!--events -->
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Project Notes</h2>

            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Notes/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"><span class="btn center-block text-center"> Add Note </span></a>

            <div class="notifications-list">
<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pnotelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
                    <div class="notification">
                        <div class="notification-description"><?php echo $_smarty_tpl->tpl_vars['t']->value['jnotNote'];?>
</div>
                        <div class="notification-description"><div class="notification-icon fa fa-clock-o"></div>&nbsp;<?php echo $_smarty_tpl->tpl_vars['t']->value['jnotCreatedDate'];?>

                    </div>
                </div>

                <!-- / .notification -->

<?php } ?>

            </div>
        </div>
        <!--events end-->



<?php }} ?>
