<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-13 03:42:53
         compiled from "application/views/templates/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9161549935925caa4ab3a26-21145304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b55ec80b9c10ebff4140740031e7c7745a84aac7' => 
    array (
      0 => 'application/views/templates/error.tpl',
      1 => 1497340913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9161549935925caa4ab3a26-21145304',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925caa4ad8722_25327431',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'errmsg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925caa4ad8722_25327431')) {function content_5925caa4ad8722_25327431($_smarty_tpl) {?>

<div id="logincontainer" style='width:450px;'>

        <a href="#" class="logo">
            <div class="demo-logo bg-primary"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/images/AllPaving-XSmall.png" alt="" style="margin-top: -4px;"></div>&nbsp;

        </a> <!-- / .logo -->


    <h1 class="form-header">There was an error, Don't worry about it. Nothing really bad happened.</h1>
    <h3>Sorry there was an error. Please report this to your supervisor.</h3>

    Error message:
    <pre>
    <?php echo $_smarty_tpl->tpl_vars['errmsg']->value;?>

</pre>

    <br/><br/><br/>
    Try and <a href="Javascript:window.history.back();">Go back</a>
    <br/>OR<br/>
    You can also <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
">login here</a> if your not able to go back.

    </div>

<?php }} ?>
