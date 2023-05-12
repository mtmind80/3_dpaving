
<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.rateName.value == '')
        {
            alert('You must enter a value for name');
            form.rateName.focus();
            return false;
        }

        if(form.rateAmount.value != parseFloat(form.rateAmount.value))
        {
            alert('You must enter a number for rate');
            form.rateAmount.value = 0;
            form.rateAmount.focus();
            return false;
        }

        return true;

    }
</script>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit Rate</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}resources/laborList/"><span class="btn-label icon fa fa-wrench"></span> Labor Rates List</a>

    </div>
    <div class="panel-body">

        <form action="{$SITE_URL}resources/saveLabor/{$data['rateID']}"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <input type='hidden' name='rateID' value='{$data['rateID']}'>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Rate Name</label>
                        <input type="text" id='rateName' name="rateName" class="form-control" value="{$data['rateName']}">
                    </div>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Rate Per Hour</label>
                        <input type="text" id='rateAmount' name="rateAmount" class="form-control" value="{$data['rateAmount']}">
                    </div>
                </div>
            </div>
            <!-- row -->
    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Rate</a>
        </div>
<div class="col-sm-2">
        <a href="{$SITE_URL}resources/equipmentList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




