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

        form.jobmdDescription.value = '{$service['jordName']} - ' + form.jobmdDescription.value;

        showSpinner('Please wait');

        return true;

    }


</script>


<div class="panel">
    <div class="panel-body">
        <a  href="{$SITE_URL}workorders/showServiceList/" class="btn btn-light-green btn-labeled hidden-print"><span class="btn-label icon fa fa-arrow-circle-left"></span> Back To Schedule </a>


        <div id="Proposalheader">
            <h3>UPLOAD:{$service['jordName']}</h3>
        </div>


       <!-- row -->
       <form action="{$SITE_URL}workorders/uploadWOMedia/{$pid}/1"  name="dataform" id="dataform" class="panel" method="POST"
             enctype="multipart/form-data">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">
           <input type="hidden" name="jobmdJordID" id="jobmdJordID" value="{$service['jordID']}">
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
                       </select>    <br />
                       <br />
                       <label class="control-label">Service</label>
                       {$service['jordName']}
                       <br/>

                       <label class="control-label">Document Description</label>
                       <br />
                       <textarea class="form-control" name="jobmdDescription" id="jobmdDescription"></textarea>
                       <br />

                       <input type="file" name="media" id="media">
                   </div>
               </div>

               <div class="col-sm-2">
                   <div class="form-group no-margin-hr">

                       <input type="hidden" class='form-control checkbox-inline' name="jobmdAdminOnly" id="jobmdAdminOnly" value="0" >
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





    </div>
{if $medialist}
<div class="table-primary">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:60%;" id="jq-datatables-example">
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
                    <td class="text-left">
                        <span class="alert-success">Description:</span> {$d.jobmdDescription}
                        <br/>
                        {$d['jordName']|default:'Entire Proposal'}
                        <br/>
                        {$d.PODocTypeName} <a href='{$SITE_URL}media/projects/{$d.jobmdFileName }' title="View Document" target='view'>View Upload</a>
                    </td>
                    <td>{$d.uploader}<br/>
                        {$d.jobmdCreatedDateTime|date_format:"%A %B %d,  %Y"}</td>
                </tr>

            {/foreach}



            </tbody>
        </table>

    {/if}

    </div>




