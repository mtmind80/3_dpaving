<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-23 13:10:29
         compiled from "application/views/templates/crm/servicesEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94218570357bc4b45d44f98-73464985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0391156f890bdb82843f07d8106faa40f9a57724' => 
    array (
      0 => 'application/views/templates/crm/servicesEdit.tpl',
      1 => 1465508945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94218570357bc4b45d44f98-73464985',
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
  'unifunc' => 'content_57bc4b45dadd43_06635601',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57bc4b45dadd43_06635601')) {function content_57bc4b45dadd43_06635601($_smarty_tpl) {?>


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

        if(form.cservName.value == '')
        {
            alert('You must enter a value for service');
            form.cservName.focus();
            return false;
        }


        return true;

    }


<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit CRM Service</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/servicesList/"><span class="btn-label icon fa fa-clipboard"></span> List Services</a>
    </div>
    <div class="panel-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveServices/<?php echo $_smarty_tpl->tpl_vars['data']->value['cservId'];?>
"  name="dataform" id="dataform" class="panel" method="POST">
            <input type="hidden" name="cservId" id="cservId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cservId'];?>
">

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Service</label>
                        <input type="text" id="cservName" name="cservName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cservName'];?>
">
                    </div>
                </div>

            </div>
            <!-- row -->


    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Service</a>
        </div>
<div class="col-sm-2">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/servicesList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




<?php }} ?>
