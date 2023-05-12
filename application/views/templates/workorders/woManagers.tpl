
<script type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });


</script>


<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<script type="text/javascript">

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


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.jobAddress1.value == '')
        {
            alert('You must enter a value for address');
            form.jobAddress1.focus();
            return false;
        }

        return true;

    }

</script>

<div class="panel">

    {include file='workorders/_workorderwizrdmenu.tpl'}

    <div class="panel-body">

        <div id="Proposalheader">
            <h3>ASSIGN JOB MANAGERS: {$proposalDetails['jordName']} </h3>
        </div>


        {IF $proposal.jobStatus eq 5}
        {* not rejected*}

            <!-- row mark as sent nto -->
            <form action="{$SITE_URL}workorders/saveWOJobManagers/{$pid}/{$sid}"  name="cdataform" id="cdataform" class="panel" method="POST">

                <input type="hidden" name="pid" id="pid" value="{$pid}">
                <input type="hidden" name="sid" id="sid" value="{$sid}">

                <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-8">
                        <label class="control-label">Job Managers</label>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-sm-4" >
                        <label class="control-label">Primary Manager</label>
                        <br />Currently Assigned to : {$proposalDetails['manager1firstname']} {$proposalDetails['manager1lastname']}

                        </div>
                    <div class="col-sm-4" >
                        <select name ="jordJobManagerID" id="jordJobManagerID" class="form-control">
                            {foreach $managers as $e}
                                <option value="{$e['cntId']}">{$e['cntFirstName']} {$e['cntLastName']}</option>
                            {/foreach}
                        </select>

                        </div>
                </div>

                <div class="row" >
                    <div class="col-sm-4" >
                        <label class="control-label">Job Manager</label>
                        <br />
                        Currently Assigned to : {$proposalDetails['manager2firstname']} {$proposalDetails['manager2lastname']}
                    </div>
                    <div class="col-sm-4" >

                    <select name ="jordJobManagerID2" id="jordJobManagerID2" class="form-control">
                        {foreach $employees as $e}
                            <option value="{$e['cntId']}">{$e['cntFirstName']} {$e['cntLastName']}</option>
                        {/foreach}
                        {foreach $managers as $e}
                            <option value="{$e['cntId']}">{$e['cntFirstName']} {$e['cntLastName']}</option>
                        {/foreach}
                    </select>
                </div>
                </div>


                <!-- buton row -->
                <div class="row">
                    <div class="col-sm-2">
                        <a href="Javascript:this.cdataform.submit();" class="btn btn-primary btn-labeled">Update Managers</a>
                    </div>

                </div>
            </form>

        {/IF}

    </div>
</div>

