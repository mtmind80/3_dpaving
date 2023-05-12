<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-13 09:24:59
         compiled from "application/views/templates/workorders/woServiceDailyRep.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7787383355ad0bdbbb81169-06928114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd53971a9a7a0ec9ae28f226853be20bf77681d77' => 
    array (
      0 => 'application/views/templates/workorders/woServiceDailyRep.tpl',
      1 => 1497341083,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7787383355ad0bdbbb81169-06928114',
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
    'details' => 0,
    'proposal' => 0,
    'services' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
    'sid' => 0,
    'USER_ID' => 0,
    'nightly' => 0,
    'n' => 0,
    'materialvendors' => 0,
    'materials' => 0,
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
  'unifunc' => 'content_5ad0bdbc241e50_89277148',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ad0bdbc241e50_89277148')) {function content_5ad0bdbc241e50_89277148($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.replace.php';
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

    <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderwizrdmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


   <div class="panel-body">




   <div id="Proposalheader">
       <h2>End of Day Report</h2>
       <h4>Enter Any Additional Costs</h4>

       </h2><h2><?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
 <?php if ($_smarty_tpl->tpl_vars['details']->value['jordStatus']=="COMPLETED") {?><span class='alert-info'>COMPLETED</span><?php }?></h2>
       <h3>Work Order: <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['proposal']->value['jobMasterNumber']);?>
</h3>

   </div>

   <!--
       <div class="panel-heading" style="background:<?php echo $_smarty_tpl->tpl_vars['services']->value['catcolor'];?>
;">
           <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
 -
               <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceName'];?>

       </div>
-->
   <!-- begin row -->

       <div class="row panel"  style='border:1px #000000 solid;'>

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
                       Client:<?php echo $_smarty_tpl->tpl_vars['proposal']->value['clientfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['clientlast'];?>

                       <br />
                       Location:
                       <?php if ($_smarty_tpl->tpl_vars['details']->value['jordAddress1']!='') {?>
                       <a href="Javascript:showUserOnMap('<?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
', '<?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress1'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress2'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
. <?php echo $_smarty_tpl->tpl_vars['details']->value['jordZip'];?>
');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                       <a href="https://www.google.com/#q=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['details']->value['jordAddress1'],' ','+');?>
+<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['details']->value['jordCity'],' ','+');?>
+<?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
+<?php echo $_smarty_tpl->tpl_vars['details']->value['jordZip'];?>
" title="Directions" target="Drive"><span class=" icon fa fa-truck"></span></a> &nbsp;
                       <?php }?>

                       <br/>


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
               <div class="col-sm-7">
                           <strong>NOTES:</strong>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpProposalTextAlt'];?>


               </div>           </div>
           <!-- row -->
       </div>


       <div class="row panel"  style='border:1px #000000 solid;'>

       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveWODaily/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="dataform" id="dataform"  method="POST">
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
           <h3>Nightly CheckList  <span id="womMainDateDisplay"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3>
           <br/>Make sure all items are checked off on the Truck before leaving

           <div class="row">
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

       <div class="row">
           <div class="col-sm-7">
               Note: Anything Broken or Missing
           </div>
       </div>

       <div class="row">
           <div class="col-sm-7">
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

   <!-- buton row -->
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
   <?php if ($_smarty_tpl->tpl_vars['nightly']->value) {?>
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
','You are about to delete this nightly report. Are you sure?');">remove</a>
        </div>

    </div>
<?php } ?>
<?php } else { ?>
<?php echo '<script'; ?>
>
    alert("The report date will default to today's date: <?php echo $_smarty_tpl->tpl_vars['CurrentDate']->value;?>
 ");
<?php echo '</script'; ?>
>
   <?php }?>

   <!-- Materials -->
   <br />
   <a name="materials" />
   <div class="row panel"  style='border:1px #000000 solid;'>

       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseTwo">
               <h3>Material Usage <span id="womDateDisplay5"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3></a> </div>
       <!-- / .panel-heading -->
       <div id="collapseTwo" class="panel">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOMaterial/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="mdataform" id="mdataform" method="POST">
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
           <br/>
           <?php $_smarty_tpl->tpl_vars["tv"] = new Smarty_variable(0, null, 0);?>
               <?php if ($_smarty_tpl->tpl_vars['materials']->value) {?>
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-3">

                           Material
                       </div>
                       <div class="col-sm-2">
                           Vendor
                       </div>
                       <div class="col-sm-2">
                           Date
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

                       <div class="col-sm-3">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['matName'];?>

                       </div>
                       <div class="col-sm-2">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>

                       </div>
                       <div class="col-sm-2">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['womatDate'];?>

                       </div>

                       <div class="col-sm-1">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['womatAmount'];?>

                       </div>

                       <div class="col-sm-2">
                           <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deleteWOMaterial/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['womatID'];?>
'>remove</a>
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
   <div class="row panel"  style='border:1px #000000 solid;'>

       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseTwo">
               <h3>Vehicle Usage <span id="womDateDisplay"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3></a> </div>
       <!-- / .panel-heading -->
       <div id="collapseTwo" class="panel">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOvehicle/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="vdataform" id="vdataform" method="POST">
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
           <br/>
           <?php if ($_smarty_tpl->tpl_vars['vehicles']->value) {?>
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-3">

                           Vehicle
                       </div>
                       <div class="col-sm-3">
                           Date
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


                   <div class="row" >

                       <div class="col-sm-3">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['vehicleName'];?>

                       </div>
                       <div class="col-sm-3">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['POVDate'];?>

                       </div>

                       <div class="col-sm-2">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['POVHoursUsed'];?>

                       </div>



                       <div class="col-sm-2">
                           <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deleteWOVehicle/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['POVID'];?>
'>remove</a>
                       </div>


                   </div>


               <?php } ?>
               <?php }?>

       </div>
   </div>


   <!-- end vehicle form -->
   <br />
   <a name="equipment" />
   <div class="row panel"  style='border:1px #000000 solid;'>
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseThree">

               <h3>Equipment Usage <span id="womDateDisplay2"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3></a> </div>

       <!-- / .panel-heading -->
       <div id="collapseThree" class="panel">
           <!-- begin row -->

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOequipment/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="edataform" id="edataform" method="POST">
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
                       <div class="col-sm-2">
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

                       <div class="col-sm-2">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipHours'];?>

                       </div>

                       <div class="col-sm-2">
                           <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deleteWOEquipment/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['POequipID'];?>
'>remove</a>
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

   <div class="row panel"  style='border:1px #000000 solid;'>
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseFour">
               <h3>Record Labor <span id="womDateDisplay3"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3> </a> </div>
       <!-- / .panel-heading -->
       <div id="collapseFour" class="panel">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOlabor/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="ldataform" id="ldataform" method="POST">
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
                       <div class="col-sm-4">
                        Employee
                       </div>
                       <div class="col-sm-2">
                           DATE
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

                       <div class="col-sm-4">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>

                       </div>

                       <div class="col-sm-2">
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['POlaborDate'],"%m/%d/%Y");?>

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
'>remove</a>
                       </div>


                   </div>

               <?php } ?>
               <?php }?>



       </div>
   </div>

   <a name="other" />
   <!-- Other costs -->
   <br />
   <div class="row panel"  style='border:1px #000000 solid;'>
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseFive">

       <h3>Other Costs <span id="womDateDisplay4"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>
