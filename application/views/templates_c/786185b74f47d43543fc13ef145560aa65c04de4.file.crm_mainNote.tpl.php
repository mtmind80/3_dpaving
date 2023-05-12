<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-10 14:32:52
         compiled from "application/views/templates/crm/crm_mainNote.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1444818176573c88e7df72e4-86948873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '786185b74f47d43543fc13ef145560aa65c04de4' => 
    array (
      0 => 'application/views/templates/crm/crm_mainNote.tpl',
      1 => 1465508944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1444818176573c88e7df72e4-86948873',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573c88e7e74b43_89637106',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'CONTENT' => 0,
    'managers' => 0,
    'manage' => 0,
    'cid' => 0,
    'properties' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573c88e7e74b43_89637106')) {function content_573c88e7e74b43_89637106($_smarty_tpl) {?>
<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-group page-header-icon"></i>&nbsp;&nbsp;Contact Manager</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <!-- "Create project" button, width=auto on desktops -->
                <div class="pull-right col-xs-12 col-sm-auto">
                    <a class="btn btn-primary btn-labeled" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showCRMList"><span class="btn-label icon fa fa-male"></span> List Contacts</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/select/" class="btn btn-primary btn-labeled" ><span class="btn-label icon fa fa-plus"></span>New Contact</a>
                </div>
                <!-- Margin -->
                <div class="visible-xs clearfix form-group-margin"></div>
                <!-- Search field
                <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
comingsoon" method="post" class="pull-right col-xs-12 col-sm-6">
                    <div class="input-group no-margin"> <span class="input-group-addon" style="border:none;background: #fff;background: rgba(0,0,0,.05);"><i class="fa fa-search"></i></span>
                        <input type="text" name="search" placeholder="Search..." class="form-control no-padding-hr" style="border:none;background: #fff;background: rgba(0,0,0,.05);">
                    </div>
                </form>
                -->
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-8">

        <?php if (isset($_smarty_tpl->tpl_vars['CONTENT']->value)) {?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['CONTENT']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php } else { ?>
            CRM here
        <?php }?>


    </div>
    <div class="col-sm-4 bordered " >
        <div id="infomsg" style='min-height:80px;text-align:justify;'><h3>Possible Matches</h3>

        </div>

        <div id="managers" style='min-height:80px;text-align:justify;'>

        <?php if ($_smarty_tpl->tpl_vars['managers']->value) {?>
            <h4>Current Related Contacts</h4>
            <span style='font-size:1EM;'><i>*click to edit contact</i></span>
        <?php  $_smarty_tpl->tpl_vars['manage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manage']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['managers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['manage']->key => $_smarty_tpl->tpl_vars['manage']->value) {
$_smarty_tpl->tpl_vars['manage']->_loop = true;
?>
            <p>
            <a title="Edit This Contact" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['cntMiddleName'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['cntLastName'];?>
</a>
              <!--
                <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1'];
}?>
                <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone'];
}?>
                <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail'];
}?>
                -->
                <?php if ($_smarty_tpl->tpl_vars['manage']->value['ccatName']!='') {?><br/><span class="alert-info"><?php echo $_smarty_tpl->tpl_vars['manage']->value['ccatName'];?>
</span><?php }?>

                <!--
                 <br/>
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/unlinkManager/<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
">Un-Link</a>
            -->
            </p>
        <?php } ?>
        <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['properties']->value) {?>
                <h4>Related Properties</h4>
                <i>*click to create proposal</i>
                <?php  $_smarty_tpl->tpl_vars['manage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manage']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['properties']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['manage']->key => $_smarty_tpl->tpl_vars['manage']->value) {
$_smarty_tpl->tpl_vars['manage']->_loop = true;
?>
                    <p>
                        <a title="Start New Proposal" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/startProposal/<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['cntMiddleName'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['cntLastName'];?>
</a>
                        <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1'];
}?>
  <!--                      <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone'];
}?>
                        <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail'];
}?>
      -->
                        <br/>
                        <ul>
                    <li><a title="Start New Proposal" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/startProposal/<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
">Start Proposal</a></li>
                    <li><a title="Edit Property" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
">Edit Property</a></li>
                    </ul>
                    </p>
                <?php } ?>
            <?php }?>

        </div>
    </div>


</div>

<?php }} ?>
