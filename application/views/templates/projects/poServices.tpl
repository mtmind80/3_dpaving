<script type="text/javascript">

    function chekme(form)

{
    $("#jord").hide();
    var stype = form.stype[form.stype.selectedIndex].value;
    if(stype == 17)
    {
        $("#jord").show();
        alert("Please select a sub contractor.");

    }

}

    $(document).ready(function() {
        $("#jobDiscount").mask("99");

        $('#changeorder').click(function() {

            $('#changeform').submit();

        });

    });


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {
        var pid = form.pid.value;
        var stype = form.stype[form.stype.selectedIndex].value;

        var dURL = '{$SITE_URL}workorders/newPOservices/' + pid + '/' + stype;

        if(form.stype[form.stype.selectedIndex].value ==0)
        {
            alert('You must select a service type to add.');
            form.stype.focus();
            return false;
        }
        if(stype == 17 && form.jordVendorID[form.jordVendorID.selectedIndex].value ==0)
        {
            alert('You must select a sub contractor.')
            return false;
        }

        $('#dataform').attr('action', dURL);

        return true;

    }

</script>


<div class="panel">
    <div class="panel-heading">
          <h2>Manage Proposal Services</h2>
        <h4>Add or adjust proposal services</h4>

        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/client/{$proposal.jobID}'><span class="wizard-step-description" >Location/Managers &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/addPOservices/{$proposal.jobID}'><span class="wizard-step-description" style="color: #000000;">Services &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Notes/{$proposal.jobID}'><span class="wizard-step-description">Notes &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Media/{$proposal.jobID}'><span class="wizard-step-description">Upload &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Status/{$proposal.jobID}'><span class="wizard-step-description">Status &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/previewPO/{$proposal.jobID}'><span class="wizard-step-description">Preview &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">7</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/clientReminder/{$proposal.jobID}'><span class="wizard-step-description">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">


       {include file='projects/_proposalheader.tpl'}


       {IF $proposal.jobStatus eq 1}
       {* Pending not rejected or converted *}

       <!-- row -->
       <form action="{$SITE_URL}workorders/newPOservicesnewPOservices/{$pid}"  name="dataform" id="dataform"  method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">

           <!-- begin row -->
           <div class="row " style="padding:8px;background:#e3e3e3">

               <div class="col-sm-8" style='vertical-align:middle;'>
                   <select name="stype" id="stype" style='font-size:1.4EM;' onChange="javascript:chekme(this.form);">
                    <option value="0">Select a Service</option>
                    {foreach $serviceCats as $s}
                        <option value="{$s['cmpServiceID']}">{$s['cmpServiceCat']} ({$s['cmpServiceName']})</option>

                    {/foreach}
                   </select>
                   <div id="jord" style='display:none;'>
                       <select class="form-control" name="jordVendorID" id="jordVendorID">
                           <option value="0">Select a Sub Contractor</option>
                           {foreach $subcontractors as $o}
                               <option value="{$o.cntId}" >{$o.cntFirstName} {$o.cntLastName}</option>
                           {/foreach}
                       </select>
                   </div>

               </div>
               <div class="col-sm-4" style='vertical-align:middle;float:right;'>
                   <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Service</a>
               </div>
           </div>
           {ELSE}
               Approved by: {$proposal.approvefirst} {$proposal.approvelast}
                <br />
               Approved: {$proposal.jobApprovedDate|date_format:"%A %B %d,  %Y "}
            {/IF}

