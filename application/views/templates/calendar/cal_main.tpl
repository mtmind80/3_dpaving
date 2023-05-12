
<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-calendar page-header-icon"></i>&nbsp;&nbsp;Calendar</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <!-- "Create project" button, width=auto on desktops
                <div class="pull-right col-xs-12 col-sm-auto">
                    <a href="{$SITE_URL}workorders/create/" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-plus"></span>New Proposal</a>
                    <a href="{$SITE_URL}crm/select/" class="btn btn-primary btn-labeled" ><span class="btn-label icon fa fa-plus"></span>New Contact</a>
                </div>
-->
                <!-- Margin -->
                <div class="visible-xs clearfix form-group-margin"></div>
                <!-- Search field
                <form action="{$SITE_URL}comingsoon" method="post" class="pull-right col-xs-12 col-sm-6">
                    <div class="input-group no-margin"> <span class="input-group-addon" style="border:none;background: #fff;background: rgba(0,0,0,.05);"><i class="fa fa-search"></i></span>
                        <input type="text" name="search" placeholder="Search..." class="form-control no-padding-hr" style="border:none;background: #fff;background: rgba(0,0,0,.05);">
                    </div>
                </form>
                -->
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-9">

        {if isset($CONTENT)}
            {include file = $CONTENT}
        {else}
            Calendar here
        {/if}


    </div>
    <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
        {include file = "common/calendarwidget2.tpl"}
        {include file = "common/tasks.tpl"}
        {include file = "common/reminders.tpl"}

    </div>



</div>

