<link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>

<script type="text/javascript">



    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


        $("#jobPrimaryPhone").mask("(999) 999-9999");
        $("#jobAltPhone").mask("(999) 999-9999");
    });


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


    function CHECKIT2(form)
    {
        if(!test2(form)){ return;
        }

        form.submit();
    }

    function test2(form)
    {

        if(form.jobBillingAddress1.value =='')
        {
            alert("You must enter an address.")
            form.jobBillingAddress1.focus();
            return false;
        }


        if(form.jobBillingCity.value =='')
        {
            alert("You must enter a City.")
            form.jobBillingCity.focus();
            return false;
        }





        if(form.jobName.value =='')
        {
            alert("Name cannot be blank.")
            form.jobName.focus();
            return false;
        }

        if(form.jobPrimaryEmail.value =='')
        {
            alert("Primary Email cannot be blank.")
            form.jobPrimaryEmail.focus();
            return false;
        }



        if(form.jobPrimaryContact.value =='')
        {
            alert("Primary Contact cannot be blank.")
            form.jobPrimaryContact.focus();
            return false;
        }




        if(form.jobBillingZip.value =='')
        {
            alert("You must enter a zip code.")
            form.jobBillingZip.focus();
            return false;
        }

        return true;

    }

    function CHECKIT3(form)
    {
        if(!test3(form)){ return;
        }

        form.submit();
    }

    function test3(form)
    {

        if(form.jobAddress1.value =='')
        {
            alert("You must enter an address.")
            form.jobAddress1.focus();
            return false;
        }


        if(form.jobCity.value =='')
        {
            alert("You must enter a City.")
            form.jobCity.focus();
            return false;
        }


        if(form.jobZip.value =='')
        {
            alert("You must enter a zip code.")
            form.jobZip.focus();
            return false;
        }

        return true;

    }



</script>


