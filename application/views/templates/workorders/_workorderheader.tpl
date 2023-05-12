<div id="Proposalheader">
    {if !isset($lead)}{assign var="lead" value=""}{/if}
           <h3>{$lead} {$proposal.jobName} </h3>
       </div>
       <!-- begin row -->
       <div class="row">
           <div class="col-sm-4">
               <div class="form-group no-margin-hr" style='font-size:1.2EM;'>
    Created for: <a href="{$SITE_URL}crm/viewContact/{$proposal['clientid']}" target='client'>{$proposal.clientfirst} {$proposal.clientlast}</a>
                   <br />
                   Created Date:{$proposal.jobCreatedDateTime|date_format:"%A, %B %e, %Y"}
                   <br />
                   Created By:{$proposal.cntFirstName} {$proposal.cntLastName}

               </div>
           </div>

           <div class="col-sm-4">
               <div class="form-group no-margin-hr" style='font-size:1.2EM;'>
                   {$proposal.jobAddress1} {$proposal.jobAddress1}
                   <br />
                   {$proposal.jobCity}, {$proposal.jobState}. {$proposal.jobZip}
               </div>
           </div>
           {assign var="permitsok" value=0 scope="global"}

           <div class="col-sm-4">
               <div class="form-group no-margin-hr">
                   {IF $proposal.jobMOT}
                       <span class='alert-danger'>&nbsp; MOT : YES &nbsp;</span>
                       {IF $proposal.jobMOTSentBy neq 0}
                           Sent:{$proposal.jobMOTSentDatetime|date_format:"%A, %B %e, %Y"}
                           {/IF}
                   {ELSE}
                       <span class='alert-info'>&nbsp; MOT : NO &nbsp;</span>
                   {/IF}
                   <br />
                   {IF $proposal.jobNTO}
                       <span class='alert-danger'>&nbsp; NTO : YES &nbsp;</span>
                   {IF $proposal.jobNTOSentBy neq 0}
                       Sent:{$proposal.jobNTOSentDatetime|date_format:"%A, %B %e, %Y"}
                   {/IF}
                   {ELSE}
                       <span class='alert-info'>&nbsp; NTO : NO &nbsp;</span>
                   {/IF}
                   <br />

                   {IF $proposal.jobPermit eq 1}
                       <span class='alert-danger'>&nbsp; Permit Required : YES &nbsp;</span>
                       {IF $permits gt 0}
                       {* we require permits and have some are they all completed*}
                           {IF $permits eq $permitscomplete}
                                {$permitsok = 1 scope="global"} - COMPLETED
                            {ELSE}
                               - INCOMPLETE
                           {/IF}
                           <br/>Permits;{$permits}
                           <br/>Permits Completed:{$permitscomplete}
                       {ELSE}
                           - No Permits found
                       {/IF}
                   {ELSE}
                       <span class='alert-info'>&nbsp; Permit Required : NO &nbsp;</span>
                       {$permitsok = 1 scope="global"}
                   {/IF}

                   <br />

                   <span {IF $proposal.jobStatus eq 6}class="badge badge-light-green" {ELSEIF $proposal.jobStatus eq 7} class="badge badge-danger" {ELSE} class="badge badge-info"  {/IF}>{$proposal.ordStatus}</span>
               </div>
           </div>
       </div>
       <!-- end  row -->
