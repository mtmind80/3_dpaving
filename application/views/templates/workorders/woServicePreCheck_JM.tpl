<style>

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


   <div class="panel-body">

   <a href="{$SITE_URL}workorders/showServiceList/" class="btn btn-primary btn-labeled"><span class="btn-label icon fa fa-plus"></span>Scheduled Services</a>


   <div id="Proposalheader">
       <h2>Start of Day  CheckList For:  {$details.jordName} </h2>
       <h3>Job Manager {$USER_FULLNAME}</h3>
       </h2>{IF $details.jordStatus eq "COMPLETED"}<span class='alert-info'>COMPLETED</span>{/IF}</h2>

  </div>



       <div class="row panel" >

       <form action="{$SITE_URL}workorders/saveChecklist/{$pid}/{$sid}/1"  name="dataform" id="dataform"  method="POST">
       <input type="hidden" name="wochecklistjordID" id="wochecklistjordID" value="{$details.jordID}">
       <input type="hidden" name="checkListUser" id="checkListUser" value="{$USER_ID}">


       <div class="row">
           <div class="col-sm-5">
               <h4>{$details['cmpServiceCat']} Pre CheckList</h4>
               Responsibilities in the Morning
               <br/>Make sure all items are checked off on the Truck before leaving
               <div class="form-group no-margin-hr">
                   <label class="control-label">Checklist Date</label>
                   <div class="input-group date" id="bs-datepicker-component">
                       <input type="text" id="checklistDate" name="checklistDate" value="{$CurrentDate|date_format:"%m/%d/%Y"}"
                              class="form-control">
                       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                   </div>
               </div>
           </div>
           <div class="col-sm-2">
               </div>
               <div class="col-sm-5">
                   <b>
                       Job Start Date: {$details['jordStartDate']|date_format:"%A, %B %e, %Y"}

                       <br />
                       Job End Date: {$details['jordEndDate']|date_format:"%A, %B %e, %Y"}
                   </b>
                   <br />
                   {$details['jordAddress1']}
                       &nbsp;
                       {$details['jordAddress2']}
                       <br />
                       {$details['jordCity']},
                       {$details['jordState']}.
                       {$details['jordZip']}

                       <br />
               </div>
       </div>


       {* BEGIN SERVICES AREA *}
       {if $details['cmpServiceCat'] eq 'Asphalt'}

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

       {elseif $details['cmpServiceCat'] eq 'Concrete'}

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



       {elseif $details['cmpServiceCat'] eq 'Seal Coating'}


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




       {else}

           <br/>
           <div class="row">
               <div class="col-sm-5">
                   <label class="control-label">Normal Pre Check Required</label>
               </div>
           </div>


       {/if}


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

       <div class="col-sm-7">
           Notes
       </div>

        </div>


   {foreach $checklists as $c}
   <div class="row">
       {*{$SITE_URL}workorders/printDailyRep/{$c.wochecklistID}*}

       <div class="col-sm-1">
 <span class="alert-info"><a href="{$SITE_URL}workorders/printDailyRep/{$c.wochecklistID}">Print</a></span>
      </div>

       <div class="col-sm-2">
            {$c.checklistDate|date_format:"%m/%d/%Y"}
   </div>

       <div class="col-sm-2">
           {$c.cntFirstName} {$c.cntLastName}
       </div>

       <div class="col-sm-7">
           {$c.Notes}
        </div>

   </div>

   {/foreach}
{/IF}
   </div>
</div>
