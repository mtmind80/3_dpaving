
<script type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

        $('#bs-datepicker-component1').datepicker();

    });


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        noid = false;

        if(form.pid.value != '')
        {
            noid = true;

        }

        if(form.jobName.value != '')
        {
            noid = true;

        }


        if(form.jobcntID.value != '0')
        {
            noid = true;

        }


        if(form.jobCreatedBy.value != '0')
        {
            noid = true;

        }

        if(!noid) { // no entry must use dates
            if (form.startdate.value == '' || form.enddate.value == '') {
                alert("If using dates please enter a start date and an end date");
                return false;
            }
            if (form.startdate.value != '' && form.enddate.value != '') {
                //both dates filled in
                if( (new Date(form.startdate.value).getTime() >= new Date(form.enddate.value).getTime()))
                {
                    alert("Start date must come before end date.");
                    return false;

                }
            }
        }

        showSpinner();

        return true;

    }
</script>



<div class="panel">
    <div class="panel-heading">
          <h2>Search Proposals </h2>
    </div>

   <div class="panel-body">

           <form action="{$SITE_URL}workorders/searchPO"  name="dataform" id="dataform" class="panel" method="POST">
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Proposal ID</label>
                           <input type="text" id="pid" name="pid" class="form-control" />
                       </div>
                   </div>
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Proposal Name</label>
                           <input type="text" id="jobName" name="jobName" class="form-control" />
                       </div>

               </div>
               <div class="row">

                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Created For</label>
                           <select  id="jobcntID" name="jobcntID"
                                    class="form-control">
                               <option value="0">ANY </option>
                               {foreach $companylist as $r}
                                   <option value="{$r.jobcntID}">{$r.cntFirstName}</option>
                               {/foreach}
                           </select>
                       </div>
                   </div>
                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Created By</label>
                           <select  id="jobCreatedBy" name="jobCreatedBy"
                                      class="form-control">
                                   <option value="0">ANY </option>
                                   {foreach $managerlist as $r}
                                           <option value="{$r.cntId}">{$r.cntFirstName} {$r.cntLastName} </option>
                                   {/foreach}
                                    </select>
                       </div>
                   </div>

                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Show Rejected</label>
                           <input type="checkbox"  id="showrejected" name="showrejected" value="1" class="checkbox-inline">
                       </div>
                   </div>
               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">From Date</label>
                           <div class="input-group date" id="bs-datepicker-component">
                               <input type="text" id="startdate" name="startdate"
                                      class="form-control">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                       </div>
                   </div>
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">To Date</label>
                           <div class="input-group date" id="bs-datepicker-component1">
                               <input type="text" id="enddate" name="enddate"
                                      class="form-control">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                       </div>
                   </div>
               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Search Proposals</a>
                   </div>

               </div>
           </form>

   </div>
</div>

