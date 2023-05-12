<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-26 08:21:42
         compiled from "application/views/templates/common/help2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1498639757588a05f68555c3-06466834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a827f192d3e93b46958f31ccc9ce8c0dd457a3a' => 
    array (
      0 => 'application/views/templates/common/help2.tpl',
      1 => 1465508938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1498639757588a05f68555c3-06466834',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HELP_TITLE' => 0,
    'HELP_DESC' => 0,
    'HELP_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_588a05f6898c82_33525499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588a05f6898c82_33525499')) {function content_588a05f6898c82_33525499($_smarty_tpl) {?><!--help -->

    <div class="stat-cell" style='vertical-align: top;'>
        <div class="eventswrapper"  style="min-height:230px;vertical-align: top;">
            <div class="notification-icon fa fa-question" style='width:230px;
                        height:34px;
                        background: #f2f5f7;
                        font-size:2.2EM;
                        color:#0070a3;
                        text-align: center;'>&nbsp; Help</div>

            <div class="notifications-list">

                <!-- Help Title -->
                <span style="font-size:1.2EM;"><?php echo $_smarty_tpl->tpl_vars['HELP_TITLE']->value;?>
</span>
                <div class="help-block">
                    <!-- Help Text -->
                    <div class="ui-helper-clearfix" ><?php echo $_smarty_tpl->tpl_vars['HELP_DESC']->value;?>

                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['HELP_URL']->value!='') {?>

                <div class="notification">
                         <div class="notification-icon fa fa-asterisk"></div>&nbsp;for more information <a href="<?php echo $_smarty_tpl->tpl_vars['HELP_URL']->value;?>
" target='help'>Click Here</a>

                </div>
                <?php }?>

                <span class="btn center-block text-center"><a href='Javascript:self.close();'><div class="notification-icon fa fa-minus-circle"></div>&nbsp;Close Window</a></span>

            </div>
        </div>
        <!--help end-->

    </div>

<?php }} ?>
