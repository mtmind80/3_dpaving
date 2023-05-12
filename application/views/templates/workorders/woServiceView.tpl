<script>
    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }


        form.submit();

       // window.parent.opener.location.reload();
       //self.close();
       // window.location.href="{$SITE_URL}workorders/WOServiceDetailView/{$pid}/{$sid}";

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




</script>
<table width="710">
    <td>

<center><img src="{$SITE_URL}assets/images/Header.jpg" border="0" width='700' alt="3D Paving" /></center>

<h2>Work Order#  {$proposal['jobMasterYear']}-{$proposal['jobMasterMonth']}-{"%05d"|sprintf:$proposal['jobMasterNumber']} </h2>

<table width='98%'>
    <tr>
        <td>
            <center><h2>{$proposal['jobName']}</h2></center>
            <br/>
            <h3>Estimator:{$proposal['salesfirst']} {$proposal['saleslast']}
                &nbsp;
                &nbsp;
                {$proposal['salesphone']}</h3>
        </td>
    </tr>
</table>
<br/>
       <h3> {$details.jordName}

       </h3>



        <form id='fdataform' name='fdataform' action='{$SITE_URL}workorders/WOServiceDetailMail/{$pid}/{$sid}' method="POST">

    <input type='hidden' name="pid" id="pid" value="{$pid}">
    <input type='hidden' name="sid" id="sid" value="{$sid}">
    <input type='hidden' name="email" id="email" value="{$USER_EMAIL}">


    <div class='row hidden-print'>
    <div class='row'>
        <div class="col-xs-3">
            <a  href="Javascript:print();" class="btn btn-light-green btn-labeled "><span class="btn-label icon fa fa-print"></span> Print </a>
        </div>
            <div class="col-xs-6">
                <input type="text" name="sendto" id="sendto" class="form-control" value="{$USER_EMAIL}">

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
           <b>Job Manager: </b>{$details['manager1firstname']} {$details['manager1lastname']}
           &nbsp;
           &nbsp;
           {$details['manager1phone']}
           </div>
       </div>

       <br/>
       <div class="row">

           <div class="col-xs-4">
               <div class="form-group no-margin-hr">

                   Location:
                   {$details['jordAddress1']}
                   &nbsp;
                   {$details['jordAddress2']}
                   <br />
                   {$details['jordCity']},
                   {$details['jordState']}.
                   {$details['jordZip']}

                   <br />
                   Start Date: {$details['jordStartDate']|date_format:"%A, %B %e, %Y"}

                   <br />
                   End Date: {$details['jordEndDate']|date_format:"%A, %B %e, %Y"}

               </div>
           </div>
           <div class="col-xs-4">
               <strong>SERVICE: </strong>
               {$details.cmpProposalTextAlt}
               <br/><br/>
                {if $details.jordCustomNote neq ''}
                      <strong>NOTE: </strong>
                      {$details.jordCustomNote}
                 <br/>

                {/if}

           </div>
       </div>
       <!-- row -->
   </div>


   <!-- begin row -->

       <div class="row panel"  style='border:1px #000000 solid;'>

       <br />

       {* BEGIN SERVICES AREA *}
       {if $details['cmpServiceCat'] eq 'Asphalt'}



           {IF  $details.cmpServiceID eq 19}{* Milling *}
               <div class="row">
                   <div class="col-xs-3">
                       <label class="control-label">Size of project in SQ FT</label>
                       {$details.jordSquareFeet}
                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">Depth In Inches</label>
                       {$details.jordDepthInInches}
                       </div>
                   <div class="col-xs-3">
                       <label class="control-label">Days of Milling</label>
                       {$details.jordDays}
                   </div>

               </div>
               <br />
               <div class="row">

                   <div class="col-xs-3">
                       <label class="control-label">Locations</label>
                       {$details.jordLocations}
                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">SQ. Yards</label>
                       {$details.jordSQYards}
                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">Loads</label>
                        {$details.jordLoads}
                   </div>
               </div>




           {ELSE} {* all other asphalt types *}


               <br/>
               <div class="row">

                   <div class="col-xs-3">
                       <label class="control-label">Size of project in SQ FT</label>
                        {$details.jordSquareFeet}
                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">Depth In Inches</label>
                       {$details.jordDepthInInches}

                   </div>
                </div>
                <div class="row">

                   <div class="col-xs-3">
                       <label class="control-label">Locations</label>
                      {$details.jordLocations}
                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">SQ. Yards</label>
                       {$details.jordSQYards}
                   </div>

               </div>


           {/IF}



       {elseif $details['cmpServiceCat'] eq 'Concrete'}


           {IF $details.cmpServiceID < 12} {*curb mix*}
               <br/>

               <div class="row">
                   <div class="col-xs-5">
                       <label class="control-label">Length In Feet (linear feet)</label>
                       {$details.jordLinearFeet}
                   </div>
                   <div class="col-xs-2">
                       <label class="control-label">Locations</label>
                       {$details.jordLocations}
                   </div>
                   <div class="col-xs-2">
                       <label class="control-label">CU YDS</label>
                       {$details.jordCubicYards} </div>
               </div>



           {ELSE} {*drum mix*}
               <br/>
               <div class="row">
                   <div class="col-xs-3">
                       <label class="control-label">Sq. Ft.</label>
                     {$details.jordSquareFeet}
                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">Depth (inches)</label>
                       {$details.jordDepthInInches}
                   </div>
                   <div class="col-xs-3">
                       <label class="control-label">Locations</label>
                   {$details.jordLocations}
                   </div>
               </div>
           {/IF}

       {elseif $details['cmpServiceCat'] eq 'Excavation'}


           <div class="row">
               <div class="col-xs-2">
                   <label class="control-label">Sq. Ft.</label>
                   {$details.jordSquareFeet}
               </div>
               <div class="col-xs-3">
                   <label class="control-label">Depth In inches</label>
                   {$details.jordDepthInInches}

               </div>
               <div class="col-xs-2">
                   <label class="control-label">Tons</label>
                   {$details.jordTons}
               </div>
               <div class="col-xs-2">
                   <label class="control-label">Loads</label>
                   {$details.jordLoads}
               </div>

           </div>

           <br/>

       {elseif $details['cmpServiceCat'] eq 'Striping'}


           <div class="row">
               <div class="col-xs-8">
                  {$details.jordProposalText}
               </div>

           </div>

           <br/>


       {elseif $details['cmpServiceCat'] eq 'Other'}


           <div class="row">

               <div class="col-xs-8">
                   <label class="control-label">Description</label>
                   {$details['jordVendorServiceDescription']}
               </div>

           </div>



       {elseif $details['cmpServiceCat'] eq 'Rock'}



           <div class="row">
               <div class="col-xs-2">
                   <label class="control-label">SQ . Ft.</label>
                {$details.jordSquareFeet}
               </div>
               <div class="col-xs-3">
                   <label class="control-label">Depth In inches</label>
                   {$details.jordDepthInInches}
               </div>
               <div class="col-xs-2">
                   <label class="control-label">Tons</label>
                    {$details.jordTons}
               </div>
               <div class="col-xs-2">
                   <label class="control-label">Loads</label>
                 {$details.jordLoads}
               </div>

           </div>
           <br/>

       {elseif $details['cmpServiceCat'] eq 'Seal Coating'}


           <!-- row -->
           <div class="row">
               <div class="col-xs-3">
                   <label class="control-label">Yield</label>
                {$details['jordYield']}
               </div>

               <div class="col-xs-3">
                   <label class="control-label">SQ. FT.</label>
                 {$details['jordSquareFeet']}

               </div>

           </div>
           <br/>

           <div class="row" >
               <div class="col-xs-3">
                   <label class="control-label"> Oil Spot Primer (gals)</label>
                {$details['jordPrimer']}
               </div>
               <div class="col-xs-3">
                   <label class="control-label">Fast Set (gals)</label>

                   {$details['jordFastSet']}
               </div>
               <div class="col-xs-3">
                   <label class="control-label">Phases</label>

                   {$details['jordPhases']}
               </div>





           </div>
           <br/>
           <div class="row" >
               <div class="col-xs-3">
                   <label class="control-label">Materials Needed</label>
               </div>
               <div class="col-xs-2">
                   <label class="control-label">Sealer</label>
                 {$details['jordSealer']}
               </div>
               <div class="col-xs-2">
                   <label class="control-label">Sand</label>
                   {$details['jordSand']}
               </div>
               <div class="col-xs-2">
                   <label class="control-label">Additive</label>
                   {$details['jordAdditive']}
               </div>

           </div>
           <br/>



      {elseif $details['cmpServiceCat'] eq 'Striping'}



      {$details['cmpServiceCat']}

       {elseif $details['cmpServiceCat'] eq 'Sub Contractor'}

           <div class="row" >
               <div class="col-xs-3">
                   <label class="control-label">Sub Contractor</label>
                   <h4>{$details['subfirstname']} {$details['sublastname']}</h4>
               </div>
               <div class="col-xs-6">
                   <label class="control-label">Description</label>
                    {$details['jordVendorServiceDescription']}
               </div>

           </div>

       {elseif $details['cmpServiceCat'] eq 'Paver Brick'}

           <br />
           <div class="row" >
               <div class="col-xs-2">
                   <label class="control-label">SQ. Ft.</label>
                {$details['jordSquareFeet']}
               </div>
               <div class="col-xs-2">
                   <label class="control-label">Excavate Tons</label>
                    {$details['jordTons']}
               </div>

               <div class="col-xs-5">
                   <label class="control-label">Job Description</label>
                   {$details['jordVendorServiceDescription']}
               </div>
           </div>

       {elseif $details['cmpServiceCat'] eq 'Drainage and Catchbasins'}

           <br />
           <div class="row" >
               <div class="col-xs-3">
                   <label class="control-label">Number of Catch Basins</label>
                {$details['jordAdditive']}
               </div>
               <div class="col-xs-6">
                   <label class="control-label">Job Description</label>
                   {$details['jordVendorServiceDescription']}
               </div>
           </div>
       {else}
           xxxxxxxxxxxxxxxxxxxxxxxxxxxxx    ALERT:UNKNOWN SERVICE    xxxxxxxxxxxxxxxxxxxxxxxxxxxxx

       {/if}




       <!-- row -->



       <br />

     {IF $vehicles}
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


                   {foreach $vehicles as $data}
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-xs-3">
                               {$data['POVvehicleName']}
                           </div>

                           <div class="col-xs-2">
                               {$data['POVNumber']}
                           </div>

                       </div>
                  {/foreach}
     {/IF}

               <!-- begin row -->

     {IF $equipment}
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

                   {foreach $equipment as $data}
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-xs-3">
                               {$data['POequipName']}
                           </div>

                           <div class="col-xs-2">
                               {$data['POequipNumber']}
                           </div>


                       </div>

                   {/foreach}

       {/IF}




   {IF $labor}

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

                   {foreach $labor as $data}
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-xs-3">
                               {$data['POlaborName']}
                           </div>

                           <div class="col-xs-2">
                               {$data['POlaborNumber']}
                           </div>


                       </div>

                   {/foreach}
      {/IF}


      {IF $other}
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

                       {foreach $other as $data}
                           <!-- begin row -->
                           <div class="row" >
                               <div class="col-xs-3">
                                   {$data['jobcostTitle']}
                               </div>

                               <div class="col-xs-6">
                                   {$data['jobcostDescription']}
                               </div>
                           </div>

                       {/foreach}
      {/IF}



      {IF $subs}
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

                   {foreach $subs as $data}
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-xs-4">
                               {$data['cntFirstName']} {$data['cntLastName']}
                           </div>

                           <div class="col-xs-5">
                               {$data['posubDescription']}
                           </div>

                       </div>

                 {/foreach}
      {/IF}

       <br/>


       <br/>


       <!-- begin row -->
       <div class="row" >
           <div class="col-xs-4">

       <b>Special instructions: </b>
                   {$details['cmpProposalTextAlt']}
           </div>

           <div class="col-xs-5">
                   <b>Instrucciones especiales:</b>
                   {$details['cmpProposalTextAltES']}
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
                       {if $details['cmpServiceCat'] eq 'Asphalt'}

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

                {elseif $details['cmpServiceCat'] eq 'Concrete'}

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

                {/if}
           </div>

       </div>

       </div>


    </td>
</table>