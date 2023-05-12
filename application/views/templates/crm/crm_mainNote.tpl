
<div class="page-header">
    <div class="row">
        <!-- Page header, center on small screens  fa-clipboard -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-group page-header-icon"></i>&nbsp;&nbsp;Contact Manager</h1>
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <hr class="visible-xs no-grid-gutter-h">
                <!-- "Create project" button, width=auto on desktops -->
                <div class="pull-right col-xs-12 col-sm-auto">
                    <a class="btn btn-primary btn-labeled" href="{$SITE_URL}crm/showCRMList"><span class="btn-label icon fa fa-male"></span> List Contacts</a>
                    <a href="{$SITE_URL}crm/select/" class="btn btn-primary btn-labeled" ><span class="btn-label icon fa fa-plus"></span>New Contact</a>
                </div>
                <!-- Margin -->
                <div class="visible-xs clearfix form-group-margin"></div>
                <!-- Search field
                <form action="{$SITE_URL}comingsoon" method="post" class="pull-right col-xs-12 col-sm-6">
                    <div class="input-group no-margin"> <span class="input-group-addon" style="border:none;background: #fff;background: rgba(0,0,0,.05);"><i class="fa fa-search"></i></span>
                        <input type="text" name="search" placeholder="Search..." class="form-control no-padding-hr" style="border:none;background: #fff;background: rgba(0,0,0,.05);">
                    </div>
                </form>
                -->
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-8">

        {if isset($CONTENT)}
            {include file = $CONTENT}
        {else}
            CRM here
        {/if}


    </div>
    <div class="col-sm-4 bordered " >
        <div id="infomsg" style='min-height:80px;text-align:justify;'><h3>Possible Matches</h3>

        </div>

        <div id="managers" style='min-height:80px;text-align:justify;'>

        {if $managers}
            <h4>Current Related Contacts</h4>
            <span style='font-size:1EM;'><i>*click to edit contact</i></span>
        {foreach $managers as $manage}
            <p>
            <a title="Edit This Contact" href="{$SITE_URL}crm/editContact/{$manage['cntId']}">{$manage['cntFirstName']} {$manage['cntMiddleName']} {$manage['cntLastName']}</a>
              <!--
                {if $manage['cntPrimaryAddress1'] neq ''}<br/>{$manage['cntPrimaryAddress1']}{/if}
                {if $manage['cntPrimaryPhone'] neq ''}<br/>{$manage['cntPrimaryPhone']}{/if}
                {if $manage['cntPrimaryEmail'] neq ''}<br/>{$manage['cntPrimaryEmail']}{/if}
                -->
                {if $manage['ccatName'] neq ''}<br/><span class="alert-info">{$manage['ccatName']}</span>{/if}

                <!--
                 <br/>
            <a href="{$SITE_URL}crm/unlinkManager/{$cid}/{$manage['cntId']}">Un-Link</a>
            -->
            </p>
        {/foreach}
        {/if}

            {if $properties}
                <h4>Related Properties</h4>
                <i>*click to create proposal</i>
                {foreach $properties as $manage}
                    <p>
                        <a title="Start New Proposal" href="{$SITE_URL}workorders/startProposal/{$cid}/{$manage['cntId']}">{$manage['cntFirstName']} {$manage['cntMiddleName']} {$manage['cntLastName']}</a>
                        {if $manage['cntPrimaryAddress1'] neq ''}<br/>{$manage['cntPrimaryAddress1']}{/if}
  <!--                      {if $manage['cntPrimaryPhone'] neq ''}<br/>{$manage['cntPrimaryPhone']}{/if}
                        {if $manage['cntPrimaryEmail'] neq ''}<br/>{$manage['cntPrimaryEmail']}{/if}
      -->
                        <br/>
                        <ul>
                    <li><a title="Start New Proposal" href="{$SITE_URL}workorders/startProposal/{$cid}/{$manage['cntId']}">Start Proposal</a></li>
                    <li><a title="Edit Property" href="{$SITE_URL}crm/editContact/{$manage['cntId']}">Edit Property</a></li>
                    </ul>
                    </p>
                {/foreach}
            {/if}

        </div>
    </div>


</div>

