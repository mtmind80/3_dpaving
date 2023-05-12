<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-05 11:10:25
         compiled from "application/views/templates/reports/SearchCRM.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27508368459286aa1983762-54995356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54ad94fe76ed9e18ed2decf8c69b242ec8552b89' => 
    array (
      0 => 'application/views/templates/reports/SearchCRM.tpl',
      1 => 1497341021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27508368459286aa1983762-54995356',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59286aa1b603b5_02763916',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
    'categoryCB' => 0,
    'cblist' => 0,
    'servicesCB' => 0,
    'creatorListCB' => 0,
    'd' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59286aa1b603b5_02763916')) {function content_59286aa1b603b5_02763916($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>

<?php echo '<script'; ?>
 src="https://maps.google.com/maps/api/js?sensor=false"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/gmap3.min.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">

   $( document ).ready(function() {

    //bind actions
       $('#searchEnd').datepicker({
           dateFormat: 'mm-dd-yy'
       });
       $('#searchStart').datepicker({
           dateFormat: 'mm-dd-yy'
       });



   });



   var sortorder = "<?php echo $_smarty_tpl->tpl_vars['data']->value['ordertype'];?>
";


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



<?php echo '</script'; ?>
>
<div class="panel">
    <div class="panel-heading">

        <h2>CRM Export</h2>

    </div>

    <div class="panel-heading">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/SearchCRM/" id="searchform" name="searchform">
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
                        <?php  $_smarty_tpl->tpl_vars['cblist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cblist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryCB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cblist']->key => $_smarty_tpl->tpl_vars['cblist']->value) {
$_smarty_tpl->tpl_vars['cblist']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['cblist']->value['ccatId'];?>
"><?php echo $_smarty_tpl->tpl_vars['cblist']->value['ccatName'];?>
</option>
                        <?php } ?>
                    </select>
                    &nbsp;Services: <select name='searchServ' id='searchServ'>
                        <option value="0">All Services</option>
                        <?php  $_smarty_tpl->tpl_vars['cblist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cblist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['servicesCB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cblist']->key => $_smarty_tpl->tpl_vars['cblist']->value) {
$_smarty_tpl->tpl_vars['cblist']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['cblist']->value['cservId'];?>
"><?php echo $_smarty_tpl->tpl_vars['cblist']->value['cservName'];?>
</option>
                        <?php } ?>
                    </select>
                    &nbsp;Created By: <select name='searchCreator' id='searchCreator'>
                        <option value="0">Anyone</option>
                        <?php  $_smarty_tpl->tpl_vars['cblist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cblist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['creatorListCB']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cblist']->key => $_smarty_tpl->tpl_vars['cblist']->value) {
$_smarty_tpl->tpl_vars['cblist']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['cblist']->value['cntLastName'];?>
</option>
                        <?php } ?>
                    </select>

                    &nbsp;


                    <a href="Javascript:CHECKIT(this.searchform);" class="btn btn-sm btn-primary btn-labeled"><span class="btn-label icon fa fa-filter"></span> Apply Filter</a> &nbsp;
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['filter']) {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/SearchCRM/1" class="btn btn-sm btn-pa-purple btn-labeled"><span class="btn-label icon fa fa-list"></span> Show All</a>
                    <?php }?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/exportCRMList/" class="btn btn-sm btn-light-green "><span class="btn-label icon fa fa-save"></span> Export</a>

                </p>
            </form>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['filter']) {?>
            <div style='padding:4px;min-width:400px; font-size:10pt;margin:0px;background:#f2f5f7;border:1px solid #0088cc;'>Filter: <?php echo $_smarty_tpl->tpl_vars['data']->value['filter_str'];?>
</div>
        <?php }?>

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

                <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable('odd gradeA', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['even'] = new Smarty_variable('even gradeA', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>((string)$_smarty_tpl->tpl_vars['odd']->value).",".((string)$_smarty_tpl->tpl_vars['even']->value)),$_smarty_tpl);?>
