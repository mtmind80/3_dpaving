

<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(!isAlphaNumericAndSpace(form.vtypeName.value))
        {
            alert('You must enter a value for vehicle type.');
            form.vtypeName.focus();
            return false;
        }

        if(!isFloat(form.vtypeRate.value))
        {
            alert('Rate must be a valid number or zero..');
            form.vtypeRate.focus();
            return false;

        }
        return true;

    }

    /*
     vtypeID 	vtypeName 	vtypeDescription 	vtypeRate

     */

</script>




<div class="panel">
    <div class="panel-heading">

        <h2>Edit Vehicle Type</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}resources/vehicleTypeList/"><span class="btn-label icon fa fa-truck"></span> Vehicle Types</a>

    </div>
    <div class="panel-body">

        <form action="{$SITE_URL}resources/saveVehicleType/{$result['vtypeID']}"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Type</label>
                        <input type="text" id='vtypeName' name="vtypeName" class="form-control" value="{$result['vtypeName']}">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <!-- col-sm-6 -->
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" rows="3" cols='65' name="vtypeDescription" id ="vtypeDescription">{$result['vtypeDescription']}</textarea>
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Rate Per Hour</label>
                        <input type="text" id='vtypeRate' name="vtypeRate" class="form-control" value="{$result['vtypeRate']}">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- buton row -->
            <div class="row">
                <div class="col-sm-2">
                    <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Update Type</a>
                </div>
                <div class="col-sm-2">
                    <a href="{$SITE_URL}resources/vehicleTypeList/" class="btn btn-primary btn-labeled">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>






