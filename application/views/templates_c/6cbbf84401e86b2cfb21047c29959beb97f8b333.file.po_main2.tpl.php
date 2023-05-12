<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-13 10:05:44
         compiled from "application/views/templates/projects/po_main2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117695302459286a0b50a7f6-13337244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cbbf84401e86b2cfb21047c29959beb97f8b333' => 
    array (
      0 => 'application/views/templates/projects/po_main2.tpl',
      1 => 1497340987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117695302459286a0b50a7f6-13337244',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59286a0b58bcd5_22378749',
  'variables' => 
  array (
    'USER_ROLE' => 0,
    'SITE_URL' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59286a0b58bcd5_22378749')) {function content_59286a0b58bcd5_22378749($_smarty_tpl) {?>
<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-usd page-header-icon"></i>&nbsp;&nbsp;Proposals</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <!-- "Create project" button, width=auto on desktops -->
                <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==2||$_smarty_tpl->tpl_vars['USER_ROLE']->value==3||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>
                <div class="pull-right col-xs-12 col-sm-auto">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/create/" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-plus"></span>New Proposal</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/select/" class="btn btn-primary btn-labeled" ><span class="btn-label icon fa fa-plus"></span>New Contact</a>
                </div>
                <?php }?>
                <!-- Margin -->
                <div class="visible-xs clearfix form-group-margin"></div>
                <!-- Search field -->
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
    <div class="col-sm-9">
        <?php if (isset($_smarty_tpl->tpl_vars['CONTENT']->value)) {?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['CONTENT']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php } else { ?>
           Proposals
        <?php }?>


    </div>
    <div class="stat-cell col-sm-4 padding-sm-hr bordered no-border-r valign-top">

        <?php echo $_smarty_tpl->getSubTemplate ("common/projectnotes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("common/projectmedia.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("common/contactnotes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    </div>


</div>

<?php }} ?>
