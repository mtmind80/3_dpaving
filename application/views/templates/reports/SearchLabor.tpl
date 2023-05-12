

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
       if(!test(form)){ return;
       }

       if(exprt === 1)
       {

           form.action = "{$SITE_URL}reports/exportLabor/";
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


       if(form.searchStart.value == '' || form.searchEnd.value == '')
       {
           alert("You must select a date range for your report. You left those fields blank.");
           return false;
       }

       return true;

   }





</script>
<div class="panel">
    <div class="panel-heading">

        <h2>Labor Report</h2>

    </div>

    <div class="panel-heading">
            <form method="post" action="{$SITE_URL}reports/labor/" id="searchform" name="searchform">
                <input type="hidden" name="beenhere" value="1" />
                <p>
                </p> <p style='border:solid 1px lightblue;width:98%; padding:5px;'>
                    Employee: <select name='POEmpID' id='POEmpID'>
                        <option value="0">All Employees</option>
                        {foreach $empListCB as $cblist}
                            <option value="{$cblist.cntId}">{$cblist.cntFirstName} {$cblist.cntLastName}</option>
                        {/foreach}
                    </select>
                    &nbsp;

                    Start Date: <input type='text' name="searchStart" id="searchStart" value="" size='12' />  &nbsp;
                    &nbsp; End Date <input type='text' name="searchEnd" id="searchEnd" value=""  size='12' />

                    &nbsp;     &nbsp;
                    Summary <input type='radio' name='searchtype' value='0' checked>
                    &nbsp;Detail <input type='radio' name='searchtype' value='1'>
                    &nbsp;    &nbsp;
                    <a href="Javascript:CHECKIT(this.searchform,0);" class="btn btn-sm btn-primary btn-labeled"><span class="btn-label icon fa fa-filter"></span> Search</a> &nbsp;
                    <a href="Javascript:CHECKIT(this.searchform,1);" class="btn btn-sm btn-light-green "><span class="btn-label icon fa fa-save"></span> Export</a>
               </p>
            </form>

    </div>
    {assign var="td" value="0"}
{IF $beenhere eq 1}
    {IF $data}
    Showing : {$searchStart} through {$searchEnd}
    <div class="panel-body">
{IF $searchtype eq 0}
        SUMMARY
    {*summary*}
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th>Employee</th>
                    <th>Hours</th>

                </tr>
                </thead>
                <tbody>
                {foreach $data as $p}
                     <tr class="even gradeA">
                    <td class="text-left">{$p.cntFirstName} {$p.cntLastName}</td>
                    <td class="text-left">{$p.diff/3600}</td>
                    </tr>
                {$td = $td + $p.diff}
                {/foreach}

                <tr class="even gradeA">
                    <td class="text-left">Total</td>

                    <td class="text-left">{$td/3600}</td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>
{ELSE}
    {*list*}
    <div class="table-primary">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
            <thead>
            <tr>
                <th>Employee</th>
                <th>Work Order</th>
                <th>Job</th>
                <th>Date</th>
                <th>Hours</th>

            </tr>
            </thead>
            <tbody>
            {foreach $data as $p}
                <tr class="even gradeA">
                    <td class="text-left">{$p.cntFirstName} {$p.cntLastName}</td>

                    <td class="text-left">{$p.jobMasterYear}-{$p.jobMasterMonth}-{"%05d"|sprintf:$p.jobMasterNumber}<br/>
                        <a href="{$SITE_URL}workorders/WOPreview/{$p.jordjobID}"><span class="note-title">{$p.jobName}</span></a><br/>
                    </td>
                    <td class="text-left">{$p.jordName}</td>

                    <td class="text-left">{$p.POlaborDate|date_format:"%m/%d/%Y"}</td>

                    <td class="text-left">{$p.diff/3600}</td>
                </tr>
                {$td = $td + $p.diff}
            {/foreach}

            <tr class="even gradeA">
                <td class="text-left">Total</td>

                <td class="text-left"></td>

                <td class="text-left"></td>

                <td class="text-left">{$td/3600}</td>
            </tr>

            </tbody>
        </table>
    </div>

</div>

{/IF}

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
