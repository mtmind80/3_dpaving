<script type="text/javascript">

    $('#calwrap div.calendar').datepicker({ dateFormat: 'dd, mm, yy' });

    $('#calendar').click(function() { //do nothing

        alert('we are here');
     });

</script>

<div class="stat-panel">
    <div class="stat-row">
        <!-- Small horizontal padding, bordered, without right border, top aligned text -->
        <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
            <!-- Small padding, without top padding, extra small horizontal padding -->
            <h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-anchor text-primary"></i>&nbsp;&nbsp;CRM</h4>
            <!-- Without margin -->
            <ul class="list-group no-margin">
                <!-- Without left and right borders, extra small horizontal padding, without background, no border radius -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius"> <a href='#'>New Contacts (this month)</a> <span class="label label-pa-purple pull-right">{$crm_new}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg"> <a href='#'>Reminders</a> <span class="label label-success pull-right">{$crm_reminder}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='#'>Total Contacts</a> <span class="label label-danger pull-right">{$crm_total}</span> </li>
                <!-- / .list-group-item -->
            </ul>
        </div>
        <!-- /.stat-cell -->
        <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
            <!-- Small padding, without top padding, extra small horizontal padding -->
            <h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-cloud-upload  text-primary"></i>&nbsp;&nbsp;Proposals</h4>
            <!-- Without margin -->
            <ul class="list-group no-margin">
                <!-- Without left and right borders, extra small horizontal padding, without background, no border radius -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius"> <a href='#'>Proposal In Process</a> <span class="label label-pa-purple pull-right">{$proposal_inprocess}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg"> <a href='#'>Proposals Active</a> <span class="label label-success pull-right">{$proposal_active}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='#'>Proposals Pending</a> <span class="label label-danger pull-right">{$proposal_pending}</span> </li>
                <!-- / .list-group-item -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='#'>Proposals Rejected</a> <span class="label label-success pull-right">{$proposal_rejected}</span> </li>
                <!-- / .list-group-item -->
            </ul>
        </div>
        <!-- Primary background, small padding, vertically centered text -->
        <!-- /.stat-cell -->
        <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
            <!-- Small padding, without top padding, extra small horizontal padding -->
            <h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-truck  text-primary"></i>&nbsp;&nbsp;Work Orders</h4>
            <!-- Without margin -->
            <ul class="list-group no-margin">
                <!-- Without left and right borders, extra small horizontal padding, without background, no border radius -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius"> <a href='#'>In Progress Work Order</a> <span class="label label-pa-purple pull-right">{$workorder_active}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg"> <a href='#'>Pending Work Orders</a> <span class="label label-success pull-right">{$workorder_pending}</span> </li>
                <!-- / .list-group-item -->
                <!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='#'>Total Work Orders (this month)</a> <span class="label label-danger pull-right">{$workorder_total}</span> </li>
                <!-- / .list-group-item -->
                <li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg"> <a href='#'>Total Work Orders (next month)</a> <span class="label label-success pull-right">{$workorder_current}</span> </li>
                <!-- / .list-group-item -->
                <li class="list-group-item no-border-hr padding-xs-hr no-bg"> <a href='#'>Completed Work Orders</a> <span class="label label-success pull-right">{$workorder_completed}</span> </li>

            </ul>
        </div>

            <div class="stat-cell col-sm-4 padding-sm-hr bordered no-border-r valign-top">
                <!--calendar widget -->
                <div id="calwrap">
                    <div class="widget-block  white-box calendar-box">
                        <div class="col-md-7 blue-box calendar no-padding" ></div>
                        <div class="col-md-5">
                            <div class="padding" style='width:50px;'>
                                <h1 class="text-center">{$todayname}</h1>
                                <h2 class="today">{$todayday}</h2>
                            </div>
                        </div>
                    </div>
                    <script>
                        init.push(function () {
                            $('#calwrap div.calendar').datepicker({
                            });
                        });
                    </script>
                    <div></div>
                </div>
                <!--calendar widget ends here -->
            </div>

        <div class="right-sidebar col-sm-4">
            <div class="stat-panel">
                <!--calendar widget -->
                <div class="stat-row">
                    <div class="stat-cell">
                        <!--calendar widget -->
                        <?php include ("assets/includes/calendarwidget.php"); ?>
                        <!--calendar widget ends here -->
                    </div>
                </div>
                <!--calendar widget ends here -->
                <!--events start-->
                <div class="stat-row">
                    <div class="stat-cell">
                        <div class="eventswrapper"  style="min-height:350px;">
                            <h2>My Events</h2>
                            <span class="btn center-block text-center"> <a id="popover" data-toggle="popover">add event</a> </span>
                            <?php include ("assets/includes/newevent.php"); ?>
                            <div class="notifications-list">
                                <div class="notification">
                                    <div class="notification-description">Dinner with my family.
                                        <div class="notification-ago">
                                            <div class="notification-icon fa fa-clock-o"></div>
                                            &nbsp;12h ago</div>
                                    </div>
                                </div>
                                <!-- / .notification -->
                                <div class="notification">
                                    <div class="notification-description">Meeting with partners.
                                        <div class="notification-ago">
                                            <div class="notification-icon fa fa-clock-o"></div>
                                            &nbsp;12h ago</div>
                                    </div>
                                </div>
                                <!-- / .notification -->
                                <div class="notification">
                                    <div class="notification-description">Work in new project.
                                        <div class="notification-ago">
                                            <div class="notification-icon fa fa-clock-o"></div>
                                            &nbsp;12h ago</div>
                                    </div>
                                </div>
                                <!-- / .notification -->
                                <div class="notification">
                                    <div class="notification-description">Go to doctor.
                                        <div class="notification-ago">
                                            <div class="notification-icon fa fa-clock-o"></div>
                                            &nbsp;12h ago</div>
                                    </div>
                                </div>
                                <!-- / .notification -->
                            </div>
                        </div>
                        <!--events end-->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.stat-panel -->
