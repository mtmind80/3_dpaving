<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-07-02 09:52:19
         compiled from "application/views/templates/messages/message_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19212738345931ad3387dd11-93181124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12c91b8df034c2bdfe127077c921b4183b3a12cd' => 
    array (
      0 => 'application/views/templates/messages/message_main.tpl',
      1 => 1497340982,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19212738345931ad3387dd11-93181124',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5931ad3395e4c1_28703077',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5931ad3395e4c1_28703077')) {function content_5931ad3395e4c1_28703077($_smarty_tpl) {?>
<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-list page-header-icon"></i>&nbsp;&nbsp;Messages</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <!-- "Create project" button, width=auto on desktops -->
                <div class="pull-right col-xs-12 col-sm-auto">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/create/" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-plus"></span>New Proposal</a>
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
    <div class="col-sm-9">

        <?php if (isset($_smarty_tpl->tpl_vars['CONTENT']->value)) {?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['CONTENT']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php } else { ?>
       Messages
        <?php }?>


    </div>
    <div class="stat-cell col-sm-3 padding-sm-hr bordered no-border-r valign-top">
        <?php echo $_smarty_tpl->getSubTemplate ("common/tasks.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("common/reminders.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>


</div>

<?php }} ?>
