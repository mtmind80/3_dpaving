<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-30 15:05:54
         compiled from "application/views/templates/resources/DocTypesEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61485516757598f37e71a99-60728513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b3e217cbf558297da76ab55c6a808deb463596b' => 
    array (
      0 => 'application/views/templates/resources/DocTypesEdit.tpl',
      1 => 1465508953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61485516757598f37e71a99-60728513',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57598f37e934a9_99086888',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57598f37e934a9_99086888')) {function content_57598f37e934a9_99086888($_smarty_tpl) {?><?php echo '<script'; ?>
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
