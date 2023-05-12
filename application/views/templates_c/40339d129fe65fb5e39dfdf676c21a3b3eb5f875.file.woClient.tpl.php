<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-14 11:26:18
         compiled from "application/views/templates/workorders/woClient.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188726430159287a6060f7a8-83767913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40339d129fe65fb5e39dfdf676c21a3b3eb5f875' => 
    array (
      0 => 'application/views/templates/workorders/woClient.tpl',
      1 => 1497341063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188726430159287a6060f7a8-83767913',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59287a609538c0_95529290',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'pid' => 0,
    'proposal' => 0,
    'USER_ROLE' => 0,
    'states' => 0,
    'CurrentDate' => 0,
    'USER_FULLNAME' => 0,
    'ntosender' => 0,
    'motsender' => 0,
    'emailOptions' => 0,
    'option' => 0,
    'userInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59287a609538c0_95529290')) {function content_59287a609538c0_95529290($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home3/pavingd/public_html/system/smarty/libs/plugins/modifier.date_format.php';
?>
<?php echo '<script'; ?>
 type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

            $("#jobPrimaryPhone").mask("(999) 999-9999");

            $("#jobAltPhone").mask("(999) 999-9999");

    });


<?php echo '</script'; ?>
>


<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
<!-- Javascript -->
<?php echo '<script'; ?>
 type="text/javascript">

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


    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.jobAddress1.value == '')
        {
            alert('You must enter a value for address');
            form.jobAddress1.focus();
            return false;
        }

        return true;

    }

    function CHECKITZ(form)
    {
        if(!testz(form)){ return;
        }

        form.submit();
    }

    function testz(form)
    {

       // if(form.jobBillingAddress1.value == '')
        //{
         //   alert('You must enter a value for address');
         //   form.jobBillingAddress1.focus();
         //   return false;
        //}

        return true;

    }



    function CHECKITE(form,sendby)
    {
        if(!teste(form)){ return;
        }

        if(sendby ==1)
        {
            showSpinner('Please wait while we format the email.');
            var url = "<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOEMailLetter/1/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
";
            var posting = $.post( url, $( "#zdataform" ).serialize() );
            posting.done(function( data ) {
                hideSpinner();
                var linktext = "<a target='mail' href='mailto:<?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryEmail'];?>
?subject=CheckIn&body=" + encodeURIComponent(data) + "'>Send Email</a>";
                $( "#letterlink" ).html( linktext );
                alert('Click the Send Email link');
            });


            return;
        }
        form.submit();
    }

    function teste(form)
    {

        return true;

    }

<?php echo '</script'; ?>
>

