<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-15 22:17:04
         compiled from "application/views/templates/workorders/wo_main3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:645022953582b89607b6c78-76918084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3d20c8ce168763f6d0583230eafcd5ebd9d2985' => 
    array (
      0 => 'application/views/templates/workorders/wo_main3.tpl',
      1 => 1479246119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '645022953582b89607b6c78-76918084',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582b89607ca8a2_08458883',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582b89607ca8a2_08458883')) {function content_582b89607ca8a2_08458883($_smarty_tpl) {?>

<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-truck page-header-icon"></i>&nbsp;&nbsp;Work Orders</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <!-- "Create project" button, width=auto on desktops -->
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
    <div class="col-sm-12">
        <?php if (isset($_smarty_tpl->tpl_vars['CONTENT']->value)) {?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['CONTENT']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>

   </div>
</div>






<?php }} ?>