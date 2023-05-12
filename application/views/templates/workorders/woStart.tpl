<script type="text/javascript">

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


</script>


<div class="panel">

    {include file='workorders/_workorderwizrdmenu.tpl'}

   <div class="panel-body">




   <div id="Proposalheader">
       <h2> <span  class="fa fa-truck" style="background:{$services.catcolor};">&nbsp;</span>{$details.jordName} {IF $details.jordStatus eq "COMPLETED"}<span class='alert-info'>COMPLETED</span>{/IF}</h2>
   </div>

   <!-- begin row -->

       <div class="row panel"  style='border:1px #000000 solid;'>

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
               <div class="col-sm-7">
                   <strong>PROPOSAL:</strong>
                   {$details.jordProposalText}
               </div>           </div>
           <!-- row -->
       </div>





   <div class="row panel">

       <!-- row -->
       <form action="{$SITE_URL}workorders/WOLetter/2/{$pid}/1"  name="zdataform" id="zdataform" class="panel" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">
           <input type="hidden" name="startdate" id="startdate" value="{$details['jordStartDate']|date_format:"%A, %B %e, %Y"}">
           <div class="row" style="background:#eeffee">
               <h4>Start Of Service Notification</h4>
           </div>


           <!-- begin row -->
           <div class="row">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Client Name</label>
                       <input type="text" id="clientname" name="clientname" class="form-control"  value="{$proposal['jobPrimaryContact']}">
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Community/Development</label>
                       <input type="text" id="communityname" name="communityname" class="form-control"  value="{$proposal['clientfirst']} {$proposal['clientlast']}">
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Location</label>
                       <input type="text" id="location" name="location" class="form-control"  value="{$proposal['jobAddress1']} {$proposal['jobAddress2']}">
                   </div>
               </div>

           </div>
           <!-- row -->


           <!-- begin row -->
           <div class="row">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">City</label>
                       <input type="text" id="city" name="city" class="form-control"  value="{$proposal['jobCity']}">
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Sent By Manager</label>
                       <input type="text" id="manager" name="manager" class="form-control"  value="{$proposal['managerfirst']} {$proposal['managerlast']}">
                   </div>
               </div>


           </div>
           <!-- row -->

           <!-- begin row -->
           <div class="row">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Manager Email</label>
                       <input type="text" id="manageremail" name="manageremail" class="form-control"  value="{$proposal['manageremail']}">
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Manager Phone </label>
                       <input type="text" id="managerphone" name="managerphone" class="form-control"   value="{$proposal['managerphone']}">
                   </div>
               </div>

           </div>
           <!-- row -->


       <!-- begin row -->
       <div class="row" >

           <div class="col-sm-3" >
               <a href="Javascript:this.zdataform.submit();" class="btn btn-primary btn-labeled">Print Start Date Letter</a>
           </div>

           <div class="col-sm-3" >
               <a href="Javascript:CHECKITE(this.zdataform,1);" class="btn btn-primary btn-labeled">Email Start Date Letter</a>
           </div>
           <div class="col-sm-3"  id='letterlink'>
           </div>

       </div>


   </form>

</div>

   <div class="panel">

       Dear (clientname),
       <br/>
       <br />Please be advised that per our signed contract, we will be beginning work for
       (communityname) at
       (location) in
       (city) on
       (startdate).
       At this point I want to take this opportunity to ask several things of you:
       <br />
       <br />
       <ol>
           <li>Please make sure that your sprinkler systems near the work area are deactivated for the days we will be on site</li>
           <li>Please make sure that no landscaping is scheduled for the days we are on site</li>
           <li>Please make sure that the work area is clear of all obstructions, including customer/resident vehicles. Any vehicles left in the work area will be towed at owner’s expense</li>
       </ol>
       <br />
       If you have any questions or concerns, please don’t hesitate to contact me @
       (managerphone)
       or
       (manageremail)
       .
       <br />
       Sincerely,
       <br/><br />
       (manager), Project Manager
   </div>

   </div></div>
