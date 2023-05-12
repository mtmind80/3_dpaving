
<script type="text/javascript">


{* Job manager uses this to get to daily rep from dashboard *}
init.push(function () {



    $('#bs-datepicker-component').datepicker({
        dateFormat: 'mm-dd-yy'
    });


    SetDate('{$CurrentDate|date_format:"%m/%d/%Y"}');
});


var equipArr = new Array();



{assign var="i" value =0}



equipArr[0] = new Array(3);

equipArr[0][0] = "0";
equipArr[0][1] = "0";
equipArr[0][2] = "0";

{foreach $equipmentlist as $data}

{$i = $i + 1}
equipArr[{$i}] = new Array(3);

equipArr[{$i}][0] = "{$data['equipCost']}";
equipArr[{$i}][1] = "{$data['equipMinCost']}";
equipArr[{$i}][2] = "{$data['equipRate']}";


{/foreach}


var matcost = new Array();
{foreach $materialslist as $m}

matcost[{$m.omatMatID},0] = '{$m.omatName}';
matcost[{$m.omatMatID},1] = {$m.omatCost};

{/foreach}

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

{foreach $vehiclelist as $data}

MyCostArr.push("{$data['vtypeRate']}");

{/foreach}


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

    {literal}

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

    {/literal}





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



</script>


{assign var="mdate" value=''}
{assign var="tdate" value=$CurrentDate|date_format:"%Y%m%d"}



<div class="panel">

   <div class="panel-body">

   <a href="{$SITE_URL}workorders/showServiceList/" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-plus"></span>Scheduled Services</a>


   <div id="Proposalheader">
       <h2>End of Day  CheckList For:  {$details.jordName} </h2>
       <h3>Job Manager {$USER_FULLNAME}</h3>
       Complete end of day checklist, and save it. Enter daily usage of materials, equipment, labor and any other costs.

       </h2>{$details.jordName} {IF $details.jordStatus eq "COMPLETED"}<span class='alert-info'>COMPLETED</span>{/IF}</h2>

   </div>
   <!--
       <div class="panel-heading" style="background:{$services.catcolor};">
           {$details['cmpServiceCat']} -
               {$details['cmpServiceName']}
       </div>
-->
   {IF $details.jordStatus neq "COMPLETED"}
   <!-- begin row -->

       <div class="row panel"  style='border:none;'>

<form id="selectdate">

    <div class="row alert">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Set Report Date</label>
                       <div class="input-group date large" id="bs-datepicker-component">
                           <input type="text" id="setwomDate" name="setwomDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}"
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
                       {$details['jordAddress1']}
                       &nbsp;
                       {$details['jordAddress2']}
                       <br />
                       {$details['jordCity']},
                       {$details['jordState']}.
                       {$details['jordZip']}

                       <br />
                       Parcel: {$details['jordParcel']}
                       <br />
                       Start Date: {$details['jordStartDate']|date_format:"%A, %B %e, %Y"}

                       <br />
                       End Date: {$details['jordEndDate']|date_format:"%A, %B %e, %Y"}

                   </div>
               </div>
               <div class="col-sm-6">
                   <!--
                   <strong>SERVICE NOTES:</strong>
                   {$details.cmpProposalTextAlt}
                -->
               </div>
            </div>
           <!-- row -->
       </div>


       <div class="row panel"  >

       <form action="{$SITE_URL}workorders/saveWODaily/{$pid}/{$sid}/1"  name="dataform" id="dataform"  method="POST">
       <input type="hidden" name="sid" id="sid" value="{$sid}">
       <input type="hidden" name="pid" id="pid" value="{$pid}">
       <input type="hidden" name="womjordID" id="womjordID" value="{$details.jordID}">
       <input type="hidden" name="womCreatedby" id="womCreatedby" value="{$USER_ID}">
       <input type="hidden" id="womDate" name="womDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}">

           <h3>Nightly CheckList <span id="womMainDateDisplay">{$CurrentDate|date_format:"%A, %B %e, %Y"}</span></h3>
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
   {IF $nightly}
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

