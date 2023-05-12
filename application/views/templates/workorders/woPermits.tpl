
<script type="text/javascript">


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.wopNumber.value == '')
        {
            alert('You must enter a permit number');
            form.wopNumber.focus();
            return false;
        }

        if(form.wopfee1.value != parseFloat(form.wopfee1.value))
        {
            alert('You must enter a valid number for fee');
            form.wopfee1.value = 0;
            form.wopfee1.focus();
            return false;
        }
        if(form.wopfee2.value != parseFloat(form.wopfee2.value))
        {
            alert('You must enter a valid number for fee');
            form.wopfee2.value = 0;
            form.wopfee2.focus();
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


    {assign var="lead" value="Permits For "}

    {include file='workorders/_workorderheader.tpl'}
        {IF $USER_ROLE eq 1 OR $USER_ROLE eq 6}
       {IF $edit}

           <form action="{$SITE_URL}workorders/saveWOPermit/{$pid}/{$edit['wopID']}"  name="dataform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="{$pid}">
               <input type="hidden" name="wopID" id="wopID" value="{$edit['wopID']}">

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-8">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Edit Permit for Service</label>
                           <select id="wopjordID" name="wopjordID" class="form-control" >
                               <option value="{$edit.wopjordID}">{$edit.jordName}</option>
                               {foreach $services as $s}
                                   <option value="{$s.jordID}">{$s.jordName}</option>
                               {/foreach}
                               </select>
                       </div>
                   </div>

               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Number</label>
                           <input type="text" id="wopNumber" name="wopNumber" class="form-control" value="{$edit.wopNumber}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit County</label>
                           <input type="text" id="wopCounty" name="wopCounty" class="form-control" value="{$edit.wopCounty}">
                       </div>
                   </div>

               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Submit Fee</label>
                           <input type="text" id="wopfee1" name="wopfee1" class="form-control" value="{$edit.wopfee1}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Additional Fee</label>
                           <input type="text" id="wopfee2" name="wopfee2" class="form-control" value="{$edit.wopfee2}">
                       </div>
                   </div>

               </div>

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Type</label>
                           <select id="wopType" name="wopType" >
                               <option value="{$edit.wopType}">{$edit.wopType}</option>
                               {foreach $wtype as $w}
                                   <option value="{$w.wopType}">{$w.wopType}</option>
                               {/foreach}
                               </select>
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Status</label>
                           <select id="wopStatus" name="wopStatus" >
                               <option value="{$edit.wopStatus}">{$edit.wopStatus}</option>
                               {foreach $wstatus as $w}
                                   <option value="{$w.wopStatus}">{$w.wopStatus}</option>
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
                           <label class="control-label">Permit Note</label>
                           <textarea rows="3" id="wopNote" name="wopNote" class="form-control">{$edit['wopNote']}</textarea>
                       </div>
                   </div>
               </div>
               <!-- row -->

       {ELSE}
           <form action="{$SITE_URL}workorders/saveWOPermit/{$pid}"  name="dataform" id="dataform" class="panel" method="POST">

               <input type="hidden" name="jobID" id="jobID" value="{$pid}">
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-8">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Create New Permit For Service</label>
                           <select id="wopjordID" name="wopjordID" class="form-control" >
                               {foreach $services as $s}
                                   <option value="{$s.jordID}">{$s.jordName}</option>

                               {/foreach}

                           </select>
                       </div>
                   </div>

               </div>
               <!-- row -->

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Number</label>
                           <input type="text" id="wopNumber" name="wopNumber" class="form-control">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit County</label>
                           <input type="text" id="wopCounty" name="wopCounty" class="form-control">
                       </div>
                   </div>

               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Submit Fee</label>
                           <input type="text" id="wopfee1" name="wopfee1" class="form-control">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Additional Fee</label>
                           <input type="text" id="wopfee2" name="wopfee2" class="form-control">
                       </div>
                   </div>

               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Type</label>
                           <select id="wopType" name="wopType" >
                               {foreach $wtype as $w}
                                   <option value="{$w.wopType}">{$w.wopType}</option>
                               {/foreach}
                           </select>
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Status</label>
                           <select id="wopStatus" name="wopStatus" >
                               {foreach $wstatus as $w}
                                   <option value="{$w.wopStatus}">{$w.wopStatus}</option>
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
                           <label class="control-label">Permit Note</label>
                           <textarea rows="3" id="wopNote" name="wopNote" class="form-control"></textarea>
                       </div>
                   </div>
               </div>
               <!-- row -->


       {/IF}
               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
                   </div>

               </div>
           </form>

       <!-- /11. $JQUERY_DATA_TABLES -->
       <div class="table-primary">
           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
               <thead>
               <tr>
                   <th >Permit</th>
                   <th >Status</th>
                   <th >Note</th>
                   <th style='width:10%;'>Log</th>
                   <th style='width:10%;'>Edit</th>
                   <th style='width:10%;'>Delete</th>
               </tr>
               </thead>
               <tbody>
               {assign var=odd value='odd gradeA'}
               {assign var=even value='even gradeA'}
               {foreach $permitslist as $d}
                       <tr class="{cycle values="$odd,$even"}">
                           <td class="text-justify">Permit number: <a href="{$SITE_URL}workorders/WOPermits/{$pid}/{$d.wopID}"><span class="note-title">{$d.wopNumber}</span></a>
                           <br/>{$d.jordName}
                           </td>

                           <td>
                               {IF $d.wopStatus eq 'Completed'}
                               <span class="alert-success">STATUS:{$d.wopStatus}</span>
                               {else}
                                   <span class="alert-danger">STATUS:{$d.wopStatus}</span>
                               {/IF}
                               <br />
                               COUNTY:{$d.wopCounty}
                              <br />
                              {$d.wopCreatedDate|date_format:"%A %B %d,  %Y at %I:%M %p"}
                               <br />Hours Spent:
                               {IF $d.loghours}
                                {$d.loghours}
                               {ELSE}
                               0
                               {/IF}
                           </td>
                           <td >{$d.wopNote}</td>
                           <td class="text-center"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="{$SITE_URL}workorders/WOPermitLog/{$pid}/{$d.wopID}">Log</a></td>
                           <td class="text-center"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="{$SITE_URL}workorders/WOPermits/{$pid}/{$d.wopID}">Edit</a></td>
                           <td class="text-center"><span class="btn-label icon fa fa-angle-right">&nbsp;<a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/removePermit/{$pid}/{$d.wopID}','You are about to delete this permit and all records associated with it.\nAre you sure?');">Delete</a></td>
                       </tr>

               {/foreach}



               </tbody>
           </table>
       </div>
       <!-- /11. $JQUERY_DATA_TABLES -->
               {/IF}

   </div>
</div>

