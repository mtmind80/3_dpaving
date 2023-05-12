<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-26 23:14:38
         compiled from "application/views/templates/workorders/woPreviewClose_EST.tpl" */ ?>
<?php /*%%SmartyHeaderCode:788510732592d721d6ae9b7-39771610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de459044f00124f136fcb5585ae7f2307dabf719' => 
    array (
      0 => 'application/views/templates/workorders/woPreviewClose_EST.tpl',
      1 => 1501128871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '788510732592d721d6ae9b7-39771610',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592d721d8a7315_22164155',
  'variables' => 
  array (
    'completeStatus' => 0,
    'SITE_URL' => 0,
    'proposal' => 0,
    'proposalDetails' => 0,
    'p' => 0,
    'ac' => 0,
    'lc' => 0,
    'st' => 0,
    'USER_ROLE' => 0,
    'pd' => 0,
    'da' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592d721d8a7315_22164155')) {function content_592d721d8a7315_22164155($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.replace.php';
?>

<?php echo '<script'; ?>
 type="text/javascript">


    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


    });


function Swoop(dURL)
{
    window.open(dURL, "MsgWindow", "width=600,height=600,scrollbars=yes");

}

    $.growl.notice({ message: "Add equipment, materials, labor, vehicles, other costs and send to billing." });

//    alert('Please verify equipment, materials, labor, vehicles and other costs . Add Any additional costs to the project and send to billing.');
<?php echo '</script'; ?>
>


<div class="panel">


   <div class="panel-body">
<h2>Closing Procedure
<?php if ($_smarty_tpl->tpl_vars['completeStatus']->value==true) {?>
    <a href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/woSendToBilling/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
','You are about to indicate that this job is closed, and all costs have been entered.\nAre you sure?');" class="pull-right btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-money"></span>Send To Billing</a>
    <?php }?>
</h2>
       <ul>
           <li>Check each service to be sure all materials, vehicles, labor, materials and other costs have been recorded.</li>
            <li>Then click the "Send To Billing" button to close this project.</li>
           </ul>

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
                       <table class="table-responsive"><td valign="top" >
                               <br /><a  href="Javascript:Swoop('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOServiceDetailView/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
');" >Print Service Details</a>
                               <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMediaEST/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
" >Upload Media</a>
                               <br /><a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOChecklistEST/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
" >Add Cost</a>
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
               <!-- begin row -->
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