<div class="panel">

    <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderwizrdmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="panel-body">
    <?php $_smarty_tpl->tpl_vars["lead"] = new Smarty_variable("Client Notices For ", null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate ('workorders/_workorderheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1||$_smarty_tpl->tpl_vars['USER_ROLE']->value==6) {?>
        <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobStatus']==5) {?>
        
            <!-- row -->
            <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/updateWOAddress/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="adataform_1" id="adataform_1" class="panel" method="POST">
                <input type="hidden" name="beenhere" value="1">
                <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
                <div class="row" style="background:#eeffee">
                    <h4>Primary Location and Contact Information</h4>
                </div>

                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">NTO</label>
                            <input type="checkbox" name="jobNTO" id="jobNTO" value="1" class="form-control inline" <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobNTO']) {?> checked <?php }?>/> &nbsp;
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Permit Required</label>
                            <input type="checkbox" name="jobPermit" id="jobPermit" value="1" class="form-control inline" <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobPermit']) {?> checked <?php }?>/> &nbsp;
                        </div>

                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">MOT</label>
                            <input type="checkbox" name="jobMOT" id="jobMOT" value="1" class="form-control inline" <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobMOT']) {?> checked <?php }?>/> &nbsp;
                        </div>

                    </div>

                </div>


                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label"> Billing Contact</label>
                            <input type="text" id="jobPrimaryContact" name="jobPrimaryContact" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobPrimaryContact'];?>
">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Primary Email (<i>used for notifications</i>)</label>
                            <input type="text" id="jobPrimaryEmail" name="jobPrimaryEmail" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobPrimaryEmail'];?>
">
                        </div>
                    </div>

                </div>
                <!-- row -->
                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Address line 1</label>
                            <input type="text" name="jobBillingAddress1" id="jobBillingAddress1" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingAddress1'];?>
" class="form-control inline"/> &nbsp;
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Address line 2</label>
                            <input type="text" name="jobBillingAddress2" id="jobBillingAddress2" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingAddress2'];?>
" class="form-control inline"/> &nbsp;

                        </div>

                    </div>

                </div>


                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Phone</label>
                            <input type="text" name="jobPrimaryPhone" id="jobPrimaryPhone" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobPrimaryPhone'];?>
" class="form-control inline"/> &nbsp;
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Alt Phone</label>
                            <input type="text" name="jobAltPhone" id="jobAltPhone" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobAltPhone'];?>
" class="form-control inline"/> &nbsp;
                        </div>

                    </div>

                </div>

                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">City</label>
                        </div>

                    </div>
                    <div class="col-sm-2">
                        <div class="form-group no-margin-hr">
                            <input type="text" name="jobBillingCity" id="jobBillingCity" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingCity'];?>
" class="form-control inline"/> &nbsp;
                        </div>

                    </div>

                    <div class="col-sm-1">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">State</label>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <select name="jobBillingState" id="jobBillingState"  class="form-control inline">
                                <option value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingState'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingState'];?>
</option>
                                <?php echo $_smarty_tpl->tpl_vars['states']->value;?>
</select> &nbsp;
                        </div>

                    </div>

                    <div class="col-sm-1">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Zip</label>
                        </div>

                    </div>
                    <div class="col-sm-2">
                        <div class="form-group no-margin-hr">
                            <input type="text" name="jobBillingZip" id="jobBillingZip" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobBillingZip'];?>
" class="form-control inline"/> &nbsp;
                        </div>

                    </div>

                </div>

                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-5" >
                        <div class="form-group no-margin-hr">
                            Change Work Order Primary Address and Contact Information
                        </div>
                    </div>

                    <div class="col-sm-4" >
                        <div class="form-group no-margin-hr">
                            <!-- <a href="Javascript:CHECKITZ(this.adataform);" class="btn btn-primary btn-labeled">Change Primary Address</a> -->
                            <a href="Javascript:CHECKITZ(this.adataform_1);" class="btn btn-primary btn-labeled">Change Primary Address</a>
                        </div>
                    </div>
                </div>
            </form>


            <!-- row -->
            <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/updateWOSAddress/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="agdataform" id="agdataform" class="panel" method="POST">
                <input type="hidden" name="beenhere" value="1">
                <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
                <div class="row" style="background:#eeffee">
                    <h4>Site Location</h4>
                </div>
                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Address line 1</label>
                            <input type="text" name="jobAddress1" id="jobAddress1" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobAddress1'];?>
" class="form-control inline"/> &nbsp;
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Address line 2</label>
                            <input type="text" name="jobAddress2" id="jobAddress2" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobAddress2'];?>
" class="form-control inline"/> &nbsp;

                        </div>

                    </div>

                </div>



                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">City</label>
                        </div>

                    </div>
                    <div class="col-sm-2">
                        <div class="form-group no-margin-hr">
                            <input type="text" name="jobCity" id="jobCity" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobCity'];?>
" class="form-control inline"/> &nbsp;
                        </div>

                    </div>

                    <div class="col-sm-1">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">State</label>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="form-group no-margin-hr">
                            <select name="jobState" id="jobState"  class="form-control inline">
                                <option value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobState'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobState'];?>
</option>
                                <?php echo $_smarty_tpl->tpl_vars['states']->value;?>
