

<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.equipName.value == '')
        {
            alert('You must enter a value for equipment name');
            form.equipName.focus();
            return false;
        }

        if(form.equipCost.value != parseFloat(form.equipCost.value))
        {
            alert('You must enter a number for equipment cost');
            form.equipCost.value = 0;
            form.equipCost.focus();
            return false;
        }

        if(form.equipMinCost.value != parseFloat(form.equipMinCost.value))
        {
            alert('You must enter a number for equipment minimum cost');
            form.equipMinCost.value = 0;
            form.equipMinCost.focus();
            return false;
        }
        return true;

    }
/*equipName Ascending 	equipRate 	equipCost 	equipMinCost

 */
</script>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit Equipment</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}resources/equipmentList/"><span class="btn-label icon fa fa-wrench"></span> List Equipment</a>

        <!-- vehicleID,vehicleName,vehicleDescription,vehiclePurchaseDate,vehicleVinNumber,vehicleCreatedBy,vehicleActive,vehicleLocation,vehicleTypeID -->
    </div>
    <div class="panel-body">

        <form action="{$SITE_URL}resources/saveEquipment/{$data['equipID']}"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <input type='hidden' name='equipID' value='{$data['equipID']}'>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Equipment Name</label>
                        <input type="text" id='equipName' name="equipName" class="form-control" value="{$data['equipName']}">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Equipment Rate</label>
                        <select class="form-control form-group-margin" name="equipRate" id="equipRate">
                            <option value="per day" {IF $data['equipRate'] == 'per day'}selected{/IF}>per day</option>
                            <option value="per hour"  {IF $data['equipRate'] == 'per hour'}selected{/IF}>per hour</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Cost</label>
                        <input type="text" name="equipCost" id="equipCost" class="form-control" value="{$data['equipCost']}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Min Cost</label>
                        <input type="text" name="equipMinCost" id="equipMinCost" class="form-control" value="{$data['equipMinCost']}">
                    </div>
                </div>
            </div>

    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Equipment</a>
        </div>
<div class="col-sm-2">
        <a href="{$SITE_URL}resources/equipmentList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




