<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-09 21:58:34
         compiled from "application/views/templates/workorders/wolist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1526497363573b837ae81a18-06296366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1c541fa05b67b8525ade1006a08aef403cf0ce4' => 
    array (
      0 => 'application/views/templates/workorders/wolist.tpl',
      1 => 1465508958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1526497363573b837ae81a18-06296366',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573b837af22d46_12283164',
  'variables' => 
  array (
    'proposals' => 0,
    'p' => 0,
    'SITE_URL' => 0,
    'USER_ROLE' => 0,
    'showcompleted' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573b837af22d46_12283164')) {function content_573b837af22d46_12283164($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/system/smarty/libs/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
?>
<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<?php echo '<script'; ?>
>
    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" }
        }  );
        //$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });






    function ShowTools(username, id)
    {

        
        HideControls();

        $.post( site_url + "workorders/showWOTools/", { id: id , username: username})
                .done(function( data ) {
                    $('#DocManageLabel').html(username);
                    $('#ManagedContent').html(data);
                    $("#DocManage").css({left:mouseX,top:mouseY });
                    $('#DocManage').show();
                });
        

    }



<?php echo '</script'; ?>
>
<!-- / Javascript -->
<div class="panel">
    <div class="panel-heading">

        <h2>Work Orders</h2>

    </div>
    <div class="panel-body">
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th width='15%'>Work Order</th>
                    <th width='12%'>Client</th>
                    <th width='20%'>Services</th>
                    <th width='20%'>Primary Address</th>
                    <th width='17%'>Managers</th>
                    <th width='16%'>Tools</th>
                </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proposals']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>

                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['p']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['p']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['p']->value['jobMasterNumber']);?>
<br/>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPreview/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
"><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['p']->value['jobName'];?>
</span></a><br/>
                        <?php if ($_smarty_tpl->tpl_vars['p']->value['jobPermit']==1) {?>
                            <span style="color:darkblue;">Permits Required</span><br/><?php }?>
                    <span <?php if ($_smarty_tpl->tpl_vars['p']->value['jobStatus']==6) {?>class="badge badge-light-green" <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['jobStatus']==7) {?> class="badge badge-danger" <?php } else { ?> class="badge badge-info"  <?php }?>><?php echo $_smarty_tpl->tpl_vars['p']->value['ordStatus'];?>
</span>
                    <br/>


                    </td>

                    <td class="text-left"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobcntID'];?>
"><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['p']->value['clientfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['clientlast'];?>
</span></a>
                      <br />Contact:  <?php echo $_smarty_tpl->tpl_vars['p']->value['jobPrimaryContact'];?>

                        <br />Email: <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['p']->value['jobPrimaryEmail'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['jobPrimaryEmail'];?>
</a>
                       <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>
                        <br />Cost Estimate:$<?php echo number_format($_smarty_tpl->tpl_vars['p']->value['totalcost'],2,".",",");?>

                        <?php }?>
                    </td>
                        <td class="text-left">
                            <?php echo $_smarty_tpl->tpl_vars['p']->value['JobNames'];?>

                        </td>
                    <td class="text-left">
                        Location:
                        <?php if ($_smarty_tpl->tpl_vars['p']->value['jobAddress1']!='') {?>
                            <a href="Javascript:showUserOnMap('<?php echo $_smarty_tpl->tpl_vars['p']->value['jobName'];?>
', '<?php echo $_smarty_tpl->tpl_vars['p']->value['jobAddress1'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['jobAddress2'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['jobCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['p']->value['jobState'];?>
. <?php echo $_smarty_tpl->tpl_vars['p']->value['jobZip'];?>
');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                            <a href="https://www.google.com/#q=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['p']->value['jobAddress1'],' ','+');?>
+<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['p']->value['jobCity'],' ','+');?>
+<?php echo $_smarty_tpl->tpl_vars['p']->value['jobState'];?>
+<?php echo $_smarty_tpl->tpl_vars['p']->value['jobZip'];?>
" title="Get Directions" target="Drive"><span class=" icon fa fa-truck"></span></a>
                            <br />
                        <?php }?>

                               <?php echo $_smarty_tpl->tpl_vars['p']->value['jobAddress1'];?>

                        <br /><?php echo $_smarty_tpl->tpl_vars['p']->value['jobAddress2'];?>

                        <br /><?php echo $_smarty_tpl->tpl_vars['p']->value['jobCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['p']->value['jobState'];?>
 . <?php echo $_smarty_tpl->tpl_vars['p']->value['jobZip'];?>

                    </td>
                    <td class="text-left">Created On:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['jobCreatedDateTime'],"%A, %B %e, %Y");?>

                        <br />
                        Created by:<?php echo $_smarty_tpl->tpl_vars['p']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['cntLastName'];?>
<br/>
                        <span class='info'>
                            Manager Assigned:<?php echo $_smarty_tpl->tpl_vars['p']->value['managerfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['managerlast'];?>
 <br/>Sales Assigned:<?php echo $_smarty_tpl->tpl_vars['p']->value['salesfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['saleslast'];?>

                        </span>
                        <br />
                        Last updated:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['JobLastUpdated'],"%A, %B %e, %Y");?>

                    </td>
                    <td class="text-center">
                        <table><td valign="top" style="text-align:justify;">
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPreview/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
">Manage Services</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WONotes/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
">Add Notes</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMedia/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
">Add Uploads</a>
                                <?php if ($_smarty_tpl->tpl_vars['p']->value['jobPermit']) {?>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPermits/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
">Manage Permits</a>
                                <?php }?>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOClient/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
">Client/Notices</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMedia/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
/1">Print Work Order</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Media/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
/1">Print Proposal</a>
                                <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1&&$_smarty_tpl->tpl_vars['p']->value['jobStatus']==8) {?>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/rollbackBilling/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['showcompleted']->value;?>
">Rollback Billing</a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1&&$_smarty_tpl->tpl_vars['p']->value['jobStatus']==6) {?>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/rollbackCompleted/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['showcompleted']->value;?>
">Rollback Completed</a>
                                <?php }?>

                            </td></table>
<!--                        <a href="Javascript:ShowTools('<?php echo $_smarty_tpl->tpl_vars['p']->value['jobName'];?>
','<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
');" title="Show Tools"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/images/tools2.gif" border="0" alt="Tools" width="26" height="26" VALIGN='top'></a>
                        &nbsp;
    -->
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
<?php }} ?>
