<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-27 15:00:28
         compiled from "application/views/templates/crm/crmProfileView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3080886995939463b279d29-27217698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27e99fd174561552dd6669d23d0effd838083309' => 
    array (
      0 => 'application/views/templates/crm/crmProfileView.tpl',
      1 => 1497340968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3080886995939463b279d29-27217698',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5939463b432536_17490505',
  'variables' => 
  array (
    'id' => 0,
    'SITE_URL' => 0,
    'data' => 0,
    'categories' => 0,
    'cat' => 0,
    'services' => 0,
    'serv' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5939463b432536_17490505')) {function content_5939463b432536_17490505($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
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

        <h2>My Profile</h2>
        <h2><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntSalutation'])===null||$tmp==='' ? '' : $tmp);?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php if ($_smarty_tpl->tpl_vars['data']->value['cntMiddleName']) {
echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntMiddleName'])===null||$tmp==='' ? '&nbsp;' : $tmp);
}
echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
</h2>

        </div>

   <div class="panel-body">
       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
        <!--  <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('editContact',<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
);">Edit</button></div>
-->
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

           <div class="col-sm-4">
               <label>Created On</label>:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['cntCreatedDate'],"%B %d, %Y ");?>
<br/>
               <label>Created By</label>:<?php echo $_smarty_tpl->tpl_vars['data']->value['Creator'];?>
<br/>


           </div>

       </div>
       <!-- row -->


       <!-- begin row -->
       <div class="row">
           <div class="col-sm-2">
               <label>Phone</label><br/>
               <?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryPhone'];?>
<br/>
               <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntAltPhone1'])===null||$tmp==='' ? '' : $tmp);?>
<br/>
               <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntAltPhone2'])===null||$tmp==='' ? '' : $tmp);?>

           </div>

           <div class="col-sm-3">
               <label>Email</label><br/>
               <?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryEmail'];?>
<br/>
               <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntAltEmail'])===null||$tmp==='' ? '' : $tmp);?>

           </div>

           <div class="col-sm-3">
               <label>Title</label>
               <?php echo $_smarty_tpl->tpl_vars['data']->value['cntJobTitle'];?>
<br/>
               <label>Department</label><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntDepartment1'])===null||$tmp==='' ? '' : $tmp);?>
<br/>
           </div>

           <div class="col-sm-2">
               <label>Gender</label>:
               <?php echo $_smarty_tpl->tpl_vars['data']->value['cntGender'];?>
<br/>
               <label>DOB</label>:
               <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cntDateOfBirth'])===null||$tmp==='' ? '' : $tmp);?>

           </div>


       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
<!--
           <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('additionalinformation', <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
);">Edit</button></div>
      -->
&nbsp;       </div>
       <!-- row -->


       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5">
               <label>Company</label><br/>
               <?php if ($_smarty_tpl->tpl_vars['data']->value['cntCompanyId']) {?>
                   <div style='float:right;'><button type="button" class=".btn-xs btn-info" onClick="Javascript:GoToPage('viewContact',<?php echo $_smarty_tpl->tpl_vars['data']->value['cntCompanyId'];?>
);">Company</button></div>
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
               <label>Development</label><br/>
               <?php if ($_smarty_tpl->tpl_vars['data']->value['cntDevelopmentId']) {?>
                   <div style='float:right;'><button type="button" class=".btn-xs btn-info" onClick="Javascript:GoToPage('viewContact',<?php echo $_smarty_tpl->tpl_vars['data']->value['cntDevelopmentId'];?>
);">Development</button></div>
               <?php echo $_smarty_tpl->tpl_vars['data']->value['developmentAddress1'];?>
<br/>
               <?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['developmentAddress2'])===null||$tmp==='' ? '' : $tmp);?>

               <?php echo $_smarty_tpl->tpl_vars['data']->value['developmentCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['developmentState'];?>
. <?php echo $_smarty_tpl->tpl_vars['data']->value['developmentZip'];?>
<br/>
               <?php echo $_smarty_tpl->tpl_vars['data']->value['developmentPhone'];?>

               <?php } else { ?>
                   NA
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
               <label>Shipping Address</label><br/>
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
   <!--        <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('catandservice',<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
);">Edit</button></div>
      --> &nbsp; </div>
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



   </div>
    </div>
<?php }} ?>
