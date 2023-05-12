<script type="text/javascript">



    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


        $('#PrintMe').click(function() {

            //check that a checkbox is checked
            var atLeastOneIsChecked = $('input:checkbox').is(':checked');
            var checked = $("#pdataform input:checked").length > 0;
            if(!checked) {
                alert("You must select at least one image to print.");
                return false;
            }
            showSpinner();
            $( "#pdataform" ).submit();
            setTimeout("hideSpinner()",5000);
        });

    });


    var id = 0;

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.media.value == '')
        {
            alert('You must click the browse button and select a file to upload from your device.');
            form.media.focus();
            return false;
        }
        if(form.jobmdDescription.value == '')
        {
            alert('You must enter a media description');
            form.jobmdDescription.focus();
            return false;
        }


        return true;

    }


</script>


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

<div class="panel">

    {include file='workorders/_workorderwizrdmenu.tpl'}

    <div class="panel-body">
        {assign var="lead" value="Media For "}

        {include file='workorders/_workorderheader.tpl'}

       <!-- row -->
       <form action="{$SITE_URL}workorders/uploadWOMedia/{$pid}"  name="dataform" id="dataform" class="panel" method="POST"
             enctype="multipart/form-data">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">

           <!-- begin row -->
           <div class="row" >


               <div class="col-sm-5">
                   <div class="form-group no-margin-hr">

                       <label class="control-label">Document Type</label>
                       <br />
                       <select name="jobmdDocumentTypeID" id="jobmdDocumentTypeID">
                           {foreach $mediatypes as $m}
                               <option value="{$m.PODocTypeID}">{$m.PODocTypeName}</option>
                           {/foreach}
                       </select>
                       <br />    <br />
                       <label class="control-label">Select the Service</label>
                       <br />
                       <select name="jobmdJordID" id="jobmdJordID">
                           <option value="0">Attach to Entire Work Order</option>

                           {foreach $services as $m}
                               <option value="{$m.jordID}">{$m.jordName}</option>
                           {/foreach}
                       </select>    <br />
                       <br />


                       <label class="control-label">Document Description</label>
                       <br />
                       <textarea class="form-control" name="jobmdDescription" id="jobmdDescription"></textarea>
                       <br />

                       <input type="file" name="media" id="media">
                   </div>
               </div>

               <div class="col-sm-2">
                   <div class="form-group no-margin-hr">

                       <label class="control-label">Restrict View to<br/>Admin Only</label>
                       <br />
                       <input type="checkbox" class='form-control checkbox-inline' name="jobmdAdminOnly" id="jobmdAdminOnly" value="1" checked>
                   </div>
               </div>

               <div class="col-sm-5" >
                   <label class="control-label">Attach Files to Work Order: Acceptable file types are: Image Files, MS Word, MS Excel, MS Powerpoint, PDF files,
                       Open office Files
                   </label>


                   <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Upload Media</a>
               </div>

           </div>
</form>



        <form action="{$SITE_URL}workorders/printMedia/{$pid}"  name="pdataform" id="pdataform"  method="POST">
            <input type="hidden" name="pid" id="pid" value="{$pid}">
            <a id='PrintMe'  href="#" class="btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-print"></span>  Print Selected Images</a>

            <div class="table-primary">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                    <thead>
                    <tr>
                        <th >&nbsp;</th>
                        <th >Media</th>
                        <th >Uploaded</th>
                        <th style='width:10%;'>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    {assign var=odd value='odd gradeA'}
                    {assign var=even value='even gradeA'}
                    {foreach $medialist as $d}

                        <tr class="{cycle values="$odd,$even"}">
                            <td>
                                {IF $d.jobmdisImage}
                                    <input type='checkbox' name='upload_{$d.jobmdId}' id='upload_{$d.jobmdId}' value ='{$d.jobmdId}'>
                                {/IF}
                            </td>
                            <td class="text-left">
                                <span class="alert-success">Description:</span> {$d.jobmdDescription}
                                <br/>
                                {$d['jordName']|default:'Entire Proposal'}
                                <br/>
                                {$d.PODocTypeName} <a href='{$SITE_URL}media/projects/{$d.jobmdFileName }' title="View Document" target='view'>View Upload</a>
                            </td>
                            <td>{$d.uploader}<br/>
                                {$d.jobmdCreatedDateTime|date_format:"%A %B %d,  %Y"}</td>
                            <td class="text-left">
                                {IF $proposal.jobStatus eq 5}
                                <span class="btn-label icon fa fa-angle-right">&nbsp;<a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/DeleteMedia/{$pid}/{$d.jobmdId}/{$d.jobmdFileName}','You are about to delete this media permananently.\nAre you Sure?');">Delete</a>
                                {/IF}
                            </td>
                        </tr>

                    {/foreach}



                    </tbody>
                </table>
            </div>
        </form>


    </div>

        </div>




