<script src="{$SITE_URL}assets/javascripts/tiny_mce/tiny_mce.js"></script>


<script type="text/javascript">


    //when document ready add totals
    $(document).ready(function(){

        $.growl.error({ title: "Save and Save Often", message: "Any changes are not saved until you click Save and Continue!"});

        tinyMCE.init({
            // General options
            //  mode : "textareas",
            mode : "specific_textareas",
            editor_selector : "myTextEditor",

            theme : "advanced",

            // Theme options
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontsizeselect",
            theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,cleanup,forecolor,backcolor",

            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",

            theme_advanced_statusbar_location : "none",
            forced_root_block: false,

            theme_advanced_resizing : true,
            'width' : 350,
            'height': 250
        });

        //SetAllValues();
        CALCME();


    });




    function CHECKITS(form)
    {
        if(!tests(form)){ return;
        }

        form.submit();
    }

    function tests(form)
    {

        CALCME();
        return true;

    }



    function CHECKIT(form)
    {
        var rus = confirm("Do you want to change the striping vendor on this proposal?");
        if(!rus)
        {
          return;
        }

        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        var sid = form.sid.value;
        var pid = form.pid.value;
        var vendorid = form.vendorid[form.vendorid.selectedIndex].value;
        if(vendorid == '0')
        {
            alert('You must select a vendor.');
            form.vendorid.focus();
            return false;

        }

        var dURL = '{$SITE_URL}workorders/changeStripingVendor/' + pid + '/' + sid + '/' + vendorid;

        if(form.vendorid[form.vendorid.selectedIndex].value ==0)
        {
            alert('You must select a vendor.');
            form.vendorid.focus();
            return false;
        }

        $('#dataform').attr('action', dURL);
        showSpinner('Thank you, Please wait.');

        return true;

    }

    function CALCME()
    {
        var combinedcost = 0;

        var profit = $("#jordProfit").val();
        if(!profit)
        {
            profit = 0;
        }
        profit = (profit.replace(/,/g,''));
        $("#jordProfit").val(profit);

        $("#sdataform input[type=text]").each(function() {
            var res = $(this).attr('name').substring(0, 5);

            if(res == "Total")
            {
                if(parseFloat(this.value) == this.value)
                {
                   // alert(parseFloat(this.value));
                    combinedcost = combinedcost + parseFloat(this.value);
                }
            }

        });

        //set over head
        var otcost = Math.ceil(parseFloat(combinedcost) + parseFloat(profit));
        var overhead = Math.ceil((otcost / 0.7) - otcost);

        var breakeven = Math.ceil(parseFloat(overhead) + parseFloat(combinedcost));

        var othercost = Math.ceil($("#jordOther").val());

        var tto = Math.ceil(parseFloat(overhead) + parseFloat(combinedcost) + parseFloat(profit) + parseFloat(othercost));
        $("#jordOverhead").val(overhead.toFixed(2));
        $("#jordBreakeven").val(breakeven.toFixed(2));
        $("#jordCost").val(tto.toFixed(2));
        $("#stripecost").val(combinedcost.toFixed(2));

    }

    function SetAllValues()
    {
        $("#sdataform input[type=text]").each(function() {
            var res = $(this).attr('name').substring(0, 5);

            if(res == "Quant")
            {
                if(parseFloat(this.value) > 0)
                {
                        alert(res + '=' + parseFloat(this.value));
                }
            }

        });


    }

    function CHECKITO(form)
    {
        if(!testo(form)){ return;
        }

        form.submit();

    }

    function testo(form)
    {


        if(form.jobcostAmount.value != parseFloat(form.jobcostAmount.value))
        {
            alert('Cost must be a valid number.');
            form.jobcostAmount.focus();
            return false;
        }


        if(form.jobcostTitle.value == '')
        {
            alert('Title cannot be blank.');
            form.jobcostTitle.focus();
            return false;
        }


        return true;

    }



    function SetValue(val1, val2, obj, form)
    {
        if(parseFloat(val1) == val1 && parseFloat(val2) == val2)
        {
            var t = Math.ceil(parseFloat(val1) * parseFloat(val2));
            obj.value = t;
            CALCME();

        }
        else
        {
            obj.value = 0;

        }

    }

</script>


