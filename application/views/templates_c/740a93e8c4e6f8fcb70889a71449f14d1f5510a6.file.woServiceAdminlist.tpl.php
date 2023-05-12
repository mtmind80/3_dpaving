<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-25 15:26:23
         compiled from "application/views/templates/workorders/woServiceAdminlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2050200901588917ffe09335-85704212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '740a93e8c4e6f8fcb70889a71449f14d1f5510a6' => 
    array (
      0 => 'application/views/templates/workorders/woServiceAdminlist.tpl',
      1 => 1480480987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2050200901588917ffe09335-85704212',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'count' => 0,
    'SITE_URL' => 0,
    'STATUS_CB' => 0,
    'select' => 0,
    'JOB_MANAGERS_CB' => 0,
    'SALES_MANAGERS_CB' => 0,
    'CUSTOMERS_CB' => 0,
    'SERVICE_NAMES_CB' => 0,
    'services' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58891800099e70_84339883',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58891800099e70_84339883')) {function content_58891800099e70_84339883($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>
<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?v=2&key=AIzaSyB9snLiu1GX5LRjrzXSZ4OIL8RRsmXKTGs" type="text/javascript"><?php echo '</script'; ?>
>
<style>
    #map_canvas {
        height: 600px;
        width: 600px;
        margin: 50px auto;
        padding: 0px;
        position: absolute;
        top: 1em;
        right: 1em;
        z-index:1000;
        display:none;
    }
</style>
<?php echo '<script'; ?>
>
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


        $("#selectall").click(function(){
            //alert("just for check");
            if(this.checked){
                $('.checkboxall').each(function(){
                    this.checked = true;


                })
            }else{
                $('.checkboxall').each(function(){
                    this.checked = false;


                })
            }
        });

    });


    function Swoop(dURL)
    {
        window.open(dURL, "MsgWindow", "width=600,height=600,scrollbars=yes");

    }

    $(document).ready(function() {


        $( "#showadvanced" ).click(function() {
            $("#advancedsearch").show();
        });

        $( "#hideadvanced" ).click(function() {
            $("#advancedsearch").hide();
        });


         var locations = [];

        var geocoder;
        var map;
        var bounds = new google.maps.LatLngBounds();

        function initialize(locations) {
            map = new google.maps.Map(
                    document.getElementById("map_canvas"), {
                        //center: new google.maps.LatLng(37.4419, -122.1419),
                        zoom: 16,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
            );
            geocoder = new google.maps.Geocoder();
        if(locations.length <= 8 )
        {
            for (i = 0; i < locations.length; i++)
            {
                geocodeAddress(locations, i);

            }
        }
        else
        {
            alert("No more than 8 addresses at a time");
            for (i = 0; i < 8; i++)
            {
                geocodeAddress(locations, i);

            }
        }

        }

        function geocodeAddress(locations, i) {
            var title = locations[i][0];
            var address = locations[i][1];
            var url = locations[i][2];
            geocoder.geocode({
                        'address': locations[i][1]
                    },
                    function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            var marker = new google.maps.Marker({
                                //  icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                                map: map,
                                position: results[0].geometry.location,
                                title: title,
                                animation: google.maps.Animation.DROP,
                                address: address,
                                url: url
                            })
                            infoWindow(marker, map, title, address, url);
                            bounds.extend(marker.getPosition());
                            map.fitBounds(bounds);
                        } else {
                            alert("geocode of " + address + " failed:" + status);
                        }
                    });
        }

        function infoWindow(marker, map, title, address, url) {
            google.maps.event.addListener(marker, 'click', function() {
                var html = "<div><h3>" + title + "</h3><p>" + address + "<br></div><a href='" + url + "'>View location</a></p></div>";
                iw = new google.maps.InfoWindow({
                    content: html,
                    maxWidth: 350
                });
                iw.open(map, marker);
            });
        }

        function createMarker(results) {
            var marker = new google.maps.Marker({
                //icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                map: map,
                position: results[0].geometry.location,
                title: title,
                animation: google.maps.Animation.DROP,
                address: address,
                url: url,
                icon: image
            })
            bounds.extend(marker.getPosition());
            map.fitBounds(bounds);
            infoWindow(marker, map, title, address, url);
            return marker;
        }



        $( "#hidemap" ).click(function() {

            $("#map_canvas").fadeOut();
        });


        $( "#showmap" ).click(function() {
           // alert('we are here');

            locations = [];


            $("#jq-datatables-example input:checkbox:checked").map(function(){

                arr = [];
                var fullAddress;
                var encAddress;
                fullAddress = $(this).attr("data-address");
                fullAddress.replace(/(\s+)/g, '+');
                encAddress = fullAddress.replace(/,/g, '');
                arr.push($(this).attr("data-title"));
                arr.push(encAddress);
                arr.push("URL");
                arr.push([]);

                locations.push(arr);
            });

            if(locations.length == 0 )
            {
                alert('Select an address to map.');
                return
            }
            initialize(locations);
            if(initialize ==0)
            {
                return false;
            }
            //google.maps.event.addDomListener(document.getElementById("render_map"), "click", initialize);

            $("#map_canvas").fadeIn();
           console.log(locations);
        });

    });

