<script type="text/javascript">


    var id = 0;

    function CHECKIT(form)
    {
        if(!test(form)){ return;
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

            <h2>{$data['cntFirstName']} {$data['cntLastName']}</h2>
        {$data['ccatName']}<br/>

        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>


    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/editContact/{$id}'><span class="wizard-step-description" >Basic Information &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='{$SITE_URL}crm/additionalInformation/{$id}'><span class="wizard-step-description" style='color: #000000;'>Connections &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/catandservice/{$id}'><span class="wizard-step-description">Categories and Services &nbsp;&nbsp;</span></a> </span> </li
                    >

            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/crmNotes/{$id}'><span class="wizard-step-description">Notes</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/viewContact/{$id}'><span class="wizard-step-description">Profile</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">
        <form action="{$SITE_URL}crm/saveadditionalinformation/{$data['cntId']}"  name="dataform" id="dataform" class="panel" method="POST"
         >
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" name="cntId" value="{$data['cntId']}">
        <input type="hidden" name="cid" value="{$data['cntcid']}">

 {if $data['cntcid'] neq 1 AND $data['cntcid'] neq 7 AND $data['cntcid'] neq 10 AND $data['cntcid'] neq 14 AND $data['cntcid'] neq 16 AND $data['cntcid'] neq  17}
 {*entity should have no parent company link*}

        <!-- begin row -->
        <div class="row">

            <div class="col-sm-8">
                <div class="form-group no-margin-hr">
                    <label class="alert-info" style='width:750px;'>Is this contact linked to a National Company, Government Agency or Property Management Company?</label>
                </div>
            </div>

        </div>
        <!-- row -->
        <!-- begin row -->

            <div class="row">
               <div class="col-sm-8">
                         <div class="form-group no-margin-hr">
                             <select name="cntCompanyId" id="cntCompanyId" class="form-control">
                               {IF $data['cntCompanyId'] > 0}
                                   <option value="{$data['cntCompanyId']}">{$data['CompanyName']} </option>
                                   <option value='0'>UN-link This Company</option>
                                {ELSE}
                                   <option value='0'>Link A Company</option>
                               {/IF}
                                {foreach $companies as $d}
                                    <option value='{$d['cntId']}'>{$d['cntFirstName']} {$d['cntLastName']} </option>
                                {/foreach}
                            </select>
                        </div>
                </div>

               <div class="col-sm-4">
                 <div >
                     <button type="button" class="btn-sm "
                                       onClick="Javascript:ShowTools('Quick Add Parent Company', {$id}, 'quickAdd/8');">Create a New Company</button>
                 </div>
               </div>
             </div>

            <!-- row -->



 {else}

     <!-- Add manager , add property No parent -->
 {/if}

        {IF $data['cntCompanyId'] > 0} {* I have a linked company*}
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <h4>Parent Company</h4>
                        <a href="{$SITE_URL}crm/viewContact/{$data['cntCompanyId']}" title="View Company">{$data['CompanyName']}</a>
                        <br />
                        {$data['companyAddress1']}   {$data['companyAddress2']}

                        <br />
                        {$data['companyPhone']}

                        <br />
                        {$data['companyEmail']}
                    </div>
                </div>
            </div>
        {/IF}


            {if $data['cntcid'] neq 9 AND $data['cntCompanyId'] eq 0}
                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <button type="button" class="btn-sm btn-success"
                                    onClick="Javascript:window.location.href='{$SITE_URL}crm/PropertyWizard/{$data['cntId']}';">Link New Property</button>
                        </div>
                    </div>
                </div>


            {/if}

            {if $data['cntcid'] eq 9 AND $data['cntCompanyId'] > 0}
        {* I am a property with a company link*}


            <div class="row">
                <div class="col-sm-8">
                <label class="alert-info" style='width:750px;'>Please Select a Manager.  Does this property have a manager?</label>
                </div>
            </div>


                <!-- begin row -->
     <div class="row">
        <div class="col-sm-8">
            <div class="form-group no-margin-hr">

                <select name="cntManagerId" id="cntManagerId" class="form-control">
                    {if $data['cntManagerId'] > 0}
                    <option value="{$data['cntManagerId']}" selected>{$data['ManagerName']} {$data['ManagerLastName']}</option>
                    {/if}
                    <option value="{$data['cntCompanyId']}">{$data['CompanyName']}</option>
                    {IF $mymanagers}
                    {foreach $mymanagers as $d}{*managers of this parent company*}
                        <option value='{$d['cntId']}'>{$d['cntFirstName']} {$d['cntLastName']} </option>
                    {/foreach}
                    {/IF}
                </select>

            </div>
        </div>
{IF $data['cntCompanyId'] > 0 }
         <div class="col-sm-4">
             <div class="form-group no-margin-hr">
                 <button type="button" class="btn-sm"
                         onClick="Javascript:window.location.href='{$SITE_URL}crm/ManagerWizard/{$data['cntCompanyId']}';">Create a New Manager</button>
             </div>
         </div>

    </div>
    <!-- row -->
{/IF}

    {IF $data['cntManagerId'] > 0} {* I have a current manager*}
        <!-- begin row -->
    <div class="row">

                    <div class="col-sm-8">
                        <div class="form-group no-margin-hr">
                            <h4>Current Manager</h4>
                            <a href="{$SITE_URL}crm/viewContact/{$data['cntManagerId']}" title="View Manager">{$data['ManagerName']} {$data['ManagerLastName']}</a>
                            <br />
                            {$data['ManagerAddress1']}   {$data['ManagerAddress2']}

                            <br />
                            {$data['ManagerPhone']}

                            <br />
                            {$data['ManagerEmail']}
                        </div>
                    </div>

    </div>
                        <!-- row -->
    {/IF}


 {/if}


            <!-- buton row -->
            <div class="row">
                <div class="col-sm-3">
                    <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save And Continue</a>
                </div>
                <div class="col-sm-6">
                </div>
            </div>

        </form>

        <!-- end of form -->
        {assign var="dcount" value="0"}
        {if $managers}
            <h4>Related Managers</h4>

         <div class="row">
            {foreach $managers as $manage}
            {if $dcount eq 3}
                 {$dcount = 0}
              </div>

              <div class="row">

            {/if}

                <div class="col-sm-4">
                                <a title="Edit This Contact" href="{$SITE_URL}crm/editContact/{$manage['cntId']}">{$manage['cntFirstName']} {$manage['cntMiddleName']} {$manage['cntLastName']}</a>
                                {if $manage['cntPrimaryAddress1'] neq ''}<br/>{$manage['cntPrimaryAddress1']}{/if}
                                {if $manage['cntPrimaryPhone'] neq ''}<br/>{$manage['cntPrimaryPhone']}{/if}
                                {if $manage['cntPrimaryEmail'] neq ''}<br/>{$manage['cntPrimaryEmail']}{/if}
                                {if $manage['ccatName'] neq ''}<br/><span class="alert-info">{$manage['ccatName']}</span>{/if}
                </div>
                {$dcount = $dcount + 1}
            {/foreach}
            </div>

        {/if}
       {if $data['cntcid'] neq 9}
           <!-- begin row -->
           <div class="row">
               <div class="col-sm-6">
                   <div class="form-group no-margin-hr">
                       <button type="button" class="btn-sm"
                               onClick="Javascript:window.location.href='{$SITE_URL}crm/ManagerWizard/{$data['cntId']}';">Create Manager</button>
                   </div>
               </div>
           </div>
       {/if}


        {$dcount = 0}

        {if $properties}
            <h4>Related Properties</h4>

            <div class="row">
            {foreach $properties as $manage}
                {if $dcount eq 3}
                    {$dcount = 0}
                    </div>

                    <div class="row">

                {/if}

                <div class="col-sm-4">
                    <a title="Edit This Contact" href="{$SITE_URL}crm/editContact/{$manage['cntId']}">{$manage['cntFirstName']} {$manage['cntMiddleName']} {$manage['cntLastName']}</a>
                    {if $manage['cntPrimaryAddress1'] neq ''}<br/>{$manage['cntPrimaryAddress1']}{/if}
                    {if $manage['cntPrimaryPhone'] neq ''}<br/>{$manage['cntPrimaryPhone']}{/if}
                    {if $manage['cntPrimaryEmail'] neq ''}<br/>{$manage['cntPrimaryEmail']}{/if}
                    {if $manage['ccatName'] neq ''}<br/><span class="alert-info">{$manage['ccatName']}</span>{/if}
                    {if $manage['managerfirstname'] neq ''}<br/>Manager:{$manage['managerfirstname']} {$manage['managerlastname']}{/if}


                </div>
                {$dcount = $dcount + 1}
            {/foreach}
            </div>

        {/if}
        {if $data['cntcid'] neq 9}
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <button type="button" class="btn-sm"
                                onClick="Javascript:window.location.href='{$SITE_URL}crm/PropertyWizard/{$data['cntId']}';">Create Property</button>
                    </div>
                </div>
            </div>
        {/if}







   </div>
    </div>




