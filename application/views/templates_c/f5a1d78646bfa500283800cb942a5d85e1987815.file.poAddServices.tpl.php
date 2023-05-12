<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-01-27 13:08:29
         compiled from "application/views/templates/projects/poAddServices.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1001076467601165cd3fd632-73413073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5a1d78646bfa500283800cb942a5d85e1987815' => 
    array (
      0 => 'application/views/templates/projects/poAddServices.tpl',
      1 => 1506488189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1001076467601165cd3fd632-73413073',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'details' => 0,
    'subcontractors' => 0,
    'o' => 0,
    'equipmentlist' => 0,
    'i' => 0,
    'data' => 0,
    'materials' => 0,
    'm' => 0,
    'services' => 0,
    'proposal' => 0,
    'pid' => 0,
    'sid' => 0,
    'mat' => 0,
    'ProposalText' => 0,
    'states' => 0,
    'vehiclelist' => 0,
    'vehicles' => 0,
    'tv' => 0,
    'equipment' => 0,
    'ecost' => 0,
    'ev' => 0,
    'laborlist' => 0,
    'labor' => 0,
    'lv' => 0,
    'otherlist' => 0,
    'other' => 0,
    'ov' => 0,
    'subs' => 0,
    'sov' => 0,
    'suboh' => 0,
    'tscost' => 0,
    'sv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_601165cd7d3fa8_23486991',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_601165cd7d3fa8_23486991')) {function content_601165cd7d3fa8_23486991($_smarty_tpl) {?><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/tiny_mce/tiny_mce.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">


//when document ready add totals
$(document).ready(function(){

    //$.growl.error({ title: "Save and Save Often", message: "Click 'Save and Continue' to update your proposal service."});

    $("#loading-div-background").css({ opacity: 0.8 });

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


    var st = $("#SubTotal").val();

    if(st == '')
     {
       st = 0;
     }
    var vt = $("#POVTotal").val();
    if(vt == '')
     {
         vt =0;
     }

    var et = $("#POequipTotal").val();
    if(et =='')
    {
        et=0;
    }
    var lt = $("#POlaborTotal").val();
    if(lt =='')
     {
         lt=0;
     }
    var ot = $("#POOtherTotal").val();
    if(ot =='')
     {
         ot=0;
     }
    var mt = $("#matcost").val();
    if(mt =='')
      {
          mt=0;
      }
    $("#vcost").val(vt);
    $("#ecost").val(et);
    $("#mcost").val(mt);
    $("#lcost").val(lt);
    $("#ocost").val(ot);
    $("#scost").val(st);

    var combinedcost = parseFloat(vt) + parseFloat(et) + parseFloat(lt) + parseFloat(ot) + parseFloat(mt);
    //update totals on form
    CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');

});

var suboh = new Array();
suboh.push("0");
<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcontractors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
?>

suboh.push("<?php echo $_smarty_tpl->tpl_vars['o']->value['cntOverHead'];?>
");

<?php } ?>

function getSubOH(form)
{

    form.posubOverHead.value = suboh[form.posubVendorID.selectedIndex];
}


var equipArr = new Array();



<?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>



equipArr[0] = new Array(3);

equipArr[0][0] = "0";
equipArr[0][1] = "0";
equipArr[0][2] = "0";

<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['equipmentlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>

<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
equipArr[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
] = new Array(3);

equipArr[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][0] = "<?php echo $_smarty_tpl->tpl_vars['data']->value['equipCost'];?>
";
equipArr[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][1] = "<?php echo $_smarty_tpl->tpl_vars['data']->value['equipMinCost'];?>
";
equipArr[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][2] = "<?php echo $_smarty_tpl->tpl_vars['data']->value['equipRate'];?>
";


<?php } ?>

function getEquipMin(form)
{
    var ind = form.POequipEquipmentID.selectedIndex;
    var bcost = equipArr[form.POequipEquipmentID.selectedIndex][1];
    form.mincost.value = '$' + bcost;
    form.POEquipMinCost.value = bcost;
    form.equipMinCost.value = bcost;
}


    var matcost = new Array();
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['materials']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>

    matcost[<?php echo $_smarty_tpl->tpl_vars['m']->value['omatMatID'];?>
,0] = '<?php echo $_smarty_tpl->tpl_vars['m']->value['omatName'];?>
';
    matcost[<?php echo $_smarty_tpl->tpl_vars['m']->value['omatMatID'];?>
,1] = <?php echo $_smarty_tpl->tpl_vars['m']->value['omatCost'];?>
;

    <?php } ?>



function CHECKIT(form)
{

   if(!test(form)){ return;
    }

    var q = tinyMCE.get('jordProposalText').getContent();
    tinyMCE.triggerSave();

    form.submit();
}