<div class="panel">
    <div class="panel-heading">
          <h2> {IF $details.jordName eq ''} {$details['cmpServiceCat']} - {$details.cmpServiceName} {ELSE} {$details['jordName']} {/IF}</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/client/{$proposal.jobID}'><span class="wizard-step-description" >Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/addPOservices/{$proposal.jobID}'><span class="wizard-step-description" style="color: #000000;">Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Notes/{$proposal.jobID}'><span class="wizard-step-description">Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Media/{$proposal.jobID}'><span class="wizard-step-description">Upload &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Status/{$proposal.jobID}'><span class="wizard-step-description">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/previewPO/{$proposal.jobID}'><span class="wizard-step-description">Preview &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li >
        </ul>
    </div>
   <div class="panel-body">
       {include file='projects/_proposalheader.tpl'}
       <!-- row -->
       <form action=""  name="dataform" id="dataform"  method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="sid" id="sid" value="{$sid}">
           <input type="hidden" name="pid" id="pid" value="{$pid}">
           <!-- begin row -->
           <div class="row" style="border:1px solid #000000;background:#e3e3e3">
               <div class="col-sm-5">
                   <h4>Vendor Selected: {$details.jordStripingVendor}</h4>
               </div>
<!--
               <div class="col-sm-4" style='vertical-align:middle;'>
               <select name="vendorid" id="vendorid" style='font-size:1.4EM;'>
               <option value="0">Select a Vendor</option>
                       <option value="PFS">PFS</option>
                       <option value="Native_Lines">Native Lines</option>
                       <option value="Scott_Munroe">Scott Munroe</option>
                       <option value="All_Striping">All Striping</option>
           </select>
               </div>
               <div class="col-sm-3" style='vertical-align:middle;float:right;'>
                   <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Change Vendor</a>
               </div>
               -->

           </div>
    </form>



               <!-- add service detail -->
               <form action="{$SITE_URL}workorders/savePOStriping/{$pid}/{$sid}"  name="sdataform" id="sdataform" method="POST">
                   <input type="hidden" name="beenhere" value="1">
                   <input type="hidden" name="sid" id="sid" value="{$sid}">
                   <input type="hidden" name="pid" id="pid" value="{$pid}">
                   <input type="hidden" name="jobmultijordID" id="jobmultijordID" value="{$sid}">

                   <input type="hidden" name="jordServiceID" id="jordServiceID" value="{$services['cmpServiceID']}">


                   <!-- begin row -->
                   <br>
                   <div class="row" >

                       <div class="col-sm-3">
                           <label class="control-label">Appears on proposal As</label>
                       </div>
                       <div class="col-sm-5">
                           <input type="text" class="form-control" name="jordName" id="jordName" {IF $details.jordName eq ''} value="{$details['cmpServiceCat']} - {$details.cmpServiceName}" {ELSE}  value="{$details['jordName']}" {/IF} />
                       </div>

                       <div class="col-sm-4">
                           Minimum Cost:{$details.cmpServiceDefaultRate}
                           <br/>Preferred Cost:{$details.cmpServicePreferredRate}
                       </div>
                   </div>
                   <br>

                   <!-- common input -->

                       <div class="row">

                           <div class="col-sm-2">
                               <label class="control-label">Customer Price</label>
                               <input type="text" id="jordCost" name="jordCost"
                                      class="form-control "  style='background:lightgreen;' value="{$details.jordCost|number_format:2}">
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Profit</label>
                               <input type="text" id="jordProfit" name="jordProfit"
                                      class="form-control" style='background:yellow;' value="{$details.jordProfit}" onChange="Javascript:CALCME();">
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Breakeven</label>
                               <input type="text" id="jordBreakeven" name="jordBreakeven"
                                      class="form-control"  value="{$details.jordBreakeven|number_format:2}">
                           </div>

                           <div class="col-sm-2">
                               <label class="control-label">Striping</label>
                               <input type="text" id="stripecost" name="stripecost"
                                      class="form-control"  value="">
                           </div>

                           <div class="col-sm-2">
                               <label class="control-label">Over Head</label>
                               <input type="text" id="jordOverhead" name="jordOverhead"
                                      class="form-control" value="{$details.jordOverhead}">
                           </div>

                           <div class="col-sm-2">
                               <label class="control-label">Other costs</label>
                               <input type="text" id="jordOther" name="jordOther"
                                      class="form-control" value="{$othercost}">
                           </div>

                       </div>

                    <br />
                       <!-- buton row -->
                       <div class="row">
                           <div class="col-sm-3">
                               <a href="Javascript:CHECKITS(this.sdataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
                           </div>

                           <div class="col-sm-3">
                                <a href="Javascript:CALCME();" class="btn btn-primary btn-labeled">Calculate</a>
                           </div>
                         </div>
                       <!-- begin row -->
                   <br />
                   <div class="row panel"  style='border:1px #000000 solid;'>

                   <div class="row" >
                           <div class="col-sm-5">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label">Suggested Proposal Text</label>
                                   <br>
                                   {$services['cmpProposalText']}
                                   <div id='explain'></div>
                                   {assign var="ProposalText" value = ''}
                                   {$ProposalText = $details['jordProposalText']}


                                   {IF !$details['jordProposalText']}
                                   {$ProposalText = $services['cmpProposalText']}

                                   {/IF}
                               </div>
                               <a href="Javascript:CHECKITS(this.sdataform);" class="btn btn-primary btn-labeled">Save and Continue</a>

                           </div>

                           <div class="col-sm-6">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label">Actual Proposal Text</label>
                                   <textarea class="myTextEditor" name="jordProposalText" id="jordProposalText">{$ProposalText}</textarea>
                               </div>
                           </div>

                       </div>
                </div>
                   <!-- row -->

                   <!-- begin row -->
                   <div class="row panel"  style='border:1px #000000 solid;'>

                       <h3>Service Location</h3>
                       <div class="row">

                           <div class="col-sm-4">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label"> Address Line 1</label>
                                   <input type="text" id="jordAddress1" name="jordAddress1" class="form-control" size="45" value="{$details['jordAddress1']}">
                               </div>
                           </div>

                           <div class="col-sm-4">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label">Address line 2</label>
                                   <input type="text" id="jordAddress2" name="jordAddress2" class="form-control"  size="45" value="{$details['jordAddress2']}">
                               </div>
                           </div>
                           <div class="col-sm-3">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label"> Parcel number</label>
                                   <input type="text" id="jordParcel" name="jordParcel" class="form-control" size="45" value="{$details['jordParcel']}">
                               </div>
                           </div>
                       </div>
                       <!-- row -->
                       <!-- begin row -->
                       <div class="row">
                           <div class="col-sm-3">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label">City</label>
                                   <input type="text" id="jordCity" name="jordCity" class="form-control" value="{$details['jordCity']}">
                               </div>
                           </div>
                           <div class="col-sm-3">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label"> State</label>
                                   <select id="jordState" name="jordState" class="form-control" >
                                       <option value="{$details['jordState']}">{$details['jordState']}</option>
                                       {$states}
                                   </select>
                               </div>
                           </div>

                           <div class="col-sm-3">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label">Zip Code</label>
                                   <input type="text" id="jordZip" name="jordZip" class="form-control" value="{$details['jordZip']}">
                               </div>
                           </div>

                       </div>
                       <!-- buton row -->
                       <div class="row">
                           <div class="col-sm-3">
                               <a href="Javascript:CHECKITS(this.sdataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
                           </div>

                       </div>
                  </div>
                       <!-- end services form -->



                   <a name="ttop"></a>
                   <h3>Striping Services</h3>
                   {foreach $stripingservice as $stripe}

                       <a href="#{$stripe['SERVICE']}">{$stripe['SERVICE']}</a>&nbsp;|&nbsp;
                   {/foreach}
                   <a href="#other">Other Costs</a>
         <div class="row panel"  style='border:1px #000000 solid;'>

           <div class="row" >
               <div class="col-sm-4">
                   <label class="control-label">Service Name</label>
               </div>
               <div class="col-sm-3">
                   <label class="control-label">Cost</label>
               </div>
               <div class="col-sm-2">
                   <label class="control-label">Quantity</label>
               </div>
               <div class="col-sm-3">
                   <label class="control-label">Total</label>
               </div>

           </div>


             {assign var="stript" value="0"}
             {assign var="cname" value=""}
           {foreach $pricing as $price}
                {IF $cname neq $price['SERVICE']}
                {$cname = $price['SERVICE']}
                <div class="row panel" >
                    <a name="{$price['SERVICE']}"</a>
                    <div class="col-sm-12"><h3>{$price['SERVICE']}</h3>
                        <a href="#ttop">back to top</a>
                    </div>
                </div>

                {/IF}

               <input type='hidden' name="SERVICE__{$price['ScatID']}" id="SERVICE__{$price['ScatID']}" value="{$price['SERVICE']}">
                <input type='hidden' name="SERVICE_DESC__{$price['ScatID']}" id="SERVICE_DESC__{$price['ScatID']}" value="{$price['SERVICE_DESC']}">

               <div class="row" >
                   <div class="col-sm-2">
                       {$price['SERVICE']}
                   </div>
                   <div class="col-sm-2">
                       {$price['SERVICE_DESC']}
                   </div>

                   <div class="col-sm-2">
                       <input type="text" id="Cost__{$price['ScatID']}" name="Cost__{$price['ScatID']}"
                              class="form-control"   value="{IF !$price[$details.jordStripingVendor]}{$price['STANDARD']}{ELSE}{$price[$details.jordStripingVendor]}{/IF}" >
                   </div>

                   <div class="col-sm-3">
                       <input type="text" id="Quantity__{$price['ScatID']}" name="Quantity__{$price['ScatID']}"
                              class="form-control"  value="{$price['quantity']}"
                              onChange="Javascript:SetValue(this.value,this.form.Cost__{$price['ScatID']}.value,this.form.Total__{$price['ScatID']},this.form);">
                   </div>

                   <div class="col-sm-3">
                       <input type="text" id="Total__{$price['ScatID']}" name="Total__{$price['ScatID']}"
                              class="form-control"
                              value="{IF !$price[$details.jordStripingVendor]}{($price['STANDARD'] * $price['quantity'])}{ELSE}{($price[$details.jordStripingVendor] * $price['quantity'])}{/IF}">
                   </div>
               </div>
               <br/>
               {IF !$price[$details.jordStripingVendor]}
                    {$stript = $stript + ($price['STANDARD'] * $price['quantity'])}
               {ELSE}
                    {$stript = $stript + ($price[$details.jordStripingVendor] * $price['quantity'])}
               {/IF}
               {IF $price['quantity'] gt 0}
                <script>
                    $("#explain").append("{$price['quantity']} - {$price['SERVICE']} - {$price['SERVICE_DESC']}<br/>");
                </script>
               {/IF}