</span></h3> </a> </div>

       <!-- / .panel-heading -->
       <div id="collapseFive" class="panel">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addWOother/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="odataform" id="odataform" method="POST">
               <input type="hidden" name="beenhere" value="1">
               <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">

               <input type="hidden" name="jobcostDate" id="jobcostDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
">


               <div class="row " >

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
                       <div class="col-sm-4">
                           <a href="Javascript:CHECKITO(this.odataform);" class="btn btn-primary btn-labeled">Add Additional Costs</a>
                       </div>
                   </div>
<br/>

                   <?php $_smarty_tpl->tpl_vars["ov"] = new Smarty_variable(0, null, 0);?>

                   <?php if ($_smarty_tpl->tpl_vars['other']->value) {?>
                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-2">
                               Date
                           </div>
                           <div class="col-sm-5">
                               Description
                           </div>
                           <div class="col-sm-2">
                               Cost
                           </div>
                           <div class="col-sm-2">

                           </div>
                       </div>

                   <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['other']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>

                       <!-- begin row -->
                       <div class="row" >


                           <div class="col-sm-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostDate'];?>

                           </div>
                           <div class="col-sm-5">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostDescription'];?>

                           </div>

                           <div class="col-sm-2">
                               $<?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostAmount'];?>

                           </div>


                           <div class="col-sm-2">
                               <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deleteWOother/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostID'];?>
'>remove</a>
                           </div>


                       </div>

                       <?php $_smarty_tpl->tpl_vars['ov'] = new Smarty_variable($_smarty_tpl->tpl_vars['ov']->value+($_smarty_tpl->tpl_vars['data']->value['jobcostAmount']), null, 0);?>

                   <?php } ?>
                   <?php }?>
                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-4">
                           <label class="control-label">Total Additional Cost</label>
                       </div>

                       <div class="col-sm-4">
                           <input type="text" id="POOtherTotal" name="POOtherTotal"
                                  class="form-control"   style='background:lightblue;' value="<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['ov']->value);?>
" disabled>
                       </div>
                   </div>

               </div>


           </form>
       </div>
   </div>

   </div>
</div>
<?php }} ?>
