<!DOCTYPE HTML>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">


    <!-- Pixel Admin's stylesheets -->
    <link href="http://allpaving-local.com/assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="http://allpaving-local.com/assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
    <link href="http://allpaving-local.com/assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="http://allpaving-local.com/assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="http://allpaving-local.com/assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
    <link href="http://allpaving-local.com/assets/stylesheets/jquery.ui.core.css" rel="stylesheet" type="text/css">

    <title>3D Paving Application</title>


    <link rel="shortcut icon" href="http://allpaving-local.com/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://allpaving-local.com/favicon.ico" type="image/x-icon">


    <script src="http://allpaving-local.com/assets/javascripts/tools.js"></script>
    <script src="http://allpaving-local.com/assets/javascripts/validate.js"></script>
    <script src="http://allpaving-local.com/assets/javascripts/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="http://allpaving-local.com/assets/javascripts/ie.min.js"></script>
    <![endif]-->
    <!-- Pixel Admin's javascripts TEMPLATE SPECIFIC-->
    <script src="http://allpaving-local.com/assets/javascripts/bootstrap.min.js"></script>
    <script src="http://allpaving-local.com/assets/javascripts/pixel-admin.min.js"></script>


    <script type="text/javascript">



        var popupmsg = '';

        $(document).ready(function(){
            if(popupmsg != '')
            {
                // alert(popupmsg);
            }

        });


        $(document).ready(function(){

            if(popupmsg != '')
            {
                $('#privatemessage').modal('show');
                window.setTimeout("closemessage()",3000);
            }

            $('#buttonclose').click(function() {

                $('#privatemessage').modal('hide');

            });
        });

        function closemessage()
        {
            $('#privatemessage').modal('hide');

        }
    </script>

</head>

<body  class="theme-default main-menu-animated">
<script type="text/javascript">
    var init = [];
</script>
<div id="main-wrapper">

<!--
  Main navigation
-->

