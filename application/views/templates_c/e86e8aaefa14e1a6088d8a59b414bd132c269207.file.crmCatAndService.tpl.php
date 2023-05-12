<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-20 09:46:20
         compiled from "application/views/templates/crm/crmCatAndService.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1111512045588230cc836301-10424671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e86e8aaefa14e1a6088d8a59b414bd132c269207' => 
    array (
      0 => 'application/views/templates/crm/crmCatAndService.tpl',
      1 => 1465508942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1111512045588230cc836301-10424671',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'SITE_URL' => 0,
    'id' => 0,
    'categories' => 0,
    'myflag' => 0,
    'cat' => 0,
    'services' => 0,
    'serv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_588230cc957c02_59805187',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588230cc957c02_59805187')) {function content_588230cc957c02_59805187($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">

    var id = <?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
;

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {


        return true;

    }


<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

            <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
</h2>
        <?php echo $_smarty_tpl->tpl_vars['data']->value['ccatName'];?>
<br/>

        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>

        
        <?php if ($_smarty_tpl->tpl_vars['data']->value['cntcid']==9&&$_smarty_tpl->tpl_vars['data']->value['cntCompanyId']>0) {?>
            <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/startProposal/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntCompanyId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
"><span class="btn-label icon fa fa-plus"></span> New Proposal</a>
        <?php }?>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" >Basic Information &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/additionalInformation/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" >Connections &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/catandservice/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" style='color: #000000;'>Categories and Services &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/crmNotes/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Notes</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Profile</span></a> </span> </li
                    >
        </ul>
    </div>

    <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/savecatandservice/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
"  name="dataform" id="dataform" class="panel" method="POST">
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" name="cntId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
">

   <div class="panel-body">

            <div class="row">
               <div class="col-sm-5">
                         <div class="form-group no-margin-hr"  style="text-align:top;">
                            <label class="control-label">Contact Categories</label>
                                <?php $_smarty_tpl->tpl_vars['myflag'] = new Smarty_variable(1, null, 0);?>
                             <div><span class="fa fa-asterisk"></span> System Categories</div>
                             <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['myflag']->value!=$_smarty_tpl->tpl_vars['cat']->value['ccatDoNotDelete']) {?>
                                    <br />
                                    <div><span class="fa fa-circle-o"></span> General Categories</div>
                                    <input type="checkbox" name="cat_<?php echo $_smarty_tpl->tpl_vars['cat']->value['ccatId'];?>
" id="cat_<?php echo $_smarty_tpl->tpl_vars['cat']->value['ccatId'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['ccatId'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['catuserid']) {?>checked<?php }?>> &nbsp;<?php if ($_smarty_tpl->tpl_vars['cat']->value['ccatDoNotDelete']) {?><span style="background:#d9edf7"><?php echo $_smarty_tpl->tpl_vars['cat']->value['ccatName'];?>
</span><?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['cat']->value['ccatName'];
}?>
                                    <br />
                                <?php } else { ?>
                                  <input type="checkbox" name="cat_<?php echo $_smarty_tpl->tpl_vars['cat']->value['ccatId'];?>
" id="cat_<?php echo $_smarty_tpl->tpl_vars['cat']->value['ccatId'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['ccatId'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['catuserid']) {?>checked<?php }?>> &nbsp;<?php if ($_smarty_tpl->tpl_vars['cat']->value['ccatDoNotDelete']) {?><span style="background:#d9edf7"><?php echo $_smarty_tpl->tpl_vars['cat']->value['ccatName'];?>
</span><?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['cat']->value['ccatName'];
}?>
                                    <br />
                                <?php }?>
                                 <?php $_smarty_tpl->tpl_vars['myflag'] = new Smarty_variable($_smarty_tpl->tpl_vars['cat']->value['ccatDoNotDelete'], null, 0);?>
                             <?php } ?>

                        </div>
                </div>

                <div class="col-sm-5" >
                    <div class="form-group no-margin-hr" style="text-align:top;">
                        <label class="control-label">Services</label>
                        <?php  $_smarty_tpl->tpl_vars['serv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['serv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['serv']->key => $_smarty_tpl->tpl_vars['serv']->value) {
$_smarty_tpl->tpl_vars['serv']->_loop = true;
?>
                            <br /><input type="checkbox" id="serv_<?php echo $_smarty_tpl->tpl_vars['serv']->value['cservId'];?>
" name="serv_<?php echo $_smarty_tpl->tpl_vars['serv']->value['cservId'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['serv']->value['cservId'];?>
" <?php if ($_smarty_tpl->tpl_vars['serv']->value['servuserid']) {?>checked<?php }?>> &nbsp; <?php echo $_smarty_tpl->tpl_vars['serv']->value['cservName'];?>

                        <?php } ?>

                    </div>
                </div>
            </div>
            <!-- row -->





<!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
    </div>

</div>
</form>

</div>
</div>

<?php }} ?>
