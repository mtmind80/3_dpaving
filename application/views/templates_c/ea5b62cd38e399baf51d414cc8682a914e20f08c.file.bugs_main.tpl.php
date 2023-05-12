<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-26 08:16:53
         compiled from "application/views/templates/bugs/bugs_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:799089732588a04d5868921-70261601%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea5b62cd38e399baf51d414cc8682a914e20f08c' => 
    array (
      0 => 'application/views/templates/bugs/bugs_main.tpl',
      1 => 1465508935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '799089732588a04d5868921-70261601',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_588a04d589e427_00963616',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588a04d589e427_00963616')) {function content_588a04d589e427_00963616($_smarty_tpl) {?>
<div class="page-header">
    <div class="row">
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-asterisk page-header-icon"></i>&nbsp;&nbsp;Bugs</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <div class="visible-xs clearfix form-group-margin"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <?php if (isset($_smarty_tpl->tpl_vars['CONTENT']->value)) {?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['CONTENT']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php } else { ?>
            BUGS
        <?php }?>
    </div>
</div>

<?php }} ?>
