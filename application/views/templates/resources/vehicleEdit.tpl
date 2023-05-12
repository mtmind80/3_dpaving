

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

        if(form.vehicleDescription.value == '')
        {
            alert('You must enter a value for description');
            form.vehicleDescription.focus();
            return false;
        }



        return true;

    }



</script>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit Vehicle</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}resources/vehicleList/"><span class="btn-label icon fa fa-truck"></span> List Vehicles</a>

        <!-- vehicleID,vehicleName,vehicleDescription,vehiclePurchaseDate,vehicleVinNumber,vehicleCreatedBy,vehicleActive,vehicleLocation,vehicleTypeID -->
    </div>
    <div class="panel-body">

        <form action="{$SITE_URL}resources/saveVehicle/{$result['vehicleID']}"  name="dataform" id="dataform" class="panel" method="POST">


                <!-- begin row -->
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                    <label class="control-label" style='color:red;'>Disable Vehicle</label>
                       &nbsp; <input type="checkbox" id='vehicleActive' name="vehicleActive"  value="0" {IF !$result['vehicleActive']} checked {/IF}>
                    </div>
                    </div>
                    </div>
                <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Name</label>
                        <input type="text" id='vehicleName' name="vehicleName" class="form-control" value="{$result['vehicleName']}">
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
                        <textarea class="form-control" rows="3" cols='65' name="vehicleDescription" id ="vehicleDescription">{$result['vehicleDescription']}</textarea>
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
                                {IF $recordset.vtypeID == $result['vehicleTypeID']}
                                    <option value="{$recordset.vtypeID}" selected>{$recordset.vtypeName}</option>
                                {ELSE}
                                    <option value="{$recordset.vtypeID}">{$recordset.vtypeName}</option>
                                {/IF}
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Vehicle Location</label>
                        <select class="form-control form-group-margin" name='vehicleLocation' id='vehicleLocation'>
                            {foreach $locations as $recordset}
                                {IF $recordset.locID == $result['vehicleLocation']}
                                    <option value="{$recordset.locID}" selected>{$recordset.locName}</option>
                                {ELSE}
                                    <option value="{$recordset.locID}">{$recordset.locName}</option>
                                {/IF}
                             {/foreach}
                        </select>
                    </div>
                </div>

            </div>
            <!-- row -->


            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Purchase Date</label>
                        <div class="input-group date" id="bs-datepicker-component">
                            <input type="text" id="vehiclePurchaseDate" name="vehiclePurchaseDate" value="{$result['vehiclePurchaseDate']}"
                                   class="form-control">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                    </div>
                </div>
                <!-- col-sm-6 -->
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">VIN #</label>
                        <input type="text" name="vehicleVinNumber" id="vehicleVinNumber" class="form-control"  value="{$result['vehicleVinNumber']}">
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>


    <!-- buton row -->
<div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Update Vehicle</a>
        </div>
<div class="col-sm-2" id="clickme"><a href="{$SITE_URL}resources/vehicleList" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>



