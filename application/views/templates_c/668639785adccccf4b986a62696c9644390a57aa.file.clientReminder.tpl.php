<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-19 09:28:35
         compiled from "application/views/templates/workorders/clientReminder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14013014135880db233d4a67-62198857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '668639785adccccf4b986a62696c9644390a57aa' => 
    array (
      0 => 'application/views/templates/workorders/clientReminder.tpl',
      1 => 1479246117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14013014135880db233d4a67-62198857',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'proposal' => 0,
    'pid' => 0,
    'templates' => 0,
    'template' => 0,
    'userInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5880db23447f38_65562375',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5880db23447f38_65562375')) {function content_5880db23447f38_65562375($_smarty_tpl) {?>
<?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });


    function CHECKIT(form)
    {
        form.submit();
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
          <h2>Proposal Reminders </h2>

        <h4>Add reminders to be sent out to clients.</h4>

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
'><span class="wizard-step-description" style="color: #000000;">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">

       <?php echo $_smarty_tpl->getSubTemplate ('projects/_proposalheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveProposalEmailReminder/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">
               <input type="hidden" name="jnotJordId" id="jnotJordId" value="0">
               <input type="hidden" name="jobID" id="jobID" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">

               <!-- row -->
               <!-- begin row -->
               <div class="row">
               	<div class="col-sm-6">
                	<div class="form-group no-margin-hr">
                    	<label class="control-label">Select An Email Template</label>
                        <select class="form-control" name="jnotEmailTemplate" id="jnotEmailTemplate">
                        	<?php  $_smarty_tpl->tpl_vars['template'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['template']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['templates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['template']->key => $_smarty_tpl->tpl_vars['template']->value) {
$_smarty_tpl->tpl_vars['template']->_loop = true;
?>
                            <option value=<?php echo $_smarty_tpl->tpl_vars['template']->value['ID'];?>
><?php echo $_smarty_tpl->tpl_vars['template']->value['title'];?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Mark This Proposal As Hot</label>
                           <input type="checkbox" name="ishot" id="ishot" value="1" class="form-control">
                       </div>
               </div>
               <div class="row">
                   <div class="col-sm-12">
                       <div class="form-group no-margin-hr"> 
                           <label class="control-label">Extra Content To Go In Email</label>
                           <textarea rows="3" id="tinyMCETextarea" name="jnotNote" class="form-control"></textarea>
                       </div>
                   </div>
               </div>
               
               <!-- row -->

                        
                  <div class="col-sm-3">
                          <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['USER_EMAIL'];?>
" class="checkbox-inline">
                          <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryEmail'];?>
" class="checkbox-inline">
                          <input type="hidden" id="cnotSendNoteTo" name="cnotjobID" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
" class="checkbox-inline">
                  </div>
               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Set Follow Up Email</a>
                   </div>

               </div>
           </form>

       <!-- /11. $JQUERY_DATA_TABLES -->
       <!-- /11. $JQUERY_DATA_TABLES -->

   </div>
</div>

<?php }} ?>
