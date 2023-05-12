<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-01-26 23:40:13
         compiled from "application/views/templates/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20249702706010a85d60b413-84368461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed5f00219e5f1de948378fd038de3465bdf05f78' => 
    array (
      0 => 'application/views/templates/error.tpl',
      1 => 1497340913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20249702706010a85d60b413-84368461',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'errmsg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_6010a85d689b27_46166579',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6010a85d689b27_46166579')) {function content_6010a85d689b27_46166579($_smarty_tpl) {?>

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
