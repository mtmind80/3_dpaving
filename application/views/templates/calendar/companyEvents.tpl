
<script type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();
        $('#eventTime').timepicker();


    });


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.eventDescription.value == '')
        {
            alert('You must enter a description');
            form.eventDescription.focus();
            return false;
        }

        if(form.eventName.value == '')
        {
            alert('You must enter a name');
            form.eventName.focus();
            return false;
        }

        if(form.eventDate.value == '')
        {
            alert('You must enter a date');
            form.eventDate.focus();
            return false;
        }

        return true;

    }
</script>

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


<div class="panel" >
    <div class="panel-heading">

        <h2>Company Events</h2>


        <a class="topbut btn btn-success" href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-save"></span> Save Event</a>

    </div>
    <div class="panel-body">
        {IF $edit}
            <form action="{$SITE_URL}calendar/saveEvent/{$edit['eventID']}"  name="userform" id="dataform" class="panel" method="POST">

                <input type="hidden" name="edit" id="edit" value="1">
                <input type="hidden" name="eventID" id="eventID" value="{$edit['eventID']}">
                <!-- begin row -->

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Event Name</label>
                            <input type="text" id="eventName" name="eventName" class="form-control" value="{$edit['eventName']}">

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Date</label>
                            <div class="input-group date" id="bs-datepicker-component">
                                <input type="text" id="eventDate" name="eventDate" value="{$edit['eventDate']|date_format:"%m/%d/%Y"}"
                                       class="form-control">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Event Time</label>
                            <input type="text" id="eventTime" name="eventTime" class="form-control" value="{$edit['eventTime']}">

                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Description</label>
                            <textarea rows="3" id="eventDescription" name="eventDescription" class="form-control">{$edit['eventDescription']}</textarea>
                        </div>
                    </div>
                </div>
                <!-- row -->

                <!-- buton row -->
                <div class="row">
                    <div class="col-sm-2">
                        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Event</a>
                    </div>
                </div>
            </form>

        {ELSE}
            <form action="{$SITE_URL}calendar/saveEvent/"  name="userform" id="dataform" class="panel" method="POST">


                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Event Name</label>
                            <input type="text" id="eventName" name="eventName" class="form-control" >

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Date</label>
                            <div class="input-group date" id="bs-datepicker-component">
                                <input type="text" id="eventDate" name="eventDate"
                                       class="form-control">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Event Time</label>
                            <input type="text" id="eventTime" name="eventTime" class="form-control" >

                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Description</label>
                            <textarea rows="3" id="eventDescription" name="eventDescription" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <!-- row -->

                <!-- buton row -->
                <div class="row">
                    <div class="col-sm-2">
                        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Event</a>
                    </div>
                </div>

            </form>

        {/IF}
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Date</th>
                    <th >Event</th>
                    <th style='width:10%;'>Edit</th>
                </tr>
                </thead>

                <tbody>
                {assign var=odd value='odd gradeA'}
                {assign var=even value='even gradeA'}
                {foreach $data as $d}
                    <tr class="{cycle values="$odd,$even"}">
                        <td><span class="note-title">{$d.eventDate|date_format:"%A %B %d,  %Y "} at {$d.eventTime}</span></td>
                        <td class="text-left"><b>{$d.eventName}</b>
                            <br/>{$d.eventDescription}
                        </td>
                        <td class="text-left"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="{$SITE_URL}calendar/editcalendarCE/{$d.eventID}">Edit</a></td>
                    </tr>
                {/foreach}



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
