<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-09-27 19:56:41
         compiled from "application/views/templates/projects/poAddStriping.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80961764360116498b71358-53800719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bec4fdfb4449df3eae65ad7d2b0a72003f5fcba' => 
    array (
      0 => 'application/views/templates/projects/poAddStriping.tpl',
      1 => 1632772504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80961764360116498b71358-53800719',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_60116498e2d036_52827060',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'details' => 0,
    'proposal' => 0,
    'sid' => 0,
    'pid' => 0,
    'services' => 0,
    'othercost' => 0,
    'ProposalText' => 0,
    'states' => 0,
    'stripingservice' => 0,
    'stripe' => 0,
    'pricing' => 0,
    'cname' => 0,
    'price' => 0,
    'stript' => 0,
    'otherlist' => 0,
    'o' => 0,
    'other' => 0,
    'data' => 0,
    'ov' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60116498e2d036_52827060')) {function content_60116498e2d036_52827060($_smarty_tpl) {?><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/tiny_mce/tiny_mce.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">


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

        var dURL = '<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/changeStripingVendor/' + pid + '/' + sid + '/' + vendorid;

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

<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">
          <h2> <?php if ($_smarty_tpl->tpl_vars['details']->value['jordName']=='') {?> <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
 - <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceName'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
 <?php }?></h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/client/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" >Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOservices/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" style="color: #000000;">Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Notes/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Media/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Upload &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Status/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/previewPO/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Preview &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li >
        </ul>
    </div>
   <div class="panel-body">
       <?php echo $_smarty_tpl->getSubTemplate ('projects/_proposalheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

       <!-- row -->
       <form action=""  name="dataform" id="dataform"  method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
           <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
           <!-- begin row -->
           <div class="row" style="border:1px solid #000000;background:#e3e3e3">
               <div class="col-sm-5">
                   <h4>Vendor Selected: <?php echo $_smarty_tpl->tpl_vars['details']->value['jordStripingVendor'];?>
</h4>
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
               <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/savePOStriping/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="sdataform" id="sdataform" method="POST">
                   <input type="hidden" name="beenhere" value="1">
                   <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
                   <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
                   <input type="hidden" name="jobmultijordID" id="jobmultijordID" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">

                   <input type="hidden" name="jordServiceID" id="jordServiceID" value="<?php echo $_smarty_tpl->tpl_vars['services']->value['cmpServiceID'];?>
">


                   <!-- begin row -->
                   <br>
                   <div class="row" >

                       <div class="col-sm-3">
                           <label class="control-label">Appears on proposal As</label>
                       </div>
                       <div class="col-sm-5">
                           <input type="text" class="form-control" name="jordName" id="jordName" <?php if ($_smarty_tpl->tpl_vars['details']->value['jordName']=='') {?> value="<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
 - <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceName'];?>
" <?php } else { ?>  value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
" <?php }?> />
                       </div>

                       <div class="col-sm-4">
                           Minimum Cost:<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceDefaultRate'];?>

                           <br/>Preferred Cost:<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServicePreferredRate'];?>

                       </div>
                   </div>
                   <br>

                   <!-- common input -->

                       <div class="row">

                           <div class="col-sm-2">
                               <label class="control-label">Customer Price</label>
                               <input type="text" id="jordCost" name="jordCost"
                                      class="form-control "  style='background:lightgreen;' value="<?php echo number_format($_smarty_tpl->tpl_vars['details']->value['jordCost'],2);?>
">
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Profit</label>
                               <input type="text" id="jordProfit" name="jordProfit"
                                      class="form-control" style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordProfit'];?>
" onChange="Javascript:CALCME();">
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Breakeven</label>
                               <input type="text" id="jordBreakeven" name="jordBreakeven"
                                      class="form-control"  value="<?php echo number_format($_smarty_tpl->tpl_vars['details']->value['jordBreakeven'],2);?>
">
                           </div>

                           <div class="col-sm-2">
                               <label class="control-label">Striping</label>
                               <input type="text" id="stripecost" name="stripecost"
                                      class="form-control"  value="">
                           </div>

                           <div class="col-sm-2">
                               <label class="control-label">Over Head</label>
                               <input type="text" id="jordOverhead" name="jordOverhead"
                                      class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordOverhead'];?>
">
                           </div>

                           <div class="col-sm-2">
                               <label class="control-label">Other costs</label>
                               <input type="text" id="jordOther" name="jordOther"
                                      class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['othercost']->value;?>
">
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
                                   <?php echo $_smarty_tpl->tpl_vars['services']->value['cmpProposalText'];?>

                                   <div id='explain'></div>
                                   <?php $_smarty_tpl->tpl_vars["ProposalText"] = new Smarty_variable('', null, 0);?>
                                   <?php $_smarty_tpl->tpl_vars['ProposalText'] = new Smarty_variable($_smarty_tpl->tpl_vars['details']->value['jordProposalText'], null, 0);?>


                                   <?php if (!$_smarty_tpl->tpl_vars['details']->value['jordProposalText']) {?>
                                   <?php $_smarty_tpl->tpl_vars['ProposalText'] = new Smarty_variable($_smarty_tpl->tpl_vars['services']->value['cmpProposalText'], null, 0);?>

                                   <?php }?>
                               </div>
                               <a href="Javascript:CHECKITS(this.sdataform);" class="btn btn-primary btn-labeled">Save and Continue</a>

                           </div>

                           <div class="col-sm-6">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label">Actual Proposal Text</label>
                                   <textarea class="myTextEditor" name="jordProposalText" id="jordProposalText"><?php echo $_smarty_tpl->tpl_vars['ProposalText']->value;?>
</textarea>
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
                                   <input type="text" id="jordAddress1" name="jordAddress1" class="form-control" size="45" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress1'];?>
">
                               </div>
                           </div>

                           <div class="col-sm-4">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label">Address line 2</label>
                                   <input type="text" id="jordAddress2" name="jordAddress2" class="form-control"  size="45" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordAddress2'];?>
">
                               </div>
                           </div>
                           <div class="col-sm-3">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label"> Parcel number</label>
                                   <input type="text" id="jordParcel" name="jordParcel" class="form-control" size="45" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordParcel'];?>
">
                               </div>
                           </div>
                       </div>
                       <!-- row -->
                       <!-- begin row -->
                       <div class="row">
                           <div class="col-sm-3">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label">City</label>
                                   <input type="text" id="jordCity" name="jordCity" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordCity'];?>
">
                               </div>
                           </div>
                           <div class="col-sm-3">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label"> State</label>
                                   <select id="jordState" name="jordState" class="form-control" >
                                       <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
"><?php echo $_smarty_tpl->tpl_vars['details']->value['jordState'];?>
</option>
                                       <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

                                   </select>
                               </div>
                           </div>

                           <div class="col-sm-3">
                               <div class="form-group no-margin-hr">
                                   <label class="control-label">Zip Code</label>
                                   <input type="text" id="jordZip" name="jordZip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordZip'];?>
">
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
                   <?php  $_smarty_tpl->tpl_vars['stripe'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stripe']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stripingservice']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stripe']->key => $_smarty_tpl->tpl_vars['stripe']->value) {
$_smarty_tpl->tpl_vars['stripe']->_loop = true;
?>

                       <a href="#<?php echo $_smarty_tpl->tpl_vars['stripe']->value['SERVICE'];?>
"><?php echo $_smarty_tpl->tpl_vars['stripe']->value['SERVICE'];?>
</a>&nbsp;|&nbsp;
                   <?php } ?>
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


             <?php $_smarty_tpl->tpl_vars["stript"] = new Smarty_variable("0", null, 0);?>
             <?php $_smarty_tpl->tpl_vars["cname"] = new Smarty_variable('', null, 0);?>
           <?php  $_smarty_tpl->tpl_vars['price'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['price']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pricing']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['price']->key => $_smarty_tpl->tpl_vars['price']->value) {
$_smarty_tpl->tpl_vars['price']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['cname']->value!=$_smarty_tpl->tpl_vars['price']->value['SERVICE']) {?>
                <?php $_smarty_tpl->tpl_vars['cname'] = new Smarty_variable($_smarty_tpl->tpl_vars['price']->value['SERVICE'], null, 0);?>
                <div class="row panel" >
                    <a name="<?php echo $_smarty_tpl->tpl_vars['price']->value['SERVICE'];?>
"</a>
                    <div class="col-sm-12"><h3><?php echo $_smarty_tpl->tpl_vars['price']->value['SERVICE'];?>
</h3>
                        <a href="#ttop">back to top</a>
                    </div>
                </div>

                <?php }?>

               <input type='hidden' name="SERVICE__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
" id="SERVICE__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['price']->value['SERVICE'];?>
">
                <input type='hidden' name="SERVICE_DESC__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
" id="SERVICE_DESC__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['price']->value['SERVICE_DESC'];?>
">

               <div class="row" >
                   <div class="col-sm-2">
                       <?php echo $_smarty_tpl->tpl_vars['price']->value['SERVICE'];?>

                   </div>
                   <div class="col-sm-2">
                       <?php echo $_smarty_tpl->tpl_vars['price']->value['SERVICE_DESC'];?>

                   </div>

                   <div class="col-sm-2">
                       <input type="text" id="Cost__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
" name="Cost__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
"
                              class="form-control"   value="<?php if (!$_smarty_tpl->tpl_vars['price']->value[$_smarty_tpl->tpl_vars['details']->value['jordStripingVendor']]) {
echo $_smarty_tpl->tpl_vars['price']->value['STANDARD'];
} else {
echo $_smarty_tpl->tpl_vars['price']->value[$_smarty_tpl->tpl_vars['details']->value['jordStripingVendor']];
}?>" >
                   </div>

                   <div class="col-sm-3">
                       <input type="text" id="Quantity__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
" name="Quantity__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
"
                              class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['price']->value['quantity'];?>
"
                              onChange="Javascript:SetValue(this.value,this.form.Cost__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
.value,this.form.Total__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
,this.form);">
                   </div>

                   <div class="col-sm-3">
                       <input type="text" id="Total__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
