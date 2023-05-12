<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.bugActionTaken.value == '')
        {
            alert('You must enter bug action taken ');
            form.bugActionTaken.focus();
            return false;
        }

        return true;

    }
    /*
     bugReportedDate
     bugReportedBy
     bugReport
     bugProject
     bugURL
     bugImage
     bugActionTaken
     bugActionTakenBy
     bugActionTakenDate
     bugTestedDate
     bugTestedBy
     bugFixed

     */
</script>


<div class="panel">
    <div class="panel-heading">

        <h2>Bug Report Response</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}bugs/"><span class="btn-label icon fa fa-asterisk"></span> List Bugs</a>
    </div>
    <div class="panel-body">
        <form action="{$SITE_URL}bugs/save/{$data['bugID']}"  name="dataform" id="dataform" class="panel" method="POST">
            <input type="hidden" id='id' name="id" value ="{$data['bugID']}">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Project:</label> 3D Paving

                    </div>
                </div>

            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Action Taken Date: </label> {$CurrentDate}
                        <input type="hidden" id='bugActionTakenDate' name="bugActionTakenDate" value ="{$CurrentDate}">
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Action Taken By:</label> {$USER_FULLNAME}
                        <input type="hidden" id='bugActionTakenBy' name="bugActionTakenBy" value ="{$USER_FULLNAME}">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">URL</label>
                        {$data['bugURL']}
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Report</label>
                        {$data['bugReport']}
                    </div>
                </div>
            </div>
            <!-- row -->

              <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Action Taken</label>
                        <textarea class="form-control form-group-margin" name="bugActionTaken" id="bugActionTaken"></textarea>
                    </div>
                </div>
            </div>
            <!-- row -->

    <!-- buton row -->
        <div class="row">
        <div class="col-sm-3">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Bug</a>
        </div>
        <div class="col-sm-3">
        <a href="{$SITE_URL}bugs/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




