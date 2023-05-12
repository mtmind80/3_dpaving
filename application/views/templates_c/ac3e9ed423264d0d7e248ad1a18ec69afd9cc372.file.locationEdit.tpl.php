<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-08 00:19:11
         compiled from "application/views/templates/resources/locationEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1738207621582119ff3fa427-67463661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac3e9ed423264d0d7e248ad1a18ec69afd9cc372' => 
    array (
      0 => 'application/views/templates/resources/locationEdit.tpl',
      1 => 1465508954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1738207621582119ff3fa427-67463661',
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
  'unifunc' => 'content_582119ff420393_98970450',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582119ff420393_98970450')) {function content_582119ff420393_98970450($_smarty_tpl) {?>
<?php echo '<script'; ?>
 type="text/javascript">

    function CHECKITR(form)
    {
        if(!testr(form)){ return;
        }

        form.submit();
    }

    function testr(form)
    {

        if(form.locName.value == '')
        {
            alert('You must enter a value for location name');
            form.locName.focus();
            return false;
        }


        return true;

    }



<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit Location</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/showLocations/"><span class="btn-label icon fa fa-globe"></span> List Locations</a>

        <!-- vehicleID,vehicleName,vehicleDescription,vehiclePurchaseDate,vehicleVinNumber,vehicleCreatedBy,vehicleActive,vehicleLocation,vehicleTypeID -->
    </div>
    <div class="panel-body">

        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveLocations/<?php echo $_smarty_tpl->tpl_vars['data']->value['locID'];?>
"  name="dataform" id="dataform" class="panel" method="POST">
        <input type="hidden" name="locID" id="locID" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['locID'];?>
">

           <!-- begin row -->
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Location Name</label>
                        <input type="text" id='locName' name="locName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['locName'];?>
">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Address</label>
                        <input type="text" id='locAddress' name="locAddress" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['locAddress'];?>
">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">City</label>
                        <input type="text" id='locCity' name="locCity" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['locCity'];?>
">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">State</label>
                        <input type="text" id='locState' name="locState" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['locState'];?>
">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Zip</label>
                        <input type="text" id='locZip' name="locZip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['locZip'];?>
">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Phone</label>
                        <input type="text" id='locPhone' name="locPhone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['locPhone'];?>
">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Manager</label>
                        <input type="text" id='locManager' name="locManager" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['locManager'];?>
">
                    </div>
                </div>
            </div>
            <!-- row -->


            <!-- buton row -->
<div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKITR(this.dataform);" class="btn btn-primary btn-labeled">Update Location</a>
        </div>
<div class="col-sm-2" id="clickme"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/showLocations" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>



<?php }} ?>
