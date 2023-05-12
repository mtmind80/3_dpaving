<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-11 14:21:25
         compiled from "application/views/templates/core/corelogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44119712587693c50d3cd1-91742472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbe263ed716dae5aaa51057b25c548d52d9de3ee' => 
    array (
      0 => 'application/views/templates/core/corelogin.tpl',
      1 => 1465508940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44119712587693c50d3cd1-91742472',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'PAGE_TITLE' => 0,
    'msg' => 0,
    'PAGE_THEME' => 0,
    'CONTENT_TEMPLATE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_587693c5121416_77114703',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587693c5121416_77114703')) {function content_587693c5121416_77114703($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/ie.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <!-- custom and overrides stylesheets -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/mystyle.css" rel="stylesheet" type="text/css">


    <title><?php if (isset($_smarty_tpl->tpl_vars['PAGE_TITLE']->value)) {
echo $_smarty_tpl->tpl_vars['PAGE_TITLE']->value;
} else { ?>Title<?php }?></title>

    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
favicon.ico">

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/jquery.min.js"><?php echo '</script'; ?>
>
    <!-- Pixel Admin's javascripts -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/pixel-admin.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">

        var popupmsg = '<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
';

        $(document).ready(function(){
            if(popupmsg != '')
            {
                alert(popupmsg);
            }
        });

    <?php echo '</script'; ?>
>
</head>
<body   class="<?php echo $_smarty_tpl->tpl_vars['PAGE_THEME']->value;?>
">
<?php echo '<script'; ?>
 type="text/javascript">
    var init = [];
<?php echo '</script'; ?>
>


    <?php echo $_smarty_tpl->getSubTemplate ("core/headerlogin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['CONTENT_TEMPLATE']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php echo $_smarty_tpl->getSubTemplate ("core/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>





</body>
</html>
<?php }} ?>
