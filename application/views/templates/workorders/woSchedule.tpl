
<script type="text/javascript">

    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });
        $('#ba-datepicker-component').datepicker({
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

        if(form.jordAddress1.value == '')
        {
            alert('You must enter a value for address');
            form.jordAddress1.focus();
            return false;
        }

        return true;

    }

</script>


<div class="panel">

    {include file='workorders/_workorderwizrdmenu.tpl'}

   <div class="panel-body">

   <div id="Proposalheader">
       <h2>LOCATION AND SCHEDULE: {$details.jordName}</h2>
   </div>
   <!-- begin row -->

       <div class="row panel"  style='border:1px #000000 solid;'>

           <div class="row">

               <div class="col-sm-4">
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
               <div class="col-sm-5">
                   <strong>PROPOSAL:</strong>
                   {$details.jordProposalText}
               </div>
           </div>
           <!-- row -->


       </div>
{if $permitsnotapproved gt 0}
You cannot schedule this service until all permits are approved.<br/>
    <a href='{$SITE_URL}/workorders/WOPermits/{$pid}'>Click Here</a>
{else}


       <div class="row panel"  style='border:1px #000000 solid;'>
       <form action="{$SITE_URL}workorders/saveWOSchedule/{$pid}/{$sid}"  name="adataform" id="adataform"  method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="sid" id="sid" value="{$sid}">
           <input type="hidden" name="pid" id="pid" value="{$pid}">

           <h3>Service Location</h3>
        <div class="row">
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Start Date</label>
                       <div class="input-group date" id="bs-datepicker-component">
                           <input type="text" id="jordStartDate" name="jordStartDate"
                                  class="form-control" value='{$details['jordStartDate']|date_format:"%m/%d/%Y"}'>
                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                       </div>
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">End Date</label>
                       <div class="input-group date" id="ba-datepicker-component">
                           <input type="text" id="jordEndDate" name="jordEndDate"
                                  class="form-control" value='{$details['jordEndDate']|date_format:"%m/%d/%Y"}'>
                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                       </div>
                   </div>
               </div>

        </div>

        <div class="row">

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Address Line 1</label>
                       <input type="text" id="jordAddress1" name="jordAddress1" class="form-control" size="45" value="{$details['jordAddress1']}">
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Address line 2</label>
                       <input type="text" id="jordAddress2" name="jordAddress2" class="form-control"  size="45" value="{$details['jordAddress2']}">
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Parcel number</label>
                       <input type="text" id="jordParcel" name="jordParcel" class="form-control" size="45" value="{$details['jordParcel']}">
                   </div>
               </div>
        </div>
           <!-- row -->
           <!-- begin row -->
           <div class="row">
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">City</label>
                       <input type="text" id="jordCity" name="jordCity" class="form-control" value="{$details['jordCity']}">
                   </div>
               </div>
               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> State</label>
                       <select id="jordState" name="jordState" class="form-control" >
                           <option value="{$details['jordState']}">{$details['jordState']}</option>
                           {$states}
                       </select>
                   </div>
               </div>

               <div class="col-sm-3">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Zip Code</label>
                       <input type="text" id="jordZip" name="jordZip" class="form-control" value="{$details['jordZip']}">
                   </div>
               </div>

           </div>
           <!-- buton row -->
           <div class="row">
               <div class="col-sm-3">
                   <a href="Javascript:CHECKIT(this.adataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
               </div>

           </div>
           <!-- end services form -->
           </form>


       </div>
{/if}

   </div>
   </div>








