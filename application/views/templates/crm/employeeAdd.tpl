
<script>
    init.push(function () {


        $('#hd-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });
        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


    });


</script>


<script type="text/javascript">
    var id = 0;

    function checkEmail(email)
    {

        $.post( site_url + "crm/checkEmail/", { email: email , id:id})
                .done(function( data ) {

                    if(data)
                    {
                        alert("This email " + email + " is already in this system.\nYou will have to use another email");
                        $("#cntPrimaryEmail").val('');

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


            alert('Please enter a valid email format');
            form.cntPrimaryEmail.focus();
            return false;
        }



        if(form.cntPassword == '' || form.cntPassword.length < 6)
        {
            alert('Password must be at least six (6) characters.');
            form.cntPassword.focus();
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

        <h2>Add Employee</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}crm/employeeList/"><span class="btn-label icon fa fa-male"></span> List Employees</a>
    </div>
    <div class="panel-body">
        <form action="{$SITE_URL}crm/saveEmployee"  name="dataform" id="dataform" class="panel" method="POST"
              enctype="multipart/form-data">


            <!-- begin row -->
            <div class="row">
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

            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Middle Name</label>
                        <input type="text" id="cntMiddleName" name="cntMiddleName" class="form-control">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Phone</label>
                        <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" class="form-control">
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
                        <label class="control-label">Salutation</label>
                        <select name="cntSalutation" id="cntSalutation" class="form-control">
                            <option selected>Mr.</option>
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


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Date of Birth</label>
                            <div class="input-group date" id="bs-datepicker-component">
                                <input type="text" id="cntDateOfBirth" name="cntDateOfBirth"
                                  class="form-control">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                        </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Hire Date</label>
                        <div class="input-group date" id="hd-datepicker-component">
                            <input type="text" id="cntHireDate" name="cntHireDate"
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
                        <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control"  >
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Login Password </label>
                        <input type="text" id="cntPassword" name="cntPassword" class="form-control">
                        <div class="small">(<i>min length 6 chars</i>)</div>
                    </div>
                </div>

            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Role</label>
                        <select id="cntRole" name="cntRole" class="form-control">
                            {$rolelist}
                            </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Allow Internet Access</label>
                        <input type="checkbox"  class="checkbox" value="1" id="cntSecAccess" name="cntSecAccess" class="form-control">
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Address Line 1</label>
                        <input type="text" id="cntPrimaryAddress1" name="cntPrimaryAddress1" class="form-control">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Address line 2</label>
                        <input type="text" id="cntPrimaryAddress2" name="cntPrimaryAddress2" class="form-control">
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
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Upload Picture</label>
                        <input type="file" name="avatar" id="avatar">
                    </div>
                </div>


            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Upload Signature</label>
                        <input type="file" name="empsignature" id=empsignature">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Employee</a>
        </div>
<div class="col-sm-2">
        <a href="{$SITE_URL}crm/employeeList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




