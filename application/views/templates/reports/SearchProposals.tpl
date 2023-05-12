

<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script src="{$SITE_URL}assets/javascripts/gmap3.min.js"></script>


<script type="text/javascript">

   $( document ).ready(function() {

    //bind actions
       $('#searchEnd').datepicker({
           dateFormat: 'mm-dd-yy'
       });
       $('#searchStart').datepicker({
           dateFormat: 'mm-dd-yy'
       });



   });




   function CHECKIT(form,exprt)
   {
       if(!test(form)){ 
           return;
       }

       if(exprt === 1)
       {

           form.action = "{$SITE_URL}reports/exportProposal/";
           showSpinner('Please wait while we format your report.');
           form.submit();
           myvar = setTimeout("hideSpinner()",5000);
           return;

       }

       showSpinner('Please wait..');
       form.submit();

   }

   function test(form)
   {

       if(form.searchStart.value == '' && form.searchEnd.value == '' &&  form.jobStatus[form.jobStatus.selectedIndex].value == 0 &&  form.jobcntID[form.jobcntID.selectedIndex].value == 0 &&         form.jobCreatedBy[form.jobCreatedBy.selectedIndex].value == 0 &&  form.jobSalesManagerAssigned[form.jobSalesManagerAssigned.selectedIndex].value == 0 &&    form.jobSalesAssigned[form.jobSalesAssigned.selectedIndex].value == 0)
       {
           alert("You must select some criteria for your report. You left all fields blank.");
           return false;

       }


     if(form.searchStart.value == '' || form.searchEnd.value == '')
       {

            if (document.getElementById('quarterlyreport').checked) {
               return true;
                
            }
           alert("You must select a date range for your report. The range must be a year or less");
           return false;

       }
       
       if(form.searchStart.value != '' && form.searchEnd.value != '')
       {

           const date1 = new Date(form.searchStart.value);
           const date2 = new Date(form.searchEnd.value);
           const diffTime = Math.abs(date2 - date1);
           const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
           if(diffDays > 365 || diffDays <= 1) {
                //check dates are less than  a year apart
                alert("You must select a date range for your report. The range must be a year or less: Days" + diffDays);
                form.searchEnd.value ='';
                form.searchStart.value ='';
                return false;
          }

       }
       
       return true;

   }


  



