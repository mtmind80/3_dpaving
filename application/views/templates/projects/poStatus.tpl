<script type="text/javascript">



    function CHECKITS(form)
    {
        if(!tests(form)){ return;
        }

        form.submit();
    }

    function tests(form)
    {

      return confirm('You are about to convert this proposal to an active job. Are you sure?')

    }




    function CHECKIT2(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.jobRejectedReason.value == '')
        {
            alert('You must enter a comment to reject or re-open this proposal.');
            return false;

        }
        return true;


    }
    var id = 0;

    function CHECKIT(form,sendby)
    {
        if(!test(form)){ return;
        }

        if(sendby ==1)
        {
            showSpinner('Please wait while we format the email.');
            var url = "{$SITE_URL}workorders/WOEMailLetter/" + form.lettertype.value + "/{$pid}";
            if(form.lettertype.value == 4)
            {
                var posting = $.post( url, $( "#fdataform" ).serialize() );
            }
            else
            {
                var posting = $.post( url, $( "#ldataform" ).serialize() );
            }

            posting.done(function( data ) {
                hideSpinner();
                var linktext = "<a target='mail' href='mailto:{$proposal['cntPrimaryEmail']}?subject=" + encodeURIComponent("An Email From 3D Paving") +"&body=" + encodeURIComponent(data) + "'>Send Email</a>";
                if(form.lettertype.value == 4)
                {
                    $( "#letterlink2" ).html( linktext );
                }
                else
                {
                    $( "#letterlink" ).html( linktext );

                }
                alert('Click the Send Email link');
            });


            return;
        }
        form.submit();
    }

    function test(form)
    {

        return true;

    }


</script>