{/foreach}
</div>
                </form>
<script type="text/javascript">
    var stotal = {$stript};

</script>
   </div>
</div>

<div class="panel">
    <div class="row">
        <div class="col-sm-3">
            <a href="Javascript:CHECKITS(this.sdataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
        </div>

    </div>
</div>
<a href="#ttop">back to top</a>
<a name="other" />
<!-- Other costs -->
<br />
<div class="row panel"  style='border:1px #000000 solid;'>
    <h3>Other Costs</h3>

    <form action="{$SITE_URL}workorders/addPOSOther/{$pid}/{$sid}"  name="odataform" id="odataform" method="POST">
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" name="sid" id="sid" value="{$sid}">
        <input type="hidden" name="pid" id="pid" value="{$pid}">
        <input type="hidden" name="jordServiceID" id="jordServiceID" value="{$details.cmpServiceID}">




        <!-- begin row -->
        <div class="row" >
            <div class="col-sm-3">
                <label class="control-label">Add Additional Cost</label>
            </div>
            <div class="col-sm-7">
                <label class="control-label">Description</label>
            </div>
            <div class="col-sm-2">
                <label class="control-label">Cost</label>
            </div>


        </div>

        <!-- begin row -->
        <div class="row" >
            <div class="col-sm-3">
                <select name="jobcostTitle" id="jobcostTitle">
                    {foreach $otherlist as $o}
                        <option value="{$o.OtherCost}">{$o.OtherCost}</option>
                    {/foreach}
                </select>
            </div>
            <div class="col-sm-7">
                <textarea name="jobcostDescription" id="jobcostDescription" class="form-control"></textarea>
            </div>
            <div class="col-sm-2">
                <input type="text" id="jobcostAmount" name="jobcostAmount"
                       class="form-control"  style='background:yellow;' >
            </div>

        </div>
        <br />
        {assign var="ov" value=0}


        {IF $other}
            <!-- begin row -->
            <div class="row" >
                <div class="col-sm-3">

                    Other Service
                </div>
                <div class="col-sm-6">
                    Description
                </div>
                <div class="col-sm-1">
                    Cost
                </div>
                <div class="col-sm-2">
                    &nbsp;
                </div>
            </div>

        {foreach $other as $data}
            <!-- begin row -->
            <div class="row" >

                <div class="col-sm-3">
                    {$data['jobcostTitle']}
                </div>

                <div class="col-sm-6">
                    {$data['jobcostDescription']}
                </div>

                <div class="col-sm-1">
                    ${$data['jobcostAmount']}
                </div>


                <div class="col-sm-2">
                    <a href='{$SITE_URL}workorders/deletePOSOther/{$pid}/{$sid}/{$data['jobcostID']}'>remove</a>
                </div>


            </div>

            {$ov = $ov + ($data['jobcostAmount'])}

        {/foreach}
        {/IF}
        <!-- begin row -->
        <div class="row" >
            <div class="col-sm-3">
                <a href="Javascript:CHECKITO(this.odataform);" class="btn btn-primary btn-labeled">Add Additional Costs</a>
            </div>
            <div class="col-sm-2">
                <label class="control-label">Total Additional Cost</label>
            </div>

            <div class="col-sm-3">
                <input type="text" id="POOtherTotal" name="POOtherTotal"
                       class="form-control"   style='background:lightblue;' value="{$ov|string_format:"%.2f"}" disabled>
            </div>
        </div>


    </form>
</div>







