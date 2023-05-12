<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-19 17:17:32
         compiled from "application/views/templates/workorders/woServicePreCheck.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2035329168574d907e09d392-99096054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d0f52f844d1d50804e874639f7eb990f484bbaf' => 
    array (
      0 => 'application/views/templates/workorders/woServicePreCheck.tpl',
      1 => 1474262737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2035329168574d907e09d392-99096054',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_574d907e1199c9_94512824',
  'variables' => 
  array (
    'details' => 0,
    'proposal' => 0,
    'services' => 0,
    'SITE_URL' => 0,
    'pid' => 0,
    'sid' => 0,
    'USER_ID' => 0,
    'CurrentDate' => 0,
    'checklists' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574d907e1199c9_94512824')) {function content_574d907e1199c9_94512824($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/system/smarty/libs/plugins/modifier.date_format.php';
?><style>

.funkyradio div {
  clear: both;
  overflow: hidden;
}

.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #D1D3D4;
  font-weight: normal;
}

.funkyradio input[type="radio"]:empty,
.funkyradio input[type="checkbox"]:empty {
  display: none;
}

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  text-indent: 3.25em;
  margin-top: 2em;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  display: block;
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #D1D3D4;
  border-radius: 3px 0 0 3px;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}

.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5bc0de;
}
</style>
<?php echo '<script'; ?>
 type="text/javascript">



init.push(function () {



    $('#bs-datepicker-component').datepicker({
        dateFormat: 'mm-dd-yy'
    });


});



function CHECKIT(form)
{
    if(!test(form)){ return;
    }

    form.submit();

}

function test(form)
{
     var stopit = 0;

    $("#dataform input[type=checkbox]").each(function() {

        if($(this).prop("checked") == true){



        }

        else if($(this).prop("checked") == false){
            alert("All checkboxes must be checked. If there is a problem please make a note of it.");
            stopit = 1;

        }


    });

    if(stopit == 1)
        {
            return false;
        }
    showSpinner();
    return true;

}

<?php echo '</script'; ?>
>


<div class="panel">

    <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderwizrdmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


   <div class="panel-body">


   <div id="Proposalheader">
       <h2>Pre CheckList Report</h2>
       </h2><?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
 <?php if ($_smarty_tpl->tpl_vars['details']->value['jordStatus']=="COMPLETED") {?><span class='alert-info'>COMPLETED</span><?php }?></h2>
       <h3>Work Order: <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterYear'];?>
-<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobMasterMonth'];?>
-<?php echo sprintf("%05d",$_smarty_tpl->tpl_vars['proposal']->value['jobMasterNumber']);?>
</h3>

   </div>

   <!--
       <div class="panel-heading" style="background:<?php echo $_smarty_tpl->tpl_vars['services']->value['catcolor'];?>
;">
           <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
 -
               <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceName'];?>

       </div>
