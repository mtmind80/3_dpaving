<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-01-26 23:22:38
         compiled from "application/views/templates/common/contactnotes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8719334556010a43e596c59-95297452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa68b126016567fd9b35e67fc376a16489d0c9c4' => 
    array (
      0 => 'application/views/templates/common/contactnotes.tpl',
      1 => 1497340936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8719334556010a43e596c59-95297452',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'cntId' => 0,
    'notelist' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_6010a43e5c3437_06554964',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6010a43e5c3437_06554964')) {function content_6010a43e5c3437_06554964($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?><!--events -->
        <div class="eventswrapper" style="min-height:100px;">
            <h2>Contact Notes</h2>

            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/crmNotes/<?php echo $_smarty_tpl->tpl_vars['cntId']->value;?>
"><span class="btn center-block text-center"> Add Note </span></a>

            <div class="notifications-list">
<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
                    <div class="notification">
                        <div class="notification-description"><?php echo $_smarty_tpl->tpl_vars['t']->value['cnotNote'];?>
</div>
                        <div class="notification-description"><div class="notification-icon fa fa-clock-o"></div>&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['t']->value['cnotCreatedDate'],"%m/%d/%Y");?>

                    </div>
                </div>

                <!-- / .notification -->

<?php } ?>

            </div>
        </div>
        <!--events end-->



<?php }} ?>
