<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-06-10 13:15:08
         compiled from "application/views/templates/core/corelogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11793605260107da851a0a1-82523133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a49f566824b3a30e22709726eaeefe9398f00ca' => 
    array (
      0 => 'application/views/templates/core/corelogin.tpl',
      1 => 1623330873,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11793605260107da851a0a1-82523133',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_60107da85dae54_00294462',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'PAGE_TITLE' => 0,
    'msg' => 0,
    'PAGE_THEME' => 0,
    'CONTENT_TEMPLATE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60107da85dae54_00294462')) {function content_60107da85dae54_00294462($_smarty_tpl) {?><!DOCTYPE HTML>
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
