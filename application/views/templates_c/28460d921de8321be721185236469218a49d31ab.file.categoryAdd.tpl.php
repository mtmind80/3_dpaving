<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-21 05:08:30
         compiled from "application/views/templates/crm/categoryAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14443620015b2b791e1e2f70-37071842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28460d921de8321be721185236469218a49d31ab' => 
    array (
      0 => 'application/views/templates/crm/categoryAdd.tpl',
      1 => 1497340954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14443620015b2b791e1e2f70-37071842',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b2b791e27dd04_26112434',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b2b791e27dd04_26112434')) {function content_5b2b791e27dd04_26112434($_smarty_tpl) {?>


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

        <h2>CRM Category</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/categoryList/"><span class="btn-label icon fa fa-check"></span> List Categories</a>
    </div>
    <div class="panel-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveCategory/"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Category</label>
                        <input type="text" id="ccatName" name="ccatName" class="form-control" >
                    </div>
                </div>

            </div>
            <!-- row -->


    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Category</a>
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
