<script type="text/javascript">

    $( document ).ready(function() {

    $('.myclass').each(function(){
        $(this).attr('oldval',$(this).val());
    });

    $('.myclass').on('change',function(){
        var val = $(this).val();
        var toldval = $(this).attr('oldval');
        if(val != $(this).attr('oldval') ){

            if(parseFloat(val) != val)
            {
                alert('You must always enter a valid number.');
                $(this).val(toldval);
                $(this).focus();
            }

        }
    });


    });


   function CHECKPRICE(form)
    {
        if(!testprice(form)){ return;
    }
    form.submit();
    }

    function testprice(form)
    {

        if(parseFloat(form.STANDARD.value) != form.STANDARD.value)
        {
            alert('You must enter a valid number for STANDARD');
            form.STANDARD.focus();
            return false;
        }
        if(parseFloat(form.PFS.value) != form.PFS.value || parseFloat(form.PFS.value) > parseFloat(form.STANDARD.value))
        {
            alert('You must enter a valid number for PFS, that is lower or equal to our "Standard Rate"');
            form.PFS.focus();
            return false;
        }


        if(parseFloat(form.All_Striping.value) != form.All_Striping.value || parseFloat(form.All_Striping.value) > parseFloat(form.STANDARD.value))
        {
            alert('You must enter a valid number for All Striping, that is lower or equal to our "Standard Rate"');
            form.All_Striping.focus();
            return false;
        }


        if(parseFloat(form.Native_Lines.value) != form.Native_Lines.value || parseFloat(form.Native_Lines.value) > parseFloat(form.STANDARD.value))
        {
            alert('You must enter a valid number for Native Lines, that is lower or equal to our "Standard Rate"');
            form.Native_Lines.focus();
            return false;
        }


        if(parseFloat(form.Scott_Munroe.value) != form.Scott_Munroe.value  || parseFloat(form.Scott_Munroe.value) > parseFloat(form.STANDARD.value))
        {
            alert('You must enter a valid number for Scott Munroe, that is lower or equal to our "Standard Rate"');
            form.Scott_Munroe.focus();
            return false;
        }






        return true;

    }

</script>
<div class="panel" >
<div class="panel-heading">

    <h2>Multi Vendor Striping Pricing</h2>
    <a class="topbut btn btn-success" href="{$SITE_URL}resources/addMultivendor/"><span class="btn-label icon fa fa-shield"></span> Add Multi Vendor Services</a>

</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" style="width:100%;" id="jq-datatables-example">
    <tr style='background:#7dcde5'>
                    <td >Service</td>
                    <td >Description</td>
                    <td >Standard Rate</td>
                    <td >PFS</td>
                    <td >All Striping</td>
                    <td >Native Lines</td>
                    <td >Scott Munroe</td>
                    <td >Update</td>
                </tr>

     {assign var="zcount" value=0}
            {foreach $data as $d}

              {$zcount = $zcount + 1}
              {IF $zcount eq 10}
                <tr style='background:#7dcde5'>
                    <td >Service</td>
                    <td >Description</td>
                    <td >Standard Rate</td>
                    <td >PFS</td>
                    <td >All Striping</td>
                    <td >Native Lines</td>
                    <td >Scott Munroe</td>
                    <td >Update</td>
                </tr>
                {$zcount = 0}

            {/IF}
                <form method="POST" name="dataform{$d.ScatID}" id="dataform{$d.ScatID}"  action="{$SITE_URL}resources/saveMultiVendor/{$d.ScatID}">
                    <input type="hidden" name="beenhere" value="1">
                    <input type="hidden" name="ScatID" value="{$d.ScatID}">
                <tr style='background:#ffffff'>
                    <td class="text-left" style='background:#e3e3e3'>{$d.SERVICE}</td>
                    <td class="text-left"><textarea class="form-control" id='SERVICE_DESC{$d.ScatID}' name='SERVICE_DESC' rows='2'>{$d.SERVICE_DESC}</textarea>
                        </td>
                    <td class="text-center">


                         <input type='text' class="myclass" size="4" name='STANDARD' value='{$d.STANDARD|number_format:2:".":","}'>
                    </td>
                    <td class="text-center"><input type='text' class="myclass" size="4"  name='PFS' value='{$d.PFS|number_format:2:".":","}'></td>
                    <td class="text-center"><input type='text' class="myclass" size="4"  name='All_Striping' value='{$d.All_Striping|number_format:2:".":","}'></td>
                    <td class="text-center"><input type='text' class="myclass" size="4"  name='Native_Lines' value='{$d.Native_Lines|number_format:2:".":","}'></td>
                    <td class="text-center"><input type='text' class="myclass" size="4"  name='Scott_Munroe' value='{$d.Scott_Munroe|number_format:2:".":","}'></td>
                    <td class="text-center">
                            <input type="button" value="Update" onClick="CHECKPRICE(this.form);" />
                            </form>
                    </td>
                </tr>
            {/foreach}

       </table>

</div>
    </div>
</div>

