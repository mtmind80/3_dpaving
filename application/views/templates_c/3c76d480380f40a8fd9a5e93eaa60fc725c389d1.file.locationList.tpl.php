<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-01-13 16:25:15
         compiled from "application/views/templates/resources/locationList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93812140361e0526b1b2920-55840934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c76d480380f40a8fd9a5e93eaa60fc725c389d1' => 
    array (
      0 => 'application/views/templates/resources/locationList.tpl',
      1 => 1497341032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93812140361e0526b1b2920-55840934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_61e0526b385361_02235009',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61e0526b385361_02235009')) {function content_61e0526b385361_02235009($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/pavingd/public_html/system/smarty/libs/plugins/function.cycle.php';
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

    <h2>Company Locations</h2>
<!--
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/CreateEquipment/"><span class="btn-label icon fa fa-wrench"></span> Add Equipment</a>
-->
</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Name</th>
                    <th >Address</th>
                    <th >Phone/Manager</th>
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
                    <td><span class="note-title"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/editLocations/<?php echo $_smarty_tpl->tpl_vars['d']->value['locID'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['locName'];?>
</a></span></td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['locAddress'];?>
<br/> <?php echo $_smarty_tpl->tpl_vars['d']->value['locCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['d']->value['locState'];?>
. <?php echo $_smarty_tpl->tpl_vars['d']->value['locZip'];?>
</td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['locPhone'];?>
<br/><?php echo $_smarty_tpl->tpl_vars['d']->value['locManager'];?>
</td>
                    <td class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/editLocations/<?php echo $_smarty_tpl->tpl_vars['d']->value['locID'];?>
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
