<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-25 13:52:59
         compiled from "application/views/templates/workorders/woServiceDailyRep_EST.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8565755325889021bb27b83-12796711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '686e2d714ffb815dae2a0a3427e650d074c97749' => 
    array (
      0 => 'application/views/templates/workorders/woServiceDailyRep_EST.tpl',
      1 => 1465508961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8565755325889021bb27b83-12796711',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CurrentDate' => 0,
    'equipmentlist' => 0,
    'i' => 0,
    'data' => 0,
    'materialslist' => 0,
    'm' => 0,
    'vehiclelist' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
    'proposal' => 0,
    'details' => 0,
    'sid' => 0,
    'materialvendors' => 0,
    'materials' => 0,
    'mdate' => 0,
    'vehicles' => 0,
    'equipment' => 0,
    'laborlist' => 0,
    'timevalues' => 0,
    'labor' => 0,
    'other' => 0,
    'ov' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5889021bcac4e6_48730903',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5889021bcac4e6_48730903')) {function content_5889021bcac4e6_48730903($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>

<?php echo '<script'; ?>
 type="text/javascript">



init.push(function () {



    $('#bs-datepicker-component').datepicker({ dateFormat: 'mm-dd-yy' });

    SetDate('<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%Y-%m-%d");?>
');


});

var equipArr = new Array();

<?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>

equipArr[0] = new Array(3);
equipArr[0][0] = "0";
equipArr[0][1] = "0";
equipArr[0][2] = "0";

<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['equipmentlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>

<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
equipArr[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
] = new Array(3);
equipArr[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][0] = "<?php echo $_smarty_tpl->tpl_vars['data']->value['equipCost'];?>
";
equipArr[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][1] = "<?php echo $_smarty_tpl->tpl_vars['data']->value['equipMinCost'];?>
";
equipArr[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][2] = "<?php echo $_smarty_tpl->tpl_vars['data']->value['equipRate'];?>
";


<?php } ?>


var matcost = new Array();
<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['materialslist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>

matcost[<?php echo $_smarty_tpl->tpl_vars['m']->value['omatMatID'];?>
,0] = '<?php echo $_smarty_tpl->tpl_vars['m']->value['omatName'];?>
';
matcost[<?php echo $_smarty_tpl->tpl_vars['m']->value['omatMatID'];?>
,1] = <?php echo $_smarty_tpl->tpl_vars['m']->value['omatCost'];?>
;

<?php } ?>

function setEquipCost(form)
{
    var ind = form.POequipEquipmentID.selectedIndex;
    var bcost = equipArr[form.POequipEquipmentID.selectedIndex][0];
    form.mincost.value = '$' + bcost;
    form.POEquipCost.value = bcost;
    form.POEquipRate.value = equipArr[form.POequipEquipmentID.selectedIndex][2];

}


var MyCostArr = [];
MyCostArr.push("0");

<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vehiclelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>

MyCostArr.push("<?php echo $_smarty_tpl->tpl_vars['data']->value['vtypeRate'];?>
");

<?php } ?>


function UpdateMaterial(form)
{
    var dex =  form.womatMatID.selectedIndex;
    form.womatAmout.value = matcost[dex,1];



}
function UpdateVehicleRate(form)
{
    var dex =  form.POVvehicleID.selectedIndex;
    form.POVRate.value = MyCostArr[dex];
    form.POVehicleRate.value = MyCostArr[dex] + ' per hour';
}



function CHECKITM(form)
{
    if(!testm(form)){ return;
    }

    form.submit();

}

function testm(form)
{


    if(form.womatMatID[form.womatMatID.selectedIndex].value == 0)
    {
        alert('Select a material.');
        form.womatMatID.focus();
        return false;
    }

    if(form.womatAmount.value != parseFloat(form.womatAmount.value))
    {
        alert('Amount must be a valid number.');
        form.womatAmount.focus();
        return false;
    }

    return true;

}


function CHECKITV(form)
{
    if(!testv(form)){ return;
    }

    form.submit();

}

function testv(form)
{


    if(form.POVvehicleID[form.POVvehicleID.selectedIndex].value == 0)
    {
        alert('Select a vehicle.');
        form.POVvehicleID.focus();
        return false;
    }

    if(form.POVHoursUsed.value != parseInt(form.POVHoursUsed.value))
    {
        alert('Number of hours must be a valid number.');
        form.POVHoursUsed.focus();
        return false;
    }

    return true;

}


function formatDate(d) {

    var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
    ];

    var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    var n = weekday[d.getDay()];

    var dd = d.getDate()

    if ( dd < 10 ) dd = '0' + dd;

    var mm = monthNames[d.getMonth()];


    var yy = d.getFullYear();

    return n + ', ' + mm +' '+ dd +', '+ yy
}



function SetDate(value)
{

    

    var svalue = new Date(value);
    dvalue = formatDate(svalue); // text version iof date

    syear = svalue.getFullYear();
    smonth = svalue.getMonth();
    sday = svalue.getDate();
    smonth = smonth + 1;
    if(sday <=9) {sday = '0' + sday;}
    if(smonth <=9){smonth = '0' + smonth;}

    xvalue = syear + '-' + smonth + '-' + sday; // sql format date
    $("#womMainDateDisplay").html(dvalue);
    $("#womDateDisplay").html(dvalue);
    $("#womDateDisplay2").html(dvalue);
    $("#womDateDisplay3").html(dvalue);
    $("#womDateDisplay4").html(dvalue);
    $("#womDateDisplay5").html(dvalue);

    $("#womDate").val(xvalue);
    $("#POVDate").val(xvalue);
    $("#POequipDate").val(xvalue);
    $("#POlaborDate").val(xvalue);
    $("#jobcostDate").val(xvalue);
    $("#womatDate").val(xvalue);

    





}


function CHECKITO(form)
{
    if(!testo(form)){ return;
    }

    form.submit();

}

function testo(form)
{


    if(form.jobcostAmount.value != parseFloat(form.jobcostAmount.value))
    {
        alert('Cost must be a valid number.');
        form.jobcostAmount.focus();
        return false;
    }


    if(form.jobcostDescription.value == '')
    {
        alert('Description cannot be blank.');
        form.jobcostDescription.focus();
        return false;
    }


    return true;

}


function CHECKIT(form)
{
    if(!test(form)){ return;
    }

    form.submit();

}

function test(form)
{

    var anyBoxesNotChecked = false;

    $("#dataform input[type=checkbox]").each(function() {
        if (!$(this).is(":checked"))
        {
            anyBoxesNotChecked = true;
        }

    });

    if (anyBoxesNotChecked) {
        alert('You must indicate that you have checked all of these things. \nPlease select all checkboxes, and enter a note');
        return false;
    }

    showSpinner();

    return true;

}


function CHECKITE(form)
{
    if(!teste(form)){ return;
    }

    form.submit();

}

function teste(form)
{

    if(form.POequipEquipmentID[form.POequipEquipmentID.selectedIndex].value == 0)
    {
        alert('Select a type of equipment.');
        form.POequipEquipmentID.focus();
        return false;


    }
    if(form.POequipNumber.value != parseInt(form.POequipNumber.value))
    {
        alert('Number of items must be a valid number.');
        form.POequipNumber.focus();
        return false;
    }


    if(form.POequipHours.value != parseInt(form.POequipHours.value))
    {
        alert('Number of hours must be a valid number.');
        form.POequipHours.focus();
        return false;
    }


    return true;

}




function CHECKITL(form)
{
    if(!testl(form)){ return;
    }

    form.submit();

}



function testl(form)
{

    if(form.POEmpID[form.POEmpID.selectedIndex].value ==0)
    {
        alert('You must select an employee.');
        return false;

    }



    return true;

}



<?php echo '</script'; ?>
>


<?php $_smarty_tpl->tpl_vars["mdate"] = new Smarty_variable('', null, 0);?>
<?php $_smarty_tpl->tpl_vars["tdate"] = new Smarty_variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%Y%m%d"), null, 0);?>



<div class="panel">

   <div class="panel-body">

   <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOEstimatorClose/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
" class="btn btn-light-green btn-labeled hidden-print"><span class="btn-label icon fa fa-arrow-circle-left"></span> Back To Work Order </a>


   <div id="Proposalheader">
       <h2>Enter Any Final Additional Costs</h2>

       <span class="alert-dark">Add equipment, materials, labor, vehicles, other costs and send to billing.</span>
       <h1><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobName'];?>
</h1>
       <h2><?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
 <?php if ($_smarty_tpl->tpl_vars['details']->value['jordStatus']=="COMPLETED") {?><span class='alert-info'>COMPLETED</span><?php }?></h2>
       <h3>Work Order: <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['proposal']->value['jobMasterNumber']);?>
</h3>
<span class="alert-danger">  Please enter any additional costs and close this job.</span>
       <br/>
   </div>
   <!-- begin row -->

   <div class="row"  style='padding:10px;'>

<form id="selectdate">

    <div class="row alert">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Set Report Date</label>
                       <div class="input-group date large" id="bs-datepicker-component">
                           <input type="text" id="setwomDate" name="setwomDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
"
                                  class="form-control" onChange="Javascript:SetDate(this.value);">
                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                       </div>
                   </div>
               </div>


        <div class="col-sm-8">

                &nbsp;
        </div>

           </div>

           </form>
       </div>



   <!-- Materials -->
   <br />
   <a name="materials" />
   <div class="row"  style='padding:10px;'>

       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseTwo">
               <h3>Material Usage <span id="womDateDisplay5"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3></a> </div>
       <!-- / .panel-heading -->
       <div id="collapseTwo" class="row-collapse">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOMaterial/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/2"  name="mdataform" id="mdataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="womatDate" id="womatDate" value="<?php echo $_smarty_tpl->tpl_vars['CurrentDate']->value;?>
">
               <input type="hidden" name="womatCost" id="womatCost" value="">
               <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <!-- vehicle sections -->

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-4">
                       <label class="control-label">Material</label>
                   </div>
                   <div class="col-sm-4">
                       <label class="control-label">Vendor</label>
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Amount</label>
                   </div>
               </div>



               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-4">
                       <select name="womatMatID" id="womatMatID" onChange="UpdateMaterial(this.form);">
                           <option value="0">Select Materials</option>
                           <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['materialslist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['omatMatID'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['omatName'];?>
 </option>
                           <?php } ?>
                       </select>
                   </div>
                   <div class="col-sm-4">
                       <select name="womatVendorID" id="womatVendorID" >
                           <option value="0">Select Vendor</option>
                           <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['materialvendors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
 </option>
                           <?php } ?>
                           <option value="0">Other</option>
                       </select>
                   </div>
                   <div class="col-sm-2">
                       <input type="text" id="womatAmount" name="womatAmount"
                              class="form-control"  style='background:yellow;' >
                   </div>


               </div>
               <br />

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKITM(this.mdataform);" class="btn btn-primary btn-labeled">Add Material</a>
                   </div>


               </div>

           </form>
               <br />
               <?php $_smarty_tpl->tpl_vars["tv"] = new Smarty_variable(0, null, 0);?>
               <?php if ($_smarty_tpl->tpl_vars['materials']->value) {?>
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-3">
                           Date
                       </div>
                       <div class="col-sm-3">

                           Material
                       </div>
                       <div class="col-sm-3">
                           Vendor
                       </div>
                       <div class="col-sm-3">
                           Amount
                       </div>
                   </div>


               <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['materials']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                   <?php $_smarty_tpl->tpl_vars['mdate'] = new Smarty_variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['womatCreatedDateTime'],"%m/%d/%Y"), null, 0);?>
                   <!-- begin row -->

                   <div class="row" >

                       <div class="col-sm-3">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['womatDate'];?>

                       </div>
                       <div class="col-sm-3">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['matName'];?>

                           <?php echo $_smarty_tpl->tpl_vars['mdate']->value;?>

                       </div>
                       <div class="col-sm-3">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>

                       </div>

                       <div class="col-sm-3">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['womatAmount'];?>

                       </div>



                   </div>

               <?php } ?>
               <?php }?>

       </div>
   </div>


   <!-- end materials form -->
   <br />

   <!-- Vehicles -->
   <!-- begin vehicles -->
   <br />
   <a name="vehicle" />
   <div class="row"  style='padding:10px;'>

       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseThree">
               <h3>Vehicle Usage <span id="womDateDisplay"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3></a> </div>
       <!-- / .panel-heading -->
       <div id="collapseThree" class="panel-collapse">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOvehicle/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/2"  name="vdataform" id="vdataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="POVDate" id="POVDate" value="<?php echo $_smarty_tpl->tpl_vars['CurrentDate']->value;?>