<?php echo '</script'; ?>
>
<!-- / Javascript -->
<div class="panel">
    <div class="panel-heading">


        <div id="map_canvas" style="border: 2px solid #3872ac;"></div>

        <h2>Work Order Scheduled Services</h2>
        <span id="showadvanced" style='cursor: pointer;'>Show Advanced Filters  </span> &nbsp; &nbsp;
        <span style='font-size:0.8EM;font-style:italic;color:darkblue;'>records found:<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</span>
        &nbsp; &nbsp;
            <div id="aamarine" style="float:right;margin-top:-20px;">
            <span id="showmap" class="btn btn-primary" style='cursor: pointer;'>Show Map  </span> &nbsp; &nbsp;
            <span id="hidemap" class="btn btn-primary" style='cursor: pointer;'>Hide Map  </span> &nbsp; &nbsp;
            </div>
    </div>

 <div  id='advancedsearch'>
    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showAdminServiceList" id='filter'>
        <div class="panel">
        <input type="hidden" id='beenhere' name='beenhere' value='1'>
    <div class="row">
        <div class="col-sm-4">
             Status: 
            <select class="form-control" name="status" id="status">
                <option value="0" selected>ANY</option>
                <?php  $_smarty_tpl->tpl_vars['select'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['select']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['STATUS_CB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['select']->key => $_smarty_tpl->tpl_vars['select']->value) {
$_smarty_tpl->tpl_vars['select']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['select']->value['OrderStatus'];?>
"><?php echo $_smarty_tpl->tpl_vars['select']->value['OrderStatus'];?>
</option>
                <?php } ?>
            </select>
        </div>
        <div class="col-sm-4">
             Job Manager: 
            <select class="form-control"  multiple="multiple" name="jobmanagerid[]" id="jobmanagerid">
                <option value="0" selected>ANY</option>
                <?php  $_smarty_tpl->tpl_vars['select'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['select']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['JOB_MANAGERS_CB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['select']->key => $_smarty_tpl->tpl_vars['select']->value) {
$_smarty_tpl->tpl_vars['select']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['select']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['select']->value['FULL_NAME'];?>
</option>
                <?php } ?>

            </select>
        </div>
        <div class="col-sm-4">
             Estimator: 
            <select class="form-control"  multiple="multiple"  name="salesmanagerid[]" id="jsalesmanagerid">
                <option value="0" selected>ANY</option>
                <?php  $_smarty_tpl->tpl_vars['select'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['select']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SALES_MANAGERS_CB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['select']->key => $_smarty_tpl->tpl_vars['select']->value) {
$_smarty_tpl->tpl_vars['select']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['select']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['select']->value['FULL_NAME'];?>
</option>
                <?php } ?>
            </select>
        </div>
    </div>
            <br/>
    <div class="row">
        <div class="col-sm-4">
             Customer Name: 
            <select class="form-control" name="customerid" id="customerid">
                <option value="0" selected>ANY</option>
                <?php  $_smarty_tpl->tpl_vars['select'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['select']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CUSTOMERS_CB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['select']->key => $_smarty_tpl->tpl_vars['select']->value) {
$_smarty_tpl->tpl_vars['select']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['select']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['select']->value['FULL_NAME'];?>
</option>
                <?php } ?>

            </select>
        </div>
        <div class="col-sm-4">
             Services: 
            <select class="form-control"  multiple="multiple" name="servicecategory[]" id="servicecategory">
                <option value="0" selected>ANY</option>
                <?php  $_smarty_tpl->tpl_vars['select'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['select']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SERVICE_NAMES_CB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['select']->key => $_smarty_tpl->tpl_vars['select']->value) {
$_smarty_tpl->tpl_vars['select']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['select']->value['cmpServiceID'];?>
"><?php echo $_smarty_tpl->tpl_vars['select']->value['catname'];?>
 - <?php echo $_smarty_tpl->tpl_vars['select']->value['cmpServiceName'];?>
</option>
                <?php } ?>

            </select>
        </div>
        <div class="col-sm-4">
             Address <span class="hint">(Enter Street, City, State or ZipCode)</span>: 
            <div>
                <input name="address" id="address" size="35" class="form-control">
            </div>
        </div>
    </div>
            <br/>
    <div class="row">
        <div class="col-sm-12">
            <a href="Javascript:filter.submit();" class="btn btn-sm btn-primary btn-labeled"><span class="btn-label icon fa fa-filter"></span> Apply Filter</a> &nbsp;
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showAdminServiceList" class="btn btn-sm btn-pa-purple btn-labeled"><span class="btn-label icon fa fa-list"></span> Show All</a>
            <a href="#" class="btn btn-sm btn-primary btn-labeled" id="hideadvanced"><span class="btn-label icon fa fa-circle"></span> Hide Advanced</a> &nbsp;

        </div>
    </div>
 </div>
</form>

</div>

       </div>
    <div class="panel-body">
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th colspan='6' ><input type="checkbox" id="selectall"> select all
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <th width='25'></th>
                    <th width='255'>Service</th>
                    <th width='255'>Customer</th>
                    <th width='180'>Status</th>
                    <th width='215'>Assigned</th>
                    <th width='110'>Tools</th>
                </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                    <tr class="even gradeA">

                        <td class="text-left">
                        <span style='font-size:0.8EM;color:Green'>
                            <input type='checkbox' class='checkboxall' id='check<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
' name='check@@<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
' data-address="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['jordAddress1'], ENT_QUOTES, 'UTF-8', true);?>
  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['jordCity'], ENT_QUOTES, 'UTF-8', true);?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['jordState'], ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['p']->value['jordZip']!="0") {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['jordZip'], ENT_QUOTES, 'UTF-8', true);
}?>" data-title="<?php echo $_smarty_tpl->tpl_vars['p']->value['jordName'];?>
"  value="<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">
                            </span>
                        </td>

                    <td class="text-left">
                        <?php echo $_smarty_tpl->tpl_vars['p']->value['cmpServiceCat'];?>
