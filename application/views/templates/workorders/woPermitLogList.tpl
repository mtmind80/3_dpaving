
{IF $PermitLog}
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

        if(!isAlphaNumericAndSpace(form.plogNote.value))
        {
            alert('You must enter a note.');
            form.plogNote.focus();
            return false;
        }

        if(!isFloat(form.plogHours.value))
        {
            alert('Amount must be a valid number or zero..');
            form.plogHours.value = 0;
            form.plogHours.focus();
            return false;

        }
        return true;

    }

</script>




<div class="panel" id='logform'>
    <div class="panel-heading">

        <h2>Add Permit Log</h2>
        <a class="topbut btn btn-success" href="Javascript:hideform();"><span class="btn-label icon fa fa-arrow-circle-down"></span> Hide Log Form</a>

    </div>
    <div class="panel-body">

        <form action="{$SITE_URL}workorders/savePermitLog/{$pid}/{$wopID}"  name="dataform" id="dataform" class="panel" method="POST">
            <INPUT TYPE="HIDDEN" id="plogwopID" name="plogwopID" value="{$wopID}">
            <!-- begin row -->
            <div class="row">
                <!-- col-sm-6 -->
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Note</label>
                        <textarea class="form-control" rows="2" cols='65' name="plogNote" id ="plogNote"></textarea>
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
                                <input type="text" id="plogDate" name="plogDate"
                                       class="form-control" value="{$CurrentDate|date_format:"%m/%d/%Y"}">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Hours</label>
                            <input type="text" name="plogHours" id="plogHours" class="form-control">
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

        <h2><a href="{$SITE_URL}workorders/WOPermits/{$pid}" title="Back to Permit List"><span class="btn-label icon fa fa-arrow-left"></span>Permits</a> {$PermitInfo.wopNumber} {$PermitInfo.wopCounty}</h2>
        {$PermitInfo.jordName}
        <a class="topbut btn btn-success" href="Javascript:showform();"><span class="btn-label icon fa fa-angle-double-up"></span> Add Permit Log</a>
    </div>
<div class="panel-body">
<div class="table-primary">
    {assign var=odd value='odd gradeA'}
    {assign var=even value='even gradeA'}
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
        <thead>
        <tr>
            <th >Note</th>
            <th >Date</th>
            <th >Hours</th>
            <th style='width:10%;'>Remove</th>
        </tr>
        </thead>
        <tbody>
{IF $PermitLog}
            {foreach $PermitLog as $v}
                <tr class="{cycle values="$odd,$even"}" id='t{$v.plogID}'>
                    <td class="text-center">{$v.plogNote}</td>
                    <td class="text-center">{$v.plogDate}</td>
                    <td class="text-center">{$v.plogHours}</td>
                    <td class="text-center"><a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/removePermitLog/{$pid}/{$wopID}/{$v.plogID}','You are about to delete this log entry permanently! Are you sure?');">Remove</a></td>
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