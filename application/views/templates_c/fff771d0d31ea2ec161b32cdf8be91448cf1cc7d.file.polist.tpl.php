<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-19 06:38:14
         compiled from "application/views/templates/projects/polist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12573966695880b33698cd36-05333131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fff771d0d31ea2ec161b32cdf8be91448cf1cc7d' => 
    array (
      0 => 'application/views/templates/projects/polist.tpl',
      1 => 1465508948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12573966695880b33698cd36-05333131',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'showrejected' => 0,
    'SITE_URL' => 0,
    'proposals' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5880b3369fb5f0_97443906',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5880b3369fb5f0_97443906')) {function content_5880b3369fb5f0_97443906($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
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






    function ShowPTools(username, id)
    {

        
        HideControls();

        $.post( site_url + "workorders/showTools/", { id: id , username: username})
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

        <h2>Proposals</h2>
<?php if ($_smarty_tpl->tpl_vars['showrejected']->value) {?>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/"><span class="btn-label icon fa fa-wrench"></span> Hide Rejected</a>
<?php } else { ?>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/0/1/"><span class="btn-label icon fa fa-wrench"></span> Show Rejected</a>
<?php }?>
    </div>
    <div class="panel-body">
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th width='28%'>Name</th>
                    <th width='27%'>Client/Location</th>
                    <th width='30%'>Managers</th>
                    <th width='15%'>Tools</th>
                </tr>
                </thead>
                <tbody>
<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proposals']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['p']->value['jobAlert']) {?>
                <tr class="alert-danger">
    <?php } else { ?>
        <tr class="even gradeA">

                    <?php }?>
                    <td class="text-left">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOservices/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
"><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['p']->value['jobName'];?>
</span></a>

                        <br />
                        Created On:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['jobCreatedDateTime'],"%A, %B %e, %Y");?>

                        <br />
                        Created by:<?php echo $_smarty_tpl->tpl_vars['p']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['cntLastName'];?>

                        <br/>
                        Last updated:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['JobLastUpdated'],"%A, %B %e, %Y");?>

                        <br />
                        <span <?php if ($_smarty_tpl->tpl_vars['p']->value['ordStatus']=="Approved") {?>class="badge badge-light-green" <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['ordStatus']=="Rejected") {?> class="badge badge-danger" <?php } else { ?> class="badge badge-info"  <?php }?>><?php echo $_smarty_tpl->tpl_vars['p']->value['ordStatus'];?>
</span>
                        &nbsp;On Alert:<?php if ($_smarty_tpl->tpl_vars['p']->value['jobAlert']) {?>YES <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/images/fires.gif" border="0" alt="Hot" > <?php } else { ?>NO<?php }?>
                    </td>

                    <td class="text-left">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobcntID'];?>
"><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['p']->value['clientfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['clientlast'];?>
</span></a>
                        <br/>
                        Community:<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobCommunityID'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['communityFirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['communityLast'];?>
</a>
                        <br/>
                        Manager:<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobManagerID'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['managerFirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['managerLast'];?>
</a>
                        </td>


                    <td class="text-left">
                        <span class='info-alert'>
                            Manager Assigned:<?php echo $_smarty_tpl->tpl_vars['p']->value['managerfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['managerlast'];?>

                            <br/>Sales Assigned:<?php echo $_smarty_tpl->tpl_vars['p']->value['salesfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['saleslast'];?>

                        </span>
                    </td>

                    <td class="text-center">

                        <table><td valign="top" style="text-align:justify;">
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOservices/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
">Edit Proposal</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Notes/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
">Add Notes</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Media/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
">Add Upload</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Status/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
">Change Status</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/previewPO/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
">View Proposal</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Media/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
/1">Print Proposal</a>
                            </td></table>
                        <!--
                            <a href="Javascript:ShowPTools('<?php echo $_smarty_tpl->tpl_vars['p']->value['jobName'];?>
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
