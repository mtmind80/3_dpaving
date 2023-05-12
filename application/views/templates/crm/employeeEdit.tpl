
<script type="text/javascript">

    init.push(function () {


        $('#hd-datepicker-component').datepicker();
        $('#bs-datepicker-component').datepicker();


    });


    var id = {$data.cntId};


    function checkEmail(email, id)
    {

        $.post( site_url + "crm/checkEmail/", { email: email, id: id })
                .done(function( data ) {

                    if(data)
                    {
                        alert("This email " + email + " is already in this system.\nYou will have to use another email");

                    }
                });

    }



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

        if(form.cntLastName.value == '')
        {
            alert('You must enter a value for last name');
            form.cntLastName.focus();
            return false;
        }

        if(!isEmail(form.cntPrimaryEmail.value))
        {
            alert('Please enter a valid email');
            form.cntPrimaryEmail.focus();
            return false;
        }

        if(form.cntPassword == '' || form.cntPassword.length < 6)
        {
            alert('Password must be at least six (6) characters.');
            form.cntPassword.focus();
            return false;
        }

        if(checkEmail(form.cntPrimaryEmail.value,id))
        {
            alert('This email is already in use. You cannot use it again.');
            form.cntPrimaryEmail.focus();
            return false;

        }

        if(form.cntHireDate == '')
        {
            alert('You must enter a value for hire date');
            form.cntHireDate.focus();
            return false;
        }

        return true;

    }


</script>

<div class="panel">
    <div class="panel-heading">

        <h2>Edit Employee</h2>

        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save</a>
        <a class="topbut btn btn-success" href="{$SITE_URL}crm/employeeList/"><span class="btn-label icon fa fa-male"></span> List Employees</a>

    </div>
    <div class="panel-body">
    {IF $data.cntStatusId == 0} <div class="list-group-item-danger">This Employee is Disabled</div>{/IF}
        <form action="{$SITE_URL}crm/saveEmployee/{$data.cntId}"  name="dataform" id="dataform" class="panel" method="POST"
              enctype="multipart/form-data">

        <input type="hidden" name="cntId" id="cntId" value="{$data.cntId}">
        <input type="hidden" name="oldAvatar" value="{$data.cntAvatar}">

            <!-- begin row -->
            <div class="row">
                <div style="border: 1px solid dodgerblue; width:600px;height:80px;padding:10px;">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label"><span style="color:red;">*</span>Role</label>
                            <select id="cntRole" name="cntRole" class="form-control" >
                                <option value='{$data.cntRole}' selected>{$system_roles[$data.cntRole-1]}</option>
                                {$rolelist}
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Allow Internet Access</label>
                            <input type="checkbox"  class="checkbox" value="1" id="cntSecAccess" name="cntSecAccess" class="form-control" {IF $data.cntSecAccess} checked{/IF}>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label" style="color:red;">Disabled</label>
                            <input type="checkbox"  class="checkbox" value="1" id="cntStatusId" name="cntStatusId" class="form-control" {IF $data.cntStatusId == 0} checked{/IF}>
                        </div>
                    </div>

                </div>

            </div>
            <!-- row -->
            &nbsp;
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>First Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control" value="{$data.cntFirstName}">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Last Name</label>
                        <input type="text" id="cntLastName" name="cntLastName" class="form-control" value="{$data.cntLastName}">
                    </div>
                </div>

            </div>
            <!-- row -->
        <!-- begin row -->
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Middle Name</label>
                    <input type="text" id="cntMiddleName" name="cntMiddleName" class="form-control"  value="{$data.cntMiddleName}">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label"> Phone</label>
                    <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" class="form-control" value="{$data.cntPrimaryPhone}">
                </div>
            </div>

        </div>
        <!-- row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Gender</label><br>
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGenderYES" value="M" {IF $data.cntGender == 'M'} checked{/IF}> MALE
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGenderNO" value="F" {IF $data.cntGender == 'F'} checked{/IF}> FEMALE
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Salutation</label>
                        <select name="cntSalutation" id="cntSalutation">
                            <option>{$data.cntSalutation}</option>
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Department</label>
                        <input type="text" id="cntDepartment" name="cntDepartment" class="form-control" value='{$data.cntDepartment}'>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Title</label>
                        <input type="text" id="cntJobTitle" name="cntJobTitle" class="form-control" value='{$data.cntJobTitle}'>
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Date of Birth</label>
                            <div class="input-group date" id="bs-datepicker-component">
                                <input type="text" id="cntDateOfBirth" name="cntDateOfBirth"  value='{$data.cntDateOfBirth|date_format:"%m/%d/%Y"}'
                                  class="form-control">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                        </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Hire Date</label>
                        <div class="input-group date" id="hd-datepicker-component">
                            <input type="text" id="cntHireDate" name="cntHireDate"  value='{$data.cntHireDate|date_format:"%m/%d/%Y"}'
                                   class="form-control">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                    </div>
                </div>

            </div>

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Email</label>
                        <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" value='{$data.cntPrimaryEmail}'  onChange="Javascript:checkEmail(this.value);">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Login Password </label>
                        <input type="text" id="cntPassword" name="cntPassword" class="form-control" value='{$data.cntPassword}'>
                        <div class="small">(<i>min length 6 chars</i>)</div>
                    </div>
                </div>

            </div>
            <!-- row -->



            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Address Line 1</label>
                        <input type="text" id="cntPrimaryAddress1" name="cntPrimaryAddress1" class="form-control" value="{$data.cntPrimaryAddress1}">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Address line 2</label>
                        <input type="text" id="cntPrimaryAddress2" name="cntPrimaryAddress2" class="form-control" value="{$data.cntPrimaryAddress2}">
                    </div>
                </div>

            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> State</label>
                        <select id="cntPrimaryState" name="cntPrimaryState" class="form-control">
                            <option  value="{$data.cntPrimaryState}">{$data.cntPrimaryState}</option>
                        {$states}
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Zip Code</label>
                        <input type="text" id="cntPrimaryZip" name="cntPrimaryZip" class="form-control" value="{$data.cntPrimaryZip}" >
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

    <!-- begin row -->
    <div class="row">
        {IF $data.cntSignature}
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <img src="{$SITE_URL}media/crm/{$data.cntSignature}" border="0" alt="User Avatar" width='100' /> </div>
            </div>

        {/IF}

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">


                <label class="control-label">    {IF $data.cntSignature} Replace Signature{ELSE}Upload Signature{/IF}</label>
                <input type="file" name="empsignature" id="empsignature">
            </div>
        </div>

    </div>
    <!-- row -->

<p> </p>
    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Update Employee</a>
        </div>
<div class="col-sm-2">
        <a href="{$SITE_URL}crm/employeeList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