</form>
           <div class="row alert">

               <div class="col-sm-4">
                      Service
               </div>
               <div class="col-sm-3">
                   Appears As
               </div>
               <div class="col-sm-2">
                   Cost
               </div>
               <div class="col-sm-2">
                   &nbsp;
               </div>
               <div class="col-sm-1">
                   Order
               </div>
           </div>

       <form action="{$SITE_URL}workorders/changeServiceOrder/{$pid}"  name="changeform" id="changeform"  method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">

    <!-- display all po -->
{assign var="st" value="0"}
           {foreach $proposalDetails as $p}
           <!-- begin row -->
           <div class="row panel">

        <div class="col-sm-4">
            {IF $p.cmpServiceDefaultRate > $p.jordCost}
            {$p.cmpServiceCat} - {$p.cmpServiceName}
            <br/><span style="color:#e60000;font-size:0.8EM;"><i>Service Estimate does not meet the minimum cost</i></span>
            {ELSE}
            {$p.cmpServiceCat} - {$p.cmpServiceName}
            {/IF}
        </div>
        <div class="col-sm-3">
            {$p.jordName}
            {IF $p.jordServiceID eq 17 and $p.jordVendorID > 0}
            <br /><a href="{$SITE_URL}crm/viewContact/{$p.jordVendorID}" title="View Contact" target='contact'><span class="btn-label icon fa fa-user"></span>&nbsp;{$p.cntFirstName} {$p.cntLastName}</a>
            {/IF}
        </div>
        <div class="col-sm-2">
            ${$p.jordCost|number_format:2}
        </div>
        {$st = $st + $p.jordCost}

        {IF $proposal.jobStatus >= 2}{* approved signed active rejected*}

            <div class="col-sm-2">
              &nbsp;
            </div>


        {ELSE}

                {* striping is handled differently *}
            {IF $p.jordServiceID eq 18}
                    <div class="col-sm-1">
                        <a href="{$SITE_URL}workorders/editPOStriping/{$pid}/{$p.jordID}/">edit</a>
                    </div>
                    <div class="col-sm-1">
                        <a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/removePOservices/{$pid}/{$p.jordID}/','You are about to remove this service permanently. \nAre you sure?');">remove</a>
                    </div>
                {ELSE}
                    <div class="col-sm-1">
                        <a href="{$SITE_URL}workorders/editPOservices/{$pid}/{$p.jordID}/">edit</a>
                    </div>
                    <div class="col-sm-1">

                <a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/removePOservices/{$pid}/{$p.jordID}/','You are about to remove this service permanently. \nAre you sure?');">remove</a>
                    </div>
            {/IF}


        {/IF}
               <div class="col-sm-1">

                       <input type="text"  class='form_field ' size='3' value="{$p.jordSort}" name="jordSort_{$p.jordID}" id="jordSort_{$p.jordID}">

               </div>

    </div>

{/foreach}
           <div class="row">
               <div class="col-sm-12" >

                   <input class="btn btn-success" type="button" id='changeorder' value='Change Sort Order' style="float:right;">
           </div>

   </div>

    </form>


       {IF $proposal.jobDiscount gt 0 && $st gt 0}
           <!-- begin row -->
           <div class="row panel">
               <div class="col-sm-7">


                   Total
               </div>
               <div class="col-sm-2">
                   ${$st|money_format:2}
               </div>
           </div>

           <!-- begin row -->
           <div class="row panel">
               <div class="col-sm-7">
{assign var="ds" value=0}
                   {$ds = ($st * $proposal.jobDiscount) / 100}
                    {$st = $st - $ds}
                   Discount
               </div>
               <div class="col-sm-2">
{$proposal.jobDiscount} % <span style="color:Red;">(-${$ds|money_format:2})</span>
               </div>
           </div>

           <!-- begin row -->
           <div class="row panel">
               <div class="col-sm-7">


                   Grand Total
               </div>
               <div class="col-sm-2">
                   ${$st|money_format:2}
               </div>
           </div>

       {ELSE}
       <!-- begin row -->
           <div class="row panel">
               <div class="col-sm-7">


                   Grand Total
               </div>
               <div class="col-sm-2">
                       ${$st|money_format:2}
               </div>
           </div>
       {/IF}

       {IF $proposal.jobStatus eq 1}
       <form method="post" action="{$SITE_URL}workorders/updateDiscount/{$pid}" id='dicform'>
           <div class="row panel">
               <div class="col-sm-9" >

                   <input  type="text" id='jobDiscount' name="jobDiscount" value='{$proposal['jobDiscount']}' >
               </div>
               <div class="col-sm-3" >

                   <input class="btn btn-success" type="submit" id='changediscount' value='Update Discount' style="float:right;">
               </div>

           </div>

       </form>

{/IF}

<!--
           {$TandC}
       -->


   </div>

        </div>




