<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-11 14:21:25
         compiled from "application/views/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:315150802587693c5126a55-42958272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0eacf867cd06aacb1038ab649fe31d9392959304' => 
    array (
      0 => 'application/views/templates/login.tpl',
      1 => 1476402309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '315150802587693c5126a55-42958272',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_587693c512f124_45705889',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587693c512f124_45705889')) {function content_587693c512f124_45705889($_smarty_tpl) {?><?php echo '<script'; ?>
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
