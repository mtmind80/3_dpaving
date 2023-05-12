<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-17 19:03:44
         compiled from "application/views/templates/reports/rep_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2033858363574ee4c90c6849-80304304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '177cb03639bde4bfcb0d99d58657b9c4cf0a8997' => 
    array (
      0 => 'application/views/templates/reports/rep_main.tpl',
      1 => 1465508952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2033858363574ee4c90c6849-80304304',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_574ee4c90def58_55245513',
  'variables' => 
  array (
    'CONTENT' => 0,
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574ee4c90def58_55245513')) {function content_574ee4c90def58_55245513($_smarty_tpl) {?><style>
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