<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
    <!-- Main menu toggle -->

    <div class="navbar-inner">
        <!-- Main navbar header -->
        <div class="navbar-header">
            <div class="admin-logo"><img src="http://allpaving-local.com/assets/images/AllPaving-XSmall.png" alt="" ></div>
            <!-- Main navbar toggle -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>
        </div>
        <!-- / .navbar-header -->
        <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
            <div>

                <ul class="nav navbar-nav">
                    <li> <a href="http://allpaving-local.com/dashboard/">Dashboard</a> </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">CRM <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://allpaving-local.com/crm/showList">All Contacts</a></li>
                            <li><a href="http://allpaving-local.com/crm/showList">Clients</a></li>
                            <li><a href="http://allpaving-local.com/crm/showList">Vendors</a></li>
                            <li class="divider"></li>
                            <li><a href="http://allpaving-local.com/crm/employeeList/">Manage Employees</a></li>
                            <li><a href="http://allpaving-local.com/crm/categoryList/">CRM Categories</a></li>
                            <li><a href="http://allpaving-local.com/crm/servicesList/">CRM Services</a></li>

                        </ul>
                    </li>



                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proposals <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://allpaving-local.com/workorders/proposals">All Proposals</a></li>
                            <li class="divider"></li>
                            <li><a href="http://allpaving-local.com/workorders/proposals">New Proposal</a></li>
                            <li><a href="http://allpaving-local.com/workorders/proposals">Prospects</a></li>
                            c                                <li><a href="http://allpaving-local.com/workorders/proposals">Approved</a></li>
                            <li><a href="http://allpaving-local.com/workorders/proposals">Un-Approved</a></li>
                            <li><a href="http://allpaving-local.com/workorders/proposals">Signed</a></li>
                            <li><a href="http://allpaving-local.com/workorders/proposals">Un-Signed</a></li>
                            <li><a href="http://allpaving-local.com/workorders/proposals">Rejected</a></li>
                        </ul>
                    </li>


                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Work Orders <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://allpaving-local.com/workorders/">All Work Orders</a></li>
                            <li class="divider"></li>
                            <li><a href="http://allpaving-local.com/workorders/">In Progress Work Orders</a></li>
                            <li><a href="http://allpaving-local.com/workorders/">Future Work Orders</a></li>
                            <li class="divider"></li>
                            <li><a href="http://allpaving-local.com/workorders/">Completed Work Orders</a></li>
                        </ul>
                    </li>


                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Calendar <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://allpaving-local.com/calendar/">All Events</a></li>
                            <li><a href="http://allpaving-local.com/calendar/">Company Events</a></li>
                            <li class="divider"></li>
                            <li><a href="http://allpaving-local.com/calendar/">Work Orders</a></li>
                            <li><a href="http://allpaving-local.com/calendar/">Reminders</a></li>
                            <li class="divider"></li>
                            <li><a href="http://allpaving-local.com/calendar/showTasks/">My Tasks</a></li>
                        </ul>
                    </li>



                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resources <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://allpaving-local.com/resources/vehicleList">Vehicles</a></li>
                            <li><a href="http://allpaving-local.com/resources/vehicleTypeList/">Vehicle Types</a></li>
                            <li><a href="http://allpaving-local.com/resources/materialsList/">Materials/Rates</a></li>
                            <li><a href="http://allpaving-local.com/resources/equipmentList/">Equipment/Rates</a></li>
                            <li><a href="http://allpaving-local.com/resources/serviceList/">Services/Rates</a></li>
                            <!-- We can add manage this later in there is really only one location
                            <li><a href="http://allpaving-local.com/resources/">Company Locations</a></li> -->
                            <li><a href="http://allpaving-local.com/resources/laborList/">Labor Rates</a></li>
                            <li><a href="http://allpaving-local.com/comingsoon/">Multi-Vendor Services/Rates</a></li>

                        </ul>
                    </li>

                    <li> <a href="http://allpaving-local.com/reports/">Reports</a> </li>

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
                        <li class="dropdown"> <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown"> <img src="http://allpaving-local.com/assets/glyphicon/glyphicons-35-old-man.png"> <span>Michael Trachtenberg</span> </a>
                            <ul class="dropdown-menu">
                                <li><a href="http://allpaving-local.com/comingsoon/"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="http://allpaving-local.com/messages/"><i class="dropdown-icon fa fa-envelope-o"></i>&nbsp;&nbsp;<!--<span class="label label-warning pull-right">0 New</span>-->Inbox
                                        &nbsp;&nbsp;<span style='color:#000000;
                                    font-size:.75EM;
                                    padding: .2em .25em .15em;
                                    border-style: solid;
                                    border-color: darkblue;
                                    border-width: 1px;
                                	border-radius: 5px;
                                    background:#FF7F50;'>0 New</span>
                                    </a></li>
                                <li><a href="http://allpaving-local.com/messages/"><i class="dropdown-icon fa fa-envelope"></i>&nbsp;&nbsp;New Message</a></li>

                                <li class="divider"></li>

                                <li><a href="http://allpaving-local.com/tasks/"><i class="dropdown-icon fa fa-tasks"></i>&nbsp;&nbsp;My Tasks</a></li>
                                <li><a href="http://allpaving-local.com/comingsoon/"><i class="dropdown-icon fa fa-th-list"></i>&nbsp;&nbsp;Add Tasks</a></li>
                                <li class="divider"></li>
                                <li><a href="http://allpaving-local.com/logout/"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="dropdown-icon fa fa-gears"></i>&nbsp;&nbsp;Super Admin</a></li>

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
            <li><a href="http://allpaving-local.com/dashboard">Home</a></li>
            <li class="active">Resources</li><li class="active">Employees</li>
        </ul>
    </div>
</div>
<!-- / #main-navbar -->
<!-- /2. $END_MAIN_NAVIGATION -->
<div id="content-wrapper">

<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-group page-header-icon"></i>&nbsp;&nbsp;Contact Manager</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <!-- "Create project" button, width=auto on desktops -->
                <div class="pull-right col-xs-12 col-sm-auto"><a href="http://allpaving-local.com/comingsoon" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-plus"></span>New Proposal</a> <a href="http://allpaving-local.com/comingsoon" class="btn btn-primary btn-labeled" ><span class="btn-label icon fa fa-plus"></span>New Contact</a></div>
                <!-- Margin -->
                <div class="visible-xs clearfix form-group-margin"></div>
                <!-- Search field -->
                <form action="http://allpaving-local.com/comingsoon" method="post" class="pull-right col-xs-12 col-sm-6">
                    <div class="input-group no-margin"> <span class="input-group-addon" style="border:none;background: #fff;background: rgba(0,0,0,.05);"><i class="fa fa-search"></i></span>
                        <input type="text" name="search" placeholder="Search..." class="form-control no-padding-hr" style="border:none;background: #fff;background: rgba(0,0,0,.05);">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
<div class="col-sm-9">

