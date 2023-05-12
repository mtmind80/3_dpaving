
<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
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
</script>

<!-- / Javascript -->
<div class="panel" >
<div class="panel-heading">

    <h2>Company Vehicles</h2>
    <a class="topbut btn btn-success" href="{$SITE_URL}resources/CreateVehicle/"><span class="btn-label icon fa fa-truck"></span> Add Vehicle</a>

<!-- vehicleID,vehicleName,vehicleDescription,vehiclePurchaseDate,vehicleVinNumber,vehicleCreatedBy,vehicleActive,vehicleLocation,vehicleTypeID -->
</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th style='width:20%;'>Name</th>
                    <th style='width:20%;'>Type</th>
                    <th>Location</th>
                    <th style='width:10%;'>Status</th>
                    <th style='width:10%;'>Edit</th>
                    <th style='width:10%;'>Log</th>
                    <th style='width:10%;'>Disable</th>
                </tr>
                </thead>
                <tbody>
                {assign var=odd value='odd gradeA'}
                {assign var=even value='even gradeA'}
            {foreach $vehicles as $v}
                <tr class="{cycle values="$odd,$even"}">
                    <td><span class="note-title">{$v.vehicleName}</span></td>
                    <td class="text-center">{$v.vtypeName}</td>
                    <td class="text-center">{$v.locName}<br />{$v.locAddress}</td>
                    <td class="text-center">{IF $v.vehicleActive}Active{ELSE}In Active{/IF}</td>
                    <td class="text-center"><a href="{$SITE_URL}resources/editVehicle/{$v.vehicleID}">Edit</a></td>
                    <td class="text-center"><a href="{$SITE_URL}resources/CreateVehicleLog/{$v.vehicleID}">Log</a></td>
                    <td class="text-center"><a href="Javascript:AREYOUSURE('{$SITE_URL}resources/deleteVehicle/{$v.vehicleID}','You are about to disable this vehicle. Are you sure?');">Disable</a></td>
                </tr>
            {/foreach}



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
