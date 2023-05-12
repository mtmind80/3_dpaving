<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-14 05:07:38
         compiled from "application/views/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:507087453573bca89ec17e1-88473521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c39b1e39d67638af4afc76ea7d5a18c4e9ebed25' => 
    array (
      0 => 'application/views/templates/login.tpl',
      1 => 1476402309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '507087453573bca89ec17e1-88473521',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573bca89ed7bf1_77444764',
  'variables' => 
  array (
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573bca89ed7bf1_77444764')) {function content_573bca89ed7bf1_77444764($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">

        $('#login_form').validate({
            rules: {
                usrpass: {
                    required: true,
                    minlength: 6
                },
                email: {
                    required: true,
                    minlength: 6,
                    email: true
                }
            }

    });

<?php echo '</script'; ?>
>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6" style="text-align: center;">
        <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/images/logo.png" alt="logo" style="    width: 400px;
    margin-bottom: -60px;" >
        <br />



            <!-- Form -->
            <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
login" id="login_form" name="login_form" class="panel" method="POST">


                <div class="row">

                    <div class="col-lg-12">

                    <div class="form-group" >
                  <label for='email'></label>  <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email">
                </div> <!-- / Username -->

                <div class="form-group signin-password">
                    <label for='usrpass'></label>  <input type="password" name="usrpass" id="usrpass" class="form-control input-lg" placeholder="Password">
                </div> <!-- / Password -->

                <div class="form-actions">
                    <input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg">
                </div> <!-- / .form-actions -->
            </form>
            <!-- / Form
            <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
clef'>Login With CLEF</a>
         -->
    </div>
    <div class="col-md-3">
    </div>
</div>

</div>
</div>

<?php echo '<script'; ?>
>
$("#email").focus();
<?php echo '</script'; ?>
>

<?php echo '</script'; ?>
>
<?php }} ?>
