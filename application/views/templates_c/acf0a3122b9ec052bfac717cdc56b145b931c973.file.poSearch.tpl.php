<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-08-26 16:28:54
         compiled from "application/views/templates/projects/poSearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197125880260c96e2edadab6-70531964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acf0a3122b9ec052bfac717cdc56b145b931c973' => 
    array (
      0 => 'application/views/templates/projects/poSearch.tpl',
      1 => 1629995327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197125880260c96e2edadab6-70531964',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_60c96e2eeed9a6_21769230',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'companylist' => 0,
    'r' => 0,
    'managerlist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60c96e2eeed9a6_21769230')) {function content_60c96e2eeed9a6_21769230($_smarty_tpl) {?>
<?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

        $('#bs-datepicker-component1').datepicker();

    });


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        noid = false;

        if(form.pid.value != '')
        {
            noid = true;

        }

        if(form.jobName.value != '')
        {
            noid = true;

        }


        if(form.jobcntID.value != '0')
        {
            noid = true;

        }


        if(form.jobCreatedBy.value != '0')
        {
            noid = true;

        }

        if(!noid) { // no entry must use dates
            if (form.startdate.value == '' || form.enddate.value == '') {
                alert("If using dates please enter a start date and an end date");
                return false;
            }
            if (form.startdate.value != '' && form.enddate.value != '') {
                //both dates filled in
                if( (new Date(form.startdate.value).getTime() >= new Date(form.enddate.value).getTime()))
                {
                    alert("Start date must come before end date.");
                    return false;

                }
            }
        }

        showSpinner();

        return true;

    }
<?php echo '</script'; ?>
>



<div class="panel">
    <div class="panel-heading">
          <h2>Search Proposals </h2>
    </div>

   <div class="panel-body">

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/searchPO"  name="dataform" id="dataform" class="panel" method="POST">
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Proposal ID</label>
                           <input type="text" id="pid" name="pid" class="form-control" />
                       </div>
                   </div>
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Proposal Name</label>
                           <input type="text" id="jobName" name="jobName" class="form-control" />
                       </div>

               </div>
               <div class="row">

                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Created For</label>
                           <select  id="jobcntID" name="jobcntID"
                                    class="form-control">
                               <option value="0">ANY </option>
                               <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['companylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                                   <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['jobcntID'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['cntFirstName'];?>
</option>
                               <?php } ?>
                           </select>
                       </div>
                   </div>
                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Created By</label>
                           <select  id="jobCreatedBy" name="jobCreatedBy"
                                      class="form-control">
                                   <option value="0">ANY </option>
                                   <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['managerlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                                           <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['r']->value['cntLastName'];?>
 </option>
                                   <?php } ?>
                                    </select>
                       </div>
                   </div>

                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Show Rejected</label>
                           <input type="checkbox"  id="showrejected" name="showrejected" value="1" class="checkbox-inline">
                       </div>
                   </div>
               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">From Date</label>
                           <div class="input-group date" id="bs-datepicker-component">
                               <input type="text" id="startdate" name="startdate"
                                      class="form-control">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                       </div>
                   </div>
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">To Date</label>
                           <div class="input-group date" id="bs-datepicker-component1">
                               <input type="text" id="enddate" name="enddate"
                                      class="form-control">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Search Proposals</a>
                   </div>

               </div>
           </form>

   </div>
</div>

<?php }} ?>
