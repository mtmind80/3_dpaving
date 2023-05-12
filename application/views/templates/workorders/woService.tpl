<script type="text/javascript">



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
                $( "#pdataform" ).attr("action", "{$SITE_URL}workorders/WOServiceDetailMail/{$pid}/{$sid}");
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
            var url = "{$SITE_URL}workorders/WOEMailLetter/2/{$pid}";
            var posting = $.post( url, $( "#zdataform" ).serialize() );
            posting.done(function( data ) {
                hideSpinner();
                var linktext = "<a target='mail' href='mailto:{$proposal['cntPrimaryEmail']}?subject=StartDate&body=" + encodeURIComponent(data) + "'>Send Email</a>";
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

</script>


<div class="panel">
{IF $USER_ROLE eq 4 OR  $USER_ROLE eq 5}
{ELSE}
    {include file='workorders/_workorderwizrdmenu.tpl'}
{/IF}
   <div class="panel-body">


   <div id="Proposalheader">
       <h2> <span  class="fa fa-truck" style="background:{$services.catcolor};">&nbsp;</span>{$details.jordName} {IF $details.jordStatus eq "COMPLETED"}<span class='alert-info'>COMPLETED</span>{/IF}</h2>

   </div>

   <!-- begin row -->

       <div class="row panel"  >

           <div class="row">

               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">
                       Client:{$proposal.clientfirst} {$proposal.clientlast}
                       <br />
                       Location:
                       {IF $details['jordAddress1'] neq ''}
                       <a href="Javascript:showUserOnMap('{$details['jordName']}', '{$details['jordAddress1']} {$details['jordAddress2']} {$details['jordCity']}, {$details['jordState']}. {$details['jordZip']}');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                       <a href="https://www.google.com/#q={$details['jordAddress1']|replace:' ':'+'}+{$details['jordCity']|replace:' ':'+'}+{$details['jordState']}+{$details['jordZip']}" title="Directions" target="Drive"><span class=" icon fa fa-truck"></span></a> &nbsp;
                       {/IF}

                       <br/>


                       {$details['jordAddress1']}
                       &nbsp;
                       {$details['jordAddress2']}
                       <br />
                       {$details['jordCity']},
                       {$details['jordState']}.
                       {$details['jordZip']}

                       <br />
                       Parcel: {$details['jordParcel']}
                       <br />
                       Start Date: {$details['jordStartDate']|date_format:"%A, %B %e, %Y"}

                       <br />
                       End Date: {$details['jordEndDate']|date_format:"%A, %B %e, %Y"}

                   </div>
               </div>
               <strong>ESTIMATORS NOTE: </strong>
               {$details.jordNote}

               <br/><br/>
               <strong>SERVICE: </strong>
               {$details.cmpProposalTextAlt}

           </div>
           <!-- row -->
       </div>



       <div class="row panel"  >



       <br />

       {* BEGIN SERVICES AREA *}
       {if $details['cmpServiceCat'] eq 'Asphalt'}



           {IF  $details.cmpServiceID eq 19}{* Milling *}
               <div class="row">
                   <div class="col-sm-3">
                       <label class="control-label">Size of project in SQ FT</label>
                       {$details.jordSquareFeet}
                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">Depth In Inches</label>
                       {$details.jordDepthInInches}
                       </div>
                   <div class="col-sm-3">
                       <label class="control-label">Days of Milling</label>
                       {$details.jordDays}
                   </div>

               </div>
               <br />
               <div class="row">

                   <div class="col-sm-3">
                       <label class="control-label">Locations</label>
                       {$details.jordLocations}
                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">SQ. Yards</label>
                       {$details.jordSQYards}
                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">Loads</label>
                        {$details.jordLoads}
                   </div>
               </div>




           {ELSE} {* all other asphalt types *}


               <br/>
               <div class="row">

                   <div class="col-sm-3">
                       <label class="control-label">Size of project in SQ FT</label>
                        {$details.jordSquareFeet}
                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">Depth In Inches</label>
                       {$details.jordDepthInInches}

                   </div>
                </div>
                <div class="row">

                   <div class="col-sm-3">
                       <label class="control-label">Locations</label>
                      {$details.jordLocations}
                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">SQ. Yards</label>
                       {$details.jordSQYards}
                   </div>

               </div>
               <div class="row">

                   <div class="col-sm-3">
                       <label class="control-label">Tons Asphalt</label>
                       {$details.jordTons}
                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">Tack</label>
                       Gallons
                   </div>

               </div>

           {/IF}



       {elseif $details['cmpServiceCat'] eq 'Concrete'}


           {IF $details.cmpServiceID < 12} {*curb mix*}
               <br/>

               <div class="row">
                   <div class="col-sm-5">
                       <label class="control-label">Length In Feet (linear feet)</label>
                       {$details.jordLinearFeet}
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Locations</label>
                       {$details.jordLocations}
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">CU YDS</label>
                       {$details.jordCubicYards} 
                   </div>
               </div>



           {ELSE} {*drum mix*}
               <br/>
               <div class="row">
                   <div class="col-sm-3">
                       <label class="control-label">Sq. Ft.</label>
                     {$details.jordSquareFeet}
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Depth (inches)</label>
                       {$details.jordDepthInInches}
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Locations</label>
                   {$details.jordLocations}
                   </div>

                   <div class="col-sm-2">
                       <label class="control-label">CU YDS</label>
                       {$details.jordCubicYards} 
                   </div>

               </div>
           {/IF}

       {elseif $details['cmpServiceCat'] eq 'Excavation'}


           <div class="row">
               <div class="col-sm-2">
                   <label class="control-label">Sq. Ft.</label>
                    {$details.jordSquareFeet}
               </div>
               <div class="col-sm-3">
                   <label class="control-label">Depth In inches</label>
                    {$details.jordDepthInInches}

               </div>
               <div class="col-sm-2">
                   <label class="control-label">Tons Excavation</label>
                   {$details.jordTons}
               </div>
               <div class="col-sm-2">
                   <label class="control-label">Loads</label>
                    {$details.jordLoads}
               </div>

           </div>

           <br/>


       {elseif $details['cmpServiceCat'] eq 'Other'}


           <div class="row">

               <div class="col-sm-8">
                   <label class="control-label">Description</label>
                   {$details['jordVendorServiceDescription']}
               </div>

           </div>



       {elseif $details['cmpServiceCat'] eq 'Rock'}



           <div class="row">
               <div class="col-sm-2">
                   <label class="control-label">SQ . Ft.</label>
                {$details.jordSquareFeet}
               </div>
               <div class="col-sm-3">
                   <label class="control-label">Depth In inches</label>
                   {$details.jordDepthInInches}
               </div>
               <div class="col-sm-2">
                   <label class="control-label">Tons Excavation</label>
                    {$details.jordTons}
               </div>
               <div class="col-sm-2">
                   <label class="control-label">Loads</label>
                 {$details.jordLoads}
               </div>

           </div>
           <br/>

       {elseif $details['cmpServiceCat'] eq 'Seal Coating'}


           <!-- row -->
           <div class="row">
               <div class="col-sm-3">
                   <label class="control-label">Yield</label>
                {$details['jordYield']}
               </div>

               <div class="col-sm-3">
                   <label class="control-label">SQ. FT.</label>
                 {$details['jordSquareFeet']}

               </div>

           </div>
           <br/>

           <div class="row" >
               <div class="col-sm-3">
                   <label class="control-label"> Oil Spot Primer (gals)</label>
                {$details['jordPrimer']}
               </div>
               <div class="col-sm-3">
                   <label class="control-label">Fast Set (gals)</label>

                   {$details['jordFastSet']}
               </div>
               <div class="col-sm-3">
                   <label class="control-label">Phases</label>

                   {$details['jordPhases']}
               </div>





           </div>
           <br/>
           <div class="row" >
               <div class="col-sm-3">
                   <label class="control-label">Materials Needed</label>
               </div>
               <div class="col-sm-2">
                   <label class="control-label">Sealer (gals)</label>
                 {$details['jordSealer']}
               </div>
               <div class="col-sm-2">
                   <label class="control-label">Sand (lbs) </label>
                   {$details['jordSand']}
               </div>
               <div class="col-sm-2">
                   <label class="control-label">Additive (gals)</label>
                   {$details['jordAdditive']}
               </div>

           </div>
           <br/>



      {elseif $details['cmpServiceCat'] eq 'Striping'}



      {$details['jordProposalText']}

       {elseif $details['cmpServiceCat'] eq 'Sub Contractor'}

           <div class="row" >
               <div class="col-sm-3">
                   <label class="control-label">Sub Contractor</label>
                   <h4>{$details['subfirstname']} {$details['sublastname']}</h4>
               </div>
               <div class="col-sm-6">
                   <label class="control-label">Description</label>
                    {$details['jordVendorServiceDescription']}
               </div>

           </div>

       {elseif $details['cmpServiceCat'] eq 'Paver Brick'}

           <br />
           <div class="row" >
               <div class="col-sm-2">
                   <label class="control-label">SQ. Ft.</label>
                {$details['jordSquareFeet']}
               </div>
               <div class="col-sm-2">
                   <label class="control-label">Excavate Tons</label>
                    {$details['jordTons']}
               </div>

               <div class="col-sm-5">
                   <label class="control-label">Job Description</label>
                   {$details['jordVendorServiceDescription']}
               </div>
           </div>

       {elseif $details['cmpServiceCat'] eq 'Drainage and Catchbasins'}

           <br />
           <div class="row" >
               <div class="col-sm-3">
                   <label class="control-label">Number of Catch Basins</label>
                {$details['jordAdditive']}
               </div>
               <div class="col-sm-6">
                   <label class="control-label">Job Description</label>
                   {$details['jordVendorServiceDescription']}
               </div>
           </div>
       {else}
           xxxxxxxxxxxxxxxxxxxxxxxxxxxxx    ALERT:UNKNOWN SERVICE    xxxxxxxxxxxxxxxxxxxxxxxxxxxxx

       {/if}


       <!-- row -->


       <!-- begin vehicles -->
       <br />

     {IF $vehicles}

                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-3">

                               Vehicles
                           </div>
                           <div class="col-sm-2">
                               Quantity
                           </div>
                           {IF $USER_ROLE <= 3 }
                           <div class="col-sm-2">
                               Days
                           </div>
                           <div class="col-sm-2">
                               Hours
                           </div>
                      {/IF}
                       </div>


                   {foreach $vehicles as $data}
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-sm-3">
                               {$data['POVvehicleName']}
                           </div>

                           <div class="col-sm-2">
                               {$data['POVNumber']}
                           </div>
                           {IF $USER_ROLE <= 3 }
                           <div class="col-sm-2">
                               {$data['POVDaysNeeded']}
                           </div>

                           <div class="col-sm-2">
                               {$data['POVHoursDay']}
                           </div>
                            {/IF}

                       </div>
                  {/foreach}
     {/IF}

               <!-- begin row -->

     {IF $equipment}
            <br />
                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-3">

                               Equipment
                           </div>
                           <div class="col-sm-2">
                               Quantity
                           </div>
                           {IF $USER_ROLE <= 3 }
                           <div class="col-sm-2">
                               Days
                           </div>
                           <div class="col-sm-2">
                               Hours
                           </div>
                    {/IF}
     </div>

                   {foreach $equipment as $data}
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-sm-3">
                               {$data['POequipName']}
                           </div>

                           <div class="col-sm-2">
                               {$data['POequipNumber']}
                           </div>
                           {IF $USER_ROLE <= 3 }
                           <div class="col-sm-2">
                               {$data['POequipDaysNeeded']}
                           </div>

                           <div class="col-sm-2">
                               {$data['POequipHoursDay']}
                           </div>
                            {/IF}
                       </div>

                   {/foreach}

       {/IF}


       <!-- labor sections -->



   {IF $labor}
       <br />

                       <!-- begin row -->
                       <div class="row" >
                           <div class="col-sm-3">

                               Labor
                           </div>
                           <div class="col-sm-2">
                               Quantity
                           </div>
                           {IF $USER_ROLE <= 3 }
                           <div class="col-sm-2">
                               Days
                           </div>
                           <div class="col-sm-2">
                                   Hours
                           </div>
                           {/IF}
                       </div>

                   {foreach $labor as $data}
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-sm-3">
                               {$data['POlaborName']}
                           </div>

                           <div class="col-sm-2">
                               {$data['POlaborNumber']}
                           </div>
                           {IF $USER_ROLE <= 3 }
                           <div class="col-sm-2">
                               {$data['POlaborDaysNeeded']}
                           </div>

                           <div class="col-sm-2">
                               {$data['POlaborHoursDay']}
                           </div>
                            {/IF}
                       </div>

                   {/foreach}
      {/IF}


      {IF $other}
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

                       {foreach $other as $data}
                           <!-- begin row -->
                           <div class="row" >
                               <div class="col-sm-3">
                                   {$data['jobcostTitle']}
                               </div>

                               <div class="col-sm-6">
                                   {$data['jobcostDescription']}
                               </div>
                           </div>

                       {/foreach}
      {/IF}

       <!-- sub contractor sections -->


      {IF $subs}
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

                   {foreach $subs as $data}
                       <!-- begin row -->
                       <div class="row" >

                           <div class="col-sm-4">
                               {$data['cntFirstName']} {$data['cntLastName']}
                           </div>

                           <div class="col-sm-5">
                               {$data['posubDescription']}
                           </div>

                       </div>

                 {/foreach}
      {/IF}


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

   <form action="{$SITE_URL}reports/WOToPDFSS/{$pid}/{$sid}"  name="pdataform" id="pdataform"  method="POST">
       <input type="hidden" name="pid" id="pid" value="{$pid}">
       <input type="hidden" name="UseEmail" id="UseEmail" value="0">

       <a id='PrintMe'  href="#" class="btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-print"></span>  Print Service With Selected Images</a>
&nbsp;
       <a id='EmailMe'  href="#" class="btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-envelope"></span>  Email Service With Selected Images</a>
<input type='TEXT' name="sendto" id="sendto" value="{$USER_EMAIL}">
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
               {assign var=odd value='odd gradeA'}
               {assign var=even value='even gradeA'}
               {foreach $medialist as $d}
                   {IF $d.jobmdisImage}
                       <tr class="{cycle values="$odd,$even"}">
                           <td>
                               <input type='checkbox' class='checkboxall' name='upload_{$d.jobmdId}' id='upload_{$d.jobmdId}' value ='{$d.jobmdId}'>
                           </td>
                           <td class="text-left">
                               <span class="alert-success">Description:</span> {$d.jobmdDescription}
                               <br/>
                               {$d['jordName']|default:'Entire Proposal'}
                               <br/>
                               {$d.PODocTypeName} <a href='{$SITE_URL}media/projects/{$d.jobmdFileName }' title="View Document" target='view'>View Upload</a>
                           </td>
                           <td>{$d.uploader}<br/>
                               {$d.jobmdCreatedDateTime|date_format:"%A %B %d,  %Y"}</td>
                       </tr>
                   {/IF}

               {/foreach}



               </tbody>
           </table>
       </div>
   </form>

{IF $USER_ROLE eq 4 OR  $USER_ROLE eq 5}
   <a class="btn btn-success" href="{$SITE_URL}workorders/WOMediaJM/{$details.jordJobID}/{$details.jordID}"><span class="btn-label icon fa fa-camera"></span> Add Media</a>
   <a class="btn btn-success" href="{$SITE_URL}workorders/WOChecklistPJM/{$details.jordJobID}/{$details.jordID}"><span class="btn-label icon fa fa-check"></span> Pre-Day Checklist</a>
   <a class="btn btn-success" href="{$SITE_URL}workorders/WOChecklistEJM/{$details.jordJobID}/{$details.jordID}"><span class="btn-label icon fa fa-list-alt"></span> End of Day Report</a>
   {IF $details.jordStatus neq "COMPLETED"}
   <a class="btn btn-success" href="Javascript:AREYOUSURE('{$SITE_URL}workorders/WOServiceCompletedJM/{$p.jordJobID}/{$p.jordID}','You are about to close out this service and mark it as completed.\nAre you sure?')"><span class="btn-label icon fa fa-edit"></span> Mark Completed</a>
    {/IF}
{/IF}
   </div></div>
