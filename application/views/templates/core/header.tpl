<div id="main-wrapper">

    <!--
      Main navigation
  -->

    <div id="main-navbar" class="navbar navbar-inverse" role="navigation">
        <!-- Main menu toggle -->

        <div class="navbar-inner">
            <!-- Main navbar header -->
            <div class="navbar-header">
                <div class="admin-logo"><img src="{$SITE_URL}assets/images/AllPaving-XSmall.png" alt="" ></div>
                <!-- Main navbar toggle -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>
            </div>
            <!-- / .navbar-header -->
            <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
                <div>
                    {* ROLES 'Super Admin', 'Sales Manager','Sales Person','Job Manager','General Employee','Office Worker'  *}
                    <ul class="nav navbar-nav">
                        <li > <a href="{$SITE_URL}dashboard/">Dashboard</a> </li>
                        {IF $USER_ROLE neq 5 AND $USER_ROLE neq 4 }{* general employee user does not need these functions CRM or Proposals they may need to see work orders*}
                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">CRM <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{$SITE_URL}crm/showList/1">Advanced Search</a></li>
                                    <li><a href="{$SITE_URL}crm/showCRMList">Show All Contacts</a></li>
                                    <li><a href="{$SITE_URL}crm/select/">Create Contact</a></li>

                                    <li><a href="{$SITE_URL}crm/showList/3">View Leads</a></li>
                                    <!--
                                    <li><a href="{$SITE_URL}crm/showList/1">All Contacts</a></li>
                                    <li><a href="{$SITE_URL}crm/create/">Create Contact</a></li>
                                    <li><a href="{$SITE_URL}crm/create/9">Create Community/Development</a></li>
                                    <li><a href="{$SITE_URL}crm/create/10">Create Government Agency</a></li>
                                    <li><a href="{$SITE_URL}crm/create/8">Create Company</a></li>
                                    <li><a href="{$SITE_URL}crm/create/6">Create Client</a></li>
                                    <li><a href="{$SITE_URL}crm/create/2">Create Vendor</a></li>
                                    <li><a href="{$SITE_URL}crm/create/11">Create Sub Contractor</a></li>
                                    <li><a href="{$SITE_URL}crm/showList/3">View Leads</a></li>
