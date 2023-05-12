<script type="text/javascript">


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


<div class="panel">

    {include file='workorders/_workorderwizrdmenu.tpl'}

    <div class="panel-body">


        <div id="Proposalheader">
            <h3>Letters: {$proposal.jobName} </h3>
        </div>


       <!-- row -->
       <form action="{$SITE_URL}workorders/WOLetter/1/{$pid}/1"  name="dataform" id="dataform" class="panel" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="pid" id="pid" value="{$pid}">

               <div class="row" style="background:#eeffee">
                   <h4>Check in Letter</h4>
               </div>


               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"> Client Name</label>
                           <input type="text" id="clientname" name="clientname" class="form-control"  value="{$proposal['jobPrimaryContact']}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Company Community or Development Name</label>
                           <input type="text" id="communityname" name="communityname" class="form-control"  value="{$proposal['clientfirst']} {$proposal['clientlast']}">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Address</label>
                           <input type="text" id="location" name="location" class="form-control"  value="{$proposal['jobAddress1']} {$proposal['jobAddress2']}">
                       </div>
                   </div>

               </div>
               <!-- row -->


           <!-- begin row -->
           <div class="row">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Job City</label>
                       <input type="text" id="city" name="city" class="form-control"  value="{$proposal['jobPrimaryCity']}">
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Sent By Manager</label>
                       <input type="text" id="manager" name="manager" class="form-control"  value="{$proposal['cntFirstName']} {$proposal['cntLastName']}">
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Title </label>
                       <input type="text" id="title" name="title" class="form-control"  value="Job Supervisor">
                   </div>
               </div>

           </div>
           <!-- row -->


           <!-- begin row -->
           <div class="row">
               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Job City</label>
                       <input type="text" id="city" name="city" class="form-control"  value="{$proposal['jobPrimaryCity']}">
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label"> Sent By Manager</label>
                       <input type="text" id="manager" name="manager" class="form-control"  value="{$proposal['cntFirstName']} {$proposal['cntLastName']}">
                   </div>
               </div>

               <div class="col-sm-4">
                   <div class="form-group no-margin-hr">
                       <label class="control-label">Start Date </label>
                       <input type="text" id="title" name="title" class="form-control"  value="Job Supervisor">
                   </div>
               </div>

           </div>
           <!-- row -->

               <!-- begin row -->
            <div class="row" >

               <div class="col-sm-5" >
                   <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Print Letter</a>
               </div>

           </div>


       </form>


    </div>

        </div>




