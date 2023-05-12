


<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.ccatName.value == '')
        {
            alert('You must enter a value for category');
            form.ccatName.focus();
            return false;
        }


        return true;

    }


</script>


<div class="panel">
    <div class="panel-heading">

        <h2>CRM Category</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}crm/categoryList/"><span class="btn-label icon fa fa-check"></span> List Categories</a>
    </div>
    <div class="panel-body">
        <form action="{$SITE_URL}crm/saveCategory/"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Category</label>
                        <input type="text" id="ccatName" name="ccatName" class="form-control" >
                    </div>
                </div>

            </div>
            <!-- row -->


    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Category</a>
        </div>
<div class="col-sm-2">
        <a href="{$SITE_URL}crm/categoryList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




