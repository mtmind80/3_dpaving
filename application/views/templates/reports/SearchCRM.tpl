

<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script src="{$SITE_URL}assets/javascripts/gmap3.min.js"></script>


<script type="text/javascript">

   $( document ).ready(function() {

    //bind actions
       $('#searchEnd').datepicker({
           dateFormat: 'mm-dd-yy'
       });
       $('#searchStart').datepicker({
           dateFormat: 'mm-dd-yy'
       });



   });



   var sortorder = "{$data['ordertype']}";


   function GoToPage(pagenum)
   {

       showSpinner();
       $('#page').val(pagenum);
       $('#turnpage').val('1');
       $('#paginate').submit();

   }


   function DoLimit(limit)
   {
       showSpinner();
       $('#limit').val(limit);
       $('#changelimit').val('1');
       $('#paginate').submit();

   }

    function SortRecords(fieldname)
    {

        showSpinner();

        if(sortorder == "ASC")
         {
             sortorder ="DESC";
         }
        else
        {
            sortorder ="ASC";
        }
        $('#ordertype').val(sortorder);
        $('#orderby').val(fieldname);
        $('#reorder').val('1');
        $('#paginate').submit();

    }



   function CHECKIT(form)
   {
       if(!test(form)){ return;
       }
       showSpinner();

       form.submit();
   }

   function test(form)
   {

       form.categoryName.value = form.searchCat[form.searchCat.selectedIndex].text;
       form.serviceName.value = form.searchServ[form.searchServ.selectedIndex].text;

       if(form.searchField[form.searchField.selectedIndex].value != 'All Records' && form.searchValue.value == '')
       {

           var popupmsg = 'You must enter a value for your search';
           $('#msg').html(popupmsg);
           $('#privatemessage').modal('show');
           //alert('You must enter a value for your search');
           form.searchValue.focus();
           return false;
       }

       if(form.searchStart.value == '' &&  form.searchEnd.value == '' &&
               form.searchCreator[form.searchCreator.selectedIndex].value == 0 && form.searchHasWO[form.searchHasWO.selectedIndex].value == 0 &&  form.searchField[form.searchField.selectedIndex].value == 'All Records' && form.searchCat[form.searchCat.selectedIndex].value == '0' && form.searchServ[form.searchServ.selectedIndex].value == '0')
       {
           alert('No filter options selected\nYou must select a filter option for your search');
           return false;
       }

       return true;

   }



