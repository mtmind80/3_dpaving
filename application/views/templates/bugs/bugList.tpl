
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

    <h2>Bugs</h2>
    <a class="topbut btn btn-success" href="{$SITE_URL}bugs/create/"><span class="btn-label icon fa fa-wrench"></span> Report Bug</a>

</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th style='width:20%;'>Bug Reported</th>
                    <th style='width:20%;'>Bug</th>
                    <th style='width:20%;'>Action</th>
                    <th style='width:20%;'>Respond</th>
                    <th style='width:20%;'>Test</th>
                </tr>
                </thead>
                <tbody>
                {foreach $data as $d}
                   {if $d.bugFixed}
                 <tr >
                    <td><span class="note-title">{$d.bugReportedBy}<br/>{$d.bugReportedDate}</span></td>
                    <td class="text-left">{$d.bugReport}</td>
                    <td class="text-left">{$d.bugActionTaken}
                    </td>
                    <td class="text-left">
                        Responder:{$d.bugActionTakenBy}<br/>{$d.bugActionTakenDate}

                    </td>
                     <td class="text-left">
                         Tester:{$d.bugTestedBy}<br/>{$d.bugTestedDate}
                         <br/>{$d.bugFixedNote}
                     </td>

                    {else}
                       <tr >
                       <td><a href="{$SITE_URL}bugs/edit/{$d.bugID}"><span class="note-title">{$d.bugReportedDate} - {$d.bugReportedBy}</span></a></td>
                       <td class="text-left">{$d.bugReport}</td>
                       <td class="text-left">{$d.bugActionTaken}</td>
                       <td class="text-left"><a href="{$SITE_URL}bugs/edit/{$d.bugID}">Respond</a></td>
                       <td class="text-left"><a href="{$SITE_URL}bugs/test/{$d.bugID}">Test</a>
                           <br/>{$d.bugFixedNote}</td>

                   {/if}
                </tr>
            {/foreach}



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
