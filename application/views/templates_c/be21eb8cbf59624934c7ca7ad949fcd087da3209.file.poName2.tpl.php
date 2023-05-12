<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-25 00:10:22
         compiled from "application/views/templates/projects/poName2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19625342725929e74f1b4c08-99021742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be21eb8cbf59624934c7ca7ad949fcd087da3209' => 
    array (
      0 => 'application/views/templates/projects/poName2.tpl',
      1 => 1524633015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19625342725929e74f1b4c08-99021742',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5929e74f2aa982_34469978',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'property' => 0,
    'parentid' => 0,
    'propertyid' => 0,
    'states' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5929e74f2aa982_34469978')) {function content_5929e74f2aa982_34469978($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">


    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


    });


    var id = 0;

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.jobName.value == '')
        {

            //$.growl.error({ title: "Cannot Save", message: "You must enter a name for this proposal." });
            alert("You must enter a name for this proposal.");
            form.jobName.focus();
            return false;
        }


        return true;

    }


<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">
            <h2>Create New Proposal </h2>
        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>

    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" style="color: #000000;">Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" >Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" >Upload &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Preview &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>

    </div>
   <div class="panel-body">
 <h3>Create Proposal for <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
 </h3>
<h4>Location:<?php echo $_smarty_tpl->tpl_vars['property']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['property']->value['cntLastName'];?>
 </h4>
       <?php if ($_smarty_tpl->tpl_vars['data']->value['project_count']) {?>
       Current projects:<?php echo $_smarty_tpl->tpl_vars['data']->value['project_count'];?>
 <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/<?php echo $_smarty_tpl->tpl_vars['parentid']->value;?>
'>view current projects</a>
       <?php }?>

       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/startProposal2/<?php echo $_smarty_tpl->tpl_vars['parentid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['propertyid']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">
       <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['parentid']->value;?>
">
 <input type="hidden" name="Pid" id="Pid" value="<?php echo $_smarty_tpl->tpl_vars['propertyid']->value;?>
">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Proposal Name</label>
                        <input type="text" id="jobName" name="jobName" class="form-control">
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">NTO</label>
                        <input type="checkbox" id="jobNTO" name="jobNTO" class="form-control checkbox-inline" value ="1">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Permit Required</label>
                        <input type="checkbox" id="jobPermit" name="jobPermit" class="form-control checkbox-inline" value ="1">
                    </div>
                </div>
            </div>
            <!-- row -->
       <!-- begin row -->
       <div class="row">

           <div class="col-sm-8">
               <div class="form-group no-margin-hr">
                   <label class="alert-info" style='width:750px;'>Primary Billing Address</label>
               </div>
           </div>

       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Billing Address Line 1</label>
                   <input type="text" id="jobBillingAddress1" name="jobBillingAddress1" class="form-control" size="45" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryAddress1'];?>
">
               </div>
           </div>

           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Billing Address line 2</label>
                   <input type="text" id="jobBillingAddress2" name="jobBillingAddress2" class="form-control"  size="45" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryAddress2'];?>
">
               </div>
           </div>

       </div>
       <!-- row -->
       <!-- begin row -->
       <div class="row">
           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Billing City</label>
                   <input type="text" id="jobBillingCity" name="jobBillingCity" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryCity'];?>
">
               </div>
           </div>
           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Billing State</label>
                   <select id="jobBillingState" name="jobBillingState" class="form-control" >
                       <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryState'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryState'];?>
</option>
                       <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

                   </select>
               </div>
           </div>

           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Billing Zip Code</label>
                   <input type="text" id="jobBillingZip" name="jobBillingZip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntPrimaryZip'];?>
">
               </div>
           </div>

       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label"> Primary Contact</label>
                   <input type="text" id="jobPrimaryContact" name="jobPrimaryContact" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['property']->value['ManagerName'];?>
 <?php echo $_smarty_tpl->tpl_vars['property']->value['ManagerLastName'];?>
">
               </div>
           </div>

           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Primary Email (<i>used for notifications</i>)</label>
                   <input type="text" id="jobPrimaryEmail" name="jobPrimaryEmail" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['property']->value['ManagerEmail'];?>
">
               </div>
           </div>

       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label"> Primary Phone</label>
                   <input type="text" id="jobPrimaryPhone" name="jobPrimaryPhone" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['property']->value['companyPhone'];?>
">
               </div>
           </div>

           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Alternate Phone</label>
                   <input type="text" id="jobAltPhone" name="jobAltPhone" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['property']->value['cntPrimaryPhone'];?>
">
               </div>
           </div>

       </div>
       <!-- row -->
       <!-- begin row -->
       <div class="row">

           <div class="col-sm-8">
               <div class="form-group no-margin-hr">
                   <label class="alert-info" style='width:750px;'>Job Address</label>
               </div>
           </div>

       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Address Line 1</label>
                   <input type="text" id="jobAddress1" name="jobAddress1" class="form-control" size="45" value="<?php echo $_smarty_tpl->tpl_vars['property']->value['cntPrimaryAddress1'];?>
">
               </div>
           </div>

           <div class="col-sm-6">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Address line 2</label>
                   <input type="text" id="jobAddress2" name="jobAddress2" class="form-control"  size="45" value="<?php echo $_smarty_tpl->tpl_vars['property']->value['cntPrimaryAddress2'];?>
">
               </div>
           </div>

       </div>
       <!-- row -->
       <!-- begin row -->
       <div class="row">
           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <label class="control-label">City</label>
                   <input type="text" id="jobCity" name="jobCity" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['property']->value['cntPrimaryCity'];?>
">
               </div>
           </div>
           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <label class="control-label">State</label>
                   <select id="jobState" name="jobState" class="form-control" >
                       <option value="<?php echo $_smarty_tpl->tpl_vars['property']->value['cntPrimaryState'];?>
"><?php echo $_smarty_tpl->tpl_vars['property']->value['cntPrimaryState'];?>
</option>
                       <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

                   </select>
               </div>
           </div>

           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Zip Code</label>
                   <input type="text" id="jobZip" name="jobZip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['property']->value['cntPrimaryZip'];?>
">
               </div>
           </div>

       </div>
       <!-- row -->


       <!-- buton row -->
        <div class="row">
            <div class="col-sm-4">
            <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Create Proposal</a>
            </div>

            <div class="col-sm-6">
            </div>
        </div>
        </form>
    </div>

        </div>





<?php }} ?>
