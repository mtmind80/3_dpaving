<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.cmpServiceName.value == '')
        {
            alert('You must enter a value for service name');
            form.cmpServiceName.focus();
            return false;
        }

        if(form.cmpServiceDefaultRate.value != parseFloat(form.cmpServiceDefaultRate.value))
        {
            alert('You must enter a number for equipment cost');
            form.cmpServiceDefaultRate.value = 0;
            form.cmpServiceDefaultRate.focus();
            return false;
        }

        if(form.cmpServicePreferredRate.value != parseFloat(form.cmpServicePreferredRate.value))
        {
            alert('You must enter a number for equipment minimum cost');
            form.cmpServicePreferredRate.value = 0;
            form.cmpServicePreferredRate.focus();
            return false;
        }
        return true;

    }
    /*
     cmpServiceID 	cmpServiceCat 	cmpServiceName 	cmpServiceDesc 	cmpServiceCreatedby
     cmpServiceDefaultRate 	cmpServicePreferredRate 	cmpServiceOption 	cmpServiceUpdatedby 	cmpServiceLastUpdate

     */
</script>


<div class="panel">
    <div class="panel-heading">

        <h2>Add Service</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}resources/serviceList/"><span class="btn-label icon fa fa-shield"></span> List Services</a>
    </div>
    <div class="panel-body">
        <form action="{$SITE_URL}resources/saveService/"  name="dataform" id="dataform" class="panel" method="POST">

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Service Category</label>
                        <select class="form-control form-group-margin" name="cmpServiceCat" id="cmpServiceCat">
                            {foreach $serviceslist as $s}

                            <option value="{$s.catname}">{$s.catname}</option>
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
                        <label class="control-label">Service Name</label>
                        <input type="text" id="cmpServiceName" name="cmpServiceName" class="form-control">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Service Description</label>
                        <textarea rows="3" id="cmpServiceDesc" name="cmpServiceDesc" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <!-- row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Options</label>
                        <textarea rows="3" id="cmpServiceOption" name="cmpServiceOption" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Default Rate</label>

                        <input type="text" id="cmpServiceDefaultRate" name="cmpServiceDefaultRate" class="form-control">

                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Preferred Rate</label>

                        <input type="text" id="cmpServicePreferredRate" name="cmpServicePreferredRate" class="form-control">

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
        <a href="{$SITE_URL}resources/equipmentList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




