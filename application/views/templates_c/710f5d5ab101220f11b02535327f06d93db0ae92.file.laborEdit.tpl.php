<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-08 12:07:04
         compiled from "application/views/templates/resources/laborEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3291847905a0347c87d8c73-94774402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '710f5d5ab101220f11b02535327f06d93db0ae92' => 
    array (
      0 => 'application/views/templates/resources/laborEdit.tpl',
      1 => 1497341030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3291847905a0347c87d8c73-94774402',
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
  'unifunc' => 'content_5a0347c886d7c0_24935770',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0347c886d7c0_24935770')) {function content_5a0347c886d7c0_24935770($_smarty_tpl) {?>
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

        if(form.rateName.value == '')
        {
            alert('You must enter a value for name');
            form.rateName.focus();
            return false;
        }

        if(form.rateAmount.value != parseFloat(form.rateAmount.value))
        {
            alert('You must enter a number for rate');
            form.rateAmount.value = 0;
            form.rateAmount.focus();
            return false;
        }

        return true;

    }
<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit Rate</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/laborList/"><span class="btn-label icon fa fa-wrench"></span> Labor Rates List</a>

    </div>
    <div class="panel-body">

        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveLabor/<?php echo $_smarty_tpl->tpl_vars['data']->value['rateID'];?>
"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <input type='hidden' name='rateID' value='<?php echo $_smarty_tpl->tpl_vars['data']->value['rateID'];?>
'>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Rate Name</label>
                        <input type="text" id='rateName' name="rateName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['rateName'];?>
">
                    </div>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Rate Per Hour</label>
                        <input type="text" id='rateAmount' name="rateAmount" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['rateAmount'];?>
">
                    </div>
                </div>
            </div>
            <!-- row -->
    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Rate</a>
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
