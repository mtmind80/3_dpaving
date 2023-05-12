
<script type="text/javascript">

function SendMe(usrid)
{

}

            function CHECKIT(form)
            {
                if(!test(form)){ return;
                }

                form.submit();
            }

    function test(form)
    {

        if(form.msgMessage.value == '')
        {
            showMessages('You must enter a message');
            //alert('You must enter a message');
            form.msgMessage.focus();
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

    var name ='Messages:{$USER_FULLNAME}';

    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" }
        }  );
        $('#jq-datatables-example_wrapper .table-caption').text(name);
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });



</script>


<div class="panel" >
<div class="panel-heading">
        <h2>{$USER_FULLNAME}</h2>
    <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>
    <a class="topbut btn btn-success" href="{$SITE_URL}crm/employeeList/"><span class="btn-label icon fa fa-male"></span> List Employees</a>

</div>
<div class="panel-body">
<form action="{$SITE_URL}messages/addMessage/"  name="dataform" id="dataform" class="panel" method="POST">
<!-- begin row -->
<div class="row">
    <div class="col-sm-8">
        <div class="form-group no-margin-hr">
            <label class="control-label">Message</label>
            <textarea rows="3" cols="66" id="msgMessage" name="msgMessage" class="form-control-lg"></textarea>
        </div>
    </div>


    <div class="col-sm-2">
        <div class="form-group no-margin-hr">
            <label class="control-label">Send To</label>
            <select class="input-sm  form-group-margin" name="msgSenderID" id="msgSenderID">
                {foreach $employeelist as $emp}
                        {IF $emp['cntId'] == $USER_ID}
                            <!-- <option value="{$emp['cntId']}" selected="selected" >{$emp['cntFirstName']} {$emp['cntLastName']}</option>
                   -->
                        {ELSE}
                            <option value="{$emp['cntId']}" {IF $filter == $emp['cntId']} selected="selected"{/IF}>{$emp['cntFirstName']} {$emp['cntLastName']}</option>
                        {/IF}
                {/foreach}
            </select>
        </div>
    </div>

    </div>
    <!-- row -->




    <!-- buton row -->
<div class="row">
    <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Send</a>
    </div>

</div>
</form>
    <div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Sender</th>
                    <th >Message</th>
                    <th >Date</th>
                    <th >Time</th>
                    <th style='width:10%;'>Hide</th>
                </tr>
                </thead>
                <tbody>
                {IF $data}
                {foreach $data as $d}
                    <tr>
                        <td class="text-left">{IF intval($USER_ID) == intval($d.msgSenderID)}{$d.Sender}{ELSE}<a href="{$SITE_URL}messages/myMessages/{$d.msgSenderID}">{$d.Sender}</a>{/IF}</td>
                        <td class="text-left">{$d.msgMessage}</td>
                        <td class="text-left">{$d.msgSentDate|date_format:"%A %B %d,  %Y"} </td>
                        <td class="text-left"> {$d.msgSentDate|date_format:" %I:%M %p"}</td>
                        <td class="text-center"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="{$SITE_URL}messages/hideMessage/{$d.msgId}">Hide</a></td>
                      </tr>
                    {/foreach}

                {/IF}

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
