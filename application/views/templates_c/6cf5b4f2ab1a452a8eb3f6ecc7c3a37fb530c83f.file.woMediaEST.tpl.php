<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-05-20 17:30:13
         compiled from "application/views/templates/workorders/woMediaEST.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2139227765573f49a50206a7-68165703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cf5b4f2ab1a452a8eb3f6ecc7c3a37fb530c83f' => 
    array (
      0 => 'application/views/templates/workorders/woMediaEST.tpl',
      1 => 1463745599,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2139227765573f49a50206a7-68165703',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'pid' => 0,
    'services' => 0,
    'sid' => 0,
    'mediatypes' => 0,
    'm' => 0,
    'medialist' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573f49a505d4d1_28637313',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573f49a505d4d1_28637313')) {function content_573f49a505d4d1_28637313($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/system/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
?><?php echo '<script'; ?>
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

        if(form.media.value == '')
        {
            alert('You must click the browse button and select a file to upload from your device.');
            form.media.focus();
            return false;
        }
        if(form.jobmdDescription.value == '')
        {
            alert('You must enter a media description');
            form.jobmdDescription.focus();
            return false;
        }


        return true;

    }


<?php echo '</script'; ?>
>


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

    <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOEstimatorClose/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
" class="btn btn-light-green btn-labeled hidden-print"><span class="btn-label icon fa fa-arrow-circle-left"></span> Back to Work Order </a>
    <div class="panel-body">




        <div id="Proposalheader">
            <h3>UPLOAD:<?php echo $_smarty_tpl->tpl_vars['services']->value['jordName'];?>
</h3>
        </div>


       <!-- row -->
       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/uploadWOMedia/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/2"  name="dataform" id="dataform" class="panel" method="POST"
             enctype="multipart/form-data">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
           <input type="hidden" name="sid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
           <input type="hidden" name="jobmdJordID" id="jobmdJordID" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">

           <!-- begin row -->
           <div class="row" >


               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">

                       <label class="control-label">Document Type</label>
                       <br />
                       <select name="jobmdDocumentTypeID" id="jobmdDocumentTypeID">
                           <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mediatypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['PODocTypeID'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['PODocTypeName'];?>
</option>
                           <?php } ?>
                       </select>
                       <br />    <br />
                       <label class="control-label">Service</label>
                       <br />
                       <?php echo $_smarty_tpl->tpl_vars['services']->value['jordName'];?>

                       <br />
                       <br />


                       <label class="control-label">Document Description</label>
                       <br />
                       <textarea class="form-control" name="jobmdDescription" id="jobmdDescription"></textarea>
                       <br />

                       <input type="file" name="media" id="media">
                   </div>
               </div>

               <div class="col-sm-2">
                   <div class="form-group no-margin-hr">

                       <label class="control-label">Restrict View to<br/>Admin Only</label>
                       <br />
                       <input type="checkbox" class='form-control checkbox-inline' name="jobmdAdminOnly" id="jobmdAdminOnly" value="1" checked>
                   </div>
               </div>

               <div class="col-sm-5" >
                   <label class="control-label">Attach Files to Work Order: Acceptable file types are: Image Files, MS Word, MS Excel, MS Powerpoint, PDF files,
                       Open office Files
                   </label>


                   <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Upload Media</a>
               </div>

           </div>
</form>



       <div class="table-primary">
           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
               <thead>
               <tr>
                   <th >Media</th>
                   <th >Uploaded</th>

               </tr>
               </thead>
               <tbody>
               <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
               <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
               <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['medialist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>

                       <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                           <td class="text-left"><a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
media/projects/<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdFileName'];?>
' title="View Document" target='view'><?php echo $_smarty_tpl->tpl_vars['d']->value['PODocTypeName'];?>
</a><br/>
                               <?php if ($_smarty_tpl->tpl_vars['d']->value['jordName']!='') {
echo $_smarty_tpl->tpl_vars['d']->value['jordName'];?>
<br/><?php }?>
                               Description: <?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdDescription'];?>

                           </td>
                           <td><?php echo $_smarty_tpl->tpl_vars['d']->value['uploader'];?>
<br/>
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['jobmdCreatedDateTime'],"%A %B %d,  %Y");?>
</td>
                       </tr>

               <?php } ?>



               </tbody>
           </table>
       </div>


    </div>

        </div>




<?php }} ?>