</script>
<div class="panel">
    <div class="panel-heading">

        <h2>CRM Export</h2>

    </div>

    <div class="panel-heading">
            <form method="post" action="{$SITE_URL}reports/SearchCRM/" id="searchform" name="searchform">
                <input type="hidden" name="search" value="1" />
                <input type="hidden" name="serviceName" value="" />
                <input type="hidden" name="categoryName" value="" />
                <p>
                <div style="border:solid 1px lightblue;width:98%;padding:10px;">

                Search in: <select  name="searchField" id="searchField">
                    <option value="All Records">All Records</option>
                    <option value="m.cntFirstName">First Name/Company Name</option>
                    <option value="m.cntLastName">Last Name</option>
                        <option value="m.cntPrimaryEmail">Email</option>
                        <option value="m.cntPrimaryPhone">Phone</option>
                        <option value="m.cntPrimaryAddress1">Address</option>
                        <option value="m.cntPrimaryCity">City</option>
                        <option value="m.cntPrimaryZip">Zip</option>
                </select>
                &nbsp;

                Search For: <input type='text' name="searchValue" id="searchValue" value="" />  &nbsp;

                </div>

                </p> <p style='border:solid 1px lightblue;width:98%; padding:5px;'>

                    Qualified: <select  name="cntQualified" id="cntQualified">
                        <option value="0">All Records</option>
                        <option value="1">Qualified</option>
                        <option value="2">Not Qualified</option>
                    </select>
                    &nbsp;
                    &nbsp;

                    Activity: <select  name="searchHasWO" id="searchHasWO">
                        <option value="0">All Contacts</option>
                        <option value="2">Has Pending Proposals</option>
                        <option value="1">No Proposals or Work Orders</option>
                        <option value="3">Has A Proposal or Work Order</option>
                    </select>
                    &nbsp;
                    &nbsp;



                    Contact Created after: <input type='text' name="searchStart" id="searchStart" value="" size='12' />  &nbsp;
                    &nbsp; and before <input type='text' name="searchEnd" id="searchEnd" value=""  size='12' />

                </p> <p style='border:solid 1px lightblue;width:98%; padding:5px;'>

                    Category: <select name='searchCat' id='searchCat'>
                        <option value="0">All Categories</option>
                        {foreach $categoryCB as $cblist}
                            <option value="{$cblist.ccatId}">{$cblist.ccatName}</option>
                        {/foreach}
                    </select>
                    &nbsp;Services: <select name='searchServ' id='searchServ'>
                        <option value="0">All Services</option>
                        {foreach $servicesCB as $cblist}
                            <option value="{$cblist.cservId}">{$cblist.cservName}</option>
                        {/foreach}
                    </select>
                    &nbsp;Created By: <select name='searchCreator' id='searchCreator'>
                        <option value="0">Anyone</option>
                        {foreach $creatorListCB as $cblist}
                            <option value="{$cblist.cntId}">{$cblist.cntFirstName} {$cblist.cntLastName}</option>
                        {/foreach}
                    </select>

                    &nbsp;


                    <a href="Javascript:CHECKIT(this.searchform);" class="btn btn-sm btn-primary btn-labeled"><span class="btn-label icon fa fa-filter"></span> Apply Filter</a> &nbsp;
                    {IF $data['filter']}
                    <a href="{$SITE_URL}reports/SearchCRM/1" class="btn btn-sm btn-pa-purple btn-labeled"><span class="btn-label icon fa fa-list"></span> Show All</a>
                    {/IF}
                    <a href="{$SITE_URL}reports/exportCRMList/" class="btn btn-sm btn-light-green "><span class="btn-label icon fa fa-save"></span> Export</a>

                </p>
            </form>
        {IF $data['filter']}
            <div style='padding:4px;min-width:400px; font-size:10pt;margin:0px;background:#f2f5f7;border:1px solid #0088cc;'>Filter: {$data['filter_str']}</div>
        {/IF}

    </div>

    <div class="panel-body">
        <div class="table-primary">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th>Contact Name</th>
                    <th>Company</th>
                    <th>Development</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Email</th>