">
                        
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntcid']==9) {?>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
" title="Click to view contact details"><?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
</a>

                                <?php if ($_smarty_tpl->tpl_vars['d']->value['cntAltContactName']) {?><br/>Contact:<?php echo $_smarty_tpl->tpl_vars['d']->value['cntAltContactName'];?>
 <?php }?>
                            <!--
                                <b>
                                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cntCompanyId']) {?>
                                        <br/>Company:<?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyName'];?>

                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cntDevelopmentId']) {?>
                                        <br/>Development:<?php echo $_smarty_tpl->tpl_vars['d']->value['DevelopmentName'];?>

                                    <?php }?>
                                    &nbsp;</b>


                            -->
                                <br />Primary Category:<?php echo $_smarty_tpl->tpl_vars['d']->value['primarycat'];?>

                            </td>
                        <?php } elseif ($_smarty_tpl->tpl_vars['d']->value['cntcid']==10) {?>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
" title="Click to view contact details"><?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
</a>

                                <?php if ($_smarty_tpl->tpl_vars['d']->value['cntAltContactName']) {?><br/>Contact:<?php echo $_smarty_tpl->tpl_vars['d']->value['cntAltContactName'];?>
 <?php }?>
                            <!--
                                <b>
                                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cntCompanyId']) {?>
                                        <br/>Company:<?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyName'];?>

                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cntDevelopmentId']) {?>
                                        <br/>Development:<?php echo $_smarty_tpl->tpl_vars['d']->value['DevelopmentName'];?>

                                    <?php }?>
                                    &nbsp;</b>
                            -->
                                <br />Primary Category:<?php echo $_smarty_tpl->tpl_vars['d']->value['primarycat'];?>


                            </td>
                        <?php } elseif ($_smarty_tpl->tpl_vars['d']->value['cntcid']==8) {?>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
" title="Click to view contact details"><?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
</a>

                                <?php if ($_smarty_tpl->tpl_vars['d']->value['cntAltContactName']) {?><br/>Contact:<?php echo $_smarty_tpl->tpl_vars['d']->value['cntAltContactName'];?>
 <?php }?>
                            <!--    <b>
                                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cntCompanyId']) {?>
                                        <br/>Company:<?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyName'];?>

                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cntDevelopmentId']) {?>
                                        <br/>Development:<?php echo $_smarty_tpl->tpl_vars['d']->value['DevelopmentName'];?>

                                    <?php }?>
                                    &nbsp;</b>
                            -->
                                <br />Primary Category:<?php echo $_smarty_tpl->tpl_vars['d']->value['primarycat'];?>

                            </td>
                        <?php } else { ?>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/editContact/<?php echo $_smarty_tpl->tpl_vars['d']->value['cntId'];?>
" title="Click to view contact details"><?php if ($_smarty_tpl->tpl_vars['d']->value['cntSalutation']) {
echo $_smarty_tpl->tpl_vars['d']->value['cntSalutation'];?>
 <?php }
echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['cntLastName'];?>
</a>
                             <!--
                                <b>
                                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cntCompanyId']) {?>
                                        <br/>Company:<?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyName'];?>

                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cntDevelopmentId']) {?>
                                        <br/>Development:<?php echo $_smarty_tpl->tpl_vars['d']->value['DevelopmentName'];?>

                                    <?php }?>
                                </b>
                                -->
                                <br />Primary Category:<?php echo $_smarty_tpl->tpl_vars['d']->value['primarycat'];?>

                                &nbsp;</td>
                        <?php }?>


                        <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['CompanyName'];?>
</td>
                        <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['DevelopmentName'];?>
</td>
                        <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryPhone'];?>
</td>
                    <td class="text-left">
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress1']!='') {?>
                        <a href="Javascript:showUserOnMap('<?php echo $_smarty_tpl->tpl_vars['d']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['cntLastName'];?>
', '<?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress1'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress2'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryCity'];?>
, <?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryState'];?>
. <?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryZip'];?>
');" title="Map It" ><span class=" icon fa fa-map-marker"></span></a> &nbsp;
                        <?php }?>
                        <?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress1'];?>

                    <?php if ($_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress2']) {?><br/><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryAddress2'];
}?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntPrimaryCity']) {?><br/><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryCity'];
}?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntPrimaryState']) {?>, <?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryState'];?>
. <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['cntPrimaryZip']) {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryZip'];
}?>
                    </td>
                    <td class="text-left"><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryEmail'];?>
