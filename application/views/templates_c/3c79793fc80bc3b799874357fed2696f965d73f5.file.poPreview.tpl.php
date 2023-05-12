<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-27 10:49:36
         compiled from "application/views/templates/projects/poPreview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12396536665880d75a5142e8-78047459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c79793fc80bc3b799874357fed2696f965d73f5' => 
    array (
      0 => 'application/views/templates/projects/poPreview.tpl',
      1 => 1488214166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12396536665880d75a5142e8-78047459',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5880d75a5825e6_82544352',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'proposal' => 0,
    'proposalDetails' => 0,
    'p' => 0,
    'st' => 0,
    'da' => 0,
    'TandC' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5880d75a5825e6_82544352')) {function content_5880d75a5825e6_82544352($_smarty_tpl) {?>
<?php echo '<script'; ?>
 type="text/javascript">



    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


    });


    var id = 0;

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.stype[form.stype.selectedIndex].value ==0)
        {
            alert('You must select a service type to add.');
            form.stype.focus();
            return false;
        }



        return true;

    }


<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">
          <h2>Preview Proposal </h2>
        <h4>Preview Proposal Details</h4>

        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>

    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/client/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" >Location/Managers &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOservices/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Services &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Notes/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" >Notes &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Media/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" >Upload &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Status/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Status &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/previewPO/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" style="color: #000000;">Preview &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">7</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/clientReminder/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            
            <li>

                <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Media/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
/1" class="btn btn-sm btn-light-green" ><span class="btn-label icon fa fa-print"></span> &nbsp;Print Proposal </a>
<!--
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/ProposalToPDF/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
" class="btn btn-sm btn-light-green" ><span class="btn-label icon fa fa-print"></span> &nbsp;Print Proposal </a>
-->
            </li>
        </ul>
    </div>
   <div class="panel-body">

       <?php echo $_smarty_tpl->getSubTemplate ('projects/_proposalheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



       <!-- display all po -->

       <?php $_smarty_tpl->tpl_vars["st"] = new Smarty_variable("0", null, 0);?>
       <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proposalDetails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>


           <!-- begin row -->
           <div class="row alert">
               <div class=" col-sm-10">
                   <?php echo $_smarty_tpl->tpl_vars['p']->value['jordName'];?>

               </div>
               <div class=" col-sm-2">
               <a href="javascript:ShowTools('Edit Me', <?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
, 'workorders/showProposalText/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
');">Click to Edit</a>
               </div>
           </div>

           <div class="row">
                <div class="col-sm-1">&nbsp;
                </div>
                <div class="col-sm-8">
                    <?php echo $_smarty_tpl->tpl_vars['p']->value['jordProposalText'];?>

                    <br/>

               </div>
          </div>
          <div class="row">
              <div class="col-sm-8">
               &nbsp;
              </div>
              <div class="col-sm-2">
                   $<?php echo number_format($_smarty_tpl->tpl_vars['p']->value['jordCost'],2);?>

               </div>
          </div>


               <?php $_smarty_tpl->tpl_vars['st'] = new Smarty_variable($_smarty_tpl->tpl_vars['st']->value+$_smarty_tpl->tpl_vars['p']->value['jordCost'], null, 0);?>

       <?php } ?>
<hr>
       <br/>
       <!-- begin row -->
       <div class="row panel">
 <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobDiscount']>0&&$_smarty_tpl->tpl_vars['st']->value>0) {?>
 <?php $_smarty_tpl->tpl_vars["da"] = new Smarty_variable(0, null, 0);?>
    <!-- begin row -->
    <div class="row">
        <div class="col-sm-8">
            Total
        </div>
        <div class="col-sm-4">
           $<?php echo number_format($_smarty_tpl->tpl_vars['st']->value,2);?>

        </div>
    </div>
     <hr>
     <br/>

    <div class="row">
        <div class="col-sm-8">
            <?php $_smarty_tpl->tpl_vars['da'] = new Smarty_variable($_smarty_tpl->tpl_vars['st']->value*$_smarty_tpl->tpl_vars['proposal']->value['jobDiscount'], null, 0);?>
            <?php $_smarty_tpl->tpl_vars['da'] = new Smarty_variable($_smarty_tpl->tpl_vars['da']->value/100, null, 0);?>
            <?php $_smarty_tpl->tpl_vars['st'] = new Smarty_variable($_smarty_tpl->tpl_vars['st']->value-$_smarty_tpl->tpl_vars['da']->value, null, 0);?>
           Discount <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobDiscount'];?>
%
        </div>
        <div class="col-sm-4">
            <span style="color:Red;">(-$<?php echo number_format($_smarty_tpl->tpl_vars['da']->value,2);?>
)</span>
        </div>
    </div>

     <hr>
     <br/>
    <div class="row">
        <div class="col-sm-8">
            <br/>Grand Total
        </div>
        <div class="col-sm-4">
            $<?php echo number_format($_smarty_tpl->tpl_vars['st']->value,2);?>

        </div>
    </div>


<?php } else { ?>
       <!-- begin row -->
       <div class="row">
           <div class="col-sm-8">
               Total
           </div>
           <div class="col-sm-4">
               $<?php echo number_format($_smarty_tpl->tpl_vars['st']->value,2);?>

           </div>
       </div>
<?php }?>
           </div>
       <br />
 <!--
       <br />
       <br />SIGNATURE ________________________________________
       <br />
       &nbsp; &nbsp;
       <br />
       &nbsp; &nbsp;
       <br />DATE _________________________
-->
       <p style='page-break-after: always;'>
       &nbsp;
       <p />

<?php echo $_smarty_tpl->tpl_vars['TandC']->value;?>


    </div>

        </div>




<?php }} ?>