-->

                                    {IF $USER_ROLE eq 1 }{* admin or office *}
                                    <li class="divider"></li>
                                        <li><a href="{$SITE_URL}crm/employeeList/">Active Employees</a></li>
                                        <li><a href="{$SITE_URL}crm/employeeList/0/1">All Employees</a></li>

                                        <li><a href="{$SITE_URL}crm/categoryList/">CRM Categories</a></li>
                                    <li><a href="{$SITE_URL}crm/servicesList/">CRM Services</a></li>
                                    {/IF}

                                </ul>
                            </li>



                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proposals <i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{$SITE_URL}workorders/showPOList">Search Proposals</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{$SITE_URL}workorders/create">New Proposal</a></li>
                                        <li><a href="{$SITE_URL}workorders/proposalEmailTemplate">Create Proposal Email Template</a>
                                    </ul>
                                </li>

                        {/IF}{* job managers and field emp *}


                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Work Orders <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                {IF $USER_ROLE neq 5 AND $USER_ROLE neq 4 }
                                 <li><a href="{$SITE_URL}workorders/showWOList/">Active Work Orders</a></li>
                                 <li><a href="{$SITE_URL}workorders/showWOList/1">Completed Work Orders</a></li>
                                    <li><a href="{$SITE_URL}workorders/showWOList/3">Billed Work Orders</a></li>
                                    <li><a href="{$SITE_URL}workorders/showWOList/2">All Work Orders</a></li>
                                    {IF $USER_ROLE eq 1 OR $USER_ROLE eq 6 }
                                        <li><a href="{$SITE_URL}workorders/showAdminServiceList/">Manage Services</a></li>
                                    {/IF}
                                    <li><a href="{$SITE_URL}workorders/showServiceList/">Scheduled Services</a></li>
                                {ELSE}{*job managers *}
                                    <li><a href="{$SITE_URL}workorders/showServiceList/">My Schedule</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{$SITE_URL}calendar/showcalendarWO/">My Calendar</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{$SITE_URL}calendar/showcalendarCE/">Company Events</a></li>
                                {/IF}

                            </ul>
                        </li>

                        {IF $USER_ROLE neq 4 AND $USER_ROLE neq 5} {*not a job manager, job managers do not have access to reminders or notes, only daily reports, uploads*}

                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Calendar <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{$SITE_URL}calendar/showcalendarReminder/">My Reminders</a></li>
                                <li class="divider"></li>
                                <li><a href="{$SITE_URL}calendar/showcalendarWO/">Work Orders</a></li>
                                <li class="divider"></li>
                                <li><a href="{$SITE_URL}calendar/showcalendarCE/">Company Events</a></li>
                                {IF $USER_ROLE eq 1 or $USER_ROLE eq 6}
                                <li class="divider"></li>
                                <li><a href="{$SITE_URL}calendar/editcalendarCE/">Edit Company Events</a></li>
                                {/IF}
                            </ul>
                        </li>
                        {/IF}

                        {IF $USER_ROLE eq 1}


                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resources <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{$SITE_URL}resources/vehicleList">Vehicles</a></li>
                                    <li><a href="{$SITE_URL}resources/vehicleTypeList/">Vehicle Types</a></li>
                                    <li><a href="{$SITE_URL}resources/materialsList/">Materials/Rates</a></li>
                                    <li><a href="{$SITE_URL}resources/equipmentList/">Equipment/Rates</a></li>
                                    <li><a href="{$SITE_URL}resources/serviceList/">Services/Rates</a></li>
                                    <li><a href="{$SITE_URL}resources/showLocations/">Company Locations</a></li>
                                    <li><a href="{$SITE_URL}resources/DocTypesList/">Upload Types</a></li>
                                    <!-- We can add manage this later in there is really only one location
                                    <li><a href="{$SITE_URL}resources/">Company Locations</a></li> -->
                                    <li><a href="{$SITE_URL}resources/laborList/">Labor Rates</a></li>
                                    <!--
                                    <li><a href="{$SITE_URL}resources/OtherCosts/">Other Costs</a></li>
                                   -->
                                    <li><a href="{$SITE_URL}resources/multivendorList/">Multi-Vendor Services/Rates</a></li>
                                    <li><a href="{$SITE_URL}bugs/">Report Bug</a></li>

                                </ul>
                            </li>

                    {/IF}
                    {IF $USER_ROLE eq 1 or $USER_ROLE eq 6}
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <i class="fa fa-caret-down"></i></a>

                                                <ul class="dropdown-menu">
                                                    <li><a href="{$SITE_URL}reports/SearchCRM/">CRM</a></li>
                                                    <li><a href="{$SITE_URL}reports/proposal/">Proposals</a></li>
                                                    <li><a href="{$SITE_URL}reports/workorder/">Work Orders</a></li>
                                                    <li><a href="{$SITE_URL}reports/labor/">Labor</a></li>
                                                    </ul>
                                            </li>
                     {/IF}

                    </ul>
                    <!-- / .navbar-nav -->
                    <div class="right clearfix" >
                        <ul class="nav navbar-nav pull-right right-navbar-nav" >
                            <!-- 3. $NAVBAR_ICON_BUTTONS =======================================================================
                                          Navbar Icon Buttons

                                          NOTE: .nav-icon-btn triggers a dropdown menu on desktop screens only. On small screens .nav-icon-btn acts like a hyperlink.

                                          Classes:
                                          * 'nav-icon-btn-info'
                                          * 'nav-icon-btn-success'
                                          * 'nav-icon-btn-warning'
                                          * 'nav-icon-btn-danger'
              -->

                            <!-- /3. $END_NAVBAR_ICON_BUTTONS
                            <li>
                                <form class="navbar-form pull-left">
                                    <input type="text" class="form-control" placeholder="Search">
                                </form>
                            </li>
                            -->
                            <li class="dropdown"> <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown"> <img src="{$SITE_URL}assets/glyphicon/{IF $USER_GENDER == 'M'}glyphicons-35-old-man.png{ELSE}glyphicons-36-woman.png{/IF}"> <span>{$userInfo['USER_FULLNAME']}</span> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{$SITE_URL}crm/viewContactU/"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{$SITE_URL}messages/myMessages/"><i class="dropdown-icon fa fa-envelope-o"></i>&nbsp;&nbsp;<!--<span class="label label-warning pull-right">{$messagecount} New</span>-->Inbox
                                            &nbsp;&nbsp;<span style='color:#000000;
                                    font-size:.75EM;
                                    padding: .2em .25em .15em;
                                    border-style: solid;
                                    border-color: darkblue;
                                    border-width: 1px;
                                	border-radius: 5px;
                                    background:#FF7F50;'>{$messagecount} New</span>
                                        </a></li>
                                    <li><a href="{$SITE_URL}messages/myMessages/"><i class="dropdown-icon fa fa-envelope"></i>&nbsp;&nbsp;New Message</a></li>

                                    <li class="divider"></li>

                                    <li><a href="{$SITE_URL}tasks/addTask/"><i class="dropdown-icon fa fa-tasks"></i>&nbsp;&nbsp;My Tasks</a></li>

                                    <li class="divider"></li>
                                    <li><a href="{$SITE_URL}logout/"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                                   <!--
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="dropdown-icon fa fa-gears"></i>&nbsp;&nbsp;{$system_roles[$USER_ROLE - 1]}</a></li>
                                    -->
                                </ul>
                            </li>
                        </ul>
                        <!-- / .navbar-nav -->
                    </div>
                    <!-- / .right -->
                </div>
            </div>
            <!-- / #main-navbar-collapse -->
        </div>
        <!-- / .navbar-inner -->

        <div class="breadcrumbwrap" >
            <ul class="breadcrumb">
                {$BREADCRUMB}
            </ul>
        </div>
    </div>
    <!-- / #main-navbar -->
    <!-- /2. $END_MAIN_NAVIGATION -->
    <div id="content-wrapper">
