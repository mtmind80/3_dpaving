<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-16 16:00:26
         compiled from "application/views/templates/projects/poClient.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1013382943573c97fc8d83c4-44128766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d80ee405a6fd3ea19651b867dfe2444cdc9c41d' => 
    array (
      0 => 'application/views/templates/projects/poClient.tpl',
      1 => 1479248206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1013382943573c97fc8d83c4-44128766',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573c97fc9af033_89597766',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'pid' => 0,
    'proposal' => 0,
    'states' => 0,
    'salesManagers' => 0,
    's' => 0,
    'salesPeople' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573c97fc9af033_89597766')) {function content_573c97fc9af033_89597766($_smarty_tpl) {?><link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>

<?php echo '<script'; ?>
 type="text/javascript">



    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


        $("#jobPrimaryPhone").mask("(999) 999-9999");
        $("#jobAltPhone").mask("(999) 999-9999");
    });


    var id = 0;

    function CHECKIT(form,sendby)
    {
        if(!test(form)){ return;
        }

        if(sendby ==1)
        {
            showSpinner('Please wait while we format the email.');
            var url = "<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOEMailLetter/" + form.lettertype.value + "/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
";
            if(form.lettertype.value == 4)
            {
                var posting = $.post( url, $( "#fdataform" ).serialize() );
            }
            else
            {
                var posting = $.post( url, $( "#ldataform" ).serialize() );
            }

                posting.done(function( data ) {
                hideSpinner();
                var linktext = "<a target='mail' href='mailto:<?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryEmail'];?>
?subject=" + encodeURIComponent("An Email From 3D Paving") +"&body=" + encodeURIComponent(data) + "'>Send Email</a>";
                if(form.lettertype.value == 4)
                    {
                        $( "#letterlink2" ).html( linktext );
                    }
                    else
                {
                    $( "#letterlink" ).html( linktext );

                }
                    alert('Click the Send Email link');
            });


            return;
        }
        form.submit();
    }

    function test(form)
    {

        return true;

    }


    function CHECKIT2(form)
    {
        if(!test2(form)){ return;
        }

        form.submit();
    }

    function test2(form)
    {

        if(form.jobBillingAddress1.value =='')
        {
            alert("You must enter an address.")
            form.jobBillingAddress1.focus();
            return false;
        }


        if(form.jobBillingCity.value =='')
        {
            alert("You must enter a City.")
            form.jobBillingCity.focus();
            return false;
        }





        if(form.jobName.value =='')
        {
            alert("Name cannot be blank.")
            form.jobName.focus();
            return false;
        }

        if(form.jobPrimaryEmail.value =='')
        {
            alert("Primary Email cannot be blank.")
            form.jobPrimaryEmail.focus();
            return false;
        }



        if(form.jobPrimaryContact.value =='')
        {
            alert("Primary Contact cannot be blank.")
            form.jobPrimaryContact.focus();
            return false;
        }




        if(form.jobBillingZip.value =='')
        {
            alert("You must enter a zip code.")
            form.jobBillingZip.focus();
            return false;
        }

        return true;

    }

    function CHECKIT3(form)
    {
        if(!test3(form)){ return;
        }

        form.submit();
    }

    function test3(form)
    {

        if(form.jobAddress1.value =='')
        {
            alert("You must enter an address.")
            form.jobAddress1.focus();
            return false;
        }


        if(form.jobCity.value =='')
        {
            alert("You must enter a City.")
            form.jobCity.focus();
            return false;
        }


        if(form.jobZip.value =='')
        {
            alert("You must enter a zip code.")
            form.jobZip.focus();
            return false;
        }

        return true;

    }



