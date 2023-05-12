<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-02 09:48:24
         compiled from "application/views/templates/resources/DocTypesEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141669244589354c8bdf474-05608662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3f39c06d807154534b0d97baea13e89b2463f35' => 
    array (
      0 => 'application/views/templates/resources/DocTypesEdit.tpl',
      1 => 1465508953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141669244589354c8bdf474-05608662',
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
  'unifunc' => 'content_589354c8c1b935_55326293',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589354c8c1b935_55326293')) {function content_589354c8c1b935_55326293($_smarty_tpl) {?><?php echo '<script'; ?>
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
    /*	PODocTypeID 	PODocTypeName 	PODocTypeSection
     */
<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit Document Type</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/DocTypesList/"><span class="btn-label icon fa fa-wrench"></span> List Document Types</a>
    </div>
    <div class="panel-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveDocTypes/<?php echo $_smarty_tpl->tpl_vars['data']->value['PODocTypeID'];?>
"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Document Type</label>
                        <input type="text" id='PODocTypeName' name="PODocTypeName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['PODocTypeName'];?>
">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Prints</label>
                        <select id='PODocTypeSection' name="PODocTypeSection" class="form-control">
                            <option value='<?php echo $_smarty_tpl->tpl_vars['data']->value['PODocTypeSection'];?>
'><?php if ($_smarty_tpl->tpl_vars['data']->value['PODocTypeSection']==1) {?>One Per page<?php } else { ?>Two Per page<?php }?></option>
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
