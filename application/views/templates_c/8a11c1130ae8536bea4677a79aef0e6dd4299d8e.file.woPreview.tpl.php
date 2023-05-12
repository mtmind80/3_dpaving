<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-13 08:29:20
         compiled from "application/views/templates/workorders/woPreview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32660073659287a5bbf1f09-67459122%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a11c1130ae8536bea4677a79aef0e6dd4299d8e' => 
    array (
      0 => 'application/views/templates/workorders/woPreview.tpl',
      1 => 1497341076,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32660073659287a5bbf1f09-67459122',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59287a5be7d714_72352994',
  'variables' => 
  array (
    'proposalDetails' => 0,
    'SITE_URL' => 0,
    'p' => 0,
    'ac' => 0,
    'lc' => 0,
    'USER_ROLE' => 0,
    'permits' => 0,
    'permitscomplete' => 0,
    'proposal' => 0,
    'st' => 0,
    'pd' => 0,
    'da' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59287a5be7d714_72352994')) {function content_59287a5be7d714_72352994($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.replace.php';
?>

<?php echo '<script'; ?>
 type="text/javascript">



    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


    });




    function ShowTools(username, id, sid)
    {

        
        HideControls();

        $.post( site_url + "workorders/showServiceTools/", { id: id , sid: sid, username: username})
                .done(function( data ) {
                    $('#DocManageLabel').html(username);
                    $('#ManagedContent').html(data);
                    $("#DocManage").css({left:mouseX,top:mouseY });
                    $('#DocManage').show();
                });
        

    }

function Swoop(dURL)
{
    window.open(dURL, "MsgWindow", "width=600,height=600,scrollbars=yes");

}


<?php echo '</script'; ?>
>


<div class="panel">

<!--    <h4>List and Manage Job Services</h4>
  -->
    <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderwizrdmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


   <div class="panel-body">
       <?php $_smarty_tpl->tpl_vars["lead"] = new Smarty_variable("Preview For ", null, 0);?>
       <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



       <div class="row panel">
           <div class=" col-sm-3">
               Service Name
           </div>
           <div class=" col-sm-2">
            Service Address
           </div>

           <div class=" col-sm-2">
         Status/Scehdule
           </div>

           <div class=" col-sm-3">
           Managers
           </div>
           <div class=" col-sm-2">
            Tools
           </div>
       </div>
       <!-- display all po -->

       <?php $_smarty_tpl->tpl_vars["lc"] = new Smarty_variable("0", null, 0);?>
       <?php $_smarty_tpl->tpl_vars["ac"] = new Smarty_variable("0", null, 0);?>
       <?php $_smarty_tpl->tpl_vars["st"] = new Smarty_variable("0", null, 0);?>
       <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proposalDetails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>


           <!-- begin row -->
           <div class="row panel">
               <div class=" col-sm-3">
                   <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/workorders/WOServiceDetail/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
'><?php echo $_smarty_tpl->tpl_vars['p']->value['jordName'];?>
</a>
                   <br/>
                   Equipment:$<?php echo number_format($_smarty_tpl->tpl_vars['p']->value['equipcost'],2,".",",");?>

                   <br/>Vehicle:$<?php echo number_format($_smarty_tpl->tpl_vars['p']->value['vehiclecost'],2,".",",");?>

                   <br/>Materials:$<?php echo number_format($_smarty_tpl->tpl_vars['p']->value['materialcost'],2,".",",");?>

                   <br/>Labor: <?php echo $_smarty_tpl->tpl_vars['p']->value['laborcost']/3600;?>
 hrs.
                   <br/>Other Cost:$<?php echo number_format($_smarty_tpl->tpl_vars['p']->value['othercost'],2,".",",");?>

                   <?php $_smarty_tpl->tpl_vars['ac'] = new Smarty_variable($_smarty_tpl->tpl_vars['ac']->value+$_smarty_tpl->tpl_vars['p']->value['othercost']+$_smarty_tpl->tpl_vars['p']->value['materialcost']+$_smarty_tpl->tpl_vars['p']->value['vehiclecost']+$_smarty_tpl->tpl_vars['p']->value['equipcost'], null, 0);?>
                   <?php $_smarty_tpl->tpl_vars['lc'] = new Smarty_variable($_smarty_tpl->tpl_vars['lc']->value+$_smarty_tpl->tpl_vars['p']->value['laborcost'], null, 0);?>

               </div>


               <div class=" col-sm-2">
                   Location:
                   <?php if ($_smarty_tpl->tpl_vars['p']->value['jordAddress1']!='') {?>
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
                   <?php }?>

                   <br/>

                   <?php echo $_smarty_tpl->tpl_vars['p']->value['jordAddress1'];?>

                   &nbsp;
                   <?php echo $_smarty_tpl->tpl_vars['p']->value['jordAddress2'];?>

                   <br /><?php echo $_smarty_tpl->tpl_vars['p']->value['jordCity'];?>
,    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordState'];?>
.             <?php echo $_smarty_tpl->tpl_vars['p']->value['jordZip'];?>

                   <br /><?php echo $_smarty_tpl->tpl_vars['p']->value['jordParcel'];?>


               </div>
               <div class=" col-sm-2">
                   <span <?php if ($_smarty_tpl->tpl_vars['p']->value['jordStatus']=='COMPLETED') {?>
                       class="badge badge-light-green"
                           <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['jordStatus']=='NOT SCHEDULED') {?>
                       class="badge badge-danger"
                           <?php } else { ?>
                       class="badge badge-info"
                           <?php }?>>
                       <?php echo $_smarty_tpl->tpl_vars['p']->value['jordStatus'];?>