<script type="text/javascript">

    init.push(function () {


        $('#hd-datepicker-component').datepicker();
        $('#bs-datepicker-component').datepicker();


    });




    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.cntFirstName.value == '')
        {
            alert('You must enter a value for first name');
            form.cntFirstName.focus();
            return false;
        }

        if(form.cntLastName.value == '')
        {
            alert('You must enter a value for last name');
            form.cntLastName.focus();
            return false;
        }

        if(!isEmail(form.cntPrimaryEmail.value))
        {
            alert('Please enter a valid email');
            form.cntPrimaryEmail.focus();
            return false;
        }


        if(form.cntPassword == '' || form.cntPassword.length < 6)
        {
            alert('Password must be at least six (6) characters.');
            form.cntPassword.focus();
            return false;
        }


        if(form.cntHireDate == '')
        {
            alert('You must enter a value for hire date');
            form.cntHireDate.focus();
            return false;
        }

        return true;

    }


</script>

<div class="panel">
<div class="panel-heading">

    <h2>Edit Employee</h2>
    <a class="topbut btn btn-success" href="http://allpaving-local.com/crm/employeeList/"><span class="btn-label icon fa fa-male"></span> List Employees</a>
</div>
<div class="panel-body">
<form action="http://allpaving-local.com/crm/saveEmployee/1"  name="dataform" id="dataform" class="panel" method="POST"
      enctype="multipart/form-data">

<input type="hidden" name="cntId" id="cntId" value="1">
<input type="hidden" name="oldAvatar" value="AVATAR_1_20150216_115108.jpg">

<!-- begin row -->
<div class="row">
    <div style="border: 1px solid dodgerblue; width:500px;height:80px;padding:10px;">
        <div class="col-sm-4">
            <div class="form-group no-margin-hr">
                <label class="control-label"><span style="color:red;">*</span>Role</label>
                <select id="cntRole" name="cntRole" class="form-control" value='1'>
                    <option value='1'>Super Admin</option><option value='2'>Sales Manager</option><option value='3'>Sales Person</option><option value='4'>Job Manager</option><option value='5'>General Employee</option><option value='6'>Office Worker</option>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Allow Internet Access</label>
                <input type="checkbox"  class="checkbox" value="True" id="cntSecAccess" name="cntSecAccess" class="form-control"  checked>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group no-margin-hr">
                <label class="control-label" style="color:red;">Disabled</label>
                <input type="checkbox"  class="checkbox" value="0" id="cntStatusId" name="cntStatusId" class="form-control" >
            </div>
        </div>

    </div>

</div>
<!-- row -->
&nbsp;
<!-- begin row -->
<div class="row">
    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label"><span style="color:red;">*</span>First Name</label>
            <input type="text" id="cntFirstName" name="cntFirstName" class="form-control" value="Michael">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label"><span style="color:red;">*</span>Last Name</label>
            <input type="text" id="cntLastName" name="cntLastName" class="form-control" value="Trachtenberg">
        </div>
    </div>

</div>
<!-- row -->
<!-- begin row -->
<div class="row">
    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label">Middle Name</label>
            <input type="text" id="cntMiddleName" name="cntMiddleName" class="form-control"  value="MI">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label"> Phone</label>
            <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" class="form-control" value="333-333-3333">
        </div>
    </div>

</div>
<!-- row -->
<!-- begin row -->
<div class="row">
    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label">Gender</label><br>
            <input type="radio" class="radio-inline" name="cntGender" id="cntGenderYES" value="M"  checked> MALE
            <input type="radio" class="radio-inline" name="cntGender" id="cntGenderNO" value="F" > FEMALE
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label">Salutation</label>
            <select name="cntSalutation" id="cntSalutation">
                <option>Mr.</option>
                <option>Mr.</option>
                <option>Mrs.</option>
                <option>Ms.</option>
            </select>
        </div>
    </div>
</div>
<!-- row -->


<!-- begin row -->
<div class="row">
    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label">Department</label>
            <input type="text" id="cntDepartment" name="cntDepartment" class="form-control" value='Application Development'>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label">Title</label>
            <input type="text" id="cntJobTitle" name="cntJobTitle" class="form-control" value='Contractor'>
        </div>
    </div>

</div>
<!-- row -->


