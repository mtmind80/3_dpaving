<script type="text/javascript">
    //$.growl({ title: "Growl", message: "The kitten is awake!"});
    //$.growl.error({ message: "The kitten is attacking!" });
    //$.growl.notice({ message: "The kitten is cute!" });
    //$.growl.warning({ message: "The kitten is ugly!" });
</script>


<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Dashboard</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                {IF $USER_ROLE neq 4 AND $USER_ROLE neq 5}
                <div class="pull-right col-xs-12 col-sm-auto"><a href="{$SITE_URL}workorders/create/" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-plus"></span>New Proposal</a>
                    <a href="{$SITE_URL}crm/select/" class="btn btn-primary btn-labeled" ><span class="btn-label icon fa fa-plus"></span>New Contact</a></div>
                {/IF}
                <!-- Margin -->
                <div class="visible-xs clearfix form-group-margin"></div>
                <!-- Search field -->

            </div>
        </div>
    </div>
</div>



<div class="stat-panel">

    <div class="stat-row">

        <div class="stat-cell col-sm-7 padding-sm-hr bordered no-border-r valign-top">
        {IF $USER_ROLE eq 1}
         <h3>{$USER_FULLNAME} </h3>
         <ul class="list-group-item-info">
             <li>Ready To Bill</li>
         </ul>
        {foreach $readytobill as $r}
            <div class="row stat-row">
                <a class="btn btn-sm" href="{$SITE_URL}workorders/WOAdminClose/{$r.jobID}"> Ready To Bill </a>  {$r.jobMasterYear}-{$r.jobMasterMonth}-{"%05d"|sprintf:$r.jobMasterNumber} - <a  href="{$SITE_URL}workorders/WOClient/{$r.jobID}">{$r['jobName']}</a>
            </div>
        {/foreach}
            <br/>

         <ul class="list-group-item-info">
             <li>Ready To Close</li>
         </ul>
        {foreach $readytoclose as $r}
        <div class="row stat-row">
          <a class="btn btn-sm" href="{$SITE_URL}workorders/WOEstimatorClose/{$r.jobID}">Close Job</a>  {$r.jobMasterYear}-{$r.jobMasterMonth}-{"%05d"|sprintf:$r.jobMasterNumber} - <a  href="{$SITE_URL}workorders/WOClient/{$r.jobID}">{$r['jobName']}</a>
        </div>
        {/foreach}

<br/>
<!--
            <ul class="list-group-item-info">
                <li>Ready To Approve</li>
            </ul>
            <div class="row stat-row">
                <a class="btn btn-sm" href="{$SITE_URL}comingsoon">Approve Proposal</a>  <a  href="{$SITE_URL}comingsoon/">Proposal Name</a>
            </div>
            -->


        {/IF}

        {IF $USER_ROLE eq 2}

            <h3>{$USER_FULLNAME} </h3>


            <ul>
                <li>Ready To Close</li>
            </ul>
        {foreach $readytoclose as $r}
            <div class="row panel">
                <a class="btn" href="{$SITE_URL}workorders/WOEstimatorClose/{$r.jobID}">Close Job</a>  {$r.jobMasterYear}-{$r.jobMasterMonth}-{"%05d"|sprintf:$r.jobMasterNumber} - <a  href="{$SITE_URL}workorders/WOClient/{$r.jobID}">{$r['jobName']}</a>
            </div>
        {/foreach}


        {/IF}

        {IF $USER_ROLE eq 3}

            <h3>{$USER_FULLNAME}  </h3>

            <ul>
                <li>Ready To Close</li>
            </ul>
        {foreach $readytoclose as $r}
            <div class="row panel">
                <a class="btn" href="{$SITE_URL}workorders/WOEstimatorClose/{$r.jobID}">Close Job</a>  {$r.jobMasterYear}-{$r.jobMasterMonth}-{"%05d"|sprintf:$r.jobMasterNumber} - <a  href="{$SITE_URL}workorders/WOClient/{$r.jobID}">{$r['jobName']}</a>
            </div>
        {/foreach}


        {/IF}

        {IF $USER_ROLE eq 4}

            <h3>{$USER_FULLNAME} </h3>
            <ul>
                <li><a class="btn" href="{$SITE_URL}workorders/showServiceList">My Projects</a></li>
            </ul>

        {/IF}

        {IF $USER_ROLE eq 5}

            <h3>{$USER_FULLNAME} </h3>
            <ul>
                <li><a class="btn" href="{$SITE_URL}workorders/showServiceList">My Projects</a></li>
            </ul>



        {/IF}

        {IF $USER_ROLE eq 6}

         <h3>{$USER_FULLNAME} </h3>
         <ul class="list-group-item-info">
             <li>Ready To Bill</li>
         </ul>
        {foreach $readytobill as $r}
            <div class="row stat-row">
                <a class="btn btn-sm" href="{$SITE_URL}workorders/WOAdminClose/{$r.jobID}"> Ready To Bill </a>  {$r.jobMasterYear}-{$r.jobMasterMonth}-{"%05d"|sprintf:$r.jobMasterNumber} - <a  href="{$SITE_URL}workorders/WOClient/{$r.jobID}">{$r['jobName']}</a>
            </div>
        {/foreach}
            <br/>

         <ul class="list-group-item-info">
             <li>Ready To Close</li>
         </ul>
        {foreach $readytoclose as $r}
        <div class="row stat-row">
          <a class="btn btn-sm" href="{$SITE_URL}workorders/WOEstimatorClose/{$r.jobID}">Close Job</a>  {$r.jobMasterYear}-{$r.jobMasterMonth}-{"%05d"|sprintf:$r.jobMasterNumber} - <a  href="{$SITE_URL}workorders/WOClient/{$r.jobID}">{$r['jobName']}</a>
        </div>
        {/foreach}

