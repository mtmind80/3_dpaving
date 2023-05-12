
<script type="text/javascript">


            function CHECKIT(form)
            {
                if(!test(form)){ return;
                }

                form.submit();
            }

    function test(form)
    {

        if(form.taskResponse.value == '')
        {
            var msg = 'Please enter a comment. Like: "This task was completed."';
            $('#msg').html(msg);
            $('#privatemessage').modal('show');
            form.taskResponse.value = 'This task was completed.';
            form.taskResponse.focus();
            return false;
        }

        return true;

    }


</script>


<div class="panel" >
<div class="panel-heading">

    {if $user['cntcid'] eq 9}
        <h2>Complete Task:{$user['cntFirstName']}</h2>
    {elseif $user['cntcid'] eq 10}
        <h2>Complete Task:{$user['cntFirstName']}</h2>
    {elseif $user['cntcid'] eq 8}
        <h2>Complete Task:{$user['cntFirstName']}</h2>
    {else}
        <h2>Complete Task:{$user['cntFirstName']} {$user['cntLastName']}</h2>
    {/if}

    <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>

</div>

<div class="panel-body">
<form action="{$SITE_URL}tasks/saveC/{$data['taskID']}"  name="dataform" id="dataform" class="panel" method="POST">
    <input type='hidden' name='taskDescription' id='taskDescription' value='{$data['taskDescription']}'>
    <input type='hidden' name='taskAssignedTo' id='taskAssignedTo' value='{$data['taskAssignedTo']}'>
    <input type='hidden' name='taskCreatedBy' id='taskCreatedBy' value='{$data['taskCreatedBy']}'>
    <input type='hidden' name='cntId' id='cntId' value='{$user['cntId']}'>
<input type='hidden' name='taskID' id='taskID' value='{$data['taskID']}'>


    <!-- begin row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">Complete This Task</label>
                {$data['taskDescription']}
            </div>
        </div>

    </div>
    <!-- row -->

    <!-- begin row -->
<div class="row">
    <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">Please add your comments</label>
            <textarea rows="3" id="taskResponse" name="taskResponse" class="form-control"></textarea>
        </div>
    </div>

    </div>
    <!-- row -->


    <!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Complete Task </a>
    </div>

</div>
</form>
    </div>
</div>
