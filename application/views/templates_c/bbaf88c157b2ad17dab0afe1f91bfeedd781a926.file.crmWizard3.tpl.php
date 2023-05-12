<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-01-28 14:55:16
         compiled from "application/views/templates/crm/crmWizard3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18124125036012d054938212-00008100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbaf88c157b2ad17dab0afe1f91bfeedd781a926' => 
    array (
      0 => 'application/views/templates/crm/crmWizard3.tpl',
      1 => 1497340973,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18124125036012d054938212-00008100',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company' => 0,
    'compmanagers' => 0,
    'cm' => 0,
    'i' => 0,
    'cid' => 0,
    'SITE_URL' => 0,
    'states' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_6012d054b437a7_50298534',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6012d054b437a7_50298534')) {function content_6012d054b437a7_50298534($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });





    });


    $(document).ready(function() {

        arr = addressitems[0];
        $("#cntAltContactName").val(arr[0]);
        $("#cntPrimaryPhone").val(arr[1]);
        $("#cntAltPhone1").val(arr[2]);
        $("#cntAltPhone2").val(arr[3]);
        $("#cntPrimaryEmail").val(arr[4]);
        $("#cntAltEmail").val(arr[5]);
        $("#cntPrimaryAddress1").val(arr[6]);
        $("#cntPrimaryAddress2").val(arr[7]);
        $("#cntPrimaryCity").val(arr[8]);
        $("#cntPrimaryState").val(arr[9]);
        $("#cntPrimaryZip").val(arr[10]);

    });

    var id = 0;

    var addressitems = new Array();
    var arr = new Array();

    arr[0] = "<?php echo $_smarty_tpl->tpl_vars['company']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['company']->value['cntLastName'];?>
";
    arr[1] = "<?php echo $_smarty_tpl->tpl_vars['company']->value['cntPrimaryPhone'];?>
";
    arr[2] = "<?php echo $_smarty_tpl->tpl_vars['company']->value['cntAltPhone1'];?>
";
    arr[3] = "<?php echo $_smarty_tpl->tpl_vars['company']->value['cntAltPhone2'];?>
";
    arr[4] = "<?php echo $_smarty_tpl->tpl_vars['company']->value['cntPrimaryEmail'];?>
";
    arr[5] = "<?php echo $_smarty_tpl->tpl_vars['company']->value['cntAltEmail'];?>
";
    arr[6] = "<?php echo $_smarty_tpl->tpl_vars['company']->value['cntPrimaryAddress1'];?>
";
    arr[7] = "<?php echo $_smarty_tpl->tpl_vars['company']->value['cntPrimaryAddress2'];?>
";
    arr[8] = "<?php echo $_smarty_tpl->tpl_vars['company']->value['cntPrimaryCity'];?>
";
    arr[9] = "<?php echo $_smarty_tpl->tpl_vars['company']->value['cntPrimaryState'];?>
";
    arr[10] = "<?php echo $_smarty_tpl->tpl_vars['company']->value['cntPrimaryZip'];?>
