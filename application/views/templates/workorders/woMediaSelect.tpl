<script type="text/javascript">



    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" },
            "pageLength": 100

        }  );
        //$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');


        $('#PrintMe').click(function() {

            showSpinner();
            $( "#pdataform" ).submit();
            setTimeout("hideSpinner()",5000);
        });



        $("#selectall").click(function(){
            //alert("just for check");
            if(this.checked){
                $('.checkboxall').each(function(){
                    this.checked = true;


                })
            }else{
                $('.checkboxall').each(function(){
                    this.checked = false;


                })
            }
        });

    });



</script>

<div class="panel">

    {include file='workorders/_workorderwizrdmenu.tpl'}



    <div class="panel-body">
        {assign var="lead" value="Select Media For "}

        {include file='workorders/_workorderheader.tpl'}


        <form action="{$SITE_URL}reports/WOToPDF/{$pid}"  name="pdataform" id="pdataform"  method="POST">
            <input type="hidden" name="pid" id="pid" value="{$pid}">
            <a id='PrintMe'  href="#" class="btn btn-light-green btn-labeled"><span class="btn-label icon fa fa-print"></span>  Print Work Order With Selected Images</a>

            <div class="table-primary">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                    <thead>
                    <tr>
                        <th colspan='4' ><input type="checkbox" id="selectall"> select all
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <th >&nbsp;</th>
                        <th >Media</th>
                        <th >Uploaded</th>
                    </tr>
                    </thead>
                    <tbody>
                    {assign var=odd value='odd gradeA'}
                    {assign var=even value='even gradeA'}
                    {foreach $medialist as $d}

                        <tr class="{cycle values="$odd,$even"}">
                            <td>
                                {IF $d.jobmdisImage}
                                    <input type='checkbox'  class='checkboxall' name='upload_{$d.jobmdId}' id='upload_{$d.jobmdId}' value ='{$d.jobmdId}'>
                                {/IF}
                            </td>
                            <td class="text-left">
                                <span class="alert-success">Description:</span> {$d.jobmdDescription}
                                <br/>
                                {$d['jordName']|default:'Entire Proposal'}
                                <br/>
                                {$d.PODocTypeName} <a href='{$SITE_URL}media/projects/{$d.jobmdFileName }' title="View Document" target='view'>View Upload</a>
                            </td>
                            <td>{$d.uploader}<br/>
                                {$d.jobmdCreatedDateTime|date_format:"%A %B %d,  %Y"}</td>
                        </tr>

                    {/foreach}



                    </tbody>
                </table>
            </div>
        </form>


    </div>

        </div>




