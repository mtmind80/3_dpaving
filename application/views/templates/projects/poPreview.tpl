
<script type="text/javascript">



    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


    });


    var id = 0;

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.stype[form.stype.selectedIndex].value ==0)
        {
            alert('You must select a service type to add.');
            form.stype.focus();
            return false;
        }



        return true;

    }


</script>


<div class="panel">
    <div class="panel-heading">
          <h2>Preview Proposal </h2>
        <h4>Preview Proposal Details</h4>

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
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/addPOservices/{$proposal.jobID}'><span class="wizard-step-description">Services &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Notes/{$proposal.jobID}'><span class="wizard-step-description" >Notes &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Media/{$proposal.jobID}'><span class="wizard-step-description" >Upload &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Status/{$proposal.jobID}'><span class="wizard-step-description">Status &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/previewPO/{$proposal.jobID}'><span class="wizard-step-description" style="color: #000000;">Preview &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">7</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/clientReminder/{$proposal.jobID}'><span class="wizard-step-description">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            
            <li>

                <a href="{$SITE_URL}workorders/Media/{$proposal.jobID}/1" class="btn btn-sm btn-light-green" ><span class="btn-label icon fa fa-print"></span> &nbsp;Print Proposal </a>
<!--
            <a href="{$SITE_URL}reports/ProposalToPDF/{$proposal.jobID}" class="btn btn-sm btn-light-green" ><span class="btn-label icon fa fa-print"></span> &nbsp;Print Proposal </a>
-->
            </li>
        </ul>
    </div>
   <div class="panel-body">

       {include file='projects/_proposalheader.tpl'}


       <!-- display all po -->

       {assign var="st" value="0"}
       {foreach $proposalDetails as $p}


           <!-- begin row -->
           <div class="row alert">
               <div class=" col-sm-10">
                   {$p.jordName}
               </div>
               <div class=" col-sm-2">
               <a href="javascript:ShowTools('Edit Me', {$p.jordID}, 'workorders/showProposalText/{$p.jordID}');">Click to Edit</a>
               </div>
           </div>

           <div class="row">
                <div class="col-sm-1">&nbsp;
                </div>
                <div class="col-sm-8">
                    {$p.jordProposalText}
                    <br/>

               </div>
          </div>
          <div class="row">
              <div class="col-sm-8">
               &nbsp;
              </div>
              <div class="col-sm-2">
                   ${$p.jordCost|number_format:2}
               </div>
          </div>


               {$st = $st + $p.jordCost}

       {/foreach}
<hr>
       <br/>
       <!-- begin row -->
       <div class="row panel">
 {IF $proposal['jobDiscount'] gt 0 AND $st gt 0}
 {assign var="da" value=0}
    <!-- begin row -->
    <div class="row">
        <div class="col-sm-8">
            Total
        </div>
        <div class="col-sm-4">
           ${$st|number_format:2}
        </div>
    </div>
     <hr>
     <br/>

    <div class="row">
        <div class="col-sm-8">
            {$da = $st * $proposal['jobDiscount']}
            {$da = $da / 100}
            {$st = $st - $da}
           Discount {$proposal['jobDiscount']}%
        </div>
        <div class="col-sm-4">
            <span style="color:Red;">(-${$da|number_format:2})</span>
        </div>
    </div>

     <hr>
     <br/>
    <div class="row">
        <div class="col-sm-8">
            <br/>Grand Total
        </div>
        <div class="col-sm-4">
            ${$st|number_format:2}
        </div>
    </div>


{ELSE}
       <!-- begin row -->
       <div class="row">
           <div class="col-sm-8">
               Total
           </div>
           <div class="col-sm-4">
               ${$st|number_format:2}
           </div>
       </div>
{/IF}
           </div>
       <br />
 <!--
       <br />
       <br />SIGNATURE ________________________________________
       <br />
       &nbsp; &nbsp;
       <br />
       &nbsp; &nbsp;
       <br />DATE _________________________
-->
       <p style='page-break-after: always;'>
       &nbsp;
       <p />

{$TandC}

    </div>

        </div>




