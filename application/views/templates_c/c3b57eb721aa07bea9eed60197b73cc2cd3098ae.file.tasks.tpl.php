<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-01-26 23:21:12
         compiled from "application/views/templates/common/tasks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16568656806010a3e8840b39-46574442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3b57eb721aa07bea9eed60197b73cc2cd3098ae' => 
    array (
      0 => 'application/views/templates/common/tasks.tpl',
      1 => 1497340942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16568656806010a3e8840b39-46574442',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'tasklist' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_6010a3e884a7c4_31368403',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6010a3e884a7c4_31368403')) {function content_6010a3e884a7c4_31368403($_smarty_tpl) {?><!--events -->
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Tasks</h2>
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
tasks/addTask/"><span class="btn center-block text-center"> Add Task </span></a>

            <div class="notifications-list">
<?php if ($_smarty_tpl->tpl_vars['tasklist']->value) {?>

<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tasklist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
                    <div class="notification">
                        <div class="notification-description"><?php echo $_smarty_tpl->tpl_vars['t']->value['taskDescription'];?>
</div>
                        <div class="notification-description"><div class="notification-icon fa fa-clock-o"></div>&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
tasks/completeTask/<?php echo $_smarty_tpl->tpl_vars['t']->value['taskID'];?>
">Complete</a>
                    </div>
                </div>

                <!-- / .notification -->

<?php } ?>
<?php }?>

            </div>
        </div>
        <!--events end-->



<?php }} ?>