";

    addressitems[0] = arr;


    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(1, null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['compmanagers']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['cm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['compmanagers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cm']->key => $_smarty_tpl->tpl_vars['cm']->value) {
$_smarty_tpl->tpl_vars['cm']->_loop = true;
?>
    var arr = new Array();
    arr[0] = "<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['cm']->value['cntLastName'];?>
";
    arr[1] = "<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntPrimaryPhone'];?>
";
    arr[2] = "<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntAltPhone1'];?>
";
    arr[3] = "<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntAltPhone2'];?>
";
    arr[4] = "<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntPrimaryEmail'];?>
";
    arr[5] = "<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntAltEmail'];?>
";
    arr[6] = "<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntPrimaryAddress1'];?>
";
    arr[7] = "<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntPrimaryAddress2'];?>
";
    arr[8] = "<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntPrimaryCity'];?>
";
    arr[9] = "<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntPrimaryState'];?>
";
    arr[10] = "<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntPrimaryZip'];?>
";

    addressitems[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
] = arr;

    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>

    <?php } ?>


    <?php }?>

    //console.log( JSON.stringify(addressitems, null, 2) );
    function setValuesForManager(form)
    {
        var selected = form.cntManagerId.selectedIndex;

        arr = addressitems[selected];
        $("#cntAltContactName").val(arr[0]);
        $("#cntPrimaryPhone").val(arr[1]);
        $("#cntAltPhone1").val(arr[2]);
        $("#cntAltPhone2").val(arr[3]);
        $("#cntPrimaryEmail").val(arr[4]);
        $("#cntAltEmail").val(arr[5]);
        $("#cntPrimaryAddress1").val(arr[6]);
        $("#cntPrimaryAddress2").val(arr[7]);
        $("#cntPrimaryCity").val(arr[8]);
        $("#cntPrimaryState").val(arr[9]);
        $("#cntPrimaryZip").val(arr[10]);

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
                       var popupmsg = 'This email ' + email + ' is already in this system.\nThis may be a duplicate record';
                       $('#msg').html(popupmsg);
                       $('#privatemessage').modal('show');
                       window.setTimeout(function(){ $("#privatemessage").modal('hide'); },5000);

                      // alert("This email " + email + " is already in this system.\nYou will have to use another email");
                      //$("#cntPrimaryEmail").val('');

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

        $("#cntPrimaryPhone").mask("(999) 999-9999");

        $("#cntAltPhone1").mask("(999) 999-9999");

        $("#cntAltPhone2").mask("(999) 999-9999");

        var cid = 9;// search for properties

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
                searchProcess(firstname, lastname);
            }
        });
        $("#cntLastName").on("change", function(){
            firstname = $('#cntFirstName').val();
            lastname = $('#cntLastName').val();
            if(lastname.length > 3)
            {
                searchProcess(firstname, lastname);
            }
        });

    });


    function searchProcess(firstname, lastname)
    {

        $.post( site_url + "crm/searchName3/", { firstname: firstname , lastname: lastname, id:<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
})
                .done(function( data ) {
                    $('#infomsg').html("<h3>Possible Name Matches</h3>");
                    if(data)
                    {

                        //alert(data);
                        $('#infomsg').html(data);

                        var msghtml = '';
                       return;


                        if(data.trim() != '<h3>Possible Name Matches</h3>')
                        {
                            $.growl.error({ title: "Search Results", message: "We found some matching records. Please make sure you do not enter a duplicate record." });
                        }
                        $('#infomsg').html(msghtml);
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


    function changeMe(id)
    {
        var company = $('#' + id).attr("data-company")
        var cm =  confirm("Do you want to change the connection of this property from "+ company + " to <?php echo $_smarty_tpl->tpl_vars['company']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['company']->value['cntLastName'];?>
?");
        var primaryid = <?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
;
        if(cm)
        {
            window.location.href= site_url + "crm/changeProperty/" + primaryid + "/" + id;
        }
    }


<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">
            <h2>Add Property</h2>
        <h3 class="alert">Related To : <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/additionalInformation/<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['company']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['company']->value['cntLastName'];?>
</a></h3>
            <i>(Name, Email, Phone, Primary Contact Person Name , Parcel Number  are recommended fields)</i>
    </div>
    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" >Primary Contact </span></a> </span> </li
                    >
            <?php if ($_smarty_tpl->tpl_vars['company']->value['cntcid']!=12&&$_smarty_tpl->tpl_vars['company']->value['cntcid']!=13) {?>
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='#'><span class="wizard-step-description" >Managers Employees </span></a> </span> </li
                    >
                <li>
                    <!-- ! Remove space between elements by dropping close angle -->
                    <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" style="color: #000000;">Properties</span></a> </span> </li
                        >
            <?php } else { ?>
                <li>
                    <!-- ! Remove space between elements by dropping close angle -->
                    <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" style="color: #000000;">Properties</span></a> </span> </li
                        >

            <?php }?>
        </ul>
    </div>
   <div class="panel-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveWizardProperty/<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
        <input type="hidden" id="cntcid" name="cntcid"  value="9">
        <input type="hidden" id="cntCompanyId" name="cntCompanyId"  value="<?php echo $_smarty_tpl->tpl_vars['company']->value['cntId'];?>
">
        <input type="hidden" id="cntQualified" name="cntQualified"  value="1">
        <input type="hidden" name="cntSalutation" value="">
        <input type="hidden" name="cntLastName" value="">
        <input type="hidden" name="cntMiddleName" value="">

            <div class="row">

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Property Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Property Manager</label>
                        <select id="cntManagerId" name="cntManagerId" class="form-control" onChange="Javascript:setValuesForManager(this.form);">
                            <option value="<?php echo $_smarty_tpl->tpl_vars['company']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['company']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['company']->value['cntLastName'];?>
</option>
                            <?php if ($_smarty_tpl->tpl_vars['compmanagers']->value) {?>
                                <?php  $_smarty_tpl->tpl_vars['cm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['compmanagers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cm']->key => $_smarty_tpl->tpl_vars['cm']->value) {
$_smarty_tpl->tpl_vars['cm']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cm']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['cm']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['cm']->value['cntLastName'];?>
</option>
                                <?php } ?>


                            <?php }?>
                            </select>
                    </div>
                </div>

            </div>
            <!-- row -->

            <div class="row">


                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Primary Contact Person</label>
                        <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control">
                    </div>
                </div>


                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Parcel Number</label>
                        <input type="text" id="cntParcelNumber" name="cntParcelNumber" class="form-control">
                    </div>
                </div>

            </div>
            <!-- row -->


        <!-- begin row -->
            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Primary Phone</label>
                        <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone"  type="number"  class="form-control">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Cell Phone</label>
                        <input type="text" id="cntAltPhone1" name="cntAltPhone1" type="number"   class="form-control">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Fax</label>
                        <input type="text" id="cntAltPhone2" name="cntAltPhone2" type="number"   class="form-control">
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
            <div class="col-sm-5">
                <a class="topbut btn btn-success" href="Javascript:CHECKIT(this.dataform);"> ADD NEW PROPERTY </a>
            </div>
        </div>
        </form>

        </div>
    </div>




<?php }} ?>
