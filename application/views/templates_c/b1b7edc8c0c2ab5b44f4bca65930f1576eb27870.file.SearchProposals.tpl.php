<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-14 11:44:57
         compiled from "application/views/templates/reports/SearchProposals.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1724481795931a612743963-50120570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1b7edc8c0c2ab5b44f4bca65930f1576eb27870' => 
    array (
      0 => 'application/views/templates/reports/SearchProposals.tpl',
      1 => 1497341023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1724481795931a612743963-50120570',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5931a6128a6a20_72380026',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'clientListCB' => 0,
    'cblist' => 0,
    'creatorListCB' => 0,
    'managerListCB' => 0,
    'salesListCB' => 0,
    'beenhere' => 0,
    'proposals' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5931a6128a6a20_72380026')) {function content_5931a6128a6a20_72380026($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
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
reports/exportProposal/";
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

       if(form.searchStart.value == '' && form.searchEnd.value == '' &&  form.jobStatus[form.jobStatus.selectedIndex].value == 0 &&  form.jobcntID[form.jobcntID.selectedIndex].value == 0 &&         form.jobCreatedBy[form.jobCreatedBy.selectedIndex].value == 0 &&  form.jobSalesManagerAssigned[form.jobSalesManagerAssigned.selectedIndex].value == 0 &&    form.jobSalesAssigned[form.jobSalesAssigned.selectedIndex].value == 0)
       {
           alert("You must select some criteria for your report. You left all fields blank.");
           return false;

       }


       if(form.searchStart.value == '' || form.searchEnd.value == '')
       {
           alert("You must select a date range for your report. You left all fields blank.");
           return false;
       }

       return true;

   }



<?php echo '</script'; ?>
>
<div class="panel">
    <div class="panel-heading">

        <h2>Proposals Report</h2>

    </div>

    <div class="panel-heading">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/proposal/" id="searchform" name="searchform">
                <input type="hidden" name="beenhere" value="1" />
                <p>
                </p> <p style='border:solid 1px lightblue;width:98%; padding:5px;'>
                    Created For: <select name='jobcntID' id='jobcntID'>
                        <option value="0">Any Client</option>
                        <?php  $_smarty_tpl->tpl_vars['cblist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cblist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clientListCB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

                    Status: <select  name="jobStatus" id="jobStatus">
                        <option value="0">Any</option>
                        <option value="1">Pending</option>
                        <option value="2">Approved</option>
                        <option value="5">Signed</option>
                        <option value="3">Rejected</option>
                    </select>
                    &nbsp;
                    &nbsp;



                    Proposal Created After: <input type='text' name="searchStart" id="searchStart" value="" size='12' />  &nbsp;
                    &nbsp; and before <input type='text' name="searchEnd" id="searchEnd" value=""  size='12' />

                </p> <p style='border:solid 1px lightblue;width:98%; padding:5px;'>
               Created By: <select name='jobCreatedBy' id='jobCreatedBy'>
                        <option value="0">Any Staff</option>
                        <?php  $_smarty_tpl->tpl_vars['cblist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cblist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['creatorListCB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cblist']->key => $_smarty_tpl->tpl_vars['cblist']->value) {
$_smarty_tpl->tpl_vars['cblist']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntLastName'];?>
</option>
                        <?php } ?>
                    </select>


                    &nbsp;Sales Manager: <select name='jobSalesManagerAssigned' id='jobSalesManagerAssigned'>
                        <option value="0">Any Manager</option>
                        <?php  $_smarty_tpl->tpl_vars['cblist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cblist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['managerListCB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cblist']->key => $_smarty_tpl->tpl_vars['cblist']->value) {
$_smarty_tpl->tpl_vars['cblist']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntLastName'];?>
</option>
                        <?php } ?>
                    </select>
                    &nbsp;Sales Person: <select name='jobSalesAssigned' id='jobSalesAssigned'>
                        <option value="0">Any Staff</option>
                        <?php  $_smarty_tpl->tpl_vars['cblist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cblist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['salesListCB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

                    &nbsp;


                    <a href="Javascript:CHECKIT(this.searchform, 0);" class="btn btn-sm btn-primary btn-labeled"><span class="btn-label icon fa fa-filter"></span> Search</a> &nbsp;

                    <a href="Javascript:CHECKIT(this.searchform, 1);" class="btn btn-sm btn-light-green "><span class="btn-label icon fa fa-save"></span> Export</a>
                </p>
            </form>

    </div>
<?php if ($_smarty_tpl->tpl_vars['beenhere']->value==1) {?>
    <?php if ($_smarty_tpl->tpl_vars['proposals']->value) {?>
    <div class="panel-body">

        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th style="width:10%;">Name</th>
                    <th style="width:10%;">Client</th>
                    <th style="width:20%;">Address</th>
                    <th style="width:25%;">Services</th>
                    <th style="width:10%;">Status<br>Cost</th>
                    <th style="width:25%;">Managers</th>

                </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proposals']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['p']->value['jobAlert']) {?>
                        <tr class="alert-danger">
                            <?php } else { ?>
                        <tr class="even gradeA">

                    <?php }?>
                    <td class="text-left"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOservices/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobID'];?>
"><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['p']->value['jobName'];?>
</span></a><br/>
                    </td>
                    <td class="text-left"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['p']->value['jobcntID'];?>
"><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['p']->value['clientfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['clientlast'];?>
</span></a></td>
                    <td class="text-left">
                        <?php echo $_smarty_tpl->tpl_vars['p']->value['jobAddress1'];?>

                        <?php echo $_smarty_tpl->tpl_vars['p']->value['jobAddress2'];?>

                        <br/>
                        <?php echo $_smarty_tpl->tpl_vars['p']->value['jobCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['p']->value['jobState'];?>
.
                        <?php echo $_smarty_tpl->tpl_vars['p']->value['jobZip'];?>


                    </td>

                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['p']->value['services'];?>

                    </td>

                    <td class="text-left">
                        <span <?php if ($_smarty_tpl->tpl_vars['p']->value['jobStatus']==6) {?>class="badge badge-light-green" <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['jobStatus']==7) {?> class="badge badge-danger" <?php } else { ?> class="badge badge-info"  <?php }?>><?php echo $_smarty_tpl->tpl_vars['p']->value['ordStatus'];?>
</span>
                        $<?php echo number_format($_smarty_tpl->tpl_vars['p']->value['totalcost'],2);?>



                    </td>


                    <td class="text-left">Created On
                        <br/><b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['jobCreatedDateTime'],"%A, %B %e, %Y");?>
</b>
                        <br />
                        Created by
                        <br/><b><?php echo $_smarty_tpl->tpl_vars['p']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['cntLastName'];?>
</b><br/>
                            Manager Assigned
                        <br/><b><?php echo $_smarty_tpl->tpl_vars['p']->value['managerfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['managerlast'];?>
 </b>
                        <br/>Sales Assigned<br/>
                        <b><?php echo $_smarty_tpl->tpl_vars['p']->value['salesfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['saleslast'];?>
</b>
                        <br />
                        Last updated
                        <br/><b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['JobLastUpdated'],"%A, %B %e, %Y");?>
</b>
                    </td>
                    <!--
                    <td class="text-left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['JobLastUpdated'],"%A, %B %e, %Y");?>
</td>
                    -->
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>


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
