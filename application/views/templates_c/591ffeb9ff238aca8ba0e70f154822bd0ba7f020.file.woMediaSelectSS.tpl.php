<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-09 20:28:35
         compiled from "application/views/templates/workorders/woMediaSelectSS.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14409071285759d173bf9056-16374478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '591ffeb9ff238aca8ba0e70f154822bd0ba7f020' => 
    array (
      0 => 'application/views/templates/workorders/woMediaSelectSS.tpl',
      1 => 1465503879,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14409071285759d173bf9056-16374478',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'service' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
    'sid' => 0,
    'medialist' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5759d173c2d004_70745940',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5759d173c2d004_70745940')) {function content_5759d173c2d004_70745940($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/system/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
?><?php echo '<script'; ?>
 type="text/javascript">



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
    });



<?php echo '</script'; ?>
>

<div class="panel">

    <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderwizrdmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="panel-body">
        <?php $_smarty_tpl->tpl_vars["lead"] = new Smarty_variable("Select Media For ", null, 0);?>


        <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <h3> <?php echo $_smarty_tpl->tpl_vars['service']->value['jordName'];?>
</h3>

        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/WOToPDFSS/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="pdataform" id="pdataform"  method="POST">
            <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
            <a id='PrintMe'  href="#" class="btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-print"></span>  Print Service With Selected Images</a>

            <div class="table-primary">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                    <thead>
                    <tr>
                        <th >&nbsp;</th>
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
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['jobmdisImage']) {?>
                        <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                            <td>
                                    <input type='checkbox' name='upload_<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdId'];?>
' id='upload_<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdId'];?>
' value ='<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdId'];?>
'>
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
                        </tr>
                    <?php }?>

                    <?php } ?>



                    </tbody>
                </table>
            </div>
        </form>


    </div>

        </div>




<?php }} ?>