" name="Total__<?php echo $_smarty_tpl->tpl_vars['price']->value['ScatID'];?>
"
                              class="form-control"
                              value="<?php if (!$_smarty_tpl->tpl_vars['price']->value[$_smarty_tpl->tpl_vars['details']->value['jordStripingVendor']]) {
echo ($_smarty_tpl->tpl_vars['price']->value['STANDARD']*$_smarty_tpl->tpl_vars['price']->value['quantity']);
} else {
echo ($_smarty_tpl->tpl_vars['price']->value[$_smarty_tpl->tpl_vars['details']->value['jordStripingVendor']]*$_smarty_tpl->tpl_vars['price']->value['quantity']);
}?>">
                   </div>
               </div>
               <br/>
               <?php if (!$_smarty_tpl->tpl_vars['price']->value[$_smarty_tpl->tpl_vars['details']->value['jordStripingVendor']]) {?>
                    <?php $_smarty_tpl->tpl_vars['stript'] = new Smarty_variable($_smarty_tpl->tpl_vars['stript']->value+($_smarty_tpl->tpl_vars['price']->value['STANDARD']*$_smarty_tpl->tpl_vars['price']->value['quantity']), null, 0);?>
               <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars['stript'] = new Smarty_variable($_smarty_tpl->tpl_vars['stript']->value+($_smarty_tpl->tpl_vars['price']->value[$_smarty_tpl->tpl_vars['details']->value['jordStripingVendor']]*$_smarty_tpl->tpl_vars['price']->value['quantity']), null, 0);?>
               <?php }?>
               <?php if ($_smarty_tpl->tpl_vars['price']->value['quantity']>0) {?>
                <?php echo '<script'; ?>
>
                    $("#explain").append("<?php echo $_smarty_tpl->tpl_vars['price']->value['quantity'];?>
 - <?php echo $_smarty_tpl->tpl_vars['price']->value['SERVICE'];?>
 - <?php echo $_smarty_tpl->tpl_vars['price']->value['SERVICE_DESC'];?>
<br/>");
                <?php echo '</script'; ?>
>
               <?php }?>

<?php } ?>
</div>
                </form>