</span>

                   <?php if ($_smarty_tpl->tpl_vars['p']->value['jordStartDate']) {?>
                   <br />Start:<?php echo $_smarty_tpl->tpl_vars['p']->value['jordStartDate'];?>

                   <br />End:<?php echo $_smarty_tpl->tpl_vars['p']->value['jordEndDate'];?>

                   <?php }?>
               </div>

               <div class=" col-sm-3">
                   <?php echo $_smarty_tpl->tpl_vars['p']->value['manager1firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['manager1lastname'];?>

                   <br /><?php echo $_smarty_tpl->tpl_vars['p']->value['manager2firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['manager2lastname'];?>


               </div>
               <div class=" col-sm-2">

                       <table><td valign="top" >
                               <?php if ($_smarty_tpl->tpl_vars['p']->value['jordStatus']=='COMPLETED'||$_smarty_tpl->tpl_vars['p']->value['jordStatus']=='CANCELLED') {?>

                               <?php } else { ?>

                               <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>


                                   <?php if ($_smarty_tpl->tpl_vars['permits']->value==$_smarty_tpl->tpl_vars['permitscomplete']->value) {?>
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
                                   <?php } else { ?>
                                              <span class="alert-danger"> Pending Permits </span>
                                   <?php }?>
                                   <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOManagers/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">Assign Job Managers</a>

                                   <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOCustomInstructions/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">Custom Instructions</a>
                               <?php }?>

                               <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value!=6) {?> 
                                   <?php if (!empty($_smarty_tpl->tpl_vars['p']->value['jordStartDate'])) {?>
                                        <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOChecklistP/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">Pre-Day Checklist</a>
                                      <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOChecklistE/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">End of Day Checklist</a>
                                       <?php if ($_smarty_tpl->tpl_vars['p']->value['jordStatus']=='SCHEDULED') {?>
                                            <br /><a  href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOServiceCompleted/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
','You are about to close out this service and mark it as completed.\nAre you sure?')">Mark Completed</a>
                                       <?php }?>
                                   <?php }?>
                               <?php }?>
                            <?php }?>
                               <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOServiceDetail/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">View Service Details</a>
 <!--                              <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMediaSS/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
" >Print Service Details</a> -->
                               <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1&&$_smarty_tpl->tpl_vars['proposal']->value['jobStatus']==5&&($_smarty_tpl->tpl_vars['p']->value['jordStatus']=='COMPLETED'||$_smarty_tpl->tpl_vars['p']->value['jordStatus']=='CANCELLED')) {?>
                                
                                       <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/rollbackService/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
" >Rollback Service</a>

                               <?php }?>
                               <br /><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/CreateWorkorderEmail/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">Create Workorder Email</a>
                           </td></table>
               </div>

           </div>



               <?php $_smarty_tpl->tpl_vars['st'] = new Smarty_variable($_smarty_tpl->tpl_vars['st']->value+$_smarty_tpl->tpl_vars['p']->value['jordCost'], null, 0);?>

       <?php } ?>
       <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>

       <!-- begin row -->
       <div class="row panel">
           <div class=" col-sm-3">
            Proposal Estimate $ <?php echo number_format($_smarty_tpl->tpl_vars['st']->value,2,".",",");?>

           </div>

       </div>
       <?php $_smarty_tpl->tpl_vars["pd"] = new Smarty_variable($_smarty_tpl->tpl_vars['proposal']->value['jobDiscount'], null, 0);?>
       <?php $_smarty_tpl->tpl_vars["da"] = new Smarty_variable(0, null, 0);?>

       <?php if ($_smarty_tpl->tpl_vars['pd']->value>0&&$_smarty_tpl->tpl_vars['st']->value>0) {?>
           <?php $_smarty_tpl->tpl_vars['da'] = new Smarty_variable(($_smarty_tpl->tpl_vars['pd']->value*$_smarty_tpl->tpl_vars['st']->value)/100, null, 0);?>
           <?php $_smarty_tpl->tpl_vars['st'] = new Smarty_variable($_smarty_tpl->tpl_vars['st']->value-$_smarty_tpl->tpl_vars['da']->value, null, 0);?>
           <!-- begin row discount -->
           <div class="row panel">
               <div class=" col-sm-3">
                   Discount <?php echo $_smarty_tpl->tpl_vars['pd']->value;?>
 %  &nbsp; <span style='color:red;'>(-<?php echo money_format($_smarty_tpl->tpl_vars['da']->value,2);?>
)</span>
               </div>

           </div>
           <!-- begin row -->
           <div class="row panel">
               <div class=" col-sm-3">
                   Grand Total $ <?php echo money_format($_smarty_tpl->tpl_vars['st']->value,2);?>

               </div>

           </div>
       <?php }?>
       <!-- begin row -->
       <div class="row panel">
           <div class=" col-sm-3">
               Total Costs $ <?php echo number_format($_smarty_tpl->tpl_vars['ac']->value,2,".",",");?>

           </div>

       </div>

       <!-- begin row -->
       <div class="row panel">
           <div class=" col-sm-3">
               Total Labor <?php echo $_smarty_tpl->tpl_vars['lc']->value/3600;?>
 hrs.
           </div>

       </div>
<?php }?>

   </div>

        </div>




<?php }} ?>
