<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-16 20:10:45
         compiled from "application/views/templates/workorders/woServiceView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1237054324573b84ebd6d277-66905255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e51d77ff19e341e4972968aeda7f40c054d6d91' => 
    array (
      0 => 'application/views/templates/workorders/woServiceView.tpl',
      1 => 1471378158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1237054324573b84ebd6d277-66905255',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573b84ebe49757_52532729',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'pid' => 0,
    'sid' => 0,
    'proposal' => 0,
    'details' => 0,
    'USER_EMAIL' => 0,
    'vehicles' => 0,
    'data' => 0,
    'equipment' => 0,
    'labor' => 0,
    'other' => 0,
    'subs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573b84ebe49757_52532729')) {function content_573b84ebe49757_52532729($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
?><?php echo '<script'; ?>
>
    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }


        form.submit();

       // window.parent.opener.location.reload();
       //self.close();
       // window.location.href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOServiceDetailView/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
";

    }

    function test(form)
    {
        //alert(form.emailaddress.value);
        if(form.sendto.value =='')
        {
            alert('You must fill in an email address.');
            return false;
        }

        return true;

    }




<?php echo '</script'; ?>
>
<table width="710">
    <td>

<center><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/images/Header.jpg" border="0" width='700' alt="3D Paving" /></center>

<h2>Work Order#  <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['proposal']->value['jobMasterNumber']);?>
 </h2>

<table width='98%'>
    <tr>
        <td>
            <center><h2><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobName'];?>