">
               <input type="hidden" name="POVRate" id="POVRate" value="">
               <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="POVjordID" id="POVjordID" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="POVehicleRate" id="POVehicleRate" >

               <!-- vehicle sections -->

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-6">
                       <label class="control-label">Add Vehicle</label>
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Hours</label>
                   </div>
               </div>



               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-6">
                       <select name="POVvehicleID" id="POVvehicleID" onChange="UpdateVehicleRate(this.form);">
                           <option value="0">Select a Vehicle</option>
                           <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vehiclelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['vehicleID'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['vehicleName'];?>
 </option>
                           <?php } ?>
                       </select>
                   </div>
                   <div class="col-sm-2">
                       <input type="text" id="POVHoursUsed" name="POVHoursUsed"
                              class="form-control"  style='background:yellow;' >
                   </div>


               </div>
               <br />
               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKITV(this.vdataform);" class="btn btn-primary btn-labeled">Add Vehicle</a>
                   </div>
               </div>

           </form>


               <br />
               <?php if ($_smarty_tpl->tpl_vars['vehicles']->value) {?>
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-4">
                           Date
                       </div>
                       <div class="col-sm-4">

                           Vehicle
                       </div>
                       <div class="col-sm-4">
                           Hours
                       </div>

                   </div>


               <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vehicles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>

                   <?php $_smarty_tpl->tpl_vars['mdate'] = new Smarty_variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['POVCreatedDate'],"%m/%d/%Y"), null, 0);?>
                   <!-- begin row -->
                   <div class="row" >

                       <div class="col-sm-4">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['POVDate'];?>

                       </div>
                       <div class="col-sm-4">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['vehicleName'];?>

                       </div>

                       <div class="col-sm-2">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['POVHoursUsed'];?>

                       </div>


                       <div class="col-sm-2">
                           <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deleteWOVehicle/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['POVID'];?>
