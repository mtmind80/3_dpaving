<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-19 07:17:42
         compiled from "application/views/templates/crm/crmWizard1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1573623465880bc766d0737-65289421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f484170e6e2e7a44f93e1c7969d50c9454b75ed' => 
    array (
      0 => 'application/views/templates/crm/crmWizard1.tpl',
      1 => 1465508944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1573623465880bc766d0737-65289421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cidname' => 0,
    'cid' => 0,
    'SITE_URL' => 0,
    'states' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5880bc76714fb2_49886046',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5880bc76714fb2_49886046')) {function content_5880bc76714fb2_49886046($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">

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
                       var popupmsg = 'This email ' + email + ' is already in this system.';
                       $('#msg').html(popupmsg);
                       $('#privatemessage').modal('show');
                       window.setTimeout(function(){ $("#privatemessage").modal('hide'); },5000);

                      // alert("This email " + email + " is already in this system.\nYou will have to use another email");
                     //  $("#cntPrimaryEmail").val('');

                   }
                    return data;
                });

    }
    function addname(form)
    {

        form.cntAltContactName.value = form.cntFirstName.value + ' ' + form.cntLastName.value;
    }


    $(document).ready(function() {

        var howlong = 0;
        var scount = 1;
        var cid = $('#cntcid').val();

        $("#cntPrimaryPhone").mask("(999) 999-9999");

        $("#cntAltPhone1").mask("(999) 999-9999");

        $("#cntAltPhone2").mask("(999) 999-9999");

        $("#cntFirstName").on("keyup paste", function(){

            firstname = $('#cntFirstName').val();
            lastname = $('#cntLastName').val();
            howlong = firstname.length;
            //alert(parseInt(howlong) +' = '+ parseInt(donit));
            if(parseInt(howlong) > 3 && (scount/3 == parseInt(scount/3)))
            {
                searchProcess(firstname, lastname, cid);
            }
            scount++;

        });

        $("#cntLastName").on("keyup paste", function(){

            firstname = $('#cntFirstName').val();
            lastname = $('#cntLastName').val();
            howlong = lastname.length;
            //alert(parseInt(howlong) +' = '+ parseInt(donit));
            if(parseInt(howlong) > 3 && (scount/3 == parseInt(scount/3)))
            {
                searchProcess(firstname, lastname, cid);
            }
            scount++;

        });

        $("#cntFirstName").on("change", function(){
            firstname = $('#cntFirstName').val();
            lastname = $('#cntLastName').val();
            if(firstname.length > 3)
            {
                searchProcess(firstname, lastname, cid);
            }
        });
        $("#cntLastName").on("change", function(){

            firstname = $('#cntFirstName').val();
            lastname = $('#cntLastName').val();
            if(lastname.length > 3)
            {
            searchProcess(firstname, lastname, cid);
            }
        });

    });


    function searchProcess(firstname, lastname, cid)
    {


        $.post( site_url + "crm/searchName/", { firstname: firstname , lastname: lastname, cid: cid})
                .done(function( data ) {
                    $('#infomsg').html("<h3>Possible Name Matches</h3>");
                    if(data)
                    {
                        if(data.trim() != '<h3>Possible Name Matches</h3>')
                        {

                            $.growl.error({ title: "Search Results", message: "We found some matching records. Please make sure you do not enter a duplicate record." });
                        }
                        $('#infomsg').html(data);
                    }
                   // $('#infomsg').html("nothing");
                });

    }



    function searchEmail()
    {

        var cid = $('#cntcid').val();
        email = $('#cntPrimaryEmail').val();
        $.post( site_url + "crm/searchEmail/", { email: email, cid: cid})
                .done(function( data ) {
                    $('#infomsg').html("<h3>Possible Email Matches</h3>");

                    if(data)
                    {
                        if(data.trim() != '<h3>Possible Email Matches</h3>')
                        {
                            $.growl.error({ title: "Search Results", message: "We found some matching emails. Please make sure you do not enter a duplicate record." });
                        }
                        $('#infomsg').html(data);
                    }
                    // $('#infomsg').html("nothing");
                });

    }