</h2></center>
            <br/>
            <h3>Estimator:<?php echo $_smarty_tpl->tpl_vars['proposal']->value['salesfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['saleslast'];?>

                &nbsp;
                &nbsp;
                <?php echo $_smarty_tpl->tpl_vars['proposal']->value['salesphone'];?>
</h3>
        </td>
    </tr>
</table>
<br/>
       <h3> <?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>


       </h3>



        <form id='fdataform' name='fdataform' action='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOServiceDetailMail/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
' method="POST">

    <input type='hidden' name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
    <input type='hidden' name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
    <input type='hidden' name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['USER_EMAIL']->value;?>
">


    <div class='row hidden-print'>
    <div class='row'>
        <div class="col-xs-3">
            <a  href="Javascript:print();" class="btn btn-light-green btn-labeled "><span class="btn-label icon fa fa-print"></span> Print </a>
        </div>
            <div class="col-xs-6">
                <input type="text" name="sendto" id="sendto" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['USER_EMAIL']->value;?>
">

            </div>
        <div class="col-xs-3">
            <a  href="Javascript:CHECKIT(this.fdataform);" class="btn btn-light-green btn-labeled "><span class="btn-label icon fa fa-envelope"></span> Email </a>
        </div>

    </div>
    <div class='row'>
        <div class="col-xs-12" id="letterlink">
        </div>
    </div>
</div>

</form>
<!-- begin row -->







   <div class="row panel"  style='border:1px #000000 solid;'>


       <div class="row">

           <div class="col-xs-8">
           <b>Job Manager: </b><?php echo $_smarty_tpl->tpl_vars['details']->value['manager1firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['manager1lastname'];?>

           &nbsp;
           &nbsp;
           <?php echo $_smarty_tpl->tpl_vars['details']->value['manager1phone'];?>

           </div>
       </div>

       <br/>
       <div class="row">

           <div class="col-xs-4">
               <div class="form-group no-margin-hr">

                   Location:
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress1'];?>

                   &nbsp;
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress2'];?>

                   <br />
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordCity'];?>
,
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
.
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordZip'];?>


                   <br />
                   Start Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordStartDate'],"%A, %B %e, %Y");?>


                   <br />
                   End Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordEndDate'],"%A, %B %e, %Y");?>


               </div>
           </div>
           <div class="col-xs-4">
               <strong>SERVICE: </strong>
               <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpProposalTextAlt'];?>

               <br/><br/>
                <?php if ($_smarty_tpl->tpl_vars['details']->value['jordCustomNote']!='') {?>
                      <strong>NOTE: </strong>
                      <?php echo $_smarty_tpl->tpl_vars['details']->value['jordCustomNote'];?>

                 <br/>

                <?php }?>

           </div>
       </div>
       <!-- row -->
   </div>


   <!-- begin row -->

       <div class="row panel"  style='border:1px #000000 solid;'>

       <br />

       
       <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Asphalt') {?>



           <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceID']==19) {?>
               <div class="row">
                   <div class="col-xs-3">
                       <label class="control-label">Size of project in SQ FT</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">Depth In Inches</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>

                       </div>
                   <div class="col-xs-3">
                       <label class="control-label">Days of Milling</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDays'];?>

                   </div>

               </div>
               <br />
               <div class="row">

                   <div class="col-xs-3">
                       <label class="control-label">Locations</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>

                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">SQ. Yards</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSQYards'];?>

                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">Loads</label>
                        <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLoads'];?>

                   </div>
               </div>




           <?php } else { ?> 


               <br/>
               <div class="row">

                   <div class="col-xs-3">
                       <label class="control-label">Size of project in SQ FT</label>
                        <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">Depth In Inches</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>


                   </div>
                </div>
                <div class="row">

                   <div class="col-xs-3">
                       <label class="control-label">Locations</label>
                      <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>

                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">SQ. Yards</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSQYards'];?>

                   </div>

               </div>


           <?php }?>



       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Concrete') {?>


           <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceID']<12) {?> 
               <br/>

               <div class="row">
                   <div class="col-xs-5">
                       <label class="control-label">Length In Feet (linear feet)</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLinearFeet'];?>

                   </div>
                   <div class="col-xs-2">
                       <label class="control-label">Locations</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>

                   </div>
                   <div class="col-xs-2">
                       <label class="control-label">CU YDS</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordCubicYards'];?>
 </div>
               </div>



           <?php } else { ?> 
               <br/>
               <div class="row">
                   <div class="col-xs-3">
                       <label class="control-label">Sq. Ft.</label>
                     <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">Depth (inches)</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>

                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">Locations</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>

                   </div>
               </div>
           <?php }?>

       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Excavation') {?>


           <div class="row">
               <div class="col-xs-2">
                   <label class="control-label">Sq. Ft.</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

               </div>
               <div class="col-xs-3">
                   <label class="control-label">Depth In inches</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>


               </div>
               <div class="col-xs-2">
                   <label class="control-label">Tons</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordTons'];?>

               </div>
               <div class="col-xs-2">
                   <label class="control-label">Loads</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLoads'];?>

               </div>

           </div>

           <br/>

       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Striping') {?>


           <div class="row">
               <div class="col-xs-8">
                  <?php echo $_smarty_tpl->tpl_vars['details']->value['jordProposalText'];?>

               </div>

           </div>

           <br/>


       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Other') {?>


           <div class="row">

               <div class="col-xs-8">
                   <label class="control-label">Description</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>

               </div>

           </div>



       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Rock') {?>



           <div class="row">
               <div class="col-xs-2">
                   <label class="control-label">SQ . Ft.</label>
                <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

               </div>
               <div class="col-xs-3">
                   <label class="control-label">Depth In inches</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>

               </div>
               <div class="col-xs-2">
                   <label class="control-label">Tons</label>
                    <?php echo $_smarty_tpl->tpl_vars['details']->value['jordTons'];?>

               </div>
               <div class="col-xs-2">
                   <label class="control-label">Loads</label>
                 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLoads'];?>

               </div>

           </div>
           <br/>

       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Seal Coating') {?>


           <!-- row -->
           <div class="row">
               <div class="col-xs-3">
                   <label class="control-label">Yield</label>
                <?php echo $_smarty_tpl->tpl_vars['details']->value['jordYield'];?>

               </div>

               <div class="col-xs-3">
                   <label class="control-label">SQ. FT.</label>
                 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>


               </div>

           </div>
           <br/>

           <div class="row" >
               <div class="col-xs-3">
                   <label class="control-label"> Oil Spot Primer (gals)</label>
                <?php echo $_smarty_tpl->tpl_vars['details']->value['jordPrimer'];?>

               </div>
               <div class="col-xs-3">
                   <label class="control-label">Fast Set (gals)</label>

                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordFastSet'];?>

               </div>
               <div class="col-xs-3">
                   <label class="control-label">Phases</label>

                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordPhases'];?>

               </div>





           </div>
           <br/>
           <div class="row" >
               <div class="col-xs-3">
                   <label class="control-label">Materials Needed</label>
               </div>
               <div class="col-xs-2">
                   <label class="control-label">Sealer</label>
                 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSealer'];?>

               </div>
               <div class="col-xs-2">
                   <label class="control-label">Sand</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSand'];?>

               </div>
               <div class="col-xs-2">
                   <label class="control-label">Additive</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAdditive'];?>

               </div>

           </div>
           <br/>



      <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Striping') {?>



      <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>


       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Sub Contractor') {?>

           <div class="row" >
               <div class="col-xs-3">
                   <label class="control-label">Sub Contractor</label>
                   <h4><?php echo $_smarty_tpl->tpl_vars['details']->value['subfirstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['sublastname'];?>
</h4>
               </div>
               <div class="col-xs-6">
                   <label class="control-label">Description</label>
                    <?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>

               </div>

           </div>

       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Paver Brick') {?>

           <br />
           <div class="row" >
               <div class="col-xs-2">
                   <label class="control-label">SQ. Ft.</label>
                <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

               </div>
               <div class="col-xs-2">
                   <label class="control-label">Excavate Tons</label>
                    <?php echo $_smarty_tpl->tpl_vars['details']->value['jordTons'];?>

               </div>

               <div class="col-xs-5">
                   <label class="control-label">Job Description</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>

               </div>
           </div>

       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Drainage and Catchbasins') {?>

           <br />
           <div class="row" >
               <div class="col-xs-3">
                   <label class="control-label">Number of Catch Basins</label>
                <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAdditive'];?>

               </div>
               <div class="col-xs-6">
                   <label class="control-label">Job Description</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>

               </div>
           </div>
       <?php } else { ?>
           xxxxxxxxxxxxxxxxxxxxxxxxxxxxx    ALERT:UNKNOWN SERVICE    xxxxxxxxxxxxxxxxxxxxxxxxxxxxx

       <?php }?>




       <!-- row -->



       <br />

     <?php if ($_smarty_tpl->tpl_vars['vehicles']->value) {?>
         <!-- begin vehicles -->
                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-xs-3">

                               Vehicles
                           </div>
                           <div class="col-xs-2">
                               Quantity
                           </div>
                       </div>


                   <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vehicles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-xs-3">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POVvehicleName'];?>

                           </div>

                           <div class="col-xs-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POVNumber'];?>

                           </div>

                       </div>
                  <?php } ?>
     <?php }?>

               <!-- begin row -->

     <?php if ($_smarty_tpl->tpl_vars['equipment']->value) {?>
            <br />
                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-xs-3">

                               Equipment
                           </div>
                           <div class="col-xs-2">
                               Quantity
                           </div>
                       </div>

                   <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['equipment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-xs-3">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipName'];?>

                           </div>

                           <div class="col-xs-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipNumber'];?>

                           </div>


                       </div>

                   <?php } ?>

       <?php }?>




   <?php if ($_smarty_tpl->tpl_vars['labor']->value) {?>

       <!-- labor sections -->
       <br />

                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-xs-3">

                               Labor
                           </div>
                           <div class="col-xs-2">
                               Quantity
                           </div>
                       </div>

                   <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['labor']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-xs-3">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborName'];?>

                           </div>

                           <div class="col-xs-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborNumber'];?>

                           </div>


                       </div>

                   <?php } ?>
      <?php }?>


      <?php if ($_smarty_tpl->tpl_vars['other']->value) {?>
          <!-- other cost sections -->
            <br/>
               <!-- begin row -->
                           <div class="row" >
                               <div class="col-xs-3">

                                   Other Service
                               </div>
                               <div class="col-xs-6">
                                   Description
                               </div>
                           </div>

                       <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['other']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                           <!-- begin row -->
                           <div class="row" >
                               <div class="col-xs-3">
                                   <?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostTitle'];?>

                               </div>

                               <div class="col-xs-6">
                                   <?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostDescription'];?>

                               </div>
                           </div>

                       <?php } ?>
      <?php }?>



      <?php if ($_smarty_tpl->tpl_vars['subs']->value) {?>
          <!-- sub contractor sections -->
         <br />

                   <!-- begin row -->
                       <div class="row" >
                           <div class="col-xs-4">
                               Sub Contractor
                           </div>
                           <div class="col-xs-5 left">
                               Description
                           </div>

                       </div>

                   <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-xs-4">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>

                           </div>

                           <div class="col-xs-5">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['posubDescription'];?>

                           </div>

                       </div>

                 <?php } ?>
      <?php }?>

       <br/>


       <br/>


       <!-- begin row -->
       <div class="row" >
           <div class="col-xs-4">

       <b>Special instructions: </b>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpProposalTextAlt'];?>

           </div>

           <div class="col-xs-5">
                   <b>Instrucciones especiales:</b>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpProposalTextAltES'];?>

           </div>

       </div>


