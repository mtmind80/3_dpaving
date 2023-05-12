<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-01-27 13:48:19
         compiled from "application/views/templates/crm/crmProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167232203560116f23598a08-54286327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b352d8dcb540d3082fb1ca1df2adedfae1b6a0f0' => 
    array (
      0 => 'application/views/templates/crm/crmProfile.tpl',
      1 => 1497340967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167232203560116f23598a08-54286327',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'SITE_URL' => 0,
    'data' => 0,
    'proposals' => 0,
    'workorders' => 0,
    'categories' => 0,
    'cat' => 0,
    'services' => 0,
    'serv' => 0,
    'notes' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_60116f236b2e11_49375061',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60116f236b2e11_49375061')) {function content_60116f236b2e11_49375061($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include '/home/pavingd/public_html/system/smarty/libs/plugins/function.cycle.php';
?><!-- Javascript -->

    <?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" }
        }  );
        $('#jq-datatables-example_wrapper .table-caption').text('Contact Notes');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });





var id = "<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
";


function GoToPage(durl, id)
{

    window.location.href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/' + durl + '/' + id;
}

<?php echo '</script'; ?>
>

 <div class="panel">
    <div class="panel-heading">
            <h2><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntSalutation'])===null||$tmp==='' ? '' : $tmp);?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php if ($_smarty_tpl->tpl_vars['data']->value['cntMiddleName']!=null) {
echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntMiddleName'])===null||$tmp==='' ? '&nbsp;' : $tmp);
}?> <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
</h2>
        <?php echo $_smarty_tpl->tpl_vars['data']->value['ccatName'];?>
<br/>


        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showCRMList"><span class="btn-label icon fa fa-male"></span> List Contacts</a>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" >Basic Information &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/additionalInformation/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Connections &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/catandservice/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Categories and Services &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/crmNotes/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Notes</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" style='color: #000000;'>Profile</span></a> </span> </li
                    >
        </ul>
    </div>

   <div class="panel-body">
       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
          <div style='float:right;'>

              <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/ProfileToPDF/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-sm btn-light-green "><span class="btn-label icon fa fa-save"></span> Export PDF</a>

              <button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('editContact',<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
);">Edit</button></div>
       </div>
       <!-- row -->

       <!-- begin row -->
            <div class="row">
                <?php if ($_smarty_tpl->tpl_vars['data']->value['cntAvatar']) {?>
                    <div class="col-sm-2">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
media/crm/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntAvatar'];?>
" border="0" alt="User Avatar" width='100' />
                    </div>
                <?php } else { ?>
                    <div class="col-sm-2">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/images/pixel-admin/avatar.png" border="0" alt="User Avatar" width='100' />
                    </div>

                <?php }?>

                <div class="col-sm-5">
                        <label>Address</label><br/>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryAddress1'];?>
<br/>
                    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntPrimaryAddress2'])===null||$tmp==='' ? '' : $tmp);?>

                    <?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryState'];?>
. <?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryZip'];?>


                </div>

                <div class="col-sm-5">
                    <label>Billing  Address</label><br/>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillAddress1'];?>
<br/>
                    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntBillAddress2'])===null||$tmp==='' ? '' : $tmp);?>

                    <?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillState'];?>
. <?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillZip'];?>


                </div>



            </div>
            <!-- row -->



       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5">
               <label>Phone/s</label><br/>
               Primary:<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryPhone'];?>
<br/>
               Mobile:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntAltPhone1'])===null||$tmp==='' ? '' : $tmp);?>
<br/>
               Fax:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntAltPhone2'])===null||$tmp==='' ? '' : $tmp);?>

           </div>

           <div class="col-sm-5">
               <label>Email: </label><br/>
               <?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryEmail'];?>
<br/>
               <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntAltEmail'])===null||$tmp==='' ? '' : $tmp);?>

           </div>



       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5">
               <label>Created On</label>:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['cntCreatedDate'],"%B %d, %Y ");?>
<br/>
               <label>Created By</label>:<?php echo $_smarty_tpl->tpl_vars['data']->value['Creator'];?>

           </div>

           <div class="col-sm-5">
               <label>Primary Category</label>:<?php echo $_smarty_tpl->tpl_vars['data']->value['ccatName'];?>
