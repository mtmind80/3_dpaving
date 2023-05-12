<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-25 03:34:10
         compiled from "application/views/templates/resources/vehicleAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:832485002580ed2b2588823-70620397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67a63638d280d0abdde2d6056be8332d515c0a42' => 
    array (
      0 => 'application/views/templates/resources/vehicleAdd.tpl',
      1 => 1465508956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '832485002580ed2b2588823-70620397',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'vtypes' => 0,
    'recordset' => 0,
    'locations' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580ed2b2601fc0_70638231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580ed2b2601fc0_70638231')) {function content_580ed2b2601fc0_70638231($_smarty_tpl) {?><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/validate.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    init.push(function () {


        $('#bs-datepicker-component').datepicker();


    });


<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.vehicleName.value == '')
        {
            alert('You must enter a value for vehicle name');
            form.vehicleName.focus();
            return false;
        }


        return true;

    }

<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Add Vehicle</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/vehicleList/"><span class="btn-label icon fa fa-truck"></span> List Vehicles</a>

        <!-- vehicleID,vehicleName,vehicleDescription,vehiclePurchaseDate,vehicleVinNumber,vehicleCreatedBy,vehicleActive,vehicleLocation,vehicleTypeID -->
    </div>
    <div class="panel-body">

        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveVehicle"  name="dataform" id="dataform" class="panel" method="POST">
        <input type="hidden" name="vehicleActive" id="vehicleActive" value="1">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Name</label>
                        <input type="text" id='vehicleName' name="vehicleName" class="form-control">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <!-- col-sm-6 -->
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Description</label>
                        <textarea class="form-control" rows="3" cols='65' name="vehicleDescription" id ="vehicleDescription"></textarea>
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Type</label>
                        <select class="form-control form-group-margin" name="vehicleTypeID" id="vehicleTypeID">
                            <?php  $_smarty_tpl->tpl_vars['recordset'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recordset']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vtypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recordset']->key => $_smarty_tpl->tpl_vars['recordset']->value) {
$_smarty_tpl->tpl_vars['recordset']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['recordset']->value['vtypeID'];?>
"><?php echo $_smarty_tpl->tpl_vars['recordset']->value['vtypeName'];?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Location</label>
                        <select class="form-control form-group-margin" name='vehicleLocation' id='vehicleLocation'>
                            <?php  $_smarty_tpl->tpl_vars['recordset'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recordset']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recordset']->key => $_smarty_tpl->tpl_vars['recordset']->value) {
$_smarty_tpl->tpl_vars['recordset']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['recordset']->value['locID'];?>
"><?php echo $_smarty_tpl->tpl_vars['recordset']->value['locName'];?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

            </div>
            <!-- row -->


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Purchase Date</label>
                        <div class="input-group date" id="bs-datepicker-component">
                            <input type="text" id="vehiclePurchaseDate" name="vehiclePurchaseDate"
                                   class="form-control">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                    </div>
                </div>
                <!-- col-sm-6 -->
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">VIN #</label>
                        <input type="text" name="vehicleVinNumber" id="vehicleVinNumber" class="form-control">
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>

    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Vehicle</a>
        </div>
<div class="col-sm-2">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/vehicleList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




<?php }} ?>
