<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-15 21:42:12
         compiled from "application/views/templates/workorders/_workorderwizrdmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1836865051573b837e636928-47179662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64f46106a57a5c1007f69c3a629326b038f685d2' => 
    array (
      0 => 'application/views/templates/workorders/_workorderwizrdmenu.tpl',
      1 => 1479246119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1836865051573b837e636928-47179662',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573b837e67f9d9_67109551',
  'variables' => 
  array (
    'proposal' => 0,
    'SITE_URL' => 0,
    'USER_ROLE' => 0,
    'thispage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573b837e67f9d9_67109551')) {function content_573b837e67f9d9_67109551($_smarty_tpl) {?><div class="panel-heading">
<?php $_smarty_tpl->tpl_vars["thispage"] = new Smarty_variable($_SERVER['REQUEST_URI'], null, 0);?>
    <h2>Work Order  <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['proposal']->value['jobMasterNumber']);?>

        <span style="float:right;">

        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMedia/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
/1" class="btn btn-sm btn-light-green" ><span class="btn-label icon fa fa-print"></span> &nbsp;Print Work Order </a>
            <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>

                <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOLienRelease/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
" class="btn btn-sm btn-light-green" ><span class="btn-label icon fa fa-print"></span> &nbsp;Print Lien Release</a>
                
            <?php }?>
       <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/CloseWO/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
" class="btn btn-sm btn-light-green">Close Out Project</a>
    </span></h2>
  <!--
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showWOList/"><span class="btn-label icon fa fa-truck"></span> List Work Orders</a>
-->

</div>
<div class="wizard-wrapper">
    <ul class="wizard-steps">
        <li>
            <!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOclient/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" <?php if (strstr($_smarty_tpl->tpl_vars['thispage']->value,"WOclient")) {?> style="color: #000000;"<?php }?>>Client/Notices&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                >

        <li>
            <!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WONotes/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" <?php if (strstr($_smarty_tpl->tpl_vars['thispage']->value,"WONotes")) {?> style="color: #000000;"<?php }?>>Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                >
        <li>
            <!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMedia/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" <?php if (strstr($_smarty_tpl->tpl_vars['thispage']->value,"WOMedia")) {?> style="color: #000000;"<?php }?>>Upload &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                >
<?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobPermit']==1) {?>
        <li>
            <!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPermits/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" <?php if (strstr($_smarty_tpl->tpl_vars['thispage']->value,"WOPermits")) {?> style="color: #000000;"<?php }?>>Permits &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                >
        <li>
            <!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">6</span>

<?php } else { ?>
        <li>
<!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">5</span>

<?php }?>
            <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPreview/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" <?php if (strstr($_smarty_tpl->tpl_vars['thispage']->value,"WOPreview")) {?> style="color: #000000;"<?php }?>>Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                >



    </ul>
</div>
<?php }} ?>
