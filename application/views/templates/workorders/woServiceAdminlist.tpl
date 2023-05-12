
<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<script src="https://maps.googleapis.com/maps/api/js?v=2&key=AIzaSyB9snLiu1GX5LRjrzXSZ4OIL8RRsmXKTGs" type="text/javascript"></script>
<style>
    #map_canvas {
        height: 600px;
        width: 600px;
        margin: 50px auto;
        padding: 0px;
        position: absolute;
        top: 1em;
        right: 1em;
        z-index:1000;
        display:none;
    }
</style>
<script>
    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" }
        }  );
        //$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');


        $("#selectall").click(function(){
            //alert("just for check");
            if(this.checked){
                $('.checkboxall').each(function(){
                    this.checked = true;


                })
            }else{
                $('.checkboxall').each(function(){
                    this.checked = false;


                })
            }
        });

    });


    function Swoop(dURL)
    {
        window.open(dURL, "MsgWindow", "width=600,height=600,scrollbars=yes");

    }

    $(document).ready(function() {


        $( "#showadvanced" ).click(function() {
            $("#advancedsearch").show();
        });

        $( "#hideadvanced" ).click(function() {
            $("#advancedsearch").hide();
        });


         var locations = [];

        var geocoder;
        var map;
        var bounds = new google.maps.LatLngBounds();

        function initialize(locations) {
            map = new google.maps.Map(
                    document.getElementById("map_canvas"), {
                        //center: new google.maps.LatLng(37.4419, -122.1419),
                        zoom: 16,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
            );
            geocoder = new google.maps.Geocoder();
        if(locations.length <= 8 )
        {
            for (i = 0; i < locations.length; i++)
            {
                geocodeAddress(locations, i);

            }
        }
        else
        {
            alert("No more than 8 addresses at a time");
            for (i = 0; i < 8; i++)
            {
                geocodeAddress(locations, i);

            }
        }

        }

        function geocodeAddress(locations, i) {
            var title = locations[i][0];
            var address = locations[i][1];
            var url = locations[i][2];
            geocoder.geocode({
                        'address': locations[i][1]
                    },
                    function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            var marker = new google.maps.Marker({
                                //  icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                                map: map,
                                position: results[0].geometry.location,
                                title: title,
                                animation: google.maps.Animation.DROP,
                                address: address,
                                url: url
                            })
                            infoWindow(marker, map, title, address, url);
                            bounds.extend(marker.getPosition());
                            map.fitBounds(bounds);
                        } else {
                            alert("geocode of " + address + " failed:" + status);
                        }
                    });
        }

        function infoWindow(marker, map, title, address, url) {
            google.maps.event.addListener(marker, 'click', function() {
                var html = "<div><h3>" + title + "</h3><p>" + address + "<br></div><a href='" + url + "'>View location</a></p></div>";
                iw = new google.maps.InfoWindow({
                    content: html,
                    maxWidth: 350
                });
                iw.open(map, marker);
            });
        }

        function createMarker(results) {
            var marker = new google.maps.Marker({
                //icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                map: map,
                position: results[0].geometry.location,
                title: title,
                animation: google.maps.Animation.DROP,
                address: address,
                url: url,
                icon: image
            })
            bounds.extend(marker.getPosition());
            map.fitBounds(bounds);
            infoWindow(marker, map, title, address, url);
            return marker;
        }



        $( "#hidemap" ).click(function() {

            $("#map_canvas").fadeOut();
        });


        $( "#showmap" ).click(function() {
           // alert('we are here');

            locations = [];


            $("#jq-datatables-example input:checkbox:checked").map(function(){

                arr = [];
                var fullAddress;
                var encAddress;
                fullAddress = $(this).attr("data-address");
                fullAddress.replace(/(\s+)/g, '+');
                encAddress = fullAddress.replace(/,/g, '');
                arr.push($(this).attr("data-title"));
                arr.push(encAddress);
                arr.push("URL");
                arr.push([]);

                locations.push(arr);
            });

            if(locations.length == 0 )
            {
                alert('Select an address to map.');
                return
            }
            initialize(locations);
            if(initialize ==0)
            {
                return false;
            }
            //google.maps.event.addDomListener(document.getElementById("render_map"), "click", initialize);

            $("#map_canvas").fadeIn();
           console.log(locations);
        });

    });

