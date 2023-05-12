
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

    <h2>Company Locations</h2>
<!--
    <a class="topbut btn btn-success" href="{$SITE_URL}resources/CreateEquipment/"><span class="btn-label icon fa fa-wrench"></span> Add Equipment</a>
-->
</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Name</th>
                    <th >Address</th>
                    <th >Phone/Manager</th>
                    <th style='width:10%;'>Edit</th>
                </tr>
                </thead>
                <tbody>
                {assign var=odd value='odd gradeA'}
                {assign var=even value='even gradeA'}
                {foreach $data as $d}
                <tr class="{cycle values="$odd,$even"}">
                    <td><span class="note-title"><a href="{$SITE_URL}resources/editLocations/{$d.locID}">{$d.locName}</a></span></td>
                    <td class="text-center">{$d.locAddress}<br/> {$d.locCity}, {$d.locState}. {$d.locZip}</td>
                    <td class="text-center">{$d.locPhone}<br/>{$d.locManager}</td>
                    <td class="text-center"><a href="{$SITE_URL}resources/editLocations/{$d.locID}">Edit</a></td>
                </tr>
            {/foreach}



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
