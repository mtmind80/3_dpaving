<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-01-26 23:22:38
         compiled from "application/views/templates/projects/_proposalheader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20457214706010a43e5453e8-63080986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6fb2ea7a074d6343d54804dd212ca93ac284183' => 
    array (
      0 => 'application/views/templates/projects/_proposalheader.tpl',
      1 => 1497340985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20457214706010a43e5453e8-63080986',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'proposal' => 0,
    'SITE_URL' => 0,
    'old' => 0,
    'age' => 0,
    'lastContact' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_6010a43e5654f2_61348511',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6010a43e5654f2_61348511')) {function content_6010a43e5654f2_61348511($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>
    <!-- begin row -->
    <div class="row">
    <div class="col-sm-6" style='font-size:1.4EM;'>
           <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobName'];?>

    </div>
    <div class="col-sm-6">
        <span class='alert-info' style='font-size:1EM;float:right;'>Status: <?php echo $_smarty_tpl->tpl_vars['proposal']->value['ordStatus'];?>
      </span>
    </div>

    </div>
       <!-- begin row -->
       <div class="row">
           <div class="col-sm-6">
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

           <div class="col-sm-6">
               <div class="form-group no-margin-hr" style='font-size:1.2EM;'>
        Age:<?php echo $_smarty_tpl->tpl_vars['old']->value;
echo $_smarty_tpl->tpl_vars['age']->value;?>
 days old
    <br />
                   Last Contacted Date:<?php if (isset($_smarty_tpl->tpl_vars['lastContact']->value['cnotCreatedDate'])) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['lastContact']->value['cnotCreatedDate'],"%A, %B %e, %Y");
}?>
                   <br />
                   Last Contacted By:<?php if (isset($_smarty_tpl->tpl_vars['lastContact']->value['Creator'])) {
echo $_smarty_tpl->tpl_vars['lastContact']->value['Creator'];
}?>
                   <br />
                   Discount:<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobDiscount'];?>
 %
               </div>
           </div>
<!--

           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobNTO']) {?>
                       <span class='alert-danger'>&nbsp; NTO : YES &nbsp;</span>
                   <?php } else { ?>
                       <span class='alert-info'>&nbsp; NTO : NO &nbsp;</span>
                   <?php }?>
                   <br />

                   <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobPermit']) {?>
                       <span class='alert-danger'>&nbsp; Permit Required : YES &nbsp;</span>
                   <?php } else { ?>
                       <span class='alert-info'>&nbsp; Permit Required : NO &nbsp;</span>
                   <?php }?>
                   <br />

                   <span class='alert-info'>Status: <?php echo $_smarty_tpl->tpl_vars['proposal']->value['ordStatus'];?>
      </span>
               </div>
           </div>
    -->
       </div>
       <!-- end  row -->
<?php }} ?>
