<table><td valign="top" style="text-align:top;padding:10px;">
        <br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="{$SITE_URL}crm/editEmployee/{$id}">Basic Information</a>
        <br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="{$SITE_URL}crm/employeeNotes/{$id}">Notes/Reminders</a>
        <br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="{$SITE_URL}reports/ProfileToPDF/{$id}">Print Profile</a>

    </td><td  valign="top"  style="text-align:top;padding:10px;">
        {IF $USER_ROLE = 1}
<br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="{$SITE_URL}tasks/addtask/{$id}">Add Task</a>
{/IF}
        <br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="{$SITE_URL}messages/myMessages/{$id}">Send Message</a>
<!--
<br /><span class="fa fa-arrow-circle-right" ></span>&nbsp;<a  href="{$SITE_URL}comingsoon/{$id}">Upload Image</a>
-->
        <br /><span class="fa fa-arrow-circle-o-down" ></span>&nbsp;<a  href="Javascript:HideControls();">Close</a>
</td></table><br />