<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">
          <h2>Locations and Managers</h2>
        <h4>Primary Billing Address, Job Site Location. Assign Managers, Update Materials Pricing.</h4>

        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>

    </div>
    <div class="wizard-wrapper">
        <ul class="wizard-steps" id="menu">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/client/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" style="color: #000000;">Location/Managers &nbsp;</span></a> </span> </li
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
'><span class="wizard-step-description">Preview &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">7</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/clientReminder/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">

   <?php echo $_smarty_tpl->getSubTemplate ('projects/_proposalheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


       <!-- begin row -->
       <div class="row" style="background:#eeffee">
           <h4>Proposal Client</h4>
       </div>


       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5">
               <div class="form-group no-margin-hr">
                   <?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryAddress1'];?>
 &nbsp;
                    <?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryAddress2'];?>
<br />
                    <?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryCity'];?>
, &nbsp;
                    <?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryState'];?>
. &nbsp;
                    <?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryZip'];?>

               </div>
           </div>

           <div class="col-sm-5">
               <div class="form-group no-margin-hr">
                   Email: <?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryEmail'];?>

                   <br />
                   Phone: <?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryPhone'];?>

                    <br />
                   Parcel Number: <?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntParcelNumber'];?>

               </div>
           </div>

       </div>
   <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobStatus']!=3) {?>
       
       <!-- row -->
       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/updatePOAddress/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="adataform" id="adataform" class="panel" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
       <div class="row" style="background:#eeffee">
           <h4>Proposal Name, Primary Contact Information</h4>
       </div>

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-6">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Proposal Name</label>
                       <input type="text" name="jobName" id="jobName" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobName'];?>
" class="form-control" >
                   </div>

               </div>
               <div class="col-sm-1">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">NTO</label>
                       <input type="checkbox" name="jobNTO" id="jobNTO" value="1" class="form-control inline" <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobNTO']) {?> checked <?php }?>/>
                   </div>

               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Permit Required</label>
                       <input type="checkbox" name="jobPermit" id="jobPermit" value="1" class="form-control inline" <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobPermit']) {?> checked <?php }?>/>
                   </div>

               </div>

           </div>

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Primary Contact</label>
                       <input type="text" id="jobPrimaryContact" name="jobPrimaryContact" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobPrimaryContact'];?>
">
                   </div>
               </div>

               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Primary Email (<i>used for notifications</i>)</label>
                       <input type="text" id="jobPrimaryEmail" name="jobPrimaryEmail" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobPrimaryEmail'];?>
">
                   </div>
               </div>

           </div>
           <!-- row -->

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Primary Phone</label>
                       <input type="text" id="jobPrimaryPhone" name="jobPrimaryPhone" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobPrimaryPhone'];?>
">
                   </div>
               </div>

               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Alt Phone</label>
                       <input type="text" id="jobAltPhone" name="jobAltPhone" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobAltPhone'];?>
">
                   </div>
               </div>

           </div>
           <!-- row -->

       <!-- begin row -->
       <div class="row">
          <div class="col-sm-5">
               <div class="form-group no-margin-hr">
                   <label class="control-label inline">Address line 1</label>
                   <input type="text" name="jobBillingAddress1" id="jobBillingAddress1" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingAddress1'];?>
" class="form-control inline"/>
              </div>
          </div>

           <div class="col-sm-5">
              <div class="form-group no-margin-hr">
                  <label class="control-label inline">Address line 2</label>
                  <input type="text" name="jobBillingAddress2" id="jobBillingAddress2" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingAddress2'];?>
" class="form-control inline"/>
              </div>
          </div>
       </div>

           <!-- begin row -->
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group no-margin-hr">
                   <label class="control-label inline">City</label>
                   <input type="text" name="jobBillingCity" id="jobBillingCity" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingCity'];?>
" class="form-control inline"/>
                </div>
            </div>
            <div class="col-sm-3">
                  <div class="form-group no-margin-hr">
                      <label class="control-label inline">State</label>
                      <select id="jobBillingState" name="jobBillingState" class="form-control">
                          <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingState'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!='') {?><option value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingState'];?>
"><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingState'];?>
</option><?php }?>
                          <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

                      </select>
                  </div>
            </div>
             <div class="col-sm-3">
                  <div class="form-group no-margin-hr">
                      <label class="control-label inline">Zip</label>
                      <input type="text" name="jobBillingZip" id="jobBillingZip" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingZip'];?>
" class="form-control inline"/>
                  </div>
             </div>

           </div>

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-4" >
                   <div class="form-group no-margin-hr">
                       Change Proposal Primary Address and Contact Information
                   </div>
               </div>

               <div class="col-sm-3" >
                   <div class="form-group no-margin-hr">
                       <a href="Javascript:CHECKIT2(this.adataform);" class="btn btn-primary btn-labeled"  style='width:200px;'>Change Billing Address</a>
                   </div>
               </div>
               <div class="col-sm-3" >
               </div>

       </div>
