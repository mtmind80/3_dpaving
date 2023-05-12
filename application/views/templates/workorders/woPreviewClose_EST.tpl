{* Estimator close project or add cost LIKE SERVICE LIST ONLY FOR ESTIMATORS *}

<script type="text/javascript">


    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


    });


function Swoop(dURL)
{
    window.open(dURL, "MsgWindow", "width=600,height=600,scrollbars=yes");

}

    $.growl.notice({ message: "Add equipment, materials, labor, vehicles, other costs and send to billing." });

//    alert('Please verify equipment, materials, labor, vehicles and other costs . Add Any additional costs to the project and send to billing.');
</script>


<div class="panel">


   <div class="panel-body">
<h2>Closing Procedure
{IF $completeStatus eq true}
    <a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/woSendToBilling/{$proposal.jobID}','You are about to indicate that this job is closed, and all costs have been entered.\nAre you sure?');" class="pull-right btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-money"></span>Send To Billing</a>
    {/IF}
</h2>
       <ul>
           <li>Check each service to be sure all materials, vehicles, labor, materials and other costs have been recorded.</li>
            <li>Then click the "Send To Billing" button to close this project.</li>
           </ul>

       <div class="row panel">
           <div class=" col-sm-3">
               Service Name
           </div>
           <div class=" col-sm-2">
            Service Address
           </div>

           <div class=" col-sm-2">
         Status/Scehdule
           </div>

           <div class=" col-sm-3">
           Managers
           </div>
           <div class=" col-sm-2">
            Tools
           </div>
       </div>
       <!-- display all po -->

       {assign var="lc" value="0"}
       {assign var="ac" value="0"}
       {assign var="st" value="0"}
       {foreach $proposalDetails as $p}


           <!-- begin row -->
           <div class="row panel">
               <div class=" col-sm-3">
                   <a href='{$SITE_URL}/workorders/WOServiceDetail/{$p.jordJobID}/{$p.jordID}'>{$p.jordName}</a>
                   <br/>
                   Equipment:${$p.equipcost|number_format:2:".":","}
                   <br/>Vehicle:${$p.vehiclecost|number_format:2:".":","}
                   <br/>Materials:${$p.materialcost|number_format:2:".":","}
                   <br/>Labor: {$p.laborcost/3600} hrs.
                   <br/>Other Cost:${$p.othercost|number_format:2:".":","}
                   {$ac = $ac + $p.othercost + $p.materialcost + $p.vehiclecost + $p.equipcost}
                   {$lc = $lc + $p.laborcost}

               </div>


               <div class=" col-sm-2">
                   Location:
                   {IF $p['jordAddress1'] neq ''}
                       <a href="Javascript:showUserOnMap('{$p['jordName']}', '{$p['jordAddress1']} {$p['jordAddress2']} {$p['jordCity']}, {$p['jordState']}. {$p['jordZip']}');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                       <a href="https://www.google.com/#q={$p['jordAddress1']|replace:' ':'+'}+{$p['jordCity']|replace:' ':'+'}+{$p['jordState']}+{$p['jordZip']}" title="Directions" target="Drive"><span class=" icon fa fa-truck"></span></a> &nbsp;
                   {/IF}

                   <br/>

                   {$p.jordAddress1}
                   {$p.jordAddress2}
                   <br />{$p.jordCity},    {$p.jordState}.             {$p.jordZip}
                   <br />{$p.jordParcel}

               </div>
               <div class=" col-sm-2">
                   <span {IF $p.jordStatus eq 'COMPLETED'}
                       class="badge badge-light-green"
                           {ELSEIF $p.jordStatus eq 'NOT SCHEDULED'}
                       class="badge badge-danger"
                           {ELSE}
                       class="badge badge-info"
                           {/IF}>
                       {$p.jordStatus}</span>

                   {IF $p.jordStartDate}
                   <br />Start:{$p.jordStartDate}
                   <br />End:{$p.jordEndDate}
                   {/IF}
               </div>

               <div class=" col-sm-3">
                   {$p.manager1firstname} {$p.manager1lastname}
                   <br />{$p.manager2firstname} {$p.manager2lastname}

               </div>
               <div class=" col-sm-2">
                       <table class="table-responsive"><td valign="top" >
                               <br /><a  href="Javascript:Swoop('{$SITE_URL}workorders/WOServiceDetailView/{$p.jordJobID}/{$p.jordID}');" >Print Service Details</a>
                               <br /><a  href="{$SITE_URL}workorders/WOMediaEST/{$p.jordJobID}/{$p.jordID}" >Upload Media</a>
                               <br /><a  href="{$SITE_URL}workorders/WOChecklistEST/{$p.jordJobID}/{$p.jordID}" >Add Cost</a>
                           </td></table>
               </div>

           </div>



               {$st = $st + $p.jordCost}

       {/foreach}
  {IF $USER_ROLE eq 1 OR $USER_ROLE eq 6}{*admin,  office can see cost*}

       <!-- begin row -->
       <div class="row panel">
           <div class=" col-sm-3">
            Proposal Estimate $ {$st|number_format:2:".":","}
           </div>

       </div>
       {assign var="pd" value = $proposal.jobDiscount}
       {assign var="da" value=0}

           {IF $pd gt 0 AND $st gt 0}
               {$da = ($pd * $st) / 100}
               {$st = $st - $da}
               <!-- begin row -->
               <div class="row panel">
                   <div class=" col-sm-3">
                       Discount {$pd} %  &nbsp; <span style='color:red;'>(-{$da|money_format:2})</span>
                   </div>

               </div>
               <!-- begin row -->
               <div class="row panel">
                   <div class=" col-sm-3">
                       Grand Total $ {$st|money_format:2}
                   </div>

               </div>
           {/IF}
           <!-- begin row -->
       <div class="row panel">
           <div class=" col-sm-3">
               Total Costs $ {$ac|number_format:2:".":","}
           </div>

       </div>

       <!-- begin row -->
       <div class="row panel">
           <div class=" col-sm-3">
               Total Labor {$lc/3600} hrs.
           </div>

       </div>
{/IF}

   </div>

        </div>




