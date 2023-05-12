
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

        if(form.taskDescription.value == '')
        {
            alert('You must enter a value for task and a date');
            form.taskDescription.focus();
            return false;
        }

        if(form.taskDueDate.value == '')
        {
            alert('You must enter a value for task and a date');
            form.taskDueDate.focus();
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

    {if $user['cntcid'] eq 9}
    var name ='{$user['cntFirstName']}';
            {elseif $user['cntcid'] eq 10}
    var name ='Tasks:{$user['cntFirstName']}';
            {elseif $user['cntcid'] eq 8}
    var name ='Tasks:{$user['cntFirstName']}';
            {else}
    var name ='Tasks:{$user['cntFirstName']} {$user['cntLastName']}';
    {/if}

    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" }
        }  );
        $('#jq-datatables-example_wrapper .table-caption').text(name);
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });



</script>


<div class="panel" >
<div class="panel-heading">
<h2>Task Manager</h2>

    <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>

</div>
<div class="panel-body">
<form action="{$SITE_URL}tasks/saveTask/"  name="dataform" id="dataform" class="panel" method="POST">
<!-- begin row -->
<div class="row">
    <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">Task</label>
            <textarea rows="3" id="taskDescription" name="taskDescription" class="form-control"></textarea>
        </div>
    </div>

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Due Date</label>
                <div class="input-group date" id="bs-datepicker-component">
                    <input type="text" id="taskDueDate" name="taskDueDate"
                           class="form-control">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
            </div>
        </div>
    </div>
    <!-- row -->

    {IF $USER_ROLE = 1}


    <!-- begin row -->
    <div class="row">

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Assign To</label>
            <select class="input-sm  form-group-margin" name="cntid" id="cntId">
            {foreach $employeelist as $emp}
                {IF $emp['cntId'] eq $USER_ID}
                <option value="{$emp['cntId']}" selected="selected" >{$emp['cntFirstName']} {$emp['cntLastName']}</option>
                {ELSE}
                <option value="{$emp['cntId']}">{$emp['cntFirstName']} {$emp['cntLastName']}</option>
                {/IF}
            {/foreach}
        </select>
            </div>
        </div>
    </div>

    {ELSE}
        <input type="hidden" name="cntId" id="cntId" value="{$id}">

    {/IF}

    <!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Task </a>
    </div>

</div>
</form>
    <div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Date Due</th>
                    <th >Task</th>
                    <th >Created</th>
                    <th style='width:10%;'>Mark Completed</th>
                </tr>
                </thead>
                <tbody>
                {assign var=odd value='odd gradeA'}
                {assign var=even value='even gradeA'}
                {IF $data}
                {foreach $data as $d}
                        <tr class="{cycle values="$odd,$even"}">
                            <td><span class="note-title">{$d.taskDueDate|date_format:"%A %B %d,  %Y"}</span></td>

                            <td class="text-left">{$d.taskDescription}
                                {IF $d.taskStatus}
                                    <br/>Response:{$d.taskResponse}
                                {/IF}
                            </td>
                            <td class="text-left">{$d.taskCreatedDateTime|date_format:"%A %B %d,  %Y"}

                                <br/>{$d.Creator}
                            </td>

                            <td class="text-center">
                                {IF !$d.taskStatus}
                                    <span class="btn-label icon fa fa-angle-right">&nbsp;<a href="{$SITE_URL}tasks/completeTask/{$d.taskID}">Complete</a>
                                    {ELSE}
                                        Completed
                                    {$d.taskCompletedDateTime|date_format:"%B %d,  %Y at %I:%M %p"}
                                    {/IF}
                            </td>
                        </tr>
                    {/foreach}

                {/IF}

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