<div class="panel">
    <div class="panel-heading">
          <h2>Proposal Status</h2>
        <h4>Manage Proposal Status, Set Alert, Print Letters</h4>

        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>

    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/client/{$proposal.jobID}'><span class="wizard-step-description">Location/Managers &nbsp;</span></a> </span> </li
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
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Status/{$proposal.jobID}'><span class="wizard-step-description" style="color: #000000;">Status &nbsp;</span></a> </span> </li
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

       <!-- row -->
{IF $proposal.jobStatus neq 3}
    {* rejected *}


     {IF $proposal.jobApproved eq 0}
        {* not approved show approve button *}
     {IF $USER_ROLE eq 1 OR $USER_ROLE eq 6 OR $proposal.jobSalesAssigned eq $USER_ID OR $proposal.jobSalesmanagerAssigned eq $USER_ID}

           <!-- row -->
           <form action="#"  name="zdataform" id="zdataform" class="panel">
               <input type="hidden" name="pid" value="{$pid}">
               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-10">
                       <label class="control-label">Approve Proposal - this will lock all editing features, pricing and discount on this proposal.
                       </label>
                   </div>



                   <div class="col-sm-2" >
                       <a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/approvePO/{$pid}','You are about to approve and LOCK this proposal.\nAre you sure?');" class="btn btn-primary btn-labeled"  style='width:120px;'>Approve Proposal</a>
                   </div>

               </div>
           </form>
         {/IF}
    {ELSE}
        {IF $USER_ROLE eq 1}
                   <!-- row -->
                   <form action="#"  name="zdataform" id="zdataform" class="panel">
                       <input type="hidden" name="pid" value="{$pid}">
                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-10">
                               <label class="control-label">UN Approve Proposal - this will un lock all editing features on this proposal.
                               </label>
                           </div>



                           <div class="col-sm-2" >
                               <a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/approvePO/{$pid}/1','You are about to un lock this proposal.\nAre you sure?');" class="btn btn-primary btn-labeled" style='width:110px;'>Un Approve</a>
                           </div>

                       </div>
                   </form>


        {/IF}
    {/IF}

        {IF $proposal.jobStatus eq 2}
               <!-- row -->
               <form action="{$SITE_URL}workorders/convertPO/{$pid}"  name="sdataform" id="sdataform" class="panel" method="POST">
                   <input type="hidden" name="pid" value="{$pid}">
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-5">
                           <label class="control-label">Mark proposal as Signed by client. convert to Job </label>
                       </div>
                       <div class="col-sm-5">
                           <select id="jobMasterID" name="jobMasterID"
                                     class="form-control">
                               <option value="0">Create a New Work Order</option>
                               {foreach $wolist as $w}
                                   <option value="{$w.jobMasterID}">{$w.jobMasterYear}-{$w.jobMasterMonth}-{"%05d"|sprintf:$w.jobMasterNumber}</option>
                               {/foreach}
                               </select>
                       </div>
                       <div class="col-sm-2" >
                           <a href="Javascript:CHECKITS(this.sdataform);" class="btn btn-primary btn-labeled"  style='width:110px;'>Convert to Job</a>
                       </div>

                   </div>
               </form>

        {/IF}

            <!-- row -->
           <form action="{$SITE_URL}workorders/alertPO/{$pid}/{IF $proposal.jobAlert}0{ELSE}1{/IF}"  name="cdataform" id="cdataform" class="panel" method="POST">
               <input type="hidden" name="pid" value="{$pid}">
               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-5">
                       <label class="control-label">{IF $proposal.jobAlert}Remove{ELSE}Set{/IF} Alert on this job or proposal. </label>
                   </div>
                   <div class="col-sm-5">
                       <textarea id="jobAlertNote" name="jobAlertNote"
                                 class="form-control">{$proposal.jobAlertNote}</textarea>
                   </div>

                   <div class="col-sm-2" >
                       <a href="Javascript:this.cdataform.submit();" class="btn btn-primary btn-labeled" style='width:110px;'>{IF $proposal.jobAlert}Remove{ELSE}Set{/IF} Alert</a>
                   </div>

               </div>
           </form>

           {IF $proposal.jobStatus eq 1}
               {* allow reject if not converted to job *}
                <!-- row -->
               <form action="{$SITE_URL}workorders/rejectPO/{$pid}"  name="rdataform" id="rdataform" class="panel" method="POST">
                   <input type="hidden" name="pid" value="{$pid}">
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-5">
                           <label class="control-label">Reject proposal. Please enter a comment. </label>
                       </div>
                       <div class="col-sm-5">
                           <textarea id="jobRejectedReason" name="jobRejectedReason"
                                     class="form-control"></textarea>
                       </div>

                       <div class="col-sm-2" >
                           <a href="Javascript:CHECKIT2(this.rdataform);" class="btn btn-primary btn-labeled" style='width:110px;'>Reject Proposal</a>
                       </div>

                   </div>
               </form>
           {ELSE}
                <span style="font-size:1.2EM; color:Green; padding:10px;">Approved Cannot Reject</span>
           {/IF}
{ELSE}
        {* rejected *}
        {* allow UN reject if not converted to job *}
       {IF $USER_ROLE eq 1}

            <!-- row -->
            <form action="{$SITE_URL}workorders/rejectPO/{$pid}/1"  name="rdataform" id="rdataform" class="panel" method="POST">
                <input type="hidden" name="pid" value="{$pid}">
                <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-3">
                        <label class="control-label">Re-Open proposal. Please enter a comment. </label>
                    </div>
                    <div class="col-sm-4">
                        <textarea id="jobRejectedReason" name="jobRejectedReason"
                                  class="form-control"></textarea>
                    </div>

                    <div class="col-sm-2" >
                        <a href="Javascript:CHECKIT(this.rdataform);" class="btn btn-primary btn-labeled"  style='width:110px;'>Re Open</a>
                    </div>

                </div>
            </form>


       {/IF}
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


       <div class="row panel">

           <!-- row -->
           <form action="{$SITE_URL}workorders/WOLetter/3/{$pid}/1"  name="ldataform" id="ldataform" class="panel" method="POST">
               <input type="hidden" name="beenhere" value="1">
               <input type="hidden" name="pid" id="pid" value="{$pid}">
               <input type="hidden" name="lettertype" value="3">

               <div class="row" style="background:#eeffee">
                   <h4>Follow Up Letter</h4>
               </div>


               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"> Client Name</label>
                           <input type="text" id="clientname" name="clientname" class="form-control"  value="{$proposal['jobPrimaryContact']}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Company Community or Development Name</label>
                           <input type="text" id="communityname" name="communityname" class="form-control"  value="{$proposal['clientfirst']} {$proposal['clientlast']}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Location</label>
                           <input type="text" id="location" name="location" class="form-control"  value="{$proposal['jobAddress1']} {$proposal['jobAddress2']}">
                       </div>
                   </div>

               </div>
               <!-- row -->


               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">City</label>
                           <input type="text" id="city" name="city" class="form-control"  value="{$proposal['jobCity']}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"> Sent By Manager</label>
                           <input type="text" id="manager" name="manager" class="form-control"  value="{$proposal['managerfirst']} {$proposal['managerlast']}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Title </label>
                           <input type="text" id="title" name="title" class="form-control"  value="{$proposal['managertitle']}">
                       </div>
                   </div>

               </div>
               <!-- row -->



               <!-- begin row -->
               <div class="row" >

                   <div class="col-sm-4" >
                       <a href="Javascript:CHECKIT(this.ldataform,0);" class="btn btn-primary btn-labeled" style='width:180px;'><span class="btn-label icon fa fa-print"></span> Print Follow Up Letter</a>
                   </div>
                   <div class="col-sm-4" >
                       <a href="Javascript:CHECKIT(this.ldataform,1);" class="btn btn-primary btn-labeled" style='width:190px;'><span class="btn-label icon fa fa-envelope"></span> Email Follow Up Letter</a>
                   </div>
                   <div class="col-sm-4"  id='letterlink'>
                   </div>

               </div>


           </form>


       </div>
       <!-- begin row -->
       <div class="row panel" >

           <div class="col-sm-7" >
               <!-- Proposal Follow-Up -->
               Dear (clientname),
               <br/>
               I hope this letter finds you well. I wanted to take this opportunity to follow-up on our proposal for
               (communityname) at
               (location) in (city).
               I am committed to giving you the best price possible on the scope of work you requested.
               <br/>
               If there is anything that you would like to discuss, be it expanding the range of a service offered, adding additional solutions, or re-issuing the proposal
               with any administrative changes, please do not hesitate to call me @ 1-855-735-7623.
               <br/>
               In addition, I can help clarify any areas of your proposal that you may be unsure about, as well as answer any technical questions you may have. Finally,
               If you would like me to make a formal presentation to the Board of Directors, that option is always available.
               <br/>
               I look forward to seeing you (and your signature) soon!
               <br/>Sincerely,
               <br/>
               (manager), (title)

           </div>

       </div>



       <div class="row panel">

           <!-- row -->
           <form action="{$SITE_URL}workorders/WOLetter/4/{$pid}/1"  name="fdataform" id="fdataform" class="panel" method="POST">
               <input type="hidden" name="lettertype" value="4">
               <input type="hidden" name="beenhere" value="1">
               <input type="hidden" name="pid" id="pid" value="{$pid}">

               <div class="row" style="background:#eeffee">
                   <h4>Thank You For Signing</h4>
               </div>


               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"> Client Name</label>
                           <input type="text" id="clientname" name="clientname" class="form-control"  value="{$proposal['jobPrimaryContact']}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Community/Development</label>
                           <input type="text" id="communityname" name="communityname" class="form-control"  value="{$proposal['clientfirst']} {$proposal['clientlast']}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Location</label>
                           <input type="text" id="location" name="location" class="form-control"  value="{$proposal['jobAddress1']} {$proposal['jobAddress2']}">
                       </div>
                   </div>

               </div>
               <!-- row -->


               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">City</label>
                           <input type="text" id="city" name="city" class="form-control"  value="{$proposal['jobCity']}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"> Sent By Manager</label>
                           <input type="text" id="manager" name="manager" class="form-control"  value="{$proposal['managerfirst']} {$proposal['managerlast']}">
                       </div>
                   </div>


               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Manager Email</label>
                           <input type="text" id="manageremail" name="manageremail" class="form-control"  value="{$proposal['manageremail']}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Manager Phone </label>
                           <input type="text" id="managerphone" name="managerphone" class="form-control"   value="{$proposal['managerphone']}">
                       </div>
                   </div>

               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row" >

                   <div class="col-sm-4" >
                       <a href="Javascript:CHECKIT(this.fdataform);" class="btn btn-primary btn-labeled" style='width:200px;'><span class="btn-label icon fa fa-print"></span>Print Thank You letter</a>
                   </div>
                   <div class="col-sm-4" >
                       <a href="Javascript:CHECKIT(this.fdataform,1);" class="btn btn-primary btn-labeled" style='width:220px;'><span class="btn-label icon fa fa-envelope"></span>Email Thank You Letter</a>
                   </div>
                   <div class="col-sm-4"  id='letterlink2'>
                   </div>
               </div>


           </form>
           <!-- begin row -->
           <div class="row panel" >

               <div class="col-sm-7" >

                   Dear (clientname),
                   <br />
                   Thank you for accepting our proposal for work to be performed for
                   (communityname) at
                   (location) in
                   (city).
                   <br />
                   We’re excited for the opportunity to provide all of your parking lot and roadway needs.
                   <br />
                   If you have any questions regarding scheduling, permitting, or the scope of work to be performed, please do not hesitate to contact your Project Manager,
                   (manager) @
                   (managerphone) or
                   (manageremail).
                   <br />
                   If at any time you are interested in expanding your project, your Estimator
                   (manager) is always available to discuss your options, as well.
                   <br />
                   <br />
                   Congratulations on making a decision that will have a lasting impact on the value and look of your property. Welcome to the 3D Paving family!
                   <br /><br />
                   Sincerely,
                   <br />Patrick Daly, Owner

               </div>

           </div>

       </div>

   </div>

        </div>




