<script>
    init.push(function () {


        $('#bs-datepicker-component').datepicker();

        $('#logform').hide();



        $( "#openlogform" ).click(function() {
            $('#logform').show();
        });


        $( "#closelogform" ).click(function() {
            $('#logform').hide();
        });
    });

    function hideform()
    {
        $('#logform').hide();
    }

    function showform()
    {
        $('#logform').show();
    }



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

        if(!isAlphaNumericAndSpace(form.vlogNote.value))
        {
            alert('You must enter a note.');
            form.vlogNote.focus();
            return false;
        }

        if(!isFloat(form.vlogAmount.value))
        {
            alert('Amount must be a valid number or zero..');
            form.vlogAmount.value = 0;
            form.vlogAmount.focus();
            return false;

        }
        return true;

    }

</script>




<div class="panel" id='logform'>
    <div class="panel-heading">

        <h2>Add Vehicle Log</h2>
        <a class="topbut btn btn-success" href="Javascript:hideform();"><span class="btn-label icon fa fa-arrow-circle-down"></span> Hide Log Form</a>

    </div>
    <div class="panel-body">

        <form action="{$SITE_URL}resources/saveVehicleLog/{$vehicles['vehicleID']}"  name="dataform" id="dataform" class="panel" method="POST">
            <INPUT TYPE="HIDDEN" id="vlogVehicleID" name="vlogVehicleID" value="{$vehicles['vehicleID']}">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Log Type</label>
                        <select id='vlogType' name="vlogType" class="form-control">
                            {foreach $VehicleLogTypes as $vlog}
                                <OPTION VALUE='{$vlog['vlogType']}'>{$vlog['vlogType']}</OPTION>

                            {/foreach}
                        </select>
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <!-- col-sm-6 -->
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Note</label>
                        <textarea class="form-control" rows="2" cols='65' name="vlogNote" id ="vlogNote"></textarea>
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>
            <!-- begin row -->
            <div class="row">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Log Date</label>
                            <div class="input-group date" id="bs-datepicker-component">
                                <input type="text" id="vlogDate" name="vlogDate"
                                       class="form-control">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Amount</label>
                            <input type="text" name="vlogAmount" id="vlogAmount" class="form-control">
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                </div>
            </div>
            <!-- row -->

            <!-- buton row -->
            <div class="row">
                <div class="col-sm-2">
                    <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Log</a>
                </div>

            </div>
        </form>
    </div>
</div>


<div class="panel" >
    <div class="panel-heading">

        <h2><a href="{$SITE_URL}resources/vehicleList/" title="Back to Vehicle List"><span class="btn-label icon fa fa-arrow-left"></span>Vehicle Log {$vehicles['vehicleName']}</a></h2>
        <a class="topbut btn btn-success" href="Javascript:showform();"><span class="btn-label icon fa fa-angle-double-up"></span> Add Vehicle Log</a>
    </div>
<div class="panel-body">
<div class="table-primary">
    {assign var=odd value='odd gradeA'}
    {assign var=even value='even gradeA'}
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
        <thead>
        <tr>
            <th >Log Type</th>
            <th >Note</th>
            <th >Date</th>
            <th >Amount</th>
            <th style='width:10%;'>Remove</th>
        </tr>
        </thead>
        <tbody>
{IF $vehicleLog}
            {foreach $vehicleLog as $v}
                <tr class="{cycle values="$odd,$even"}" id='t{$vlogID}'>
                    <td><span class="note-title">{$v.vlogType}</span></td>
                    <td class="text-center">{$v.vlogNote}</td>
                    <td class="text-center">{$v.vlogDate}</td>
                    <td class="text-center">{$v.vlogAmount}</td>
                    <td class="text-center"><a href="Javascript:AREYOUSURE('{$SITE_URL}resources/deleteVehicleLog/{$v.vlogID}/{$v.vlogVehicleID}','You are about to delete this log entry permanently! Are you sure?');">Remove</a></td>
                </tr>
            {/foreach}



{ELSE}
            <tr class="{$odd}" >
                <td colspan='5'><span class="note-title">No Logs Found</span></td>
            </tr>

{/IF}
        </tbody>
    </table>

</div>
    </div>
</div>
{IF $vehicleLog}
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

<!-- / Javascript -->
<!-- /11. $JQUERY_DATA_TABLES -->
{/IF}