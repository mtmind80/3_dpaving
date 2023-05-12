<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-19 08:57:56
         compiled from "application/views/templates/crm/crmEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5683960385880d3f478fa01-76812527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af758514a1c577b840e0a0a0e3aa5e972b6b89f8' => 
    array (
      0 => 'application/views/templates/crm/crmEdit.tpl',
      1 => 1465935692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5683960385880d3f478fa01-76812527',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'SITE_URL' => 0,
    'id' => 0,
    'categoryCB' => 0,
    'cblist' => 0,
    'states' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5880d3f48a1d71_11009803',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5880d3f48a1d71_11009803')) {function content_5880d3f48a1d71_11009803($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?><?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });

        $("#cntPrimaryPhone").mask("(999) 999-9999");

        $("#cntAltPhone1").mask("(999) 999-9999");

        $("#cntAltPhone2").mask("(999) 999-9999");



    });


    var id = "<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
";
    var cid = "<?php echo $_smarty_tpl->tpl_vars['data']->value['cntcid'];?>
";

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
<?php echo '</script'; ?>
>

<div class="panel">
    <div class="panel-heading">

            <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
</h2>
        <?php echo $_smarty_tpl->tpl_vars['data']->value['ccatName'];?>
<br/>
        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>
        
        <?php if ($_smarty_tpl->tpl_vars['data']->value['cntcid']==9&&$_smarty_tpl->tpl_vars['data']->value['cntCompanyId']>0) {?>
            <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/startProposal/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntCompanyId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
"><span class="btn-label icon fa fa-plus"></span> New Proposal</a>
        <?php }?>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" style="color: #000000;">Basic Information &nbsp; &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/additionalInformation/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" >Connections &nbsp; &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/catandservice/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Categories and Services &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/crmNotes/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Notes</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Profile</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">

        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveContact/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
"  name="dataform" id="dataform" class="panel" method="POST"
              enctype="multipart/form-data">
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" name="cntId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
">

        <!-- begin row -->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <input type="checkbox" id="cntQualified" name="cntQualified" class="form-control-sm checkbox-inline" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['cntQualified']) {?> checked <?php }?>>
                    <label class="control-label">Qualified</label>
                </div>
            </div>
        </div>
        <!-- row -->



        <!-- begin row -->
        <div class="row">
<?php if ($_smarty_tpl->tpl_vars['data']->value['cntcid']==11) {?>
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Over Head</label>
                    <span style="font-size:0.7EM;">(<i>Sub Contractors Only</i>)</i></span>
                    <input type="text" id="cntOverHead" name="cntOverHead" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntOverHead'];?>
">
                </div>
            </div>
<?php }?>
            <div class="col-sm-7">
                <div class="form-group no-margin-hr">
                    <label class="control-label"><span style='color:Red;'>Change Primary Category: </span> <?php echo $_smarty_tpl->tpl_vars['data']->value['ccatName'];?>

                    </label>
                    <select name="cntcid" id="cntcid" class="form-control">
                         <?php  $_smarty_tpl->tpl_vars['cblist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cblist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryCB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cblist']->key => $_smarty_tpl->tpl_vars['cblist']->value) {
$_smarty_tpl->tpl_vars['cblist']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['cntcid']==$_smarty_tpl->tpl_vars['cblist']->value['ccatId']) {?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['cblist']->value['ccatId'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['cblist']->value['ccatName'];?>
</option>
                            <?php } else { ?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['cblist']->value['ccatId'];?>
"><?php echo $_smarty_tpl->tpl_vars['cblist']->value['ccatName'];?>
</option>
                            <?php }?>
                        <?php } ?>
                    </select>
                </div>
            </div>


        </div>
        <!-- row -->

        <?php if ($_smarty_tpl->tpl_vars['data']->value['cntcid']==9) {?> <!-- property -->
            <!-- community -->
            <!-- begin row -->
            <input type="hidden" name="cntSalutation"   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntSalutation'];?>
">
            <input type="hidden" name="cntLastName"   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
">
            <input type="hidden" name="cntMiddleName"   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntMiddleName'];?>
">


            <div class="row">

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Community Development Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Contact Person</label>
                        <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntAltContactName'];?>
">
                    </div>
                </div>

            </div>
            <!-- row -->




        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['cntcid']==10) {?>
            <!-- Government Agency -->
            <!-- begin row -->
            <input type="hidden" name="cntSalutation"   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntSalutation'];?>
">
            <input type="hidden" name="cntLastName"   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
">
            <input type="hidden" name="cntMiddleName"   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntMiddleName'];?>
">


            <div class="row">

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Government Agency</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Contact Person</label>
                        <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntAltContactName'];?>
">
                    </div>
                </div>

            </div>
            <!-- row -->

        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['cntcid']==7||$_smarty_tpl->tpl_vars['data']->value['cntcid']==1) {?>
            <!-- property management Company -->
            <!-- begin row -->


            <input type="hidden" name="cntSalutation"   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntSalutation'];?>
">
            <input type="hidden" name="cntLastName"   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
">
            <input type="hidden" name="cntMiddleName"   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntMiddleName'];?>
">

            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Company Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Contact Person</label>
                        <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntAltContactName'];?>
">
                    </div>
                </div>
            </div>
            <!-- row -->
        <?php } else { ?>
            <!-- begin row -->
            <input type="hidden" id="cntAltContactName" name="cntAltContactName" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntAltContactName'];?>
">

            <!-- begin row -->
            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Salutation</label>
                        <select name="cntSalutation" id="cntSalutation" class="form-control">
                            <option><?php echo $_smarty_tpl->tpl_vars['data']->value['cntSalutation'];?>
</option>
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                        </select>
                    </div>
                </div>

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


                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Middle Name</label>
                        <input type="text" id="cntMiddleName" name="cntMiddleName" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntMiddleName'];?>
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
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGender" value="M" <?php if (!isset($_smarty_tpl->tpl_vars['data']) || !is_array($_smarty_tpl->tpl_vars['data']->value)) $_smarty_tpl->createLocalArrayVariable('data');
if ($_smarty_tpl->tpl_vars['data']->value['cntGender'] = "M") {?>checked<?php }?>> MALE
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGender" value="F" <?php if (!isset($_smarty_tpl->tpl_vars['data']) || !is_array($_smarty_tpl->tpl_vars['data']->value)) $_smarty_tpl->createLocalArrayVariable('data');
if ($_smarty_tpl->tpl_vars['data']->value['cntGender'] = "F") {?>checked<?php }?>> FEMALE
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Date of Birth</label>
                        <div class="input-group date" id="bs-datepicker-component">
                            <input type="text" id="cntDateOfBirth" name="cntDateOfBirth"
                                   class="form-control" value='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['cntDateOfBirth'],"%m/%d/%Y");?>
'>
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Department</label>
                        <input type="text" id="cntDepartment" name="cntDepartment" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntDepartment'];?>
">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Title</label>
                        <input type="text" id="cntJobTitle" name="cntJobTitle" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntJobTitle'];?>
">
                    </div>
                </div>

            </div>
            <!-- row -->


        <?php }?>

            <!-- begin row -->
            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Primary Phone</label>
                        <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryPhone'];?>