</script>
<div class="panel">
    <div class="panel-heading">

        <h2>Proposals Report</h2>

    </div>

    <div class="panel-heading">
            <form method="post" action="{$SITE_URL}reports/proposal/" id="searchform" name="searchform">
                <input type="hidden" name="beenhere" value="1" />
                <p>
                </p> <p style='border:solid 1px lightblue;width:98%; padding:5px;'>
                    Created For: <select name='jobcntID' id='jobcntID'>
                        <option value="0">Any Client</option>
                        {foreach $clientListCB as $cblist}
                            <option value="{$cblist.cntId}">{$cblist.cntFirstName} {$cblist.cntLastName}</option>
                        {/foreach}
                    </select>
                    &nbsp;

                    Status: <select  name="jobStatus" id="jobStatus">
                        <option value="0">Any</option>
                        <option value="1">Pending</option>
                        <option value="2">Approved</option>
                        <option value="5">Signed</option>
                        <option value="3">Rejected</option>
                    </select>
                    &nbsp;

                    <br/>&nbsp;<br/>
                    <strong>*Required :</strong> Use Quarterly Report: <input type='checkbox' name="quarterlyreport" id="quarterlyreport" value="true"  />  &nbsp;
                    &nbsp; Year <select name="year" id="year">
                          <option>2016</option>
                          <option>2017</option>
                          <option>2018</option>
                          <option>2019</option>
                          <option>2021</option>
                          <option selected>2022</option>
                    </select>
                    &nbsp; Quarter <select name="quarter" id="quarter">
                        <option value='1' selected>1st Quarter</option>
                        <option value='2'>2nd Quarter</option>
                        <option value='3'>3rd Quarter</option>
                        <option value='4'>4th Quarter</option>
                        
                    </select>
                    (Jan1-Mar31 - April1-June30 - July1-Sept30 - October1-Dec31)

                    &nbsp;
                    &nbsp;
                    <br/>&nbsp;<br/>
                    <strong>*OR Date Range :</strong> Created Between: <input type='text' name="searchStart" id="searchStart" value="" size='12' />  &nbsp;
                    &nbsp; and  <input type='text' name="searchEnd" id="searchEnd" value=""  size='12' /> &nbsp; (a year or less)

                </p> <p style='border:solid 1px lightblue;width:98%; padding:5px;'>
               Created By: <select name='jobCreatedBy' id='jobCreatedBy'>
                        <option value="0">Any Staff</option>
                        {foreach $creatorListCB as $cblist}
                            <option value="{$cblist.cntId}">{$cblist.cntFirstName} {$cblist.cntLastName}</option>
                        {/foreach}
                    </select>


                    &nbsp;Sales Manager: <select name='jobSalesManagerAssigned' id='jobSalesManagerAssigned'>
                        <option value="0">Any Manager</option>
                        {foreach $managerListCB as $cblist}
                            <option value="{$cblist.cntId}">{$cblist.cntFirstName} {$cblist.cntLastName}</option>
                        {/foreach}
                    </select>
                    &nbsp;Sales Person: <select name='jobSalesAssigned' id='jobSalesAssigned'>
                        <option value="0">Any Staff</option>
                        {foreach $salesListCB as $cblist}
                            <option value="{$cblist.cntId}">{$cblist.cntFirstName} {$cblist.cntLastName}</option>
                        {/foreach}
                    </select>

                    &nbsp;

                    &nbsp;


                    <a href="Javascript:CHECKIT(this.searchform, 0);" class="btn btn-sm btn-primary btn-labeled"><span class="btn-label icon fa fa-filter"></span> Search</a> &nbsp;

                    <a href="Javascript:CHECKIT(this.searchform, 1);" class="btn btn-sm btn-light-green "><span class="btn-label icon fa fa-save"></span> Export</a>
                </p>
            </form>

    </div>
{IF $beenhere eq 1}
    {IF $proposals}
    <div class="panel-body">

        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th style="width:10%;">Name</th>
                    <th style="width:10%;">Client</th>
                    <th style="width:20%;">Address</th>
                    <th style="width:25%;">Services</th>
                    <th style="width:10%;">Status<br>Cost</th>
                    <th style="width:25%;">Managers</th>

                </tr>
                </thead>
                <tbody>
                {foreach $proposals as $p}
                    {IF $p.jobAlert}
                        <tr class="alert-danger">
                            {ELSE}
                        <tr class="even gradeA">

                    {/IF}
                    <td class="text-left"><a href="{$SITE_URL}workorders/addPOservices/{$p.jobID}"><span class="note-title">{$p.jobName}</span></a><br/>
                    </td>
                    <td class="text-left"><a href="{$SITE_URL}crm/viewContact/{$p.jobcntID}"><span class="note-title">{$p.clientfirst} {$p.clientlast}</span></a></td>
                    <td class="text-left">
                        {$p.jobAddress1}
                        {$p.jobAddress2}
                        <br/>
                        {$p.jobCity}, {$p.jobState}.
                        {$p.jobZip}

                    </td>

                    <td class="text-left">{$p.services}
                    </td>

                    <td class="text-left">
                        <span {IF $p.jobStatus eq 6}class="badge badge-light-green" {ELSEIF $p.jobStatus eq 7} class="badge badge-danger" {ELSE} class="badge badge-info"  {/IF}>{$p.ordStatus}</span>
                        ${$p.totalcost|number_format:2}


                    </td>


                    <td class="text-left">Created On
                        <br/><b>{$p.jobCreatedDateTime|date_format:"%A, %B %e, %Y"}</b>
                        <br />
                        Created by
                        <br/><b>{$p.cntFirstName} {$p.cntLastName}</b><br/>
                            Manager Assigned
                        <br/><b>{$p.managerfirst} {$p.managerlast} </b>
                        <br/>Sales Assigned<br/>
                        <b>{$p.salesfirst} {$p.saleslast}</b>
                        <br />
                        Last updated
                        <br/><b>{$p.JobLastUpdated|date_format:"%A, %B %e, %Y"}</b>
                    </td>
                    <!--
                    <td class="text-left">{$p.JobLastUpdated|date_format:"%A, %B %e, %Y"}</td>
                    -->
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>

    </div>


    {/IF}
{/IF}
<div aria-hidden="true" role="dialog" tabindex="-1" id="googleMapModal" class="modal fade bootstrap-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                <h4 class="modal-title" id="googleMapModalTitle">Map</h4>
            </div>
            <div class="modal-body" id="googleMapModalText">
                <div id="googleMapContainer"></div>
            </div>
        </div>
    </div>
</div>
<a id="triggerGoogleMapModal" href="#googleMapModal" data-toggle="modal"></a>

<script>
    {literal}
    var fullAddress,
            encAddress,
            locName;

    function showUserOnMap(userName, userAddress)
    {
        fullAddress = userAddress;
        encAddress = fullAddress.replace(/(\s+)/g, '+');
        encAddress = fullAddress.replace(/,/g, '');
        locName = userName;

        $('#googleMapModalTitle').text(locName);

        $('#triggerGoogleMapModal').click();
    }

    $(document).ready(function(){

        $("#googleMapModal").on('shown.bs.modal', function(){
            $.post(
                    'https://maps.googleapis.com/maps/api/geocode/json?address='+ encAddress +'&sensor=false',
                    function(response){
                        if (response.status == 'OK' && typeof response.results[0].geometry.location.lat != 'undefined' && typeof response.results[0].geometry.location.lng != 'undefined') {
                            var mapLatitude = response.results[0].geometry.location.lat,
                                    mapLongitude = response.results[0].geometry.location.lng,
                                    infowindow = '<p><strong>' + locName + '</strong><br />' + fullAddress + '<p>';

                            $("#googleMapContainer").gmap3({
                                map:{
                                    options: {
                                        center: [mapLatitude, mapLongitude],
                                        zoom: 13
                                    }
                                },
                                marker:{
                                    values: [{
                                        latLng: [mapLatitude, mapLongitude],
                                        data: infowindow
                                    }],
                                    options:{
                                        draggable: false
                                    },
                                    events:{
                                        mouseover: function(marker, event, context){
                                            var map = $(this).gmap3("get"),
                                                    infowindow = $(this).gmap3({get: {name: "infowindow"}});
                                            if (infowindow){
                                                infowindow.open(map, marker);
                                                infowindow.setContent(context.data);
                                            } else {
                                                $(this).gmap3({
                                                    infowindow:{
                                                        anchor:marker,
                                                        options:{content: context.data}
                                                    }
                                                });
                                            }
                                        }
                                    }
                                }
                            });
                        } else {
                            alert('Sorry. The address could not be resolved.');
                        }
                    }
            );
        });
    });
</script>

{/literal}
