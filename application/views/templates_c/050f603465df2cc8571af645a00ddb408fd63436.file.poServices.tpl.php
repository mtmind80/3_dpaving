<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-16 14:46:42
         compiled from "application/views/templates/projects/poServices.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93676870573b859a3c3bd9-49558220%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '050f603465df2cc8571af645a00ddb408fd63436' => 
    array (
      0 => 'application/views/templates/projects/poServices.tpl',
      1 => 1479248207,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93676870573b859a3c3bd9-49558220',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573b859a47b087_86281785',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'proposal' => 0,
    'pid' => 0,
    'serviceCats' => 0,
    's' => 0,
    'subcontractors' => 0,
    'o' => 0,
    'proposalDetails' => 0,
    'p' => 0,
    'st' => 0,
    'ds' => 0,
    'TandC' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573b859a47b087_86281785')) {function content_573b859a47b087_86281785($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
?><?php echo '<script'; ?>
 type="text/javascript">

    function chekme(form)

{
    $("#jord").hide();
    var stype = form.stype[form.stype.selectedIndex].value;
    if(stype == 17)
    {
        $("#jord").show();
        alert("Please select a sub contractor.");

    }

}

    $(document).ready(function() {
        $("#jobDiscount").mask("99");

        $('#changeorder').click(function() {

            $('#changeform').submit();

        });

    });


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {
        var pid = form.pid.value;
        var stype = form.stype[form.stype.selectedIndex].value;

        var dURL = '<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/newPOservices/' + pid + '/' + stype;

        if(form.stype[form.stype.selectedIndex].value ==0)
        {
            alert('You must select a service type to add.');
            form.stype.focus();
            return false;
        }
        if(stype == 17 && form.jordVendorID[form.jordVendorID.selectedIndex].value ==0)
        {
            alert('You must select a sub contractor.')
            return false;
        }

        $('#dataform').attr('action', dURL);

        return true;

    }

<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">
          <h2>Manage Proposal Services</h2>
        <h4>Add or adjust proposal services</h4>

        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/client/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" >Location/Managers &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOservices/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" style="color: #000000;">Services &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Notes/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Notes &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Media/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Upload &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Status/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Status &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/previewPO/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Preview &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">7</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/clientReminder/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">


       <?php echo $_smarty_tpl->getSubTemplate ('projects/_proposalheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



       <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobStatus']==1) {?>
       

       <!-- row -->
       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/newPOservicesnewPOservices/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="dataform" id="dataform"  method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">

           <!-- begin row -->
           <div class="row " style="padding:8px;background:#e3e3e3">

               <div class="col-sm-8" style='vertical-align:middle;'>
                   <select name="stype" id="stype" style='font-size:1.4EM;' onChange="javascript:chekme(this.form);">
                    <option value="0">Select a Service</option>
                    <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['serviceCats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['cmpServiceID'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['cmpServiceCat'];?>
 (<?php echo $_smarty_tpl->tpl_vars['s']->value['cmpServiceName'];?>
)</option>

                    <?php } ?>
                   </select>
                   <div id="jord" style='display:none;'>
                       <select class="form-control" name="jordVendorID" id="jordVendorID">
                           <option value="0">Select a Sub Contractor</option>
                           <?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcontractors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['o']->value['cntId'];?>
" ><?php echo $_smarty_tpl->tpl_vars['o']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['o']->value['cntLastName'];?>
</option>
                           <?php } ?>
                       </select>
                   </div>

               </div>
               <div class="col-sm-4" style='vertical-align:middle;float:right;'>
                   <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Service</a>
               </div>
           </div>
           <?php } else { ?>
               Approved by: <?php echo $_smarty_tpl->tpl_vars['proposal']->value['approvefirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['approvelast'];?>

                <br />
               Approved: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['proposal']->value['jobApprovedDate'],"%A %B %d,  %Y ");?>

            <?php }?>

</form>
           <div class="row alert">

               <div class="col-sm-4">
                      Service
               </div>
               <div class="col-sm-3">
                   Appears As
               </div>
               <div class="col-sm-2">
                   Cost
               </div>
               <div class="col-sm-2">
                   &nbsp;
               </div>
               <div class="col-sm-1">
                   Order
               </div>
           </div>

       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/changeServiceOrder/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="changeform" id="changeform"  method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">

    <!-- display all po -->
