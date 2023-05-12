<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-25 14:50:09
         compiled from "application/views/templates/workorders/woService.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2027560520573b84e58b1a33-48587190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c9b48756d7bcaf1bf272bb0d0e445b491a3d827' => 
    array (
      0 => 'application/views/templates/workorders/woService.tpl',
      1 => 1477396675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2027560520573b84e58b1a33-48587190',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573b84e59f4061_63123895',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'pid' => 0,
    'sid' => 0,
    'proposal' => 0,
    'USER_ROLE' => 0,
    'services' => 0,
    'details' => 0,
    'vehicles' => 0,
    'data' => 0,
    'equipment' => 0,
    'labor' => 0,
    'other' => 0,
    'subs' => 0,
    'USER_EMAIL' => 0,
    'medialist' => 0,
    'd' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573b84e59f4061_63123895')) {function content_573b84e59f4061_63123895($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/system/smarty/libs/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include '/var/www/html/system/smarty/libs/plugins/function.cycle.php';
?><?php echo '<script'; ?>
 type="text/javascript">



    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" },
            "pageLength": 100

        }  );
        //$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');


        $('#PrintMe').click(function() {

            showSpinner();
            $( "#pdataform" ).submit();
            setTimeout("hideSpinner()",5000);
        });

        $("#selectall").click(function(){
            //alert("just for check");
            if(this.checked){
                $('.checkboxall').each(function(){
                    this.checked = true;


                })
            }else{
                $('.checkboxall').each(function(){
                    this.checked = false;


                })
            }
        });


        $('#EmailMe').click(function() {

            if($("#sendto").val() == '')
            {
                alert('You must enter an email address.')
            }
            else
            {
                showSpinner();
                $('#UseEmail').val('1');
                $( "#pdataform" ).attr("action", "<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOServiceDetailMail/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
");
                $( "#pdataform" ).submit();
                setTimeout("hideSpinner()",5000);
            }

        });
    });


    function CHECKITE(form,sendby)
    {
        if(!teste(form)){ return;
        }

        if(sendby ==1)
        {
            showSpinner('Please wait while we format the email.');
            var url = "<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOEMailLetter/2/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
";
            var posting = $.post( url, $( "#zdataform" ).serialize() );
            posting.done(function( data ) {
                hideSpinner();
                var linktext = "<a target='mail' href='mailto:<?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryEmail'];?>
?subject=StartDate&body=" + encodeURIComponent(data) + "'>Send Email</a>";
                $( "#letterlink" ).html( linktext );
                alert('Click the Send Email link');
            });


            return;
        }
        form.submit();
    }

    function teste(form)
    {

        return true;

    }
    function Swoop(dURL)
    {
        window.open(dURL, "MsgWindow", "width=600,height=600,scrollbars=yes");

    }

<?php echo '</script'; ?>
>


