<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-10 16:42:07
         compiled from "application/views/templates/projects/poChangeStripingVendor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1812280791573c95ab4aea82-30898944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2db53bef4b9912c6d6b60c2c7059392afa2d48dd' => 
    array (
      0 => 'application/views/templates/projects/poChangeStripingVendor.tpl',
      1 => 1465508948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1812280791573c95ab4aea82-30898944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573c95ab4dd314_47102754',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'proposal' => 0,
    'pid' => 0,
    'sid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573c95ab4dd314_47102754')) {function content_573c95ab4dd314_47102754($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {
        var sid = form.sid.value;
        var pid = form.pid.value;
        var vendorid = form.vendorid[form.vendorid.selectedIndex].value;
        var dURL = '<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/changeStripingVendor/' + pid + '/' + sid + '/' + vendorid;

        if(form.vendorid[form.vendorid.selectedIndex].value ==0)
        {
            alert('You must select a vendor.');
            form.vendorid.focus();
            return false;
        }

        $('#dataform').attr('action', dURL);

        return true;

    }

<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">
          <h2><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobName'];?>
</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/client/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" >Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOservices/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" style="color: #000000;">Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Notes/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Media/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Media &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Status/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/previewPO/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Preview &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">


       <?php echo $_smarty_tpl->getSubTemplate ('projects/_proposalheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>




       <!-- row -->
       <form action=""  name="dataform" id="dataform" class="panel" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
           <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">

           <!-- begin row -->
           <div class="row panel" style="border:1px solid #000000;background:#e3e3e3">

               <div class="col-sm-6" style='vertical-align:middle;'>
                   <select name="vendorid" id="vendorid" style='font-size:1.4EM;'>
               <option value="0">Select a Vendor</option>
                       <option value="PFS">PFS</option>
                       <option value="Native_Lines">Native Lines</option>
                       <option value="Scott_Munroe">Scott Munroe</option>
                       <option value="All_Striping">All Striping</option>
           </select>
               </div>

               <div class="col-sm-4" style='vertical-align:middle;float:right;'>
                   <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add New Service To Proposal</a>
               </div>

           </div>


   </div>

</div>




<?php }} ?>
