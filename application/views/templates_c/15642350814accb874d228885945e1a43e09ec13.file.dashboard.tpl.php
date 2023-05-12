<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-13 06:56:34
         compiled from "application/views/templates/dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20849925559286737ad1c23-36807544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15642350814accb874d228885945e1a43e09ec13' => 
    array (
      0 => 'application/views/templates/dashboard.tpl',
      1 => 1497340913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20849925559286737ad1c23-36807544',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59286737d06074_89598822',
  'variables' => 
  array (
    'USER_ROLE' => 0,
    'SITE_URL' => 0,
    'USER_FULLNAME' => 0,
    'readytobill' => 0,
    'r' => 0,
    'readytoclose' => 0,
    'crm_new' => 0,
    'thisMonth' => 0,
    'crm_reminder' => 0,
    'crm_total' => 0,
    'messagecount' => 0,
    'proposal_active' => 0,
    'proposal_approved' => 0,
    'proposal_rejected' => 0,
    'workorder_total' => 0,
    'workorder_active' => 0,
    'workorder_completed' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59286737d06074_89598822')) {function content_59286737d06074_89598822($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">
    //$.growl({ title: "Growl", message: "The kitten is awake!"});
    //$.growl.error({ message: "The kitten is attacking!" });
    //$.growl.notice({ message: "The kitten is cute!" });
    //$.growl.warning({ message: "The kitten is ugly!" });
<?php echo '</script'; ?>
>


<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Dashboard</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value!=4&&$_smarty_tpl->tpl_vars['USER_ROLE']->value!=5) {?>
                <div class="pull-right col-xs-12 col-sm-auto"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/create/" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-plus"></span>New Proposal</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/select/" class="btn btn-primary btn-labeled" ><span class="btn-label icon fa fa-plus"></span>New Contact</a></div>
                <?php }?>
                <!-- Margin -->
                <div class="visible-xs clearfix form-group-margin"></div>
                <!-- Search field -->

            </div>
        </div>
    </div>
</div>



<div class="stat-panel">

    <div class="stat-row">

        <div class="stat-cell col-sm-7 padding-sm-hr bordered no-border-r valign-top">
        <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1) {?>
         <h3><?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
 </h3>
         <ul class="list-group-item-info">
             <li>Ready To Bill</li>
         </ul>
        <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['readytobill']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
            <div class="row stat-row">
                <a class="btn btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOAdminClose/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
"> Ready To Bill </a>  <?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['r']->value['jobMasterNumber']);?>
 - <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOClient/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['jobName'];?>
</a>
            </div>
        <?php } ?>
            <br/>

         <ul class="list-group-item-info">
             <li>Ready To Close</li>
         </ul>
        <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['readytoclose']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
        <div class="row stat-row">
          <a class="btn btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOEstimatorClose/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
">Close Job</a>  <?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['r']->value['jobMasterNumber']);?>
 - <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOClient/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['jobName'];?>
</a>
        </div>
        <?php } ?>

<br/>
<!--
            <ul class="list-group-item-info">
                <li>Ready To Approve</li>
            </ul>
            <div class="row stat-row">
                <a class="btn btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
comingsoon">Approve Proposal</a>  <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
comingsoon/">Proposal Name</a>
            </div>
            -->


        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==2) {?>

            <h3><?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
 </h3>


            <ul>
                <li>Ready To Close</li>
            </ul>
        <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['readytoclose']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
            <div class="row panel">
                <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOEstimatorClose/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
">Close Job</a>  <?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['r']->value['jobMasterNumber']);?>
 - <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOClient/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['jobName'];?>
</a>
            </div>
        <?php } ?>


        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==3) {?>

            <h3><?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
  </h3>

            <ul>
                <li>Ready To Close</li>
            </ul>
        <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['readytoclose']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
            <div class="row panel">
                <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOEstimatorClose/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
">Close Job</a>  <?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['r']->value['jobMasterNumber']);?>
 - <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOClient/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['jobName'];?>
</a>
            </div>
        <?php } ?>


        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==4) {?>

            <h3><?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
 </h3>
            <ul>
                <li><a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showServiceList">My Projects</a></li>
            </ul>

        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==5) {?>

            <h3><?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
 </h3>
            <ul>
                <li><a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showServiceList">My Projects</a></li>
            </ul>



        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>

            <h3><?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
 </h3>
            <ul>
                <li>Ready To Bill</li>
            </ul>
        <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['readytobill']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
            <div class="row panel">
                <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOAdminClose/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
"> Ready To Bill </a>  <?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['r']->value['jobMasterNumber']);?>
 - <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOClient/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['jobName'];?>
</a>
            </div>
        <?php } ?>

            <ul>
                <li>Ready To Close</li>
            </ul>
        <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['readytoclose']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
            <div class="row panel">

                <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOEstimatorClose/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
