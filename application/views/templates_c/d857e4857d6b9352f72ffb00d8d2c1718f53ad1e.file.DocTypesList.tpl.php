<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-07-21 18:26:04
         compiled from "application/views/templates/resources/DocTypesList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119965455057598f2cbd1352-57586247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd857e4857d6b9352f72ffb00d8d2c1718f53ad1e' => 
    array (
      0 => 'application/views/templates/resources/DocTypesList.tpl',
      1 => 1465508954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119965455057598f2cbd1352-57586247',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57598f2cbee0a4_45514734',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57598f2cbee0a4_45514734')) {function content_57598f2cbee0a4_45514734($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/system/smarty/libs/plugins/function.cycle.php';
?>
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

<!-- / Javascript -->
<div class="panel" >
<div class="panel-heading">

    <h2>Document Types</h2>
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/CreateDocTypes/"><span class="btn-label icon fa fa-wrench"></span> Add New</a>

</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Document Type</th>
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
                <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                    <td><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['d']->value['PODocTypeName'];?>
</span></td>
                    <td class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/editDocTypes/<?php echo $_smarty_tpl->tpl_vars['d']->value['PODocTypeID'];?>
">Edit</a></td>
                </tr>
            <?php } ?>



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
<?php }} ?>
