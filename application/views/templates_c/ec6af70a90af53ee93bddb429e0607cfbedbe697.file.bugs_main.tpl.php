<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-16 17:16:23
         compiled from "application/views/templates/bugs/bugs_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1004857562587d5447e7ee30-93997428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec6af70a90af53ee93bddb429e0607cfbedbe697' => 
    array (
      0 => 'application/views/templates/bugs/bugs_main.tpl',
      1 => 1465508935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1004857562587d5447e7ee30-93997428',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_587d5447eb4e09_65680329',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587d5447eb4e09_65680329')) {function content_587d5447eb4e09_65680329($_smarty_tpl) {?>
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