</select> &nbsp;
                        </div>

                    </div>

                    <div class="col-sm-1">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Zip</label>
                        </div>

                    </div>
                    <div class="col-sm-2">
                        <div class="form-group no-margin-hr">
                            <input type="text" name="jobZip" id="jobZip" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobZip'];?>
" class="form-control inline"/> &nbsp;
                        </div>

                    </div>

                </div>

                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-5" >
                        <div class="form-group no-margin-hr">
                            Change Site Address
                        </div>
                    </div>

                    <div class="col-sm-4" >
                        <div class="form-group no-margin-hr">
                            <a href="Javascript:CHECKIT(this.agdataform);" class="btn btn-primary btn-labeled">Change Site Address</a>
                        </div>
                    </div>
                </div>
            </form>


            <!-- row mark as sent nto -->
            <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/cancelWO/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="cddataform" id="cddataform" class="panel" method="POST">
                <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-8">
                        <label class="control-label">Mark Job As Cancelled</label>
                        <br/>Cancelled On:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['CurrentDate']->value,"%A, %B %e, %Y");?>

                            <br/>By: <?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>


                    </div>

                    <div class="col-sm-2" >
                        <a href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/cancelWO/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
','You are about to cancel this entire job!\nAre you sure?');" class="btn btn-primary btn-labeled">Cancel Job</a>
                    </div>

                </div>
            </form>

            <!-- row mark as sent nto -->
            <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WONTOSent/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="ddataform" id="ddataform" class="panel" method="POST">
                <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-8">
                        <label class="control-label">Mark NTO as sent</label>
                        <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobNTOSentDatetime']) {?><br/>Sent On:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['proposal']->value['jobNTOSentDatetime'],"%A, %B %e, %Y");?>

                            <br/><?php echo $_smarty_tpl->tpl_vars['ntosender']->value;?>

                        <?php }?>
                    </div>

                    <div class="col-sm-2" >
                        <a href="Javascript:this.ddataform.submit();" class="btn btn-primary btn-labeled">Send NTO</a>
                    </div>

                </div>
            </form>

            <!-- row mark as sent nto -->
            <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMOTSent/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="cdataform" id="cdataform" class="panel" method="POST">
                <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-8">
                        <label class="control-label">Mark MOT as Complete</label>
                        <?php if ($_smarty_tpl->tpl_vars['proposal']->value['jobMOTSentDatetime']) {?><br/>Completed On:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['proposal']->value['jobMOTSentDatetime'],"%A, %B %e, %Y");?>

                            <br />
                        <?php echo $_smarty_tpl->tpl_vars['motsender']->value;?>

                        <?php }?>
                    </div>

                    <div class="col-sm-2" >
                        <a href="Javascript:this.cdataform.submit();" class="btn btn-primary btn-labeled">MOT completed</a>
                    </div>

                </div>
            </form>




            <!-- row mark complete
            <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMarkCompleted/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="fdataform" id="fdataform" class="panel" method="POST">
                <div class="row" >
                    <div class="col-sm-8">
                        <label class="control-label">Mark Job as Complete</label>
                    </div>

                    <div class="col-sm-2" >
                        <a href="Javascript:AREYOUSURE('<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOMarkCompleted/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
','You are about to mark this job as completed. Are you sure?.');" class="btn btn-primary btn-labeled">Mark Job completed</a>
                    </div>

                </div>
            </form>
            -->



            <!-- row -->
            <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/WOLetter/1/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/1"  name="zdataform" id="zdataform" class="panel" method="POST">
                <input type="hidden" name="beenhere" value="1">
                <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">

                <div class="row" style="background:#eeffee">
                    <h4>Check in Letter</h4>
                </div>


                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label"> Client Name</label>
                            <input type="text" id="clientname" name="clientname" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobPrimaryContact'];?>
">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Company Community or Development Name</label>
                            <input type="text" id="communityname" name="communityname" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['communityFirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['communityLast'];?>
">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Location</label>
                            <input type="text" id="location" name="location" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobAddress1'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobAddress2'];?>