<br/>

        {/IF}
        </div>
            <div class="stat-cell col-sm-5 padding-sm-hr bordered no-border-r valign-top">
                {include file = "common/calendarwidget.tpl"}

                {include file = "common/tasks.tpl"}
                {include file = "common/reminders.tpl"}
            </div>

    </div>




</div>
<!-- /.stat-panel -->

{IF $USER_ROLE eq 1 OR $USER_ROLE eq 6}
    <div class="stat-panel">
    <div class="stat-row">

        <!-- Small horizontal padding, bordered, without right border, top aligned text -->
        <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
            <!-- Small padding, without top padding, extra small horizontal padding -->
            <h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-anchor text-primary"></i>&nbsp;&nbsp;CRM</h4>
            <!-- Without margin -->
            <ul class="list-group no-margin">
                <!-- Without left and right borders, extra small horizontal padding, without background, no border radius -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius"> <a href='{$SITE_URL}crm/showList/2'>New Contacts (this month)</a> <span class="label label-pa-purple pull-right">{$crm_new}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg"> <a href='{$SITE_URL}calendar/showcalendarReminder/'>Reminders {$thisMonth}</a> <span class="label label-success pull-right">{$crm_reminder}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='{$SITE_URL}crm/showCRMList/1'>Total Contacts</a> <span class="label label-danger pull-right">{$crm_total}</span> </li>
                <!-- / .list-group-item -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='{$SITE_URL}messages/myMessages/'>Messages</a> <span class="label label-danger pull-right">{$messagecount}</span> </li>
                <!-- / .list-group-item -->
            </ul>
        </div>
        <!-- /.stat-cell -->
        <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
            <!-- Small padding, without top padding, extra small horizontal padding -->
            <h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-cloud-upload  text-primary"></i>&nbsp;&nbsp;Proposals</h4>
            <!-- Without margin -->
            <ul class="list-group no-margin">
                <li class="list-group-item no-border-hr padding-xs-hr no-bg"> <a href='{$SITE_URL}workorders/showPOList'>Proposals Active</a> <span class="label label-success pull-right">{$proposal_active}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='{$SITE_URL}workorders/showPOList'>Proposals Approved</a> <span class="label label-danger pull-right">{$proposal_approved}</span> </li>
                <!-- / .list-group-item -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='{$SITE_URL}workorders/showPOList/0/1'>Proposals Rejected</a> <span class="label label-success pull-right">{$proposal_rejected}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, extra small horizontal padding, without background -->
            </ul>
        </div>
        <!-- Primary background, small padding, vertically centered text -->
        <!-- /.stat-cell -->
        <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
            <!-- Small padding, without top padding, extra small horizontal padding -->
            <h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-truck  text-primary"></i>&nbsp;&nbsp;Work Orders</h4>
            <!-- Without margin -->
            <ul class="list-group no-margin">
                <!-- / .list-group-item -->
                <!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='{$SITE_URL}workorders/showWOList/2'>Total Work Orders</a> <span class="label label-danger pull-right">{$workorder_total}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, extra small horizontal padding, without background, no border radius -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius"> <a href='{$SITE_URL}workorders/showWOList/'>In Progress Work Order</a> <span class="label label-pa-purple pull-right">{$workorder_active}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg"> <a href='{$SITE_URL}workorders/showWOList/1'>Completed Work Orders</a> <span class="label label-success pull-right">{$workorder_completed}</span> </li>

            </ul>
        </div>

    </div>
    </div>
{/IF}
