<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-08-14 16:39:25
         compiled from "application/views/templates/crm/crmAdditionalInformation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1052553361592d6d623bd274-24011712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d2b7cd3c480a39f06584eb6fce137c6aec37537' => 
    array (
      0 => 'application/views/templates/crm/crmAdditionalInformation.tpl',
      1 => 1565818762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1052553361592d6d623bd274-24011712',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592d6d627897c3_36380042',
  'variables' => 
  array (
    'data' => 0,
    'SITE_URL' => 0,
    'id' => 0,
    'companies' => 0,
    'd' => 0,
    'mymanagers' => 0,
    'managers' => 0,
    'dcount' => 0,
    'manage' => 0,
    'properties' => 0,
    'mproperties' => 0,
    'related' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592d6d627897c3_36380042')) {function content_592d6d627897c3_36380042($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">


    var id = 0;

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        return true;

    }


<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

            <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>
</h2>
        <?php echo $_smarty_tpl->tpl_vars['data']->value['ccatName'];?>
<br/>

        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>
       
        <?php if ($_smarty_tpl->tpl_vars['data']->value['cntcid']==9&&$_smarty_tpl->tpl_vars['data']->value['cntCompanyId']>0) {?>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/startProposal/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntCompanyId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
"><span class="btn-label icon fa fa-plus"></span> New Proposal</a>
        <?php }?>


    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" >Basic Information &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/additionalInformation/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description" style='color: #000000;'>Connections &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/catandservice/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Categories and Services &nbsp;&nbsp;</span></a> </span> </li
                    >

            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/crmNotes/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Notes</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><span class="wizard-step-description">Profile</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/saveadditionalinformation/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
"  name="dataform" id="dataform" class="panel" method="POST"
         >
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" name="cntId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
">
        <input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntcid'];?>
">

 <?php if ($_smarty_tpl->tpl_vars['data']->value['cntcid']!=1&&$_smarty_tpl->tpl_vars['data']->value['cntcid']!=7&&$_smarty_tpl->tpl_vars['data']->value['cntcid']!=10&&$_smarty_tpl->tpl_vars['data']->value['cntcid']!=14&&$_smarty_tpl->tpl_vars['data']->value['cntcid']!=16&&$_smarty_tpl->tpl_vars['data']->value['cntcid']!=17) {?>
 

        <!-- begin row -->
        <div class="row">

            <div class="col-sm-8">
                <div class="form-group no-margin-hr">
                    <label class="alert-info" style='width:750px;'>Is this contact linked to a National Company, Government Agency or Property Management Company?</label>
                </div>
            </div>

        </div>
        <!-- row -->
        <!-- begin row -->

            <div class="row">
               <div class="col-sm-8">
                         <div class="form-group no-margin-hr">
                             <select name="cntCompanyId" id="cntCompanyId" class="form-control">
                               <?php if ($_smarty_tpl->tpl_vars['data']->value['cntCompanyId']>0) {?>
                                   <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntCompanyId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['CompanyName'];?>
 </option>
                                   <option value='0'>UN-link This Company</option>
                                <?php } else { ?>
                                   <option value='0'>Link A Company</option>
                               <?php }?>
                                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['companies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                                    <option value='<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
'><?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['cntLastName'];?>
 </option>
                                <?php } ?>
                            </select>
                        </div>
                </div>

               <div class="col-sm-4">
                 <div >
                     <button type="button" class="btn-sm "
                                       onClick="Javascript:ShowTools('Quick Add Parent Company', <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, 'crm/quickAdd/8');">Create a New Company</button>
                 </div>
               </div>
             </div>

            <!-- row -->

            <!-- buton row -->
     <div class="row">
         <div class="col-sm-3">
             <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save And Continue</a>
         </div>
         <div class="col-sm-6">
         </div>
     </div>


 <?php } else { ?>

     <!-- Add manager , add property No parent -->
 <?php }?>

 <?php if ($_smarty_tpl->tpl_vars['data']->value['cntCompanyId']>0) {?> 
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <h4>Parent Company</h4>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntCompanyId'];?>
" title="View Company"><?php echo $_smarty_tpl->tpl_vars['data']->value['CompanyName'];?>
</a>
                        <br />
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['companyAddress1'];?>
   <?php echo $_smarty_tpl->tpl_vars['data']->value['companyAddress2'];?>


                        <br />
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['companyPhone'];?>


                        <br />
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['companyEmail'];?>

                        <br />
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/unlinkcompany/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
">Unlink Parent Company</a>

                    </div>
                </div>
            </div>
<?php }?>


   <?php if ($_smarty_tpl->tpl_vars['data']->value['cntcid']==9&&$_smarty_tpl->tpl_vars['data']->value['cntCompanyId']>0) {?>
        


            <div class="row">
                <div class="col-sm-8">
                <label class="alert-info" style='width:750px;'>Please Select a Manager.  Does this property have a manager?</label>
                </div>
            </div>


                <!-- begin row -->
     <div class="row">
        <div class="col-sm-8">
            <div class="form-group no-margin-hr">

                <select name="cntManagerId" id="cntManagerId" class="form-control">
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['cntManagerId']>0) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntManagerId'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerLastName'];?>
</option>
                    <?php }?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cntCompanyId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['CompanyName'];?>
