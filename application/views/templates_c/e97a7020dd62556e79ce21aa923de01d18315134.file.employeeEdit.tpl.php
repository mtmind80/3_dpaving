<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-20 20:58:56
         compiled from "application/views/templates/crm/employeeEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1229236555745b38b6de788-93982115%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e97a7020dd62556e79ce21aa923de01d18315134' => 
    array (
      0 => 'application/views/templates/crm/employeeEdit.tpl',
      1 => 1479675533,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1229236555745b38b6de788-93982115',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5745b38b75f330_41274266',
  'variables' => 
  array (
    'data' => 0,
    'SITE_URL' => 0,
    'system_roles' => 0,
    'rolelist' => 0,
    'states' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5745b38b75f330_41274266')) {function content_5745b38b75f330_41274266($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
?>
<?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {


        $('#hd-datepicker-component').datepicker();
        $('#bs-datepicker-component').datepicker();


    });


    var id = <?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
;


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


<?php echo '</script'; ?>
>

<div class="panel">
    <div class="panel-heading">

        <h2>Edit Employee</h2>

        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save</a>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/"><span class="btn-label icon fa fa-male"></span> List Employees</a>

    </div>
    <div class="panel-body">
    <?php if ($_smarty_tpl->tpl_vars['data']->value['cntStatusId']==0) {?> <div class="list-group-item-danger">This Employee is Disabled</div><?php }?>
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveEmployee/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
"  name="dataform" id="dataform" class="panel" method="POST"
              enctype="multipart/form-data">

        <input type="hidden" name="cntId" id="cntId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
">
        <input type="hidden" name="oldAvatar" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntAvatar'];?>
">

            <!-- begin row -->
            <div class="row">
                <div style="border: 1px solid dodgerblue; width:600px;height:80px;padding:10px;">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label"><span style="color:red;">*</span>Role</label>
                            <select id="cntRole" name="cntRole" class="form-control" >
                                <option value='<?php echo $_smarty_tpl->tpl_vars['data']->value['cntRole'];?>
' selected><?php echo $_smarty_tpl->tpl_vars['system_roles']->value[$_smarty_tpl->tpl_vars['data']->value['cntRole']-1];?>
</option>
                                <?php echo $_smarty_tpl->tpl_vars['rolelist']->value;?>

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Allow Internet Access</label>
                            <input type="checkbox"  class="checkbox" value="1" id="cntSecAccess" name="cntSecAccess" class="form-control" <?php if ($_smarty_tpl->tpl_vars['data']->value['cntSecAccess']) {?> checked<?php }?>>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label" style="color:red;">Disabled</label>
                            <input type="checkbox"  class="checkbox" value="1" id="cntStatusId" name="cntStatusId" class="form-control" <?php if ($_smarty_tpl->tpl_vars['data']->value['cntStatusId']==0) {?> checked<?php }?>>
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
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Last Name</label>
                        <input type="text" id="cntLastName" name="cntLastName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
">
                    </div>
                </div>

            </div>
            <!-- row -->
        <!-- begin row -->
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Middle Name</label>
                    <input type="text" id="cntMiddleName" name="cntMiddleName" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntMiddleName'];?>
">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label"> Phone</label>
                    <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryPhone'];?>
">
                </div>
            </div>

        </div>
        <!-- row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Gender</label><br>
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGenderYES" value="M" <?php if ($_smarty_tpl->tpl_vars['data']->value['cntGender']=='M') {?> checked<?php }?>> MALE
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGenderNO" value="F" <?php if ($_smarty_tpl->tpl_vars['data']->value['cntGender']=='F') {?> checked<?php }?>> FEMALE
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Salutation</label>
                        <select name="cntSalutation" id="cntSalutation">
                            <option><?php echo $_smarty_tpl->tpl_vars['data']->value['cntSalutation'];?>
</option>
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
                        <input type="text" id="cntDepartment" name="cntDepartment" class="form-control" value='<?php echo $_smarty_tpl->tpl_vars['data']->value['cntDepartment'];?>
'>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Title</label>
                        <input type="text" id="cntJobTitle" name="cntJobTitle" class="form-control" value='<?php echo $_smarty_tpl->tpl_vars['data']->value['cntJobTitle'];?>
'>
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
                                <input type="text" id="cntDateOfBirth" name="cntDateOfBirth"  value='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['cntDateOfBirth'],"%m/%d/%Y");?>
'
                                  class="form-control">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                        </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Hire Date</label>
                        <div class="input-group date" id="hd-datepicker-component">
                            <input type="text" id="cntHireDate" name="cntHireDate"  value='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['cntHireDate'],"%m/%d/%Y");?>
'
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
                        <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" value='<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryEmail'];?>
'  onChange="Javascript:checkEmail(this.value);">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Login Password </label>
                        <input type="text" id="cntPassword" name="cntPassword" class="form-control" value='<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPassword'];?>
'>
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
                        <input type="text" id="cntPrimaryAddress1" name="cntPrimaryAddress1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryAddress1'];?>
">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Address line 2</label>
                        <input type="text" id="cntPrimaryAddress2" name="cntPrimaryAddress2" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryAddress2'];?>
">
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
                            <option  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryState'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryState'];?>
</option>
                        <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Zip Code</label>
                        <input type="text" id="cntPrimaryZip" name="cntPrimaryZip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryZip'];?>
" >
                    </div>
                </div>

            </div>
            <!-- row -->
        <!-- begin row -->
        <div class="row">
            <?php if ($_smarty_tpl->tpl_vars['data']->value['cntAvatar']) {?>
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
media/crm/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntAvatar'];?>
" border="0" alt="User Avatar" width='100' /> </div>
            </div>
            <?php }?>

            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">    <?php if ($_smarty_tpl->tpl_vars['data']->value['cntAvatar']) {?>Replace Picture<?php } else { ?>Upload Picture<?php }?></label>
                    <input type="file" name="avatar" id="avatar">
                </div>
            </div>

        </div>
        <!-- row -->
        <?php if ($_smarty_tpl->tpl_vars['data']->value['cntAvatar']) {?>
        <!-- begin row -->
        <div class="row">
            <div class="col-sm-5">
                    </>Remove Current Image</i>
                    <input type="checkbox" id="removeAvatar" name="removeAvatar" class="checkbox-inline" value="1">
            </div>
        </div>
        <!-- row -->
        <?php }?>

    <!-- begin row -->
    <div class="row">
        <?php if ($_smarty_tpl->tpl_vars['data']->value['cntSignature']) {?>
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
media/crm/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntSignature'];?>
" border="0" alt="User Avatar" width='100' /> </div>
            </div>

        <?php }?>

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">


                <label class="control-label">    <?php if ($_smarty_tpl->tpl_vars['data']->value['cntSignature']) {?> Replace Signature<?php } else { ?>Upload Signature<?php }?></label>
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
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




<?php }} ?>
