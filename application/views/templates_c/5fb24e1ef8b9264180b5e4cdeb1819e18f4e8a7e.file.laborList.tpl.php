<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-13 18:21:10
         compiled from "application/views/templates/resources/laborList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44323298757508278de9432-55254825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fb24e1ef8b9264180b5e4cdeb1819e18f4e8a7e' => 
    array (
      0 => 'application/views/templates/resources/laborList.tpl',
      1 => 1465508954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44323298757508278de9432-55254825',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57508278e037c8_92518258',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57508278e037c8_92518258')) {function content_57508278e037c8_92518258($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/system/smarty/libs/plugins/function.cycle.php';
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

    <h2>Labor Rates</h2>
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/CreateLabor/"><span class="btn-label icon fa fa-wrench"></span> Add Labor Rate</a>

</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Name</th>
                    <th >Rate</th>
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
                    <td><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['d']->value['rateName'];?>
</span></td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['rateAmount'];?>
</td>
                    <td class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/editlabor/<?php echo $_smarty_tpl->tpl_vars['d']->value['rateID'];?>
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
