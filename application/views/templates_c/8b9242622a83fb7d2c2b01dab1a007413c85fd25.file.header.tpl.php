<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-16 16:31:19
         compiled from "application/views/templates/core/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1445736910587d49b7297995-82269114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b9242622a83fb7d2c2b01dab1a007413c85fd25' => 
    array (
      0 => 'application/views/templates/core/header.tpl',
      1 => 1479245823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1445736910587d49b7297995-82269114',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'USER_ROLE' => 0,
    'USER_GENDER' => 0,
    'userInfo' => 0,
    'messagecount' => 0,
    'system_roles' => 0,
    'BREADCRUMB' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_587d49b732a7f0_78126335',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587d49b732a7f0_78126335')) {function content_587d49b732a7f0_78126335($_smarty_tpl) {?><div id="main-wrapper">

    <!--
      Main navigation
  -->

    <div id="main-navbar" class="navbar navbar-inverse" role="navigation">
        <!-- Main menu toggle -->

        <div class="navbar-inner">
            <!-- Main navbar header -->
            <div class="navbar-header">
                <div class="admin-logo"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/images/AllPaving-XSmall.png" alt="" ></div>
                <!-- Main navbar toggle -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>
            </div>
            <!-- / .navbar-header -->
            <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
                <div>
                    
                    <ul class="nav navbar-nav">
                        <li > <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
dashboard/">Dashboard</a> </li>
                        <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value!=5&&$_smarty_tpl->tpl_vars['USER_ROLE']->value!=4) {?>
                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">CRM <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showList/1">Advanced Search</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showCRMList">Show All Contacts</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/select/">Create Contact</a></li>

                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showList/3">View Leads</a></li>
                                    <!--
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showList/1">All Contacts</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/create/">Create Contact</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/create/9">Create Community/Development</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/create/10">Create Government Agency</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/create/8">Create Company</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/create/6">Create Client</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/create/2">Create Vendor</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/create/11">Create Sub Contractor</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showList/3">View Leads</a></li>
-->

                                    <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>
                                    <li class="divider"></li>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/">Active Employees</a></li>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/0/1">All Employees</a></li>

                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/categoryList/">CRM Categories</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/servicesList/">CRM Services</a></li>
                                    <?php }?>

                                </ul>
                            </li>



                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proposals <i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList">All Proposals</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/create">New Proposal</a></li>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/proposalEmailTemplate">Create Proposal Email Template</a>
                                    </ul>
                                </li>

                        <?php }?>


                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Work Orders <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value!=5&&$_smarty_tpl->tpl_vars['USER_ROLE']->value!=4) {?>
                                 <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showWOList/">Active Work Orders</a></li>
                                 <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showWOList/1">Completed Work Orders</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showWOList/3">Billed Work Orders</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showWOList/2">All Work Orders</a></li>
                                    <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showAdminServiceList/">Manage Services</a></li>
                                    <?php }?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showServiceList/">Scheduled Services</a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showServiceList/">My Schedule</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarWO/">My Calendar</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/">Company Events</a></li>
                                <?php }?>

                            </ul>
                        </li>

                        <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value!=4&&$_smarty_tpl->tpl_vars['USER_ROLE']->value!=5) {?> 

                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Calendar <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarReminder/">My Reminders</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarWO/">Work Orders</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/showcalendarCE/">Company Events</a></li>
                                <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>
                                <li class="divider"></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
calendar/editcalendarCE/">Edit Company Events</a></li>
                                <?php }?>
                            </ul>
                        </li>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>


                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resources <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/vehicleList">Vehicles</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/vehicleTypeList/">Vehicle Types</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/materialsList/">Materials/Rates</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/equipmentList/">Equipment/Rates</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/serviceList/">Services/Rates</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/showLocations/">Company Locations</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/DocTypesList/">Upload Types</a></li>
                                    <!-- We can add manage this later in there is really only one location
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/">Company Locations</a></li> -->
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/laborList/">Labor Rates</a></li>
                                    <!--
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/OtherCosts/">Other Costs</a></li>
                                   -->
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/multivendorList/">Multi-Vendor Services/Rates</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
bugs/">Report Bug</a></li>

                                </ul>
                            </li>

                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <i class="fa fa-caret-down"></i></a>

                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/SearchCRM/">CRM</a></li>
                                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/proposal/">Proposals</a></li>
                                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/workorder/">Work Orders</a></li>
                                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/labor/">Labor</a></li>
                                                    </ul>
                                            </li>
                     <?php }?>

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
                            <li class="dropdown"> <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown"> <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/glyphicon/<?php if ($_smarty_tpl->tpl_vars['USER_GENDER']->value=='M') {?>glyphicons-35-old-man.png<?php } else { ?>glyphicons-36-woman.png<?php }?>"> <span><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['USER_FULLNAME'];?>
</span> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContactU/"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
messages/myMessages/"><i class="dropdown-icon fa fa-envelope-o"></i>&nbsp;&nbsp;<!--<span class="label label-warning pull-right"><?php echo $_smarty_tpl->tpl_vars['messagecount']->value;?>
 New</span>-->Inbox
                                            &nbsp;&nbsp;<span style='color:#000000;
                                    font-size:.75EM;
                                    padding: .2em .25em .15em;
                                    border-style: solid;
                                    border-color: darkblue;
                                    border-width: 1px;
                                	border-radius: 5px;
                                    background:#FF7F50;'><?php echo $_smarty_tpl->tpl_vars['messagecount']->value;?>
 New</span>
                                        </a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
messages/myMessages/"><i class="dropdown-icon fa fa-envelope"></i>&nbsp;&nbsp;New Message</a></li>

                                    <li class="divider"></li>

                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
tasks/addTask/"><i class="dropdown-icon fa fa-tasks"></i>&nbsp;&nbsp;My Tasks</a></li>

                                    <li class="divider"></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
logout/"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                                   <!--
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="dropdown-icon fa fa-gears"></i>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['system_roles']->value[$_smarty_tpl->tpl_vars['USER_ROLE']->value-1];?>
</a></li>
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
                <?php echo $_smarty_tpl->tpl_vars['BREADCRUMB']->value;?>

            </ul>
        </div>
    </div>
    <!-- / #main-navbar -->
    <!-- /2. $END_MAIN_NAVIGATION -->
    <div id="content-wrapper"><?php }} ?>