">Close Job</a>  <?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['r']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['r']->value['jobMasterNumber']);?>
 - <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOClient/<?php echo $_smarty_tpl->tpl_vars['r']->value['jobID'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['jobName'];?>
</a>
            </div>
        <?php } ?>


        <?php }?>
        </div>
            <div class="stat-cell col-sm-5 padding-sm-hr bordered no-border-r valign-top">
                <?php echo $_smarty_tpl->getSubTemplate ("common/calendarwidget.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


                <?php echo $_smarty_tpl->getSubTemplate ("common/tasks.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php echo $_smarty_tpl->getSubTemplate ("common/reminders.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>

    </div>




</div>
<!-- /.stat-panel -->

<?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>
    <div class="stat-panel">
    <div class="stat-row">

        <!-- Small horizontal padding, bordered, without right border, top aligned text -->
        <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
            <!-- Small padding, without top padding, extra small horizontal padding -->
            <h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-anchor text-primary"></i>&nbsp;&nbsp;CRM</h4>
            <!-- Without margin -->
            <ul class="list-group no-margin">
                <!-- Without left and right borders, extra small horizontal padding, without background, no border radius -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showList/2'>New Contacts (this month)</a> <span class="label label-pa-purple pull-right"><?php echo $_smarty_tpl->tpl_vars['crm_new']->value;?>
</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/'>Reminders <?php echo $_smarty_tpl->tpl_vars['thisMonth']->value;?>
</a> <span class="label label-success pull-right"><?php echo $_smarty_tpl->tpl_vars['crm_reminder']->value;?>
</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showCRMList/1'>Total Contacts</a> <span class="label label-danger pull-right"><?php echo $_smarty_tpl->tpl_vars['crm_total']->value;?>
</span> </li>
                <!-- / .list-group-item -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
messages/myMessages/'>Messages</a> <span class="label label-danger pull-right"><?php echo $_smarty_tpl->tpl_vars['messagecount']->value;?>
</span> </li>
                <!-- / .list-group-item -->
            </ul>
        </div>
        <!-- /.stat-cell -->
        <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
            <!-- Small padding, without top padding, extra small horizontal padding -->
            <h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-cloud-upload  text-primary"></i>&nbsp;&nbsp;Proposals</h4>
            <!-- Without margin -->
            <ul class="list-group no-margin">
                <li class="list-group-item no-border-hr padding-xs-hr no-bg"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList'>Proposals Active</a> <span class="label label-success pull-right"><?php echo $_smarty_tpl->tpl_vars['proposal_active']->value;?>
</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList'>Proposals Approved</a> <span class="label label-danger pull-right"><?php echo $_smarty_tpl->tpl_vars['proposal_approved']->value;?>
</span> </li>
                <!-- / .list-group-item -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/0/1'>Proposals Rejected</a> <span class="label label-success pull-right"><?php echo $_smarty_tpl->tpl_vars['proposal_rejected']->value;?>
</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, extra small horizontal padding, without background -->
            </ul>
        </div>
        <!-- Primary background, small padding, vertically centered text -->
        <!-- /.stat-cell -->
        <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
            <!-- Small padding, without top padding, extra small horizontal padding -->
            <h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-truck  text-primary"></i>&nbsp;&nbsp;Work Orders</h4>
            <!-- Without margin -->
            <ul class="list-group no-margin">
                <!-- / .list-group-item -->
                <!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showWOList/2'>Total Work Orders</a> <span class="label label-danger pull-right"><?php echo $_smarty_tpl->tpl_vars['workorder_total']->value;?>
</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, extra small horizontal padding, without background, no border radius -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showWOList/'>In Progress Work Order</a> <span class="label label-pa-purple pull-right"><?php echo $_smarty_tpl->tpl_vars['workorder_active']->value;?>
</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showWOList/1'>Completed Work Orders</a> <span class="label label-success pull-right"><?php echo $_smarty_tpl->tpl_vars['workorder_completed']->value;?>
</span> </li>

            </ul>
        </div>

    </div>
    </div>
<?php }?>
<?php }} ?>
