<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-10 14:32:44
         compiled from "application/views/templates/crm/crm_mainfull.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243801533573c88e2414661-40102930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '409c4ea68e8bdcfb703e4df21ae773cc9cc51255' => 
    array (
      0 => 'application/views/templates/crm/crm_mainfull.tpl',
      1 => 1465508944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243801533573c88e2414661-40102930',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573c88e2431a30_17372726',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573c88e2431a30_17372726')) {function content_573c88e2431a30_17372726($_smarty_tpl) {?>
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
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <?php if (isset($_smarty_tpl->tpl_vars['CONTENT']->value)) {?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['CONTENT']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php } else { ?>
CRM Wizard
        <?php }?>

   </div>
</div>







<?php }} ?>
