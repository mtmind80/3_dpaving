<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-01-27 13:09:48
         compiled from "application/views/templates/projects/poMediaSelect.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18982721316011661cf13859-93620971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bcf24e52d649cdd07e5a90a74e9290c59bf7ec4' => 
    array (
      0 => 'application/views/templates/projects/poMediaSelect.tpl',
      1 => 1497341000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18982721316011661cf13859-93620971',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'proposal' => 0,
    'pid' => 0,
    'medialist' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_6011661d0d2c83_61952994',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6011661d0d2c83_61952994')) {function content_6011661d0d2c83_61952994($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/pavingd/public_html/system/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?><?php echo '<script'; ?>
>
    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" },
            "pageLength": 100

        }  );
        //$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');


        $('#PrintMe').click(function() {
            showSpinner();
            $( "#pdataform" ).submit();
            setTimeout("hideSpinner()",5000);
        });

        $("#selectall").click(function(){
            //alert("just for check");
            if(this.checked){
                $('.checkboxall').each(function(){
                    this.checked = true;


                })
            }else{
                $('.checkboxall').each(function(){
                    this.checked = false;


                })
            }
        });


    });



<?php echo '</script'; ?>
>


<div class="panel">
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
'><span class="wizard-step-description" >Notes &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Media/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" style="color: #000000;">Upload &nbsp;</span></a> </span> </li
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


    <div class="panel-heading">
          <h2>Select Media To Print With Proposal</h2>
        <h3><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobName'];?>
</h3>

    </div>
   <div class="panel-body">

       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/ProposalToPDFWithImages/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="pdataform" id="pdataform"  method="POST">
           <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
           <a id='PrintMe'  href="#" class="btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-print"></span>  Print Proposal With Selected Images</a>
           <div class="table-primary">
           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">

               <thead>
               <tr>
                   <th colspan='4' ><input type="checkbox" id="selectall"> select all
                       &nbsp;
                   </th>
               </tr>
               <tr>
                   <th >&nbsp;</th>
                   <th >Media</th>
                   <th >Uploaded</th>
                   <th style='width:10%;'>Delete</th>
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
                           <td>
                               <?php if ($_smarty_tpl->tpl_vars['d']->value['jobmdisImage']) {?>
                               <input type='checkbox' data-id='<?php echo $_smarty_tpl->tpl_vars['d']->value['PODocTypeName'];?>
' class='checkboxall' name='upload_<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdId'];?>
' id='upload_<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdId'];?>
' value ='<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdId'];?>
'>
                                <?php }?>
                           </td>
                           <td class="text-left">
                               <span class="alert-success">Description:</span> <?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdDescription'];?>

                               <br/>
                               <?php echo (($tmp = @$_smarty_tpl->tpl_vars['d']->value['jordName'])===null||$tmp==='' ? 'Entire Proposal' : $tmp);?>

                               <br/>
                               <?php echo $_smarty_tpl->tpl_vars['d']->value['PODocTypeName'];?>
 <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
media/projects/<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdFileName'];?>
' title="View Document" target='view'>View Upload</a>
                           </td>
                           <td><?php echo $_smarty_tpl->tpl_vars['d']->value['uploader'];?>
<br/>
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['jobmdCreatedDateTime'],"%A %B %d,  %Y");?>
</td>
                           <td class="text-left"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/DeleteMedia/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdId'];?>
/<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdFileName'];?>
','You are about to delete this media permananently.\nAre you Sure?');">Delete</a></td>
                       </tr>

               <?php } ?>



               </tbody>
           </table>
       </div>
</form>

    </div>

        </div>




<?php }} ?>