<br/>
               <!-- <label>Last Contacted</label>:12/12/2014<br/> -->
               <?php if ($_smarty_tpl->tpl_vars['proposals']->value>0) {?><label><span class="badge badge-primary"> <?php echo $_smarty_tpl->tpl_vars['proposals']->value;?>
 </span> Proposals</label><br /><?php }?>
               <?php if ($_smarty_tpl->tpl_vars['workorders']->value>0) {?> <label><span class="badge badge-primary"> <?php echo $_smarty_tpl->tpl_vars['workorders']->value;?>
 </span> Work Orders</label><?php }?>
           </div>



       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
           <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('additionalinformation', <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
);">Edit</button></div>
       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5">
               <label>Linked to Company</label><br/>
               <?php if ($_smarty_tpl->tpl_vars['data']->value['cntCompanyId']) {?>
                   <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntCompanyId'];?>
" title="View Company"><?php echo $_smarty_tpl->tpl_vars['data']->value['CompanyName'];?>
</a>
                   <br />

                   <?php echo $_smarty_tpl->tpl_vars['data']->value['companyAddress1'];?>
<br/>
                   <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['companyAddress2'])===null||$tmp==='' ? '' : $tmp);?>

                   <?php echo $_smarty_tpl->tpl_vars['data']->value['companyCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['companyState'];?>
. <?php echo $_smarty_tpl->tpl_vars['data']->value['companyZip'];?>
<br/>
                   <?php echo $_smarty_tpl->tpl_vars['data']->value['companyPhone'];?>

                   <?php } else { ?>
                   NA
                <?php }?>
           </div>

           <div class="col-sm-5">
               <?php if ($_smarty_tpl->tpl_vars['data']->value['cntManagerId']>0) {?>
               <label>My Manager</label><br/>
                   <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntManagerId'];?>
" title="View Manager"><?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerLastName'];?>
</a>
                   <br />
                   <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerAddress1'];?>
<br/>
                   <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['ManagerAddress2'])===null||$tmp==='' ? '' : $tmp);?>

                   <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerState'];?>
. <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerZip'];?>
<br/>
                   <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerPhone'];?>

               <?php }?>

           </div>

       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row" >
           <div class="col-sm-5">
               <label>Billing Address</label><br/>
               <?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillAddress1'];?>
<br/>
               <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntBillAddress2'])===null||$tmp==='' ? '' : $tmp);?>

               <?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillState'];?>
. <?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillZip'];?>

           </div>

           <div class="col-sm-5">
               <label>Property Address</label><br/>
               <?php echo $_smarty_tpl->tpl_vars['data']->value['cntShipAddress1'];?>
<br/>
               <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntShipAddress2'])===null||$tmp==='' ? '' : $tmp);?>

               <?php echo $_smarty_tpl->tpl_vars['data']->value['cntShipCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['cntShipState'];?>
. <?php echo $_smarty_tpl->tpl_vars['data']->value['cntShipZip'];?>

           </div>

       </div>
       <!-- row -->


       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
           <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('catandservice',<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
);">Edit</button></div>
       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5" style='text-align:top;'>
               <label>Contact Categories</label><br/>
               <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
                <?php echo $_smarty_tpl->tpl_vars['cat']->value['ccatName'];?>
<br />
                <?php } ?>
           </div>

           <div class="col-sm-5" style='text-align:top;'>
               <label>Services Provided</label><br/>
               <?php  $_smarty_tpl->tpl_vars['serv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['serv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['serv']->key => $_smarty_tpl->tpl_vars['serv']->value) {
$_smarty_tpl->tpl_vars['serv']->_loop = true;
?>
                   <?php echo $_smarty_tpl->tpl_vars['serv']->value['cservName'];?>
<br />
               <?php } ?>
           </div>

       </div>
       <!-- row -->


       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
           <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('crmNotes',<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
);">Edit</button></div>
       </div>
       <!-- row -->

       <div class="table-primary">
           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
               <thead>
               <tr>
                   <th >Date Created</th>
                   <th >Note</th>
                   <th >Created By</th>
               </tr>
               </thead>
               <tbody>
               <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
               <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
               <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                   <?php if ($_smarty_tpl->tpl_vars['d']->value['cnotNote']) {?>
                       <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                           <td><span class="note-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotCreatedDate'],"%B %d,  %Y");?>
</span></td>
                           <!--
                    cnotReminderDate
                    <td><span class="note-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotReminderDate'],"%B %d,  %Y");?>
</span></td>
                    <td><span class="note-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotCreatedDate'],"%A %B %d,  %Y at %I:%M %p");?>
</span></td>
                    -->

                           <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['cnotNote'];?>

                               <?php if ($_smarty_tpl->tpl_vars['d']->value['cnotReminder']) {?><br/><span class="alert-info"> REMINDER SET<br/><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotReminderDate'],"%B %d,  %Y");?>
</span><?php }?></td>
                           <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['Creator'];?>
</td>
                       </tr>
                   <?php }?>
               <?php } ?>



               </tbody>
           </table>
       </div>


   </div>
    </div>

<?php }} ?>