<?php echo '<script'; ?>
 type="text/javascript">
    var stotal = <?php echo $_smarty_tpl->tpl_vars['stript']->value;?>
;

<?php echo '</script'; ?>
>
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

    <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOSOther/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="odataform" id="odataform" method="POST">
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
        <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
        <input type="hidden" name="jordServiceID" id="jordServiceID" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
">




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
                    <?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['otherlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['o']->value['OtherCost'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['OtherCost'];?>
</option>
                    <?php } ?>
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
        <?php $_smarty_tpl->tpl_vars["ov"] = new Smarty_variable(0, null, 0);?>


        <?php if ($_smarty_tpl->tpl_vars['other']->value) {?>
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

        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['other']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
            <!-- begin row -->
            <div class="row" >

                <div class="col-sm-3">
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostTitle'];?>

                </div>

                <div class="col-sm-6">
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostDescription'];?>

                </div>

                <div class="col-sm-1">
                    $<?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostAmount'];?>

                </div>


                <div class="col-sm-2">
                    <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deletePOSOther/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['jobcostID'];?>
'>remove</a>
                </div>


            </div>

            <?php $_smarty_tpl->tpl_vars['ov'] = new Smarty_variable($_smarty_tpl->tpl_vars['ov']->value+($_smarty_tpl->tpl_vars['data']->value['jobcostAmount']), null, 0);?>

        <?php } ?>
        <?php }?>
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
                       class="form-control"   style='background:lightblue;' value="<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['ov']->value);?>
" disabled>
            </div>
        </div>


    </form>
</div>







<?php }} ?>
