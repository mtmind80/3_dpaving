<table><td valign="top" style="text-align:top;padding:10px;">
{IF $USER_ROLE eq 1 OR $USER_ROLE eq 6}
<br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="{$SITE_URL}workorders/WOSchedule/{$id}/{$sid}">Schedule Service</a>
{/IF}

<br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="{$SITE_URL}workorders/WOChecklistP/{$id}/{$sid}">Pre-Day Checklist</a>
<br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="{$SITE_URL}workorders/WOChecklistE/{$id}/{$sid}">End of Day Checklist</a>

</td><td  valign="top"  style="text-align:top;padding:10px;">
{IF $USER_ROLE eq 1 OR $USER_ROLE eq 6}
    <br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="{$SITE_URL}workorders/WOManagers/{$id}/{$sid}">Assign Managers</a>
{/IF}
<br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="Javascript:AREYOUSURE('{$SITE_URL}workorders/WOServiceCompleted/{$id}/{$sid}','You are about to close out this service and mark it as completed.\nAre you sure?')">Mark Completed</a>
<br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="{$SITE_URL}workorders/WOServiceDetail/{$id}/{$sid}">View Service Details</a>
<br /><span class="fa fa-arrow-circle-o-down" ></span>&nbsp;<a  href="Javascript:HideControls();">Close</a>
</td></table><br />
