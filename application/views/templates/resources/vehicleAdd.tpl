<script src="{$SITE_URL}assets/javascripts/validate.js"></script>

<script>
    init.push(function () {


        $('#bs-datepicker-component').datepicker();


    });


</script>

<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.vehicleName.value == '')
        {
            alert('You must enter a value for vehicle name');
            form.vehicleName.focus();
            return false;
        }


        return true;

    }

</script>


<div class="panel">
    <div class="panel-heading">

        <h2>Add Vehicle</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}resources/vehicleList/"><span class="btn-label icon fa fa-truck"></span> List Vehicles</a>

        <!-- vehicleID,vehicleName,vehicleDescription,vehiclePurchaseDate,vehicleVinNumber,vehicleCreatedBy,vehicleActive,vehicleLocation,vehicleTypeID -->
    </div>
    <div class="panel-body">

        <form action="{$SITE_URL}resources/saveVehicle"  name="dataform" id="dataform" class="panel" method="POST">
        <input type="hidden" name="vehicleActive" id="vehicleActive" value="1">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Name</label>
                        <input type="text" id='vehicleName' name="vehicleName" class="form-control">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <!-- col-sm-6 -->
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Description</label>
                        <textarea class="form-control" rows="3" cols='65' name="vehicleDescription" id ="vehicleDescription"></textarea>
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Type</label>
                        <select class="form-control form-group-margin" name="vehicleTypeID" id="vehicleTypeID">
                            {foreach $vtypes as $recordset}
                            <option value="{$recordset.vtypeID}">{$recordset.vtypeName}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Location</label>
                        <select class="form-control form-group-margin" name='vehicleLocation' id='vehicleLocation'>
                            {foreach $locations as $recordset}
                                <option value="{$recordset.locID}">{$recordset.locName}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>

            </div>
            <!-- row -->


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Purchase Date</label>
                        <div class="input-group date" id="bs-datepicker-component">
                            <input type="text" id="vehiclePurchaseDate" name="vehiclePurchaseDate"
                                   class="form-control">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                    </div>
                </div>
                <!-- col-sm-6 -->
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">VIN #</label>
                        <input type="text" name="vehicleVinNumber" id="vehicleVinNumber" class="form-control">
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>

    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Vehicle</a>
        </div>
<div class="col-sm-2">
        <a href="{$SITE_URL}resources/vehicleList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




