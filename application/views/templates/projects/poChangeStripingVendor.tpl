<script type="text/javascript">


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {
        var sid = form.sid.value;
        var pid = form.pid.value;
        var vendorid = form.vendorid[form.vendorid.selectedIndex].value;
        var dURL = '{$SITE_URL}workorders/changeStripingVendor/' + pid + '/' + sid + '/' + vendorid;

        if(form.vendorid[form.vendorid.selectedIndex].value ==0)
        {
            alert('You must select a vendor.');
            form.vendorid.focus();
            return false;
        }

        $('#dataform').attr('action', dURL);

        return true;

    }

</script>


<div class="panel">
    <div class="panel-heading">
          <h2>{$proposal.jobName}</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/client/{$proposal.jobID}'><span class="wizard-step-description" >Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/addPOservices/{$proposal.jobID}'><span class="wizard-step-description" style="color: #000000;">Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Notes/{$proposal.jobID}'><span class="wizard-step-description">Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Media/{$proposal.jobID}'><span class="wizard-step-description">Media &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Status/{$proposal.jobID}'><span class="wizard-step-description">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/previewPO/{$proposal.jobID}'><span class="wizard-step-description">Preview &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">


       {include file='projects/_proposalheader.tpl'}



       <!-- row -->
       <form action=""  name="dataform" id="dataform" class="panel" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">
           <input type="hidden" name="sid" id="sid" value="{$sid}">

           <!-- begin row -->
           <div class="row panel" style="border:1px solid #000000;background:#e3e3e3">

               <div class="col-sm-6" style='vertical-align:middle;'>
                   <select name="vendorid" id="vendorid" style='font-size:1.4EM;'>
               <option value="0">Select a Vendor</option>
                       <option value="PFS">PFS</option>
                       <option value="Native_Lines">Native Lines</option>
                       <option value="Scott_Munroe">Scott Munroe</option>
                       <option value="All_Striping">All Striping</option>
           </select>
               </div>

               <div class="col-sm-4" style='vertical-align:middle;float:right;'>
                   <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add New Service To Proposal</a>
               </div>

           </div>


   </div>

</div>




