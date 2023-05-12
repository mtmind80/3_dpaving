
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
                    </td>
                        <td class="text-left">
                            Start: {$p.jordStartDate|date_format:"%A, %B %e, %Y"}
                            <br/>End:{$p.jordEndDate|date_format:"%A, %B %e, %Y"}

                        </td>

                        <td class="text-left">
                            {$p.jordAddress1}
                            {IF $p.jordAddress2 neq ''}<br/>{$p.jordAddress2}{/IF}
                            {$p.jordCity} {$p.jordState} {$p.jordZip}
                        </td>

                    <td class="text-center">
                        <table><td valign="top" style="text-align:justify;">
                                <br /><a  href="{$SITE_URL}workorders/ManageService/{$p.jordID}">Manage Service</a>
                                <br /><a  href="{$SITE_URL}workorders/PrintService/{$p.jordID}">Print Service</a>
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