<!--
                    <th><span class="fa fa-sort"></span>&nbsp;<a href="Javascript:SortRecords('cntUpdatedDate');">Last Updated</a></th>
                    -->
                    <th>Proposals<br/>Work Orders</th>
                </tr>
                </thead>
                <tbody>

                {assign var=odd value='odd gradeA'}
                {assign var=even value='even gradeA'}
                {foreach $data.rows as $d}
                    <tr class="{cycle values="$odd,$even"}">
                        {*

                             * 9 	Community/Development
                             * 10 	Government Agency
                             * 8 	Company
                             * 6 	Client
                             * 2 	Vendor
                             * 11 	Sub Contractor

                             * 18 	general

                             *}
                        {if $d['cntcid'] eq 9}
                            <td><a href="{$SITE_URL}crm/editContact/{$d.cntId}" title="Click to view contact details">{$d.cntFirstName}</a>

                                {IF $d.cntAltContactName}<br/>Contact:{$d.cntAltContactName} {/IF}
                            <!--
                                <b>
                                    {IF $d.cntCompanyId}
                                        <br/>Company:{$d.CompanyName}
                                    {/IF}
                                    {IF $d.cntDevelopmentId}
                                        <br/>Development:{$d.DevelopmentName}
                                    {/IF}
                                    &nbsp;</b>


                            -->
                                <br />Primary Category:{$d.primarycat}
                            </td>
                        {elseif $d['cntcid'] eq 10}
                            <td><a href="{$SITE_URL}crm/editContact/{$d.cntId}" title="Click to view contact details">{$d.cntFirstName}</a>

                                {IF $d.cntAltContactName}<br/>Contact:{$d.cntAltContactName} {/IF}
                            <!--
                                <b>
                                    {IF $d.cntCompanyId}
                                        <br/>Company:{$d.CompanyName}
                                    {/IF}
                                    {IF $d.cntDevelopmentId}
                                        <br/>Development:{$d.DevelopmentName}
                                    {/IF}
                                    &nbsp;</b>
                            -->
                                <br />Primary Category:{$d.primarycat}

                            </td>
                        {elseif $d['cntcid'] eq 8}
                            <td><a href="{$SITE_URL}crm/editContact/{$d.cntId}" title="Click to view contact details">{$d.cntFirstName}</a>

                                {IF $d.cntAltContactName}<br/>Contact:{$d.cntAltContactName} {/IF}
                            <!--    <b>
                                    {IF $d.cntCompanyId}
                                        <br/>Company:{$d.CompanyName}
                                    {/IF}
                                    {IF $d.cntDevelopmentId}
                                        <br/>Development:{$d.DevelopmentName}
                                    {/IF}
                                    &nbsp;</b>
                            -->
                                <br />Primary Category:{$d.primarycat}
                            </td>
                        {else}
                            <td><a href="{$SITE_URL}crm/editContact/{$d.cntId}" title="Click to view contact details">{IF $d.cntSalutation}{$d.cntSalutation} {/IF}{$d.cntFirstName} {$d.cntLastName}</a>
                             <!--
                                <b>
                                    {IF $d.cntCompanyId}
                                        <br/>Company:{$d.CompanyName}
                                    {/IF}
                                    {IF $d.cntDevelopmentId}
                                        <br/>Development:{$d.DevelopmentName}
                                    {/IF}
                                </b>
                                -->
                                <br />Primary Category:{$d.primarycat}
                                &nbsp;</td>
                        {/if}


                        <td class="text-left">{$d.CompanyName}</td>
                        <td class="text-left">{$d.DevelopmentName}</td>
                        <td class="text-left">{$d.cntPrimaryPhone}</td>
                    <td class="text-left">
                        {IF $d.cntPrimaryAddress1 neq ''}
                        <a href="Javascript:showUserOnMap('{$d.cntFirstName} {$d.cntLastName}', '{$d.cntPrimaryAddress1} {$d.cntPrimaryAddress2} {$d.cntPrimaryCity}, {$d.cntPrimaryState}. {$d.cntPrimaryZip}');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                        {/IF}
                        {$d.cntPrimaryAddress1}
                    {IF $d.cntPrimaryAddress2}<br/>{$d.cntPrimaryAddress2}{/IF}
                        {IF $d.cntPrimaryCity}<br/>{$d.cntPrimaryCity}{/IF}
                        {IF $d.cntPrimaryState}, {$d.cntPrimaryState}. {/IF}
                        {IF $d.cntPrimaryZip} {$d.cntPrimaryZip}{/IF}
                    </td>
                    <td class="text-left"><a href="mailto:{$d.cntPrimaryEmail}" title="Send Email">{$d.cntPrimaryEmail}<a/>
                    <br/>
                        {$d.cntCreatedDate|date_format:"%m/%d/%Y"}
                    </td>
                    <!--
                    <td class="text-left"> {$d.cntCreatedDate|date_format:"%m/%d/%Y"}
                          {$d.cntUpdatedDate|date_format:"%m/%d/%Y"}</td>
                    -->
                    <td class="text-center"><span class="badge badge-primary">{IF $d.project_count}{$d.project_count}{ELSE}0{/IF}<br/>{$d.workorder_count}</span></td>

                </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>

    <div class="DT-label">
        <div aria-relevant="all" aria-live="polite" role="alert" id="jq-datatables-example_info" class="dataTables_info">
            Records found: {$data['total_records']} &nbsp; Page {$data['page_num']} of {$data['total_pages']} pages &nbsp; &nbsp;
            SHOW: &nbsp;
            <select  name="newlimit" id="newlimit" onChange="javascript:DoLimit(this.value);">
                <option value="{$data['limit']}">{$data['limit']}</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            &nbsp;Records Per Page &nbsp;&nbsp;
            GO TO PAGE: &nbsp;
            <select  name="newpage" id="newpage" onChange="javascript:GoToPage(this.value);">
                <option value=""></option>
                {for $i = 0;$i < $data['total_pages']; $i++}
                    <option value="{$i + 1}">{$i + 1}</option>
                {/for}
            </select>
        </div>
    </div>
    <div class="DT-pagination">
        <div id="jq-datatables-example_paginate" class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination">
                <li id="jq-datatables-example_previous" tabindex="0" aria-controls="jq-datatables-example" class="paginate_button previous {IF $data['page_num'] <= 1}disabled {/IF}"><a href="Javascript:GoToPage({$data['page_num'] - 1});"><< Previous</a></li>
                <!--
                                    <li tabindex="0" aria-controls="jq-datatables-example" class="paginate_button active"><a href="#">1</a></li>
                                    <li tabindex="0" aria-controls="jq-datatables-example" class="paginate_button "><a href="#">2</a></li>
                                    <li tabindex="0" aria-controls="jq-datatables-example" class="paginate_button "><a href="#">3</a></li>
                                    <li tabindex="0" aria-controls="jq-datatables-example" class="paginate_button "><a href="#">4</a></li>
                                    -->
                <li id="jq-datatables-example_next" tabindex="0" aria-controls="jq-datatables-example" class="paginate_button next {IF $data['page_num'] >= $data['total_pages']} disabled {/IF} "><a href="Javascript:GoToPage({$data['page_num'] + 1});">Next >></a></li>
            </ul>

        </div>
    </div>

