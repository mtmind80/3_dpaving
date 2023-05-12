<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-19 11:29:11
         compiled from "application/views/templates/workorders/wo_mainfullEST.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9970102875880f7670cb162-06405350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17db7c605ab78405af3fd2825cf4a2f92cc225a7' => 
    array (
      0 => 'application/views/templates/workorders/wo_mainfullEST.tpl',
      1 => 1465508962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9970102875880f7670cb162-06405350',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'proposal' => 0,
    'SITE_URL' => 0,
    'permits' => 0,
    'permitscomplete' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5880f7671a9c15_40843183',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5880f7671a9c15_40843183')) {function content_5880f7671a9c15_40843183($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>


<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-6 text-center text-left-sm"><i class="fa fa-truck page-header-icon"></i>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobName'];?>
</h1>
        <div class="col-xs-12 col-sm-6">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <!-- "Create project" button, width=auto on desktops -->
                <div class="pull-right col-xs-12 col-sm-auto">
                    <a href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/woSendToBilling/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
','You are about to indicate that this job is closed, and all costs have been entered.\nAre you sure?');" class="btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-money"></span>Send To Billing</a>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
dashboard/" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-dashboard"></span>Go To Dashboard</a>
                </div>
                <!-- Margin -->
                <div class="visible-xs clearfix form-group-margin"></div>
            </div>
        </div>
    </div>
</div>

<!-- begin row -->
<div class="row">
    <div class="col-sm-4">
        <div class="form-group no-margin-hr" style='font-size:1.5EM;'>
            Created for: <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['clientid'];?>
" target='client'><?php echo $_smarty_tpl->tpl_vars['proposal']->value['clientfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['clientlast'];?>
</a>
            <br />
            Created Date:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['proposal']->value['jobCreatedDateTime'],"%A, %B %e, %Y");?>

            <br />
            Created By:<?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntLastName'];?>


        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group no-margin-hr" style='font-size:1.5EM;'>
            <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobAddress1'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobAddress1'];?>

            <br />
            <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobState'];?>
. <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobZip'];?>

        </div>
    </div>
    <?php $_smarty_tpl->tpl_vars["permitsok"] = new Smarty_variable(0, null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars["permitsok"] = clone $_smarty_tpl->tpl_vars["permitsok"]; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars["permitsok"] = clone $_smarty_tpl->tpl_vars["permitsok"];?>

    <div class="col-sm-4">
        <div class="form-group no-margin-hr">
            <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobMOT']) {?>
                <span class='alert-danger'>&nbsp; MOT : YES &nbsp;</span>
            <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobMOTSentBy']!=0) {?>
                Sent:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['proposal']->value['jobMOTSentDatetime'],"%A, %B %e, %Y");?>

            <?php }?>
            <?php } else { ?>
                <span class='alert-info'>&nbsp; MOT : NO &nbsp;</span>
            <?php }?>
            <br />
            <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobNTO']) {?>
                <span class='alert-danger'>&nbsp; NTO : YES &nbsp;</span>
            <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobNTOSentBy']!=0) {?>
                Sent:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['proposal']->value['jobNTOSentDatetime'],"%A, %B %e, %Y");?>

            <?php }?>
            <?php } else { ?>
                <span class='alert-info'>&nbsp; NTO : NO &nbsp;</span>
            <?php }?>
            <br />

            <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobPermit']==1) {?>
                <span class='alert-danger'>&nbsp; Permit Required : YES &nbsp;</span>
            <?php if ($_smarty_tpl->tpl_vars['permits']->value>0) {?>
            
            <?php if ($_smarty_tpl->tpl_vars['permits']->value==$_smarty_tpl->tpl_vars['permitscomplete']->value) {?>
            <?php $_smarty_tpl->tpl_vars['permitsok'] = new Smarty_variable(1, null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['permitsok'] = clone $_smarty_tpl->tpl_vars['permitsok']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['permitsok'] = clone $_smarty_tpl->tpl_vars['permitsok'];?> - COMPLETED
            <?php } else { ?>
                - INCOMPLETE
            <?php }?>
                <br/>Permits;<?php echo $_smarty_tpl->tpl_vars['permits']->value;?>

                <br/>Permits Completed:<?php echo $_smarty_tpl->tpl_vars['permitscomplete']->value;?>

            <?php } else { ?>
                - No Permits found
            <?php }?>
            <?php } else { ?>
                <span class='alert-info'>&nbsp; Permit Required : NO &nbsp;</span>
            <?php $_smarty_tpl->tpl_vars['permitsok'] = new Smarty_variable(1, null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['permitsok'] = clone $_smarty_tpl->tpl_vars['permitsok']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['permitsok'] = clone $_smarty_tpl->tpl_vars['permitsok'];?>
            <?php }?>

            <br />

            <span <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobStatus']==6) {?>class="badge badge-light-green" <?php } elseif ($_smarty_tpl->tpl_vars['proposal']->value['jobStatus']==7) {?> class="badge badge-danger" <?php } else { ?> class="badge badge-info"  <?php }?>><?php echo $_smarty_tpl->tpl_vars['proposal']->value['ordStatus'];?>
</span>
        </div>
    </div>
</div>
<!-- end  row -->
<div class="row">
    <div class="col-sm-12">
        <?php if (isset($_smarty_tpl->tpl_vars['CONTENT']->value)) {?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['CONTENT']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php } else { ?>
           Proposals
        <?php }?>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.PixelAdmin.start(init);
<?php echo '</script'; ?>
>

</body>
</html><?php }} ?>
