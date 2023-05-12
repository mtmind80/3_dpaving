<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-07 12:23:08
         compiled from "application/views/templates/workorders/proposalEmailTemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1022715999592dd7d2691c60-36857224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c31a254cb02a470358b4e9ff335e74b9c7cf9642' => 
    array (
      0 => 'application/views/templates/workorders/proposalEmailTemplate.tpl',
      1 => 1497341054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1022715999592dd7d2691c60-36857224',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592dd7d26bb389_29036950',
  'variables' => 
  array (
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592dd7d26bb389_29036950')) {function content_592dd7d26bb389_29036950($_smarty_tpl) {?>
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
          <h2>Create Proposal Email Tempates</h2>

        <h4>Add reminders to be sent out to clients.</h4>

        <!--
        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>
-->
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>

    </div>

    <div class="wizard-wrapper">
        
    </div>
   <div class="panel-body">

       <?php echo $_smarty_tpl->getSubTemplate ('projects/_proposalEmailTemplateHeader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveProposalEmailTemplate"  name="dataform" id="dataform" class="panel" method="POST">

               <!-- row -->
               <!-- begin row -->
               <div class="row">
               	<div class="col-sm-6">
                	<div class="form-group no-margin-hr">
                    	<label class="control-label">Email Subject</label>
                        <input type="text" name="emailTemplateSubject" id="emailTemplateSubject" class="form-control">
                    </div>
                </div>
                </div>
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr"> 
                           <label class="control-label">Email Message</label>
                           <textarea rows="3" id="tinyMCETextarea" name="jnotNote" class="form-control">[client_name] [project_description] [custom_message] [todays_date] </textarea>
                       </div>
                   </div>
               </div>

               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Create Email Template</a>
                   </div>

               </div>
           </form>

       <!-- /11. $JQUERY_DATA_TABLES -->
       <!-- /11. $JQUERY_DATA_TABLES -->

   </div>
</div>

<?php }} ?>
