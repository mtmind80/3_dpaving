<style>

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
<script type="text/javascript">



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

</script>


<div class="panel">

    {include file='workorders/_workorderwizrdmenu.tpl'}

   <div class="panel-body">


   <div id="Proposalheader">
       <h2>Pre CheckList Report</h2>
       </h2>{$details.jordName} {IF $details.jordStatus eq "COMPLETED"}<span class='alert-info'>COMPLETED</span>{/IF}</h2>
       <h3>Work Order: {$proposal.jobMasterYear}-{$proposal.jobMasterMonth}-{"%05d"|sprintf:$proposal.jobMasterNumber}</h3>

   </div>

   <!--
       <div class="panel-heading" style="background:{$services.catcolor};">
           {$details['cmpServiceCat']} -
               {$details['cmpServiceName']}
       </div>
-->
   <!-- begin row -->

       <div class="row panel"  style='border:1px #000000 solid;'>

           <div class="row">

               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       Client:{$proposal.clientfirst} {$proposal.clientlast}
                       <br />
                       Location:
                       {$details['jordAddress1']}
                       &nbsp;
                       {$details['jordAddress2']}
                       <br />
                       {$details['jordCity']},
                       {$details['jordState']}.
                       {$details['jordZip']}

                       <br /><b>
                       Job Start Date: {$details['jordStartDate']|date_format:"%A, %B %e, %Y"}

                       <br />
                       Job End Date: {$details['jordEndDate']|date_format:"%A, %B %e, %Y"}
                        </b>
                   </div>
               </div>
               <div class="col-sm-7">
                   <strong>NOTES:</strong>
                   {$details.cmpProposalTextAlt}
               </div>
           </div>
           <!-- row -->
       </div>


       <div class="row panel"  style='border:1px #000000 solid;'>

       <form action="{$SITE_URL}workorders/saveChecklist/{$pid}/{$sid}"  name="dataform" id="dataform"  method="POST">
       <input type="hidden" name="wochecklistjordID" id="wochecklistjordID" value="{$details.jordID}">
       <input type="hidden" name="checkListUser" id="checkListUser" value="{$USER_ID}">


       {* BEGIN SERVICES AREA *}
       {if $details['cmpServiceCat'] eq 'Asphalt'}


           <h3>Asphalt Pre CheckList</h3>
       Responsibilities in the Morning
       <br/>Make sure all items are checked off on the Truck before leaving
           <div class="row">
           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   <label class="control-label">Checklist Date</label>
                   <div class="input-group date" id="bs-datepicker-component">
                       <input type="text" id="checklistDate" name="checklistDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}"
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


       {elseif $details['cmpServiceCat'] eq 'Concrete'}

           <h3>Concrete Pre CheckList</h3>
           Responsibilities in the Morning
           <br/>Make sure all items are checked off on the Truck before leaving
           <div class="row">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Checklist Date</label>
                       <div class="input-group date" id="bs-datepicker-component">
                           <input type="text" id="checklistDate" name="checklistDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}"
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



       {elseif $details['cmpServiceCat'] eq 'Seal Coating'}

           <h3>Sealcoat Truck Project Checklist</h3>
           <span>Responsibilities in the Morning (Sealcoat)</span>

           <br/>Make sure all items are checked off on the Truck before leaving

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group no-margin-hr">
                <label class="control-label">Checklist Date</label>
                <div class="input-group date" id="bs-datepicker-component">
                    <input type="text" id="checklistDate" name="checklistDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}"
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




       {else}
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
                           <input type="text" id="checklistDate" name="checklistDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}"
                                  class="form-control">
                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                       </div>
                   </div>
               </div>
           </div>


       {/if}



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
   {IF $checklists}
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


   {foreach $checklists as $c}
   <div class="row">

       <div class="col-sm-1">
     <span class="alert-info"><a href="{$SITE_URL}workorders/printDailyRep/{$c.wochecklistID}">Print</a></span>
       </div>

       <div class="col-sm-2">
            {$c.checklistDate|date_format:"%m/%d/%Y"}
   </div>

       <div class="col-sm-2">
           {$c.cntFirstName} {$c.cntLastName}
       </div>

       <div class="col-sm-4">
           {$c.Notes}
        </div>

   </div>

   {/foreach}
{/IF}
   </div>
</div>