function test(form)
{
    var q = tinyMCE.get('jordProposalText').getContent();
    tinyMCE.triggerSave();

    CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
',1);

    if(parseFloat(form.jordCost.value) < parseFloat(<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceDefaultRate'];?>
))
    {
        alert("Your service cost is less than our minimum. $<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceDefaultRate'];?>
");
        return false;
    }
    if(parseFloat(form.jordProfit.value) != form.jordProfit.value)
    {
        alert("You are leaving profit at 0.");
        form.jordProfit.value = 0;

    }

    //check values
    var msg = '';
    if(parseInt(form.vcost.value) == 0)
    {

        var msg = msg + 'You do not have any vehicles on the service.\n';
    }
    if(parseInt(form.ecost.value) == 0)
    {
        var msg = msg + 'You do not have any equipment on the service.\n';
    }

    if(parseInt(form.lcost.value) == 0)
    {
        var msg = msg + 'You do not have any labor on the service.\n';
    }


/*
    if(msg != '')
    {
        var itsok = confirm(msg);
        if(!itsok)
        {
            return false;
        }
    }
*/

    showSpinner('Thank you, Please wait.');

    return true;

}


function CALCME(form,stype,sid,givealert)
{
    if (typeof givealert === 'undefined') { givealert = 0; }
    var square = 0;


    var profit = $("#jordProfit").val();
    if(!profit)
    {
        profit = 0;
    }
    profit = (profit.replace(/,/g,''));
    $("#jordProfit").val(profit);

    switch(stype) {

    case 'Seal Coating':

        if(form.jordSquareFeet.value == parseInt(form.jordSquareFeet.value) && form.jordPrimer.value == parseInt(form.jordPrimer.value) && form.jordFastSet.value == parseInt(form.jordFastSet.value))
        {


            var multiplyer = Math.ceil(form.jordSquareFeet.value / form.jordYield[form.jordYield.selectedIndex].value);
            //calculate amounts

            square = form.jordSquareFeet.value;
           /*
            SEALER  = Size/Yield  = GAL SEALER
            AND SAND = GAL SEALER * 2
            ADDITIVE = AND GAL SEALER / 50
            */
            var primer = form.jordPrimer.value;
            var fastset = form.jordFastSet.value;

            var sealer = multiplyer;
            var sand = Math.ceil(multiplyer * 2);
            var additive = Math.ceil(multiplyer / 50);
            form.jordSand.value = sand;
            form.jordSealer.value = sealer;
            form.jordAdditive.value = additive;
            var sealercost = form.sealer.value;
            var sandcost = form.sand.value;
            var additivecost = form.additive.value;
            var primercost = form.primer.value;
            var fastsetcost = form.fastset.value;


            var sandtotal = Math.ceil(parseFloat(sandcost) * parseFloat(sand));
            var fastsettotal = Math.ceil(parseFloat(fastsetcost) * parseFloat(fastset));
            var primertotal = Math.ceil(parseFloat(primercost) * parseFloat(primer));
            var additivetotal = Math.ceil(parseFloat(additivecost) * parseFloat(additive));
            var sealertotal = Math.ceil(parseFloat(sealercost) * parseFloat(sealer));

            form.SandTotal.value = '$' + sandtotal.toFixed(2);
            form.FastSetTotal.value = '$' + fastsettotal.toFixed(2);
            form.SealerTotal.value = '$' + sealertotal.toFixed(2);
            form.PrimerTotal.value = '$' + primertotal.toFixed(2);
            form.AdditiveTotal.value = '$' + additivetotal.toFixed(2);

            var subtotal = Math.ceil(
                    parseFloat(sandtotal)  +
                    parseFloat(fastsettotal) +
                    parseFloat(primertotal) +
                   parseFloat(additivetotal) +
                   parseFloat(sealertotal)
            );

            form.mcost.value = subtotal;

            //total up
            var combinedcost = parseFloat($("#POVTotal").val()) + parseFloat($("#POequipTotal").val()) + parseFloat($("#POlaborTotal").val()) + parseFloat($("#POOtherTotal").val()) + parseFloat(form.mcost.value);

            var otcost = Math.ceil(parseFloat(combinedcost) + parseFloat(profit));
            var overhead = Math.ceil((otcost / 0.7) - otcost);
            $("#explain").html('calculated at 30%');
            //var overhead = Math.ceil((parseFloat(combinedcost) +  parseFloat(profit)) * 30)/100;


            var str = form.jordProposalText.value;
            var newstr = str.replace('@@SQFT@@', form.jordSquareFeet.value);
            var newstr = newstr.replace('@@PHASES@@', form.jordPhases.value);
            form.jordProposalText.value = newstr;


        }
        else
        {
           if(givealert == 1)
               {
                   alert("You must select a yield, enter square feet, and gallons of primer and fastset.");
               }
        }


        break;

    case 'Paver Brick':

        if(form.jordSquareFeet.value == parseInt(form.jordSquareFeet.value) && form.jordCostPerDay.value == parseInt(form.jordCostPerDay.value) && form.jordVendorServiceDescription.value != '')
        {
            form.mcost.value = form.jordCostPerDay.value;
            var profit = form.jordProfit.value;
            if (profit =='')
            {
                profit = 0;
            }
            square = form.jordSquareFeet.value;
            //total up
            var combinedcost = parseFloat($("#POVTotal").val()) + parseFloat($("#POequipTotal").val()) + parseFloat($("#POlaborTotal").val()) + parseFloat($("#POOtherTotal").val()) + parseFloat(form.mcost.value);

            var otcost = Math.ceil(parseFloat(combinedcost) + parseFloat(profit));
            var overhead = Math.ceil((otcost / 0.75) - otcost);
            $("#explain").html('calculated at 25%');
            // set cost

            var str = form.jordProposalText.value;
            var newstr = str.replace('@@SQFT@@', form.jordSquareFeet.value);
            newstr = newstr.replace('@@TONS@@', form.jordTons.value);
            form.jordProposalText.value = newstr;


        }
        else
        {
            if(givealert == 1)
            {
                alert("You must fill in a cost, sq. ft. and description.");
            }
        }

        break;


    case 'Drainage and Catchbasins':


        if(form.jordAdditive.value == parseInt(form.jordAdditive.value) && form.jordCostPerDay.value == parseInt(form.jordCostPerDay.value) && form.jordVendorServiceDescription.value != '')
        {
            form.mcost.value = form.jordCostPerDay.value;
            var profit = form.jordProfit.value;
            if (profit =='')
            {
                profit = 0;
            }

            //total up
            var combinedcost = parseFloat($("#POVTotal").val()) + parseFloat($("#POequipTotal").val()) + parseFloat($("#POlaborTotal").val()) + parseFloat($("#POOtherTotal").val()) + parseFloat(form.mcost.value);

            var otcost = Math.ceil(parseFloat(combinedcost) + parseFloat(profit));
            var overhead = Math.ceil((otcost / 0.7) - otcost);
            $("#explain").html('calculated at 30%');


            var str = form.jordProposalText.value;
            var newstr = str.replace('@@BASINS@@', form.jordAdditive.value);
            form.jordProposalText.value = newstr;


        }
        else
        {
            if(givealert == 1)
            {
                alert("You must fill in a cost, number of drains and description.");
            }
        }




        break;

    case 'Sub Contractor':


        if(form.jordAdditive.value == 0 && form.boh.value == parseInt(form.boh.value))
        {
            form.jordAdditive.value = form.boh.value;
        }

        if(form.jordAdditive.value == parseInt(form.jordAdditive.value) && form.jordCostPerDay.value == parseInt(form.jordCostPerDay.value) && form.jordVendorServiceDescription.value != '')
        {

            form.mcost.value = form.jordCostPerDay.value;
            var profit = form.jordProfit.value;
            if (profit =='')
            {
                profit = 0;
            }

            //total up
            var combinedcost = parseFloat($("#POVTotal").val()) + parseFloat($("#POequipTotal").val()) + parseFloat($("#POlaborTotal").val()) + parseFloat($("#POOtherTotal").val()) + parseFloat(form.mcost.value);

            var otcost = Math.ceil(parseFloat(combinedcost) + parseFloat(profit));
            if(form.jordAdditive.value = parseInt(form.jordAdditive.value))
            {
                    var soh = parseFloat(1-(form.jordAdditive.value / 100));
                   // alert(soh + '-' + otcost);
                    overhead = Math.ceil((otcost/soh) - otcost);

                  $("#explain").html('calculated at ' + form.jordAdditive.value + '%');
            }

               else // sub has no overhead value use standard
            {
                var overhead = Math.ceil((otcost / 0.7) - otcost);
                $("#explain").html('calculated at 30%');
            }


        }
        else
        {
            if(givealert == 1)
            {
                alert("You must fill in a cost and description and over head rate.");
            }
            //form.jordAdditive.value = 0;

        }


        break;


    case 'Other':


        if(form.jordCostPerDay.value == parseInt(form.jordCostPerDay.value) && form.jordVendorServiceDescription.value != '')
        {
            form.mcost.value = form.jordCostPerDay.value;
            var profit = form.jordProfit.value;
            if (profit =='')
            {
                profit = 0;
            }

            //total up
            var combinedcost = parseFloat($("#POVTotal").val()) + parseFloat($("#POequipTotal").val()) + parseFloat($("#POlaborTotal").val()) + parseFloat($("#POOtherTotal").val()) + parseFloat(form.mcost.value);
            //set over head to zero for other
            var overhead = 0;//Math.ceil((parseFloat(combinedcost) +  parseFloat(profit)) * 0.3);


        }
        else
        {
            if(givealert == 1)
            {
                alert("You must fill in a cost and description.");
            }
        }


        break;



    case 'Rock':
            /*
            2 -Rock
             Cost_calculation Size x (7/1080) x Depth  = TONS
             Tons/18 = LOADS (Rounded UP to nearest whole number)

             */
            //  fill in tons and loads
            if(form.jordSquareFeet.value == parseInt(form.jordSquareFeet.value) && form.jordDepthInInches.value == parseInt(form.jordDepthInInches.value))
            {


                var varnish = (7/1080);
                var tons = Math.ceil(form.jordSquareFeet.value * varnish  * form.jordDepthInInches.value);
                var loads = Math.ceil(tons/18);
                $("#jordTons").val(tons);
                $("#jordLoads").val(loads);
                var rockcost = form.rockcost.value;

                form.mcost.value = (tons * rockcost);
                var profit = form.jordProfit.value;
                if (profit =='')
                {
                    profit = 0;
                }

                //total up
                var combinedcost = parseFloat($("#POVTotal").val()) + parseFloat($("#POequipTotal").val()) + parseFloat($("#POlaborTotal").val()) + parseFloat($("#POOtherTotal").val()) + parseFloat(form.mcost.value);
                //set over head
                var otcost = Math.ceil(parseFloat(combinedcost) + parseFloat(profit));
                var overhead = Math.ceil((otcost / 0.7) - otcost);
                $("#explain").html('calculated at 30%');


                var str = form.jordProposalText.value;
                var newstr = str.replace('@@INCHES@@', form.jordDepthInInches.value);
                form.jordProposalText.value = newstr;

            }
            else
            {
                if(givealert == 1)
                {
                    alert('You must fill in square feet and depth in inches.');
                }
            }


            break;

        case 'Excavation':
              //  fill in tons and loads
            if(form.jordSquareFeet.value == parseInt(form.jordSquareFeet.value) && form.jordDepthInInches.value == parseInt(form.jordDepthInInches.value)  && form.jordCostPerDay.value == parseInt(form.jordCostPerDay.value))
            {
                var tontimes = (7/1080);
                var tons = Math.ceil(form.jordSquareFeet.value * tontimes * form.jordDepthInInches.value);
                var loads = Math.ceil(tons/18);

                $("#jordTons").val(tons);
                $("#jordLoads").val(loads);
                var ourcost = form.jordCostPerDay.value;
                form.mcost.value = ourcost;
                var profit = form.jordProfit.value;
                if (profit =='')
                {
                    profit = 0;
                }
                //total up
                var combinedcost = parseFloat($("#POVTotal").val()) + parseFloat($("#POequipTotal").val()) + parseFloat($("#POlaborTotal").val()) + parseFloat($("#POOtherTotal").val()) + parseFloat(form.mcost.value);
                //set over head
                var otcost = Math.ceil(parseFloat(combinedcost) + parseFloat(profit));
                var overhead = Math.ceil((otcost / 0.7) - otcost);
                $("#explain").html('calculated at 30%');



                var str = form.jordProposalText.value;
                var newstr = str.replace('@@TONS@@', tons);
                form.jordProposalText.value = newstr;

            }
                else
            {
                if(givealert == 1)
                {
                    alert('You must enter our cost, based on tons and loads, sq. ft. and depth in inches.');
                }

            }


            break;

    case 'Concrete':

        var curbcost = form.curbmix.value;
        var drumcost = form.drummix.value;

        if (sid < 12)
        { //linear feet

            if(form.jordLinearFeet.value == parseInt(form.jordLinearFeet.value))
                {
                    square =form.jordLinearFeet.value;
                    var lf = form.jordLinearFeet.value;
                    var cy = Math.ceil(lf/60);
                    /*
                     6 	Concrete 	Curb (Extruded) [New or Repairs]  (lf/60)
                     7 	Concrete 	Curb (Type D) [New or Repairs] 	(lf/21)
                     8 	Concrete 	Curb (Type Mod D) [New or Repairs] (lf/30)
                     9 	Concrete 	Curb (Type F) [New or Repairs] 	(lf/24)
                     10 	Concrete 	Curb (Valley Gutter) [New or Repairs] (lf/15)
                     11 	Concrete 	Curb (Header) [New or Repairs] 	(lf/25)
                     */


                    if(sid ==6)
                    {
                        cy = Math.ceil(lf/60);
                    }

                    if(sid ==7)
                    {
                        cy = Math.ceil(lf/21);
                    }
                    if(sid ==8)
                    {
                        cy = Math.ceil(lf/30);
                    }
                    if(sid ==9)
                    {
                        cy = Math.ceil(lf/24);
                    }
                    if(sid ==10)
                    {
                        cy = Math.ceil(lf/15);
                    }

                    if(sid ==11)
                    {
                        cy = Math.ceil(lf/25);
                    }



                    $("#jordCubicYards").val(cy);

                    form.mcost.value = Math.ceil(cy * curbcost);


                    var profit = form.jordProfit.value;
                    if (profit =='')
                    {
                        profit = 0;
                    }
                    //total up
                    var combinedcost = parseFloat($("#POVTotal").val()) + parseFloat($("#POequipTotal").val()) + parseFloat($("#POlaborTotal").val()) + parseFloat($("#POOtherTotal").val()) + parseFloat(form.mcost.value);
                    //set over head
                    var otcost = Math.ceil(parseFloat(combinedcost) + parseFloat(profit));
                    var overhead = Math.ceil((otcost / 0.7) - otcost);
                    $("#explain").html('calculated at 30%');


                    var str = form.jordProposalText.value;
                    var newstr = str.replace('@@TONS@@', cy);
                    form.jordProposalText.value = newstr;

                }
                else
                {
                    if(givealert == 1)
                    {
                        alert('You must fill in linear feet.');
                    }
                }

        }
        else
        {
            /*depth and sqq ft sid 12, 13 14
             12 	Concrete 	Slab [New or Repairs] 	(SF * Depth)/300
             13 	Concrete 	Ramp [New or Repairs] 	(SF * Depth)/300
             14 	Concrete	Sidewalks [New or Repairs]	(SF * Depth)/300
             */

            if(form.jordSquareFeet.value == parseInt(form.jordSquareFeet.value) && form.jordDepthInInches.value == parseInt(form.jordDepthInInches.value))
            {
                square =form.jordSquareFeet.value;
                var cy = Math.ceil((form.jordSquareFeet.value * form.jordDepthInInches.value)/300);

                $("#jordCubicYards").val(cy);

                form.mcost.value = Math.ceil(cy * drumcost);

                var profit = form.jordProfit.value;
                if (profit =='')
                {
                    profit = 0;
                }
                //total up
                var combinedcost = parseFloat($("#POVTotal").val()) + parseFloat($("#POequipTotal").val()) + parseFloat($("#POlaborTotal").val()) + parseFloat($("#POOtherTotal").val()) + parseFloat(form.mcost.value);
                //set over head
                var otcost = Math.ceil(parseFloat(combinedcost) + parseFloat(profit));
                var overhead = Math.ceil((otcost / 0.7) - otcost);
                $("#explain").html('calculated at 30%');

                var str = form.jordProposalText.value;
                var newstr = str.replace('@@INCHES@@', form.jordDepthInInches.value);
                var newstr = newstr.replace('@@TONS@@', tons);
                form.jordProposalText.value = newstr;

            }
           else
           {
               if(givealert == 1)
               {
                   alert('You must fill in square feet and depth in inches.');
               }
           }


        }


        break;
    case 'Asphalt':


        if (sid == 19) {

            /*

             jordSquareFeet
             jordDays
             jordCostPerDay
             jordLocations
             jordDepthInInches
             jordSQYards
             jordLoads
             fill out sq yrds , depth in inches days and cost per day
             set sqyrds
             loads
             cost
             calc loads and
             total cost by cost per day * days

             */

                if (parseFloat(form.jordCostPerDay.value) == form.jordCostPerDay.value && parseFloat(form.jordDays.value) == form.jordDays.value && parseFloat(form.jordSquareFeet.value) == form.jordSquareFeet.value &&  parseFloat(form.jordDepthInInches.value) == form.jordDepthInInches.value)
                {
                    square =form.jordSquareFeet.value;
                    var sqyrd = Math.ceil(form.jordSquareFeet.value/9);
                    form.jordSQYards.value = sqyrd;
                    //var loads = Math.ceil((form.jordSquareFeet.value * form.jordDepthInInches.value) * (7/2160));
                    var loads = Math.ceil(((form.jordSquareFeet.value * form.jordDepthInInches.value) /180)/20);
                    $("#jordLoads").val(loads);
                    form.mcost.value = parseFloat(form.jordCostPerDay.value) * parseInt(form.jordDays.value);
                    var profit = form.jordProfit.value;
                    if (profit =='')
                    {
                        profit = 0;
                    }

                    //total up
                    var combinedcost = parseFloat($("#POVTotal").val()) + parseFloat($("#POequipTotal").val()) + parseFloat($("#POlaborTotal").val()) + parseFloat($("#POOtherTotal").val()) + parseFloat(form.mcost.value);
                    //set over head
                    var otcost = Math.ceil(parseFloat(combinedcost) + parseFloat(profit));
                    var overhead = Math.ceil((otcost / 0.88) - otcost);
                    $("#explain").html('calculated at 12%');


                    var str = form.jordProposalText.value;
                    var newstr = str.replace('@@SQFT@@', form.jordSquareFeet.value);
                    form.jordProposalText.value = newstr;

                }
                else
                {
                    if(givealert == 1)
                    {
                        alert("You must fill in default values, square feet, depth in inches, days, and cost per day");
                    }

                }



        } else if(sid == 4 || sid == 5 || sid == 22 || sid == 3) {

/*
            toncost
            tackcost

            jordSquareFeet

            jordDepthInInches
            set to tons  x toncost

            set to tack *jordTackCost
            tons = (Size x Depth)/162
            Tack gallons = sq yards/108
            jordSQYards

*/

            if (parseFloat(form.jordSquareFeet.value) == form.jordSquareFeet.value &&  parseFloat(form.jordDepthInInches.value) == form.jordDepthInInches.value)
            {


                square = form.jordSquareFeet.value;
                var toncost = form.toncost.value;
                var tackcost = form.tackcost.value;
                var sqyrd = Math.ceil(form.jordSquareFeet.value/9);
                form.jordSQYards.value = sqyrd;
                var tonamount = Math.ceil((form.jordSquareFeet.value * form.jordDepthInInches.value)/162);
                form.jordTons.value = tonamount;
                if(sid == 4 || sid == 22)
                    {
                        var tackamount = Math.ceil(form.jordSquareFeet.value/324);
                    }
                    else
                    {
                       var tackamount = Math.ceil(form.jordSquareFeet.value/108);

                    }
                var totaltack = tackcost * tackamount;
                var totaltons = toncost * tonamount;

                form.jordTackCost.value = totaltack;
                form.jordTonCost.value = totaltons;
                //cost of goods
                form.mcost.value = parseFloat(totaltack + totaltons);



                var profit = form.jordProfit.value;
                if (profit =='')
                {
                    form.jordProfit.value = 0;
                    profit = 0;
                }

                //total up
                var combinedcost = parseFloat($("#POVTotal").val()) + parseFloat($("#POequipTotal").val()) + parseFloat($("#POlaborTotal").val()) + parseFloat($("#POOtherTotal").val()) + parseFloat(form.mcost.value);
                //set over head
                var otcost = Math.ceil(parseFloat(combinedcost) + parseFloat(profit));
                if(sid == 4 || sid == 22) {
                    var overhead = Math.ceil((otcost / 0.8) - otcost);
                    $("#explain").html('calculated at 20%');
                }
                else
                {
                    var overhead = Math.ceil((otcost / 0.7) - otcost);
                    $("#explain").html('calculated at 30%');

                }



                var str = form.jordProposalText.value;
                var find = '@@INCHES@@';
                var re = new RegExp(find, 'g');
                var newstr = str.replace(re, form.jordDepthInInches.value);

                if(sid == 5)
                {
                    var find = '@@TONS@@';
                    var re = new RegExp(find, 'g');
                    newstr = newstr.replace(re, tonamount);

                }
                form.jordProposalText.value = newstr;

            }
            else
            {
                if(givealert == 1)
                {
                    alert("You must fill in default values, square feet, depth in inches");
                }

            }



        } else {

        }


            break;

        default:

    }

    var ttlcost = Math.ceil( parseFloat(combinedcost) +  parseFloat(profit) +  parseFloat(overhead) + parseFloat(form.scost.value));
    // now add subs
    var zcost = Math.ceil( parseFloat(combinedcost) +  parseFloat(profit) +  parseFloat(overhead));
    if (stype != 'Sub Contractor')
    {
        var zcost = ttlcost;
    }
    if(square > 0)
       {
            zcost = (zcost/square);
            form.costper.value = '$' + zcost.toFixed(2);
            if(stype == 'Seal Coating')
            {
                form.costper.value = '$' + zcost.toFixed(4);
            }
        }
        else
        {
            form.costper.value = 'NA';
        }
    form.jordBreakeven.value = parseFloat(overhead) + parseFloat(combinedcost);
    form.jordOverhead.value = overhead;
    form.combinedcost.value =  combinedcost;
    form.jordCost.value = ttlcost;
    form.jordCostD.value = '$' + ttlcost.toFixed(2);

    //alert if not minimum
    if (parseFloat(ttlcost) < parseFloat(<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceDefaultRate'];?>
))
    {
        alert('The total of this proposal ($' + ttlcost.toFixed(2) + ') does not meet our minimum cost ($'+ <?php echo money_format($_smarty_tpl->tpl_vars['details']->value['cmpServiceDefaultRate'],2);?>
 + ').');
    }
}

function CHECKITU(form)
{
    if(!testu(form)){ return;
    }

    form.submit();

}

function testu(form)
{


    if(form.posubVendorID[form.posubVendorID.selectedIndex].value == 0)
    {
        alert('You must select a vendor.');
        form.posubVendorID.focus();
        return false;
    }


    if(form.posubOverHead.value != parseFloat(form.posubOverHead.value))
    {
        alert('Over Head must be a valid number.');
        form.posubOverHead.focus();
        return false;
    }

    if(form.posubCost.value != parseFloat(form.posubCost.value))
    {
        alert('Cost must be a valid number.');
        form.posubCost.focus();
        return false;
    }


    if(form.posubDescription.value == '')
    {
        alert('Description cannot be blank.');
        form.posubDescription.focus();
        return false;
    }


    return true;

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


    function CHECKITL(form)
    {
        if(!testl(form)){ return;
        }

        form.submit();

    }



    function testl(form)
    {

        if(form.POlaborNumber.value != parseInt(form.POlaborNumber.value))
        {
            alert('Number of items must be a valid number.');
            form.POlaborNumber.focus();
            return false;
        }

        if(form.POlaborDaysNeeded.value != parseInt(form.POlaborDaysNeeded.value))
        {
            alert('Number of days must be a valid number.');
            form.POlaborDaysNeeded.focus();
            return false;
        }

        if(form.POlaborHoursDay.value != parseInt(form.POlaborHoursDay.value))
        {
            alert('Number of hours must be a valid number.');
            form.POlaborHoursDay.focus();
            return false;
        }


        return true;

    }

    function CHECKITV(form)
    {
        if(!testv(form)){ return;
        }

        form.submit();

    }

    function testv(form)
    {

        if(form.POVNumber.value != parseInt(form.POVNumber.value))
        {
            alert('Number of items must be a valid number.');
            form.POVNumber.focus();
            return false;
        }

        if(form.POVDaysNeeded.value != parseInt(form.POVDaysNeeded.value))
        {
            alert('Number of days must be a valid number.');
            form.POVDaysNeeded.focus();
            return false;
        }

        if(form.POVHoursDay.value != parseInt(form.POVHoursDay.value))
        {
            alert('Number of hours must be a valid number.');
            form.POVHoursDay.focus();
            return false;
        }

        return true;

    }



    function CHECKITE(form)
    {
        if(!teste(form)){ return;
        }

        form.submit();

    }

    function teste(form)
    {

        if(form.POequipEquipmentID[form.POequipEquipmentID.selectedIndex].value == 0)
        {
            alert('Select a type of equipment.');
            form.POequipEquipmentID.focus();
            return false;


        }
        if(form.POequipNumber.value != parseInt(form.POequipNumber.value))
        {
            alert('Number of items must be a valid number.');
            form.POequipNumber.focus();
            return false;
        }

        if(form.POequipDaysNeeded.value != parseInt(form.POequipDaysNeeded.value))
        {
            alert('Number of days must be a valid number.');
            form.POequipDaysNeeded.focus();
            return false;
        }

        if(form.POequipHoursDay.value != parseInt(form.POequipHoursDay.value))
        {
            alert('Number of hours must be a valid number.');
            form.POequipHoursDay.focus();
            return false;
        }


        return true;

    }

function refreshText(form)
{

    tinyMCE.get('jordProposalText').setContent(form.refreshtext.value);
}

<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading" style="background:<?php echo $_smarty_tpl->tpl_vars['services']->value['catcolor'];?>
;">
        <h2><?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
 -<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>

            <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceName'];?>
 </h2>

    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/client/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" >Location/Managers &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOservices/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description" style="color: #000000;">Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Notes/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Media/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Upload &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/Status/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/previewPO/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Preview &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
             <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">7</span> <span class="wizard-step-caption"> <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/clientReminder/<?php echo $_smarty_tpl->tpl_vars['proposal']->value['jobID'];?>
'><span class="wizard-step-description">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>

   <div class="panel-body">

   <?php echo $_smarty_tpl->getSubTemplate ('projects/_proposalheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


       <!-- add service detail -->
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/savePOservices/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="dataform" id="dataform" method="POST">
       <input type="hidden" name="beenhere" value="1">
       <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
       <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
       <input type="hidden" name="matcost" id="matcost" value="0">
       <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceID']==4||$_smarty_tpl->tpl_vars['details']->value['cmpServiceID']==22) {?>
           <input type="hidden" name='toncost' id='toncost' value='<?php echo $_smarty_tpl->tpl_vars['mat']->value['Paving Asphalt'];?>
'>
       <?php } else { ?>
       <input type="hidden" name='toncost' id='toncost' value='<?php echo $_smarty_tpl->tpl_vars['mat']->value['Asphalt per ton'];?>
'>
        <?php }?>
       <input type="hidden" name='tackcost' id='tackcost' value='<?php echo $_smarty_tpl->tpl_vars['mat']->value['Tack (per gallon)'];?>
'>
       <input type="hidden" name="curbmix" id="curbmix" value="<?php echo $_smarty_tpl->tpl_vars['mat']->value['Concrete (Curb Mix) per cubic yard'];?>
">
       <input type="hidden" name="drummix" id="drummix" value="<?php echo $_smarty_tpl->tpl_vars['mat']->value['Concrete (Drum Mix) per cubic yard'];?>
">
       <input type="hidden" name="jordServiceID" id="jordServiceID" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
">

       <input type="hidden" name="sealer" id="sealer" value="<?php echo $_smarty_tpl->tpl_vars['mat']->value['Sealer (per gal)'];?>
">
       <input type="hidden" name="sand" id="sand" value="<?php echo $_smarty_tpl->tpl_vars['mat']->value['Sand (lbs.)'];?>
">
       <input type="hidden" name="additive" id="additive" value="<?php echo $_smarty_tpl->tpl_vars['mat']->value['Additive (per gal)'];?>
">
       <input type="hidden" name="primer" id="primer" value="<?php echo $_smarty_tpl->tpl_vars['mat']->value['Oil Spot Primer (per gal)'];?>
">
       <input type="hidden" name="fastset" id="fastset" value="<?php echo $_smarty_tpl->tpl_vars['mat']->value['Fastset (per gal)'];?>
">

       <input type="hidden" id="jordCost" name="jordCost" value="<?php echo number_format($_smarty_tpl->tpl_vars['details']->value['jordCost'],2);?>
">

       <!-- begin row -->

       <div class="row" >

           <div class="col-sm-6">
               <label class="control-label">Appears on proposal As</label>
           </div>

           <div class="col-sm-3">

               Minimum Cost: $<?php echo money_format($_smarty_tpl->tpl_vars['details']->value['cmpServiceDefaultRate'],2);?>

               <br/>Preferred Cost: $<?php echo money_format($_smarty_tpl->tpl_vars['details']->value['cmpServicePreferredRate'],2);?>


            &nbsp;
           </div>

           <div class="col-sm-3">
Unit Cost
           </div>

       </div>

       <div class="row" >

           <div class="col-sm-6">
               <input type="text" class="form-control" name="jordName" id="jordName" <?php if ($_smarty_tpl->tpl_vars['details']->value['jordName']=='') {?> value="<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
 - <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceName'];?>
" <?php } else { ?>  value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordName'];?>
" <?php }?> />
           </div>

           <div class="col-sm-3">
               <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
           </div>
           <div class="col-sm-3">

               <input type="text" class="form-control" style='background:lightgreen;' id="costper" name="costper" value="0" disabled>
           </div>
       </div>


        <br>

       <!--
           Human Input: <?php echo $_smarty_tpl->tpl_vars['services']->value['Human_Input'];?>
<br>
           Output Formula:<?php echo $_smarty_tpl->tpl_vars['services']->value['System_output_Formula'];?>
<br>
           Calculation:<?php echo $_smarty_tpl->tpl_vars['services']->value['Cost_calculation'];?>
<br>


       common input -->
       <div class="row panel"  style='border:1px #000000 solid;'>
       <div class="row">

           <div class="col-sm-3 ">
               <label class="control-label">Customer Price</label>
               <input type="text" id="jordCostD" name="jordCostD"
                      class="form-control"  style='background:lightgreen;' value="<?php echo number_format($_smarty_tpl->tpl_vars['details']->value['jordCost'],2);?>
" disabled>
           </div>
           <div class="col-sm-2">
               <label class="control-label">Profit</label>
               <input type="text" id="jordProfit" name="jordProfit"
                      class="form-control" style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordProfit'];?>
">
           </div>
           <div class="col-sm-2">
               <label class="control-label">Breakeven</label>
               <input type="text" id="jordBreakeven" name="jordBreakeven"
                      class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordBreakeven'];?>
">
           </div>
           <div class="col-sm-2">
               <label class="control-label">Combined cost</label>
               <input type="text" id="combinedcost" name="combinedcost"
                      class="form-control"  value="" disabled >
           </div>
           <div class="col-sm-2">
               <label class="control-label">Over Head</label>
               <input type="text" id="jordOverhead" name="jordOverhead"
                      class="form-control" value="<?php if (!$_smarty_tpl->tpl_vars['details']->value['jordOverhead']) {?>30<?php }?>">
               <div id="explain"></div>
           </div>

       </div>



               <!-- service sections -->

       
               <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Asphalt') {?>

                    <!--
                   3 	Asphalt 	Repairs
                   4 	Asphalt 	Paving
                   5 	Asphalt 	New Asphalt
                   19 	Asphalt 	Milling
                   22 	Asphalt 	Overlay
               <div class="row">
                   <div class="col-sm-8">
                               Asphalt Cost Per Ton:<?php echo $_smarty_tpl->tpl_vars['mat']->value['Asphalt per ton'];?>
 dollars;
                               &nbsp;
                                &nbsp;
                               Tack Cost per gallon:<?php echo $_smarty_tpl->tpl_vars['mat']->value['Tack (per gallon)'];?>
 dollars;
                               Paving Asphalt cost <?php echo $_smarty_tpl->tpl_vars['mat']->value['Paving Asphalt'];?>

                   </div>
               </div>
                   -->


                   <!-- <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
 - <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceName'];?>
 -->




                   <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceID']==19) {?>
                       <div class="row">
                           <div class="col-sm-3">
                               <label class="control-label">Size of project in SQ FT</label>
                               <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                      class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>
" onChange="Javascript:CALCME(this.form,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');">
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Depth In Inches</label>
                               <input type="text" id="jordDepthInInches" name="jordDepthInInches"
                                      class="form-control"  style='background:yellow;'   value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>
" onChange="Javascript:CALCME(this.form,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');" >
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Days of Milling</label>
                               <input type="text" id="jordDays" name="jordDays"
                                      class="form-control"  style='background:yellow;'  value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordDays'];?>
" onChange="Javascript:CALCME(this.form,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');" >
                           </div>

                           <div class="col-sm-3">
                               <label class="control-label">Cost Per Day</label>
                               <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                      class="form-control"   style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordCostPerDay'];?>
"  onChange="Javascript:CALCME(this.form,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');">
                           </div>


                       </div>
                        <br />
                           <div class="row">

                               <div class="col-sm-3">
                                   <label class="control-label">Locations</label>
                                   <input type="text" id="jordLocations" name="jordLocations"
                                          class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>
">
                               </div>
                               <div class="col-sm-3">
                                   <label class="control-label">SQ. Yards</label>
                                   <input type="text" id="jordSQYards" name="jordSQYards"
                                          class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordSQYards'];?>
">
                               </div>
                               <div class="col-sm-3">
                                   <label class="control-label">Loads</label>
                                   <input type="text" id="jordLoads" name="jordLoads"
                                          class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordLoads'];?>
">
                               </div>
                               <div class="col-sm-2">
                                   <label class="control-label">Calculate</label>
                                   <a href="Javascript:CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');" class="btn btn-info btn-labeled"><span class="btn-label icon fa fa-dollar"></span> CALC</a>

                               </div>
                           </div>




                   <?php } else { ?> 


                    <br/>
                       <div class="row">

                           <div class="col-sm-3">
                               <label class="control-label">Size of project in SQ FT</label>
                               <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                      class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>
" onChange="Javascript:CALCME(this.form,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');">
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Depth In Inches</label>
                               <input type="text" id="jordDepthInInches" name="jordDepthInInches"
                                      class="form-control"  style='background:yellow;'   value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>
" onChange="Javascript:CALCME(this.form,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');" >
                           </div>

                           <div class="col-sm-3">
                               <label class="control-label">Asphalt Cost (<i>$
                   <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceID']==4||$_smarty_tpl->tpl_vars['details']->value['cmpServiceID']==22) {?>
                   <?php echo $_smarty_tpl->tpl_vars['mat']->value['Paving Asphalt'];?>

                       <?php } else { ?>
                   <?php echo $_smarty_tpl->tpl_vars['mat']->value['Asphalt per ton'];?>

                       <?php }?>
                                       per ton</i>)</label>
                               <input type="text" id="jordTonCost" name="jordTonCost"
                                      class="form-control"  value="" disabled>
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Tack Cost:(<i>$<?php echo $_smarty_tpl->tpl_vars['mat']->value['Tack (per gallon)'];?>
 per gal.</i>)  </label>
                               <input type="text" id="jordTackCost" name="jordTackCost"
                                      class="form-control"  value="" disabled>
                           </div>

                       </div>
                       <br />
                       <div class="row">

                           <div class="col-sm-3">
                               <label class="control-label">Locations</label>
                               <input type="text" id="jordLocations" name="jordLocations"
                                      class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>
">
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">SQ. Yards</label>
                               <input type="text" id="jordSQYards" name="jordSQYards"
                                      class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordSQYards'];?>
">
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Tons</label>
                               <input type="text" id="jordTons" name="jordTons"
                                      class="form-control" value="jordTons">
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Calculate</label>
                               <a href="Javascript:CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');" class="btn btn-info btn-labeled"><span class="btn-label icon fa fa-dollar"></span> CALC</a>

                           </div>
                       </div>


                    <?php }?>



               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Concrete') {?>


                   <?php if ($_smarty_tpl->tpl_vars['details']->value['cmpServiceID']<12) {?> 
                    <br/>

                       <div class="row">
                           <div class="col-sm-3">
                               <label class="control-label">Length In Feet (linear feet)</label>
                               <input type="text" id="jordLinearFeet" name="jordLinearFeet"
                                      class="form-control"  style='background:yellow;'  value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordLinearFeet'];?>
" onChange="Javascript:CALCME(this.form,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');">
                           </div>

                           <div class="col-sm-2">
                               <label class="control-label">Locations</label>
                               <input type="text" id="jordLocations" name="jordLocations"
                                      class="form-control"  style='background:yellow;'  value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>
">
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">CU YDS</label>
                               <input type="text" id="jordCubicYards" name="jordCubicYards"
                                      class="form-control"   value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordCubicYards'];?>
" >
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Curb Mix Cost Per CU. YD.</label>
                               <input type="text" id="jordMixCost" name="jordMixCost"
                                      class="form-control"   value="<?php echo $_smarty_tpl->tpl_vars['mat']->value['Concrete (Curb Mix) per cubic yard'];?>
" disabled>
                           </div>

                           <div class="col-sm-2">
                               <label class="control-label">Calculate</label>
                               <a href="Javascript:CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');" class="btn btn-info btn-labeled"><span class="btn-label icon fa fa-dollar"></span> CALC</a>

                           </div>

                       </div>



                    <?php } else { ?> 
                       <br/>
                       <div class="row">
                           <div class="col-sm-2">
                               <label class="control-label">Sq. Ft.</label>
                               <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                      class="form-control" style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>
">
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Depth (inches)</label>
                               <input type="text" id="jordDepthInInches" name="jordDepthInInches"
                                      class="form-control" style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>
" >
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Locations</label>
                               <input type="text" id="jordLocations" name="jordLocations"
                                      class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>
"  >
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">CU YDS</label>
                               <input type="text" id="jordCubicYards" name="jordCubicYards"
                                      class="form-control"   value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordCubicYards'];?>
" >
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Drum Mix Cost</label>
                               <input type="text" id="jordMixCost" name="jordMixCost"
                                      class="form-control"   value="<?php echo $_smarty_tpl->tpl_vars['mat']->value['Concrete (Drum Mix) per cubic yard'];?>
" disabled>
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Calculate</label>
                               <a href="Javascript:CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');" class="btn btn-info btn-labeled"><span class="btn-label icon fa fa-dollar"></span> CALC</a>

                           </div>

                       </div>
                   <?php }?>

               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Excavation') {?>


                   <div class="row">
                       <div class="col-sm-2">
                           <label class="control-label">Sq. Ft.</label>
                           <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                  class="form-control" style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>
">
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Depth In inches</label>
                           <input type="text" id="jordDepthInInches" name="jordDepthInInches"
                                  class="form-control" style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>
" >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Our Cost</label>
                           <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordCostPerDay'];?>
">
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Tons</label>
                           <input type="text" id="jordTons" name="jordTons"
                                  class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordTons'];?>
" disbled >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Loads</label>
                           <input type="text" id="jordLoads" name="jordLoads"
                                  class="form-control"  <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLoads'];?>
" >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');" class="btn btn-primary btn-labeled">CALC</a>

                        </div>

                   </div>

                   <br/>


               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Other') {?>


                   <div class="row">

                       <div class="col-sm-3">
                           <label class="control-label">Cost</label>
                           <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordCostPerDay'];?>
">
                       </div>

                       <div class="col-sm-3">
                           <label class="control-label">Locations</label>
                           <input type="text" id="jordLocations" name="jordLocations"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordLocations'];?>
">
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');" class="btn btn-info btn-labeled"><span class="btn-label icon fa fa-dollar"></span> CALC</a>

                       </div>

                  </div>
                   <div class="row">

                       <div class="col-sm-10">
                           <label class="control-label">Description</label>
                           <textarea id="jordVendorServiceDescription" name="jordVendorServiceDescription"
                                  class="form-control"  ><?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>
</textarea>
                       </div>

                   </div>



               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Rock') {?>



                   <div class="row">
                       <div class="col-sm-3">
                           <label class="control-label">SQ . Ft.</label>
                           <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                  class="form-control" style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>
">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Depth In inches</label>
                           <input type="text" id="jordDepthInInches" name="jordDepthInInches"
                                  class="form-control" style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordDepthInInches'];?>
" >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Tons</label>
                           <input type="text" id="jordTons" name="jordTons"
                                  class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordTons'];?>
" disbled >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Loads</label>
                           <input type="text" id="jordLoads" name="jordLoads"
                                  class="form-control"  <?php echo $_smarty_tpl->tpl_vars['details']->value['jordLoads'];?>
" >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');" class="btn btn-primary btn-labeled">CALC</a>

                       </div>

                   </div>
                   <br/>
                   <div class="row">
                       <div class="col-sm-1">
                           <input type="radio"  id="rockcost" name="rockcost"
                                  class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['mat']->value['Base Rock (Palm Beach) per ton'];?>
" <?php if ($_smarty_tpl->tpl_vars['details']->value['jordAdditive']==$_smarty_tpl->tpl_vars['mat']->value['Base Rock (Palm Beach) per ton']) {?> checked <?php }?> onChange="Javascript:CALCME(this.form,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');">
                       </div>

                       <div class="col-sm-4">
                           <label class="control-label">Base Rock (Palm Beach) $<?php echo $_smarty_tpl->tpl_vars['mat']->value['Base Rock (Palm Beach) per ton'];?>
</label>
                       </div>
                       <div class="col-sm-1">
                           <input type="radio" id="rockcost" name="rockcost"
                                  class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['mat']->value['Base Rock (Broward & Dade) per ton'];?>
" <?php if ($_smarty_tpl->tpl_vars['details']->value['jordAdditive']==$_smarty_tpl->tpl_vars['mat']->value['Base Rock (Broward & Dade) per ton']) {?> checked <?php }?> onChange="Javascript:CALCME(this.form,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
','<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
');">
                       </div>
                       <div class="col-sm-4">
                           <label class="control-label">Base Rock (Broward & Dade) $<?php echo $_smarty_tpl->tpl_vars['mat']->value['Base Rock (Broward & Dade) per ton'];?>
</label>
                       </div>


                   </div>

               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Seal Coating') {?>


               <!-- row -->
               <div class="row">
                   <div class="col-sm-3">
                        <div class="bordered" style='font-size:0.7EM;'>

                                <b></b>Yields<br /></b>
                                65 Very Old, Coarse Dry Lot<br />
                                75 Old Dry Lot<br />
                                85 Dry Lot<br />
                                95 Previously Sealed Lot Coarse<br />
                                105 Previously Sealed Tight<br />
                                125 One Coat<br />

                        </div>
                   </div>
                   <div class="col-sm-3">
                       <label class="control-label">Yield</label>

                       <select class="form-control" name="jordYield" id="jordYield" style='background:yellow;'>
                           <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordYield'];?>
"><?php echo $_smarty_tpl->tpl_vars['details']->value['jordYield'];?>
</option>
                           <option value="60">60</option>
                           <option value="65">65</option>
                           <option value="70">70</option>
                           <option value="75">75</option>
                           <option value="80">80</option>
                           <option value="85">85</option>
                           <option value="90">90</option>
                           <option value="95">95</option>
                           <option value="100">100</option>
                           <option value="105">105</option>
                           <option value="110">110</option>
                           <option value="115">115</option>
                           <option value="120">120</option>
                           <option value="125">125</option>
                           <option value="130">130</option>
                           <option value="135">135</option>
                           <option value="140">140</option>
                           <option value="145">145</option>
                       </select>
                   </div>

                   <div class="col-sm-3">
                       <label class="control-label">SQ. FT.</label>
                       <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                              class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>
">
                   </div>

               </div>
                   <br/>

                   <div class="row" >
                       <div class="col-sm-4">
                           <label class="control-label"> Oil Spot Primer (gals)</label>
                           <input type="text" id="jordPrimer" name="jordPrimer"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordPrimer'];?>
">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Fast Set (gals)</label>
                           <input type="text" id="jordFastSet" name="jordFastSet"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordFastSet'];?>
">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Phases</label>
                           <input type="text" id="jordPhases" name="jordPhases"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordPhases'];?>
">
                       </div>



                       <div class="col-sm-2">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
');" class="btn btn-primary btn-labeled">CALC</a>

                       </div>


                   </div>
                        <br/>
                   <div class="row" >
                       <div class="col-sm-3">
                           <label class="control-label">Materials Needed</label>
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Sealer</label>
                           <input type="text" id="jordSealer" name="jordSealer"
                                  class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordSealer'];?>
">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Sand (SEALER * 2)</label>
                           <input type="text" id="jordSand" name="jordSand"
                                  class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordSand'];?>
">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Additive (SEALER / 50)</label>
                           <input type="text" id="jordAdditive" name="jordAdditive"
                                  class="form-control"   value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordAdditive'];?>
">
                       </div>

                   </div>
                   <br/>

               <div class="panel"  style='background:darkgrey'>

                   <div class="row" >
                       <div class="col-sm-2">
                           <label class="control-label">TOTALS </label>
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Sealer</label>
                           <input type="text" id="SealerTotal" name="SealerTotal"
                                  class="form-control"  value="" disabled>
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Sand</label>
                           <input type="text" id="SandTotal" name="SandTotal"
                                  class="form-control"   value="" disabled>
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Additive</label>
                           <input type="text" id="AdditiveTotal" name="AdditiveTotal"
                                  class="form-control"    value="" disabled>
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Primer</label>
                           <input type="text" id="PrimerTotal" name="PrimerTotal"
                                  class="form-control"    value="" disabled>
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">FastSet</label>
                           <input type="text" id="FastSetTotal" name="FastSetTotal"
                                  class="form-control"   value="" disabled>
                       </div>

                   </div>



                   <div class="row"  >
                       <div class="col-sm-2">
                           <label class="control-label">COST</label>
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="SealerCost" name="SealerCost"
                                  class="form-control"  value="<?php echo number_format($_smarty_tpl->tpl_vars['mat']->value['Sealer (per gal)'],2);?>
" disabled>
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="SandCost" name="SandCost"
                                  class="form-control"  value="<?php echo number_format($_smarty_tpl->tpl_vars['mat']->value['Sand (lbs.)'],2);?>
" disabled>
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="AdditiveCost" name="AdditiveCost"
                                  class="form-control"  value="<?php echo number_format($_smarty_tpl->tpl_vars['mat']->value['Additive (per gal)'],2);?>
" disabled>
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="PrimerCost" name="PrimerCost"
                                  class="form-control"  value="<?php echo number_format($_smarty_tpl->tpl_vars['mat']->value['Oil Spot Primer (per gal)'],2);?>
" disabled>
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="FastSetCost" name="FastSetCost"
                                  class="form-control"  value="<?php echo number_format($_smarty_tpl->tpl_vars['mat']->value['Fastset (per gal)'],2);?>
" disabled>
                       </div>

                   </div>

</div>
               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Striping') {?>
                   <?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>


               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Sub Contractor') {?>

                   <div class="row" >
                       <div class="col-sm-6">
                           <label class="control-label">Sub Contractor</label>
                           <h4><?php echo $_smarty_tpl->tpl_vars['details']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['details']->value['cntLastName'];?>
</h4>
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Cost</label>
                           <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordCostPerDay'];?>
">
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
');" class="btn btn-primary btn-labeled">CALC</a>

                       </div>

                   </div>


                   <div class="row" >
                       <div class="col-sm-6">
                           <label class="control-label">Job Description</label>
                           <textarea id="jordVendorServiceDescription" name="jordVendorServiceDescription"
                                     class="form-control"  style='background:yellow;' ><?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>
</textarea>
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Over Head %</label>
                           <input type="text" id="jordAdditive" name="jordAdditive"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordAdditive'];?>
">
                       </div>

                       <div class="col-sm-3">
                           <label class="control-label">Sub Over Head %</label>
                           <input type="text" id="boh" name="boh"
                                  class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['details']->value['cntOverHead'];?>
" disabled>
                       </div>

                   </div>

               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Paver Brick') {?>

                   <br />
                   <div class="row" >
                       <div class="col-sm-3">
                           <label class="control-label">SQ. Ft.</label>
                           <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordSquareFeet'];?>
">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Cost</label>
                           <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordCostPerDay'];?>
">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Excavate Tons</label>
                           <input type="text" id="jordTons" name="jordTons"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordTons'];?>
">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
');" class="btn btn-primary btn-labeled">CALC</a>

                       </div>

                   </div>
                   <br />
                   <div class="row" >

                       <div class="col-sm-9">
                           <label class="control-label">Job Description</label>
                           <textarea id="jordVendorServiceDescription" name="jordVendorServiceDescription"
                                     class="form-control"  style='background:yellow;' ><?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>
</textarea>
                       </div>
                   </div>

               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value['cmpServiceCat']=='Drainage and Catchbasins') {?>

                   <br />
                   <div class="row" >
                       <div class="col-sm-4">
                           <label class="control-label">Number of Catch Basins</label>
                           <input type="text" id="jordAdditive" name="jordAdditive"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordAdditive'];?>
">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Cost</label>
                           <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                  class="form-control"  style='background:yellow;' value="<?php echo $_smarty_tpl->tpl_vars['details']->value['jordCostPerDay'];?>
">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceCat'];?>
');" class="btn btn-primary btn-labeled">CALC</a>

                       </div>

                   </div>
                   <br />
               <div class="row" >

                   <div class="col-sm-9">
                       <label class="control-label">Job Description</label>
                       <textarea id="jordVendorServiceDescription" name="jordVendorServiceDescription"
                                 class="form-control"  style='background:yellow;' ><?php echo $_smarty_tpl->tpl_vars['details']->value['jordVendorServiceDescription'];?>
</textarea>
                   </div>
                </div>
               <?php } else { ?>
                   xxxxxxxxxxxxxxxxxxxxxxxxxxxxx    ALERT:UNKNOWN SERVICE    xxxxxxxxxxxxxxxxxxxxxxxxxxxxx

               <?php }?>



       <!-- show totals here -->
       <h3>Totals</h3>
       <div class="row">

           <div class="col-sm-2">
               <label class="control-label">Vehicle</label>
               <input type="text" id="vcost" name="vcost"
                      class="form-control"  style='background:lightblue;' value="0" disabled >
           </div>

           <div class="col-sm-2">
               <label class="control-label">Equipment</label>
               <input type="text" id="ecost" name="ecost"
                      class="form-control"  style='background:lightblue;' value="0" disabled >
           </div>

           <div class="col-sm-2">
               <label class="control-label">Materials</label>
               <input type="text" id="mcost" name="mcost"
                      class="form-control"  style='background:lightblue;' value="0" disabled >
           </div>

           <div class="col-sm-2">
               <label class="control-label">Labor</label>
               <input type="text" id="lcost" name="lcost"
                      class="form-control"  style='background:lightblue;' value="0" disabled >
           </div>

           <div class="col-sm-2">
               <label class="control-label">Other</label>
               <input type="text" id="ocost" name="ocost"
                      class="form-control"  style='background:lightblue;' value="0" disabled >
           </div>

           <div class="col-sm-2">
               <label class="control-label">Subs</label>
               <input type="text" id="scost" name="scost"
                      class="form-control"  style='background:lightblue;' value="0" disabled >
           </div>

       </div>

       <div class="row">
           <div class="col-sm-12">
                <br/>
               <textarea class="form-control"  id="jordNote" name="jordNote" placeholder="Short Note" ><?php echo $_smarty_tpl->tpl_vars['details']->value['jordNote'];?>
</textarea>
           </div>

      </div>

        <br />
       <!-- end show totals here -->
       <!-- buton row -->
       <div class="row">
           <div class="col-sm-3">
               <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
           </div>

       </div>
       <!-- begin row -->

   </div>

       <div class="row panel"  style='border:1px #000000 solid;'>
           <div class="row">
                 <div class="col-sm-5">
                       <div class="form-group no-margin-hr">
                        <label class="control-label">Suggested Proposal Text</label>
                           <input type="hidden" name="refreshtext" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['services']->value['cmpProposalText'], ENT_QUOTES, 'UTF-8', true);?>
">
                           <br>             <a href="Javascript:refreshText(this.dataform);" class="btn btn-info btn-labeled">reset proposal text</a>
                                  <br>
                        <?php echo $_smarty_tpl->tpl_vars['services']->value['cmpProposalText'];?>

                        <?php $_smarty_tpl->tpl_vars["ProposalText"] = new Smarty_variable('', null, 0);?>
                        <?php $_smarty_tpl->tpl_vars['ProposalText'] = new Smarty_variable($_smarty_tpl->tpl_vars['details']->value['jordProposalText'], null, 0);?>


                        <?php if (!$_smarty_tpl->tpl_vars['details']->value['jordProposalText']) {?>
                               <?php $_smarty_tpl->tpl_vars['ProposalText'] = new Smarty_variable($_smarty_tpl->tpl_vars['services']->value['cmpProposalText'], null, 0);?>

                        <?php }?>
                      </div>
                     <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>

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
               <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
           </div>

       </div>
       <!-- end services form -->
        </form>
   </div>

   <!-- begin vehicles -->
   <br />
   <a name="vehicle" />
    <div class="row panel"  style='border:1px #000000 solid;'>

       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseTwo"> Vehicle Costs </a> </div>
           <!-- / .panel-heading -->
            <div id="collapseTwo" class="panel">

               <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOvehicle/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="vdataform" id="vdataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="jordServiceID" id="jordServiceID" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
">
                       <!-- vehicle sections -->

                               <!-- begin row -->
                               <div class="row" >
                                   <div class="col-sm-6">
                                       <label class="control-label">Add Vehicle</label>
                                      </div>
                                   <div class="col-sm-2">
                                       <label class="control-label">Number</label>
                                   </div>
                                   <div class="col-sm-2">
                                       <label class="control-label">Days</label>
                                   </div>

                                   <div class="col-sm-2">
                                       <label class="control-label">Hours</label>
                                   </div>
                <!--
                                   <div class="col-sm-1">
                                       <label class="control-label">Rate</label>
                                   </div>

                                   <div class="col-sm-1">
                                       <label class="control-label">Cost</label>
                                   </div>
                -->
                             </div>



                             <!-- begin row -->
                             <div class="row" >
                                  <div class="col-sm-5">
                                     <select name="POVvehicleTypeID" id="POVvehicleTypeID">
                                           <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vehiclelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                                         <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['vtypeID'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['vtypeName'];?>
  -rate:<?php echo $_smarty_tpl->tpl_vars['data']->value['vtypeRate'];?>
 per hour </option>
                                           <?php } ?>
                                            </select>
                                  </div>
                                  <div class="col-sm-2">
                                           <input type="text" id="POVNumber" name="POVNumber"
                                                  class="form-control"  style='background:yellow;' >
                                  </div>
                                  <div class="col-sm-2">
                                           <input type="text" id="POVDaysNeeded" name="POVDaysNeeded"
                                                  class="form-control"  style='background:yellow;' >
                                  </div>
                                  <div class="col-sm-2">
                                           <input type="text" id="POVHoursDay" name="POVHoursDay"
                                                  class="form-control"  style='background:yellow;' >
                                  </div>


                             </div>


                               <br />
                               <?php $_smarty_tpl->tpl_vars["tv"] = new Smarty_variable(0, null, 0);?>
                               <?php if ($_smarty_tpl->tpl_vars['vehicles']->value) {?>
                                   <!-- begin row -->
                                   <div class="row" >
                                       <div class="col-sm-4">

                                           Vehicle Type
                                       </div>
                                       <div class="col-sm-2">
                                           Quantity
                                       </div>
                                       <div class="col-sm-1">
                                           Days
                                       </div>
                                       <div class="col-sm-1">
                                          Hours
                                       </div>
                                       <div class="col-sm-2">
                                           Total
                                       </div>
                                       <div class="col-sm-2">
                                         &nbsp;
                                       </div>
                                   </div>


                               <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vehicles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                               <!-- begin row -->
                               <div class="row" >

                                   <div class="col-sm-4">
                                       <?php echo $_smarty_tpl->tpl_vars['data']->value['POVvehicleName'];?>
<br />Rate:<?php echo $_smarty_tpl->tpl_vars['data']->value['POVRate'];?>

                                   </div>

                                   <div class="col-sm-2">
                                       <?php echo $_smarty_tpl->tpl_vars['data']->value['POVNumber'];?>

                                   </div>

                                   <div class="col-sm-1">
                                       <?php echo $_smarty_tpl->tpl_vars['data']->value['POVDaysNeeded'];?>

                                   </div>

                                   <div class="col-sm-1">
                                       <?php echo $_smarty_tpl->tpl_vars['data']->value['POVHoursDay'];?>

                                   </div>
                                   <div class="col-sm-2">$
                                       <?php echo $_smarty_tpl->tpl_vars['data']->value['POVHoursDay']*$_smarty_tpl->tpl_vars['data']->value['POVRate']*$_smarty_tpl->tpl_vars['data']->value['POVNumber']*$_smarty_tpl->tpl_vars['data']->value['POVDaysNeeded'];?>

                                   </div>

                                   <div class="col-sm-2">
                                       <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deletePOVehicle/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['POVID'];?>
'>remove</a>
                                   </div>


                               </div>

                                        <?php $_smarty_tpl->tpl_vars['tv'] = new Smarty_variable($_smarty_tpl->tpl_vars['tv']->value+($_smarty_tpl->tpl_vars['data']->value['POVHoursDay']*$_smarty_tpl->tpl_vars['data']->value['POVRate']*$_smarty_tpl->tpl_vars['data']->value['POVNumber']*$_smarty_tpl->tpl_vars['data']->value['POVDaysNeeded']), null, 0);?>

                               <?php } ?>
                            <?php }?>
                           <!-- begin row -->
                           <div class="row" >
                               <div class="col-sm-3">
                                   <a href="Javascript:CHECKITV(this.vdataform);" class="btn btn-primary btn-labeled">Add Vehicle</a>
                               </div>
                               <div class="col-sm-2">
                                   <label class="control-label">Total Vehicles</label>
                               </div>

                               <div class="col-sm-3">
                                    <input type="text" id="POVTotal" name="POVTotal"
                                            class="form-control"   style='background:lightblue;' value="<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['tv']->value);?>
" disabled>
                               </div>
                           </div>

               </form>
             </div>
         </div>

   <!-- end vehicle form -->
   <br />
   <a name="equipment" />
    <div class="row panel"  style='border:1px #000000 solid;'>
       <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseThree"> Equipment Costs </a> </div>
       <!-- / .panel-heading -->
       <div id="collapseThree" class="panel">
           <!-- begin row -->

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOequipment/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="edataform" id="edataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
               <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
               <input type="hidden" name="jordServiceID" id="jordServiceID" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
">
               <input type="hidden" name="equipRate" id="equipRate" value="0">
               <input type="hidden" name="equipMinCost" id="equipMinCost" value="0">

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-6">
                       <label class="control-label">Add Equipment</label>
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Number</label>
                   </div>
                   <div class="col-sm-1">
                       <label class="control-label">Days</label>
                   </div>

                   <div class="col-sm-1">
                       <label class="control-label">Hours</label>
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Min Cost</label>
                   </div>


               </div>


                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-6">
                           <input type="hidden" name="POequipMinCost" id="POequipMinCost" value="">

                           <select name="POequipEquipmentID" id="POequipEquipmentID" onChange="Javascript:getEquipMin(this.form);">
                                <option value="0">Select Equipment</option>

                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['equipmentlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                           <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['equipID'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['equipName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['equipRate'];?>
</option>
                        <?php } ?>
                            </select>

                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="POequipNumber" name="POequipNumber"
                                  class="form-control"  style='background:yellow;' >
                       </div>
                       <div class="col-sm-1">
                           <input type="text" id="POequipDaysNeeded" name="POequipDaysNeeded"
                                  class="form-control"  style='background:yellow;' >
                       </div>
                       <div class="col-sm-1">
                           <input type="text" id="POequipHoursDay" name="POequipHoursDay"
                                  class="form-control"  style='background:yellow;' >
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="mincost" name="mincost"
                                  class="form-control" >
                       </div>

                   </div>

               <br />

              <?php $_smarty_tpl->tpl_vars["ev"] = new Smarty_variable(0, null, 0);?>
               <?php $_smarty_tpl->tpl_vars["ecost"] = new Smarty_variable(0, null, 0);?>
              <?php if ($_smarty_tpl->tpl_vars['equipment']->value) {?>
                  <!-- begin row -->
                  <div class="row" >
                      <div class="col-sm-4">

                          Equipment Type
                      </div>
                      <div class="col-sm-2">
                          Quantity
                      </div>
                      <div class="col-sm-1">
                          Days
                      </div>
                      <div class="col-sm-1">
                          Hours
                      </div>
                      <div class="col-sm-2">
                          Total
                      </div>
                      <div class="col-sm-2">
                          &nbsp;
                      </div>
                  </div>

              <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['equipment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                  <!-- begin row -->
                  <div class="row" >

                      <div class="col-sm-4">
                          <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipName'];?>
<br />Rate:$<?php echo $_smarty_tpl->tpl_vars['data']->value['POequipCost'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipRate'];?>

                      </div>

                      <div class="col-sm-2">
                          <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipNumber'];?>

                      </div>

                      <div class="col-sm-1">
                          <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipDaysNeeded'];?>

                      </div>

                      <div class="col-sm-1">
                          <?php echo $_smarty_tpl->tpl_vars['data']->value['POequipHoursDay'];?>

                      </div>
                      <div class="col-sm-2">$
                          <?php if ($_smarty_tpl->tpl_vars['data']->value['POequipRate']=="per day") {?>
                               <?php $_smarty_tpl->tpl_vars['ecost'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value['POequipCost']*$_smarty_tpl->tpl_vars['data']->value['POequipNumber']*$_smarty_tpl->tpl_vars['data']->value['POequipDaysNeeded'], null, 0);?>

                          <?php } else { ?>
                               <?php $_smarty_tpl->tpl_vars['ecost'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value['POequipHoursDay']*$_smarty_tpl->tpl_vars['data']->value['POequipCost']*$_smarty_tpl->tpl_vars['data']->value['POequipNumber']*$_smarty_tpl->tpl_vars['data']->value['POequipDaysNeeded'], null, 0);?>

                          <?php }?>

                          <?php if ($_smarty_tpl->tpl_vars['ecost']->value<$_smarty_tpl->tpl_vars['data']->value['POequipMinCost']) {?>
                              <?php $_smarty_tpl->tpl_vars['ecost'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value['POequipMinCost'], null, 0);?>
                          <?php }?>
                          <?php $_smarty_tpl->tpl_vars['ev'] = new Smarty_variable($_smarty_tpl->tpl_vars['ev']->value+$_smarty_tpl->tpl_vars['ecost']->value, null, 0);?>
                          <?php echo $_smarty_tpl->tpl_vars['ecost']->value;?>


                      </div>

                      <div class="col-sm-2">
                          <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deletePOEquipment/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['POequipID'];?>
'>remove</a>
                      </div>


                  </div>


              <?php } ?>
              <?php }?>

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKITE(this.edataform);" class="btn btn-primary btn-labeled">Add Equipment</a>
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Total Equipment</label>
                   </div>

                   <div class="col-sm-3">
                       <input type="text" id="POequipTotal" name="POequipTotal"
                              class="form-control"   style='background:lightblue;' value="<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['ev']->value);?>
"  disabled >
                   </div>
               </div>




       <!-- end equipment form -->
   </form>
   </div>
</div>

<!-- labor sections -->



               <br />

       <br />
       <a name="labor" />
    <div class="row panel"  style='border:1px #000000 solid;'>
           <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseFour"> Labor Costs </a> </div>
           <!-- / .panel-heading -->
           <div id="collapseFour" class="panel">

               <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOlabor/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="ldataform" id="ldataform" method="POST">
                   <input type="hidden" name="beenhere" value="1">
                   <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
                   <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
                   <input type="hidden" name="jordServiceID" id="jordServiceID" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
">

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-6">
                       <label class="control-label">Add Labor</label>
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Number</label>
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Days</label>
                   </div>

                   <div class="col-sm-2">
                       <label class="control-label">Hours</label>
                   </div>


               </div>


                   <!-- begin row -->
                   <div class="row" >
                       <div class="col-sm-6">
                           <select name="POlaborRateID" id ="POlaborRateID">
                               <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['laborlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                               <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['rateID'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['rateName'];?>
</option>
                               <?php } ?>

                           </select>
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="POlaborNumber" name="POlaborNumber"
                                  class="form-control"  style='background:yellow;' >
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="POlaborDaysNeeded" name="POlaborDaysNeeded"
                                  class="form-control"  style='background:yellow;' >
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="POlaborHoursDay" name="POlaborHoursDay"
                                  class="form-control"  style='background:yellow;' >
                       </div>


                   </div>
               <br />
              <?php $_smarty_tpl->tpl_vars["lv"] = new Smarty_variable(0, null, 0);?>

              <?php if ($_smarty_tpl->tpl_vars['labor']->value) {?>
                  <!-- begin row -->
                  <div class="row" >
                      <div class="col-sm-4">

                          Labor Type
                      </div>
                      <div class="col-sm-2">
                          Quantity
                      </div>
                      <div class="col-sm-1">
                          Days
                      </div>
                      <div class="col-sm-1">
                          Hours
                      </div>
                      <div class="col-sm-2">
                          Total
                      </div>
                      <div class="col-sm-2">
                          &nbsp;
                      </div>
                  </div>

              <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['labor']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                  <!-- begin row -->
                  <div class="row" >

                      <div class="col-sm-4">
                          <?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborName'];?>
<br />Rate:<?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborRate'];?>

                      </div>

                      <div class="col-sm-2">
                          <?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborNumber'];?>

                      </div>

                      <div class="col-sm-1">
                          <?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborDaysNeeded'];?>

                      </div>

                      <div class="col-sm-1">
                          <?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborHoursDay'];?>

                      </div>
                      <div class="col-sm-2">$
                          <?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborHoursDay']*$_smarty_tpl->tpl_vars['data']->value['POlaborRate']*$_smarty_tpl->tpl_vars['data']->value['POlaborNumber']*$_smarty_tpl->tpl_vars['data']->value['POlaborDaysNeeded'];?>

                      </div>

                      <div class="col-sm-2">
                          <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deletePOlabor/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['POlaborID'];?>
'>remove</a>
                      </div>


                  </div>

                  <?php $_smarty_tpl->tpl_vars['lv'] = new Smarty_variable($_smarty_tpl->tpl_vars['lv']->value+($_smarty_tpl->tpl_vars['data']->value['POlaborHoursDay']*$_smarty_tpl->tpl_vars['data']->value['POlaborRate']*$_smarty_tpl->tpl_vars['data']->value['POlaborNumber']*$_smarty_tpl->tpl_vars['data']->value['POlaborDaysNeeded']), null, 0);?>

              <?php } ?>
              <?php }?>

               <!-- begin row -->
               <div class="row" >
                   <div class="col-sm-3">
                       <a href="Javascript:CHECKITL(this.ldataform);" class="btn btn-primary btn-labeled">Add Labor</a>
                   </div>
                   <div class="col-sm-2">
                       <label class="control-label">Total Labor</label>
                   </div>

                   <div class="col-sm-3">
                       <input type="text" id="POlaborTotal" name="POlaborTotal"
                              class="form-control"   style='background:lightblue;' value="<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['lv']->value);?>
"  disabled>
                   </div>
               </div>


       <!-- end labor form -->
   </form>


   </div>
</div>

   <a name="other" />
   <!-- Other costs -->
   <br />
    <div class="row panel"  style='border:1px #000000 solid;'>
   <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseFive"> Other Costs </a> </div>
   <!-- / .panel-heading -->
   <div id="collapseFive" class="panel">

       <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOOther/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="odataform" id="odataform" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
           <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
           <input type="hidden" name="jordServiceID" id="jordServiceID" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
">


           <div class="row " >

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
workorders/deletePOother/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
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

               </div>


   </form>
   </div>
</div>

       <!-- sub contractor sections -->

        <br />

    <a name="subs" />
    <div class="row panel"  style='border:1px #000000 solid;'>
            <div class="panel-heading  form-group-margin"  style="background:rgba(0,0,0,0.05);"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-service" href="#collapseSix"> Subcontractors </a> </div>
             <!-- / .panel-heading -->
                <div id="collapseSix" class="panel">

                <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/addPOSub/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
"  name="udataform" id="udataform" method="POST">
                    <input type="hidden" name="beenhere" value="1">
                    <input type="hidden" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
                    <input type="hidden" name="pid" id="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
                    <input type="hidden" name="posubjordID" id="posubjordID" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
                    <input type="hidden" name="jordServiceID" id="jordServiceID" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['cmpServiceID'];?>
">

                <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-7">
                        <label class="control-label">Sub Contractor</label>
                        <select class="form-control" name="posubVendorID" id="posubVendorID" onChange="Javascript:getSubOH(this.form);">
                            <option value="0">Select a Sub Contractor</option>
                            <?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcontractors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['o']->value['cntId'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['o']->value['cntLastName'];?>
 - <?php echo $_smarty_tpl->tpl_vars['o']->value['cntOverHead'];?>
%</option>
                            <?php } ?>
                        </select>

                    </div>
                </div>
            <br />
                    <!-- begin row -->
                    <div class="row" >
                        <div class="col-sm-7">
                            <label class="control-label">Description of Service</label>
                            <textarea class="form-control" name="posubDescription" id="posubDescription"></textarea>
                        </div>
                    </div>
                    <br />
                    <!-- begin row -->
                    <div class="row" >
                        <div class="col-sm-3">
                            <label class="control-label">Over Head %</label>
                            <input type='text' class="form-control" name="posubOverHead" id="posubOverHead">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label">Quoted Cost</label>
                            <input type='text' class="form-control" name="posubCost" id="posubCost">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label">Have Bid</label>
                            <input type='checkbox' class="checkbox inline" name="posubHaveBid" id="posubHaveBid" value='1'>
                        </div>
                    </div>
                    <!-- end row -->

                <br />
                <?php $_smarty_tpl->tpl_vars["sv"] = new Smarty_variable(0, null, 0);?>

                <?php if ($_smarty_tpl->tpl_vars['subs']->value) {?>
                    <!-- begin row -->
                    <div class="row" >
                        <div class="col-sm-2">
                            Sub Contractor
                        </div>
                        <div class="col-sm-3 left">
                            Description
                        </div>
                        <div class="col-sm-2">
                            Over head
                        </div>
                        <div class="col-sm-2">
                           Cost
                        </div>
                        <div class="col-sm-2">
                            Total
                        </div>
                        <div class="col-sm-1">
                        &nbsp;
                        </div>

                    </div>

                <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars["sov"] = new Smarty_variable(1-($_smarty_tpl->tpl_vars['data']->value['posubOverHead']/100), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["suboh"] = new Smarty_variable(($_smarty_tpl->tpl_vars['data']->value['posubCost']/$_smarty_tpl->tpl_vars['sov']->value)-$_smarty_tpl->tpl_vars['data']->value['posubCost'], null, 0);?>
                    $<?php $_smarty_tpl->tpl_vars["tscost"] = new Smarty_variable(($_smarty_tpl->tpl_vars['data']->value['posubCost']+$_smarty_tpl->tpl_vars['suboh']->value), null, 0);?>

                    <!-- begin row -->
                    <div class="row" >

                        <div class="col-sm-2">
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['cntFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cntLastName'];?>

                            <br /><?php echo $_smarty_tpl->tpl_vars['data']->value['posubOverHead'];?>
%
                        </div>

                        <div class="col-sm-3">
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['posubDescription'];?>

                        </div>

                        <div class="col-sm-2">
                            $<?php echo number_format($_smarty_tpl->tpl_vars['suboh']->value,2);?>

                        </div>

                        <div class="col-sm-2">
                            $<?php echo number_format($_smarty_tpl->tpl_vars['data']->value['posubCost'],2);?>

                        </div>

                        <div class="col-sm-2">

                            $<?php echo number_format($_smarty_tpl->tpl_vars['tscost']->value,2);?>

                        </div>

                        <div class="col-sm-1">
                            <a href='<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/deletePOSub/<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['posubID'];?>
'>remove</a>
                        </div>


                    </div>

                    <?php $_smarty_tpl->tpl_vars['sv'] = new Smarty_variable($_smarty_tpl->tpl_vars['sv']->value+($_smarty_tpl->tpl_vars['data']->value['posubCost']+$_smarty_tpl->tpl_vars['suboh']->value), null, 0);?>

                <?php } ?>
                <?php }?>
                    <br />
                    <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-3">
                        <a href="Javascript:CHECKITU(this.udataform);" class="btn btn-primary btn-labeled">Add Sub Contractor</a>
                    </div>
                    <div class="col-sm-2">
                        <label class="control-label"></label> <span class="lbl">Total Sub Contractors</span></label>
                    </div>

                    <div class="col-sm-3">
                        <input type="hidden" id="SubTotal" name="SubTotal" value="<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['sv']->value);?>
" >
                        <input type="text" id="SubTotals" name="SubTotals"
                               class="form-control"   style='background:lightblue;' value="$<?php echo number_format($_smarty_tpl->tpl_vars['sv']->value,2);?>
" disabled>
                    </div>
                </div>

                </form>
                </div>
            </div>
       </div>


<!-- added sub contractor sections -->




   </div>



<?php }} ?>