</option>
                    <?php if ($_smarty_tpl->tpl_vars['mymanagers']->value) {?>
                    <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mymanagers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                        <option value='<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
'><?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['cntLastName'];?>
 </option>
                    <?php } ?>
                    <?php }?>
                </select>

            </div>
        </div>
        <div class="col-sm-4">
             <div class="form-group no-margin-hr">
                 <button type="button" class="btn-sm"
                         onClick="Javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/ManagerWizard/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntCompanyId'];?>
';">Create a New Manager</button>
             </div>
         </div>

    </div>
       <!-- buton row -->
       <div class="row">
           <div class="col-sm-3">
               <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save And Continue</a>
           </div>
           <div class="col-sm-6">
           </div>
       </div>

    <!-- row -->


    <?php if ($_smarty_tpl->tpl_vars['data']->value['cntManagerId']>0) {?> 
        <!-- begin row -->
    <div class="row">

                    <div class="col-sm-8">
                        <div class="form-group no-margin-hr">
                            <h4>Current Manager</h4>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/viewContact/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntManagerId'];?>
" title="View Manager"><?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerLastName'];?>
</a>
                            <br />
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerAddress1'];?>
   <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerAddress2'];?>


                            <br />
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerPhone'];?>


                            <br />
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerEmail'];?>

                        </div>
                    </div>

    </div>
                        <!-- row -->
    <?php }?>


 <?php }?>



        </form>

        <!-- end of form -->
        <?php $_smarty_tpl->tpl_vars["dcount"] = new Smarty_variable("0", null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['managers']->value) {?>
            <h4>Related Managers</h4>

         <div class="row">
            <?php  $_smarty_tpl->tpl_vars['manage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manage']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['managers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['manage']->key => $_smarty_tpl->tpl_vars['manage']->value) {
$_smarty_tpl->tpl_vars['manage']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['dcount']->value==3) {?>
                 <?php $_smarty_tpl->tpl_vars['dcount'] = new Smarty_variable(0, null, 0);?>
              </div>

              <div class="row">

            <?php }?>

                <div class="col-sm-4">
                                <a title="Edit This Contact" class="text-bold" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['cntMiddleName'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['cntLastName'];?>
</a>
                             <!--   <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1'];
}?>
                                <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone'];
}?>
                                <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail'];
}?>
                                -->
                                <?php if ($_smarty_tpl->tpl_vars['manage']->value['ccatName']!='') {?><br/><span class="alert-info"><?php echo $_smarty_tpl->tpl_vars['manage']->value['ccatName'];?>
</span><?php }?>
                </div>
                <?php $_smarty_tpl->tpl_vars['dcount'] = new Smarty_variable($_smarty_tpl->tpl_vars['dcount']->value+1, null, 0);?>
            <?php } ?>
            </div>

        <?php }?>
        
       <?php if ($_smarty_tpl->tpl_vars['data']->value['cntcid']==1||$_smarty_tpl->tpl_vars['data']->value['cntcid']==7||$_smarty_tpl->tpl_vars['data']->value['cntcid']==9||$_smarty_tpl->tpl_vars['data']->value['cntcid']==10||$_smarty_tpl->tpl_vars['data']->value['cntcid']==14||$_smarty_tpl->tpl_vars['data']->value['cntcid']==16||$_smarty_tpl->tpl_vars['data']->value['cntcid']==17) {?>
           <!-- begin row -->
           
           <div class="row">
               <div class="col-sm-6">
                   <div class="form-group no-margin-hr">
                       <button type="button" class="btn-sm"
                               onClick="Javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/ManagerWizard/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
';">Create Manager</button>
                   </div>
               </div>
           </div>
       <?php }?>


        <?php $_smarty_tpl->tpl_vars['dcount'] = new Smarty_variable(0, null, 0);?>

        <?php if ($_smarty_tpl->tpl_vars['properties']->value) {?>
            <h4>Related Properties</h4>

            <div class="row">
            <?php  $_smarty_tpl->tpl_vars['manage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manage']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['properties']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['manage']->key => $_smarty_tpl->tpl_vars['manage']->value) {
$_smarty_tpl->tpl_vars['manage']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['dcount']->value==3) {?>
                    <?php $_smarty_tpl->tpl_vars['dcount'] = new Smarty_variable(0, null, 0);?>
                    </div>

                    <div class="row">

                <?php }?>

                <div class="col-sm-4">
                    <a title="Edit This Contact" class="text-bold" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['cntMiddleName'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['cntLastName'];?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1'];
}?>
                    <!--
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone'];
}?>
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail'];
}?>
                    -->
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['ccatName']!='') {?><br/><span class="alert-info"><?php echo $_smarty_tpl->tpl_vars['manage']->value['ccatName'];?>
</span><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['managerfirstname']!='') {?><br/>Manager:<?php echo $_smarty_tpl->tpl_vars['manage']->value['managerfirstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['managerlastname'];
}?>
                    <br/>
                    <ul>
                        <li><a title="Start New Proposal" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/startProposal/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
">Start Proposal</a></li>
                        <li><a title="Edit Property" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
">Edit Property</a></li>
                    </ul>


                </div>
                <?php $_smarty_tpl->tpl_vars['dcount'] = new Smarty_variable($_smarty_tpl->tpl_vars['dcount']->value+1, null, 0);?>
            <?php } ?>
            </div>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['cntcid']==1||$_smarty_tpl->tpl_vars['data']->value['cntcid']==7||$_smarty_tpl->tpl_vars['data']->value['cntcid']==10||$_smarty_tpl->tpl_vars['data']->value['cntcid']==14||$_smarty_tpl->tpl_vars['data']->value['cntcid']==16||$_smarty_tpl->tpl_vars['data']->value['cntcid']==17) {?>
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <button type="button" class="btn-sm"
                                onClick="Javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/PropertyWizard/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
';">Create Property</button>
                    </div>
                </div>
            </div>
        <?php }?>



        <?php $_smarty_tpl->tpl_vars['dcount'] = new Smarty_variable(0, null, 0);?>

        <?php if ($_smarty_tpl->tpl_vars['mproperties']->value) {?>
            <h4>Properties I Manage</h4>

            <div class="row">
            <?php  $_smarty_tpl->tpl_vars['manage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manage']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mproperties']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['manage']->key => $_smarty_tpl->tpl_vars['manage']->value) {
$_smarty_tpl->tpl_vars['manage']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['dcount']->value==3) {?>
                    <?php $_smarty_tpl->tpl_vars['dcount'] = new Smarty_variable(0, null, 0);?>
                    </div>

                    <div class="row">

                <?php }?>

                <div class="col-sm-4">
                    <a title="Edit This Contact"  class="text-bold" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['cntLastName'];?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1'];
}?>
                    <!--
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone'];
}?>
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail'];
}?>
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['companyfirstname']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['companyfirstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['companylastname'];
}?>
                    -->
                    <br/>
                    <ul>
                        <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntCompanyId']>0) {?>
                            <li><a title="Start New Proposal" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/startProposal/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntCompanyId'];?>
