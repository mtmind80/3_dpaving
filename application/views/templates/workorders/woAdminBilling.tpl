{* Estimator uses this to get to added cost during close from dashboard *}

<script type="text/javascript">



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
</script>




<div class="panel">

   <div class="panel-body">



   <div id="Proposalheader">
       <h2>Enter an invoice number and confirm this item was billed.</h2>

       <span class="alert-danger">This action will close this job and marked it as have been billed. Your name and timestamp will be linked to this record.
       Please make sure all costs are final and billing is correct.</span>
       <h1>{$proposal['jobName']}</h1>
       <h2>{$proposal['ordStatus']}</h2>
       <h3>Work Order: {$proposal.jobMasterYear}-{$proposal.jobMasterMonth}-{"%05d"|sprintf:$proposal.jobMasterNumber}</h3>
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

           <form action="{$SITE_URL}workorders/woCloseAndBill/{$pid}"  name="dataform" id="dataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="pid" id="pid" value="{$pid}">
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