<br/>

       <!-- begin row -->
       <div class="row" >
           <div class="col-xs-8">

                   <b>Checklist: </b>
                   Responsibilities in the Morning
                   <br/>Make sure all items are checked off on the Truck before leaving
                   <ul>
                       <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Asphalt') {?>

                       <li>Asphalt Rake (2)
                       </li>
                       <li>Plate Compactor (1)
                       </li>
                       <li>Shovels (4)
                       </li>
                       <li>Asphalt Pick (1-2)
                       </li>
                       <li>Roller (Make sure roller is tied down on trailer properly)
                       </li>
                       <li>Street Saw (1)/Hand Saw (1)
                       </li>
                       <li>Hand Finishing Tools
                       </li>
                       <li>Orange Paint and String Line
                       </li>
                       <li>Gasoline for Hand Tools
                       </li>
                       <li>Tack (5-10 Gallons)
                       </li>

                <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Concrete') {?>

                       <li> Trencher and Curb Machine (If Needed)
                       </li>
                       <li>Hand Saw (1)
                       </li>
                       <li>Plate Compactor (1)
                       </li>
                       <li>Shovels (4)
                       </li>
                       <li>Pick (1-2)
                       </li>
                       <li>Forms - Pins
                       </li>
                       <li>Roller (Make sure roller is tied down on trailer properly)
                       </li>
                       <li>Street Saw (1)
                       </li>
                       <li>Hand Finishing Tools
                       </li>
                       <li>Orange Paint and String Line
                       </li>
                       <li>Gasoline for Hand Tools
                       </li>
              (elseif $details['cmpServiceCat'] eq 'Seal Coating'}


                       <li>Blower (1)
                       </li>
                       <li>Wands (As Needed)
                       </li>
                       <li>Brush/Broom (1)
                       </li>
                       <li>String Line & Ribbon
                       </li>
                       <li>Barricades (as needed)
                       </li>
                       <li>Check Tanker Levels for Sand, Additive, and
                           Sealer
                       </li>


                 { else}


                       <li>Check Tires/Lights on Truck and Trailers</li>
                       <li>Note: Anything Broken or Missing</li>

                <?php }?>
           </div>

       </div>

       </div>


    </td>
</table><?php }} ?>
