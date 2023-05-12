
<script type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.cnotNote.value == '')
        {
            alert('You must enter a note');
            form.cnotNote.focus();
            return false;
        }


        return true;

    }
   </script>

<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<script>
    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" }
        }  );
        //$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });



</script>


<div class="panel" >
<div class="panel-heading">

        <h2>Notes:{$user['cntFirstName']} {$user['cntLastName']}</h2>
    {$user['ccatName']}<br/>
    <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>

    {* I am a property with a parent*}
    {if $user['cntcid'] eq 9 AND $user['cntCompanyId'] > 0}
        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/startProposal/{$user['cntCompanyId']}/{$user['cntId']}"><span class="btn-label icon fa fa-plus"></span> New Proposal</a>
    {/if}
</div>
    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/editContact/{$id}'><span class="wizard-step-description">Basic Information &nbsp; &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='{$SITE_URL}crm/additionalInformation/{$id}'><span class="wizard-step-description" >Connections &nbsp; &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/catandservice/{$id}'><span class="wizard-step-description">Categories and Services &nbsp; &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/crmNotes/{$id}'><span class="wizard-step-description" style="color: #000000;">Notes</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/viewContact/{$id}'><span class="wizard-step-description">Profile</span></a> </span> </li
                    >
            <li>
            <!-- ! Remove space between elements by dropping close angle 
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/crmSetClientReminder/{$id}'><span class="wizard-step-description" >Schedule A Client Reminder</span></a> </span> </li
                >
                
            <li>
            <!-- ! Remove space between elements by dropping close angle 
                <span class="wizard-step-number">7</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/crmSetJobReminder/{$id}'><span class="wizard-step-description">Schedule A Job Reminder</span></a> </span> </li
                >-->
        </ul>
    </div>
<div class="panel-body">
    {IF $edit}

    <form action="{$SITE_URL}crm/saveCRMNote/{$id}/{$note_id}"  name="userform" id="dataform" class="panel" method="POST">

        <input type="hidden" name="cntId" id="cntId" value="{$id}">
        <input type="hidden" name="cnotId" id="cnotId" value="{$note_id}">
        <!-- begin row -->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Note</label>
                    <textarea rows="3" id="cnotNote" name="cnotNote" class="form-control">{$edit['cnotNote']}</textarea>
                </div>
            </div>
        </div>
        <!-- row -->

        <!-- begin row -->
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Set Reminder</label>
                    <input type="checkbox"  id="cnotReminder" name="cnotReminder" value="1" class="checkbox-inline"  {IF $edit['cnotReminder']} checked {/IF}>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Reminder Date</label>
                    <div class="input-group date" id="bs-datepicker-component">
                        <input type="text" id="cnotReminderDate" name="cnotReminderDate" value="{$edit['cnotReminderDate']|date_format:"%m/%d/%Y"}"
                               class="form-control">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
            
             <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Share Note With Customer</label>
                  <input type="checkbox" id="cnotSendNote" name="cnotSendNote" value="1" class="checkbox-inline">
                </div>
        </div>
            
        <div class="col-sm-3">
              <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="{$userInfo['USER_EMAIL']}" class="checkbox-inline">
              <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="{$user['cntPrimaryEmail']}" class="checkbox-inline">
        </div>

        </div>
        <!-- row -->

    <!-- buton row -->
    <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Note</a>
        </div>
        <div class="col-sm-2">
        <a href="{$SITE_URL}crm/employeeList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
    </div>
    </form>

    {ELSE}
<form action="{$SITE_URL}crm/saveCRMNote/{$id}"  name="dataform" id="dataform" class="panel" method="POST">

<input type="hidden" name="cntId" id="cntId" value="{$id}">
<!-- begin row -->
<div class="row">
    <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">Note</label>
            <textarea rows="3" id="cnotNote" name="cnotNote" class="form-control"></textarea>
        </div>
    </div>
</div>
<!-- row -->

    <!-- begin row -->
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Set Reminder</label>
                <input type="checkbox"  id="cnotReminder" name="cnotReminder" value="1" class="checkbox-inline">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Reminder Date</label>
                <div class="input-group date" id="bs-datepicker-component">
                    <input type="text" id="cnotReminderDate" name="cnotReminderDate"
                           class="form-control">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
            </div>
        </div>
        
        <div class="col-sm-3">
                <div class="form-group no-margin-hr">
                  <label class="control-label">Share Note With Customer</label>
                  <input type="checkbox" id="cnotSendNote" name="cnotSendNote" value="1" class="checkbox-inline">
                </div>
        </div>
            
        <div class="col-sm-3">
              <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="{$userInfo['USER_EMAIL']}" class="checkbox-inline">
              <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="{$user['cntPrimaryEmail']}" class="checkbox-inline">
        </div>
    </div>
    <!-- row -->

    <!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Note</a>
    </div>
    <div class="col-sm-2">
        <a href="{$SITE_URL}crm/viewContact/{$id}" class="btn btn-primary btn-labeled">Cancel</a>
    </div>
</div>
</form>

{/IF}
    <div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Date Created</th>
                    <th >Note</th>
                    <th style='width:10%;'>Edit</th>
                </tr>
                </thead>
                <tbody>
                {assign var=odd value='odd gradeA'}
                {assign var=even value='even gradeA'}
                {foreach $data as $d}
                    {IF $d.cnotNote}
                <tr class="{cycle values="$odd,$even"}">
                    <td><span class="note-title">{$d.cnotCreatedDate|date_format:"%A %B %d,  %Y at %I:%M %p"}</span></td>
                    <td class="text-center">{$d.cnotNote}
                        {IF $d.cnotReminder}<br/><span class="alert-info"> REMINDER SET<br/>{$d.cnotReminderDate|date_format:"%B %d,  %Y"}</span>{/IF}
                    </td>
                    <td class="text-left"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="{$SITE_URL}crm/crmNotes/{$id}/{$d.cnotId}">Edit</a></td>
                </tr>
                {/IF}
            {/foreach}



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