" title="Send Email"><?php echo $_smarty_tpl->tpl_vars['d']->value['cntPrimaryEmail'];?>
<a/>
                    <br/>
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cntCreatedDate'],"%m/%d/%Y");?>

                    </td>
                    <!--
                    <td class="text-left"> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cntCreatedDate'],"%m/%d/%Y");?>

                          <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['cntUpdatedDate'],"%m/%d/%Y");?>
</td>
                    -->
                    <td class="text-center"><span class="badge badge-primary"><?php if ($_smarty_tpl->tpl_vars['d']->value['project_count']) {
echo $_smarty_tpl->tpl_vars['d']->value['project_count'];
} else { ?>0<?php }?><br/><?php echo $_smarty_tpl->tpl_vars['d']->value['workorder_count'];?>
</span></td>

                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="DT-label">
        <div aria-relevant="all" aria-live="polite" role="alert" id="jq-datatables-example_info" class="dataTables_info">
            Records found: <?php echo $_smarty_tpl->tpl_vars['data']->value['total_records'];?>
 &nbsp; Page <?php echo $_smarty_tpl->tpl_vars['data']->value['page_num'];?>
 of <?php echo $_smarty_tpl->tpl_vars['data']->value['total_pages'];?>
 pages &nbsp; &nbsp;
            SHOW: &nbsp;
            <select  name="newlimit" id="newlimit" onChange="javascript:DoLimit(this.value);">
                <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['limit'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['limit'];?>
</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            &nbsp;Records Per Page &nbsp;&nbsp;
            GO TO PAGE: &nbsp;
            <select  name="newpage" id="newpage" onChange="javascript:GoToPage(this.value);">
                <option value=""></option>
                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 0;
  if ($_smarty_tpl->tpl_vars['i']->value<$_smarty_tpl->tpl_vars['data']->value['total_pages']) { for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value<$_smarty_tpl->tpl_vars['data']->value['total_pages']; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</option>
                <?php }} ?>
            </select>
        </div>
    </div>
    <div class="DT-pagination">
        <div id="jq-datatables-example_paginate" class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination">
                <li id="jq-datatables-example_previous" tabindex="0" aria-controls="jq-datatables-example" class="paginate_button previous <?php if ($_smarty_tpl->tpl_vars['data']->value['page_num']<=1) {?>disabled <?php }?>"><a href="Javascript:GoToPage(<?php echo $_smarty_tpl->tpl_vars['data']->value['page_num']-1;?>
);"><< Previous</a></li>
                <!--
                                    <li tabindex="0" aria-controls="jq-datatables-example" class="paginate_button active"><a href="#">1</a></li>
                                    <li tabindex="0" aria-controls="jq-datatables-example" class="paginate_button "><a href="#">2</a></li>
                                    <li tabindex="0" aria-controls="jq-datatables-example" class="paginate_button "><a href="#">3</a></li>
                                    <li tabindex="0" aria-controls="jq-datatables-example" class="paginate_button "><a href="#">4</a></li>
                                    -->
                <li id="jq-datatables-example_next" tabindex="0" aria-controls="jq-datatables-example" class="paginate_button next <?php if ($_smarty_tpl->tpl_vars['data']->value['page_num']>=$_smarty_tpl->tpl_vars['data']->value['total_pages']) {?> disabled <?php }?> "><a href="Javascript:GoToPage(<?php echo $_smarty_tpl->tpl_vars['data']->value['page_num']+1;?>
);">Next >></a></li>
            </ul>

        </div>
    </div>

</div>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
reports/SearchCRM/" name="paginate" id="paginate">
    <input type="hidden" name="page" id="page" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['page_num'];?>
">
    <input type="hidden" name="turnpage" id="turnpage" value="0">

    <input type="hidden" name="limit" id="limit" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['limit'];?>
">
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

<?php echo '<script'; ?>
>
    
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
<?php echo '</script'; ?>
>


<?php }} ?>
