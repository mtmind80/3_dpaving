
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






    function ShowTools(username, id)
    {

        {literal}
        HideControls();

        $.post( site_url + "workorders/showWOTools/", { id: id , username: username})
                .done(function( data ) {
                    $('#DocManageLabel').html(username);
                    $('#ManagedContent').html(data);
                    $("#DocManage").css({left:mouseX,top:mouseY });
                    $('#DocManage').show();
                });
        {/literal}

    }



</script>
<!-- / Javascript -->
<div class="panel">
    <div class="panel-heading">

        <h2 style="margin-bottom: 15px;">Work Orders</h2>

        <!-- Search field -->
        <!--form class="form-inline" action="{$SITE_URL}workorders/wolistfullsearch" method="post">
            <div class="form-group">
                <label for="searchalltext">Search All</label>
                <input type="text" class="form-control" id="searchalltext" placeholder="Search..." name="searchalltext">
            </div>
            <button type="submit" class="btn btn-primary btn-labeled">Go</button>
        </form-->

    </div>
    <div class="panel-body">
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th width='15%'>Work Order</th>
                    <th width='12%'>Client</th>
                    <th width='20%'>Services</th>
                    <th width='20%'>Primary Address</th>
                    <th width='17%'>Managers</th>
                    <th width='16%'>Tools</th>
                </tr>
                </thead>
                <tbody>
                {foreach $proposals as $p}

                    <td class="text-left">{$p.jobMasterYear}-{$p.jobMasterMonth}-{"%05d"|sprintf:$p.jobMasterNumber}<br/>
                        <a href="{$SITE_URL}workorders/WOPreview/{$p.jobID}"><span class="note-title">{$p.jobName}</span></a><br/>
                        {IF $p.jobPermit == 1}
                            <span style="color:darkblue;">Permits Required</span><br/>{/IF}
                    <span {IF $p.jobStatus eq 6}class="badge badge-light-green" {ELSEIF $p.jobStatus eq 7} class="badge badge-danger" {ELSE} class="badge badge-info"  {/IF}>{$p.ordStatus}</span>
                    <br/>


                    </td>

                    <td class="text-left"><a href="{$SITE_URL}crm/viewContact/{$p.jobcntID}"><span class="note-title">{$p.clientfirst} {$p.clientlast}</span></a>
                      <br />Contact:  {$p.jobPrimaryContact}
                        <br />Email: <a href="mailto:{$p.jobPrimaryEmail}">{$p.jobPrimaryEmail}</a>
                       {IF $USER_ROLE eq 1 OR $USER_ROLE eq 6}
                        <br />Cost Estimate:${$p['totalcost']|number_format:2:".":","}
                        {/IF}
                    </td>
                        <td class="text-left">
                            {$p['JobNames']}
                        </td>
                    <td class="text-left">
                        Location:
                        {IF $p['jobAddress1'] neq ''}
                            <a href="Javascript:showUserOnMap('{$p['jobName']}', '{$p['jobAddress1']} {$p['jobAddress2']} {$p['jobCity']}, {$p['jobState']}. {$p['jobZip']}');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                            <a href="https://www.google.com/#q={$p['jobAddress1']|replace:' ':'+'}+{$p['jobCity']|replace:' ':'+'}+{$p['jobState']}+{$p['jobZip']}" title="Get Directions" target="Drive"><span class=" icon fa fa-truck"></span></a>
                            <br />
                        {/IF}

                               {$p.jobAddress1}
                        <br />{$p.jobAddress2}
                        <br />{$p.jobCity}, {$p.jobState} . {$p.jobZip}
                    </td>
                    <td class="text-left">Created On:{$p.jobCreatedDateTime|date_format:"%A, %B %e, %Y"}
                        <br />
                        Created by:{$p.cntFirstName} {$p.cntLastName}<br/>
                        <span class='info'>
                            Manager Assigned:{$p.managerfirst} {$p.managerlast} <br/>Sales Assigned:{$p.salesfirst} {$p.saleslast}
                        </span>
                        <br />
                        Last updated:{$p.JobLastUpdated|date_format:"%A, %B %e, %Y"}
                    </td>
                    <td class="text-center">
                        <table><td valign="top" style="text-align:justify;">
                                <br /><a  href="{$SITE_URL}workorders/WOPreview/{$p.jobID}">Manage Services</a>
                                <br /><a  href="{$SITE_URL}workorders/WONotes/{$p.jobID}">Add Notes</a>
                                <br /><a  href="{$SITE_URL}workorders/WOMedia/{$p.jobID}">Add Uploads</a>
                                {if $p.jobPermit}
                                <br /><a  href="{$SITE_URL}workorders/WOPermits/{$p.jobID}">Manage Permits</a>
                                {/if}
                                <br /><a  href="{$SITE_URL}workorders/WOClient/{$p.jobID}">Client/Notices</a>
                                <br /><a  href="{$SITE_URL}workorders/WOMedia/{$p.jobID}/1">Print Work Order</a>
                                <br /><a  href="{$SITE_URL}workorders/Media/{$p.jobID}/1">Print Proposal</a>
                                {IF $USER_ROLE eq 1 AND $p.jobStatus eq 8}
                                <br /><a  href="{$SITE_URL}workorders/rollbackBilling/{$p.jobID}/{$showcompleted}">Rollback Billing</a>
                                {/IF}
                                {IF $USER_ROLE eq 1 AND $p.jobStatus eq 6}
                                <br /><a  href="{$SITE_URL}workorders/rollbackCompleted/{$p.jobID}/{$showcompleted}">Rollback Completed</a>
                                {/IF}

                            </td></table>
<!--                        <a href="Javascript:ShowTools('{$p.jobName}','{$p.jobID}');" title="Show Tools"><img src="{$SITE_URL}/images/tools2.gif" border="0" alt="Tools" width="26" height="26" VALIGN='top'></a>
                        &nbsp;
    -->
                    </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
