<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-22 05:28:13
         compiled from "application/views/templates/workorders/woServiceDailyRep_JM.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1719919571573da7a29754f3-22634958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c47ccff594b1e4e4a3df3efa11de605349ae0b2b' => 
    array (
      0 => 'application/views/templates/workorders/woServiceDailyRep_JM.tpl',
      1 => 1474522091,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1719919571573da7a29754f3-22634958',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573da7a2b463f0_75323132',
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
    'details' => 0,
    'USER_FULLNAME' => 0,
    'services' => 0,
    'pid' => 0,
    'sid' => 0,
    'USER_ID' => 0,
    'nightly' => 0,
    'n' => 0,
    'materialvendors' => 0,
    'materials' => 0,
    'tdate' => 0,
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573da7a2b463f0_75323132')) {function content_573da7a2b463f0_75323132($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
?>
<?php echo '<script'; ?>
 type="text/javascript">



init.push(function () {



    $('#bs-datepicker-component').datepicker({
        dateFormat: 'mm-dd-yy'
    });


    SetDate('<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
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

   <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showServiceList/" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-plus"></span>Scheduled Services</a>


   <div id="Proposalheader">
       <h2>End of Day  CheckList For:  <?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
 </h2>
       <h3>Job Manager <?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
</h3>
       Complete end of day checklist, and save it. Enter daily usage of materials, equipment, labor and any other costs.

       </h2><?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
 <?php if ($_smarty_tpl->tpl_vars['details']->value['jordStatus']=="COMPLETED") {?><span class='alert-info'>COMPLETED</span><?php }?></h2>

   </div>
   <!--
       <div class="panel-heading" style="background:<?php echo $_smarty_tpl->tpl_vars['services']->value['catcolor'];?>
;">
           <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
 -
               <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceName'];?>

       </div>
-->
   <?php if ($_smarty_tpl->tpl_vars['details']->value['jordStatus']!="COMPLETED") {?>
   <!-- begin row -->

       <div class="row panel"  style='border:none;'>

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
           <div class="row">

               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       Location:
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress1'];?>

                       &nbsp;
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress2'];?>

                       <br />
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordCity'];?>
,
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
.
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordZip'];?>


                       <br />
                       Parcel: <?php echo $_smarty_tpl->tpl_vars['details']->value['jordParcel'];?>

                       <br />
                       Start Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordStartDate'],"%A, %B %e, %Y");?>


                       <br />
                       End Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordEndDate'],"%A, %B %e, %Y");?>


                   </div>
               </div>
               <div class="col-sm-6">
                   <!--
                   <strong>SERVICE NOTES:</strong>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpProposalTextAlt'];?>

                -->
               </div>
            </div>
           <!-- row -->
       </div>


       <div class="row panel"  >

       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveWODaily/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/1"  name="dataform" id="dataform"  method="POST">
       <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
       <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
       <input type="hidden" name="womjordID" id="womjordID" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordID'];?>
">
       <input type="hidden" name="womCreatedby" id="womCreatedby" value="<?php echo $_smarty_tpl->tpl_vars['USER_ID']->value;?>
">
       <input type="hidden" id="womDate" name="womDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
">

           <h3>Nightly CheckList <span id="womMainDateDisplay"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3>
           <br/>Make sure all items are checked off on the Truck before leaving


        <div class="funkyradio">
          <div class="funkyradio-success">
              <input type="checkbox" name="womCheckRemoveEquipment" id="womCheckRemoveEquipment"  value="1" />
              <label for="womCheckRemoveEquipment">Remove Equipment from Trucks Outside</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="womCheckRemoveTools" id="womCheckRemoveTools"  value="1" />
              <label for="womCheckRemoveTools">Remove Tools from Trucks Outside</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="womCheckRefill" id="womCheckRefill"  value="1" />
              <label for="womCheckRefill">Refill Hand Tools and Tack Buckets</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="womCheckTruck" id="womCheckTruck"  value="1" />
              <label for="womCheckTruck">Check Tire /Lights on Truck and Trailers</label>
          </div>
          
        </div>


           <!-- <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='womCheckRemoveEquipment'  id='womCheckRemoveEquipment' value="1">
               </div>
               <div class="col-sm-5">
                   Remove Equipment from Trucks Outside
               </div>
           </div>



           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='womCheckRemoveTools'  id='womCheckRemoveTools' value="1">
               </div>
               <div class="col-sm-5">
                   Remove Tools from Trucks Outside
               </div>
           </div>




           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='womCheckRefill'  id='womCheckRefill' value="1">
               </div>
               <div class="col-sm-5">
                   Refill Hand Tools and Tack Buckets
               </div>
           </div>
           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='womCheckTruck'  id='womCheckTruck' value="1">
               </div>
               <div class="col-sm-5">
                   Check Tire /Lights on Truck and Trailers
               </div>
           </div>
 -->
       <div class="row">
           <div class="col-sm-7">
               Note: Anything Broken or Missing
           </div>
       </div>

       <div class="row">
           <div class="col-sm-12">
               <textarea name='womNote'  id='womNote' class="form-control" placeholder="No problems"></textarea>
           </div>
       </div>


       <!-- buton row -->
       <div class="row">
           <div class="col-sm-3">
               <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
           </div>

       </div>


       </form>

         </div>
   <?php if ($_smarty_tpl->tpl_vars['nightly']->value) {?>
   <!--  row -->
<h3>Nightly Reports</h3>
   <div class="row">
       <div class="col-sm-1">
Print
       </div>
       <div class="col-sm-2">
Report Date
       </div>
       <div class="col-sm-3">
          Manager
       </div>
       <div class="col-sm-4">
Note       </div>
       <div class="col-sm-2">
    Remove   </div>

   </div>

<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nightly']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value) {
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
    <!-- buton row -->
    <div class="row">

        <div class="col-sm-1">

 <span class="alert-info"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/printNightlyRep/<?php echo $_smarty_tpl->tpl_vars['n']->value['womID'];?>
">Print</a></span>


        </div>
        <div class="col-sm-2">
            <?php echo $_smarty_tpl->tpl_vars['n']->value['womDate'];?>

        </div>

        <div class="col-sm-3">
            <?php echo $_smarty_tpl->tpl_vars['n']->value['cntFirstName'];?>
    <?php echo $_smarty_tpl->tpl_vars['n']->value['cntLastName'];?>

        </div>
        <div class="col-sm-4">
            <?php echo $_smarty_tpl->tpl_vars['n']->value['womNote'];?>

        </div>
        <div class="col-sm-2">
            <a href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deleteWONightly/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['n']->value['womID'];?>
/1','You are about to delete this nightly report. Are you sure?');">remove</a>
        </div>

    </div>
<?php } ?>

   <?php } else { ?>
<?php echo '<script'; ?>
>
    alert("The report date will default to today's date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
 ");
<?php echo '</script'; ?>
>
   <?php }?>

   <!-- Materials -->
   <br />
   <a name="materials" />
   <div class="row panel" >

       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseTwo">
               <h3><span id="womDateDisplay5"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span> Material Usage for <?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
</h3></a> </div>
       <!-- / .panel-heading -->
       <div id="collapseTwo" class="panel">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOMaterial/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/1"  name="mdataform" id="mdataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="womatDate" id="womatDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
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
                       <div class="col-sm-2">
                           Date
                       </div>
                       <div class="col-sm-3">

                           Material
                       </div>
                       <div class="col-sm-2">
                           Vendor
                       </div>
                       <div class="col-sm-1">
                           Amount
                       </div>
                       <div class="col-sm-2">
                           &nbsp;
                       </div>
                   </div>


               <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['materials']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                   <div class="row" >

                       <div class="col-sm-2">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['womatDate'];?>

                       </div>
                       <div class="col-sm-3">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['matName'];?>

                           <?php echo $_smarty_tpl->tpl_vars['tdate']->value;?>

                           <?php echo $_smarty_tpl->tpl_vars['mdate']->value;?>

                       </div>
                       <div class="col-sm-2">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>

                       </div>

                       <div class="col-sm-1">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['womatAmount'];?>

                       </div>

                       <div class="col-sm-2">
                           <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deleteWOMaterial/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['womatID'];?>
/1'>remove</a>
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
   <div class="row panel"  >

       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseTwo">
               <h3><span id="womDateDisplay"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span> Vehicle Usage for <?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
</h3></a> </div>
       <!-- / .panel-heading -->
       <div id="collapseTwo" class="panel">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOvehicle/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/1"  name="vdataform" id="vdataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="POVDate" id="POVDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
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

<?php echo '<script'; ?>
>
$(document).ready(function(){
  $('.vehicleChk').click(function(){
    if($(this).is(':checked')){
      $(this).parent().parent().find('.textvehicle').show();
    }else{
      $(this).parent().parent().find('.textvehicle').hide();
    }
  });
});
<?php echo '</script'; ?>
>
               <!-- begin row -->
                   <div class="funkyradio">
                    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vehiclelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                    <div class="funkyradio-success">
                      <div class="row" style="margin-top:10px;">
                        <div class="col-md-6">
                          <input type="checkbox" class="vehicleChk" name="vehi[<?php echo $_smarty_tpl->tpl_vars['data']->value['vehicleID'];?>
]" id="vehi_<?php echo $_smarty_tpl->tpl_vars['data']->value['vehicleID'];?>
"  value="1" />
                          <label for="vehi_<?php echo $_smarty_tpl->tpl_vars['data']->value['vehicleID'];?>
" style="margin-top:0;"><?php echo $_smarty_tpl->tpl_vars['data']->value['vehicleName'];?>
</label>
                        </div>
                        <div class="col-md-6" style="clear: none;">
                           <input type="text" id="POVHoursUsed_<?php echo $_smarty_tpl->tpl_vars['data']->value['vehicleID'];?>
" class="textvehicle form-control" name="POVHoursUsed[<?php echo $_smarty_tpl->tpl_vars['data']->value['vehicleID'];?>
]"
                                 style='background:yellow;display:none;' >
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>

              


               <br />
               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-3">
                       <input type='submit' class="btn btn-primary btn-labeled" value="Add Vehicles">
                   </div>
               </div>

           </form>

<br />
           <?php if ($_smarty_tpl->tpl_vars['vehicles']->value) {?>
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-3">
                           Date
                       </div>
                       <div class="col-sm-3">

                           Vehicle
                       </div>
                       <div class="col-sm-2">
                           Hours
                       </div>

                       <div class="col-sm-2">
                           &nbsp;
                       </div>
                   </div>


               <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vehicles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>

                   <!-- begin row -->
                   <div class="row" >

                       <div class="col-sm-3">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['POVDate'];?>

                       </div>
                       <div class="col-sm-3">
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
   <div class="row panel"  >
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseThree">

               <h3><span id="womDateDisplay2"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span> Equipment Usage for <?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
</h3></a> </div>

       <!-- / .panel-heading -->
       <div id="collapseThree" class="panel">
           <!-- begin row -->

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOequipment/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/1"  name="edataform" id="edataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="POequipDate" id="POequipDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
">
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

               <div class="funkyradio">
                    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['equipmentlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                    <div class="funkyradio-success">
                      <div class="row" style="margin-top:10px;">
                        <div class="col-md-4">
                          <input type="checkbox" class="vehicleChk" name="equi[<?php echo $_smarty_tpl->tpl_vars['data']->value['equipID'];?>
]" id="equi_<?php echo $_smarty_tpl->tpl_vars['data']->value['equipID'];?>
"  value="1" />
                          <label for="equi_<?php echo $_smarty_tpl->tpl_vars['data']->value['equipID'];?>
" style="margin-top:0;"><?php echo $_smarty_tpl->tpl_vars['data']->value['equipName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['equipRate'];?>
</label>
                        </div>
                        <div class="col-md-4" style="clear: none;">
                           <input type="text" id="POequipNumber_<?php echo $_smarty_tpl->tpl_vars['data']->value['equipID'];?>
" class="textvehicle form-control" name="POequipNumber[<?php echo $_smarty_tpl->tpl_vars['data']->value['equipID'];?>
]"
                                 style='background:yellow;display:none;' >
                        </div>
                         <div class="col-md-4" style="clear: none;">
                           <input type="text" id="POequipHours_<?php echo $_smarty_tpl->tpl_vars['data']->value['equipID'];?>
" class="textvehicle form-control" name="POequipHours[<?php echo $_smarty_tpl->tpl_vars['data']->value['equipID'];?>
]"
                                 style='background:yellow;display:none;' >
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>

               <!-- <div class="row" >
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

               </div> -->

               <br />

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-3">
                       <input type='submit' class="btn btn-primary btn-labeled" value="Add Equipments">
                   </div>
               </div>




               <!-- end equipment form -->
           </form>
<br/>
           <?php if ($_smarty_tpl->tpl_vars['equipment']->value) {?>
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-2">
                        Date
                       </div>

                       <div class="col-sm-4">

                           Equipment Type
                       </div>
                       <div class="col-sm-2">
                           Quantity
                       </div>
                       <div class="col-sm-1">
                           Hours
                       </div>
                       <div class="col-sm-2">
                           &nbsp;
                       </div>
                   </div>

               <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['equipment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>


                   <div class="row" >
                       <div class="col-sm-2">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipDate'];?>

                       </div>
                       <div class="col-sm-4">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['equipName'];?>

                       </div>

                       <div class="col-sm-2">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipNumber'];?>

                       </div>

                       <div class="col-sm-1">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipHours'];?>

                       </div>

                       <div class="col-sm-2">
                           <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deleteWOEquipment/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['POequipID'];?>
/1'>remove</a>
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

   <div class="row panel" >
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseFour">
               <h3><span id="womDateDisplay3"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span> Record Labor for <?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
</h3> </a> </div>
       <!-- / .panel-heading -->
       <div id="collapseFour" class="panel">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOlabor/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/1"  name="ldataform" id="ldataform" method="POST">
               <input type="hidden" name="beenhere" value="1">
               <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="POlaborDate" id="POlaborDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
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

           <br/>
               <?php if ($_smarty_tpl->tpl_vars['labor']->value) {?>
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-2">
                           Date
                       </div>
                       <div class="col-sm-4">
                        Employee
                       </div>
                       <div class="col-sm-2">
                        TIME IN
                       </div>
                       <div class="col-sm-2">
                       TIME OUT
                       </div>
                       <div class="col-sm-2">
                           &nbsp;
                       </div>
                   </div>

               <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['labor']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                   <!-- begin row -->


                   <div class="row" >

                       <div class="col-sm-2">
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['POlaborDate'],"%m/%d/%Y");?>

                       </div>
                       <div class="col-sm-4">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>

                       </div>

                       <div class="col-sm-2">
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['POlaborStartTime'],"%I:%M %p");?>

                       </div>
                       <div class="col-sm-2">
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['POlaborEndTime'],"%I:%M %p");?>

                       </div>

                       <div class="col-sm-2">
                           <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deleteWOlabor/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborID'];?>
/1'>remove</a>
                       </div>


                   </div>

               <?php } ?>
               <?php }?>



       </div>
   </div>

   <a name="other" />
   <!-- Other costs -->
   <br />
   <div class="row panel" >
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseFive">

       <h3><span id="womDateDisplay4"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span> Other Costs for <?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
 </h3> </a> </div>

       <!-- / .panel-heading -->
       <div id="collapseFive" class="panel">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOother/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/1"  name="odataform" id="odataform" method="POST">
               <input type="hidden" name="beenhere" value="1">
               <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">

               <input type="hidden" name="jobcostDate" id="jobcostDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
">


              
                   <!-- begin row -->
                   <div class="row" >

                       <div class="col-md-7">
                           <label class="control-label">Description</label><br>
                           <textarea name="jobcostDescription" id="jobcostDescription" class="form-control"></textarea>
                       </div>
                       <div class="col-md-5">
                           <label class="control-label">Cost</label><br/>
                            <input type="text" id="jobcostAmount" name="jobcostAmount"
                                  class="form-control"  style='background:yellow;' >
                       </div>


                   </div>

                
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-5">
                           <a href="Javascript:CHECKITO(this.odataform);" class="btn btn-primary btn-labeled">Add Additional Costs</a>
                       </div>
                   </div>

           </form>

<br/>
           <?php $_smarty_tpl->tpl_vars["ov"] = new Smarty_variable(0, null, 0);?>

                   <?php if ($_smarty_tpl->tpl_vars['other']->value) {?>
                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-6">
                               Description
                           </div>
                           <div class="col-sm-1">
                               Cost
                           </div>
                           <div class="col-sm-2">
                               &nbsp;
                           </div>
                       </div>

                   <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['other']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>

                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-sm-6">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostDescription'];?>

                           </div>

                           <div class="col-sm-1">
                               $<?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostAmount'];?>

                           </div>


                           <div class="col-sm-2">
                               <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deleteWOother/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostID'];?>
/1'>remove</a>
                           </div>


                       </div>

                       <?php $_smarty_tpl->tpl_vars['ov'] = new Smarty_variable($_smarty_tpl->tpl_vars['ov']->value+($_smarty_tpl->tpl_vars['data']->value['jobcostAmount']), null, 0);?>

                   <?php } ?>
                   <?php }?>
               </div>


       </div>
   </div>
<?php }?>
   </div>
</div>
<?php }} ?>
