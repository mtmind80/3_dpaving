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

        if(form.cntFirstName.value == '')
        {
            alert('You must enter a value for name');
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
                       var popupmsg = 'This email ' + email + ' is already in this system.\nYou will have to use another email';
                       $('#msg').html(popupmsg);
                       $('#privatemessage').modal('show');
                       window.setTimeout(function(){ $("#privatemessage").modal('hide'); },5000);

                      // alert("This email " + email + " is already in this system.\nYou will have to use another email");
                       $("#cntPrimaryEmail").val('');

                   }
                    return data;
                });

    }
</script>


<div class="panel">
    <div class="panel-heading">
{*

             * 9 	Community/Development
             * 10 	Government Agency
             * 8 	Company
             * 6 	Client
             * 2 	Vendor
             * 11 	Sub Contractor


             *}


        {if $cid eq 9}
            <h2>Add Community/Development </h2>
            <i>(Primary Contact Person and Email are recommended fields)</i>
        {elseif $cid eq 10}
            <h2>Add Government Agency </h2>
            <i>(Primary Contact Person and Email are recommended fields)</i>
        {elseif $cid eq 8}
            <h2>Add Company </h2>
            <i>(Primary Contact Person and Email are recommended fields)</i>
        {elseif $cid eq 6}
            <h2>Add Client </h2>
            <i>(First Name, Last Name and Email are recommended fields)</i>
        {elseif $cid eq 2}
            <h2>Add Vendor </h2>
            <i>(First Name, Last Name and Email are recommended fields)</i>
        {elseif $cid eq 11}
            <h2>Add Sub Contractor </h2>
            <i>(First Name, Last Name and Email are recommended fields)</i>
        {else}
            <h2>Add Contact Person</h2>
            <i>(First Name, Last Name and Email are recommended fields)</i>
        {/if}

        <a class="topbut btn btn-success" href="{$SITE_URL}crm/showList/1"><span class="btn-label icon fa fa-male"></span> List Contacts</a>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" style="color: #000000;">Basic Information </span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='#'><span class="wizard-step-description" >Additional Information </span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Company/Development</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Notes</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Profile</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">
        <form action="{$SITE_URL}crm/saveContact/"  name="dataform" id="dataform" class="panel" method="POST"
              enctype="multipart/form-data">
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" name="cid" value="{$cid}">


        {if $cid eq 9}
<!-- community -->
            <!-- begin row -->
            <input type="hidden" name="cntSalutation" value="">
            <input type="hidden" name="cntLastName" value="">
            <input type="hidden" name="cntMiddleName" value="">

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <input type="checkbox" id="cntQualified" name="cntQualified" class="form-control-sm checkbox-inline" value="1" checked>
                        <label class="control-label"> Qualified</label>
                    </div>
                </div>
            </div>
            <!-- row -->


            <div class="row">

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Community Development Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Contact Person</label>
                        <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control">
                    </div>
                </div>

            </div>
            <!-- row -->

        {elseif $cid eq 10}
            <!-- Government Agency -->
            <!-- begin row -->
            <input type="hidden" id="cntQualified" name="cntQualified" value="1">
            <input type="hidden" name="cntSalutation" value="">
            <input type="hidden" name="cntLastName" value="">
            <input type="hidden" name="cntMiddleName" value="">

            <div class="row">

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Government Agency</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Contact Person</label>
                        <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control">
                    </div>
                </div>

            </div>
            <!-- row -->

        {elseif $cid eq 8}
            <!-- Company -->
            <!-- begin row -->

            <input type="hidden" name="cntSalutation" value="">
            <input type="hidden" name="cntLastName" value="">
            <input type="hidden" name="cntMiddleName" value="">

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <input type="checkbox" id="cntQualified" name="cntQualified" class="form-control-sm checkbox-inline" value="1" checked>
                        <label class="control-label"> Qualified</label>
                    </div>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Company Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Contact Person</label>
                        <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control">
                    </div>
                </div>
            </div>
            <!-- row -->
        {else}
            <!-- begin row -->
            <input type="hidden" id="cntAltContactName" name="cntAltContactName" value="">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <input type="checkbox" id="cntQualified" name="cntQualified" class="form-control-sm checkbox-inline" value="1" checked>
                        <label class="control-label"> Qualified</label>
                    </div>
                </div>

            {IF $cid eq 11}
                <div class="col-sm-2">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Over Head</label>
                        <input type="text" id="cntOverHead" name="cntOverHead" class="form-control" value="0" >
                    </div>
                </div>

            {/IF}
            </div>
            <!-- row -->

            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Salutation</label>
                        <select name="cntSalutation" id="cntSalutation" class="form-control">
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>First Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Last Name</label>
                        <input type="text" id="cntLastName" name="cntLastName" class="form-control">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Middle Name</label>
                        <input type="text" id="cntMiddleName" name="cntMiddleName" class="form-control">
                    </div>
                </div>



            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Gender</label><br>
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGenderYES" value="M" checked> MALE
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGenderNO" value="F"> FEMALE
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Date of Birth</label>
                        <div class="input-group date" id="bs-datepicker-component">
                            <input type="text" id="cntDateOfBirth" name="cntDateOfBirth"
                                   class="form-control">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Department</label>
                        <input type="text" id="cntDepartment" name="cntDepartment" class="form-control">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Title</label>
                        <input type="text" id="cntJobTitle" name="cntJobTitle" class="form-control">
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
                        <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" class="form-control">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Cell Phone</label>
                        <input type="text" id="cntAltPhone1" name="cntAltPhone1" class="form-control">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Fax</label>
                        <input type="text" id="cntAltPhone2" name="cntAltPhone2" class="form-control">
                    </div>
                </div>


            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Email</label>
                        <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" onChange="Javascript:checkEmail(this.value);">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Alternate Email</label>
                        <input type="text" id="cntAltEmail" name="cntAltEmail" class="form-control">
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Address Line 1</label>
                        <input type="text" id="cntPrimaryAddress1" name="cntPrimaryAddress1" class="form-control" size="45">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Address line 2</label>
                        <input type="text" id="cntPrimaryAddress2" name="cntPrimaryAddress2" class="form-control"  size="45">
                    </div>
                </div>

            </div>
            <!-- row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">City</label>
                        <input type="text" id="cntPrimaryCity" name="cntPrimaryCity" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> State</label>
                        <select id="cntPrimaryState" name="cntPrimaryState" class="form-control">
                        {$states}
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Zip Code</label>
                        <input type="text" id="cntPrimaryZip" name="cntPrimaryZip" class="form-control">
                    </div>
                </div>

            </div>
            <!-- row -->
        <!-- begin row -->
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Comments</label>
                    <textarea rows="4" cols="54" id="cntComment" name="cntComment" class="form-control"></textarea>
                </div>
            </div>

        </div>
        <!-- row -->



            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Upload Contact Picture</label>
                        <input type="file" name="avatar" id="avatar">
                    </div>
                </div>


            </div>
            <!-- row -->

    <!-- buton row -->
        <div class="row">
            <div class="col-sm-4">
            <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
            </div>
            <div class="col-sm-2">
            <a href="{$SITE_URL}crm/showList/1" class="btn btn-primary btn-labeled">Cancel</a>
            </div>
        </div>
        </form>

        </div>
    </div>




