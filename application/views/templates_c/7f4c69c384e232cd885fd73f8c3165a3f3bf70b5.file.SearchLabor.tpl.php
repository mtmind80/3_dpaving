<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-02 07:42:31
         compiled from "application/views/templates/reports/SearchLabor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132479815458933747a93488-23036349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f4c69c384e232cd885fd73f8c3165a3f3bf70b5' => 
    array (
      0 => 'application/views/templates/reports/SearchLabor.tpl',
      1 => 1465508952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132479815458933747a93488-23036349',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'empListCB' => 0,
    'cblist' => 0,
    'beenhere' => 0,
    'data' => 0,
    'searchStart' => 0,
    'searchEnd' => 0,
    'searchtype' => 0,
    'p' => 0,
    'td' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58933747b28260_55668681',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58933747b28260_55668681')) {function content_58933747b28260_55668681($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>

<?php echo '<script'; ?>
 src="https://maps.google.com/maps/api/js?sensor=false"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/gmap3.min.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">

   $( document ).ready(function() {

    //bind actions
       $('#searchEnd').datepicker({
           dateFormat: 'mm-dd-yy'
       });
       $('#searchStart').datepicker({
           dateFormat: 'mm-dd-yy'
       });



   });





   function CHECKIT(form,exprt)
   {
       if(!test(form)){ return;
       }

       if(exprt === 1)
       {

           form.action = "<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/exportLabor/";
           showSpinner('Please wait while we format your report.');
           form.submit();
           myvar = setTimeout("hideSpinner()",5000);
           return;

       }

       showSpinner('Please wait..');
       form.submit();

   }

   function test(form)
   {


       if(form.searchStart.value == '' || form.searchEnd.value == '')
       {
           alert("You must select a date range for your report. You left those fields blank.");
           return false;
       }

       return true;

   }





<?php echo '</script'; ?>
>
<div class="panel">
    <div class="panel-heading">

        <h2>Labor Report</h2>

    </div>

    <div class="panel-heading">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/labor/" id="searchform" name="searchform">
                <input type="hidden" name="beenhere" value="1" />
                <p>
                </p> <p style='border:solid 1px lightblue;width:98%; padding:5px;'>
                    Employee: <select name='POEmpID' id='POEmpID'>
                        <option value="0">All Employees</option>
                        <?php  $_smarty_tpl->tpl_vars['cblist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cblist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['empListCB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cblist']->key => $_smarty_tpl->tpl_vars['cblist']->value) {
$_smarty_tpl->tpl_vars['cblist']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntLastName'];?>
</option>
                        <?php } ?>
                    </select>
                    &nbsp;

                    Start Date: <input type='text' name="searchStart" id="searchStart" value="" size='12' />  &nbsp;
                    &nbsp; End Date <input type='text' name="searchEnd" id="searchEnd" value=""  size='12' />

                    &nbsp;     &nbsp;
                    Summary <input type='radio' name='searchtype' value='0' checked>
                    &nbsp;Detail <input type='radio' name='searchtype' value='1'>
                    &nbsp;    &nbsp;
                    <a href="Javascript:CHECKIT(this.searchform,0);" class="btn btn-sm btn-primary btn-labeled"><span class="btn-label icon fa fa-filter"></span> Search</a> &nbsp;
                    <a href="Javascript:CHECKIT(this.searchform,1);" class="btn btn-sm btn-light-green "><span class="btn-label icon fa fa-save"></span> Export</a>
               </p>
            </form>

    </div>
    <?php $_smarty_tpl->tpl_vars["td"] = new Smarty_variable("0", null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['beenhere']->value==1) {?>
    <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
    Showing : <?php echo $_smarty_tpl->tpl_vars['searchStart']->value;?>
 through <?php echo $_smarty_tpl->tpl_vars['searchEnd']->value;?>

    <div class="panel-body">
<?php if ($_smarty_tpl->tpl_vars['searchtype']->value==0) {?>
        SUMMARY
    
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th>Employee</th>
                    <th>Hours</th>

                </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                     <tr class="even gradeA">
                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['p']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['cntLastName'];?>
</td>
                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['p']->value['diff']/3600;?>
</td>
                    </tr>
                <?php $_smarty_tpl->tpl_vars['td'] = new Smarty_variable($_smarty_tpl->tpl_vars['td']->value+$_smarty_tpl->tpl_vars['p']->value['diff'], null, 0);?>
                <?php } ?>

                <tr class="even gradeA">
                    <td class="text-left">Total</td>

                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['td']->value/3600;?>
</td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>
<?php } else { ?>
    
    <div class="table-primary">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
            <thead>
            <tr>
                <th>Employee</th>
                <th>Work Order</th>
                <th>Job</th>
                <th>Date</th>
                <th>Hours</th>

            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                <tr class="even gradeA">
                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['p']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['cntLastName'];?>
</td>

                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['p']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['p']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['p']->value['jobMasterNumber']);?>
<br/>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOPreview/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordjobID'];?>
"><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['p']->value['jobName'];?>
</span></a><br/>
                    </td>
                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['p']->value['jordName'];?>
</td>

                    <td class="text-left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['POlaborDate'],"%m/%d/%Y");?>
</td>

                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['p']->value['diff']/3600;?>
</td>
                </tr>
                <?php $_smarty_tpl->tpl_vars['td'] = new Smarty_variable($_smarty_tpl->tpl_vars['td']->value+$_smarty_tpl->tpl_vars['p']->value['diff'], null, 0);?>
            <?php } ?>

            <tr class="even gradeA">
                <td class="text-left">Total</td>

                <td class="text-left"></td>

                <td class="text-left"></td>

                <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['td']->value/3600;?>
</td>
            </tr>

            </tbody>
        </table>
    </div>

</div>

<?php }?>

<?php }?>
<?php }?>
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