/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
">Start Proposal</a></li>
                        <?php } else { ?>
                            <li><a title="Start New Proposal" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/startProposal/<?php echo $_smarty_tpl->tpl_vars['data']->value['cntId'];?>
/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
">Start Proposal</a></li>
                        <?php }?>
                        <li><a title="Edit Property" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
">Edit Property</a></li>
                    </ul>


                </div>
                <?php $_smarty_tpl->tpl_vars['dcount'] = new Smarty_variable($_smarty_tpl->tpl_vars['dcount']->value+1, null, 0);?>
            <?php } ?>
            </div>

        <?php }?>




        <?php $_smarty_tpl->tpl_vars['dcount'] = new Smarty_variable(0, null, 0);?>

        <?php if ($_smarty_tpl->tpl_vars['related']->value) {?>
            <h4>Other Related Contacts</h4>

            <div class="row">
            <?php  $_smarty_tpl->tpl_vars['manage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manage']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['manage']->key => $_smarty_tpl->tpl_vars['manage']->value) {
$_smarty_tpl->tpl_vars['manage']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['dcount']->value==3) {?>
                    <?php $_smarty_tpl->tpl_vars['dcount'] = new Smarty_variable(0, null, 0);?>
                    </div>

                    <div class="row">

                <?php }?>

                <div class="col-sm-4">
                    <a title="Edit This Contact" class="text-bold" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['manage']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['cntLastName'];?>
</a>
                    <!--
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryAddress1'];
}?>
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryPhone'];
}?>
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['cntPrimaryEmail'];
}?>
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['companyfirstname']!='') {?><br/><?php echo $_smarty_tpl->tpl_vars['manage']->value['companyfirstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['manage']->value['companylastname'];
}?>
                    -->
                    <?php if ($_smarty_tpl->tpl_vars['manage']->value['ccatName']!='') {?><br/><span class="alert-info"><?php echo $_smarty_tpl->tpl_vars['manage']->value['ccatName'];?>
</span><?php }?>

                    <br/>
                </div>
                <?php $_smarty_tpl->tpl_vars['dcount'] = new Smarty_variable($_smarty_tpl->tpl_vars['dcount']->value+1, null, 0);?>
            <?php } ?>
            </div>

        <?php }?>


   </div>
    </div>




<?php }} ?>
