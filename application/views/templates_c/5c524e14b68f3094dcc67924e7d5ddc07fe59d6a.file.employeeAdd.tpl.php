<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-02-08 15:55:31
         compiled from "application/views/templates/crm/employeeAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212527686260215ef3c6b159-82317602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c524e14b68f3094dcc67924e7d5ddc07fe59d6a' => 
    array (
      0 => 'application/views/templates/crm/employeeAdd.tpl',
      1 => 1497340973,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212527686260215ef3c6b159-82317602',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'rolelist' => 0,
    'states' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_60215ef3e05116_93012791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60215ef3e05116_93012791')) {function content_60215ef3e05116_93012791($_smarty_tpl) {?>
<?php echo '<script'; ?>
>
    init.push(function () {


        $('#hd-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });
        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


    });


<?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">
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


<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Add Employee</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/"><span class="btn-label icon fa fa-male"></span> List Employees</a>
    </div>
    <div class="panel-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveEmployee"  name="dataform" id="dataform" class="panel" method="POST"
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
                            <?php echo $_smarty_tpl->tpl_vars['rolelist']->value;?>

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
                        <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

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
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




<?php }} ?>
