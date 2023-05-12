<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-20 14:29:25
         compiled from "application/views/templates/workorders/woNotes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12824940635928738eda6aa7-61226615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6dab0abee08864201cd21dcbe9f6cfa0e4bc627' => 
    array (
      0 => 'application/views/templates/workorders/woNotes.tpl',
      1 => 1497341072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12824940635928738eda6aa7-61226615',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5928738eeeef54_17724424',
  'variables' => 
  array (
    'edit' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
    'services' => 0,
    's' => 0,
    'userInfo' => 0,
    'proposal' => 0,
    'notes' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5928738eeeef54_17724424')) {function content_5928738eeeef54_17724424($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
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

        if(form.jnotNote.value == '')
        {
            alert('You must enter a note');
            form.jnotNote.focus();
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
<div class="panel">

    <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderwizrdmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="panel-body">

        <?php $_smarty_tpl->tpl_vars["lead"] = new Smarty_variable("Notes For ", null, 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


       <?php if ($_smarty_tpl->tpl_vars['edit']->value) {?>

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveWONote/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['edit']->value['jnotId'];?>
"  name="userform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="jnotId" id="jnotId" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['jnotId'];?>
">

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Related to Service</label>
                           <select id="jnotJordId" name="jnotJordId" class="form-control">
                               <option value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['jnotJordId'];?>
"><?php if ($_smarty_tpl->tpl_vars['edit']->value['jnotJordId']==0) {?>Entire Proposal<?php } else {
echo $_smarty_tpl->tpl_vars['edit']->value['jordName'];
}?></option>
                               <option value="0">Entire Proposal</option>
                               <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>
                                   <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['jordID'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['jordName'];?>
</option>
                               <?php } ?>
                           </select>
                       </div>
                   </div>
               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Work Order Note</label>
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
                   
                   <div class="col-sm-3">
                      <div class="form-group no-margin-hr">
                           <label class="control-label">Share Note With Customer</label>
                           <input type="checkbox" id="cnotSendNote" name="cnotSendNote" value="1" class="checkbox-inline">
                      </div>
                   	 </div>
                        
                  <div class="col-sm-3">
                          <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['USER_EMAIL'];?>
" class="checkbox-inline">
                          <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryEmail'];?>
" class="checkbox-inline">
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
workorders/saveWONote/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">


<!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Related to Service</label>
                           <select id="jnotJordId" name="jnotJordId" class="form-control">
                               <option value="0">Entire Proposal</option>
                               <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>
                                   <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['jordID'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['jordName'];?>
</option>
                               <?php } ?>
                           </select>
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Work Order Note</label>
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
                   
                   <div class="col-sm-3">
                      <div class="form-group no-margin-hr">
                           <label class="control-label">Share Note With Customer</label>
                           <input type="checkbox" id="cnotSendNote" name="cnotSendNote" value="1" class="checkbox-inline">
                      </div>
                   	 </div>
                        
                  <div class="col-sm-3">
                          <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['USER_EMAIL'];?>
" class="checkbox-inline">
                          <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryEmail'];?>
" class="checkbox-inline">
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
                           <td><span class="note-title">
                                   <?php echo $_smarty_tpl->tpl_vars['d']->value['creator'];?>

                                   <br/>
                                   <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['jnotCreatedDate'],"%A %B %d,  %Y at %I:%M %p");?>
</span>
                               <?php if ($_smarty_tpl->tpl_vars['d']->value['jnotJordId']==0) {?><br/>Entire Proposal<?php } else { ?><br/><?php echo $_smarty_tpl->tpl_vars['d']->value['jordName'];
}?>
                           </td>
                           <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['jnotNote'];?>

                               <?php if ($_smarty_tpl->tpl_vars['d']->value['jnotReminder']) {?><br/><span class="alert-info"> REMINDER SET<br/><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['jnotReminderDate'],"%B %d,  %Y");?>
</span><?php }?>
                           </td>
                           <td class="text-left">
                       <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobStatus']==5) {?>
                       <span class="btn-label icon fa fa-angle-right">&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WONotes/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['jnotId'];?>
">Edit</a>
                       <?php }?>
                       </td>
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
