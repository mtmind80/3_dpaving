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

        <h2>My Profile</h2>
        <h2>{$data['cntSalutation']|default:''} {$data['cntFirstName']} {IF $data['cntMiddleName']}{$data['cntMiddleName']|default:'&nbsp;'}{/IF}{$data['cntLastName']}</h2>

        </div>

   <div class="panel-body">
       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
        <!--  <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('editContact',{$id});">Edit</button></div>
-->
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

           <div class="col-sm-4">
               <label>Created On</label>:{$data['cntCreatedDate']|date_format:"%B %d, %Y "}<br/>
               <label>Created By</label>:{$data['Creator']}<br/>


           </div>

       </div>
       <!-- row -->


       <!-- begin row -->
       <div class="row">
           <div class="col-sm-2">
               <label>Phone</label><br/>
               {$data['cntPrimaryPhone']}<br/>
               {$data['cntAltPhone1']|default:''}<br/>
               {$data['cntAltPhone2']|default:''}
           </div>

           <div class="col-sm-3">
               <label>Email</label><br/>
               {$data['cntPrimaryEmail']}<br/>
               {$data['cntAltEmail']|default:''}
           </div>

           <div class="col-sm-3">
               <label>Title</label>
               {$data['cntJobTitle']}<br/>
               <label>Department</label>{$data['cntDepartment1']|default:''}<br/>
           </div>

           <div class="col-sm-2">
               <label>Gender</label>:
               {$data['cntGender']}<br/>
               <label>DOB</label>:
               {$data['cntDateOfBirth']|default:''}
           </div>


       </div>
       <!-- row -->

       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
<!--
           <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('additionalinformation', {$id});">Edit</button></div>
      -->
&nbsp;       </div>
       <!-- row -->


       <!-- begin row -->
       <div class="row">
           <div class="col-sm-5">
               <label>Company</label><br/>
               {IF $data['cntCompanyId']}
                   <div style='float:right;'><button type="button" class=".btn-xs btn-info" onClick="Javascript:GoToPage('viewContact',{$data['cntCompanyId']});">Company</button></div>
               {$data['companyAddress1']}<br/>
               {$data['companyAddress2']|default:''}
               {$data['companyCity']}, {$data['companyState']}. {$data['companyZip']}<br/>
               {$data['companyPhone']}
               {ELSE}
                   NA
               {/IF}
           </div>

           <div class="col-sm-5">
               <label>Development</label><br/>
               {IF $data['cntDevelopmentId']}
                   <div style='float:right;'><button type="button" class=".btn-xs btn-info" onClick="Javascript:GoToPage('viewContact',{$data['cntDevelopmentId']});">Development</button></div>
               {$data['developmentAddress1']}<br/>
               {$data['developmentAddress2']|default:''}
               {$data['developmentCity']}, {$data['developmentState']}. {$data['developmentZip']}<br/>
               {$data['developmentPhone']}
               {ELSE}
                   NA
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
               <label>Shipping Address</label><br/>
               {$data['cntShipAddress1']}<br/>
               {$data['cntShipAddress2']|default:''}
               {$data['cntShipCity']}, {$data['cntShipState']}. {$data['cntShipZip']}
           </div>

       </div>
       <!-- row -->


       <!-- begin row -->
       <div class="row" style="background:#d9edf7">
   <!--        <div style='float:right;'><button type="button" class="btn-sm btn-success" onClick="Javascript:GoToPage('catandservice',{$id});">Edit</button></div>
      --> &nbsp; </div>
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



   </div>
    </div>
