<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-09 09:45:13
         compiled from "application/views/templates/workorders/WONotifications.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1304843588589c8e89addc44-47744098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c03c51d5874800f508c93930a5ea3f14ece2f7a' => 
    array (
      0 => 'application/views/templates/workorders/WONotifications.tpl',
      1 => 1479246118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1304843588589c8e89addc44-47744098',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'USER_ROLE' => 0,
    'services' => 0,
    'details' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
    'sid' => 0,
    'userInfo' => 0,
    'proposal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_589c8e89b34dd2_23346697',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589c8e89b34dd2_23346697')) {function content_589c8e89b34dd2_23346697($_smarty_tpl) {?>
<?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });


    function CHECKIT(form)
    {

        form.submit();
    }

    function test(form)
    {

        if(form.tinyMCETextarea.value == '')
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
<?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==4||$_smarty_tpl->tpl_vars['USER_ROLE']->value==5) {?>
<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderwizrdmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
   <div class="panel-body">


   <div id="Proposalheader">
       <h2> <span  class="fa fa-truck" style="background:<?php echo $_smarty_tpl->tpl_vars['services']->value['catcolor'];?>
;">&nbsp;</span><?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
 <?php if ($_smarty_tpl->tpl_vars['details']->value['jordStatus']=="COMPLETED") {?><span class='alert-info'>COMPLETED</span><?php }?></h2>
               <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


   </div>
   
   <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveWOEmail/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="workOrderID" id="workOrderID" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">


<!-- begin row -->

               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Work Order Email Body</label>
                           <textarea rows="3" id="tinyMCETextarea" name="jnotNote" class="form-control"></textarea>
                       </div>
                   </div>
                    <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Work Order Email Subject</label>
                           <input type="text" name="jnotEmailTitle" id="jnotEmailTitle" class="form-control">
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
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
                           <label class="control-label">Send Email Immediately After Saving</label>
                           <input type="checkbox" id="cnotSendNoteNow" name="cnotSendNoteNow" value="1" class="checkbox-inline">
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
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save Email</a>
                   </div>

               </div>
           </form>


   </div>
   </div><?php }} ?>
