{* admin list f services on wo *}

<script type="text/javascript">



    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


    });




    function ShowTools(username, id, sid)
    {

        {literal}
        HideControls();

        $.post( site_url + "workorders/showServiceTools/", { id: id , sid: sid, username: username})
                .done(function( data ) {
                    $('#DocManageLabel').html(username);
                    $('#ManagedContent').html(data);
                    $("#DocManage").css({left:mouseX,top:mouseY });
                    $('#DocManage').show();
                });
        {/literal}

    }

function Swoop(dURL)
{
    window.open(dURL, "MsgWindow", "width=600,height=600,scrollbars=yes");

}


</script>


<div class="panel">

<!--    <h4>List and Manage Job Services</h4>
  -->
    {include file='workorders/_workorderwizrdmenu.tpl'}

   <div class="panel-body">
       {assign var="lead" value="Preview For "}
       {include file='workorders/_workorderheader.tpl'}


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
                   &nbsp;
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

                       <table><td valign="top" >
                               {IF $p.jordStatus eq 'COMPLETED' OR  $p.jordStatus eq 'CANCELLED'}

                               {ELSE}

                               {IF $USER_ROLE eq 1 OR $USER_ROLE eq 6 OR $USER_ROLE eq 2}{*admin,  office permits ok*}


                                   {IF $permits eq $permitscomplete}
                                            {IF !empty($p.jordStartDate)}
                                                <br /><a  href="{$SITE_URL}workorders/WOSchedule/{$p.jordJobID}/{$p.jordID}">Change Schedule</a>
                                             {ELSE}
                                                <br /><a  href="{$SITE_URL}workorders/WOSchedule/{$p.jordJobID}/{$p.jordID}">Schedule Service</a>
                                             {/IF}
                                   {ELSE}
                                              <span class="alert-danger"> Pending Permits </span>
                                   {/IF}
                                   <br /><a  href="{$SITE_URL}workorders/WOManagers/{$p.jordJobID}/{$p.jordID}">Assign Job Managers</a>

                                   <br /><a  href="{$SITE_URL}workorders/WOCustomInstructions/{$p.jordJobID}/{$p.jordID}">Custom Instructions</a>
                               {/IF}

                          
                                   {IF !empty($p.jordStartDate)}
                                        <br /><a  href="{$SITE_URL}workorders/WOChecklistP/{$p.jordJobID}/{$p.jordID}">Pre-Day Checklist</a>
                                      <br /><a  href="{$SITE_URL}workorders/WOChecklistE/{$p.jordJobID}/{$p.jordID}">End of Day Checklist</a>
                                       {IF $p.jordStatus eq 'SCHEDULED'}
                                            <br /><a  href="Javascript:AREYOUSURE('{$SITE_URL}workorders/WOServiceCompleted/{$p.jordJobID}/{$p.jordID}','You are about to close out this service and mark it as completed.\nAre you sure?')">Mark Completed</a>
                                       {/IF}
                                   {/IF}
                             
                            {/IF}
                               <br /><a  href="{$SITE_URL}workorders/WOServiceDetail/{$p.jordJobID}/{$p.jordID}">View Service Details</a>
 <!--                              <br /><a  href="{$SITE_URL}workorders/WOMediaSS/{$p.jordJobID}/{$p.jordID}" >Print Service Details</a> -->
                               {IF $USER_ROLE eq 1 AND $proposal['jobStatus'] eq 5 AND ($p.jordStatus eq 'COMPLETED' OR  $p.jordStatus eq 'CANCELLED')}
                                {*admin ope job again*}
                                       <br /><a  href="{$SITE_URL}workorders/rollbackService/{$p.jordJobID}/{$p.jordID}" >Rollback Service</a>

                               {/IF}
                               <br /><a href="{$SITE_URL}workorders/CreateWorkorderEmail/{$p.jordJobID}/{$p.jordID}">Create Workorder Email</a>
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
           <!-- begin row discount -->
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