<div class="panel">
<?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==4||$_smarty_tpl->tpl_vars['USER_ROLE']->value==5) {?>
<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderwizrdmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
   <div class="panel-body">


   <div id="Proposalheader">
       <h2> <span  class="fa fa-truck" style="background:<?php echo $_smarty_tpl->tpl_vars['services']->value['catcolor'];?>
;">&nbsp;</span><?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
 <?php if ($_smarty_tpl->tpl_vars['details']->value['jordStatus']=="COMPLETED") {?><span class='alert-info'>COMPLETED</span><?php }?></h2>

   </div>

   <!-- begin row -->

       <div class="row panel"  >

           <div class="row">

               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       Client:<?php echo $_smarty_tpl->tpl_vars['proposal']->value['clientfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['clientlast'];?>

                       <br />
                       Location:
                       <?php if ($_smarty_tpl->tpl_vars['details']->value['jordAddress1']!='') {?>
                       <a href="Javascript:showUserOnMap('<?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
', '<?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress1'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress2'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
. <?php echo $_smarty_tpl->tpl_vars['details']->value['jordZip'];?>
');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                       <a href="https://www.google.com/#q=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['details']->value['jordAddress1'],' ','+');?>
+<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['details']->value['jordCity'],' ','+');?>
+<?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
+<?php echo $_smarty_tpl->tpl_vars['details']->value['jordZip'];?>
" title="Directions" target="Drive"><span class=" icon fa fa-truck"></span></a> &nbsp;
                       <?php }?>

                       <br/>


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
                       Parcel: <?php echo $_smarty_tpl->tpl_vars['details']->value['jordParcel'];?>

                       <br />
                       Start Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordStartDate'],"%A, %B %e, %Y");?>


                       <br />
                       End Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordEndDate'],"%A, %B %e, %Y");?>


                   </div>
               </div>
               <strong>ESTIMATORS NOTE: </strong>
               <?php echo $_smarty_tpl->tpl_vars['details']->value['jordNote'];?>


               <br/><br/>
               <strong>SERVICE: </strong>
               <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpProposalTextAlt'];?>


           </div>
           <!-- row -->
       </div>



       <div class="row panel"  >



       <br />

       
       <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Asphalt') {?>



           <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceID']==19) {?>
               <div class="row">
                   <div class="col-sm-3">
                       <label class="control-label">Size of project in SQ FT</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">Depth In Inches</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>

                       </div>
                   <div class="col-sm-3">
                       <label class="control-label">Days of Milling</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDays'];?>

                   </div>

               </div>
               <br />
               <div class="row">

                   <div class="col-sm-3">
                       <label class="control-label">Locations</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>

                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">SQ. Yards</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSQYards'];?>

                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">Loads</label>
                        <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLoads'];?>

                   </div>
               </div>




           <?php } else { ?> 


               <br/>
               <div class="row">

                   <div class="col-sm-3">
                       <label class="control-label">Size of project in SQ FT</label>
                        <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">Depth In Inches</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>


                   </div>
                </div>
                <div class="row">

                   <div class="col-sm-3">
                       <label class="control-label">Locations</label>
                      <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>

                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">SQ. Yards</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSQYards'];?>

                   </div>

               </div>
               <div class="row">

                   <div class="col-sm-3">
                       <label class="control-label">Tons Asphalt</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordTons'];?>

                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">Tack</label>
                       Gallons
                   </div>

               </div>

           <?php }?>



       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Concrete') {?>


           <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceID']<12) {?> 
               <br/>

               <div class="row">
                   <div class="col-sm-5">
                       <label class="control-label">Length In Feet (linear feet)</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLinearFeet'];?>

                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Locations</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>

                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">CU YDS</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordCubicYards'];?>
 </div>
               </div>



           <?php } else { ?> 
               <br/>
               <div class="row">
                   <div class="col-sm-3">
                       <label class="control-label">Sq. Ft.</label>
                     <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">Depth (inches)</label>
                       <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>

                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">Locations</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>

                   </div>
               </div>
           <?php }?>

       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Excavation') {?>


           <div class="row">
               <div class="col-sm-2">
                   <label class="control-label">Sq. Ft.</label>
                    <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

               </div>
               <div class="col-sm-3">
                   <label class="control-label">Depth In inches</label>
                    <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>


               </div>
               <div class="col-sm-2">
                   <label class="control-label">Tons Excavation</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordTons'];?>

               </div>
               <div class="col-sm-2">
                   <label class="control-label">Loads</label>
                    <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLoads'];?>

               </div>

           </div>

           <br/>


       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Other') {?>


           <div class="row">

               <div class="col-sm-8">
                   <label class="control-label">Description</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>

               </div>

           </div>



       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Rock') {?>



           <div class="row">
               <div class="col-sm-2">
                   <label class="control-label">SQ . Ft.</label>
                <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

               </div>
               <div class="col-sm-3">
                   <label class="control-label">Depth In inches</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>

               </div>
               <div class="col-sm-2">
                   <label class="control-label">Tons Excavation</label>
                    <?php echo $_smarty_tpl->tpl_vars['details']->value['jordTons'];?>

               </div>
               <div class="col-sm-2">
                   <label class="control-label">Loads</label>
                 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLoads'];?>

               </div>

           </div>
           <br/>

       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Seal Coating') {?>


           <!-- row -->
           <div class="row">
               <div class="col-sm-3">
                   <label class="control-label">Yield</label>
                <?php echo $_smarty_tpl->tpl_vars['details']->value['jordYield'];?>

               </div>

               <div class="col-sm-3">
                   <label class="control-label">SQ. FT.</label>
                 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>


               </div>

           </div>
           <br/>

           <div class="row" >
               <div class="col-sm-3">
                   <label class="control-label"> Oil Spot Primer (gals)</label>
                <?php echo $_smarty_tpl->tpl_vars['details']->value['jordPrimer'];?>

               </div>
               <div class="col-sm-3">
                   <label class="control-label">Fast Set (gals)</label>

                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordFastSet'];?>

               </div>
               <div class="col-sm-3">
                   <label class="control-label">Phases</label>

                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordPhases'];?>

               </div>





           </div>
           <br/>
           <div class="row" >
               <div class="col-sm-3">
                   <label class="control-label">Materials Needed</label>
               </div>
               <div class="col-sm-2">
                   <label class="control-label">Sealer (gals)</label>
                 <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSealer'];?>

               </div>
               <div class="col-sm-2">
                   <label class="control-label">Sand (lbs) </label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSand'];?>

               </div>
               <div class="col-sm-2">
                   <label class="control-label">Additive (gals)</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAdditive'];?>

               </div>

           </div>
           <br/>



      <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Striping') {?>



      <?php echo $_smarty_tpl->tpl_vars['details']->value['jordProposalText'];?>


       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Sub Contractor') {?>

           <div class="row" >
               <div class="col-sm-3">
                   <label class="control-label">Sub Contractor</label>
                   <h4><?php echo $_smarty_tpl->tpl_vars['details']->value['subfirstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['sublastname'];?>
</h4>
               </div>
               <div class="col-sm-6">
                   <label class="control-label">Description</label>
                    <?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>

               </div>

           </div>

       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Paver Brick') {?>

           <br />
           <div class="row" >
               <div class="col-sm-2">
                   <label class="control-label">SQ. Ft.</label>
                <?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>

               </div>
               <div class="col-sm-2">
                   <label class="control-label">Excavate Tons</label>
                    <?php echo $_smarty_tpl->tpl_vars['details']->value['jordTons'];?>

               </div>

               <div class="col-sm-5">
                   <label class="control-label">Job Description</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>

               </div>
           </div>

       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Drainage and Catchbasins') {?>

           <br />
           <div class="row" >
               <div class="col-sm-3">
                   <label class="control-label">Number of Catch Basins</label>
                <?php echo $_smarty_tpl->tpl_vars['details']->value['jordAdditive'];?>

               </div>
               <div class="col-sm-6">
                   <label class="control-label">Job Description</label>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>

               </div>
           </div>
       <?php } else { ?>
           xxxxxxxxxxxxxxxxxxxxxxxxxxxxx    ALERT:UNKNOWN SERVICE    xxxxxxxxxxxxxxxxxxxxxxxxxxxxx

       <?php }?>


       <!-- row -->


       <!-- begin vehicles -->
       <br />

     <?php if ($_smarty_tpl->tpl_vars['vehicles']->value) {?>

                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-3">

                               Vehicles
                           </div>
                           <div class="col-sm-2">
                               Quantity
                           </div>
                           <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value<=3) {?>
                           <div class="col-sm-2">
                               Days
                           </div>
                           <div class="col-sm-2">
                               Hours
                           </div>
                      <?php }?>
                       </div>


                   <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vehicles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-sm-3">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POVvehicleName'];?>

                           </div>

                           <div class="col-sm-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POVNumber'];?>

                           </div>
                           <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value<=3) {?>
                           <div class="col-sm-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POVDaysNeeded'];?>

                           </div>

                           <div class="col-sm-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POVHoursDay'];?>

                           </div>
                            <?php }?>

                       </div>
                  <?php } ?>
     <?php }?>

               <!-- begin row -->

     <?php if ($_smarty_tpl->tpl_vars['equipment']->value) {?>
            <br />
                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-3">

                               Equipment
                           </div>
                           <div class="col-sm-2">
                               Quantity
                           </div>
                           <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value<=3) {?>
                           <div class="col-sm-2">
                               Days
                           </div>
                           <div class="col-sm-2">
                               Hours
                           </div>
                    <?php }?>
     </div>

                   <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['equipment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-sm-3">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipName'];?>

                           </div>

                           <div class="col-sm-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipNumber'];?>

                           </div>
                           <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value<=3) {?>
                           <div class="col-sm-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipDaysNeeded'];?>

                           </div>

                           <div class="col-sm-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipHoursDay'];?>

                           </div>
                            <?php }?>
                       </div>

                   <?php } ?>

       <?php }?>


       <!-- labor sections -->



   <?php if ($_smarty_tpl->tpl_vars['labor']->value) {?>
       <br />

                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-3">

                               Labor
                           </div>
                           <div class="col-sm-2">
                               Quantity
                           </div>
                           <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value<=3) {?>
                           <div class="col-sm-2">
                               Days
                           </div>
                           <div class="col-sm-2">
                                   Hours
                           </div>
                           <?php }?>
                       </div>

                   <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['labor']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-sm-3">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborName'];?>

                           </div>

                           <div class="col-sm-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborNumber'];?>

                           </div>
                           <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value<=3) {?>
                           <div class="col-sm-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborDaysNeeded'];?>

                           </div>

                           <div class="col-sm-2">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborHoursDay'];?>

                           </div>
                            <?php }?>
                       </div>

                   <?php } ?>
      <?php }?>


      <?php if ($_smarty_tpl->tpl_vars['other']->value) {?>
            <br/>
               <!-- begin row -->
                           <div class="row" >
                               <div class="col-sm-3">

                                   Other Service
                               </div>
                               <div class="col-sm-6">
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
                               <div class="col-sm-3">
                                   <?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostTitle'];?>

                               </div>

                               <div class="col-sm-6">
                                   <?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostDescription'];?>

                               </div>
                           </div>

                       <?php } ?>
      <?php }?>

       <!-- sub contractor sections -->


      <?php if ($_smarty_tpl->tpl_vars['subs']->value) {?>
         <br />

                   <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-4">
                               Sub Contractor
                           </div>
                           <div class="col-sm-5 left">
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

                           <div class="col-sm-4">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>

                           </div>

                           <div class="col-sm-5">
                               <?php echo $_smarty_tpl->tpl_vars['data']->value['posubDescription'];?>

                           </div>

                       </div>

                 <?php } ?>
      <?php }?>


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

   <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/WOToPDFSS/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="pdataform" id="pdataform"  method="POST">
       <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
       <input type="hidden" name="UseEmail" id="UseEmail" value="0">

       <a id='PrintMe'  href="#" class="btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-print"></span>  Print Service With Selected Images</a>
