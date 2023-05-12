<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-05 18:15:01
         compiled from "application/views/templates/crm/categoryEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146815648157f543251f1499-84138133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7ba25a74f367713856b81e3fa4c2429ec8ce0fe' => 
    array (
      0 => 'application/views/templates/crm/categoryEdit.tpl',
      1 => 1465508941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146815648157f543251f1499-84138133',
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
  'unifunc' => 'content_57f54325206eb1_79393245',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f54325206eb1_79393245')) {function content_57f54325206eb1_79393245($_smarty_tpl) {?>


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

        if(form.ccatName.value == '')
        {
            alert('You must enter a value for category');
            form.ccatName.focus();
            return false;
        }


        return true;

    }


<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit CRM Category</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/categoryList/"><span class="btn-label icon fa fa-check"></span> List Categories</a>
    </div>
    <div class="panel-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveCategory/<?php echo $_smarty_tpl->tpl_vars['data']->value['ccatId'];?>
"  name="dataform" id="dataform" class="panel" method="POST">
            <input type="hidden" name="ccatId" id="ccatId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ccatId'];?>
">

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Category</label>
                        <input type="text" id="ccatName" name="ccatName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ccatName'];?>
">
                    </div>
                </div>

            </div>
            <!-- row -->


    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Category</a>
        </div>
<div class="col-sm-2">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/categoryList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




<?php }} ?>
