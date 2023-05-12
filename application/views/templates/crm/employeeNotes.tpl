
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

    <h2>Employee Notes for {$user.cntFirstName} {$user.cntLastName}</h2>
    <a class="topbut btn btn-success" href="{$SITE_URL}crm/employeeList/"><span class="btn-label icon fa fa-male"></span> List Employees</a>

</div>
<div class="panel-body">
    {IF $edit}

    <form action="{$SITE_URL}crm/saveEmployeeNote/{$id}/{$note_id}"  name="dataform" id="dataform" class="panel" method="POST">

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
<form action="{$SITE_URL}crm/saveEmployeeNote/{$id}"  name="dataform" id="dataform" class="panel" method="POST">

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
    </div>
    <!-- row -->

    <!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Note</a>
    </div>
    <div class="col-sm-2">
        <a href="{$SITE_URL}crm/employeeList/" class="btn btn-primary btn-labeled">Cancel</a>
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
                    <th >Created By</th>
                    <th style='width:10%;'>Edit</th>
                </tr>
                </thead>
                <tbody>
                {assign var=odd value='odd gradeA'}
                {assign var=even value='even gradeA'}
                {foreach $data as $d}
                    {IF $d.cnotNote}
                <tr class="{cycle values="$odd,$even"}">
                    <td><span class="note-title">{$d.cnotCreatedDate|date_format:"%B %d,  %Y"}</span></td>
                    <!--
                    cnotReminderDate
                    <td><span class="note-title">{$d.cnotReminderDate|date_format:"%B %d,  %Y"}</span></td>
                    <td><span class="note-title">{$d.cnotCreatedDate|date_format:"%A %B %d,  %Y at %I:%M %p"}</span></td>
                    -->

                    <td class="text-left">{$d.cnotNote}
                    {IF $d.cnotReminder}<br/><span class="alert-info"> REMINDER SET<br/>{$d.cnotReminderDate|date_format:"%B %d,  %Y"}</span>{/IF}</td>
                    <td class="text-left">{$d.Creator}</td>
                    <td class="text-left"><span class="btn-label icon fa fa-angle-right"></span>&nbsp;<a href="{$SITE_URL}crm/employeeNotes/{$id}/{$d.cnotId}">Edit</a></td>
                </tr>
                {/IF}
            {/foreach}



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
