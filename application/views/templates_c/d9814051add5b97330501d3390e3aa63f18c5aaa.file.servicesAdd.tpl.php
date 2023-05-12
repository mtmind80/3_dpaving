<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-12 04:22:12
         compiled from "application/views/templates/crm/servicesAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:434673759582698f42db398-01380598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9814051add5b97330501d3390e3aa63f18c5aaa' => 
    array (
      0 => 'application/views/templates/crm/servicesAdd.tpl',
      1 => 1465508945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '434673759582698f42db398-01380598',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582698f42ec6d1_27709345',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582698f42ec6d1_27709345')) {function content_582698f42ec6d1_27709345($_smarty_tpl) {?>


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

        <h2>CRM Service</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/servicesList/"><span class="btn-label icon fa fa-clipboard"></span> List Services</a>
    </div>
    <div class="panel-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveServices/"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Service</label>
                        <input type="text" id="cservName" name="cservName" class="form-control" >
                    </div>
                </div>

            </div>
            <!-- row -->


    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Service</a>
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