<?php $_smarty_tpl->tpl_vars["st"] = new Smarty_variable("0", null, 0);?>
           <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proposalDetails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
           <!-- begin row -->
           <div class="row panel">

        <div class="col-sm-4">
            <?php if ($_smarty_tpl->tpl_vars['p']->value['cmpServiceDefaultRate']>$_smarty_tpl->tpl_vars['p']->value['jordCost']) {?>
            <?php echo $_smarty_tpl->tpl_vars['p']->value['cmpServiceCat'];?>
 - <?php echo $_smarty_tpl->tpl_vars['p']->value['cmpServiceName'];?>

            <br/><span style="color:#e60000;font-size:0.8EM;"><i>Service Estimate does not meet the minimum cost</i></span>
            <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['p']->value['cmpServiceCat'];?>
 - <?php echo $_smarty_tpl->tpl_vars['p']->value['cmpServiceName'];?>

            <?php }?>
        </div>
        <div class="col-sm-3">
            <?php echo $_smarty_tpl->tpl_vars['p']->value['jordName'];?>

            <?php if ($_smarty_tpl->tpl_vars['p']->value['jordServiceID']==17&&$_smarty_tpl->tpl_vars['p']->value['jordVendorID']>0) {?>
            <br /><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordVendorID'];?>
" title="View Contact" target='contact'><span class="btn-label icon fa fa-user"></span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['p']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['cntLastName'];?>
</a>
            <?php }?>
        </div>
        <div class="col-sm-2">
            $<?php echo number_format($_smarty_tpl->tpl_vars['p']->value['jordCost'],2);?>

        </div>
        <?php $_smarty_tpl->tpl_vars['st'] = new Smarty_variable($_smarty_tpl->tpl_vars['st']->value+$_smarty_tpl->tpl_vars['p']->value['jordCost'], null, 0);?>

        <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobStatus']>=2) {?>

            <div class="col-sm-2">
              &nbsp;
            </div>


        <?php } else { ?>

                
            <?php if ($_smarty_tpl->tpl_vars['p']->value['jordServiceID']==18) {?>
                    <div class="col-sm-1">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/editPOStriping/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
/">edit</a>
                    </div>
                    <div class="col-sm-1">
                        <a href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/removePOservices/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
/','You are about to remove this service permanently. \nAre you sure?');">remove</a>
                    </div>
                <?php } else { ?>
                    <div class="col-sm-1">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/editPOservices/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
/">edit</a>
                    </div>
                    <div class="col-sm-1">

                <a href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/removePOservices/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
/','You are about to remove this service permanently. \nAre you sure?');">remove</a>
                    </div>
            <?php }?>


        <?php }?>
               <div class="col-sm-1">

                       <input type="text"  class='form_field ' size='3' value="<?php echo $_smarty_tpl->tpl_vars['p']->value['jordSort'];?>
" name="jordSort_<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
" id="jordSort_<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
">

               </div>

    </div>

<?php } ?>
           <div class="row">
               <div class="col-sm-12" >

                   <input class="btn btn-success" type="button" id='changeorder' value='Change Sort Order' style="float:right;">
           </div>

   </div>

    </form>


       <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobDiscount']>0&&$_smarty_tpl->tpl_vars['st']->value>0) {?>
           <!-- begin row -->
           <div class="row panel">
               <div class="col-sm-7">


                   Total
               </div>
               <div class="col-sm-2">
                   $<?php echo money_format($_smarty_tpl->tpl_vars['st']->value,2);?>

               </div>
           </div>

           <!-- begin row -->
           <div class="row panel">
               <div class="col-sm-7">
<?php $_smarty_tpl->tpl_vars["ds"] = new Smarty_variable(0, null, 0);?>
                   <?php $_smarty_tpl->tpl_vars['ds'] = new Smarty_variable(($_smarty_tpl->tpl_vars['st']->value*$_smarty_tpl->tpl_vars['proposal']->value['jobDiscount'])/100, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['st'] = new Smarty_variable($_smarty_tpl->tpl_vars['st']->value-$_smarty_tpl->tpl_vars['ds']->value, null, 0);?>
                   Discount
               </div>
               <div class="col-sm-2">
<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobDiscount'];?>
 % <span style="color:Red;">(-$<?php echo money_format($_smarty_tpl->tpl_vars['ds']->value,2);?>
)</span>
               </div>
           </div>

           <!-- begin row -->
           <div class="row panel">
               <div class="col-sm-7">


                   Grand Total
               </div>
               <div class="col-sm-2">
                   $<?php echo money_format($_smarty_tpl->tpl_vars['st']->value,2);?>

               </div>
           </div>

       <?php } else { ?>
       <!-- begin row -->
           <div class="row panel">
               <div class="col-sm-7">


                   Grand Total
               </div>
               <div class="col-sm-2">
                       $<?php echo money_format($_smarty_tpl->tpl_vars['st']->value,2);?>

               </div>
           </div>
       <?php }?>

       <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobStatus']==1) {?>
       <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/updateDiscount/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
" id='dicform'>
           <div class="row panel">
               <div class="col-sm-9" >

                   <input  type="text" id='jobDiscount' name="jobDiscount" value='<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobDiscount'];?>
' >
               </div>
               <div class="col-sm-3" >

                   <input class="btn btn-success" type="submit" id='changediscount' value='Update Discount' style="float:right;">
               </div>

           </div>

       </form>

<?php }?>

<!--
           <?php echo $_smarty_tpl->tpl_vars['TandC']->value;?>

       -->


   </div>

        </div>




<?php }} ?>
