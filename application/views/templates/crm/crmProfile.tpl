<!-- Javascript -->

    <script type="text/javascript">

    init.push(function () {
        $('#jq-datatables-example').dataTable( {
            "dom": "<'table-header clearfix'<'table-caption'><'DT-lf'<'DT-per-page'l><'DT-search pull-right'f>>r>"+
                    "t"+
                    "<'table-footer clearfix'<'DT-label'i><'DT-pagination'p>>",
            "language": {
                "lengthMenu": "Show: _MENU_ Rows" }
        }  );
        $('#jq-datatables-example_wrapper .table-caption').text('Contact Notes');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });





var id = "{$id}";


function GoToPage(durl, id)
{

    window.location.href='{$SITE_URL}crm/' + durl + '/' + id;
}

</script>

 <div class="panel">
    <div class="panel-heading">
            <h2>{$data['cntSalutation']|default:''} {$data['cntFirstName']} {IF $data['cntMiddleName'] neq NULL}{$data['cntMiddleName']|default:'&nbsp;'}{/IF} {$data['cntLastName']}</h2>
        {$data['ccatName']}<br/>


        <a class="topbut btn btn-success" href="{$SITE_URL}crm/showCRMList"><span class="btn-label icon fa fa-male"></span> List Contacts</a>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/editContact/{$id}'><span class="wizard-step-description" >Basic Information &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='{$SITE_URL}crm/additionalInformation/{$id}'><span class="wizard-step-description">Connections &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/catandservice/{$id}'><span class="wizard-step-description">Categories and Services &nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/crmNotes/{$id}'><span class="wizard-step-description">Notes</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}crm/viewContact/{$id}'><span class="wizard-step-description" style='color: #000000;'>Profile</span></a> </span> </li
                    >
        </ul>
    </div>

   <div class="panel-body">
       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
          <div style='float:right;'>

              <a href="{$SITE_URL}reports/ProfileToPDF/{$id}" class="btn btn-sm btn-light-green "><span class="btn-label icon fa fa-save"></span> Export PDF</a>

              <button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('editContact',{$id});">Edit</button></div>
       </div>
       <!-- row -->

       <!-- begin row -->
            <div class="row">
                {IF $data.cntAvatar}
                    <div class="col-sm-2">
                            <img src="{$SITE_URL}media/crm/{$data.cntAvatar}" border="0" alt="User Avatar" width='100' />
                    </div>
                {ELSE}
                    <div class="col-sm-2">
                            <img src="{$SITE_URL}assets/images/pixel-admin/avatar.png" border="0" alt="User Avatar" width='100' />
                    </div>

                {/IF}

                <div class="col-sm-5">
                        <label>Address</label><br/>
                    {$data['cntPrimaryAddress1']}<br/>
                    {$data['cntPrimaryAddress2']|default:''}
                    {$data['cntPrimaryCity']}, {$data['cntPrimaryState']}. {$data['cntPrimaryZip']}

                </div>

                <div class="col-sm-5">
                    <label>Billing  Address</label><br/>
                    {$data['cntBillAddress1']}<br/>
                    {$data['cntBillAddress2']|default:''}
                    {$data['cntBillCity']}, {$data['cntBillState']}. {$data['cntBillZip']}

                </div>



            </div>
            <!-- row -->



       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5">
               <label>Phone/s</label><br/>
               Primary:{$data['cntPrimaryPhone']}<br/>
               Mobile:{$data['cntAltPhone1']|default:''}<br/>
               Fax:{$data['cntAltPhone2']|default:''}
           </div>

           <div class="col-sm-5">
               <label>Email: </label><br/>
               {$data['cntPrimaryEmail']}<br/>
               {$data['cntAltEmail']|default:''}
           </div>



       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5">
               <label>Created On</label>:{$data['cntCreatedDate']|date_format:"%B %d, %Y "}<br/>
               <label>Created By</label>:{$data['Creator']}
           </div>

           <div class="col-sm-5">
               <label>Primary Category</label>:{$data['ccatName']}<br/>
               <!-- <label>Last Contacted</label>:12/12/2014<br/> -->
               {IF $proposals > 0}<label><span class="badge badge-primary"> {$proposals} </span> Proposals</label><br />{/IF}
               {IF $workorders > 0} <label><span class="badge badge-primary"> {$workorders} </span> Work Orders</label>{/IF}
           </div>



       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
           <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('additionalinformation', {$id});">Edit</button></div>
       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5">
               <label>Linked to Company</label><br/>
               {IF $data['cntCompanyId']}
                   <a href="{$SITE_URL}crm/viewContact/{$data['cntCompanyId']}" title="View Company">{$data['CompanyName']}</a>
                   <br />

                   {$data['companyAddress1']}<br/>
                   {$data['companyAddress2']|default:''}
                   {$data['companyCity']}, {$data['companyState']}. {$data['companyZip']}<br/>
                   {$data['companyPhone']}
                   {ELSE}
                   NA
                {/IF}
           </div>

           <div class="col-sm-5">
               {IF $data['cntManagerId'] > 0}
               <label>My Manager</label><br/>
                   <a href="{$SITE_URL}crm/viewContact/{$data['cntManagerId']}" title="View Manager">{$data['ManagerName']} {$data['ManagerLastName']}</a>
                   <br />
                   {$data['ManagerAddress1']}<br/>
                   {$data['ManagerAddress2']|default:''}
                   {$data['ManagerCity']}, {$data['ManagerState']}. {$data['ManagerZip']}<br/>
                   {$data['ManagerPhone']}
               {/IF}

           </div>

       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row" >
           <div class="col-sm-5">
               <label>Billing Address</label><br/>
               {$data['cntBillAddress1']}<br/>
               {$data['cntBillAddress2']|default:''}
               {$data['cntBillCity']}, {$data['cntBillState']}. {$data['cntBillZip']}
           </div>

           <div class="col-sm-5">
               <label>Property Address</label><br/>
               {$data['cntShipAddress1']}<br/>
               {$data['cntShipAddress2']|default:''}
               {$data['cntShipCity']}, {$data['cntShipState']}. {$data['cntShipZip']}
           </div>

       </div>
       <!-- row -->


       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
           <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('catandservice',{$id});">Edit</button></div>
       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5" style='text-align:top;'>
               <label>Contact Categories</label><br/>
               {foreach $categories as $cat}
                {$cat['ccatName']}<br />
                {/foreach}
           </div>

           <div class="col-sm-5" style='text-align:top;'>
               <label>Services Provided</label><br/>
               {foreach $services as $serv}
                   {$serv['cservName']}<br />
               {/foreach}
           </div>

       </div>
       <!-- row -->


       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
           <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('crmNotes',{$id});">Edit</button></div>
       </div>
       <!-- row -->

       <div class="table-primary">
           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:100%;" id="jq-datatables-example">
               <thead>
               <tr>
                   <th >Date Created</th>
                   <th >Note</th>
                   <th >Created By</th>
               </tr>
               </thead>
               <tbody>
               {assign var=odd value='odd gradeA'}
               {assign var=even value='even gradeA'}
               {foreach $notes as $d}
                   {IF $d.cnotNote}
                       <tr class="{cycle values="$odd,$even"}">
                           <td><span class="note-title">{$d.cnotCreatedDate|date_format:"%B %d,  %Y"}</span></td>
                           <!--
                    cnotReminderDate
                    <td><span class="note-title">{$d.cnotReminderDate|date_format:"%B %d,  %Y"}</span></td>
                    <td><span class="note-title">{$d.cnotCreatedDate|date_format:"%A %B %d,  %Y at %I:%M %p"}</span></td>
                    -->

                           <td class="text-left">{$d.cnotNote}
                               {IF $d.cnotReminder}<br/><span class="alert-info"> REMINDER SET<br/>{$d.cnotReminderDate|date_format:"%B %d,  %Y"}</span>{/IF}</td>
                           <td class="text-left">{$d.Creator}</td>
                       </tr>
                   {/IF}
               {/foreach}



               </tbody>
           </table>
       </div>


   </div>
    </div>

