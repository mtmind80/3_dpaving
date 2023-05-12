<script type="text/javascript">

    var id = {$data.cntId};

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

        {* I am a property with a parent*}
        {if $data['cntcid'] eq 9 AND $data['cntCompanyId'] > 0}
            <a class="topbut btn btn-success" href="{$SITE_URL}workorders/startProposal/{$data['cntCompanyId']}/{$data['cntId']}"><span class="btn-label icon fa fa-plus"></span> New Proposal</a>
        {/if}
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/editContact/{$id}'><span class="wizard-step-description" >Basic Information &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='{$SITE_URL}crm/additionalInformation/{$id}'><span class="wizard-step-description" >Connections &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/catandservice/{$id}'><span class="wizard-step-description" style='color: #000000;'>Categories and Services &nbsp;&nbsp;</span></a> </span> </li
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

    <form action="{$SITE_URL}crm/savecatandservice/{$data['cntId']}"  name="dataform" id="dataform" class="panel" method="POST">
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" name="cntId" value="{$data['cntId']}">

   <div class="panel-body">

            <div class="row">
               <div class="col-sm-5">
                         <div class="form-group no-margin-hr"  style="text-align:top;">
                            <label class="control-label">Contact Categories</label>
                                {$myflag = 1}
                             <div><span class="fa fa-asterisk"></span> System Categories</div>
                             {foreach $categories as $cat}
                                {IF $myflag neq $cat['ccatDoNotDelete']}
                                    <br />
                                    <div><span class="fa fa-circle-o"></span> General Categories</div>
                                    <input type="checkbox" name="cat_{$cat['ccatId']}" id="cat_{$cat['ccatId']}" value="{$cat['ccatId']}" {IF $cat['catuserid']}checked{/IF}> &nbsp;{IF $cat['ccatDoNotDelete']}<span style="background:#d9edf7">{$cat['ccatName']}</span>{ELSE} {$cat['ccatName']}{/IF}
                                    <br />
                                {ELSE}
                                  <input type="checkbox" name="cat_{$cat['ccatId']}" id="cat_{$cat['ccatId']}" value="{$cat['ccatId']}" {IF $cat['catuserid']}checked{/IF}> &nbsp;{IF $cat['ccatDoNotDelete']}<span style="background:#d9edf7">{$cat['ccatName']}</span>{ELSE} {$cat['ccatName']}{/IF}
                                    <br />
                                {/IF}
                                 {$myflag = $cat['ccatDoNotDelete']}
                             {/foreach}

                        </div>
                </div>

                <div class="col-sm-5" >
                    <div class="form-group no-margin-hr" style="text-align:top;">
                        <label class="control-label">Services</label>
                        {foreach $services as $serv}
                            <br /><input type="checkbox" id="serv_{$serv['cservId']}" name="serv_{$serv['cservId']}" value="{$serv['cservId']}" {IF $serv['servuserid']}checked{/IF}> &nbsp; {$serv['cservName']}
                        {/foreach}

                    </div>
                </div>
            </div>
            <!-- row -->





<!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
    </div>

</div>
</form>

</div>
</div>

