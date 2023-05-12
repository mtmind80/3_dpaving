<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-25 14:51:06
         compiled from "application/views/templates/crm/crmNotes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17245527265950142a698827-83096723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e8fdff0ff0333cec82b2bcf95443fac4e258814' => 
    array (
      0 => 'application/views/templates/crm/crmNotes.tpl',
      1 => 1497340966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17245527265950142a698827-83096723',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'SITE_URL' => 0,
    'id' => 0,
    'edit' => 0,
    'note_id' => 0,
    'userInfo' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5950142a90ccd2_47625805',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5950142a90ccd2_47625805')) {function content_5950142a90ccd2_47625805($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/function.cycle.php';
?>
<?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {


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

        if(form.cnotNote.value == '')
        {
            alert('You must enter a note');
            form.cnotNote.focus();
            return false;
        }


        return true;

    }
   <?php echo '</script'; ?>
>

<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
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



<?php echo '</script'; ?>
>


<div class="panel" >
<div class="panel-heading">

        <h2>Notes:<?php echo $_smarty_tpl->tpl_vars['user']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['cntLastName'];?>
</h2>
    <?php echo $_smarty_tpl->tpl_vars['user']->value['ccatName'];?>
<br/>
    <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>

    
    <?php if ($_smarty_tpl->tpl_vars['user']->value['cntcid']==9&&$_smarty_tpl->tpl_vars['user']->value['cntCompanyId']>0) {?>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/startProposal/<?php echo $_smarty_tpl->tpl_vars['user']->value['cntCompanyId'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value['cntId'];?>
"><span class="btn-label icon fa fa-plus"></span> New Proposal</a>
    <?php }?>
</div>
    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Basic Information &nbsp; &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/additionalInformation/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" >Connections &nbsp; &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/catandservice/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Categories and Services &nbsp; &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/crmNotes/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" style="color: #000000;">Notes</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Profile</span></a> </span> </li
                    >
            <li>
            <!-- ! Remove space between elements by dropping close angle 
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/crmSetClientReminder/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" >Schedule A Client Reminder</span></a> </span> </li
                >
                
            <li>
            <!-- ! Remove space between elements by dropping close angle 
                <span class="wizard-step-number">7</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/crmSetJobReminder/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Schedule A Job Reminder</span></a> </span> </li
                >-->
        </ul>
    </div>
<div class="panel-body">
    <?php if ($_smarty_tpl->tpl_vars['edit']->value) {?>

    <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveCRMNote/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['note_id']->value;?>
"  name="userform" id="dataform" class="panel" method="POST">

        <input type="hidden" name="cntId" id="cntId" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
        <input type="hidden" name="cnotId" id="cnotId" value="<?php echo $_smarty_tpl->tpl_vars['note_id']->value;?>
">
        <!-- begin row -->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Note</label>
                    <textarea rows="3" id="cnotNote" name="cnotNote" class="form-control"><?php echo $_smarty_tpl->tpl_vars['edit']->value['cnotNote'];?>
</textarea>
                </div>
            </div>
        </div>
        <!-- row -->

        <!-- begin row -->
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Set Reminder</label>
                    <input type="checkbox"  id="cnotReminder" name="cnotReminder" value="1" class="checkbox-inline"  <?php if ($_smarty_tpl->tpl_vars['edit']->value['cnotReminder']) {?> checked <?php }?>>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Reminder Date</label>
                    <div class="input-group date" id="bs-datepicker-component">
                        <input type="text" id="cnotReminderDate" name="cnotReminderDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['edit']->value['cnotReminderDate'],"%m/%d/%Y");?>
"
                               class="form-control">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
            
             <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Share Note With Customer</label>
                  <input type="checkbox" id="cnotSendNote" name="cnotSendNote" value="1" class="checkbox-inline">
                </div>
        </div>
            
        <div class="col-sm-3">
              <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['USER_EMAIL'];?>
" class="checkbox-inline">
              <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['cntPrimaryEmail'];?>
" class="checkbox-inline">
        </div>

        </div>
        <!-- row -->

    <!-- buton row -->
    <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Note</a>
        </div>
        <div class="col-sm-2">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/employeeList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
    </div>
    </form>

    <?php } else { ?>
<form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveCRMNote/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">

<input type="hidden" name="cntId" id="cntId" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
<!-- begin row -->
<div class="row">
    <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">Note</label>
            <textarea rows="3" id="cnotNote" name="cnotNote" class="form-control"></textarea>
        </div>
    </div>
</div>
<!-- row -->

    <!-- begin row -->
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Set Reminder</label>
                <input type="checkbox"  id="cnotReminder" name="cnotReminder" value="1" class="checkbox-inline">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Reminder Date</label>
                <div class="input-group date" id="bs-datepicker-component">
                    <input type="text" id="cnotReminderDate" name="cnotReminderDate"
                           class="form-control">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
            </div>
        </div>
        
        <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Share Note With Customer</label>
                  <input type="checkbox" id="cnotSendNote" name="cnotSendNote" value="1" class="checkbox-inline">
                </div>
        </div>
            
        <div class="col-sm-3">
              <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['USER_EMAIL'];?>
" class="checkbox-inline">
              <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['cntPrimaryEmail'];?>
" class="checkbox-inline">
        </div>
    </div>
    <!-- row -->

    <!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Note</a>
    </div>
    <div class="col-sm-2">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-primary btn-labeled">Cancel</a>
    </div>
</div>
</form>

<?php }?>
    <div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Date Created</th>
                    <th >Note</th>
                    <th style='width:10%;'>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cnotNote']) {?>
                <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                    <td><span class="note-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotCreatedDate'],"%A %B %d,  %Y at %I:%M %p");?>
</span></td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['cnotNote'];?>

                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cnotReminder']) {?><br/><span class="alert-info"> REMINDER SET<br/><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cnotReminderDate'],"%B %d,  %Y");?>
</span><?php }?>
                    </td>
                    <td class="text-left"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/crmNotes/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['cnotId'];?>
">Edit</a></td>
                </tr>
                <?php }?>
            <?php } ?>



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
<?php }} ?>
