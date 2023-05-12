<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-14 16:58:54
         compiled from "application/views/templates/calendar/cal_main2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1174545067573efea8162544-81459343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed84d8bbbf511f037f9f43f0cad0bec2c217998e' => 
    array (
      0 => 'application/views/templates/calendar/cal_main2.tpl',
      1 => 1465508937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1174545067573efea8162544-81459343',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573efea817b294_30209392',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573efea817b294_30209392')) {function content_573efea817b294_30209392($_smarty_tpl) {?>
<link href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />

<?php echo '<script'; ?>
 src='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/fullcalendar/lib/moment.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/fullcalendar/lib/jquery-ui.custom.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/fullcalendar/fullcalendar.min.js'><?php echo '</script'; ?>
>

<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-calendar page-header-icon"></i>&nbsp;&nbsp;Calendar</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <!-- "Create project" button, width=auto on desktops
                <div class="pull-right col-xs-12 col-sm-auto"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/create/" class="btn btn-primary btn-labeled">
                        <span class="btn-label icon fa fa-plus"></span>New Proposal</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/select" class="btn btn-primary btn-labeled" ><span class="btn-label icon fa fa-plus"></span>New Contact</a></div>
-->

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

        <?php } else { ?>
            Calendar here
        <?php }?>


    </div>




</div>

<?php }} ?>