<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">


            <h2>Add <?php echo $_smarty_tpl->tpl_vars['cidname']->value['ccatName'];?>
</h2>
            <i>(Name, Email and Primary Contact Person are recommended fields)</i>
        <?php if ($_smarty_tpl->tpl_vars['cid']->value==12||$_smarty_tpl->tpl_vars['cid']->value==13||$_smarty_tpl->tpl_vars['cid']->value==14) {?>
        <br /><span style="color:#ff3442;">*Reminder: If these property managers work for a parent company, please <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/select/">go back</a> and enter that company first.</span>
        <?php }?>
    </div>
    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" style="color: #000000;">Primary Contact </span></a> </span> </li
                    >
            <?php if ($_smarty_tpl->tpl_vars['cid']->value!=12&&$_smarty_tpl->tpl_vars['cid']->value!=13) {?>
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='#'><span class="wizard-step-description" >Managers Employees </span></a> </span> </li
                    >
                <li>
                    <!-- ! Remove space between elements by dropping close angle -->
                    <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Properties</span></a> </span> </li
                        >
            <?php } else { ?>
                <li>
                    <!-- ! Remove space between elements by dropping close angle -->
                    <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Properties</span></a> </span> </li
                        >

            <?php }?>
        </ul>
    </div>
   <div class="panel-body">

        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveWizard/<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" id="cntcid" name="cntcid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
        <input type="hidden" id="ccatEntity" name="ccatEntity" value="<?php echo $_smarty_tpl->tpl_vars['cidname']->value['ccatEntity'];?>
">

        <?php if ($_smarty_tpl->tpl_vars['cidname']->value['ccatEntity']==1) {?>
            
            <!-- begin row -->
            <input type="hidden" name="cntSalutation" value="">
            <input type="hidden" name="cntLastName" value="">
            <input type="hidden" name="cntMiddleName" value="">

            <div class="row">

                <div class="col-sm-9">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span><?php echo $_smarty_tpl->tpl_vars['cidname']->value['ccatName'];?>
 Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control">
                    </div>
                </div>

                <div class="col-sm-3">

                </div>

            </div>
            <!-- row -->

        <?php } else { ?>

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
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control" onchange="Javascript:addname(this.form);">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Last Name</label>
                        <input type="text" id="cntLastName" name="cntLastName" class="form-control" onchange="Javascript:addname(this.form);">
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

        <?php }?>


        <!-- begin row -->
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group no-margin-hr">
                    <input type="checkbox" id="cntQualified" name="cntQualified" class="form-control-sm checkbox-inline" value="1" checked>
                    <label class="control-label"> Qualified</label>
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



        <!-- begin row -->
            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Primary Phone</label>
                        <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" type="number" class="form-control">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Cell Phone</label>
                        <input type="text" id="cntAltPhone1" name="cntAltPhone1" type="number" class="form-control">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Fax</label>
                        <input type="text" id="cntAltPhone2" name="cntAltPhone2" type="number" class="form-control">
                    </div>
                </div>


            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Email</label>
                        <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" onChange="Javascript:searchEmail();">
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
            <div class="col-sm-8">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Comments</label>
                    <textarea rows="4" cols="54" id="cntComment" name="cntComment" class="form-control"></textarea>
                </div>
            </div>

        </div>
        <!-- row -->



    <!-- buton row -->
        <div class="row">
            <div class="col-sm-2">
                <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/select" class="btn btn-flat btn-labeled">Go Back</a>
            </div>
            <div class="col-sm-4">
                <a class="topbut btn btn-success" href="Javascript:CHECKIT(this.dataform);"> NEXT <span class="btn-label icon fa fa-arrow-right"></span></a>

            </div>

        </div>
        </form>

        </div>
    </div>




<?php }} ?>