{foreach $nightly as $n}
    <!-- buton row -->
    <div class="row">

        <div class="col-sm-1">

 <span class="alert-info"><a href="{$SITE_URL}workorders/printNightlyRep/{$n.womID}">Print</a></span>


        </div>
        <div class="col-sm-2">
            {$n.womDate}
        </div>

        <div class="col-sm-3">
            {$n.cntFirstName}    {$n.cntLastName}
        </div>
        <div class="col-sm-4">
            {$n.womNote}
        </div>
        <div class="col-sm-2">
            <a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/deleteWONightly/{$pid}/{$sid}/{$n.womID}/1','You are about to delete this nightly report. Are you sure?');">remove</a>
        </div>

    </div>
{/foreach}

   {ELSE}
<script>
    alert("The report date will default to today's date: {$CurrentDate|date_format:"%A, %B %e, %Y"} ");
</script>
   {/IF}

   <!-- Materials -->
   <br />
   <a name="materials" />
   <div class="row panel" >

       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseTwo">
               <h3><span id="womDateDisplay5">{$CurrentDate|date_format:"%A, %B %e, %Y"}</span> Material Usage for {$details.jordName}</h3></a> </div>
       <!-- / .panel-heading -->
       <div id="collapseTwo" class="panel">

           <form action="{$SITE_URL}workorders/addWOMaterial/{$pid}/{$sid}/1"  name="mdataform" id="mdataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="womatDate" id="womatDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}">
               <input type="hidden" name="womatCost" id="womatCost" value="">
               <input type="hidden" name="sid" id="sid" value="{$sid}">
               <input type="hidden" name="pid" id="pid" value="{$pid}">
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
                           {foreach $materialslist as $data}
                               <option value="{$data['omatMatID']}">{$data['omatName']} </option>
                           {/foreach}
                       </select>
                   </div>
                   <div class="col-sm-4">
                       <select name="womatVendorID" id="womatVendorID" >
                           <option value="0">Select Vendor</option>
                           {foreach $materialvendors as $data}
                               <option value="{$data['cntId']}">{$data['cntFirstName']} {$data['cntLastName']} </option>
                           {/foreach}
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
               {assign var="tv" value=0}
               {IF $materials}
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


               {foreach $materials as $data}
                   <div class="row" >

                       <div class="col-sm-2">
                           {$data['womatDate']}
                       </div>
                       <div class="col-sm-3">
                           {$data['matName']}
                           {$tdate}
                           {$mdate}
                       </div>
                       <div class="col-sm-2">
                           {$data['cntFirstName']} {$data['cntLastName']}
                       </div>

                       <div class="col-sm-1">
                           {$data['womatAmount']}
                       </div>

                       <div class="col-sm-2">
                           <a href='{$SITE_URL}workorders/deleteWOMaterial/{$pid}/{$sid}/{$data['womatID']}/1'>remove</a>
                       </div>


                   </div>

               {/foreach}
               {/IF}
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
               <h3><span id="womDateDisplay">{$CurrentDate|date_format:"%A, %B %e, %Y"}</span> Vehicle Usage for {$details.jordName}</h3></a> </div>
       <!-- / .panel-heading -->
       <div id="collapseTwo" class="panel">

           <form action="{$SITE_URL}workorders/addWOvehicle/{$pid}/{$sid}/1"  name="vdataform" id="vdataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="POVDate" id="POVDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}">
               <input type="hidden" name="POVRate" id="POVRate" value="">
               <input type="hidden" name="sid" id="sid" value="{$sid}">
               <input type="hidden" name="pid" id="pid" value="{$pid}">
               <input type="hidden" name="POVjordID" id="POVjordID" value="{$pid}">
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

