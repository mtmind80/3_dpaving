<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-03-11 15:11:31
         compiled from "application/views/templates/resources/vehicleTypeAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77555166622b66a3441399-50355397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7b55315845c70d7c05cead23daad62ac196b70b' => 
    array (
      0 => 'application/views/templates/resources/vehicleTypeAdd.tpl',
      1 => 1497341043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77555166622b66a3441399-50355397',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_622b66a35879a9_15824101',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_622b66a35879a9_15824101')) {function content_622b66a35879a9_15824101($_smarty_tpl) {?>

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

        if(!isAlphaNumericAndSpace(form.vtypeName.value))
        {
            alert('You must enter a value for vehicle type.');
            form.vtypeName.focus();
            return false;
        }

        if(!isFloat(form.vtypeRate.value))
        {
            alert('Rate must be a valid number or zero..');
            form.vtypeRate.focus();
            return false;

        }
        return true;

    }
    /*
     vtypeID 	vtypeName 	vtypeDescription 	vtypeRate

     */

<?php echo '</script'; ?>
>




<div class="panel">
    <div class="panel-heading">

        <h2>Add Vehicle Type</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/vehicleTypeList/"><span class="btn-label icon fa fa-truck"></span> Vehicle Types</a>

    </div>
    <div class="panel-body">

        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveVehicleType/"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Type</label>
                        <input type="text" id='vtypeName' name="vtypeName" class="form-control">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <!-- col-sm-6 -->
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" rows="3" cols='65' name="vtypeDescription" id ="vtypeDescription"></textarea>
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Rate Per Hour</label>
                        <input type="text" id='vtypeRate' name="vtypeRate" class="form-control" >
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- buton row -->
            <div class="row">
                <div class="col-sm-2">
                  <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Type</a>
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/vehicleTypeList/" class="btn btn-primary btn-labeled">Cancel</a>
               </div>
            </div>
    </form>
    </div>
</div>




<?php }} ?>
