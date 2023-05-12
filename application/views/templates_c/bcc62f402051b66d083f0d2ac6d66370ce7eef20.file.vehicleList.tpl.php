<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-07-21 18:22:24
         compiled from "application/views/templates/resources/vehicleList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:295874558574db7dead97e8-45698880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcc62f402051b66d083f0d2ac6d66370ce7eef20' => 
    array (
      0 => 'application/views/templates/resources/vehicleList.tpl',
      1 => 1465508956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '295874558574db7dead97e8-45698880',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_574db7deb044b1_74825142',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'vehicles' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574db7deb044b1_74825142')) {function content_574db7deb044b1_74825142($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/system/smarty/libs/plugins/function.cycle.php';
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

    <h2>Company Vehicles</h2>
    <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/CreateVehicle/"><span class="btn-label icon fa fa-truck"></span> Add Vehicle</a>

<!-- vehicleID,vehicleName,vehicleDescription,vehiclePurchaseDate,vehicleVinNumber,vehicleCreatedBy,vehicleActive,vehicleLocation,vehicleTypeID -->
</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th style='width:20%;'>Name</th>
                    <th style='width:20%;'>Type</th>
                    <th>Location</th>
                    <th style='width:10%;'>Status</th>
                    <th style='width:10%;'>Edit</th>
                    <th style='width:10%;'>Log</th>
                    <th style='width:10%;'>Disable</th>
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
                    <td><span class="note-title"><?php echo $_smarty_tpl->tpl_vars['v']->value['vehicleName'];?>
</span></td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['v']->value['vtypeName'];?>
</td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['v']->value['locName'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['v']->value['locAddress'];?>
</td>
                    <td class="text-center"><?php if ($_smarty_tpl->tpl_vars['v']->value['vehicleActive']) {?>Active<?php } else { ?>In Active<?php }?></td>
                    <td class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/editVehicle/<?php echo $_smarty_tpl->tpl_vars['v']->value['vehicleID'];?>
">Edit</a></td>
                    <td class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/CreateVehicleLog/<?php echo $_smarty_tpl->tpl_vars['v']->value['vehicleID'];?>
">Log</a></td>
                    <td class="text-center"><a href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/deleteVehicle/<?php echo $_smarty_tpl->tpl_vars['v']->value['vehicleID'];?>
','You are about to disable this vehicle. Are you sure?');">Disable</a></td>
                </tr>
            <?php } ?>



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
<?php }} ?>
