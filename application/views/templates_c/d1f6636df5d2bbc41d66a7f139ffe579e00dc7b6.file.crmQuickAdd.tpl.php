<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-14 10:28:31
         compiled from "application/views/templates/crm/crmQuickAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88676635958a3302fb43251-39208091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1f6636df5d2bbc41d66a7f139ffe579e00dc7b6' => 
    array (
      0 => 'application/views/templates/crm/crmQuickAdd.tpl',
      1 => 1465508943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88676635958a3302fb43251-39208091',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'id' => 0,
    'catlist' => 0,
    'c' => 0,
    'states' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58a3302fbaf754_17085295',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58a3302fbaf754_17085295')) {function content_58a3302fbaf754_17085295($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">


    function QADD(form)
    {
        if(!testqa(form)){ return;
        }

        form.submit();
    }

    function testqa(form)
    {

        if(form.cntFirstName.value == '')
        {
            alert('You must enter a value for name');
            form.cntFirstName.focus();
            return false;
        }

        if ($('input[name=cntcid]:checked').length > 0)
        {

        }
        else
        {
            alert('You must select a contact category');
            form.cntcid.focus();
            return false;

        }



        return true;

    }

<?php echo '</script'; ?>
>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveQuickAdd/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" id="quickadd">
    <input type="hidden" id="cntId" name="cntId" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
    <input type="hidden" name="beenhere" value="1">
    <input type="hidden" id="cntQualified" name="cntQualified" value="1" >
     <input type="hidden" name="cntSalutation" value="">
     <input type="hidden" name="cntLastName" value="">
     <input type="hidden" name="cntMiddleName" value="">
     <input type="hidden" name="cntGender" value="M">



    <div class="row">

        <div class="col-sm-10">
            <div class="form-group no-margin-hr">
                <label class="control-label"><span style="color:red;">*</span>Primary Category</label> <ul>
                   <?php if ($_smarty_tpl->tpl_vars['catlist']->value) {?>
<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['catlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                <li> <input type="radio" id="cntcid" name="cntcid" class="form-control-inline" value ="<?php echo $_smarty_tpl->tpl_vars['c']->value['ccatId'];?>
"> &nbsp;<?php echo $_smarty_tpl->tpl_vars['c']->value['ccatName'];?>
</li>
<?php } ?>
                   <?php }?>
            </ul>
            </div>
        </div>


    </div>
    <!-- row -->

    <div class="row">

            <div class="col-sm-5">
                <div class="form-group no-margin-hr">
                    <label class="control-label"><span style="color:red;">*</span>Name</label>
                    <input type="text" id="cntFirstName" name="cntFirstName" class="form-control">
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group no-margin-hr">
                    <label class="control-label"><span style="color:red;">*</span>Primary Contact</label>
                    <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control">
                </div>
            </div>


        </div>
        <!-- row -->



    <!-- begin row -->
    <div class="row">

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Phone</label>
                <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" type="number"   class="form-control">
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Cell</label>
                <input type="text" id="cntAltPhone1" name="cntAltPhone1" type="number"   class="form-control">
            </div>
        </div>


        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Fax</label>
                <input type="text" id="cntAltPhone2" name="cntAltPhone2" type="number"  class="form-control">
            </div>
        </div>


    </div>
    <!-- row -->


    <!-- begin row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label"><span style="color:red;">*</span>Primary Email</label>
                <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" onChange="Javascript:checkEmail(this.value);">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">Alternate Email</label>
                <input type="text" id="cntAltEmail" name="cntAltEmail" class="form-control">
            </div>
        </div>

    </div>
    <!-- row -->


    <!-- begin row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label"> Address Line 1</label>
                <input type="text" id="cntPrimaryAddress1" name="cntPrimaryAddress1" class="form-control" size="45">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">Address line 2</label>
                <input type="text" id="cntPrimaryAddress2" name="cntPrimaryAddress2" class="form-control"  size="45">
            </div>
        </div>

    </div>
    <!-- row -->
    <!-- begin row -->
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">City</label>
                <input type="text" id="cntPrimaryCity" name="cntPrimaryCity" class="form-control">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label"> State</label>
                <select id="cntPrimaryState" name="cntPrimaryState" class="form-control">
                    <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Zip Code</label>
                <input type="text" id="cntPrimaryZip" name="cntPrimaryZip" class="form-control">
            </div>
        </div>

    </div>
    <!-- row -->
    <div class="row">
        <div class="col-sm-2">
            <a href="Javascript:QADD(this.quickadd);" class="btn btn-primary btn-labeled">Save and Continue</a>
        </div>

    </div>

</form>
<?php }} ?>