<div class="panel">
    <div class="panel-heading">
          <h2>Locations and Managers</h2>
        <h4>Primary Billing Address, Job Site Location. Assign Managers, Update Materials Pricing.</h4>

        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>

    </div>
    <div class="wizard-wrapper">
        <ul class="wizard-steps" id="menu">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/client/{$proposal.jobID}'><span class="wizard-step-description" style="color: #000000;">Client/Location &nbsp;</span></a> </span> </li
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

       <form action="{$SITE_URL}workorders/updatePOClient/{$pid}"  name="changeClientform" id="changeClientform" class="panel" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">
       <div id="chooseexisting">
           <p>Change Client :

           <select id="jobcntID" name="jobcntID" class="form-control">
               {foreach $contactlist.rows as $d}
               <option value="{$d.cntId}" {if $d.cntId == $proposal['clientid']}selected="selected"{/if} />{$d.cntFirstName} {$d.cntLastName}</option>
               {$contactlist}
               {/foreach}
           </select>

           </p>
           <div class="row">
               <div class="col-sm-4" >
                   <div class="form-group no-margin-hr">
                       <input type="submit" class="btn btn-primary btn-labeled" style="width:200px;" />
                   </div>
               </div>
           </div>
       </div>
           </form>

       <!-- begin row -->
       <div class="row" >
           <div class="col-sm-12" style="background:#eeffee">
           <h4>Proposal Client : {$proposal['clientfirst']} &nbsp;{$proposal['clientlast']} </h4>
               </div>
       </div>


       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5">
               <div class="form-group no-margin-hr">
                   {$proposal['cntPrimaryAddress1']} &nbsp;
                    {$proposal['cntPrimaryAddress2']}<br />
                    {$proposal['cntPrimaryCity']}, &nbsp;
                    {$proposal['cntPrimaryState']}. &nbsp;
                    {$proposal['cntPrimaryZip']}
               </div>
           </div>

           <div class="col-sm-5">
               <div class="form-group no-margin-hr">
                   Email: {$proposal['cntPrimaryEmail']}
                   <br />
                   Phone: {$proposal['cntPrimaryPhone']}
                    <br />
                   Parcel Number: {$proposal['cntParcelNumber']}
               </div>
           </div>

       </div>
   {IF $proposal.jobStatus neq 3}
       {* not rejected*}
       <!-- row -->
       <form action="{$SITE_URL}workorders/updatePOAddress/{$pid}"  name="adataform" id="adataform" class="panel" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">
       <div class="row" style="background:#eeffee">
           <h4>Proposal Name, Primary Contact Information</h4>
       </div>

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-6">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Proposal Name</label>
                       <input type="text" name="jobName" id="jobName" value="{$proposal['jobName']}" class="form-control" >
                   </div>

               </div>
               <div class="col-sm-1">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">NTO</label>
                       <input type="checkbox" name="jobNTO" id="jobNTO" value="1" class="form-control inline" {IF $proposal['jobNTO']} checked {/IF}/>
                   </div>

               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Permit Required</label>
                       <input type="checkbox" name="jobPermit" id="jobPermit" value="1" class="form-control inline" {IF $proposal['jobPermit']} checked {/IF}/>
                   </div>

               </div>

           </div>

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Primary Contact</label>
                       <input type="text" id="jobPrimaryContact" name="jobPrimaryContact" class="form-control"  value="{$proposal['jobPrimaryContact']}">
                   </div>
               </div>

               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Primary Email (<i>used for notifications</i>)</label>
                       <input type="text" id="jobPrimaryEmail" name="jobPrimaryEmail" class="form-control"  value="{$proposal['jobPrimaryEmail']}">
                   </div>
               </div>

           </div>
           <!-- row -->

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Primary Phone</label>
                       <input type="text" id="jobPrimaryPhone" name="jobPrimaryPhone" class="form-control"  value="{$proposal['jobPrimaryPhone']}">
                   </div>
               </div>

               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Alt Phone</label>
                       <input type="text" id="jobAltPhone" name="jobAltPhone" class="form-control"  value="{$proposal['jobAltPhone']}">
                   </div>
               </div>

           </div>
           <!-- row -->

       <!-- begin row -->
       <div class="row">
          <div class="col-sm-5">
               <div class="form-group no-margin-hr">
                   <label class="control-label inline">Address line 1</label>
                   <input type="text" name="jobBillingAddress1" id="jobBillingAddress1" value="{$proposal['jobBillingAddress1']}" class="form-control inline"/>
              </div>
          </div>

           <div class="col-sm-5">
              <div class="form-group no-margin-hr">
                  <label class="control-label inline">Address line 2</label>
                  <input type="text" name="jobBillingAddress2" id="jobBillingAddress2" value="{$proposal['jobBillingAddress2']}" class="form-control inline"/>
              </div>
          </div>
       </div>

           <!-- begin row -->
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group no-margin-hr">
                   <label class="control-label inline">City</label>
                   <input type="text" name="jobBillingCity" id="jobBillingCity" value="{$proposal['jobBillingCity']}" class="form-control inline"/>
                </div>
            </div>
            <div class="col-sm-3">
                  <div class="form-group no-margin-hr">
                      <label class="control-label inline">State</label>
                      <select id="jobBillingState" name="jobBillingState" class="form-control">
                          {IF {$proposal['jobBillingState']} neq ''}<option value="{$proposal['jobBillingState']}">{$proposal['jobBillingState']}</option>{/IF}
                          {$states}
                      </select>
                  </div>
            </div>
             <div class="col-sm-3">
                  <div class="form-group no-margin-hr">
                      <label class="control-label inline">Zip</label>
                      <input type="text" name="jobBillingZip" id="jobBillingZip" value="{$proposal['jobBillingZip']}" class="form-control inline"/>
                  </div>
             </div>

           </div>

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-4" >
                   <div class="form-group no-margin-hr">
                       Change Proposal Primary Address and Contact Information
                   </div>
               </div>

               <div class="col-sm-3" >
                   <div class="form-group no-margin-hr">
                       <a href="Javascript:CHECKIT2(this.adataform);" class="btn btn-primary btn-labeled"  style='width:200px;'>Change Billing Address</a>
                   </div>
               </div>
               <div class="col-sm-3" >
               </div>

       </div>
