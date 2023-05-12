<div class="panel-heading">
{assign var="thispage" value=$smarty.server.REQUEST_URI}
    <h2>Work Order  {$proposal.jobMasterYear}-{$proposal.jobMasterMonth}-{"%05d"|sprintf:$proposal.jobMasterNumber}
        <span style="float:right;">

        <a href="{$SITE_URL}workorders/WOMedia/{$proposal.jobID}/1" class="btn btn-sm btn-light-green" ><span class="btn-label icon fa fa-print"></span> &nbsp;Print Work Order </a>
            {IF $USER_ROLE eq 1 OR $USER_ROLE eq 6}

                <a href="{$SITE_URL}workorders/WOLienRelease/{$proposal.jobID}" class="btn btn-sm btn-light-green" ><span class="btn-label icon fa fa-print"></span> &nbsp;Print Lien Release</a>
                
            {/IF}
       <a href="{$SITE_URL}workorders/CloseWO/{$proposal.jobID}" class="btn btn-sm btn-light-green">Close Out Project</a>
    </span></h2>
  <!--
    <a class="topbut btn btn-success" href="{$SITE_URL}workorders/showWOList/"><span class="btn-label icon fa fa-truck"></span> List Work Orders</a>
-->

</div>
<div class="wizard-wrapper">
    <ul class="wizard-steps">
        <li>
            <!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/WOclient/{$proposal.jobID}'><span class="wizard-step-description" {IF $thispage|strstr:"WOclient"} style="color: #000000;"{/IF}>Client/Notices&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                >

        <li>
            <!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/WONotes/{$proposal.jobID}'><span class="wizard-step-description" {IF $thispage|strstr:"WONotes"} style="color: #000000;"{/IF}>Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                >
        <li>
            <!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/WOMedia/{$proposal.jobID}'><span class="wizard-step-description" {IF $thispage|strstr:"WOMedia"} style="color: #000000;"{/IF}>Upload &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                >
{IF $proposal.jobPermit eq 1}
        <li>
            <!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/WOPermits/{$proposal.jobID}'><span class="wizard-step-description" {IF $thispage|strstr:"WOPermits"} style="color: #000000;"{/IF}>Permits &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                >
        <li>
            <!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">6</span>

{ELSE}
        <li>
<!-- ! Remove space between elements by dropping close angle -->
            <span class="wizard-step-number">5</span>

{/IF}
            <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/WOPreview/{$proposal.jobID}'><span class="wizard-step-description" {IF $thispage|strstr:"WOPreview"} style="color: #000000;"{/IF}>Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                >



    </ul>
</div>
