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

        if(form.jobName.value == '')
        {

            //$.growl.error({ title: "Cannot Save", message: "You must enter a name for this proposal." });
            alert("You must enter a name for this proposal.");
            form.jobName.focus();
            return false;
        }

        var prty = $("input[name='jobCommunityID']:checked").length;
        if(prty == 0)
        {

            alert("You must select a property for this proposal.");
            return false;
        }

        return true;

    }


</script>


<div class="panel">
    <div class="panel-heading">
            <h2>Create New Proposal </h2>
        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>
        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>

    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" style="color: #000000;">Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" >Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" >Upload &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Preview &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>

    </div>
   <div class="panel-body">
 <h3>Create Proposal for {$data.cntFirstName} {$data.cntLastName} </h3>
       {IF $data.project_count}
       Current projects:{$data.project_count} <a href='{$SITE_URL}workorders/showPOList/{$id}'>view current projects</a>
       {/IF}
   <form action="{$SITE_URL}workorders/createProposalWithClient/{$id}"  name="dataform" id="dataform" class="panel" method="POST">
 <input type="hidden" name="cid" id="cid" value="{$id}">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Proposal Name</label>
                        <input type="text" id="jobName" name="jobName" class="form-control">
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">NTO</label>
                        <input type="checkbox" id="jobNTO" name="jobNTO" class="form-control checkbox-inline" value ="1">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Permit Required</label>
                        <input type="checkbox" id="jobPermit" name="jobPermit" class="form-control checkbox-inline" value ="1">
                    </div>
                </div>
            </div>
            <!-- row -->
       <!-- begin row -->
       <div class="row">
           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label"> Primary Contact</label>
                   <input type="text" id="jobPrimaryContact" name="jobPrimaryContact" class="form-control"  value="{$data.cntFirstName} {$data.cntLastName}">
               </div>
           </div>

           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Primary Email (<i>used for notifications</i>)</label>
                   <input type="text" id="jobPrimaryEmail" name="jobPrimaryEmail" class="form-control"  value="{$data['cntPrimaryEmail']}">
               </div>
           </div>

       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label"> Primary Phone</label>
                   <input type="text" id="jobPrimaryPhone" name="jobPrimaryPhone" class="form-control"  value="{$data.cntPrimaryPhone}">
               </div>
           </div>

           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Alternate Phone</label>
                   <input type="text" id="jobAltPhone" name="jobAltPhone" class="form-control"  value="{$data['cntAltPhone1']}">
               </div>
           </div>

       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Billing Address Line 1</label>
                   <input type="text" id="jobBillingAddress1" name="jobBillingAddress1" class="form-control" size="45" value="{$data['cntPrimaryAddress1']}">
               </div>
           </div>

           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Billing Address line 2</label>
                   <input type="text" id="jobBillingAddress2" name="jobBillingAddress2" class="form-control"  size="45" value="{$data['cntPrimaryAddress2']}">
               </div>
           </div>

       </div>
       <!-- row -->
       <!-- begin row -->
       <div class="row">
           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Billing City</label>
                   <input type="text" id="jobBillingCity" name="jobBillingCity" class="form-control" value="{$data['cntPrimaryCity']}">
               </div>
           </div>
           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Billing State</label>
                   <select id="jobBillingState" name="jobBillingState" class="form-control" >
                       <option value="{$data['cntPrimaryState']}">{$data['cntPrimaryState']}</option>
                       {$states}
                   </select>
               </div>
           </div>

           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Billing Zip Code</label>
                   <input type="text" id="jobBillingZip" name="jobBillingZip" class="form-control" value="{$data['cntPrimaryZip']}">
               </div>
           </div>

       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-10">
       {if $properties}
           <h4>Select A Property</h4>
           {assign var="numrec" value="0"}
           {foreach $properties as $manage}
               {$numrec = $numrec + 1}
                   <p>
                    {$numrec}. <input type="radio" name="jobCommunityID" id="jobCommunityID" value="{$manage['cntId']}">
                   <a href="#">{$manage['cntFirstName']} {$manage['cntMiddleName']} {$manage['cntLastName']}</a>
                   {if $manage['cntPrimaryAddress1'] neq ''}<br/>{$manage['cntPrimaryAddress1']}{/if}
                   {if $manage['cntPrimaryPhone'] neq ''}<br/>{$manage['cntPrimaryPhone']}{/if}
                   {if $manage['cntPrimaryEmail'] neq ''}<br/>{$manage['cntPrimaryEmail']}{/if}
                   {if $manage['managerfirstname'] neq ''}<br/>Manager:{$manage['managerfirstname']} {$manage['managerlastname']}{/if}
                    </p>
           {/foreach}
       {else}<p>
           <h3>You must have a property to start a proposal.</h3>
                   <a href="Javascript:window.location.href='{$SITE_URL}crm/PropertyWizard/{$id}';" class="btn btn-primary btn-labeled">Add Property</a>
            </p>
       {/if}

           </div>

</div>
<!-- row -->
       {if $properties}
    <!-- buton row -->
        <div class="row">
            <div class="col-sm-4">
            <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Create Proposal</a>
            </div>

            <div class="col-sm-6">
            </div>
        </div>
       {/if}

        </form>
    </div>

        </div>