</form>


       <form action="{$SITE_URL}workorders/updatePOLocation/{$pid}"  name="adataform1" id="adataform1" class="panel" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">
           <div class="row" style="background:#eeffee">
               <h4>Primary Job Location</h4>
               <h5>{$proposal['communityFirst']} {$proposal['communityLast']}</h5>
               Manager: {$proposal['managerfirst']} {$proposal['managerlast']}</h5>
           </div>
           <!-- begin row -->
           <div class="row">
               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Address line 1</label>
                       <input type="text" name="jobAddress1" id="jobAddress1" value="{$proposal['jobAddress1']}" class="form-control inline"/>
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Address line 2</label>
                       <input type="text" name="jobAddress2" id="jobAddress2" value="{$proposal['jobAddress2']}" class="form-control inline"/>
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Parcel #</label>
                       <input type="text" name="jobParcel" id="jobParcel" value="{$proposal['jobParcel']}" class="form-control inline"/>
                   </div>
               </div>
           </div>

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">City</label>
                       <input type="text" name="jobCity" id="jobCity" value="{$proposal['jobCity']}" class="form-control inline"/>
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">State</label>
                       <select id="jobState" name="jobState" class="form-control">
                           {IF {$proposal['jobState']} neq ''}<option value="{$proposal['jobState']}">{$proposal['jobState']}</option>{/IF}
                           {$states}
                       </select>
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Zip</label>
                       <input type="text" name="jobZip" id="jobZip" value="{$proposal['jobZip']}" class="form-control inline"/>
                   </div>
               </div>

           </div>

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-4" >
                   <div class="form-group no-margin-hr">
                       Change Primary Location
                   </div>
               </div>

               <div class="col-sm-3" >
                   <div class="form-group no-margin-hr">
                       <a href="Javascript:CHECKIT3(this.adataform1);" class="btn btn-primary btn-labeled"  style='width:200px;'>Change Primary Site</a>
                   </div>
               </div>
               <div class="col-sm-3" >
               </div>

           </div>
       </form>


       <!-- row -->
       <form action="{$SITE_URL}workorders/addPOManager/{$pid}"  name="dataform" id="dataform" class="panel" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">

           <!-- begin row -->
           <div class="row" >

               <div class="col-sm-4" >
                   <span class="alert-success">Current Manager:
                   {$proposal.managerfirst} {$proposal.managerlast}</span>
               </div>
               <div class="col-sm-4" >
                <span class="alert-success">Current Sales Associate:  {$proposal.salesfirst} {$proposal.saleslast}</span>
               </div>

           </div>

           <!-- begin row -->
           <div class="row" >
               <div class="col-sm-4">
                  <label class="control-label">Sales Manager</label>
                   <select name="jobSalesManagerAssigned" id="jobSalesManagerAssigned">
               <option value="0">Select a Sales Manager</option>
                       {foreach $salesManagers as $s}
                           {IF intval($s.cntId) == intval($proposal.jobSalesManagerAssigned)}
                               <option value="{$s.cntId}" selected>{$s.cntFirstName} {$s.cntLastName}</option>
                           {ELSE}
                               <option value="{$s.cntId}">{$s.cntFirstName} {$s.cntLastName}</option>

                           {/IF}
                           {/foreach}

           </select>
               </div>


               <div class="col-sm-4">
                   <label class="control-label">Sales Associate</label>
                   <select name="jobSalesAssigned" id="jobSalesAssigned">
                       <option value="0">Select a Sales Associate</option>
                       {foreach $salesPeople as $s}
                           {IF intval($s.cntId) == intval($proposal.jobSalesAssigned)}
                               <option value="{$s.cntId}" selected>{$s.cntFirstName} {$s.cntLastName}</option>
                           {ELSE}
                               <option value="{$s.cntId}">{$s.cntFirstName} {$s.cntLastName}</option>

                           {/IF}
                       {/foreach}

                   </select>
               </div>

               <div class="col-sm-4" >
                   <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled" style='width:200px;'>Assign Sales Team</a>
               </div>

           </div>
       </form>


       <!-- row -->
       <form action="{$SITE_URL}workorders/updatePricing/{$pid}"  name="ddataform" id="ddataform" class="panel" method="POST">
           <!-- begin row -->
           <div class="row" >
               <div class="col-sm-8">
                   <label class="control-label"> Update Proposal Materials Pricing to Current Values</label>
               </div>

               <div class="col-sm-4" >
                   <a href="Javascript:this.ddataform.submit();" class="btn btn-primary btn-labeled" style='width:200px;'>Update materials pricing</a>
               </div>

           </div>
       </form>
{/IF}






   </div>

        </div>