/1'>remove</a>
                       </div>



                   </div>


               <?php } ?>
               <?php }?>
       </div>
   </div>


   <!-- end vehicle form -->
   <br />
   <a name="equipment" />
   <div class="row"  style='padding:10px;'>
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseFour">

               <h3>Equipment Usage <span id="womDateDisplay2"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3></a> </div>

       <!-- / .panel-heading -->
       <div id="collapseFour" class="panel-collapse">
           <!-- begin row -->

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOequipment/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/2"  name="edataform" id="edataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="POequipDate" id="POequipDate" value="">
               <input type="hidden" name="POEquipCost" id="POEquipCost" value="">
               <input type="hidden" name="POEquipRate" id="POEquipRate" value="">

               <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="mincost" id="mincost" >


               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-6">
                       <label class="control-label">Add Equipment</label>
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Number</label>
                   </div>

                   <div class="col-sm-2">
                       <label class="control-label">Hours</label>
                   </div>



               </div>


               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-6">

                       <select name="POequipEquipmentID" id="POequipEquipmentID" onChange="Javascript:setEquipCost(this.form);">
                           <option value="0">Select Equipment</option>

                           <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['equipmentlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['equipID'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['equipName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['equipRate'];?>
</option>
                           <?php } ?>
                       </select>

                   </div>
                   <div class="col-sm-2">
                       <input type="text" id="POequipNumber" name="POequipNumber"
                              class="form-control"  style='background:yellow;' >
                   </div>
                   <div class="col-sm-1">
                       <input type="text" id="POequipHours" name="POequipHours"
                              class="form-control"  style='background:yellow;' value="0">
                   </div>

               </div>

               <br />

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKITE(this.edataform);" class="btn btn-primary btn-labeled">Add Equipment</a>
                   </div>
               </div>




               <!-- end equipment form -->
           </form>
           <br />


           <?php if ($_smarty_tpl->tpl_vars['equipment']->value) {?>
               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-4">
                       Date
                   </div>
                   <div class="col-sm-4">

                       Equipment Type
                   </div>
                   <div class="col-sm-2">
                       Quantity
                   </div>
                   <div class="col-sm-2">
                       Hours
                   </div>
               </div>

           <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['equipment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>


               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-4">
                       <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['poequipCreatedDate'],"%m/%d/%Y");?>

                   </div>
                   <div class="col-sm-4">
                       <?php echo $_smarty_tpl->tpl_vars['data']->value['equipName'];?>

                   </div>

                   <div class="col-sm-2">
                       <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipNumber'];?>

                   </div>

                   <div class="col-sm-2">
                       <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipHours'];?>

                   </div>



               </div>

           <?php } ?>
           <?php }?>


       </div>
   </div>

   <!-- labor sections -->



   <br />

   <br />
   <a name="labor" />
   <!--
   WOTbljobOrderLabor

   -->

   <div class="row"  style='padding:10px;'>
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseFive">
               <h3>Record Labor <span id="womDateDisplay3"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3> </a> </div>
       <!-- / .panel-heading -->
       <div id="collapseFive" class="panel-collapse">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOlabor/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/2"  name="ldataform" id="ldataform" method="POST">
               <input type="hidden" name="beenhere" value="1">
               <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="POlaborDate" id="POlaborDate" value="<?php echo $_smarty_tpl->tpl_vars['CurrentDate']->value;?>
