<script type="text/javascript">

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.SERVICE_DESC.value == '')
        {
            alert('You must enter a value for service description');
            form.SERVICE_DESC.focus();
            return false;
        }

        if(form.STANDARD.value != parseFloat(form.STANDARD.value))
        {
            alert('All prices must be valid numbers');
            form.STANDARD.focus();
            return false;
        }

        if((form.STANDARD.value < form.PFS.value) || (form.STANDARD.value < form.All_Striping.value) || (form.STANDARD.value < form.Native_Lines.value) || (form.STANDARD.value < form.Scott_Munroe.value) )
        {
            alert('The Standard price MUST ALWAYS be the highest price.');
            form.STANDARD.focus();
            return false;
        }

        if(form.PFS.value != parseFloat(form.PFS.value))
        {
            alert('All prices must be valid numbers');
            form.PFS.focus();
            return false;
        }
        if(form.All_Striping.value != parseFloat(form.All_Striping.value))
        {
            alert('All prices must be valid numbers');
            form.All_Striping.focus();
            return false;
        }
        if(form.Native_Lines.value != parseFloat(form.Native_Lines.value))
        {
            alert('All prices must be valid numbers');
            form.Native_Lines.focus();
            return false;
        }
        if(form.Scott_Munroe.value != parseFloat(form.Scott_Munroe.value))
        {
            alert('All prices must be valid numbers');
            form.Scott_Munroe.focus();
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

        <h2>Add Multi-Vendor Service</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}resources/multivendorList/"><span class="btn-label icon fa fa-shield"></span> List Multi Vendor Services</a>
    </div>
    <div class="panel-body">

        <form action="{$SITE_URL}resources/saveMultivendor/"  name="dataform" id="dataform" class="panel" method="POST">
            <input type="hidden" name="beenhere" value="1">

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Service Category</label>
                        <select class="form-control form-group-margin" name="SERVICE" id="SERVICE">
                            <option value="0">Select a Service Category</option>
                            {foreach $services as $s}

                            <option value="{$s.SERVICE}">{$s.SERVICE}</option>
                        {/foreach}
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Create New Service Category</label>
                        <input type="text" id="OTHER_SERVICE" name="OTHER_SERVICE" class="form-control">
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Short Description</label>
                        <input type="text" id="SERVICE_DESC" name="SERVICE_DESC" class="form-control">
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Standard Price</label>
                        <input type="text" id="STANDARD" name="STANDARD" size='4' class="form-control" value="0">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">PFS</label>
                        <input type="text" id="PFS" name="PFS" size='4' class="form-control"  value="0">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">All Striping</label>
                        <input type="text" id="All_Striping" name="All_Striping" size='4' class="form-control"  value="0">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Native Lines</label>
                        <input type="text" id="Native_Lines" name="Native_Lines" size='4' class="form-control"  value="0">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Scott Munroe</label>
                        <input type="text" id="Scott_Munroe" name="Scott_Munroe" size='4' class="form-control" value="0">
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
        <a href="{$SITE_URL}resources/multivendorList/" class="btn btn-primary btn-labeled">Cancel</a>
        </div>
        </div>
        </form>
        </div>
        </div>