</script>
<!-- / Javascript -->
<div class="panel">
    <div class="panel-heading">


        <div id="map_canvas" style="border: 2px solid #3872ac;"></div>

        <h2>Work Order Scheduled Services</h2>
        <span id="showadvanced" style='cursor: pointer;'>Show Advanced Filters  </span> &nbsp; &nbsp;
        <span style='font-size:0.8EM;font-style:italic;color:darkblue;'>records found:{$count}</span>
        &nbsp; &nbsp;
            <div id="aamarine" style="float:right;margin-top:-20px;">
            <span id="showmap" class="btn btn-primary" style='cursor: pointer;'>Show Map  </span> &nbsp; &nbsp;
            <span id="hidemap" class="btn btn-primary" style='cursor: pointer;'>Hide Map  </span> &nbsp; &nbsp;
            </div>
    </div>

 <div  id='advancedsearch'>
    <form method="post" action="{$SITE_URL}workorders/showAdminServiceList" id='filter'>
        <div class="panel">
        <input type="hidden" id='beenhere' name='beenhere' value='1'>
    <div class="row">
        <div class="col-sm-4">
             Status: 
            <select class="form-control" name="status" id="status">
                <option value="0" selected>ANY</option>
                {foreach $STATUS_CB as $select}
                    <option value="{$select['OrderStatus']}">{$select['OrderStatus']}</option>
                {/foreach}
            </select>
        </div>
        <div class="col-sm-4">
             Job Manager: 
            <select class="form-control"  multiple="multiple" name="jobmanagerid[]" id="jobmanagerid">
                <option value="0" selected>ANY</option>
                {foreach $JOB_MANAGERS_CB as $select}
                    <option value="{$select['ID']}">{$select['FULL_NAME']}</option>
                {/foreach}

            </select>
        </div>
        <div class="col-sm-4">
             Estimator: 
            <select class="form-control"  multiple="multiple"  name="salesmanagerid[]" id="jsalesmanagerid">
                <option value="0" selected>ANY</option>
                {foreach $SALES_MANAGERS_CB as $select}
                    <option value="{$select['ID']}">{$select['FULL_NAME']}</option>
                {/foreach}
            </select>
        </div>
    </div>
            <br/>
    <div class="row">
        <div class="col-sm-4">
             Customer Name: 
            <select class="form-control" name="customerid" id="customerid">
                <option value="0" selected>ANY</option>
                {foreach $CUSTOMERS_CB  as $select}
                    <option value="{$select['ID']}">{$select['FULL_NAME']}</option>
                {/foreach}

            </select>
        </div>
        <div class="col-sm-4">
             Services: 
            <select class="form-control"  multiple="multiple" name="servicecategory[]" id="servicecategory">
                <option value="0" selected>ANY</option>
                {foreach $SERVICE_NAMES_CB as $select}
                    <option value="{$select['cmpServiceID']}">{$select['catname']} - {$select['cmpServiceName']}</option>
                {/foreach}

            </select>
        </div>
        <div class="col-sm-4">
             Address <span class="hint">(Enter Street, City, State or ZipCode)</span>: 
            <div>
                <input name="address" id="address" size="35" class="form-control">
            </div>
        </div>
    </div>
            <br/>
    <div class="row">
        <div class="col-sm-12">
            <a href="Javascript:filter.submit();" class="btn btn-sm btn-primary btn-labeled"><span class="btn-label icon fa fa-filter"></span> Apply Filter</a> &nbsp;
            <a href="{$SITE_URL}workorders/showAdminServiceList" class="btn btn-sm btn-pa-purple btn-labeled"><span class="btn-label icon fa fa-list"></span> Show All</a>
            <a href="#" class="btn btn-sm btn-primary btn-labeled" id="hideadvanced"><span class="btn-label icon fa fa-circle"></span> Hide Advanced</a> &nbsp;

        </div>
    </div>
 </div>
</form>

