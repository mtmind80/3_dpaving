<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-19 09:01:01
         compiled from "application/views/templates/projects/poNotes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3001953115880d4ada73144-20493523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fc1a88ce51fe515b860c78a259547b9a31ab6b6' => 
    array (
      0 => 'application/views/templates/projects/poNotes.tpl',
      1 => 1479248206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3001953115880d4ada73144-20493523',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'proposal' => 0,
    'edit' => 0,
    'pid' => 0,
    'notes' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5880d4adb2d600_26883071',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5880d4adb2d600_26883071')) {function content_5880d4adb2d600_26883071($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include '/home/pavingd/public_html/system/smarty/libs/plugins/function.cycle.php';
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

        if(form.jnotNote.value == '')
        {
            alert('You must enter a note');
            form.jnotNote.focus();
            return false;
        }

        showSpinner();

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

<div class="panel">
    <div class="panel-heading">
          <h2>Add Notes </h2>

        <h4>Add notes, comments and reminders to proposal.</h4>

        <!--
        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>
-->
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
'><span class="wizard-step-description">Services &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Notes/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" style="color: #000000;">Notes &nbsp;</span></a> </span> </li
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




       <?php if ($_smarty_tpl->tpl_vars['edit']->value) {?>

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/savePONote/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['edit']->value['jnotId'];?>
"  name="userform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="jnotId" id="jnotId" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['jnotId'];?>
">
               <input type="hidden" name="jnotJordId" id="jnotJordId" value="0">

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Project Note</label>
                           <textarea rows="3" id="jnotNote" name="jnotNote" class="form-control"><?php echo $_smarty_tpl->tpl_vars['edit']->value['jnotNote'];?>
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
                           <input type="checkbox"  id="jnotReminder" name="jnotReminder" value="1" class="checkbox-inline"  <?php if ($_smarty_tpl->tpl_vars['edit']->value['jnotReminder']) {?> checked <?php }?>>
                       </div>
                   </div>

                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Reminder Date</label>
                           <div class="input-group date" id="bs-datepicker-component">
                               <input type="text" id="jnotReminderDate" name="jnotReminderDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['edit']->value['jnotReminderDate'],"%m/%d/%Y");?>
"
                                      class="form-control">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                           </div>
                       </div>
                   </div>

               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Note</a>
                   </div>

               </div>
           </form>

       <?php } else { ?>
           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/savePONote/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">
               <input type="hidden" name="jnotJordId" id="jnotJordId" value="0">
               <input type="hidden" name="jobID" id="jobID" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">

               
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Project Note</label>
                           <textarea rows="3" id="jnotNote" name="jnotNote" class="form-control"></textarea>
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Set Reminder</label>
                           <input type="checkbox"  id="jnotReminder" name="jnotReminder" value="1" class="checkbox-inline">
                       </div>
                   </div>
                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Reminder Date</label>
                           <div class="input-group date" id="bs-datepicker-component">
                               <input type="text" id="jnotReminderDate" name="jnotReminderDate"
                                      class="form-control">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Note</a>
                   </div>

               </div>
           </form>

       <?php }?>
       <!-- /11. $JQUERY_DATA_TABLES -->
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
 $_from = $_smarty_tpl->tpl_vars['notes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                   <?php if ($_smarty_tpl->tpl_vars['d']->value['jnotNote']) {?>
                       <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                           <td><span class="note-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['jnotCreatedDate'],"%A %B %d,  %Y at %I:%M %p");?>
</span>
                               <?php if ($_smarty_tpl->tpl_vars['d']->value['jnotJordId']==0) {
} else { ?><br/><?php echo $_smarty_tpl->tpl_vars['d']->value['jordName'];
}?></td>
                           <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['jnotNote'];?>

                               <?php if ($_smarty_tpl->tpl_vars['d']->value['jnotReminder']) {?><br/><span class="alert-info"> REMINDER SET<br/><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['jnotReminderDate'],"%B %d,  %Y");?>
</span><?php }?>
                           </td>
                           <td class="text-left"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Notes/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['jnotId'];?>
">Edit</a></td>
                       </tr>
                   <?php }?>
               <?php } ?>



               </tbody>
           </table>
       </div>
       <!-- /11. $JQUERY_DATA_TABLES -->

   </div>
</div>

<?php }} ?>