</form>


       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/updatePOLocation/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="adataform1" id="adataform1" class="panel" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
           <div class="row" style="background:#eeffee">
               <h4>Primary Job Location</h4>
               <h5><?php echo $_smarty_tpl->tpl_vars['proposal']->value['communityFirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['communityLast'];?>
</h5>
               Manager: <?php echo $_smarty_tpl->tpl_vars['proposal']->value['managerfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['managerlast'];?>
</h5>
           </div>
           <!-- begin row -->
           <div class="row">
               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Address line 1</label>
                       <input type="text" name="jobAddress1" id="jobAddress1" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobAddress1'];?>
" class="form-control inline"/>
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Address line 2</label>
                       <input type="text" name="jobAddress2" id="jobAddress2" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobAddress2'];?>
" class="form-control inline"/>
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Parcel #</label>
                       <input type="text" name="jobParcel" id="jobParcel" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobParcel'];?>
" class="form-control inline"/>
                   </div>
               </div>
           </div>

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">City</label>
                       <input type="text" name="jobCity" id="jobCity" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobCity'];?>
" class="form-control inline"/>
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">State</label>
                       <select id="jobState" name="jobState" class="form-control">
                           <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobState'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2!='') {?><option value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobState'];?>
"><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobState'];?>
</option><?php }?>
                           <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

                       </select>
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label inline">Zip</label>
                       <input type="text" name="jobZip" id="jobZip" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobZip'];?>
" class="form-control inline"/>
                   </div>
               </div>

           </div>

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-4" >
                   <div class="form-group no-margin-hr">
                       Change Primary Location
                   </div>
               </div>

               <div class="col-sm-3" >
                   <div class="form-group no-margin-hr">
                       <a href="Javascript:CHECKIT3(this.adataform1);" class="btn btn-primary btn-labeled"  style='width:200px;'>Change Primary Site</a>
                   </div>
               </div>
               <div class="col-sm-3" >
               </div>

           </div>
       </form>


       <!-- row -->
       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOManager/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="dataform" id="dataform" class="panel" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">

           <!-- begin row -->
           <div class="row" >

               <div class="col-sm-4" >
                   <span class="alert-success">Current Manager:
                   <?php echo $_smarty_tpl->tpl_vars['proposal']->value['managerfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['managerlast'];?>
</span>
               </div>
               <div class="col-sm-4" >
                <span class="alert-success">Current Sales Associate:  <?php echo $_smarty_tpl->tpl_vars['proposal']->value['salesfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['saleslast'];?>
</span>
               </div>

           </div>

           <!-- begin row -->
           <div class="row" >
               <div class="col-sm-4">
                  <label class="control-label">Sales Manager</label>
                   <select name="jobSalesManagerAssigned" id="jobSalesManagerAssigned">
               <option value="0">Select a Sales Manager</option>
                       <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['salesManagers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>
                           <?php if (intval($_smarty_tpl->tpl_vars['s']->value['cntId'])==intval($_smarty_tpl->tpl_vars['proposal']->value['jobSalesManagerAssigned'])) {?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['cntId'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['s']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['s']->value['cntLastName'];?>
</option>
                           <?php } else { ?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['s']->value['cntLastName'];?>
</option>

                           <?php }?>
                           <?php } ?>

           </select>
               </div>


               <div class="col-sm-4">
                   <label class="control-label">Sales Associate</label>
                   <select name="jobSalesAssigned" id="jobSalesAssigned">
                       <option value="0">Select a Sales Associate</option>
                       <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['salesPeople']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>
                           <?php if (intval($_smarty_tpl->tpl_vars['s']->value['cntId'])==intval($_smarty_tpl->tpl_vars['proposal']->value['jobSalesAssigned'])) {?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['cntId'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['s']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['s']->value['cntLastName'];?>
</option>
                           <?php } else { ?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['s']->value['cntLastName'];?>
</option>

                           <?php }?>
                       <?php } ?>

                   </select>
               </div>

               <div class="col-sm-4" >
                   <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled" style='width:200px;'>Assign Sales Team</a>
               </div>

           </div>
       </form>


       <!-- row -->
       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/updatePricing/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="ddataform" id="ddataform" class="panel" method="POST">
           <!-- begin row -->
           <div class="row" >
               <div class="col-sm-8">
                   <label class="control-label"> Update Proposal Materials Pricing to Current Values</label>
               </div>

               <div class="col-sm-4" >
                   <a href="Javascript:this.ddataform.submit();" class="btn btn-primary btn-labeled" style='width:200px;'>Update materials pricing</a>
               </div>

           </div>
       </form>
<?php }?>






   </div>

        </div>




<?php }} ?>
