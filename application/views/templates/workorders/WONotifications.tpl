
<script type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });


    function CHECKIT(form)
    {

        form.submit();
    }

    function test(form)
    {

        if(form.tinyMCETextarea.value == '')
        {
            alert('You must enter a note');
            form.jnotNote.focus();
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


<div class="panel">
{IF $USER_ROLE eq 4 OR  $USER_ROLE eq 5}
{ELSE}
    {include file='workorders/_workorderwizrdmenu.tpl'}
{/IF}
   <div class="panel-body">


   <div id="Proposalheader">
       <h2> <span  class="fa fa-truck" style="background:{$services.catcolor};">&nbsp;</span>{$details.jordName} {IF $details.jordStatus eq "COMPLETED"}<span class='alert-info'>COMPLETED</span>{/IF}</h2>
               {include file='workorders/_workorderheader.tpl'}

   </div>
   
   <form action="{$SITE_URL}workorders/saveWOEmail/{$pid}/{$sid}"  name="dataform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="{$pid}">
               <input type="hidden" name="workOrderID" id="workOrderID" value="{$sid}">


<!-- begin row -->

               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Work Order Email Body</label>
                           <textarea rows="3" id="tinyMCETextarea" name="jnotNote" class="form-control"></textarea>
                       </div>
                   </div>
                    <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Work Order Email Subject</label>
                           <input type="text" name="jnotEmailTitle" id="jnotEmailTitle" class="form-control">
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Reminder Date</label>
                           <div class="input-group date" id="bs-datepicker-component">
                               <input type="text" id="jnotReminderDate" name="jnotReminderDate"
                                      class="form-control">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                       </div>
                   </div>
                   
                   <div class="col-sm-3">
                      <div class="form-group no-margin-hr">
                           <label class="control-label">Send Email Immediately After Saving</label>
                           <input type="checkbox" id="cnotSendNoteNow" name="cnotSendNoteNow" value="1" class="checkbox-inline">
                      </div>
                   	 </div>
                        
                  <div class="col-sm-3">
                          <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="{$userInfo['USER_EMAIL']}" class="checkbox-inline">
                          <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="{$proposal.cntPrimaryEmail}" class="checkbox-inline">
                  </div>
               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save Email</a>
                   </div>

               </div>
           </form>


   </div>
   </div>