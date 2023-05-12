<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-07-21 18:23:00
         compiled from "application/views/templates/resources/vehicleTypeList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1508820251574db9e7195d11-26693945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4d5af3e913a77a8572a542609d0fd21f0b1d34c' => 
    array (
      0 => 'application/views/templates/resources/vehicleTypeList.tpl',
      1 => 1465508956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1508820251574db9e7195d11-26693945',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_574db9e71b9de6_31458729',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'vehicles' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574db9e71b9de6_31458729')) {function content_574db9e71b9de6_31458729($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/system/smarty/libs/plugins/function.cycle.php';
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



    /*
     vtypeID 	vtypeName 	vtypeDescription 	vtypeRate

     */

<?php echo '</script'; ?>
>



<!-- / Javascript -->
<div class="panel" >
<div class="panel-heading">

    <h2>Vehicle Types and Rates</h2>
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/CreateVehicleType/"><span class="btn-label icon fa fa-truck"></span> Add Vehicle Types</a>

</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Name</th>
                    <th >Description</th>
                    <th >Rate</th>
                    <th style='width:10%;'>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vehicles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                    <td><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['v']->value['vtypeName'];?>
</span></td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['v']->value['vtypeDescription'];?>
</td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['v']->value['vtypeRate'];?>
</td>
                    <td class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/editVehicleType/<?php echo $_smarty_tpl->tpl_vars['v']->value['vtypeID'];?>
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
