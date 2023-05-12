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

        return true;

    }

</script>
<form method="post" action="{$SITE_URL}crm/saveQuickAdd/{$id}" id="quickadd">
    <input type="hidden" id="cntId" name="cntId" value="{$id}">
   <input type="hidden" id="cat_id" name="cat_id" value="{$cat_id}">

    <div class="row">
        <div class="col-sm-3">
<!--
        {IF $cat_id eq 8}
         Company   Name:
    {ELSE}
        Development   Name:
    {/IF}

            -->
    <input type="text" name="cntFirstName" id="cntFirstName" size="35" placeholder="Name">
        </div>

  </div>


    <div class="row">
        <div class="col-sm-2">
            <a href="Javascript:QADD(this.quickadd);" class="btn btn-primary btn-labeled">Save and Continue</a>
        </div>

    </div>

</form>