</div>

       </div>
    <div class="panel-body">
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th colspan='6' ><input type="checkbox" id="selectall"> select all
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <th width='25'></th>
                    <th width='255'>Service</th>
                    <th width='255'>Customer</th>
                    <th width='180'>Status</th>
                    <th width='215'>Assigned</th>
                    <th width='110'>Tools</th>
                </tr>
                </thead>
                <tbody>
                {foreach $services as $p}
                    <tr class="even gradeA">

                        <td class="text-left">
                        <span style='font-size:0.8EM;color:Green'>
                            <input type='checkbox' class='checkboxall' id='check{$p.jordID}' name='check@@{$p.jordID}' data-address="{$p['jordAddress1']|escape:'html'}  {$p['jordCity']|escape:'html'}, {$p['jordState']|escape:'html'} {IF $p['jordZip'] neq "0"} {$p['jordZip']|escape:'html'}{/IF}" data-title="{$p['jordName']}"  value="{$p.jordID}">
                            </span>
                        </td>

                    <td class="text-left">
                        {$p.cmpServiceCat}<br/>{$p.ServiceName}
                        <br/>
                        <span style='font-size:0.8EM;color:Green'>Work order#:
                            <a href="{$SITE_URL}workorders/WOPreview/{$p.jobid}">
                            {$p.jobMasterYear}-{$p.jobMasterMonth}-{"%05d"|sprintf:$p.jobMasterNumber}</a></span>
                        {IF $p['jordAddress1'] neq ''}

                            <br/>
                            <a href="Javascript:showUserOnMap('{$p['jordName']|escape:'html'}', '{$p['jordAddress1']|escape:'html'} {$p['jordCity']|escape:'html'}, {$p['jordState']|escape:'html'} {IF $p['jordZip'] neq 0}{$p['jordZip']|escape:'html'}{/IF} ');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                            <a href="https://www.google.com/#q={$p['jordAddress1']|replace:' ':'+'}+{$p['jordCity']|replace:' ':'+'}+{$p['jordState']}+{$p['jordZip']}" title="Directions" target="Drive"><span class=" icon fa fa-truck"></span></a> &nbsp;
                            {$p['jordAddress1']} {$p['jordAddress2']}
                            <br/>{$p['jordCity']}, {$p['jordState']} {$p['jordZip']}

                            {/IF}



                    </td>


                        <td class="text-left">
                        {$p.cntFirstName} {$p.cntLastName}
                            <br/>
                           <span style='font-size:1EM;color:Darkgreen'> Service:{$p.jordName}</span>
                            <br/>
                            <span style='font-size:0.8EM;'> Proposal:{$p.jobName}</span>
                        </td>

                        <td class="text-left">
                                {$p.jordStatus}
                            {if $p.jordStatus eq "SCHEDULED"}
                            <span style='font-size:0.8EM;'>
                            <br/>Start: {$p.jordStartDate|date_format:"%A, %B %e, %Y"}
                            <br/>End: {$p.jordEndDate|date_format:"%A, %B %e, %Y"}
                            </span>
                            {/if}
                            <br/>

                    <span style='font-size:0.9EM;color:d00000'>
                      {* BEGIN SERVICES AREA *}
                                {if $p['cmpServiceCat'] eq 'Asphalt'}



                                    {IF  $p.cmpServiceID eq 19 OR $p.cmpServiceID eq 22  OR $p.cmpServiceID eq 5 }{* Milling paving *}
                                         Depth In Inches 
                                    {$p.jordDepthInInches}
                                        <br/>
                                         SQ. Yards 
                                    {$p.jordSQYards}


                                    {ELSEIF $p.cmpServiceID eq 3} {* repairs *}

                                         Size of project in SQ FT 
                                    {$p.jordSquareFeet}
                                        <br/>
                                         Locations 
                                    {$p.jordLocations}


                                    {ELSE} {* other *}

                                         SQ. Yards 
                                    {$p.jordSQYards}
                                        <br/>
                                         Depth In Inches 
                                    {$p.jordDepthInInches}

                                    {/IF}



                                {elseif $p['cmpServiceCat'] eq 'Concrete'}


                                    {IF $p.cmpServiceID <= 12} {*curb mix*}

                                         Length In Feet (linear feet) 
                                    {$p.jordLinearFeet}

                                        <br/>
                                         Locations 
                                    {$p.jordLocations}



                                    {ELSE} {*drum mix*}
                                         Sq. Ft. 
                                    {$p.jordSquareFeet}

                                        <br/>
                                         Locations 
                                    {$p.jordLocations}
                                    {/IF}

                                {elseif $p['cmpServiceCat'] eq 'Excavation'}

                                     Sq. Ft. 
                                    {$p.jordSquareFeet}
                                    <br/>
                                     Depth In inches 
                                    {$p.jordDepthInInches}


                                {elseif $p['cmpServiceCat'] eq 'Other'}


                                     Description 
                                    {$p['jordVendorServiceDescription']}



                                {elseif $p['cmpServiceCat'] eq 'Rock'}



                                     SQ . Ft. 
                                    {$p.jordSquareFeet}
                                    <br/>
                                     Depth In inches 
                                    {$p.jordDepthInInches}
                                    <br/>

                                {elseif $p['cmpServiceCat'] eq 'Seal Coating'}

                                     SQ. FT. 
                                    {$p['jordSquareFeet']}

                                    <br/>
                                     Phases 

                                    {$p['jordPhases']}


                                {elseif $p['cmpServiceCat'] eq 'Striping'}



                                {elseif $p['cmpServiceCat'] eq 'Sub Contractor'}

                                     Sub Contractor 
                                    {$p['subfirstname']} {$p['sublastname']}

                                {elseif $p['cmpServiceCat'] eq 'Paver Brick'}

                                     SQ. Ft. 
                                    {$p['jordSquareFeet']}
                                    <br/>

                                {elseif $p['cmpServiceCat'] eq 'Drainage and Catchbasins'}


                                     Number of Catch Basins 
                                    {$p['jordAdditive']}
                                {else}

                               <!--     xxxxxxxxxxxxxxxxxxxxxxxxxxxxx    ALERT:UNKNOWN SERVICE    xxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

                                {/if}


                        </span>

                        </td>

                        <td class="text-left">
                            Estimator: {$p.managerFirst} {$p.managerLast}
                            <br/>Job: {$p.jobmanagerFirst} {$p.jobmanagerLast}

                        </td>

                    <td class="text-center">
                        <table><td valign="top" style="font-size:0.8EM;text-align:left;">
                                <a  href="javascript:Swoop('{$SITE_URL}workorders/WOServiceDetailView/{$p.jobid}/{$p.jordID}');">Print Service</a>
                                {IF $p.jordStatus eq 'COMPLETED' OR  $p.jordStatus eq 'CANCELLED' OR  $p.jordStatus eq 'PENDING'}

                                    {IF $p.jordStatus eq 'PENDING'}
                                        <br /><a  href="{$SITE_URL}workorders/WOChangeStatus/{$p.jordID}">Remove Hold</a>

                                    {/IF}
                                {ELSE}
                                        {IF $p.wopID != null AND $p.wopStatus neq 'Completed'}
                                        <br/><span style='color:red'>Permits Required</span>
                                        {ELSE}
                                            {IF !empty($p.jordStartDate)}
                                                <br /><a  href="{$SITE_URL}workorders/WOSchedule/{$p.jordJobID}/{$p.jordID}">Change Schedule</a>
                                            {ELSE}
                                                <br /><a  href="{$SITE_URL}workorders/WOSchedule/{$p.jordJobID}/{$p.jordID}">Schedule Service</a>
                                            {/IF}
                                            {* cannot do with permits required *}
                                            <br /><a  href="{$SITE_URL}workorders/WOChecklistPJM/{$p.jordJobID}/{$p.jordID}">Pre-Day Checklist</a>
                                            <br /><a  href="{$SITE_URL}workorders/WOChecklistEJM/{$p.jordJobID}/{$p.jordID}">End of Day Checklist</a>
                                            <br /><a  href="{$SITE_URL}workorders/WOMediaJM/{$p.jordJobID}/{$p.jordID}">Upload Media</a>
                                            <br /><a  href="Javascript:AREYOUSURE('{$SITE_URL}workorders/WOServiceCompletedJM/{$p.jordJobID}/{$p.jordID}','You are about to close out this service and mark it as completed.\nAre you sure?')">Mark Completed</a>
                                        {/IF}
                                 <br /><a  href="{$SITE_URL}workorders/WOChangeStatus/{$p.jordID}">Put On Hold</a>

                                 {/IF}
                            </td></table>
                    </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->

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