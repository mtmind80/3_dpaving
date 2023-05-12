<script type="text/javascript">

    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });

        $("#cntPrimaryPhone").mask("(999) 999-9999");

        $("#cntAltPhone1").mask("(999) 999-9999");

        $("#cntAltPhone2").mask("(999) 999-9999");



    });


    var id = "{$data['cntId']}";
    var cid = "{$data['cntcid']}";

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.cntFirstName.value == '')
        {
            alert('You must enter a value for first name');
            form.cntFirstName.focus();
            return false;
        }

        return true;

    }

    function checkEmail(email)
    {

        $.post( site_url + "crm/checkEmail/", { email: email , id: 0})
                .done(function( data ) {

                    if(data)
                    {
                        var popupmsg = 'This email ' + email + ' is already in this system.\nThere may be a duplicate.';
                        $('#msg').html(popupmsg);
                        $('#privatemessage').modal('show');
                        window.setTimeout(function(){ $("#privatemessage").modal('hide'); },5000);

                        //$("#cntPrimaryEmail").val('');


                    }
                    return data;
                });

    }


function SetValue(form)
    {
        var doit = confirm("Set the Billing Address the same as the primary address?");
        if(doit)
        {
            form.cntBillAddress1.value = form.cntPrimaryAddress1.value;
            form.cntBillAddress2.value = form.cntPrimaryAddress2.value;
            form.cntBillCity.value = form.cntPrimaryCity.value;
            form.cntBillState.value = form.cntPrimaryState.value;
            form.cntBillZip.value = form.cntPrimaryZip.value;
        }
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
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/editContact/{$id}'><span class="wizard-step-description" style="color: #000000;">Basic Information &nbsp; &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='{$SITE_URL}crm/additionalInformation/{$id}'><span class="wizard-step-description" >Connections &nbsp; &nbsp;</span></a> </span> </li
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

        <form action="{$SITE_URL}crm/saveContact/{$data['cntId']}"  name="dataform" id="dataform" class="panel" method="POST"
              enctype="multipart/form-data">
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" name="cntId" value="{$data['cntId']}">

        <!-- begin row -->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <input type="checkbox" id="cntQualified" name="cntQualified" class="form-control-sm checkbox-inline" value="1" {IF $data['cntQualified']} checked {/IF}>
                    <label class="control-label">Qualified</label>
                </div>
            </div>
        </div>
        <!-- row -->



        <!-- begin row -->
        <div class="row">
{if $data['cntcid'] eq 11}
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Over Head</label>
                    <span style="font-size:0.7EM;">(<i>Sub Contractors Only</i>)</i></span>
                    <input type="text" id="cntOverHead" name="cntOverHead" class="form-control" value="{$data['cntOverHead']}">
                </div>
            </div>
{/if}
            <div class="col-sm-7">
                <div class="form-group no-margin-hr">
                    <label class="control-label"><span style='color:Red;'>Change Primary Category: </span> {$data['ccatName']}
                    </label>
                    <select name="cntcid" id="cntcid" class="form-control">
                         {foreach $categoryCB as $cblist}
                            {IF $data['cntcid'] eq $cblist.ccatId}
                                <option value="{$cblist.ccatId}" selected>{$cblist.ccatName}</option>
                            {ELSE}
                                <option value="{$cblist.ccatId}">{$cblist.ccatName}</option>
                            {/IF}
                        {/foreach}
                    </select>
                </div>
            </div>


        </div>
        <!-- row -->

        {if $data['cntcid'] eq 9} <!-- property -->
            <!-- community -->
            <!-- begin row -->
            <input type="hidden" name="cntSalutation"   value="{$data['cntSalutation']}">
            <input type="hidden" name="cntLastName"   value="{$data['cntLastName']}">
            <input type="hidden" name="cntMiddleName"   value="{$data['cntMiddleName']}">


            <div class="row">

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Community Development Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control" value="{$data['cntFirstName']}">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Contact Person</label>
                        <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control" value="{$data['cntAltContactName']}">
                    </div>
                </div>

            </div>
            <!-- row -->




        {elseif $data['cntcid'] eq 10}
            <!-- Government Agency -->
            <!-- begin row -->
            <input type="hidden" name="cntSalutation"   value="{$data['cntSalutation']}">
            <input type="hidden" name="cntLastName"   value="{$data['cntLastName']}">
            <input type="hidden" name="cntMiddleName"   value="{$data['cntMiddleName']}">


            <div class="row">

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Government Agency</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control" value="{$data['cntFirstName']}">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Contact Person</label>
                        <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control" value="{$data['cntAltContactName']}">
                    </div>
                </div>

            </div>
            <!-- row -->

        {elseif $data['cntcid'] eq 7 OR $data['cntcid'] eq 1 }
            <!-- property management Company -->
            <!-- begin row -->


            <input type="hidden" name="cntSalutation"   value="{$data['cntSalutation']}">
            <input type="hidden" name="cntLastName"   value="{$data['cntLastName']}">
            <input type="hidden" name="cntMiddleName"   value="{$data['cntMiddleName']}">

            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Company Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control"  value="{$data['cntFirstName']}">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Contact Person</label>
                        <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control"  value="{$data['cntAltContactName']}">
                    </div>
                </div>
            </div>
            <!-- row -->
        {else}
            <!-- begin row -->
            <input type="hidden" id="cntAltContactName" name="cntAltContactName" value="{$data['cntAltContactName']}">

            <!-- begin row -->
            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Salutation</label>
                        <select name="cntSalutation" id="cntSalutation" class="form-control">
                            <option>{$data['cntSalutation']}</option>
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>First Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control" value="{$data['cntFirstName']}">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Last Name</label>
                        <input type="text" id="cntLastName" name="cntLastName" class="form-control" value="{$data['cntLastName']}">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Middle Name</label>
                        <input type="text" id="cntMiddleName" name="cntMiddleName" class="form-control"  value="{$data['cntMiddleName']}">
                    </div>
                </div>



            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Gender</label><br>
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGender" value="M" {IF $data['cntGender'] ="M"}checked{/IF}> MALE
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGender" value="F" {IF $data['cntGender'] ="F"}checked{/IF}> FEMALE
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Date of Birth</label>
                        <div class="input-group date" id="bs-datepicker-component">
                            <input type="text" id="cntDateOfBirth" name="cntDateOfBirth"
                                   class="form-control" value='{$data.cntDateOfBirth|date_format:"%m/%d/%Y"}'>
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Department</label>
                        <input type="text" id="cntDepartment" name="cntDepartment" class="form-control"  value="{$data['cntDepartment']}">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Title</label>
                        <input type="text" id="cntJobTitle" name="cntJobTitle" class="form-control" value="{$data['cntJobTitle']}">
                    </div>
                </div>

            </div>
            <!-- row -->


        {/if}

            <!-- begin row -->
            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Primary Phone</label>
                        <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" class="form-control" value="{$data['cntPrimaryPhone']}">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Cell Phone</label>
                        <input type="text" id="cntAltPhone1" name="cntAltPhone1" class="form-control" value="{$data['cntAltPhone1']}">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Fax</label>
                        <input type="text" id="cntAltPhone2" name="cntAltPhone2" class="form-control" value="{$data['cntAltPhone2']}">
                    </div>
                </div>


            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Email</label>
                        <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" value="{$data['cntPrimaryEmail']}" onChange="Javascript:checkEmail(this.value);">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Alternate Email</label>
                        <input type="text" id="cntAltEmail" name="cntAltEmail" class="form-control" value="{$data['cntAltEmail']}">
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Address Line 1</label>
                        <input type="text" id="cntPrimaryAddress1" name="cntPrimaryAddress1" class="form-control" size="45" value="{$data['cntPrimaryAddress1']}">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Address line 2</label>
                        <input type="text" id="cntPrimaryAddress2" name="cntPrimaryAddress2" class="form-control"  size="45" value="{$data['cntPrimaryAddress2']}">
                    </div>
                </div>

            </div>
            <!-- row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">City</label>
                        <input type="text" id="cntPrimaryCity" name="cntPrimaryCity" class="form-control" value="{$data['cntPrimaryCity']}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> State</label>
                        <select id="cntPrimaryState" name="cntPrimaryState" class="form-control" >
                            <option value="{$data['cntPrimaryState']}">{$data['cntPrimaryState']}</option>
                        {$states}
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Zip Code</label>
                        <input type="text" id="cntPrimaryZip" name="cntPrimaryZip" class="form-control" value="{$data['cntPrimaryZip']}">
                    </div>
                </div>

            </div>
            <!-- row -->

        {if $data['cntcid'] eq 9}
            <!-- begin row -->
            <div class="row">

                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="alert-info" style='width:750px;'>Is this contact a property or parcel?</label>
                    </div>
                </div>

            </div>
            <!-- row -->
            <!-- begin row -->
            <div class="row">

                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">

                        <label class="control-label">Parcel Number <i>(do we have a parcel number for this property)</i></label>
                        <input type="text" name="cntParcelNumber" id="cntParcelNumber" value="{$data['cntParcelNumber']}">

                    </div>
                </div>

            </div>
            <!-- row -->
        {/if}


        <!-- begin row -->
        <div class="row">

            <div class="col-sm-8">
                <div class="form-group no-margin-hr">
                    <label class="alert-info" style='width:750px;'>Billing Address <i>(if different)</i> <a href="Javascript:SetValue(this.dataform);">Same as Above</a></label>
                </div>
            </div>

        </div>
        <!-- row -->


        <!-- begin row -->
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Address Line 1</label>
                    <input type="text" id="cntBillAddress1" name="cntBillAddress1" class="form-control" size="45" value="{$data['cntBillAddress1']}">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Address line 2</label>
                    <input type="text" id="cntBillAddress2" name="cntBillAddress2" class="form-control"  size="45" value="{$data['cntBillAddress2']}">
                </div>
            </div>

        </div>
        <!-- row -->
        <!-- begin row -->
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">City</label>
                    <input type="text" id="cntBillCity" name="cntBillCity" class="form-control" value="{$data['cntBillCity']}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label"> State</label>
                    <select id="cntBillState" name="cntBillState" class="form-control">
                        {IF $data['cntBillState']}<option value="{$data['cntBillState']}">{$data['cntBillState']}</option>{/IF}
                        {$states}
                    </select>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Zip Code</label>
                    <input type="text" id="cntBillZip" name="cntBillZip" class="form-control" value="{$data['cntBillZip']}">
                </div>
            </div>

        </div>
        <!-- row -->

        <!-- begin row -->
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Comments</label>
                    <textarea rows="4" cols="54" id="cntComment" name="cntComment" class="form-control">{$data['cntComment']}</textarea>
                </div>
            </div>

        </div>
        <!-- row -->

        <!-- begin row -->
        <div class="row">
            {IF $data.cntAvatar}
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <img src="{$SITE_URL}media/crm/{$data.cntAvatar}" border="0" alt="User Avatar" width='100' /> </div>
                </div>
            {/IF}

            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">    {IF $data.cntAvatar}Replace Picture{ELSE}Upload Picture{/IF}</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
            </div>

        </div>
        <!-- row -->
        {IF $data.cntAvatar}
        <!-- begin row -->
        <div class="row">
            <div class="col-sm-5">
            </>Remove Current Image</i>
            <input type="checkbox" id="removeAvatar" name="removeAvatar" class="checkbox-inline" value="1">
        </div>
   </div>
    <!-- row -->
    {/IF}
    <p> </p>

    <!-- buton row -->
        <div class="row">
            <div class="col-sm-4">
            <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
            </div>

        </div>
        </form>

        </div>
    </div>