">
                        </div>
                    </div>

                </div>
                <!-- row -->


                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Job City</label>
                            <input type="text" id="city" name="city" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobCity'];?>
">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label"> Sent By Manager</label>
                            <input type="text" id="manager" name="manager" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['managerfirst'];?>
 <?php echo $_smarty_tpl->tpl_vars['proposal']->value['managerlast'];?>
">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Title </label>
                            <input type="text" id="title" name="title" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['managertitle'];?>
">
                        </div>
                    </div>

                </div>
                <!-- row -->



                <!-- begin row -->
                <div class="row" >

                    <div class="col-sm-4" >
                        <a href="Javascript:this.zdataform.submit();" class="btn btn-primary btn-labeled" style='width:200px;'> <span class="btn-label icon fa fa-print"></span> Print Check in Letter</a>
                    </div>

                    <div class="col-sm-4" >
                        <a href="Javascript:CHECKITE(this.zdataform,1);" class="btn btn-primary btn-labeled" style='width:200px;'><span class="btn-label icon fa fa-envelope"></span> Email Check in Letter</a>
                    </div>
                    <div class="col-sm-4"  id='letterlink'>
                    </div>

                </div>


            </form>

<form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/sendWOEmail/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"  name="adataform" id="adataform" class="panel" method="POST">
    <div class="row">
    	<div class="form-group no-margin-hr">
            <div class="col-xs-12 col-sm-6">
                <select name="workorderEmailType" id="workorderEmailType" class="form-control">
                    <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['emailOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['subject'];?>
</option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
    	<div class="col-sm-12">
            <div class="form-group no-margin-hr">
                <textarea class="form-control" name="emailMessage" id="tinyMCETextarea"></textarea>
                <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['USER_EMAIL'];?>
" class="checkbox-inline">
                <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="<?php echo $_smarty_tpl->tpl_vars['proposal']->value['cntPrimaryEmail'];?>
" class="checkbox-inline">
                <input type="hidden" id="cnotNoteSenderName" name="cnotNoteSenderName" value="<?php echo $_smarty_tpl->tpl_vars['USER_FULLNAME']->value;?>
" class="checkbox-inline">
                <input type="hidden" id="emailSubject" name="emailSubject" value="" class="checkbox-inline">
                <input type="hidden" id="userID" name="userID" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['USER_ID'];?>
" class="checkbox-inline">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-2">
            <input class="btn btn-primary btn-labeled" value="Send Email" type="submit">
        </div>
    </div>
</form>

<div class="panel">

        Dear (clientname),
        <br/>
        I hope this letter finds you well. It has now been some time since we wrapped up our work for
        (communityname) at
        (location) in (city).
        <br/>
        I trust that everything went according to plan and that your property is not experiencing any new maintenance issues that need to be addressed.
        <br/>
        In the event a situation arises that needs to be solved, we would love the opportunity to work with you again, and we are always available to offer a free estimate on a new scope of work.
        <br/>
        Please don’t hesitate to contact me,
        <br/><br/>
        (manager) @ 1-855-735-7623 for more information or to set up a meeting!
        <br/>
        Sincerely,
        <br/>
        <br/>
        (manager), (title)
</div>
    <?php } else { ?>
        *Job is not active
        <?php if ($_smarty_tpl->tpl_vars['USER_ROLE']->value==1&&$_smarty_tpl->tpl_vars['proposal']->value['jobStatus']==7) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/reopenWO/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">Re-Open Job</a>
        <?php }?>
     <?php }?>
<?php }?>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">

	jQuery(document).ready(function($){
		$("#workorderEmailType").change(function() {
			//get the selected value
			var selectedValue = this.value;
		
			//make the ajax call
			$.ajax({
				url: "<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/getTemplates/" + selectedValue,
				type: 'POST',
				dataType: 'json',
				success: function(response)
            	{
                	tinyMCE.activeEditor.setContent(response[0].body);
					$("#emailSubject").val(response[0].subject);
            	} 
			});
		});
	});
<?php echo '</script'; ?>
>

<?php }} ?>
