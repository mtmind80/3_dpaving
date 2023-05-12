
<script type="text/javascript">

    function CHECKITR(form)
    {
        if(!testr(form)){ return;
        }

        form.submit();
    }

    function testr(form)
    {

        if(form.locName.value == '')
        {
            alert('You must enter a value for location name');
            form.locName.focus();
            return false;
        }


        return true;

    }



</script>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit Location</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}resources/showLocations/"><span class="btn-label icon fa fa-globe"></span> List Locations</a>

        <!-- vehicleID,vehicleName,vehicleDescription,vehiclePurchaseDate,vehicleVinNumber,vehicleCreatedBy,vehicleActive,vehicleLocation,vehicleTypeID -->
    </div>
    <div class="panel-body">

        <form action="{$SITE_URL}resources/saveLocations/{$data['locID']}"  name="dataform" id="dataform" class="panel" method="POST">
        <input type="hidden" name="locID" id="locID" value="{$data['locID']}">

           <!-- begin row -->
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Location Name</label>
                        <input type="text" id='locName' name="locName" class="form-control" value="{$data['locName']}">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Address</label>
                        <input type="text" id='locAddress' name="locAddress" class="form-control" value="{$data['locAddress']}">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">City</label>
                        <input type="text" id='locCity' name="locCity" class="form-control" value="{$data['locCity']}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">State</label>
                        <input type="text" id='locState' name="locState" class="form-control" value="{$data['locState']}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Zip</label>
                        <input type="text" id='locZip' name="locZip" class="form-control" value="{$data['locZip']}">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Phone</label>
                        <input type="text" id='locPhone' name="locPhone" class="form-control" value="{$data['locPhone']}">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Manager</label>
                        <input type="text" id='locManager' name="locManager" class="form-control" value="{$data['locManager']}">
                    </div>
                </div>
            </div>
            <!-- row -->


            <!-- buton row -->
<div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKITR(this.dataform);" class="btn btn-primary btn-labeled">Update Location</a>
        </div>
<div class="col-sm-2" id="clickme"><a href="{$SITE_URL}resources/showLocations" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>



