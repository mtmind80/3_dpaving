
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






    function ShowPTools(username, id)
    {

        {literal}
        HideControls();

        $.post( site_url + "workorders/showTools/", { id: id , username: username})
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

        <h2 style="margin-bottom: 15px;">Proposals</h2>

        <!-- Search field -->
        <!--form class="form-inline" action="{$SITE_URL}workorders/fullsearch" method="post">
            <div class="form-group">
                <label for="searchalltext">Search All</label>
                <input type="text" class="form-control" id="searchalltext" placeholder="Search..." name="searchalltext">
            </div>
            <button type="submit" class="btn btn-primary btn-labeled">Go</button>
        </form-->

{IF $showrejected}
        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/showPOList/"><span class="btn-label icon fa fa-wrench"></span> Hide Rejected</a>
{ELSE}
        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/showPOList/0/1/"><span class="btn-label icon fa fa-wrench"></span> Show Rejected</a>
{/IF}
    </div>
    <div class="panel-body">
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th width='28%'>Name</th>
                    <th width='27%'>Client/Location</th>
                    <th width='30%'>Managers</th>
                    <th width='15%'>Tools</th>
                </tr>
                </thead>
                <tbody>
{foreach $proposals as $p}
    {IF $p.jobAlert}
                <tr class="alert-danger">
    {ELSE}
        <tr class="even gradeA">

                    {/IF}
                    <td class="text-left">
                        <a href="{$SITE_URL}workorders/addPOservices/{$p.jobID}"><span class="note-title">{$p.jobName}</span></a>

                        <br />
                        Created On:{$p.jobCreatedDateTime|date_format:"%A, %B %e, %Y"}
                        <br />
                        Created by:{$p.cntFirstName} {$p.cntLastName}
                        <br/>
                        Last updated:{$p.JobLastUpdated|date_format:"%A, %B %e, %Y"}
                        <br />
                        <span {IF $p.ordStatus eq "Approved"}class="badge badge-light-green" {ELSEIF $p.ordStatus eq "Rejected"} class="badge badge-danger" {ELSE} class="badge badge-info"  {/IF}>{$p.ordStatus}</span>
                        &nbsp;On Alert:{IF $p.jobAlert}YES <img src="{$SITE_URL}assets/images/fires.gif" border="0" alt="Hot" > {ELSE}NO{/IF}
                    </td>

                    <td class="text-left">
                        <a href="{$SITE_URL}crm/viewContact/{$p.jobcntID}"><span class="note-title">{$p.clientfirst} {$p.clientlast}</span></a>
                        <br/>
                        Community:<a href="{$SITE_URL}crm/viewContact/{$p.jobCommunityID}">{$p.communityFirst} {$p.communityLast}</a>
                        <br/>
                        Manager:<a href="{$SITE_URL}crm/viewContact/{$p.jobManagerID}">{$p.managerFirst} {$p.managerLast}</a>
                        </td>


                    <td class="text-left">
                        <span class='info-alert'>
                            Manager Assigned:{$p.managerfirst} {$p.managerlast}
                            <br/>Sales Assigned:{$p.salesfirst} {$p.saleslast}
                        </span>
                    </td>

                    <td class="text-center">

                        <table><td valign="top" style="text-align:justify;">
                                <br /><a  href="{$SITE_URL}workorders/addPOservices/{$p.jobID}">Edit Proposal</a>
                                <br /><a  href="{$SITE_URL}workorders/Notes/{$p.jobID}">Add Notes</a>
                                <br /><a  href="{$SITE_URL}workorders/Media/{$p.jobID}">Add Upload</a>
                                <br /><a  href="{$SITE_URL}workorders/Status/{$p.jobID}">Change Status</a>
                                <br /><a  href="{$SITE_URL}workorders/previewPO/{$p.jobID}">View Proposal</a>
                                <br /><a  href="{$SITE_URL}workorders/Media/{$p.jobID}/1">Print Proposal</a>
                                <br /><a  href="{$SITE_URL}workorders/duplicateProposalWithoutClient/{$p.jobID}/1">Duplicate Proposal</a>
                            </td></table>
                        <!--
                            <a href="Javascript:ShowPTools('{$p.jobName}','{$p.jobID}');" title="Show Tools"><img src="{$SITE_URL}/images/tools2.gif" border="0" alt="Tools" width="26" height="26" VALIGN='top'></a>
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
