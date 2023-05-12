<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-04 16:15:58
         compiled from "application/views/templates/loginclef.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12799444915984e40ec997b9-52934934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96985dd8bcd49ab415e229986eb34262adef9e51' => 
    array (
      0 => 'application/views/templates/loginclef.tpl',
      1 => 1497340915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12799444915984e40ec997b9-52934934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CLEF_JS' => 0,
    'APP_ID' => 0,
    'SITE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5984e40ed74ac5_80771024',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5984e40ed74ac5_80771024')) {function content_5984e40ed74ac5_80771024($_smarty_tpl) {?><div class="demo-logo bg-primary"><img src="assets/images/AllPaving-XSmall.png" alt="" style="margin-top: -4px;"></div>

    <div class="clef-button-container">
        <?php echo '<script'; ?>
 data-cfasync="false" src="<?php echo $_smarty_tpl->tpl_vars['CLEF_JS']->value;?>
"><?php echo '</script'; ?>
>
        <div class="clef-embed-container">
            <div class="clef-button-to-render" data-app-id='<?php echo $_smarty_tpl->tpl_vars['APP_ID']->value;?>
'
                 data-color="white" data-style="button"
                 data-type="login"

              data-embed="true"     data-state="MKZRaLIyzjpVMpzuhNa1mciy"
               data-redirect-url='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
loginclef/'
              data-custom-logo="assets/images/AllPaving-XSmall.png"    data-custom-message="Your My baby">
            </div>
        </div>
        
        <?php echo '<script'; ?>
 data-cfasync="false" type='text/javascript'>
            if (typeof(ClefButton.initialize) === "function") {
                var buttons = document.querySelectorAll('.clef-button-to-render'),
                        renderedButtons = [];
                for (var i = 0; i < buttons.length; i++) renderedButtons.push(ClefButton.initialize({ el: buttons[i] }));
            } else {
                var scripts = document.getElementsByTagName('script'),
                        currentScript = scripts[scripts.length - 1],
                        el = currentScript.previousElementSibling,
                        button = button = new ClefButton({el: el});
                button.render();
            }
        <?php echo '</script'; ?>
>    </div>
    <noscript>
        <style>
            .clef-login-container { display: none; }
            #login { width: 320px !important; }
            #loginform { height: auto !important; }
        </style>
    </noscript>


   OR <a  href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
">log in with a password</a>




        <div class="info">
            <p><a href="http://getclef.com">Clef</a> lets you securely log in with your phone.</p>
            <p>To change the way the login form displays with Clef, log in and go to the Clef settings page.</p>
        </div>



</div>






<?php }} ?>
