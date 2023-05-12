<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-16 13:44:25
         compiled from "application/views/templates/crm/crmList2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:254003560573c93011412e6-24022767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c80237b7c8af42c02dff3832ae50dc1c421eed1' => 
    array (
      0 => 'application/views/templates/crm/crmList2.tpl',
      1 => 1471355046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '254003560573c93011412e6-24022767',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573c9301205253_25404792',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'd' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573c9301205253_25404792')) {function content_573c9301205253_25404792($_smarty_tpl) {?>
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
                "lengthMenu": "Show: _MENU_ Rows" },
            "pageLength": 50,

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

        <h2>Contacts <span style='float:right;'><a class="btn btn-labeled" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showList/1">Advanced Search</a></span></h2>
Records found: <?php echo $_smarty_tpl->tpl_vars['data']->value['total_records'];?>

    </div>
    <div class="panel-body">
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example" data-page-length='25'>
                <thead>
                <tr>
                    <th width='28%'>Name</th>
                    <th width='27%'>Company</th>
                    <th width='30%'>Contact</th>
                    <th width='15%'>Tools</th>
                </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                <tr class="even gradeA">
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
" title="Click to view contact details"><?php if ($_smarty_tpl->tpl_vars['d']->value['cntSalutation']) {
echo $_smarty_tpl->tpl_vars['d']->value['cntSalutation'];?>
 <?php }
echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['cntLastName'];?>
</a>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntAltContactName']) {?><br/>Contact:<?php echo $_smarty_tpl->tpl_vars['d']->value['cntAltContactName'];?>
 <?php }?>
                        <br />Primary Category:<?php echo $_smarty_tpl->tpl_vars['d']->value['ccatName'];?>

                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntAltContactName']) {?><br/>Contact:<?php echo $_smarty_tpl->tpl_vars['d']->value['cntAltContactName'];?>
 <?php }?>


                        &nbsp;
                    </td>

                    <td class="text-left">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntCompanyId'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyName'];?>
</a>
                        <br/>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['CompanyAddress1']) {?>
                            <?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyAddress1'];?>
<br/>
                            <?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyAddress2'];?>

                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['CompanyPhone']) {?><br/><?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyPhone'];
}?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntcid']==9&&$_smarty_tpl->tpl_vars['d']->value['cntManagerId']!=0) {?>
                            <br/>Property Manager; <a href=""<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntManagerId'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['ManagerName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['ManagerLastName'];?>
</a>
                        <?php }?>


                    </td>
                    <td class="text-left">

                        <?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress1'];?>

                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress2']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress2'];
}?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntPrimaryCity']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryCity'];
}?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntPrimaryState']!='') {?>, <?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryState'];?>
. <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntPrimaryZip']!='') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryZip'];
}?>

                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntPrimaryPhone']!='') {?>
                            <br/><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryPhone'];?>

                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntPrimaryEmail']!='') {?>
                        <br/><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryEmail'];?>
" title="Send Email"><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryEmail'];?>
<a/>
                            <?php }?>

                    </td>
                    <td class="text-center">
                        <table><td style="text-align:justify;">
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
">View Profile</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/crmNotes/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
">Notes/Reminders</a>


                                    <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
">Jobs/Proposals</a>

                                <?php $_smarty_tpl->tpl_vars['link'] = new Smarty_variable("crm/additionalinformation/".((string)$_smarty_tpl->tpl_vars['d']->value['cntId']), null, 0);?>
                                <?php if ($_smarty_tpl->tpl_vars['d']->value['cntcid']==9&&$_smarty_tpl->tpl_vars['d']->value['cntCompanyId']>0) {?>
                                <?php $_smarty_tpl->tpl_vars['link'] = new Smarty_variable("workorders/startProposal/".((string)$_smarty_tpl->tpl_vars['d']->value['cntCompanyId'])."/".((string)$_smarty_tpl->tpl_vars['d']->value['cntId']), null, 0);?>
                                <?php }?>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;
echo $_smarty_tpl->tpl_vars['link']->value;?>
">Create Proposal</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
">Basic Information</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/additionalinformation/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
">Connections</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/catandservice/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
">Categories/Services</a>
                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/ProfileToPDF/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
">Print Profile</a>

                            </td>
                        </table>
                    </td>
                </tr>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
<span style='color:#ffffff;'><?php echo $_smarty_tpl->tpl_vars['data']->value['filterWhere'];?>
</span><?php }} ?>
