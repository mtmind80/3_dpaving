<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-13 08:29:20
         compiled from "application/views/templates/workorders/_workorderheader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11371478745928738eef5760-65395596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76a624f890b23677d3dac06c0f96643864b41d86' => 
    array (
      0 => 'application/views/templates/workorders/_workorderheader.tpl',
      1 => 1497341051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11371478745928738eef5760-65395596',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5928738f0828e0_46415631',
  'variables' => 
  array (
    'lead' => 0,
    'proposal' => 0,
    'SITE_URL' => 0,
    'permits' => 0,
    'permitscomplete' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5928738f0828e0_46415631')) {function content_5928738f0828e0_46415631($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?><div id="Proposalheader">
    <?php if (!isset($_smarty_tpl->tpl_vars['lead']->value)) {
$_smarty_tpl->tpl_vars["lead"] = new Smarty_variable('', null, 0);
}?>
           <h3><?php echo $_smarty_tpl->tpl_vars['lead']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobName'];?>
 </h3>
       </div>
       <!-- begin row -->
       <div class="row">
           <div class="col-sm-4">
               <div class="form-group no-margin-hr" style='font-size:1.2EM;'>
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
               <div class="form-group no-margin-hr" style='font-size:1.2EM;'>
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
<?php }} ?>
