<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-19 16:15:15
         compiled from "application/views/templates/core/coreslim.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206103810958f7d3635b77b6-82989881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4865c13099f4b57baf0e673ab5040c3ebd085127' => 
    array (
      0 => 'application/views/templates/core/coreslim.tpl',
      1 => 1465508940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206103810958f7d3635b77b6-82989881',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'PAGE_TITLE' => 0,
    'CONTENT_TEMPLATE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58f7d3635ff954_89516041',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f7d3635ff954_89516041')) {function content_58f7d3635ff954_89516041($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Pixel Admin's stylesheets -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <!-- custom and overrides stylesheets -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/mystyle.css" rel="stylesheet" type="text/css">

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/jquery.min.js"><?php echo '</script'; ?>
>
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/ie.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <!-- Pixel Admin's javascripts TEMPLATE SPECIFIC-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/pixel-admin.min.js"><?php echo '</script'; ?>
>



    <title><?php if (isset($_smarty_tpl->tpl_vars['PAGE_TITLE']->value)) {
echo $_smarty_tpl->tpl_vars['PAGE_TITLE']->value;
} else { ?>Title<?php }?></title>

</head>
<body >
<div id="main-wrapper">
   <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['CONTENT_TEMPLATE']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
</body>
</html>
<?php }} ?>
