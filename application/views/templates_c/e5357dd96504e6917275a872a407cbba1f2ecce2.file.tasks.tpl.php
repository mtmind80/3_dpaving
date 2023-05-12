<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-09 21:58:42
         compiled from "application/views/templates/common/tasks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1222441247573c90893728b5-18538638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5357dd96504e6917275a872a407cbba1f2ecce2' => 
    array (
      0 => 'application/views/templates/common/tasks.tpl',
      1 => 1465508939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1222441247573c90893728b5-18538638',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573c90893807a1_11635825',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'tasklist' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573c90893807a1_11635825')) {function content_573c90893807a1_11635825($_smarty_tpl) {?><!--events -->
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