&nbsp;
       <a id='EmailMe'  href="#" class="btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-envelope"></span>  Email Service With Selected Images</a>
<input type='TEXT' name="sendto" id="sendto" value="<?php echo $_smarty_tpl->tpl_vars['USER_EMAIL']->value;?>
">
       <br/>
       <input type="checkbox" id="selectall"> select all
       <div class="table-primary">
           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
               <thead>
               <tr>
                   <th >&nbsp;</th>
                   <th >Media</th>
                   <th >Uploaded</th>
               </tr>
               </thead>
               <tbody>
               <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
               <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
               <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['medialist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                   <?php if ($_smarty_tpl->tpl_vars['d']->value['jobmdisImage']) {?>
                       <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                           <td>
                               <input type='checkbox' class='checkboxall' name='upload_<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdId'];?>
' id='upload_<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdId'];?>
' value ='<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdId'];?>
'>
                           </td>
                           <td class="text-left">
                               <span class="alert-success">Description:</span> <?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdDescription'];?>

                               <br/>
                               <?php echo (($tmp = @$_smarty_tpl->tpl_vars['d']->value['jordName'])===null||$tmp==='' ? 'Entire Proposal' : $tmp);?>

                               <br/>
                               <?php echo $_smarty_tpl->tpl_vars['d']->value['PODocTypeName'];?>
 <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