">

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-6">
                       <label class="control-label">Employee</label>
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Time In</label>
                   </div>

                   <div class="col-sm-2">
                       <label class="control-label">Time Out</label>
                   </div>

               </div>


               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-6">
                       <select name="POEmpID" id ="POEmpID">
                           <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['laborlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
</option>
                           <?php } ?>
                       </select>
                   </div>
                   <div class="col-sm-2">
                       <select name="POlaborStartTime" id ="POlaborStartTime">
                           <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['timevalues']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['timevalue'];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['timevalue'],"%I:%M %p");?>
</option>
                           <?php } ?>
                       </select>

                   </div>
                   <div class="col-sm-2">
                       <select name="POlaborEndTime" id ="POlaborEndTime">
                           <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['timevalues']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['timevalue'];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['timevalue'],"%I:%M %p");?>
</option>
                           <?php } ?>
                       </select>

                   </div>



               </div>
               <br />

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKITL(this.ldataform);" class="btn btn-primary btn-labeled">Add Labor</a>
                   </div>
               </div>


               <!-- end labor form -->
           </form>

               <br />

               <?php if ($_smarty_tpl->tpl_vars['labor']->value) {?>
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-3">
                           Date
                       </div>
                       <div class="col-sm-5">
                        Employee
                       </div>
                       <div class="col-sm-2">
                        TIME IN
                       </div>
                       <div class="col-sm-2">
                       TIME OUT
                       </div>
                   </div>

               <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['labor']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                   <!-- begin row -->

                   <?php $_smarty_tpl->tpl_vars['mdate'] = new Smarty_variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['POlaborCreatedDate'],"%m/%d/%Y"), null, 0);?>
                   <!-- begin row -->

                   <div class="row" >

                       <div class="col-sm-3">
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['POlaborDate'],"%m/%d/%Y");?>

                       </div>
                       <div class="col-sm-5">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>

                       </div>

                       <div class="col-sm-2">
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['POlaborStartTime'],"%I:%M %p");?>

                       </div>
                       <div class="col-sm-2">
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['POlaborEndTime'],"%I:%M %p");?>

                       </div>


                   </div>

               <?php } ?>
               <?php }?>


       </div>
   </div>

   <a name="other" />
   <!-- Other costs -->
   <br />
   <div class="row"  style='padding:10px;'>
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseSix">

       <h3>Other Costs <span id="womDateDisplay4"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3> </a> </div>

       <!-- / .panel-heading -->
       <div id="collapseSix" class="panel-collapse">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOother/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/2"  name="odataform" id="odataform" method="POST">
               <input type="hidden" name="beenhere" value="1">
               <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">

               <input type="hidden" name="jobcostDate" id="jobcostDate" value="<?php echo $_smarty_tpl->tpl_vars['CurrentDate']->value;?>