</div>

<form method="post" action="{$SITE_URL}reports/SearchCRM/" name="paginate" id="paginate">
    <input type="hidden" name="page" id="page" value="{$data['page_num']}">
    <input type="hidden" name="turnpage" id="turnpage" value="0">

    <input type="hidden" name="limit" id="limit" value="{$data['limit']}">
    <input type="hidden" name="changelimit" id="changelimit" value="0">

    <input type="hidden" name="ordertype" id="ordertype" value="">
    <input type="hidden" name="orderby" id="orderby" value="">
    <input type="hidden" name="reorder" id="reorder" value="0">
</form>


<div aria-hidden="true" role="dialog" tabindex="-1" id="googleMapModal" class="modal fade bootstrap-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                <h4 class="modal-title" id="googleMapModalTitle">Map</h4>
            </div>
            <div class="modal-body" id="googleMapModalText">
                <div id="googleMapContainer"></div>
            </div>
        </div>
    </div>
</div>
<a id="triggerGoogleMapModal" href="#googleMapModal" data-toggle="modal"></a>

<script>
    {literal}
    var fullAddress,
            encAddress,
            locName;

    function showUserOnMap(userName, userAddress)
    {
        fullAddress = userAddress;
        encAddress = fullAddress.replace(/(\s+)/g, '+');
        encAddress = fullAddress.replace(/,/g, '');
        locName = userName;

        $('#googleMapModalTitle').text(locName);

        $('#triggerGoogleMapModal').click();
    }

    $(document).ready(function(){

        $("#googleMapModal").on('shown.bs.modal', function(){
            $.post(
                    'https://maps.googleapis.com/maps/api/geocode/json?address='+ encAddress +'&sensor=false',
                    function(response){
                        if (response.status == 'OK' && typeof response.results[0].geometry.location.lat != 'undefined' && typeof response.results[0].geometry.location.lng != 'undefined') {
                            var mapLatitude = response.results[0].geometry.location.lat,
                                    mapLongitude = response.results[0].geometry.location.lng,
                                    infowindow = '<p><strong>' + locName + '</strong><br />' + fullAddress + '<p>';

                            $("#googleMapContainer").gmap3({
                                map:{
                                    options: {
                                        center: [mapLatitude, mapLongitude],
                                        zoom: 13
                                    }
                                },
                                marker:{
                                    values: [{
                                        latLng: [mapLatitude, mapLongitude],
                                        data: infowindow
                                    }],
                                    options:{
                                        draggable: false
                                    },
                                    events:{
                                        mouseover: function(marker, event, context){
                                            var map = $(this).gmap3("get"),
                                                    infowindow = $(this).gmap3({get: {name: "infowindow"}});
                                            if (infowindow){
                                                infowindow.open(map, marker);
                                                infowindow.setContent(context.data);
                                            } else {
                                                $(this).gmap3({
                                                    infowindow:{
                                                        anchor:marker,
                                                        options:{content: context.data}
                                                    }
                                                });
                                            }
                                        }
                                    }
                                }
                            });
                        } else {
                            alert('Sorry. The address could not be resolved.');
                        }
                    }
            );
        });
    });
</script>

{/literal}