<!-- begin row -->
<div class="row">
    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label">Date of Birth</label>
            <div class="input-group date" id="bs-datepicker-component">
                <input type="text" id="cntDateOfBirth" name="cntDateOfBirth"  value='01/28/2015'
                       class="form-control">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label">Hire Date</label>
            <div class="input-group date" id="hd-datepicker-component">
                <input type="text" id="cntHireDate" name="cntHireDate"  value='02/25/2015'
                       class="form-control">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
        </div>
    </div>

</div>

<!-- begin row -->
<div class="row">
    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label"><span style="color:red;">*</span>Primary Email</label>
            <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" value='miket@gmail.com'>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label"><span style="color:red;">*</span>Login Password </label>
            <input type="text" id="cntPassword" name="cntPassword" class="form-control" value='3408ekwq'>
            <div class="small">(<i>min length 6 chars</i>)</div>
        </div>
    </div>

</div>
<!-- row -->



<!-- begin row -->
<div class="row">
    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label"> Address Line 1</label>
            <input type="text" id="cntPrimaryAddress1" name="cntPrimaryAddress1" class="form-control" value="123 street">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label">Address line 2</label>
            <input type="text" id="cntPrimaryAddress2" name="cntPrimaryAddress2" class="form-control" value="suite 18">
        </div>
    </div>

</div>
<!-- row -->

<!-- begin row -->
<div class="row">
    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label"> State</label>
            <select id="cntPrimaryState" name="cntPrimaryState" class="form-control">
                <option  value="FL">FL</option>
                <option value='FL'>Florida</option>
            </select>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label">Zip Code</label>
            <input type="text" id="cntPrimaryZip" name="cntPrimaryZip" class="form-control" value="33326" >
        </div>
    </div>

</div>
<!-- row -->
<!-- begin row -->
<div class="row">
    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <input type="hidden" name="oldAvatar" id="oldAvatar" value="AVATAR_1_20150216_115108.jpg">
            <img src="http://allpaving-local.com/media/crm/AVATAR_1_20150216_115108.jpg" border="0" alt="User Avatar" width='100' /> </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group no-margin-hr">
            <label class="control-label">    Replace Picture</label>
            <input type="file" name="avatar" id="avatar">

        </div>
    </div>
</div>
<!-- row -->
<!-- begin row -->
<div class="row">
    <div class="col-sm-5">
    </>Remove Current Image</i>
    <input type="checkbox" id="removeAvatar" name="removeAvatar" class="checkbox-inline" value="1">                </div>
</div>
</div>
<!-- row -->

<!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Employee</a>
    </div>
    <div class="col-sm-2">
        <a href="http://allpaving-local.com/crm/employeeList/" class="btn btn-primary btn-labeled">Cancel</a>
    </div>
</div>
</form>
</div>
</div>







</div>
<div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
    <!--events -->

    <div class="stat-cell" style='vertical-align: top;'>
        <div class="eventswrapper"  style="min-height:350px;vertical-align: top;">
            <h2>My Tasks</h2>
            <span class="btn center-block text-center"> <a id="popover" href="http://allpaving-local.com/comingsoon" data-toggle="popover">add task</a> </span>

            <div class="notifications-list">

                <div class="notification">
                    <div class="notification-description"><div class="notification-icon fa fa-clock-o"></div>&nbsp;<a href="http://allpaving-local.com/comingsoon/">Work in new project.</a>
                        <div class="notification-ago">

                        </div>
                    </div>
                </div>
                <!-- / .notification -->

                <div class="notification">
                    <div class="notification-description"><div class="notification-icon fa fa-clock-o"></div>&nbsp;Walk the Dog.
                        <div class="notification-ago">

                        </div>
                    </div>
                </div>
                <!-- / .notification -->


                <div class="notification">
                    <div class="notification-description"><div class="notification-icon fa fa-clock-o"></div>&nbsp;Call your mom.
                        <div class="notification-ago">

                        </div>
                    </div>
                </div>
                <!-- / .notification -->


                <div class="notification">
                    <div class="notification-description"><div class="notification-icon fa fa-clock-o"></div>&nbsp;Nice day for the park.
                        <div class="notification-ago">

                        </div>
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
<!-- / #content-wrapper -->

<div id='copyright' style='float:right;padding-right:50px;'>copyright&copy; 3D Paving 2015</div>
</div>



<!-- / #main-wrapper -->
<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.PixelAdmin.start(init);
</script>
<!-- message div
-->
<div id="privatemessage" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title" id="myModalLabel">Information Message</h4>
            </div>
            <div class="modal-body">


            </div>
        </div>
    </div>
</div>
<!-- end modal -->
</body>
</html>
