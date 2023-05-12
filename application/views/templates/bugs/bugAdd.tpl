<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.bugReport.value == '')
        {
            alert('You must enter bug report description');
            form.bugReport.focus();
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

        <h2>Bug Report</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}bugs/"><span class="btn-label icon fa fa-asterisk"></span> List Bugs</a>
    </div>
    <div class="panel-body">
        <form action="{$SITE_URL}bugs/save"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Project:</label> 3D Paving
                        <input type="hidden" id='bugProject' name="bugProject" value ="3D Paving">
                    </div>
                </div>

            </div>
            <!-- row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Bug Reported Date: </label> {$CurrentDate}
                        <input type="hidden" id='bugReportedDate' name="bugReportedDate" value ="{$CurrentDate}">
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Bug Reported By:</label> {$USER_FULLNAME}
                        <input type="hidden" id='bugReportedBy' name="bugReportedBy" value ="{$USER_FULLNAME}">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Bug URL:</label>
                        <input type="text" id='bugURL' name="bugURL" class="form-control form-group-margin">
                    </div>
                </div>
            </div>
            <!-- row -->



            <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Report</label>
                        <textarea class="form-control form-group-margin" name="bugReport" id="bugReport"></textarea>
                    </div>
                </div>
            </div>
            <!-- row -->

    <!-- buton row -->
        <div class="row">
        <div class="col-sm-3">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Bug</a>
        </div>
        <div class="col-sm-3">
        <a href="{$SITE_URL}bugs/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




