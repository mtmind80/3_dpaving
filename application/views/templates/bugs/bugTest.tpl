<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.bugFixedNote.value == '')
        {
            alert('You must enter a note ');
            form.bugFixedNote.focus();
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
     bugFixedNote

     */
</script>


<div class="panel">
    <div class="panel-heading">

        <h2>Bug Report Validation</h2>
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
                        <label class="control-label">Tested Date: </label> {$CurrentDate}
                        <input type="hidden" id='bugTestedDate' name="bugTestedDate" value ="{$CurrentDate}">
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Tested By:</label> {$USER_FULLNAME}
                        <input type="hidden" id='bugTestedBy' name="bugTestedBy" value ="{$USER_FULLNAME}">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Fixed</label>
                        <input type="radio" value="1" name="bugFixed" > YES
                        <input type="radio" value="0" name="bugFixed" > NO
                    </div>
                </div>
            </div>
            <!-- row -->

              <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Note</label>
                        <textarea class="form-control form-group-margin" name="bugFixedNote" id="bugFixedNote"></textarea>
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




