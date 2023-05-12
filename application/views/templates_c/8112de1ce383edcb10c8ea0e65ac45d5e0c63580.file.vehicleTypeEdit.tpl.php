<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-24 09:49:24
         compiled from "application/views/templates/resources/vehicleTypeEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2103580147599ee7746b07d0-51043553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8112de1ce383edcb10c8ea0e65ac45d5e0c63580' => 
    array (
      0 => 'application/views/templates/resources/vehicleTypeEdit.tpl',
      1 => 1497341043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2103580147599ee7746b07d0-51043553',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_599ee7747285c4_39401073',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599ee7747285c4_39401073')) {function content_599ee7747285c4_39401073($_smarty_tpl) {?>

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

        <h2>Edit Vehicle Type</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/vehicleTypeList/"><span class="btn-label icon fa fa-truck"></span> Vehicle Types</a>

    </div>
    <div class="panel-body">

        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveVehicleType/<?php echo $_smarty_tpl->tpl_vars['result']->value['vtypeID'];?>
"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Type</label>
                        <input type="text" id='vtypeName' name="vtypeName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['vtypeName'];?>
">
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
                        <textarea class="form-control" rows="3" cols='65' name="vtypeDescription" id ="vtypeDescription"><?php echo $_smarty_tpl->tpl_vars['result']->value['vtypeDescription'];?>
</textarea>
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Rate Per Hour</label>
                        <input type="text" id='vtypeRate' name="vtypeRate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['vtypeRate'];?>
">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- buton row -->
            <div class="row">
                <div class="col-sm-2">
                    <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Update Type</a>
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