-->
   <!-- begin row -->

       <div class="row panel"  style='border:1px #000000 solid;'>

           <div class="row">

               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       Client:<?php echo $_smarty_tpl->tpl_vars['proposal']->value['clientfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['clientlast'];?>

                       <br />
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


                       <br /><b>
                       Job Start Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordStartDate'],"%A, %B %e, %Y");?>


                       <br />
                       Job End Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordEndDate'],"%A, %B %e, %Y");?>

                        </b>
                   </div>
               </div>
               <div class="col-sm-7">
                   <strong>NOTES:</strong>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpProposalTextAlt'];?>

               </div>
           </div>
           <!-- row -->
       </div>


       <div class="row panel"  style='border:1px #000000 solid;'>

       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveChecklist/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="dataform" id="dataform"  method="POST">
       <input type="hidden" name="wochecklistjordID" id="wochecklistjordID" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordID'];?>
">
       <input type="hidden" name="checkListUser" id="checkListUser" value="<?php echo $_smarty_tpl->tpl_vars['USER_ID']->value;?>
">


       
       <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Asphalt') {?>


           <h3>Asphalt Pre CheckList</h3>
       Responsibilities in the Morning
       <br/>Make sure all items are checked off on the Truck before leaving
           <div class="row">
           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Checklist Date</label>
                   <div class="input-group date" id="bs-datepicker-component">
                       <input type="text" id="checklistDate" name="checklistDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
"
                              class="form-control">
                       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                   </div>
               </div>
           </div>
           </div>

<div class="funkyradio">
        <div class="funkyradio-success">
            <input type="radio" name="rake" id="Rake" value="1" />
            <label for="Rake">Asphalt Rake (2)</label>
        </div>



        <div class="funkyradio-success">
            <input type="radio" name="PlateCompactor" id="PlateCompactor"  value="1" />
            <label for="PlateCompactor">Plate Compactor (1)</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="Shovel" id="Shovel"  value="1" />
            <label for="Shovel">Shovels (4)</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="Pick" id="Pick"  value="1" />
            <label for="Pick">Asphalt Pick (1-2)</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="Roller" id="Roller"  value="1" />
            <label for="Roller">Roller (Make sure roller is tied down on trailer properly)</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="StreetSaw" id="StreetSaw"  value="1" />
            <label for="StreetSaw">Street Saw (1)/Hand Saw (1)</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="HandFinishingTools" id="HandFinishingTools"  value="1" />
            <label for="HandFinishingTools">Hand Finishing Tools</label>
        </div>


        
        <div class="funkyradio-success">
            <input type="radio" name="OrangePaint" id="OrangePaint"  value="1" />
            <label for="OrangePaint">Orange Paint and String Line</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="Gasoline" id="Gasoline"  value="1" />
            <label for="Gasoline">Gasoline for Hand Tools</label>
        </div>



        <div class="funkyradio-success">
            <input type="radio" name="Tack" id="Tack"  value="1" />
            <label for="Tack">Tack (5-10 Gallons)</label>
        </div>
</div>

           <!-- 

           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='Rake'  id='Rake' value="1">
               </div>
               <div class="col-sm-5">
                   Asphalt Rake (2)
               </div>
           </div>


           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='PlateCompactor'  id='PlateCompactor' value="1">
               </div>
               <div class="col-sm-5">
                   Plate Compactor (1)
               </div>
           </div>
           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='Shovel'  id='Shovel' value="1">
               </div>
               <div class="col-sm-5">
                   Shovels (4)
               </div>
           </div>

           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='Pick'  id='Pick' value="1">
               </div>
               <div class="col-sm-5">
                   Asphalt Pick (1-2)
               </div>
           </div>

           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='Roller'  id='Roller' value="1">
               </div>
               <div class="col-sm-5">
                   Roller (Make sure roller is tied down on trailer properly)
               </div>
           </div>

           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='StreetSaw'  id='StreetSaw' value="1">
               </div>
               <div class="col-sm-5">
                   Street Saw (1)/Hand Saw (1)
               </div>
           </div>


           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='HandFinishingTools'  id='HandFinishingTools' value="1">
               </div>
               <div class="col-sm-5">
                   Hand Finishing Tools
               </div>
           </div>



           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='OrangePaint'  id='OrangePaint' value="1">
               </div>
               <div class="col-sm-5">
                   Orange Paint and String Line
               </div>
           </div>

           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='Gasoline'  id='Gasoline' value="1">
               </div>
               <div class="col-sm-5">
                   Gasoline for Hand Tools
               </div>
           </div>



           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='Tack'  id='Tack' value="1">
               </div>
               <div class="col-sm-5">
                   Tack (5-10 Gallons)
               </div>
           </div> -->


       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Concrete') {?>

           <h3>Concrete Pre CheckList</h3>
           Responsibilities in the Morning
           <br/>Make sure all items are checked off on the Truck before leaving
           <div class="row">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Checklist Date</label>
                       <div class="input-group date" id="bs-datepicker-component">
                           <input type="text" id="checklistDate" name="checklistDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
"
                                  class="form-control">
                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                       </div>
                   </div>
               </div>
           </div>

           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='Trencher'  id='Trencher' value="1">
               </div>
               <div class="col-sm-5">
                   Trencher and Curb Machine (If Needed)
               </div>
           </div>



           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='HandSaw'  id='HandSaw' value="1">
               </div>
               <div class="col-sm-5">
                   Hand Saw (1)
               </div>
           </div>




           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='PlateCompactor'  id='PlateCompactor' value="1">
               </div>
               <div class="col-sm-5">
                   Plate Compactor (1)
               </div>
           </div>
           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='Shovel'  id='Shovel' value="1">
               </div>
               <div class="col-sm-5">
                   Shovels (4)
               </div>
           </div>

           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='Pick'  id='Pick' value="1">
               </div>
               <div class="col-sm-5">
                   Pick (1-2)
               </div>
           </div>

           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='FormsPins'  id='FormsPins' value="1">
               </div>
               <div class="col-sm-5">
                   Forms - Pins
               </div>
           </div>

           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='Roller'  id='Roller' value="1">
               </div>
               <div class="col-sm-5">
                   Roller (Make sure roller is tied down on trailer properly)
               </div>
           </div>

           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='StreetSaw'  id='StreetSaw' value="1">
               </div>
               <div class="col-sm-5">
                   Street Saw (1)
               </div>
           </div>


           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='HandFinishingTools'  id='HandFinishingTools' value="1">
               </div>
               <div class="col-sm-5">
                   Hand Finishing Tools
               </div>
           </div>



           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='OrangePaint'  id='OrangePaint' value="1">
               </div>
               <div class="col-sm-5">
                   Orange Paint and String Line
               </div>
           </div>

           <div class="row">
               <div class="col-sm-1">
                   <input type="checkbox" name='Gasoline'  id='Gasoline' value="1">
               </div>
               <div class="col-sm-5">
                   Gasoline for Hand Tools
               </div>
           </div>



       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Seal Coating') {?>

           <h3>Sealcoat Truck Project Checklist</h3>
           <span>Responsibilities in the Morning (Sealcoat)</span>

           <br/>Make sure all items are checked off on the Truck before leaving

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group no-margin-hr">
                <label class="control-label">Checklist Date</label>
                <div class="input-group date" id="bs-datepicker-component">
                    <input type="text" id="checklistDate" name="checklistDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
"
                           class="form-control">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-sm-1">
            <input type="checkbox" name='Blower'  id='Blower' value="1">
        </div>
        <div class="col-sm-5">
            Blower (1)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">
            <input type="checkbox" name='Wands'  id='Wands' value="1">
        </div>
        <div class="col-sm-5">
            Wands (As Needed)
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <input type="checkbox" name='BrushBroom'  id='BrushBroom' value="1">
        </div>
        <div class="col-sm-5">
            Brush/Broom (1)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">
            <input type="checkbox" name='StringLine'  id='StringLine' value="1">
        </div>
        <div class="col-sm-5">
            String Line & Ribbon
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <input type="checkbox" name='Barricades'  id='Barricades' value="1">
        </div>
        <div class="col-sm-5">
            Barricades (as needed)
        </div>
    </div>


    <div class="row">
        <div class="col-sm-1">
            <input type="checkbox" name='CheckTanker'  id='CheckTanker' value="1">
        </div>
        <div class="col-sm-5">
            Check Tanker Levels for Sand, Additive, and
            Sealer
        </div>
    </div>




       <?php } else { ?>
           <br/>
           <div class="row">
               <div class="col-sm-5">
                   <label class="control-label">No Pre Check Required</label>
               </div>
           </div>

           <h3>Daily CheckList</h3>
           Responsibilities in the Morning
           <br/>Make sure all items are on the Truck before leaving


           <div class="row">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Checklist Date</label>
                       <div class="input-group date" id="bs-datepicker-component">
                           <input type="text" id="checklistDate" name="checklistDate" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%m/%d/%Y");?>
"
                                  class="form-control">
                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                       </div>
                   </div>
               </div>
           </div>


       <?php }?>



       <div class="row">
           <div class="col-sm-1">
               <input type="checkbox" name='CheckTires'  id='CheckTires' value="1">
           </div>
           <div class="col-sm-5">
               Check Tires/Lights on Truck and Trailers
           </div>
       </div>

       <div class="row">
           <div class="col-sm-7">
               Note: Anything Broken or Missing
           </div>
       </div>

       <div class="row">
           <div class="col-sm-7">
               <textarea name='Notes'  id='Notes' class="form-control"></textarea>
           </div>
       </div>


       <!-- buton row -->
       <div class="row">
           <div class="col-sm-3">
               <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
           </div>

       </div>


       </form>

         </div>
   <?php if ($_smarty_tpl->tpl_vars['checklists']->value) {?>
   <h3>CheckList Log</h3>
   <div class="row">
       <div class="col-sm-1">
        Print
       </div>
       <div class="col-sm-2">
           Date
       </div>

       <div class="col-sm-2">
           Manager
       </div>

       <div class="col-sm-4">
           Notes
       </div>

        </div>


   <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['checklists']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
   <div class="row">

       <div class="col-sm-1">
     <span class="alert-info"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/printDailyRep/<?php echo $_smarty_tpl->tpl_vars['c']->value['wochecklistID'];?>
">Print</a></span>
       </div>

       <div class="col-sm-2">
            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['c']->value['checklistDate'],"%m/%d/%Y");?>

   </div>

       <div class="col-sm-2">
           <?php echo $_smarty_tpl->tpl_vars['c']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['c']->value['cntLastName'];?>

       </div>

       <div class="col-sm-4">
           <?php echo $_smarty_tpl->tpl_vars['c']->value['Notes'];?>

        </div>

   </div>

   <?php } ?>
<?php }?>
   </div>
</div>
<?php }} ?>
