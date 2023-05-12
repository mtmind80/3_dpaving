<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-25 15:26:05
         compiled from "application/views/templates/workorders/woServicelist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1341777291588917ed352d74-05306513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f80467c208355b3259a49bed5854fdc2d34f11dd' => 
    array (
      0 => 'application/views/templates/workorders/woServicelist.tpl',
      1 => 1474396090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1341777291588917ed352d74-05306513',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'services' => 0,
    'p' => 0,
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_588917ed3cb9b4_81749277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588917ed3cb9b4_81749277')) {function content_588917ed3cb9b4_81749277($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>

<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<style>
@media (max-width: 768px){
    #main-wrapper {
        padding: 0px !important;
    }
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
    });


    function Swoop(dURL)
    {
        window.open(dURL, "MsgWindow", "width=600,height=600,scrollbars=yes");

    }

<?php echo '</script'; ?>
>
<!-- / Javascript -->
<div class="panel">
    <div class="panel-heading">

        <h2>Work Order Scheduled Services</h2>

    </div>
    <div class="panel-body">
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th width='10%'>WorkOrder</th>
                    <th width='25%'>Service</th>
                    <th width='20%'>Schedule</th>
                    <th width='25%'>Location</th>
                    <th width='20%'>Tools</th>
                </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                    <tr class="even gradeA">

                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['p']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['p']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['p']->value['jobMasterNumber']);?>

                    </td>
                    <td class="text-left">
                        <?php echo $_smarty_tpl->tpl_vars['p']->value['jordName'];?>

                        <?php if ($_smarty_tpl->tpl_vars['p']->value['jordAddress1']!='') {?>

                            <br/>
                            <a href="Javascript:showUserOnMap('<?php echo $_smarty_tpl->tpl_vars['p']->value['jordName'];?>
', '<?php echo $_smarty_tpl->tpl_vars['p']->value['jordAddress1'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['jordAddress2'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['jordCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['p']->value['jordState'];?>
. <?php echo $_smarty_tpl->tpl_vars['p']->value['jordZip'];?>
');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
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
                            Start: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['jordStartDate'],"%A, %B %e, %Y");?>

                            <br/>End: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['jordEndDate'],"%A, %B %e, %Y");?>


                        </td>

                        <td class="text-left">
                            <?php echo $_smarty_tpl->tpl_vars['p']->value['jordAddress1'];?>

                            <?php if ($_smarty_tpl->tpl_vars['p']->value['jordAddress2']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['p']->value['jordAddress2'];
}?>
                            <?php echo $_smarty_tpl->tpl_vars['p']->value['jordCity'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['jordState'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['jordZip'];?>

                        </td>

                    <td class="text-center">
                        <table><td valign="top" style="text-align:justify;">
                                <a  href="javascript:Swoop('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOServiceDetailView/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobid'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
');">Print Service</a>
                                <?php if ($_smarty_tpl->tpl_vars['p']->value['jordStatus']=='COMPLETED'||$_smarty_tpl->tpl_vars['p']->value['jordStatus']=='CANCELLED') {?>
                                <?php } else { ?>
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
