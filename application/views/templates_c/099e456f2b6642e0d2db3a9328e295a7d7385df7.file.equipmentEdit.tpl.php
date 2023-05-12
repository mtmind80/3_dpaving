<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-24 15:33:34
         compiled from "application/views/templates/resources/equipmentEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6669645025976599e4af534-14815022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '099e456f2b6642e0d2db3a9328e295a7d7385df7' => 
    array (
      0 => 'application/views/templates/resources/equipmentEdit.tpl',
      1 => 1497341029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6669645025976599e4af534-14815022',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5976599e5f6179_43539189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5976599e5f6179_43539189')) {function content_5976599e5f6179_43539189($_smarty_tpl) {?>

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

        if(form.equipName.value == '')
        {
            alert('You must enter a value for equipment name');
            form.equipName.focus();
            return false;
        }

        if(form.equipCost.value != parseFloat(form.equipCost.value))
        {
            alert('You must enter a number for equipment cost');
            form.equipCost.value = 0;
            form.equipCost.focus();
            return false;
        }

        if(form.equipMinCost.value != parseFloat(form.equipMinCost.value))
        {
            alert('You must enter a number for equipment minimum cost');
            form.equipMinCost.value = 0;
            form.equipMinCost.focus();
            return false;
        }
        return true;

    }
/*equipName Ascending 	equipRate 	equipCost 	equipMinCost

 */
<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit Equipment</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/equipmentList/"><span class="btn-label icon fa fa-wrench"></span> List Equipment</a>

        <!-- vehicleID,vehicleName,vehicleDescription,vehiclePurchaseDate,vehicleVinNumber,vehicleCreatedBy,vehicleActive,vehicleLocation,vehicleTypeID -->
    </div>
    <div class="panel-body">

        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveEquipment/<?php echo $_smarty_tpl->tpl_vars['data']->value['equipID'];?>
"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <input type='hidden' name='equipID' value='<?php echo $_smarty_tpl->tpl_vars['data']->value['equipID'];?>
'>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Equipment Name</label>
                        <input type="text" id='equipName' name="equipName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['equipName'];?>
">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Equipment Rate</label>
                        <select class="form-control form-group-margin" name="equipRate" id="equipRate">
                            <option value="per day" <?php if ($_smarty_tpl->tpl_vars['data']->value['equipRate']=='per day') {?>selected<?php }?>>per day</option>
                            <option value="per hour"  <?php if ($_smarty_tpl->tpl_vars['data']->value['equipRate']=='per hour') {?>selected<?php }?>>per hour</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Cost</label>
                        <input type="text" name="equipCost" id="equipCost" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['equipCost'];?>
">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Min Cost</label>
                        <input type="text" name="equipMinCost" id="equipMinCost" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['equipMinCost'];?>
">
                    </div>
                </div>
            </div>

    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Equipment</a>
        </div>
<div class="col-sm-2">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/equipmentList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




<?php }} ?>
