<script type="text/javascript">


    function QADD(form)
    {
        if(!testqa(form)){ return;
        }

        form.submit();
    }

    function testqa(form)
    {

        if(form.cntFirstName.value == '')
        {
            alert('You must enter a value for name');
            form.cntFirstName.focus();
            return false;
        }

        if ($('input[name=cntcid]:checked').length > 0)
        {

        }
        else
        {
            alert('You must select a contact category');
            form.cntcid.focus();
            return false;

        }



        return true;

    }

</script>
<form method="post" action="{$SITE_URL}crm/saveQuickAdd/{$id}" id="quickadd">
    <input type="hidden" id="cntId" name="cntId" value="{$id}">
    <input type="hidden" name="beenhere" value="1">
    <input type="hidden" id="cntQualified" name="cntQualified" value="1" >
     <input type="hidden" name="cntSalutation" value="">
     <input type="hidden" name="cntLastName" value="">
     <input type="hidden" name="cntMiddleName" value="">
     <input type="hidden" name="cntGender" value="M">



    <div class="row">

        <div class="col-sm-10">
            <div class="form-group no-margin-hr">
                <label class="control-label"><span style="color:red;">*</span>Primary Category</label> <ul>
                   {if $catlist}
{foreach $catlist as $c}
                <li> <input type="radio" id="cntcid" name="cntcid" class="form-control-inline" value ="{$c.ccatId}"> &nbsp;{$c.ccatName}</li>
{/foreach}
                   {/if}
            </ul>
            </div>
        </div>


    </div>
    <!-- row -->

    <div class="row">

            <div class="col-sm-5">
                <div class="form-group no-margin-hr">
                    <label class="control-label"><span style="color:red;">*</span>Name</label>
                    <input type="text" id="cntFirstName" name="cntFirstName" class="form-control">
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group no-margin-hr">
                    <label class="control-label"><span style="color:red;">*</span>Primary Contact</label>
                    <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control">
                </div>
            </div>


        </div>
        <!-- row -->



    <!-- begin row -->
    <div class="row">

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Phone</label>
                <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" type="number"   class="form-control">
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Cell</label>
                <input type="text" id="cntAltPhone1" name="cntAltPhone1" type="number"   class="form-control">
            </div>
        </div>


        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Fax</label>
                <input type="text" id="cntAltPhone2" name="cntAltPhone2" type="number"  class="form-control">
            </div>
        </div>


    </div>
    <!-- row -->


    <!-- begin row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label"><span style="color:red;">*</span>Primary Email</label>
                <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" onChange="Javascript:checkEmail(this.value);">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">Alternate Email</label>
                <input type="text" id="cntAltEmail" name="cntAltEmail" class="form-control">
            </div>
        </div>

    </div>
    <!-- row -->


    <!-- begin row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label"> Address Line 1</label>
                <input type="text" id="cntPrimaryAddress1" name="cntPrimaryAddress1" class="form-control" size="45">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">Address line 2</label>
                <input type="text" id="cntPrimaryAddress2" name="cntPrimaryAddress2" class="form-control"  size="45">
            </div>
        </div>

    </div>
    <!-- row -->
    <!-- begin row -->
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">City</label>
                <input type="text" id="cntPrimaryCity" name="cntPrimaryCity" class="form-control">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label"> State</label>
                <select id="cntPrimaryState" name="cntPrimaryState" class="form-control">
                    {$states}
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group no-margin-hr">
                <label class="control-label">Zip Code</label>
                <input type="text" id="cntPrimaryZip" name="cntPrimaryZip" class="form-control">
            </div>
        </div>

    </div>
    <!-- row -->
    <div class="row">
        <div class="col-sm-2">
            <a href="Javascript:QADD(this.quickadd);" class="btn btn-primary btn-labeled">Save and Continue</a>
        </div>

    </div>

</form>