">




               <!-- begin row -->
               <div class="row" style='padding:10px;'>
                   <!-- begin row -->
                   <div class="row" >

                       <div class="col-sm-7">
                           <label class="control-label">Description</label>
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Cost</label>
                       </div>


                   </div>

                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-7">
                           <textarea name="jobcostDescription" id="jobcostDescription" class="form-control"></textarea>
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="jobcostAmount" name="jobcostAmount"
                                  class="form-control"  style='background:yellow;' >
                       </div>


                   </div>
                   <br />
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-5">
                           <a href="Javascript:CHECKITO(this.odataform);" class="btn btn-primary btn-labeled">Add Additional Costs</a>
                       </div>
                       <div class="col-sm-7">

                       </div>
                   </div>

               </div>


           </form>
           <br />

                   <?php $_smarty_tpl->tpl_vars["ov"] = new Smarty_variable(0, null, 0);?>

                   <?php if ($_smarty_tpl->tpl_vars['other']->value) {?>
                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-2">
                               Date
                           </div>
                           <div class="col-sm-6">
                               Description
                           </div>
                           <div class="col-sm-1">
                               Cost
                           </div>
                       </div>

                   <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['other']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>

                       <?php $_smarty_tpl->tpl_vars['mdate'] = new Smarty_variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['jobcostCreatedDate'],"%m/%d/%Y"), null, 0);?>
                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-2">
                               <?php echo $_smarty_tpl->tpl_vars['mdate']->value;?>


                           </div>

                           <div class="col-sm-6">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostDescription'];?>

                           </div>

                           <div class="col-sm-1">
                               $<?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostAmount'];?>

                           </div>




                       </div>

                       <?php $_smarty_tpl->tpl_vars['ov'] = new Smarty_variable($_smarty_tpl->tpl_vars['ov']->value+($_smarty_tpl->tpl_vars['data']->value['jobcostAmount']), null, 0);?>

                   <?php } ?>
                   <?php }?>
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-3">
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Total Additional Cost</label>
                       </div>

                       <div class="col-sm-3">
                           <input type="text" id="POOtherTotal" name="POOtherTotal"
                                  class="form-control"   style='background:lightblue;' value="<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['ov']->value);?>
" disabled>
                       </div>
                   </div>

               </div>



   </div>
</div>
   </div>



<?php }} ?>