<script>
$(document).ready(function(){
  $('.vehicleChk').click(function(){
    if($(this).is(':checked')){
      $(this).parent().parent().find('.textvehicle').show();
    }else{
      $(this).parent().parent().find('.textvehicle').hide();
    }
  });
});
</script>
               <!-- begin row -->
                   <div class="funkyradio">
                    {foreach $vehiclelist as $data}
                    <div class="funkyradio-success">
                      <div class="row" style="margin-top:10px;">
                        <div class="col-md-6">
                          <input type="checkbox" class="vehicleChk" name="vehi[{$data['vehicleID']}]" id="vehi_{$data['vehicleID']}"  value="1" />
                          <label for="vehi_{$data['vehicleID']}" style="margin-top:0;">{$data['vehicleName']}</label>
                        </div>
                        <div class="col-md-6" style="clear: none;">
                           <input type="text" id="POVHoursUsed_{$data['vehicleID']}" class="textvehicle form-control" name="POVHoursUsed[{$data['vehicleID']}]"
                                 style='background:yellow;display:none;' >
                        </div>
                      </div>
                    </div>
                    {/foreach}
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
           {IF $vehicles}
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


               {foreach $vehicles as $data}

                   <!-- begin row -->
                   <div class="row" >

                       <div class="col-sm-3">
                           {$data['POVDate']}
                       </div>
                       <div class="col-sm-3">
                           {$data['vehicleName']}
                       </div>

                       <div class="col-sm-2">
                           {$data['POVHoursUsed']}
                       </div>



                       <div class="col-sm-2">
                           <a href='{$SITE_URL}workorders/deleteWOVehicle/{$pid}/{$sid}/{$data['POVID']}/1'>remove</a>
                       </div>


                   </div>

               {/foreach}
               {/IF}
       </div>
   </div>


   <!-- end vehicle form -->
   <br />
   <a name="equipment" />
   <div class="row panel"  >
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseThree">

               <h3><span id="womDateDisplay2">{$CurrentDate|date_format:"%A, %B %e, %Y"}</span> Equipment Usage for {$details.jordName}</h3></a> </div>

       <!-- / .panel-heading -->
       <div id="collapseThree" class="panel">
           <!-- begin row -->

           <form action="{$SITE_URL}workorders/addWOequipment/{$pid}/{$sid}/1"  name="edataform" id="edataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="POequipDate" id="POequipDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}">
               <input type="hidden" name="POEquipCost" id="POEquipCost" value="">
               <input type="hidden" name="POEquipRate" id="POEquipRate" value="">

               <input type="hidden" name="sid" id="sid" value="{$sid}">
               <input type="hidden" name="pid" id="pid" value="{$pid}">
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
                    {foreach $equipmentlist as $data}
                    <div class="funkyradio-success">
                      <div class="row" style="margin-top:10px;">
                        <div class="col-md-4">
                          <input type="checkbox" class="vehicleChk" name="equi[{$data['equipID']}]" id="equi_{$data['equipID']}"  value="1" />
                          <label for="equi_{$data['equipID']}" style="margin-top:0;">{$data['equipName']} {$data['equipRate']}</label>
                        </div>
                        <div class="col-md-4" style="clear: none;">
                           <input type="text" id="POequipNumber_{$data['equipID']}" class="textvehicle form-control" name="POequipNumber[{$data['equipID']}]"
                                 style='background:yellow;display:none;' >
                        </div>
                         <div class="col-md-4" style="clear: none;">
                           <input type="text" id="POequipHours_{$data['equipID']}" class="textvehicle form-control" name="POequipHours[{$data['equipID']}]"
                                 style='background:yellow;display:none;' >
                        </div>
                      </div>
                    </div>
                    {/foreach}
                  </div>

               <!-- <div class="row" >
                   <div class="col-sm-6">

                       <select name="POequipEquipmentID" id="POequipEquipmentID" onChange="Javascript:setEquipCost(this.form);">
                           <option value="0">Select Equipment</option>

                           {foreach $equipmentlist as $data}
                               <option value="{$data['equipID']}">{$data['equipName']} {$data['equipRate']}</option>
                           {/foreach}
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
           {IF $equipment}
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

               {foreach $equipment as $data}


                   <div class="row" >
                       <div class="col-sm-2">
                           {$data['POequipDate']}
                       </div>
                       <div class="col-sm-4">
                           {$data['equipName']}
                       </div>

                       <div class="col-sm-2">
                           {$data['POequipNumber']}
                       </div>

                       <div class="col-sm-1">
                           {$data['POequipHours']}
                       </div>

                       <div class="col-sm-2">
                           <a href='{$SITE_URL}workorders/deleteWOEquipment/{$pid}/{$sid}/{$data['POequipID']}/1'>remove</a>
                       </div>


                   </div>

               {/foreach}
               {/IF}

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
               <h3><span id="womDateDisplay3">{$CurrentDate|date_format:"%A, %B %e, %Y"}</span> Record Labor for {$details.jordName}</h3> </a> </div>
       <!-- / .panel-heading -->
       <div id="collapseFour" class="panel">

           <form action="{$SITE_URL}workorders/addWOlabor/{$pid}/{$sid}/1"  name="ldataform" id="ldataform" method="POST">
               <input type="hidden" name="beenhere" value="1">
               <input type="hidden" name="sid" id="sid" value="{$sid}">
               <input type="hidden" name="pid" id="pid" value="{$pid}">
               <input type="hidden" name="POlaborDate" id="POlaborDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}">

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
                           {foreach $laborlist as $data}
                               <option value="{$data['cntId']}">{$data['cntFirstName']} {$data['cntLastName']}</option>
                           {/foreach}
                       </select>
                   </div>
                   <div class="col-sm-2">
                       <select name="POlaborStartTime" id ="POlaborStartTime">
                           {foreach $timevalues as $data}
                               <option value="{$data['timevalue']}">{$data['timevalue']|date_format:"%I:%M %p"}</option>
                           {/foreach}
                       </select>

                   </div>
                   <div class="col-sm-2">
                       <select name="POlaborEndTime" id ="POlaborEndTime">
                           {foreach $timevalues as $data}
                               <option value="{$data['timevalue']}">{$data['timevalue']|date_format:"%I:%M %p"}</option>
                           {/foreach}
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
               {IF $labor}
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

               {foreach $labor as $data}
                   <!-- begin row -->


                   <div class="row" >

                       <div class="col-sm-2">
                           {$data['POlaborDate']|date_format:"%m/%d/%Y"}
                       </div>
                       <div class="col-sm-4">
                           {$data['cntFirstName']} {$data['cntLastName']}
                       </div>

                       <div class="col-sm-2">
                           {$data['POlaborStartTime']|date_format:"%I:%M %p"}
                       </div>
                       <div class="col-sm-2">
                           {$data['POlaborEndTime']|date_format:"%I:%M %p"}
                       </div>

                       <div class="col-sm-2">
                           <a href='{$SITE_URL}workorders/deleteWOlabor/{$pid}/{$sid}/{$data['POlaborID']}/1'>remove</a>
                       </div>


                   </div>

               {/foreach}
               {/IF}



       </div>
   </div>

   <a name="other" />
   <!-- Other costs -->
   <br />
   <div class="row panel" >
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);">
           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseFive">

       <h3><span id="womDateDisplay4">{$CurrentDate|date_format:"%A, %B %e, %Y"}</span> Other Costs for {$details.jordName} </h3> </a> </div>

       <!-- / .panel-heading -->
       <div id="collapseFive" class="panel">

           <form action="{$SITE_URL}workorders/addWOother/{$pid}/{$sid}/1"  name="odataform" id="odataform" method="POST">
               <input type="hidden" name="beenhere" value="1">
               <input type="hidden" name="sid" id="sid" value="{$sid}">
               <input type="hidden" name="pid" id="pid" value="{$pid}">

               <input type="hidden" name="jobcostDate" id="jobcostDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}">


              
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
           {assign var="ov" value=0}

                   {IF $other}
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

                   {foreach $other as $data}

                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-sm-6">
                               {$data['jobcostDescription']}
                           </div>

                           <div class="col-sm-1">
                               ${$data['jobcostAmount']}
                           </div>


                           <div class="col-sm-2">
                               <a href='{$SITE_URL}workorders/deleteWOother/{$pid}/{$sid}/{$data['jobcostID']}/1'>remove</a>
                           </div>


                       </div>

                       {$ov = $ov + ($data['jobcostAmount'])}

                   {/foreach}
                   {/IF}
               </div>


       </div>
   </div>
{/IF}
   </div>
</div>
