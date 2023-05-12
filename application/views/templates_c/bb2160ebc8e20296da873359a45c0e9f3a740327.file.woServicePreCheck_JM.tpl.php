<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-19 16:16:05
         compiled from "application/views/templates/workorders/woServicePreCheck_JM.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37435714258f7d395254fe4-39241183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb2160ebc8e20296da873359a45c0e9f3a740327' => 
    array (
      0 => 'application/views/templates/workorders/woServicePreCheck_JM.tpl',
      1 => 1474264301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37435714258f7d395254fe4-39241183',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'details' => 0,
    'USER_FULLNAME' => 0,
    'pid' => 0,
    'sid' => 0,
    'USER_ID' => 0,
    'CurrentDate' => 0,
    'checklists' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58f7d3952dbb73_55373664',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f7d3952dbb73_55373664')) {function content_58f7d3952dbb73_55373664($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?><style>

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


   <div class="panel-body">

   <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showServiceList/" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-plus"></span>Scheduled Services</a>


   <div id="Proposalheader">
       <h2>Start of Day  CheckList For:  <?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
 </h2>
       <h3>Job Manager <?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
</h3>
       </h2><?php if ($_smarty_tpl->tpl_vars['details']->value['jordStatus']=="COMPLETED") {?><span class='alert-info'>COMPLETED</span><?php }?></h2>

  </div>



       <div class="row panel" >

       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/saveChecklist/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/1"  name="dataform" id="dataform"  method="POST">
       <input type="hidden" name="wochecklistjordID" id="wochecklistjordID" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordID'];?>
">
       <input type="hidden" name="checkListUser" id="checkListUser" value="<?php echo $_smarty_tpl->tpl_vars['USER_ID']->value;?>
">


       <div class="row">
           <div class="col-sm-5">
               <h4><?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
 Pre CheckList</h4>
               Responsibilities in the Morning
               <br/>Make sure all items are checked off on the Truck before leaving
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
           <div class="col-sm-2">
               </div>
               <div class="col-sm-5">
                   <b>
                       Job Start Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordStartDate'],"%A, %B %e, %Y");?>


                       <br />
                       Job End Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['jordEndDate'],"%A, %B %e, %Y");?>

                   </b>
                   <br />
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
               </div>
       </div>


       
       <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Asphalt') {?>

           <div class="row"><!-- 
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
           </div>
 -->
<div class="funkyradio">
        <div class="funkyradio-success">
            <input type="checkbox" name="rake" id="Rake" value="1" />
            <label for="Rake">Asphalt Rake (2)</label>
        </div>



        <div class="funkyradio-success">
            <input type="checkbox" name="PlateCompactor" id="PlateCompactor"  value="1" />
            <label for="PlateCompactor">Plate Compactor (1)</label>
        </div>
        <div class="funkyradio-success">
            <input type="checkbox" name="Shovel" id="Shovel"  value="1" />
            <label for="Shovel">Shovels (4)</label>
        </div>
        <div class="funkyradio-success">
            <input type="checkbox" name="Pick" id="Pick"  value="1" />
            <label for="Pick">Asphalt Pick (1-2)</label>
        </div>
        <div class="funkyradio-success">
            <input type="checkbox" name="Roller" id="Roller"  value="1" />
            <label for="Roller">Roller (Make sure roller is tied down on trailer properly)</label>
        </div>
        <div class="funkyradio-success">
            <input type="checkbox" name="StreetSaw" id="StreetSaw"  value="1" />
            <label for="StreetSaw">Street Saw (1)/Hand Saw (1)</label>
        </div>
        <div class="funkyradio-success">
            <input type="checkbox" name="HandFinishingTools" id="HandFinishingTools"  value="1" />
            <label for="HandFinishingTools">Hand Finishing Tools</label>
        </div>



        <div class="funkyradio-success">
            <input type="checkbox" name="OrangePaint" id="OrangePaint"  value="1" />
            <label for="OrangePaint">Orange Paint and String Line</label>
        </div>
        <div class="funkyradio-success">
            <input type="checkbox" name="Gasoline" id="Gasoline"  value="1" />
            <label for="Gasoline">Gasoline for Hand Tools</label>
        </div>



        <div class="funkyradio-success">
            <input type="checkbox" name="Tack" id="Tack"  value="1" />
            <label for="Tack">Tack (5-10 Gallons)</label>
        </div>
</div>

       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Concrete') {?>

        <div class="funkyradio">
          <div class="funkyradio-success">
              <input type="checkbox" name="Trencher" id="Trencher"  value="1" />
              <label for="Trencher">Trencher and Curb Machine (If Needed)</label>
          </div>



          <div class="funkyradio-success">
              <input type="checkbox" name="HandSaw" id="HandSaw"  value="1" />
              <label for="HandSaw">Hand Saw (1)</label>
          </div>


          <div class="funkyradio-success">
              <input type="checkbox" name="PlateCompactor" id="PlateCompactor"  value="1" />
              <label for="PlateCompactor">Plate Compactor (1)</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="Shovel" id="Shovel"  value="1" />
              <label for="Shovel">Shovels (4)</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="Pick" id="Pick"  value="1" />
              <label for="Pick">Pick (1-2)</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="FormsPins" id="FormsPins"  value="1" />
              <label for="FormsPins">Forms - Pins</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="Roller" id="Roller"  value="1" />
              <label for="Roller">Roller (Make sure roller is tied down on trailer properly)</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="StreetSaw" id="StreetSaw"  value="1" />
              <label for="StreetSaw">Street Saw (1)</label>
          </div>


          <div class="funkyradio-success">
              <input type="checkbox" name="HandFinishingTools" id="HandFinishingTools"  value="1" />
              <label for="HandFinishingTools">Hand Finishing Tools</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="OrangePaint" id="OrangePaint"  value="1" />
              <label for="OrangePaint">Orange Paint and String Line</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="Gasoline" id="Gasoline"  value="1" />
              <label for="Gasoline">Gasoline for Hand Tools</label>
          </div>





        </div>
           <!-- <div class="row">
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
           </div> -->



       <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Seal Coating') {?>


  <div class="funkyradio">
          <div class="funkyradio-success">
              <input type="checkbox" name="Blower" id="Blower"  value="1" />
              <label for="Blower">Blower (1)</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="Wands" id="Wands"  value="1" />
              <label for="Wands">Wands (As Needed)</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="BrushBroom" id="BrushBroom"  value="1" />
              <label for="BrushBroom">Brush/Broom (1)</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="StringLine" id="StringLine"  value="1" />
              <label for="StringLine">String Line & Ribbon</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="Barricades" id="Barricades"  value="1" />
              <label for="Barricades">Barricades (as needed)</label>
          </div>
          <div class="funkyradio-success">
              <input type="checkbox" name="CheckTanker" id="CheckTanker"  value="1" />
              <label for="CheckTanker">Check Tanker Levels for Sand, Additive, and
            Sealer</label>
          </div>
         

        </div>

   <!--  <div class="row">
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
    </div> -->




       <?php } else { ?>

           <br/>
           <div class="row">
               <div class="col-sm-5">
                   <label class="control-label">Normal Pre Check Required</label>
               </div>
           </div>


       <?php }?>


       <br />
       <div class="funkyradio">
        <div class="funkyradio-success">
            <input type="checkbox" name="CheckTires" id="CheckTires"  value="1" />
            <label for="CheckTires">Check Tires/Lights on Truck and Trailers</label>
        </div>
      </div>
       <!-- <div class="row">
           <div class="col-sm-1">
               <input type="checkbox" name='CheckTires'  id='CheckTires' value="1">
           </div>
           <div class="col-sm-5">
               Check Tires/Lights on Truck and Trailers
           </div>
       </div> -->
<br />

       <div class="row">
           <div class="col-md-12">
               Note: Anything Broken or Missing
           </div>
       </div>

       <div class="row">
           <div class="col-md-12">
               <textarea name='Notes'  id='Notes' class="form-control"></textarea>
           </div>
       </div>
       <br />


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

       <div class="col-sm-7">
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

       <div class="col-sm-7">
           <?php echo $_smarty_tpl->tpl_vars['c']->value['Notes'];?>

        </div>

   </div>

   <?php } ?>
<?php }?>
   </div>
</div>
<?php }} ?>
