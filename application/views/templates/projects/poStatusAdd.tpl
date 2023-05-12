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

        if(form.jnotNote.value == '')
        {
            alert('You must enter a comment to reject this proposal.');
            return false;

        }
        return true;


    }

</script>


<div class="panel">
    <div class="panel-heading">
          <h2>Add Proposal Service</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/addPOservices/{$pid}"><span class="btn-label icon fa fa-male"></span> Cancel</a>

    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/client/{$proposal.jobID}'><span class="wizard-step-description">Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/addPOservices/{$proposal.jobID}'><span class="wizard-step-description">Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Notes/{$proposal.jobID}'><span class="wizard-step-description" >Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Media/{$proposal.jobID}'><span class="wizard-step-description" >Upload &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Status/{$proposal.jobID}'><span class="wizard-step-description" style="color: #000000;">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/previewPO/{$proposal.jobID}'><span class="wizard-step-description">Preview &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">

   <div id="Proposalheader">
       <h3>{$proposal.jobName}</h3>
   </div>



       <!-- begin row -->
       <div class="row">
           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
               Created for: <a href="{$SITE_URL}crm/viewContact/{$proposal['clientid']}" target='client'>{$proposal.clientfirst} {$proposal.clientlast}</a>
                   <br />
               Created Date:{$proposal.jobCreatedDateTime|date_format:"%A, %B %e, %Y"}
                   <br />
               Created By:{$proposal.cntFirstName} {$proposal.cntLastName}
               </div>
           </div>

           <div class="col-sm-5">
               <div class="form-group no-margin-hr">
                   Age:{$old}{$age} days old
                   <br />
                   Last Contacted Date:{IF isset($lastContact['cnotCreatedDate'])}{$lastContact['cnotCreatedDate']|date_format:"%A, %B %e, %Y"}{/IF}
                   <br />
                   Last Contacted By:{IF isset($lastContact['Creator'])}{$lastContact['Creator']}{/IF}
                   <br />
                   Current Status:<b> {$proposal.ordStatus}</b>
               </div>
           </div>

       </div>
       <!-- row -->


{IF $proposal.jobStatus eq 1}
    {* not approved show approve button *}


       <!-- row -->
       <form action="#"  name="zdataform" id="zdataform" class="panel">
           <!-- begin row -->
           <div class="row" >
               <div class="col-sm-7">
                   <label class="control-label">Approve Proposal - this will lock all editing features on this proposal.
                   </label>
               </div>



               <div class="col-sm-2" >
                   <a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/approvePO/{$pid}','You are about to approve and LOCK this proposal.\nAre you sure?');" class="btn btn-primary btn-labeled">Approve Proposal</a>
               </div>

           </div>
       </form>

{/IF}
       {IF $proposal.jobStatus eq 2}

           <!-- row -->
           <form action="{$SITE_URL}workorders/signedPO/{$pid}"  name="sdataform" id="sdataform" class="panel" method="POST">
               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-7">
                       <label class="control-label">Mark proposal as Signed by client. </label>
                   </div>

                   <div class="col-sm-2" >
                       <a href="Javascript:CHECKIT(this.sdataform);" class="btn btn-primary btn-labeled">Mark as Signed</a>
                   </div>

               </div>
           </form>

       {/IF}

<!-- row -->
       <form action="{$SITE_URL}workorders/alertPO/{$pid}/{IF $proposal.jobAlert}0{ELSE}1{/IF}"  name="cdataform" id="cdataform" class="panel" method="POST">
           <!-- begin row -->
           <div class="row" >
               <div class="col-sm-3">
                   <label class="control-label">{IF $proposal.jobAlert}Remove{ELSE}Set{/IF} Alert on this job or proposal. </label>
               </div>
               <div class="col-sm-4">
                   <textarea id="jobAlertNote" name="jobAlertNote"
                             class="form-control">{$proposal.jobAlertNote}</textarea>
               </div>

               <div class="col-sm-2" >
                   <a href="Javascript:this.cdataform.submit();" class="btn btn-primary btn-labeled">{IF $proposal.jobAlert}Remove{ELSE}Set{/IF} Alert</a>
               </div>

           </div>
       </form>

       {IF $proposal.jobStatus < 3}
       {* allow reject if not converted to job *}
       <!-- row -->
       <form action="{$SITE_URL}workorders/rejectPO/{$pid}"  name="rdataform" id="rdataform" class="panel" method="POST">
           <!-- begin row -->
           <div class="row" >
               <div class="col-sm-3">
                   <label class="control-label">Reject proposal. Please enter a comment. </label>
               </div>
               <div class="col-sm-4">
                   <textarea id="jnotNote" name="jnotNote"
                             class="form-control"></textarea>
               </div>

               <div class="col-sm-2" >
                   <a href="Javascript:CHECKIT(this.rdataform);" class="btn btn-primary btn-labeled">Reject proposal</a>
               </div>

           </div>
       </form>

       {/IF}
       <!--
              jobStatus
              jobApprovedBy
              jobApprovedDate

              JobLastUpdated
              jobLastUpdatedBy
              jobDiscount
              jobAlert
              jobAlertNote
              jobProposalPDF
       -->
    </div>

        </div>




