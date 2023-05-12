<script type="text/javascript">



    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
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

    <a  href="{$SITE_URL}workorders/WOEstimatorClose/{$pid}" class="btn btn-light-green btn-labeled hidden-print"><span class="btn-label icon fa fa-arrow-circle-left"></span> Back to Work Order </a>
    <div class="panel-body">




        <div id="Proposalheader">
            <h3>UPLOAD:{$services['jordName']}</h3>
        </div>


       <!-- row -->
       <form action="{$SITE_URL}workorders/uploadWOMedia/{$pid}/2"  name="dataform" id="dataform" class="panel" method="POST"
             enctype="multipart/form-data">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">
           <input type="hidden" name="sid" id="pid" value="{$sid}">
           <input type="hidden" name="jobmdJordID" id="jobmdJordID" value="{$sid}">

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
                       <label class="control-label">Service</label>
                       <br />
                       {$services['jordName']}
                       <br />
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



       <div class="table-primary">
           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
               <thead>
               <tr>
                   <th >Media</th>
                   <th >Uploaded</th>

               </tr>
               </thead>
               <tbody>
               {assign var=odd value='odd gradeA'}
               {assign var=even value='even gradeA'}
               {foreach $medialist as $d}

                       <tr class="{cycle values="$odd,$even"}">
                           <td class="text-left"><a href='{$SITE_URL}media/projects/{$d.jobmdFileName }' title="View Document" target='view'>{$d.PODocTypeName}</a><br/>
                               {IF $d['jordName'] neq ''}{$d['jordName']}<br/>{/IF}
                               Description: {$d.jobmdDescription}
                           </td>
                           <td>{$d.uploader}<br/>
                           {$d.jobmdCreatedDateTime|date_format:"%A %B %d,  %Y"}</td>
                       </tr>

               {/foreach}



               </tbody>
           </table>
       </div>


    </div>

        </div>




