<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-16 17:15:58
         compiled from "application/views/templates/resources/equipmentList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1184426585587d542eeb3825-53217441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '165def4894856b433b783184135582166363b592' => 
    array (
      0 => 'application/views/templates/resources/equipmentList.tpl',
      1 => 1465508954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1184426585587d542eeb3825-53217441',
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
  'unifunc' => 'content_587d542eefa6c2_95309252',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587d542eefa6c2_95309252')) {function content_587d542eefa6c2_95309252($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/devdashboard/public_html/system/smarty/libs/plugins/function.cycle.php';
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

    <h2>Equipment and Rates</h2>
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/CreateEquipment/"><span class="btn-label icon fa fa-wrench"></span> Add Equipment</a>

</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Name</th>
                    <th >Cost</th>
                    <th >Min Cost</th>
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
                    <td><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['d']->value['equipName'];?>
 - <?php echo $_smarty_tpl->tpl_vars['d']->value['equipRate'];?>
</span></td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['equipCost'];?>
</td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['equipMinCost'];?>
</td>
                    <td class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/editEquipment/<?php echo $_smarty_tpl->tpl_vars['d']->value['equipID'];?>
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
