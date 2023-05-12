
    <!-- begin row -->
    <div class="row">
    <div class="col-sm-6" style='font-size:1.4EM;'>
           {$proposal.jobName}
    </div>
    <div class="col-sm-6">
        <span class='alert-info' style='font-size:1EM;float:right;'>Status: {$proposal.ordStatus}      </span>
    </div>

    </div>
       <!-- begin row -->
       <div class="row">
           <div class="col-sm-6">
               <div class="form-group no-margin-hr" style='font-size:1.2EM;'>
                    Created for: <a href="{$SITE_URL}crm/viewContact/{$proposal['clientid']}" target='client'>{$proposal.clientfirst} {$proposal.clientlast}</a>
                   <br />
                   Created Date:{$proposal.jobCreatedDateTime|date_format:"%A, %B %e, %Y"}
                   <br />
                   Created By:{$proposal.cntFirstName} {$proposal.cntLastName}

               </div>
           </div>

           <div class="col-sm-6">
               <div class="form-group no-margin-hr" style='font-size:1.2EM;'>
        Age:{$old}{$age} days old
    <br />
                   Last Contacted Date:{IF isset($lastContact['cnotCreatedDate'])}{$lastContact['cnotCreatedDate']|date_format:"%A, %B %e, %Y"}{/IF}
                   <br />
                   Last Contacted By:{IF isset($lastContact['Creator'])}{$lastContact['Creator']}{/IF}
                   <br />
                   Discount:{$proposal['jobDiscount']} %
               </div>
           </div>
<!--

           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   {IF $proposal.jobNTO}
                       <span class='alert-danger'>&nbsp; NTO : YES &nbsp;</span>
                   {ELSE}
                       <span class='alert-info'>&nbsp; NTO : NO &nbsp;</span>
                   {/IF}
                   <br />

                   {IF $proposal.jobPermit}
                       <span class='alert-danger'>&nbsp; Permit Required : YES &nbsp;</span>
                   {ELSE}
                       <span class='alert-info'>&nbsp; Permit Required : NO &nbsp;</span>
                   {/IF}
                   <br />

                   <span class='alert-info'>Status: {$proposal.ordStatus}      </span>
               </div>
           </div>
    -->
       </div>
       <!-- end  row -->
