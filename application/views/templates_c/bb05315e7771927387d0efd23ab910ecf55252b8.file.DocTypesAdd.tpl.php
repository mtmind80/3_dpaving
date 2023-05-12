<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-08 00:23:41
         compiled from "application/views/templates/resources/DocTypesAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133555415357599121017fb0-63939566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb05315e7771927387d0efd23ab910ecf55252b8' => 
    array (
      0 => 'application/views/templates/resources/DocTypesAdd.tpl',
      1 => 1465508953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133555415357599121017fb0-63939566',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575991210292e7_95789544',
  'variables' => 
  array (
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575991210292e7_95789544')) {function content_575991210292e7_95789544($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.PODocTypeName.value == '')
        {
            alert('You must enter a value for document type');
            form.PODocTypeName.focus();
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

        <h2>Add Document Type</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/DocTypesList/"><span class="btn-label icon fa fa-wrench"></span> List Document Types</a>
    </div>
    <div class="panel-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveDocTypes"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Document Type</label>
                        <input type="text" id='PODocTypeName' name="PODocTypeName" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Prints</label>
                        <select id='PODocTypeSection' name="PODocTypeSection" class="form-control">
                            <option value='1'>One Per page</option>
                            <option value='2'>Two per page</option>
                            </select>
                    </div>
                </div>

            </div>
            <!-- row -->
    <!-- buton row -->
        <div class="row">
        <div class="col-sm-4">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save And Continue</a>
        </div>
<div class="col-sm-4">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/DocTypesList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




<?php }} ?>
