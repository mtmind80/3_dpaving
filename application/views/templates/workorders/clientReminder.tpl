
<script type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });


    function CHECKIT(form)
    {
        form.submit();
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

<div class="panel">
    <div class="panel-heading">
          <h2>Proposal Reminders </h2>

        <h4>Add reminders to be sent out to clients.</h4>

        <!--
        <a class="ui-dialog-buttonpane"  href="Javascript:CHECKIT(this.dataform);"><span class="btn-label icon fa fa-plus"></span> Save and Continue</a>
-->
        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>

    </div>

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
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Notes/{$proposal.jobID}'><span class="wizard-step-description">Notes &nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Media/{$proposal.jobID}'><span class="wizard-step-description">Upload &nbsp;</span></a> </span> </li
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
                <span class="wizard-step-number">7</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/clientReminder/{$proposal.jobID}'><span class="wizard-step-description" style="color: #000000;">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">

       {include file='projects/_proposalheader.tpl'}

           <form action="{$SITE_URL}workorders/saveProposalEmailReminder/{$pid}"  name="dataform" id="dataform" class="panel" method="POST">
               <input type="hidden" name="jnotJordId" id="jnotJordId" value="0">
               <input type="hidden" name="jobID" id="jobID" value="{$pid}">

               <!-- row -->
               <!-- begin row -->
               <div class="row">
               	<div class="col-sm-6">
                	<div class="form-group no-margin-hr">
                    	<label class="control-label">Select An Email Template</label>
                        <select class="form-control" name="jnotEmailTemplate" id="jnotEmailTemplate">
                        	{foreach from=$templates item=template}
                            <option value={$template.ID}>{$template.title}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Mark This Proposal As Hot</label>
                           <input type="checkbox" name="ishot" id="ishot" value="1" class="form-control">
                       </div>
               </div>
               <div class="row">
                   <div class="col-sm-12">
                       <div class="form-group no-margin-hr"> 
                           <label class="control-label">Extra Content To Go In Email</label>
                           <textarea rows="3" id="tinyMCETextarea" name="jnotNote" class="form-control"></textarea>
                       </div>
                   </div>
               </div>
               
               <!-- row -->

                        
                  <div class="col-sm-3">
                          <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="{$userInfo['USER_EMAIL']}" class="checkbox-inline">
                          <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="{$proposal.cntPrimaryEmail}" class="checkbox-inline">
                          <input type="hidden" id="cnotSendNoteTo" name="cnotjobID" value="{$proposal.jobID}" class="checkbox-inline">
                  </div>
               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Set Follow Up Email</a>
                   </div>

               </div>
           </form>

       <!-- /11. $JQUERY_DATA_TABLES -->
       <!-- /11. $JQUERY_DATA_TABLES -->

   </div>
</div>

