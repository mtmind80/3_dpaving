


<script type="text/javascript">

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


<div class="container">

    <div class="inner">
<h1 class="form-header">Create A Task</h1>


<!-- Form -->
<form action="index.html" id="signup-form_id" class="panel">
    <input type="hidden" name="userid" id="userid" value="{$id}">
    <div class="form-group">
        <label class="control-label">Task</label>
        <textarea name="taskDescription" rows="3" cols="55" id="taskDescription" class="form-control input-lg"></textarea>
    </div>

    <div class="form-group">
        <label class="control-label">Due Date</label>
        <input type="text" name="taskDueDate" id="taskDueDate" size="25" class="form-control input-sm" >
    </div>

    <div class="form-actions">
        <input type="button" value="Create Task" class="btn btn-primary btn-lg btn-block" onClick="Javascript:CHECKIT(this.form);">
    </div>
</form>
</div>
<script>
 $("#taskDueDate").datepicker({
        dateFormat: "mm-dd-yy"
 });
</script>
</div></div>
<!-- / Form -->


