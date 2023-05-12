{* this is for the job manager to close a service *}

<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<style>
@media (max-width: 768px){
    #main-wrapper {
        padding: 0px !important;
    }
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
    });


    function Swoop(dURL)
    {
        window.open(dURL, "MsgWindow", "width=600,height=600,scrollbars=yes");

    }

</script>
<!-- / Javascript -->
<div class="panel">
    <div class="panel-heading">

        <h2>Work Order Scheduled Services</h2>

    </div>
    <div class="panel-body">
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th width='10%'>WorkOrder</th>
                    <th width='25%'>Service</th>
                    <th width='20%'>Schedule</th>
                    <th width='25%'>Location</th>
                    <th width='20%'>Tools</th>
                </tr>
                </thead>
                <tbody>
                {foreach $services as $p}
                    <tr class="even gradeA">

                    <td class="text-left">{$p.jobMasterYear}-{$p.jobMasterMonth}-{"%05d"|sprintf:$p.jobMasterNumber}
                    </td>
                    <td class="text-left">
                        {$p.jordName}
                        {IF $p['jordAddress1'] neq ''}

                            <br/>
                            <a href="Javascript:showUserOnMap('{$p['jordName']}', '{$p['jordAddress1']} {$p['jordAddress2']} {$p['jordCity']}, {$p['jordState']}. {$p['jordZip']}');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                            <a href="https://www.google.com/#q={$p['jordAddress1']|replace:' ':'+'}+{$p['jordCity']|replace:' ':'+'}+{$p['jordState']}+{$p['jordZip']}" title="Directions" target="Drive"><span class=" icon fa fa-truck"></span></a> &nbsp;
                            {$p['jordAddress1']} {$p['jordAddress2']}
                            <br/>{$p['jordCity']}, {$p['jordState']} {$p['jordZip']}
                            
                            {/IF}



                    </td>
                        <td class="text-left">
                            Start: {$p.jordStartDate|date_format:"%A, %B %e, %Y"}
                            <br/>End: {$p.jordEndDate|date_format:"%A, %B %e, %Y"}

                        </td>

                        <td class="text-left">
                            {$p.jordAddress1}
                            {IF $p.jordAddress2 neq ''}<br/>{$p.jordAddress2}{/IF}
                            {$p.jordCity} {$p.jordState} {$p.jordZip}
                        </td>

                    <td class="text-center">
                        <table><td valign="top" style="text-align:justify;">
                                <a  href="javascript:Swoop('{$SITE_URL}workorders/WOServiceDetailView/{$p.jobid}/{$p.jordID}');">Print Service</a>
                                {IF $p.jordStatus eq 'COMPLETED' OR  $p.jordStatus eq 'CANCELLED'}
                                {ELSE}
                                <br /><a  href="{$SITE_URL}workorders/WOChecklistPJM/{$p.jordJobID}/{$p.jordID}">Pre-Day Checklist</a>
                                <br /><a  href="{$SITE_URL}workorders/WOChecklistEJM/{$p.jordJobID}/{$p.jordID}">End of Day Checklist</a>
                                <br /><a  href="{$SITE_URL}workorders/WOMediaJM/{$p.jordJobID}/{$p.jordID}">Upload Media</a>
                                <br /><a  href="Javascript:AREYOUSURE('{$SITE_URL}workorders/WOServiceCompletedJM/{$p.jordJobID}/{$p.jordID}','You are about to close out this service and mark it as completed.\nAre you sure?')">Mark Completed</a>

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