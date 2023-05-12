
<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<script>
    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" }
        }  );
        //$('#jq-datatables-example_wrapper .table-caption').text('Some header text');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });



    function ShowTasks(username, id)
    {
        alert('We are here');
//       Swoop('{$SITE_URL}tasks/openTaskForm/'+ id,'400','400');

    }

</script>


<div class="panel" >
<div class="panel-heading">

    <h2>Employees</h2>
    <a class="topbut btn btn-success" href="{$SITE_URL}crm/CreateEmployee/"><span class="btn-label icon fa fa-male"></span> Add Employee</a>

</div>
<div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
                <thead>
                <tr>
                    <th >Name</th>
                    <th >Email</th>
                    <th >Phone</th>


                    <th >Picture</th>
                    <th style='width:10%;'>Tools</th>
                </tr>
                </thead>
                <tbody>
                {assign var=odd value='odd gradeA'}
                {assign var=even value='even gradeA'}
                {foreach $data as $d}
                    {IF $d.cntStatusId eq 0}
                        <tr class="alert-danger">
                    {ELSE}

                        <tr class="{cycle values="$odd,$even"}">

                    {/IF}
                    <td><span class="note-title"><a href='{$SITE_URL}crm/editEmployee/{$d.cntId}' >{$d.cntFirstName} {$d.cntLastName}</a></span><br />Title:{$d.cntJobTitle}<br />Role:
                        {IF $d.cntRole eq 1}
                        <span class="alert-danger">{$system_roles[$d.cntRole - 1]}</span>
                    {ELSE}
                    {$system_roles[$d.cntRole - 1]}
                    {/IF}

                        {IF $d.cntStatusId eq 0}
                    <br /><span class="alert-danger">DISABLED</span>
                        {/IF}
                    </td>
                    <td class="text-center">{$d.cntPrimaryEmail}</td>
                    <td class="text-center">{$d.cntPrimaryPhone}</td>

                    <!--<td class="text-center">{$d.cntHireDate}</td>
                    <td class="text-center">{$d.note_count}</td> -->

                    {IF $d.cntAvatar && $d.cntAvatar != 'NULL'}
                        <td class="text-center"><a href="{$SITE_URL}media/crm/{$d.cntAvatar}" target='image'><img src="{$SITE_URL}media/crm/{$d.cntAvatar}" border="0" alt="User Avatar" width='60' /></a></td>
                    {ELSE}
                        <td class="text-center"><img src="{$SITE_URL}assets/images/pixel-admin/avatar.png" border="0" alt="No Avatar" width='60' /> </td>
                    {/IF}
                    <td class="text-center">
                        <a href="Javascript:ShowTools('{$d.cntFirstName} {$d.cntLastName}','{$d.cntId}','crm/showEmpTools');" title="Show Tools"><img src="{$SITE_URL}/images/tools2.gif" border="0" alt="Tools" width="26" height="26" VALIGN='top'></a>
  <!--
                        <span class="btn-label icon fa fa-angle-right"></span>&nbsp;<a href="{$SITE_URL}crm/editEmployee/{$d.cntId}">Edit</a>
                    <br/>
                        <span class="btn-label icon fa fa-angle-right"></span>&nbsp;<a href="{$SITE_URL}crm/employeeNotes/{$d.cntId}">Notes</a>
-->
                    </td>
                </tr>
            {/foreach}



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /11. $JQUERY_DATA_TABLES -->
