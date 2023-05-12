<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.PODocTypeName.value == '')
        {
            alert('You must enter a value for document type');
            form.PODocTypeName.focus();
            return false;
        }


        return true;

    }
    /*equipName Ascending 	equipRate 	equipCost 	equipMinCost

     */
</script>


<div class="panel">
    <div class="panel-heading">

        <h2>Add Document Type</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}resources/DocTypesList/"><span class="btn-label icon fa fa-wrench"></span> List Document Types</a>
    </div>
    <div class="panel-body">
        <form action="{$SITE_URL}resources/saveDocTypes"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Document Type</label>
                        <input type="text" id='PODocTypeName' name="PODocTypeName" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Prints</label>
                        <select id='PODocTypeSection' name="PODocTypeSection" class="form-control">
                            <option value='1'>One Per page</option>
                            <option value='2'>Two per page</option>
                            </select>
                    </div>
                </div>

            </div>
            <!-- row -->
    <!-- buton row -->
        <div class="row">
        <div class="col-sm-4">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save And Continue</a>
        </div>
<div class="col-sm-4">
        <a href="{$SITE_URL}resources/DocTypesList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




