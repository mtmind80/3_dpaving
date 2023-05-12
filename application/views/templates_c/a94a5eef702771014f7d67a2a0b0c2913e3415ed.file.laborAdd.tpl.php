<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-08 12:07:33
         compiled from "application/views/templates/resources/laborAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9181037995a0347e582d3c5-32169038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a94a5eef702771014f7d67a2a0b0c2913e3415ed' => 
    array (
      0 => 'application/views/templates/resources/laborAdd.tpl',
      1 => 1497341030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9181037995a0347e582d3c5-32169038',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a0347e58a1784_72992864',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0347e58a1784_72992864')) {function content_5a0347e58a1784_72992864($_smarty_tpl) {?><?php echo '<script'; ?>
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

        <h2>Labor Rate</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/laborList/"><span class="btn-label icon fa fa-wrench"></span> Labor Rates List</a>
    </div>
    <div class="panel-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveLabor"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Rate Name</label>
                        <input type="text" id='rateName' name="rateName" class="form-control">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Rate Per Hour</label>
                        <input type="text" name="rateAmount" id="rateAmount" class="form-control">
                    </div>
                </div>
            </div>
            <!-- row -->


    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Rate</a>
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
