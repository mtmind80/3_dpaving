
<div class="panel" >
<div class="panel-heading">
<form method="post" action="{$SITE_URL}resources/saveMaterials/" name="dataform">
    <h2>Material Costs</h2>
    <a class="topbut btn btn-success" href="Javascript:dataform.submit();"><span class="btn-label icon fa fa-fighter-jet"></span> Save Materials</a>
</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Material</th>
                    <th >Rate</th>
                    <th >Preferred Rate</th>
                </tr>
                </thead>
                <tbody>
                {assign var=odd value='odd gradeA'}
                {assign var=even value='even gradeA'}
            {foreach $data as $d}
                <tr class="{cycle values="$odd,$even"}">
                    <td><span class="note-title">{$d.matName}</span></td>
                    <td class="text-center"><input type='text' name='matcost_{$d.matID}' value='{$d.matCost}'></td>
                    <td class="text-center"><input type='text' name='mataltcost_{$d.matID}' value='{$d.matAltCost}'></td>
                </tr>
            {/foreach}



                </tbody>
            </table>
    </form>

</div>
    </div>
</div>

