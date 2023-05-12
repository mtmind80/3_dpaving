


<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.cservName.value == '')
        {
            alert('You must enter a value for service');
            form.cservName.focus();
            return false;
        }


        return true;

    }


</script>


<div class="panel">
    <div class="panel-heading">

        <h2>CRM Service</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}crm/servicesList/"><span class="btn-label icon fa fa-clipboard"></span> List Services</a>
    </div>
    <div class="panel-body">
        <form action="{$SITE_URL}crm/saveServices/"  name="dataform" id="dataform" class="panel" method="POST">
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Service</label>
                        <input type="text" id="cservName" name="cservName" class="form-control" >
                    </div>
                </div>

            </div>
            <!-- row -->


    <!-- buton row -->
        <div class="row">
        <div class="col-sm-2">
        <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Add Service</a>
        </div>
<div class="col-sm-2">
        <a href="{$SITE_URL}crm/servicesList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




