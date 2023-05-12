
{* small footprint header for estimators *}

<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-6 text-center text-left-sm"><i class="fa fa-truck page-header-icon"></i>&nbsp;&nbsp;{$proposal.jobName}</h1>
        <div class="col-xs-12 col-sm-6">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <!-- "Create project" button, width=auto on desktops -->
                <div class="pull-right col-xs-12 col-sm-auto">
                    <a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/woSendToBilling/{$proposal.jobID}','You are about to indicate that this job is closed, and all costs have been entered.\nAre you sure?');" class="btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-money"></span>Send To Billing</a>

                    <a href="{$SITE_URL}dashboard/" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-dashboard"></span>Go To Dashboard</a>
                </div>
                <!-- Margin -->
                <div class="visible-xs clearfix form-group-margin"></div>
            </div>
        </div>
    </div>
</div>

<!-- begin row -->
<div class="row">
    <div class="col-sm-4">
        <div class="form-group no-margin-hr" style='font-size:1.5EM;'>
            Created for: <a href="{$SITE_URL}crm/viewContact/{$proposal['clientid']}" target='client'>{$proposal.clientfirst} {$proposal.clientlast}</a>
            <br />
            Created Date:{$proposal.jobCreatedDateTime|date_format:"%A, %B %e, %Y"}
            <br />
            Created By:{$proposal.cntFirstName} {$proposal.cntLastName}

        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group no-margin-hr" style='font-size:1.5EM;'>
            {$proposal.jobAddress1} {$proposal.jobAddress1}
            <br />
            {$proposal.jobCity}, {$proposal.jobState}. {$proposal.jobZip}
        </div>
    </div>
    {assign var="permitsok" value=0 scope="global"}

    <div class="col-sm-4">
        <div class="form-group no-margin-hr">
            {IF $proposal.jobMOT}
                <span class='alert-danger'>&nbsp; MOT : YES &nbsp;</span>
            {IF $proposal.jobMOTSentBy neq 0}
                Sent:{$proposal.jobMOTSentDatetime|date_format:"%A, %B %e, %Y"}
            {/IF}
            {ELSE}
                <span class='alert-info'>&nbsp; MOT : NO &nbsp;</span>
            {/IF}
            <br />
            {IF $proposal.jobNTO}
                <span class='alert-danger'>&nbsp; NTO : YES &nbsp;</span>
            {IF $proposal.jobNTOSentBy neq 0}
                Sent:{$proposal.jobNTOSentDatetime|date_format:"%A, %B %e, %Y"}
            {/IF}
            {ELSE}
                <span class='alert-info'>&nbsp; NTO : NO &nbsp;</span>
            {/IF}
            <br />

            {IF $proposal.jobPermit eq 1}
                <span class='alert-danger'>&nbsp; Permit Required : YES &nbsp;</span>
            {IF $permits gt 0}
            {* we require permits and have some are they all completed*}
            {IF $permits eq $permitscomplete}
            {$permitsok = 1 scope="global"} - COMPLETED
            {ELSE}
                - INCOMPLETE
            {/IF}
                <br/>Permits;{$permits}
                <br/>Permits Completed:{$permitscomplete}
            {ELSE}
                - No Permits found
            {/IF}
            {ELSE}
                <span class='alert-info'>&nbsp; Permit Required : NO &nbsp;</span>
            {$permitsok = 1 scope="global"}
            {/IF}

            <br />

            <span {IF $proposal.jobStatus eq 6}class="badge badge-light-green" {ELSEIF $proposal.jobStatus eq 7} class="badge badge-danger" {ELSE} class="badge badge-info"  {/IF}>{$proposal.ordStatus}</span>
        </div>
    </div>
</div>
<!-- end  row -->
<div class="row">
    <div class="col-sm-12">
        {if isset($CONTENT)}
            {include file = $CONTENT}
        {else}
           Proposals
        {/if}
    </div>
</div>
<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.PixelAdmin.start(init);
</script>

</body>
</html>