">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Cell Phone</label>
                        <input type="text" id="cntAltPhone1" name="cntAltPhone1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntAltPhone1'];?>
">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Fax</label>
                        <input type="text" id="cntAltPhone2" name="cntAltPhone2" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntAltPhone2'];?>
">
                    </div>
                </div>


            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Email</label>
                        <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryEmail'];?>
" onChange="Javascript:checkEmail(this.value);">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Alternate Email</label>
                        <input type="text" id="cntAltEmail" name="cntAltEmail" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntAltEmail'];?>
">
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Address Line 1</label>
                        <input type="text" id="cntPrimaryAddress1" name="cntPrimaryAddress1" class="form-control" size="45" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryAddress1'];?>
">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Address line 2</label>
                        <input type="text" id="cntPrimaryAddress2" name="cntPrimaryAddress2" class="form-control"  size="45" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryAddress2'];?>
">
                    </div>
                </div>

            </div>
            <!-- row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">City</label>
                        <input type="text" id="cntPrimaryCity" name="cntPrimaryCity" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryCity'];?>
">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> State</label>
                        <select id="cntPrimaryState" name="cntPrimaryState" class="form-control" >
                            <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryState'];?>
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
">
                    </div>
                </div>

            </div>
            <!-- row -->

        <?php if ($_smarty_tpl->tpl_vars['data']->value['cntcid']==9) {?>
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
                        <input type="text" name="cntParcelNumber" id="cntParcelNumber" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntParcelNumber'];?>
">

                    </div>
                </div>

            </div>
            <!-- row -->
        <?php }?>


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
                    <input type="text" id="cntBillAddress1" name="cntBillAddress1" class="form-control" size="45" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillAddress1'];?>
">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Address line 2</label>
                    <input type="text" id="cntBillAddress2" name="cntBillAddress2" class="form-control"  size="45" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillAddress2'];?>
">
                </div>
            </div>

        </div>
        <!-- row -->
        <!-- begin row -->
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">City</label>
                    <input type="text" id="cntBillCity" name="cntBillCity" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillCity'];?>
">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label"> State</label>
                    <select id="cntBillState" name="cntBillState" class="form-control">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['cntBillState']) {?><option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillState'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillState'];?>
</option><?php }?>
                        <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

                    </select>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Zip Code</label>
                    <input type="text" id="cntBillZip" name="cntBillZip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntBillZip'];?>
">
                </div>
            </div>

        </div>
        <!-- row -->

        <!-- begin row -->
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Comments</label>
                    <textarea rows="4" cols="54" id="cntComment" name="cntComment" class="form-control"><?php echo $_smarty_tpl->tpl_vars['data']->value['cntComment'];?>
</textarea>
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




<?php }} ?>
