<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-18 18:53:21
         compiled from "application/views/templates/reports/rep_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188907330458800e017dab89-18739133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cac6848fc357c99fbd4476ac2b6e8950fc24c95' => 
    array (
      0 => 'application/views/templates/reports/rep_main.tpl',
      1 => 1465508952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188907330458800e017dab89-18739133',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CONTENT' => 0,
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58800e0181a794_28986682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58800e0181a794_28986682')) {function content_58800e0181a794_28986682($_smarty_tpl) {?><style>
    .report {
        font-size:1EM;color:#000;padding-left:15px;
    }
</style>
<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-bar-chart-o page-header-icon"></i>&nbsp;&nbsp;Reports</h1>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <?php if (isset($_smarty_tpl->tpl_vars['CONTENT']->value)) {?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['CONTENT']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php } else { ?>

            <h3>Reports</h3>

            <div class='report'><span class="fa fa-user "></span>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/SearchCRM/">CRM</a></div>
            <br />
            <div class='report'><span class="fa fa-dollar"></span>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/proposal/">Proposals</a></div>
            <br />
            <div class='report'><span class="fa fa-truck "></span>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/proposal/">Work Orders</a></div>
            <br />
            <div class='report'><span class="fa fa-gear "></span>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/proposal/">Labor</a></div>
            <br />
        <?php }?>
    </div>
</div>

<?php }} ?>
