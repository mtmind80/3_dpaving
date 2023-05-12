
<script type="text/javascript">

    init.push(function () {


        $('#bs-datepicker-component').datepicker();

            $("#jobPrimaryPhone").mask("(999) 999-9999");

            $("#jobAltPhone").mask("(999) 999-9999");

    });


</script>


<!-- 11. $JQUERY_DATA_TABLES ===========================================================================

        jQuery Data Tables
-->
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

        // if(form.jobAddress1.value == '')
        // {
        //     alert('You must enter a value for address');
        //     form.jobAddress1.focus();
        //     return false;
        // }

        return true;

    }



    function CHECKITE(form,sendby)
    {
        if(!teste(form)){ return;
        }

        if(sendby ==1)
        {
            showSpinner('Please wait while we format the email.');
            var url = "{$SITE_URL}workorders/WOEMailLetter/1/{$pid}";
            var posting = $.post( url, $( "#zdataform" ).serialize() );
            posting.done(function( data ) {
                hideSpinner();
                var linktext = "<a target='mail' href='mailto:{$proposal['cntPrimaryEmail']}?subject=CheckIn&body=" + encodeURIComponent(data) + "'>Send Email</a>";
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

</script>

<div class="panel">

    {include file='workorders/_workorderwizrdmenu.tpl'}

    <div class="panel-body">
    {assign var="lead" value="Client Notices For "}
        {include file='workorders/_workorderheader.tpl'}
{IF $USER_ROLE eq 1 OR $USER_ROLE eq 6}
        {IF $proposal.jobStatus eq 5}
        {* not rejected*}
            <!-- row -->
            <form action="{$SITE_URL}workorders/updateWOAddress/{$pid}"  name="adataform" id="adataform" class="panel" method="POST">
                <input type="hidden" name="beenhere" value="1">
                <input type="hidden" name="pid" id="pid" value="{$pid}">
                <div class="row" style="background:#eeffee">
                    <h4>Primary Location and Contact Information</h4>
                </div>

                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">NTO</label>
                            <input type="checkbox" name="jobNTO" id="jobNTO" value="1" class="form-control inline" {IF $proposal['jobNTO']} checked {/IF}/> &nbsp;
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Permit Required</label>
                            <input type="checkbox" name="jobPermit" id="jobPermit" value="1" class="form-control inline" {IF $proposal['jobPermit']} checked {/IF}/> &nbsp;
                        </div>

                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">MOT</label>
                            <input type="checkbox" name="jobMOT" id="jobMOT" value="1" class="form-control inline" {IF $proposal['jobMOT']} checked {/IF}/> &nbsp;
                        </div>

                    </div>

                </div>


                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label"> Billing Contact</label>
                            <input type="text" id="jobPrimaryContact" name="jobPrimaryContact" class="form-control"  value="{$proposal['jobPrimaryContact']}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Primary Email (<i>used for notifications</i>)</label>
                            <input type="text" id="jobPrimaryEmail" name="jobPrimaryEmail" class="form-control"  value="{$proposal['jobPrimaryEmail']}">
                        </div>
                    </div>

                </div>
                <!-- row -->
                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Address line 1</label>
                            <input type="text" name="jobBillingAddress1" id="jobBillingAddress1" value="{$proposal['jobBillingAddress1']}" class="form-control inline"/> &nbsp;
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Address line 2</label>
                            <input type="text" name="jobBillingAddress2" id="jobBillingAddress2" value="{$proposal['jobBillingAddress2']}" class="form-control inline"/> &nbsp;

                        </div>

                    </div>

                </div>


                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Phone</label>
                            <input type="text" name="jobPrimaryPhone" id="jobPrimaryPhone" value="{$proposal['jobPrimaryPhone']}" class="form-control inline"/> &nbsp;
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Alt Phone</label>
                            <input type="text" name="jobAltPhone" id="jobAltPhone" value="{$proposal['jobAltPhone']}" class="form-control inline"/> &nbsp;
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
                            <input type="text" name="jobBillingCity" id="jobBillingCity" value="{$proposal['jobBillingCity']}" class="form-control inline"/> &nbsp;
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
                                <option value="{$proposal['jobBillingState']}" selected>{$proposal['jobBillingState']}</option>
                                {$states}</select> &nbsp;
                        </div>

                    </div>

                    <div class="col-sm-1">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Zip</label>
                        </div>

                    </div>
                    <div class="col-sm-2">
                        <div class="form-group no-margin-hr">
                            <input type="text" name="jobBillingZip" id="jobBillingZip" value="{$proposal['jobBillingZip']}" class="form-control inline"/> &nbsp;
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
                            <a href="Javascript:CHECKITZ(this.adataform);" class="btn btn-primary btn-labeled">Change Primary Address ...</a>
                            <!-- <a href="Javascript:CHECKIT(this.agdataform);" class="btn btn-primary btn-labeled">Change Primary Address</a> -->
                        </div>
                    </div>
                </div>
            </form>


            <!-- row -->
            <form action="{$SITE_URL}workorders/updateWOSAddress/{$pid}"  name="agdataform" id="agdataform" class="panel" method="POST">
                <input type="hidden" name="beenhere" value="1">
                <input type="hidden" name="pid" id="pid" value="{$pid}">
                <div class="row" style="background:#eeffee">
                    <h4>Site Location</h4>
                </div>
                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Address line 1</label>
                            <input type="text" name="jobAddress1" id="jobAddress1" value="{$proposal['jobAddress1']}" class="form-control inline"/> &nbsp;
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Address line 2</label>
                            <input type="text" name="jobAddress2" id="jobAddress2" value="{$proposal['jobAddress2']}" class="form-control inline"/> &nbsp;

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
                            <input type="text" name="jobCity" id="jobCity" value="{$proposal['jobCity']}" class="form-control inline"/> &nbsp;
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
                                <option value="{$proposal['jobState']}" selected>{$proposal['jobState']}</option>
                                {$states}</select> &nbsp;
                        </div>

                    </div>

                    <div class="col-sm-1">
                        <div class="form-group no-margin-hr">
                            <label class="control-label inline">Zip</label>
                        </div>

                    </div>
                    <div class="col-sm-2">
                        <div class="form-group no-margin-hr">
                            <input type="text" name="jobZip" id="jobZip" value="{$proposal['jobZip']}" class="form-control inline"/> &nbsp;
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
            <form action="{$SITE_URL}workorders/cancelWO/{$pid}"  name="cddataform" id="cddataform" class="panel" method="POST">
                <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-8">
                        <label class="control-label">Mark Job As Cancelled</label>
                        <br/>Cancelled On:{$CurrentDate|date_format:"%A, %B %e, %Y"}
                            <br/>By: {$USER_FULLNAME}

                    </div>

                    <div class="col-sm-2" >
                        <a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/cancelWO/{$pid}','You are about to cancel this entire job!\nAre you sure?');" class="btn btn-primary btn-labeled">Cancel Job</a>
                    </div>

                </div>
            </form>

            <!-- row mark as sent nto -->
            <form action="{$SITE_URL}workorders/WONTOSent/{$pid}"  name="ddataform" id="ddataform" class="panel" method="POST">
                <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-8">
                        <label class="control-label">Mark NTO as sent</label>
                        {IF $proposal.jobNTOSentDatetime}<br/>Sent On:{$proposal.jobNTOSentDatetime|date_format:"%A, %B %e, %Y"}
                            <br/>{$ntosender}
                        {/IF}
                    </div>

                    <div class="col-sm-2" >
                        <a href="Javascript:this.ddataform.submit();" class="btn btn-primary btn-labeled">Send NTO</a>
                    </div>

                </div>
            </form>

            <!-- row mark as sent nto -->
            <form action="{$SITE_URL}workorders/WOMOTSent/{$pid}"  name="cdataform" id="cdataform" class="panel" method="POST">
                <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-8">
                        <label class="control-label">Mark MOT as Complete</label>
                        {IF $proposal.jobMOTSentDatetime}<br/>Completed On:{$proposal.jobMOTSentDatetime|date_format:"%A, %B %e, %Y"}
                            <br />
                        {$motsender}
                        {/IF}
                    </div>

                    <div class="col-sm-2" >
                        <a href="Javascript:this.cdataform.submit();" class="btn btn-primary btn-labeled">MOT completed</a>
                    </div>

                </div>
            </form>




            <!-- row mark complete
            <form action="{$SITE_URL}workorders/WOMarkCompleted/{$pid}"  name="fdataform" id="fdataform" class="panel" method="POST">
                <div class="row" >
                    <div class="col-sm-8">
                        <label class="control-label">Mark Job as Complete</label>
                    </div>

                    <div class="col-sm-2" >
                        <a href="Javascript:AREYOUSURE('{$SITE_URL}workorders/WOMarkCompleted/{$pid}','You are about to mark this job as completed. Are you sure?.');" class="btn btn-primary btn-labeled">Mark Job completed</a>
                    </div>

                </div>
            </form>
            -->



            <!-- row -->
            <form action="{$SITE_URL}workorders/WOLetter/1/{$pid}/1"  name="zdataform" id="zdataform" class="panel" method="POST">
                <input type="hidden" name="beenhere" value="1">
                <input type="hidden" name="pid" id="pid" value="{$pid}">

                <div class="row" style="background:#eeffee">
                    <h4>Check in Letter</h4>
                </div>


                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label"> Client Name</label>
                            <input type="text" id="clientname" name="clientname" class="form-control"  value="{$proposal['jobPrimaryContact']}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Company Community or Development Name</label>
                            <input type="text" id="communityname" name="communityname" class="form-control"  value="{$proposal['communityFirst']} {$proposal['communityLast']}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Location</label>
                            <input type="text" id="location" name="location" class="form-control"  value="{$proposal['jobAddress1']} {$proposal['jobAddress2']}">
                        </div>
                    </div>

                </div>
                <!-- row -->


                <!-- begin row -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Job City</label>
                            <input type="text" id="city" name="city" class="form-control"  value="{$proposal['jobCity']}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label"> Sent By Manager</label>
                            <input type="text" id="manager" name="manager" class="form-control"  value="{$proposal['managerfirst']} {$proposal['managerlast']}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Title </label>
                            <input type="text" id="title" name="title" class="form-control"  value="{$proposal['managertitle']}">
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

<form action="{$SITE_URL}workorders/sendWOEmail/{$pid}"  name="adataform" id="adataform" class="panel" method="POST">
    <div class="row">
    	<div class="form-group no-margin-hr">
            <div class="col-xs-12 col-sm-6">
                <select name="workorderEmailType" id="workorderEmailType" class="form-control">
                    {foreach from=$emailOptions item=option}
                    <option value="{$option.ID}">{$option.subject}</option>
                    {/foreach}
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
    	<div class="col-sm-12">
            <div class="form-group no-margin-hr">
                <textarea class="form-control" name="emailMessage" id="tinyMCETextarea"></textarea>
                <input type="hidden" id="cnotNoteSender" name="cnotNoteSender" value="{$userInfo['USER_EMAIL']}" class="checkbox-inline">
                <input type="hidden" id="cnotSendNoteTo" name="cnotSendNoteTo" value="{$proposal.cntPrimaryEmail}" class="checkbox-inline">
                <input type="hidden" id="cnotNoteSenderName" name="cnotNoteSenderName" value="{$USER_FULLNAME}" class="checkbox-inline">
                <input type="hidden" id="emailSubject" name="emailSubject" value="" class="checkbox-inline">
                <input type="hidden" id="userID" name="userID" value="{$userInfo['USER_ID']}" class="checkbox-inline">
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
    {ELSE}
        *Job is not active
        {IF $USER_ROLE eq 1 AND $proposal.jobStatus eq 7}
            <a href="{$SITE_URL}workorders/reopenWO/{$pid}">Re-Open Job</a>
        {/IF}
     {/IF}
{/IF}
    </div>
</div>
<script type="text/javascript">

	jQuery(document).ready(function($){
		$("#workorderEmailType").change(function() {
			//get the selected value
			var selectedValue = this.value;
		
			//make the ajax call
			$.ajax({
				url: "{$SITE_URL}workorders/getTemplates/" + selectedValue,
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
</script>

