
<script type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

    });


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.jnotNote.value == '')
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

    {include file='workorders/_workorderwizrdmenu.tpl'}

    <div class="panel-body">

        {assign var="lead" value="Notes For "}

        {include file='workorders/_workorderheader.tpl'}

       {IF $edit}

           <form action="{$SITE_URL}workorders/saveWONote/{$pid}/{$edit['jnotId']}"  name="userform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="{$pid}">
               <input type="hidden" name="jnotId" id="jnotId" value="{$edit['jnotId']}">

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Related to Service</label>
                           <select id="jnotJordId" name="jnotJordId" class="form-control">
                               <option value="{$edit['jnotJordId']}">{IF $edit['jnotJordId'] eq 0}Entire Proposal{ELSE}{$edit['jordName']}{/IF}</option>
                               <option value="0">Entire Proposal</option>
                               {foreach $services as $s}
                                   <option value="{$s['jordID']}">{$s['jordName']}</option>
                               {/foreach}
                           </select>
                       </div>
                   </div>
               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Work Order Note</label>
                           <textarea rows="3" id="jnotNote" name="jnotNote" class="form-control">{$edit['jnotNote']}</textarea>
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Set Reminder</label>
                           <input type="checkbox"  id="jnotReminder" name="jnotReminder" value="1" class="checkbox-inline"  {IF $edit['jnotReminder']} checked {/IF}>
                       </div>
                   </div>

                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Reminder Date</label>
                           <div class="input-group date" id="bs-datepicker-component">
                               <input type="text" id="jnotReminderDate" name="jnotReminderDate" value="{$edit['jnotReminderDate']|date_format:"%m/%d/%Y"}"
                                      class="form-control">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                           </div>
                       </div>
                   </div>
                   
                   <div class="col-sm-3">
                      <div class="form-group no-margin-hr">
                           <label class="control-label">Share Note With Customer</label>
                           <input type="checkbox" id="cnotSendNote" name="cnotSendNote" value="1" class="checkbox-inline">
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
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Note</a>
                   </div>

               </div>
           </form>

       {ELSE}
           <form action="{$SITE_URL}workorders/saveWONote/{$pid}"  name="dataform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="{$pid}">


<!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Related to Service</label>
                           <select id="jnotJordId" name="jnotJordId" class="form-control">
                               <option value="0">Entire Proposal</option>
                               {foreach $services as $s}
                                   <option value="{$s['jordID']}">{$s['jordName']}</option>
                               {/foreach}
                           </select>
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Work Order Note</label>
                           <textarea rows="3" id="jnotNote" name="jnotNote" class="form-control"></textarea>
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Set Reminder</label>
                           <input type="checkbox"  id="jnotReminder" name="jnotReminder" value="1" class="checkbox-inline">
                       </div>
                   </div>
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
                           <label class="control-label">Share Note With Customer</label>
                           <input type="checkbox" id="cnotSendNote" name="cnotSendNote" value="1" class="checkbox-inline">
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
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Note</a>
                   </div>

               </div>
           </form>

       {/IF}
       <!-- /11. $JQUERY_DATA_TABLES -->
       <div class="table-primary">
           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
               <thead>
               <tr>
                   <th >Date Created</th>
                   <th >Note</th>
                   <th style='width:10%;'>Edit</th>
               </tr>
               </thead>
               <tbody>
               {assign var=odd value='odd gradeA'}
               {assign var=even value='even gradeA'}
               {foreach $notes as $d}
                   {IF $d.jnotNote}
                       <tr class="{cycle values="$odd,$even"}">
                           <td><span class="note-title">
                                   {$d.creator}
                                   <br/>
                                   {$d.jnotCreatedDate|date_format:"%A %B %d,  %Y at %I:%M %p"}</span>
                               {if $d.jnotJordId eq 0}<br/>Entire Proposal{else}<br/>{$d.jordName}{/if}
                           </td>
                           <td class="text-center">{$d.jnotNote}
                               {IF $d.jnotReminder}<br/><span class="alert-info"> REMINDER SET<br/>{$d.jnotReminderDate|date_format:"%B %d,  %Y"}</span>{/IF}
                           </td>
                           <td class="text-left">
                       {IF $proposal.jobStatus eq 5}
                       <span class="btn-label icon fa fa-angle-right">&nbsp;<a href="{$SITE_URL}workorders/WONotes/{$pid}/{$d.jnotId}">Edit</a>
                       {/IF}
                       </td>
                       </tr>
                   {/IF}
               {/foreach}



               </tbody>
           </table>
       </div>
       <!-- /11. $JQUERY_DATA_TABLES -->

   </div>
</div>