<br/><?php echo $_smarty_tpl->tpl_vars['p']->value['ServiceName'];?>

                        <br/>
                        <span style='font-size:0.8EM;color:Green'>Work order#:
                            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPreview/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobid'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['p']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['p']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['p']->value['jobMasterNumber']);?>
</a></span>
                        <?php if ($_smarty_tpl->tpl_vars['p']->value['jordAddress1']!='') {?>

                            <br/>
                            <a href="Javascript:showUserOnMap('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['jordName'], ENT_QUOTES, 'UTF-8', true);?>
', '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['jordAddress1'], ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['jordCity'], ENT_QUOTES, 'UTF-8', true);?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['jordState'], ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['p']->value['jordZip']!=0) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['jordZip'], ENT_QUOTES, 'UTF-8', true);
}?> ');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                            <a href="https://www.google.com/#q=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['p']->value['jordAddress1'],' ','+');?>
+<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['p']->value['jordCity'],' ','+');?>
+<?php echo $_smarty_tpl->tpl_vars['p']->value['jordState'];?>
+<?php echo $_smarty_tpl->tpl_vars['p']->value['jordZip'];?>
" title="Directions" target="Drive"><span class=" icon fa fa-truck"></span></a> &nbsp;
                            <?php echo $_smarty_tpl->tpl_vars['p']->value['jordAddress1'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['jordAddress2'];?>

                            <br/><?php echo $_smarty_tpl->tpl_vars['p']->value['jordCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['p']->value['jordState'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['jordZip'];?>


                            <?php }?>



                    </td>


                        <td class="text-left">
                        <?php echo $_smarty_tpl->tpl_vars['p']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['cntLastName'];?>

                            <br/>
                           <span style='font-size:1EM;color:Darkgreen'> Service:<?php echo $_smarty_tpl->tpl_vars['p']->value['jordName'];?>
</span>
                            <br/>
                            <span style='font-size:0.8EM;'> Proposal:<?php echo $_smarty_tpl->tpl_vars['p']->value['jobName'];?>
</span>
                        </td>

                        <td class="text-left">
                                <?php echo $_smarty_tpl->tpl_vars['p']->value['jordStatus'];?>

                            <?php if ($_smarty_tpl->tpl_vars['p']->value['jordStatus']=="SCHEDULED") {?>
                            <span style='font-size:0.8EM;'>
                            <br/>Start: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['jordStartDate'],"%A, %B %e, %Y");?>

                            <br/>End: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['jordEndDate'],"%A, %B %e, %Y");?>

                            </span>
                            <?php }?>
                            <br/>

                    <span style='font-size:0.9EM;color:d00000'>
                      
                                <?php if ($_smarty_tpl->tpl_vars['p']->value['cmpServiceCat']=='Asphalt') {?>



                                    <?php if ($_smarty_tpl->tpl_vars['p']->value['cmpServiceID']==19||$_smarty_tpl->tpl_vars['p']->value['cmpServiceID']==22||$_smarty_tpl->tpl_vars['p']->value['cmpServiceID']==5) {?>
                                         Depth In Inches 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordDepthInInches'];?>

                                        <br/>
                                         SQ. Yards 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordSQYards'];?>



                                    <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['cmpServiceID']==3) {?> 

                                         Size of project in SQ FT 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordSquareFeet'];?>

                                        <br/>
                                         Locations 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordLocations'];?>



                                    <?php } else { ?> 

                                         SQ. Yards 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordSQYards'];?>

                                        <br/>
                                         Depth In Inches 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordDepthInInches'];?>


                                    <?php }?>



                                <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['cmpServiceCat']=='Concrete') {?>


                                    <?php if ($_smarty_tpl->tpl_vars['p']->value['cmpServiceID']<=12) {?> 

                                         Length In Feet (linear feet) 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordLinearFeet'];?>


                                        <br/>
                                         Locations 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordLocations'];?>




                                    <?php } else { ?> 
                                         Sq. Ft. 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordSquareFeet'];?>


                                        <br/>
                                         Locations 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordLocations'];?>

                                    <?php }?>

                                <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['cmpServiceCat']=='Excavation') {?>

                                     Sq. Ft. 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordSquareFeet'];?>

                                    <br/>
                                     Depth In inches 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordDepthInInches'];?>



                                <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['cmpServiceCat']=='Other') {?>


                                     Description 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordVendorServiceDescription'];?>




                                <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['cmpServiceCat']=='Rock') {?>



                                     SQ . Ft. 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordSquareFeet'];?>

                                    <br/>
                                     Depth In inches 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordDepthInInches'];?>

                                    <br/>

                                <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['cmpServiceCat']=='Seal Coating') {?>

                                     SQ. FT. 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordSquareFeet'];?>


                                    <br/>
                                     Phases 

                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordPhases'];?>



                                <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['cmpServiceCat']=='Striping') {?>



                                <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['cmpServiceCat']=='Sub Contractor') {?>

                                     Sub Contractor 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['subfirstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['sublastname'];?>


                                <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['cmpServiceCat']=='Paver Brick') {?>

                                     SQ. Ft. 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordSquareFeet'];?>

                                    <br/>

                                <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['cmpServiceCat']=='Drainage and Catchbasins') {?>


                                     Number of Catch Basins 
                                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordAdditive'];?>

                                <?php } else { ?>

                               <!--     xxxxxxxxxxxxxxxxxxxxxxxxxxxxx    ALERT:UNKNOWN SERVICE    xxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

                                <?php }?>


                        </span>

                        </td>

                        <td class="text-left">
                            Estimator: <?php echo $_smarty_tpl->tpl_vars['p']->value['managerFirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['managerLast'];?>

                            <br/>Job: <?php echo $_smarty_tpl->tpl_vars['p']->value['jobmanagerFirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['jobmanagerLast'];?>


                        </td>

                    <td class="text-center">
                        <table><td valign="top" style="font-size:0.8EM;text-align:left;">
                                <a  href="javascript:Swoop('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOServiceDetailView/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobid'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
');">Print Service</a>
                                <?php if ($_smarty_tpl->tpl_vars['p']->value['jordStatus']=='COMPLETED'||$_smarty_tpl->tpl_vars['p']->value['jordStatus']=='CANCELLED'||$_smarty_tpl->tpl_vars['p']->value['jordStatus']=='PENDING') {?>

                                    <?php if ($_smarty_tpl->tpl_vars['p']->value['jordStatus']=='PENDING') {?>
                                        <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOChangeStatus/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">Remove Hold</a>

                                    <?php }?>
                                <?php } else { ?>
                                        <?php if ($_smarty_tpl->tpl_vars['p']->value['wopID']!=null&&$_smarty_tpl->tpl_vars['p']->value['wopStatus']!='Completed') {?>
                                        <br/><span style='color:red'>Permits Required</span>
                                        <?php } else { ?>
                                            <?php if (!empty($_smarty_tpl->tpl_vars['p']->value['jordStartDate'])) {?>
                                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOSchedule/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">Change Schedule</a>
                                            <?php } else { ?>
                                                <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOSchedule/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">Schedule Service</a>
                                            <?php }?>
                                            
                                            <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOChecklistPJM/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">Pre-Day Checklist</a>
                                            <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOChecklistEJM/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">End of Day Checklist</a>
                                            <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMediaJM/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">Upload Media</a>
                                            <br /><a  href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOServiceCompletedJM/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
','You are about to close out this service and mark it as completed.\nAre you sure?')">Mark Completed</a>
                                        <?php }?>
                                 <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOChangeStatus/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">Put On Hold</a>

                                 <?php }?>
                            </td></table>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->

<div aria-hidden="true" role="dialog" tabindex="-1" id="googleMapModal" class="modal fade bootstrap-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                <h4 class="modal-title" id="googleMapModalTitle">Map</h4>
            </div>
            <div class="modal-body" id="googleMapModalText">
                <div id="googleMapContainer"></div>
            </div>
        </div>
    </div>
</div>
<a id="triggerGoogleMapModal" href="#googleMapModal" data-toggle="modal"></a>

<?php echo '<script'; ?>
>
    
    var fullAddress,
            encAddress,
            locName;

    function showUserOnMap(userName, userAddress)
    {
        fullAddress = userAddress;
        encAddress = fullAddress.replace(/(\s+)/g, '+');
        encAddress = fullAddress.replace(/,/g, '');
        locName = userName;

        $('#googleMapModalTitle').text(locName);

        $('#triggerGoogleMapModal').click();
    }

    $(document).ready(function(){

        $("#googleMapModal").on('shown.bs.modal', function(){
            $.post(
                    'https://maps.googleapis.com/maps/api/geocode/json?address='+ encAddress +'&sensor=false',
                    function(response){
                        if (response.status == 'OK' && typeof response.results[0].geometry.location.lat != 'undefined' && typeof response.results[0].geometry.location.lng != 'undefined') {
                            var mapLatitude = response.results[0].geometry.location.lat,
                                    mapLongitude = response.results[0].geometry.location.lng,
                                    infowindow = '<p><strong>' + locName + '</strong><br />' + fullAddress + '<p>';

                            $("#googleMapContainer").gmap3({
                                map:{
                                    options: {
                                        center: [mapLatitude, mapLongitude],
                                        zoom: 13
                                    }
                                },
                                marker:{
                                    values: [{
                                        latLng: [mapLatitude, mapLongitude],
                                        data: infowindow
                                    }],
                                    options:{
                                        draggable: false
                                    },
                                    events:{
                                        mouseover: function(marker, event, context){
                                            var map = $(this).gmap3("get"),
                                                    infowindow = $(this).gmap3({get: {name: "infowindow"}});
                                            if (infowindow){
                                                infowindow.open(map, marker);
                                                infowindow.setContent(context.data);
                                            } else {
                                                $(this).gmap3({
                                                    infowindow:{
                                                        anchor:marker,
                                                        options:{content: context.data}
                                                    }
                                                });
                                            }
                                        }
                                    }
                                }
                            });
                        } else {
                            alert('Sorry. The address could not be resolved.');
                        }
                    }
            );
        });
    });
<?php echo '</script'; ?>
>

<?php }} ?>
