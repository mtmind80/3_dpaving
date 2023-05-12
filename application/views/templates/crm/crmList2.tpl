
<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->

<!-- Javascript -->
<script>
    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" },
            "pageLength": 50,

        }  );

       //$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search');
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

        <h2>Contacts <span style='float:right;'><a class="btn btn-labeled" href="{$SITE_URL}crm/showList/1">Advanced Search</a></span></h2>
Records found: {$data['total_records']}
    </div>
    <div class="panel-body">
        <form name="fullsearch" method="POST">
        <p style="padding-left:3px;">Search in all contacts <input type="text" name="fullsearchtext" value="" /> <input type="submit" value="Go" name="fullsearch" /></p>
        </form>
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example" data-page-length='25'>
                <thead>
                <tr>
                    <th width='28%'>Name</th>
                    <th width='27%'>Company</th>
                    <th width='30%'>Contact</th>
                    <th width='15%'>Tools</th>
                </tr>
                </thead>
                <tbody>
                {foreach $data.rows as $d}
                <tr class="even gradeA">
                    <td><a href="{$SITE_URL}crm/editContact/{$d.cntId}" title="Click to view contact details">{IF $d.cntSalutation}{$d.cntSalutation} {/IF}{$d.cntFirstName} {$d.cntLastName}</a>
                        {IF $d.cntAltContactName}<br/>Contact:{$d.cntAltContactName} {/IF}
                        <br />Primary Category:{$d.ccatName}
                        {IF $d.cntAltContactName}<br/>Contact:{$d.cntAltContactName} {/IF}


                        &nbsp;
                    </td>

                    <td class="text-left">
                        <a href="{$SITE_URL}crm/editContact/{$d.cntCompanyId}">{$d.CompanyName}</a>
                        <br/>
                        {if $d.CompanyAddress1}
                            {$d.CompanyAddress1}<br/>
                            {$d.CompanyAddress2}
                        {/if}
                        {if $d.CompanyPhone}<br/>{$d.CompanyPhone}{/if}
                        {if $d['cntcid'] eq 9 AND $d.cntManagerId neq 0}
                            <br/>Property Manager; <a href=""{$SITE_URL}crm/editContact/{$d.cntManagerId}">{$d.ManagerName} {$d.ManagerLastName}</a>
                        {/if}


                    </td>
                    <td class="text-left">

                        {$d.cntPrimaryAddress1}
                        {IF $d.cntPrimaryAddress2  neq ''}<br/>{$d.cntPrimaryAddress2}{/IF}
                        {IF $d.cntPrimaryCity neq ''}<br/>{$d.cntPrimaryCity}{/IF}
                        {IF $d.cntPrimaryState neq ''}, {$d.cntPrimaryState}. {/IF}
                        {IF $d.cntPrimaryZip neq ''} {$d.cntPrimaryZip}{/IF}

                        {if $d.cntPrimaryPhone neq ''}
                            <br/>{$d.cntPrimaryPhone}
                        {/if}
                        {if $d.cntPrimaryEmail neq ''}
                        <br/><a href="mailto:{$d.cntPrimaryEmail}" title="Send Email">{$d.cntPrimaryEmail}<a/>
                            {/if}

                    </td>
                    <td class="text-center">
                        <table><td style="text-align:justify;">
                                <br /><a  href="{$SITE_URL}crm/viewContact/{$d.cntId}">View Profile</a>
                                <br /><a  href="{$SITE_URL}crm/crmNotes/{$d.cntId}">Notes/Reminders</a>


                                    <br /><a  href="{$SITE_URL}workorders/showPOList/{$d.cntId}">Jobs/Proposals</a>

                                {$link="crm/additionalinformation/{$d.cntId}"}
                                {IF $d.cntcid eq 9 AND $d.cntCompanyId > 0}
                                {$link ="workorders/startProposal/{$d.cntCompanyId}/{$d.cntId}"}
                                {/IF}
                                <br /><a  href="{$SITE_URL}{$link}">Create Proposal</a>
                                <br /><a  href="{$SITE_URL}crm/editContact/{$d.cntId}">Basic Information</a>
                                <br /><a  href="{$SITE_URL}crm/additionalinformation/{$d.cntId}">Connections</a>
                                <br /><a  href="{$SITE_URL}crm/catandservice/{$d.cntId}">Categories/Services</a>
                                <br /><a  href="{$SITE_URL}reports/ProfileToPDF/{$d.cntId}">Print Profile</a>

                            </td>
                        </table>
                    </td>
                </tr>
{/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
<span style='color:#ffffff;'>{$data['filterWhere']}</span>