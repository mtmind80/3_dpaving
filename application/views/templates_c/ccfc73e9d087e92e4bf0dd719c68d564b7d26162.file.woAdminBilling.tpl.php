<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-13 08:45:35
         compiled from "application/views/templates/workorders/woAdminBilling.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18024388635929d94c5ea3e7-09332681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccfc73e9d087e92e4bf0dd719c68d564b7d26162' => 
    array (
      0 => 'application/views/templates/workorders/woAdminBilling.tpl',
      1 => 1497341061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18024388635929d94c5ea3e7-09332681',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5929d94c660ed3_70301871',
  'variables' => 
  array (
    'proposal' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5929d94c660ed3_70301871')) {function content_5929d94c660ed3_70301871($_smarty_tpl) {?>

<?php echo '<script'; ?>
 type="text/javascript">



init.push(function () {
    $("#jobBillingAmount").mask("9999999.99");

});



function CHECKIT(form)
{
    if(!test(form)){ return;

    }

    form.submit();

}

function test(form)
{


    if(form.jobBillingInvoice.value == '')
    {
        alert('Enter an invoice number');
        form.jobBillingInvoice.focus();
        return false;
    }


    return confirm('You are about to close this job, and mark it as billed.');


}


function countme(strinput)
{
    var l = strinput.length;
    if(l > 500)
    {
        $("#tcount").html('<span style="color:Red;">' + l + ' too many characters 500 allowed</span>');
         return;
    }
    $("#tcount").html('(<i>' +l + ' characters  500 allowed</i>)');
}
<?php echo '</script'; ?>
>




<div class="panel">

   <div class="panel-body">



   <div id="Proposalheader">
       <h2>Enter an invoice number and confirm this item was billed.</h2>

       <span class="alert-danger">This action will close this job and marked it as have been billed. Your name and timestamp will be linked to this record.
       Please make sure all costs are final and billing is correct.</span>
       <h1><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobName'];?>
</h1>
       <h2><?php echo $_smarty_tpl->tpl_vars['proposal']->value['ordStatus'];?>
</h2>
       <h3>Work Order: <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['proposal']->value['jobMasterNumber']);?>
</h3>
       <br/>
   </div>
   <!-- begin row -->


   <!-- Materials -->
   <br />
   <div class="row"  style='padding:10px;'>

       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
               <h3>Invoice number </h3>
       </div>
       <!-- / .panel-heading -->

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/woCloseAndBill/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="dataform" id="dataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-4">
                       <label class="control-label">Invoice Number</label>
                        <input class='form-control-sm' type='text" name='jobBillingInvoice' id='jobBillingInvoice'>
                   </div>
                   <div class="col-sm-4">
                       <label class="control-label">Invoice Amount</label>
                       <input class='form-control-sm' type='text" name='jobBillingAmount' id='jobBillingAmount'>
                   </div>
               </div>
               <br/>
               <br/>
               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-2">
                       <label class="control-label">Invoice Note</label>
                   </div>
                   <div class="col-sm-8">
                       <textarea  cols="45" rows="3" name='jobBillingNote' id='jobBillingNote' OnKeyUp="countme(this.value);"></textarea>
                       <div class='alert-info' style='width:350px;font-size:0.8EM' id='tcount'>0 characters</div>
                   </div>
                   <div class="col-xs-2">

                   </div>
               </div>


              <br />

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Mark Job as Billed</a>
                   </div>


               </div>

           </form>


   </div>
</div>
   </div>



<?php }} ?>