media/projects/<?php echo $_smarty_tpl->tpl_vars['d']->value['jobmdFileName'];?>
' title="View Document" target='view'>View Upload</a>
                           </td>
                           <td><?php echo $_smarty_tpl->tpl_vars['d']->value['uploader'];?>
<br/>
                               <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['jobmdCreatedDateTime'],"%A %B %d,  %Y");?>
</td>
                       </tr>
                   <?php }?>

               <?php } ?>



               </tbody>
           </table>
       </div>
   </form>

<?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==4||$_smarty_tpl->tpl_vars['USER_ROLE']->value==5) {?>
   <a class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMediaJM/<?php echo $_smarty_tpl->tpl_vars['details']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['details']->value['jordID'];?>
"><span class="btn-label icon fa fa-camera"></span> Add Media</a>
   <a class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOChecklistPJM/<?php echo $_smarty_tpl->tpl_vars['details']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['details']->value['jordID'];?>
"><span class="btn-label icon fa fa-check"></span> Pre-Day Checklist</a>
   <a class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOChecklistEJM/<?php echo $_smarty_tpl->tpl_vars['details']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['details']->value['jordID'];?>
"><span class="btn-label icon fa fa-list-alt"></span> End of Day Report</a>
   <?php if ($_smarty_tpl->tpl_vars['details']->value['jordStatus']!="COMPLETED") {?>
   <a class="btn btn-success" href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOServiceCompletedJM/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordJobID'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['jordID'];?>
','You are about to close out this service and mark it as completed.\nAre you sure?')"><span class="btn-label icon fa fa-edit"></span> Mark Completed</a>
    <?php }?>
<?php }?>
   </div></div>
<?php }} ?>
