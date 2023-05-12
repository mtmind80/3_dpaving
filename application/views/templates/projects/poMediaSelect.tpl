<script>
    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" },
            "pageLength": 100

        }  );
        //$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');


        $('#PrintMe').click(function() {
            showSpinner();
            $( "#pdataform" ).submit();
            setTimeout("hideSpinner()",5000);
        });

        $("#selectall").click(function(){
            //alert("just for check");
            if(this.checked){
                $('.checkboxall').each(function(){
                    this.checked = true;


                })
            }else{
                $('.checkboxall').each(function(){
                    this.checked = false;


                })
            }
        });


    });



</script>


<div class="panel">
    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/client/{$proposal.jobID}'><span class="wizard-step-description" >Location/Managers &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/addPOservices/{$proposal.jobID}'><span class="wizard-step-description">Services &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Notes/{$proposal.jobID}'><span class="wizard-step-description" >Notes &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Media/{$proposal.jobID}'><span class="wizard-step-description" style="color: #000000;">Upload &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Status/{$proposal.jobID}'><span class="wizard-step-description">Status &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/previewPO/{$proposal.jobID}'><span class="wizard-step-description">Preview &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">7</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/clientReminder/{$proposal.jobID}'><span class="wizard-step-description">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>


    <div class="panel-heading">
          <h2>Select Media To Print With Proposal</h2>
        <h3>{$proposal['jobName']}</h3>

    </div>
   <div class="panel-body">

       <form action="{$SITE_URL}reports/ProposalToPDFWithImages/{$pid}"  name="pdataform" id="pdataform"  method="POST">
           <input type="hidden" name="pid" id="pid" value="{$pid}">
           <a id='PrintMe'  href="#" class="btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-print"></span>  Print Proposal With Selected Images</a>
           <div class="table-primary">
           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">

               <thead>
               <tr>
                   <th colspan='4' ><input type="checkbox" id="selectall"> select all
                       &nbsp;
                   </th>
               </tr>
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
                               <input type='checkbox' data-id='{$d.PODocTypeName}' class='checkboxall' name='upload_{$d.jobmdId}' id='upload_{$d.jobmdId}' value ='{$d.jobmdId}'>
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
                           <td class="text-left"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/DeleteMedia/{$pid}/{$d.jobmdId}/{$d.jobmdFileName}','You are about to delete this media permananently.\nAre you Sure?');">Delete</a></td>
                       </tr>

               {/foreach}



               </tbody>
           </table>
       </div>
</form>

    </div>

        </div>




