<script src="{$SITE_URL}assets/javascripts/tiny_mce/tiny_mce.js"></script>


<script type="text/javascript">


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
    CALCME(this.dataform,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');

});

var suboh = new Array();
suboh.push("0");
{foreach $subcontractors as $o}

suboh.push("{$o.cntOverHead}");

{/foreach}

function getSubOH(form)
{

    form.posubOverHead.value = suboh[form.posubVendorID.selectedIndex];
}


var equipArr = new Array();



{assign var="i" value =0}



equipArr[0] = new Array(3);

equipArr[0][0] = "0";
equipArr[0][1] = "0";
equipArr[0][2] = "0";

{foreach $equipmentlist as $data}

{$i = $i + 1}
equipArr[{$i}] = new Array(3);

equipArr[{$i}][0] = "{$data['equipCost']}";
equipArr[{$i}][1] = "{$data['equipMinCost']}";
equipArr[{$i}][2] = "{$data['equipRate']}";


{/foreach}

function getEquipMin(form)
{
    var ind = form.POequipEquipmentID.selectedIndex;
    var bcost = equipArr[form.POequipEquipmentID.selectedIndex][1];
    form.mincost.value = '$' + bcost;
    form.POEquipMinCost.value = bcost;
    form.equipMinCost.value = bcost;
}


    var matcost = new Array();
    {foreach $materials as $m}

    matcost[{$m.omatMatID},0] = '{$m.omatName}';
    matcost[{$m.omatMatID},1] = {$m.omatCost};

    {/foreach}



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

    CALCME(this.dataform,'{$details['cmpServiceCat']}','{$details.cmpServiceID}',1);

    if(parseFloat(form.jordCost.value) < parseFloat({$details.cmpServiceDefaultRate}))
    {
        alert("Your service cost is less than our minimum. ${$details.cmpServiceDefaultRate}");
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
                    var loads = Math.ceil((form.jordSquareFeet.value * form.jordDepthInInches.value) * (7/2160));
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
    if (parseFloat(ttlcost) < parseFloat({$details.cmpServiceDefaultRate}))
    {
        alert('The total of this proposal ($' + ttlcost.toFixed(2) + ') does not meet our minimum cost ($'+ {$details.cmpServiceDefaultRate|money_format:2} + ').');
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

</script>


<div class="panel">
    <div class="panel-heading" style="background:{$services.catcolor};">
        <h2>{$details['cmpServiceCat']} -{$details.cmpServiceID}
            {$details['cmpServiceName']} </h2>

    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/client/{$proposal.jobID}'><span class="wizard-step-description" >Location/Managers &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/addPOservices/{$proposal.jobID}'><span class="wizard-step-description" style="color: #000000;">Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Notes/{$proposal.jobID}'><span class="wizard-step-description">Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Media/{$proposal.jobID}'><span class="wizard-step-description">Upload &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/Status/{$proposal.jobID}'><span class="wizard-step-description">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='{$SITE_URL}workorders/previewPO/{$proposal.jobID}'><span class="wizard-step-description">Preview &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>

   <div class="panel-body">

   {include file='projects/_proposalheader.tpl'}

       <!-- add service detail -->
        <form action="{$SITE_URL}workorders/savePOservices/{$pid}/{$sid}"  name="dataform" id="dataform" method="POST">
       <input type="hidden" name="beenhere" value="1">
       <input type="hidden" name="sid" id="sid" value="{$sid}">
       <input type="hidden" name="pid" id="pid" value="{$pid}">
       <input type="hidden" name="matcost" id="matcost" value="0">
       {IF  $details.cmpServiceID eq 4 OR $details.cmpServiceID eq 22}
           <input type="hidden" name='toncost' id='toncost' value='{$mat['Paving Asphalt']}'>
       {ELSE}
       <input type="hidden" name='toncost' id='toncost' value='{$mat['Asphalt per ton']}'>
        {/IF}
       <input type="hidden" name='tackcost' id='tackcost' value='{$mat['Tack (per gallon)']}'>
       <input type="hidden" name="curbmix" id="curbmix" value="{$mat['Concrete (Curb Mix) per cubic yard']}">
       <input type="hidden" name="drummix" id="drummix" value="{$mat['Concrete (Drum Mix) per cubic yard']}">
       <input type="hidden" name="jordServiceID" id="jordServiceID" value="{$details.cmpServiceID}">

       <input type="hidden" name="sealer" id="sealer" value="{$mat['Sealer (per gal)']}">
       <input type="hidden" name="sand" id="sand" value="{$mat['Sand (lbs.)']}">
       <input type="hidden" name="additive" id="additive" value="{$mat['Additive (per gal)']}">
       <input type="hidden" name="primer" id="primer" value="{$mat['Oil Spot Primer (per gal)']}">
       <input type="hidden" name="fastset" id="fastset" value="{$mat['Fastset (per gal)']}">

       <input type="hidden" id="jordCost" name="jordCost" value="{$details.jordCost|number_format:2}">

       <!-- begin row -->

       <div class="row" >

           <div class="col-sm-6">
               <label class="control-label">Appears on proposal As</label>
           </div>

           <div class="col-sm-3">

               Minimum Cost: ${$details.cmpServiceDefaultRate|money_format:2}
               <br/>Preferred Cost: ${$details.cmpServicePreferredRate|money_format:2}

            &nbsp;
           </div>

           <div class="col-sm-3">
Unit Cost
           </div>

       </div>

       <div class="row" >

           <div class="col-sm-6">
               <input type="text" class="form-control" name="jordName" id="jordName" {IF $details.jordName eq ''} value="{$details['cmpServiceCat']} - {$details.cmpServiceName}" {ELSE}  value="{$details['jordName']}" {/IF} />
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
           Human Input: {$services.Human_Input}<br>
           Output Formula:{$services.System_output_Formula}<br>
           Calculation:{$services.Cost_calculation}<br>


       common input -->
       <div class="row panel"  style='border:1px #000000 solid;'>
       <div class="row">

           <div class="col-sm-3 ">
               <label class="control-label">Customer Price</label>
               <input type="text" id="jordCostD" name="jordCostD"
                      class="form-control"  style='background:lightgreen;' value="{$details.jordCost|number_format:2}" disabled>
           </div>
           <div class="col-sm-2">
               <label class="control-label">Profit</label>
               <input type="text" id="jordProfit" name="jordProfit"
                      class="form-control" style='background:yellow;' value="{$details.jordProfit}">
           </div>
           <div class="col-sm-2">
               <label class="control-label">Breakeven</label>
               <input type="text" id="jordBreakeven" name="jordBreakeven"
                      class="form-control"  value="{$details.jordBreakeven}">
           </div>
           <div class="col-sm-2">
               <label class="control-label">Combined cost</label>
               <input type="text" id="combinedcost" name="combinedcost"
                      class="form-control"  value="" disabled >
           </div>
           <div class="col-sm-2">
               <label class="control-label">Over Head</label>
               <input type="text" id="jordOverhead" name="jordOverhead"
                      class="form-control" value="{IF !$details.jordOverhead}30{/IF}">
               <div id="explain"></div>
           </div>

       </div>



               <!-- service sections -->

       {* BEGIN SERVICES AREA *}
               {if $details['cmpServiceCat'] eq 'Asphalt'}

                    <!--
                   3 	Asphalt 	Repairs
                   4 	Asphalt 	Paving
                   5 	Asphalt 	New Asphalt
                   19 	Asphalt 	Milling
                   22 	Asphalt 	Overlay
               <div class="row">
                   <div class="col-sm-8">
                               Asphalt Cost Per Ton:{$mat['Asphalt per ton']} dollars;
                               &nbsp;
                                &nbsp;
                               Tack Cost per gallon:{$mat['Tack (per gallon)']} dollars;
                               Paving Asphalt cost {$mat['Paving Asphalt']}
                   </div>
               </div>
                   -->


                   <!-- {$details.cmpServiceID} {$details['cmpServiceCat']} - {$details.cmpServiceName} -->




                   {IF  $details.cmpServiceID eq 19}{* Milling *}
                       <div class="row">
                           <div class="col-sm-3">
                               <label class="control-label">Size of project in SQ FT</label>
                               <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                      class="form-control"  style='background:yellow;' value="{$details.jordSquareFeet}" onChange="Javascript:CALCME(this.form,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');">
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Depth In Inches</label>
                               <input type="text" id="jordDepthInInches" name="jordDepthInInches"
                                      class="form-control"  style='background:yellow;'   value="{$details.jordDepthInInches}" onChange="Javascript:CALCME(this.form,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');" >
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Days of Milling</label>
                               <input type="text" id="jordDays" name="jordDays"
                                      class="form-control"  style='background:yellow;'  value="{$details.jordDays}" onChange="Javascript:CALCME(this.form,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');" >
                           </div>

                           <div class="col-sm-3">
                               <label class="control-label">Cost Per Day</label>
                               <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                      class="form-control"   style='background:yellow;' value="{$details.jordCostPerDay}"  onChange="Javascript:CALCME(this.form,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');">
                           </div>


                       </div>
                        <br />
                           <div class="row">

                               <div class="col-sm-3">
                                   <label class="control-label">Locations</label>
                                   <input type="text" id="jordLocations" name="jordLocations"
                                          class="form-control"  style='background:yellow;' value="{$details.jordLocations}">
                               </div>
                               <div class="col-sm-3">
                                   <label class="control-label">SQ. Yards</label>
                                   <input type="text" id="jordSQYards" name="jordSQYards"
                                          class="form-control" value="{$details.jordSQYards}">
                               </div>
                               <div class="col-sm-3">
                                   <label class="control-label">Loads</label>
                                   <input type="text" id="jordLoads" name="jordLoads"
                                          class="form-control" value="{$details.jordLoads}">
                               </div>
                               <div class="col-sm-2">
                                   <label class="control-label">Calculate</label>
                                   <a href="Javascript:CALCME(this.dataform,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');" class="btn btn-info btn-labeled"><span class="btn-label icon fa fa-dollar"></span> CALC</a>

                               </div>
                           </div>




                   {ELSE} {* all other asphalt types *}


                    <br/>
                       <div class="row">

                           <div class="col-sm-3">
                               <label class="control-label">Size of project in SQ FT</label>
                               <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                      class="form-control"  style='background:yellow;' value="{$details.jordSquareFeet}" onChange="Javascript:CALCME(this.form,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');">
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Depth In Inches</label>
                               <input type="text" id="jordDepthInInches" name="jordDepthInInches"
                                      class="form-control"  style='background:yellow;'   value="{$details.jordDepthInInches}" onChange="Javascript:CALCME(this.form,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');" >
                           </div>

                           <div class="col-sm-3">
                               <label class="control-label">Asphalt Cost (<i>$
                   {IF  $details.cmpServiceID eq 4 OR $details.cmpServiceID eq 22}
                   {$mat['Paving Asphalt']}
                       {ELSE}
                   {$mat['Asphalt per ton']}
                       {/IF}
                                       per ton</i>)</label>
                               <input type="text" id="jordTonCost" name="jordTonCost"
                                      class="form-control"  value="" disabled>
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Tack Cost:(<i>${$mat['Tack (per gallon)']} per gal.</i>)  </label>
                               <input type="text" id="jordTackCost" name="jordTackCost"
                                      class="form-control"  value="" disabled>
                           </div>

                       </div>
                       <br />
                       <div class="row">

                           <div class="col-sm-3">
                               <label class="control-label">Locations</label>
                               <input type="text" id="jordLocations" name="jordLocations"
                                      class="form-control"  style='background:yellow;' value="{$details.jordLocations}">
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">SQ. Yards</label>
                               <input type="text" id="jordSQYards" name="jordSQYards"
                                      class="form-control" value="{$details.jordSQYards}">
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Tons</label>
                               <input type="text" id="jordTons" name="jordTons"
                                      class="form-control" value="jordTons">
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Calculate</label>
                               <a href="Javascript:CALCME(this.dataform,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');" class="btn btn-info btn-labeled"><span class="btn-label icon fa fa-dollar"></span> CALC</a>

                           </div>
                       </div>


                    {/IF}



               {elseif $details['cmpServiceCat'] eq 'Concrete'}


                   {IF $details.cmpServiceID < 12} {*curb mix*}
                    <br/>

                       <div class="row">
                           <div class="col-sm-3">
                               <label class="control-label">Length In Feet (linear feet)</label>
                               <input type="text" id="jordLinearFeet" name="jordLinearFeet"
                                      class="form-control"  style='background:yellow;'  value="{$details.jordLinearFeet}" onChange="Javascript:CALCME(this.form,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');">
                           </div>

                           <div class="col-sm-2">
                               <label class="control-label">Locations</label>
                               <input type="text" id="jordLocations" name="jordLocations"
                                      class="form-control"  style='background:yellow;'  value="{$details.jordLocations}">
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">CU YDS</label>
                               <input type="text" id="jordCubicYards" name="jordCubicYards"
                                      class="form-control"   value="{$details.jordCubicYards}" >
                           </div>
                           <div class="col-sm-3">
                               <label class="control-label">Curb Mix Cost Per CU. YD.</label>
                               <input type="text" id="jordMixCost" name="jordMixCost"
                                      class="form-control"   value="{$mat['Concrete (Curb Mix) per cubic yard']}" disabled>
                           </div>

                           <div class="col-sm-2">
                               <label class="control-label">Calculate</label>
                               <a href="Javascript:CALCME(this.dataform,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');" class="btn btn-info btn-labeled"><span class="btn-label icon fa fa-dollar"></span> CALC</a>

                           </div>

                       </div>



                    {ELSE} {*drum mix*}
                       <br/>
                       <div class="row">
                           <div class="col-sm-2">
                               <label class="control-label">Sq. Ft.</label>
                               <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                      class="form-control" style='background:yellow;' value="{$details.jordSquareFeet}">
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Depth (inches)</label>
                               <input type="text" id="jordDepthInInches" name="jordDepthInInches"
                                      class="form-control" style='background:yellow;' value="{$details.jordDepthInInches}" >
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Locations</label>
                               <input type="text" id="jordLocations" name="jordLocations"
                                      class="form-control"  style='background:yellow;' value="{$details.jordLocations}"  >
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">CU YDS</label>
                               <input type="text" id="jordCubicYards" name="jordCubicYards"
                                      class="form-control"   value="{$details.jordCubicYards}" >
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Drum Mix Cost</label>
                               <input type="text" id="jordMixCost" name="jordMixCost"
                                      class="form-control"   value="{$mat['Concrete (Drum Mix) per cubic yard']}" disabled>
                           </div>
                           <div class="col-sm-2">
                               <label class="control-label">Calculate</label>
                               <a href="Javascript:CALCME(this.dataform,'{$details['cmpServiceCat']}','{$details.cmpServiceID}');" class="btn btn-info btn-labeled"><span class="btn-label icon fa fa-dollar"></span> CALC</a>

                           </div>

                       </div>
                   {/IF}

               {elseif $details['cmpServiceCat'] eq 'Excavation'}


                   <div class="row">
                       <div class="col-sm-2">
                           <label class="control-label">Sq. Ft.</label>
                           <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                  class="form-control" style='background:yellow;' value="{$details.jordSquareFeet}">
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Depth In inches</label>
                           <input type="text" id="jordDepthInInches" name="jordDepthInInches"
                                  class="form-control" style='background:yellow;' value="{$details.jordDepthInInches}" >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Our Cost</label>
                           <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                  class="form-control"  style='background:yellow;' value="{$details.jordCostPerDay}">
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Tons</label>
                           <input type="text" id="jordTons" name="jordTons"
                                  class="form-control"  value="{$details.jordTons}" disbled >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Loads</label>
                           <input type="text" id="jordLoads" name="jordLoads"
                                  class="form-control"  {$details.jordLoads}" >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'{$details.cmpServiceCat}','{$details.cmpServiceID}');" class="btn btn-primary btn-labeled">CALC</a>

                        </div>

                   </div>

                   <br/>


               {elseif $details['cmpServiceCat'] eq 'Other'}


                   <div class="row">

                       <div class="col-sm-3">
                           <label class="control-label">Cost</label>
                           <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                  class="form-control"  style='background:yellow;' value="{$details.jordCostPerDay}">
                       </div>

                       <div class="col-sm-3">
                           <label class="control-label">Locations</label>
                           <input type="text" id="jordLocations" name="jordLocations"
                                  class="form-control"  style='background:yellow;' value="{$details.jordLocations}">
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'{$details.cmpServiceCat}','{$details.cmpServiceID}');" class="btn btn-info btn-labeled"><span class="btn-label icon fa fa-dollar"></span> CALC</a>

                       </div>

                  </div>
                   <div class="row">

                       <div class="col-sm-10">
                           <label class="control-label">Description</label>
                           <textarea id="jordVendorServiceDescription" name="jordVendorServiceDescription"
                                  class="form-control"  >{$details['jordVendorServiceDescription']}</textarea>
                       </div>

                   </div>



               {elseif $details['cmpServiceCat'] eq 'Rock'}



                   <div class="row">
                       <div class="col-sm-3">
                           <label class="control-label">SQ . Ft.</label>
                           <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                  class="form-control" style='background:yellow;' value="{$details.jordSquareFeet}">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Depth In inches</label>
                           <input type="text" id="jordDepthInInches" name="jordDepthInInches"
                                  class="form-control" style='background:yellow;' value="{$details.jordDepthInInches}" >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Tons</label>
                           <input type="text" id="jordTons" name="jordTons"
                                  class="form-control"  value="{$details.jordTons}" disbled >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Loads</label>
                           <input type="text" id="jordLoads" name="jordLoads"
                                  class="form-control"  {$details.jordLoads}" >
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'{$details.cmpServiceCat}','{$details.cmpServiceID}');" class="btn btn-primary btn-labeled">CALC</a>

                       </div>

                   </div>
                   <br/>
                   <div class="row">
                       <div class="col-sm-1">
                           <input type="radio"  id="rockcost" name="rockcost"
                                  class="form-control" value="{$mat['Base Rock (Palm Beach) per ton']}" {IF $details.jordAdditive == $mat['Base Rock (Palm Beach) per ton']} checked {/IF} onChange="Javascript:CALCME(this.form,'{$details.cmpServiceCat}','{$details.cmpServiceID}');">
                       </div>

                       <div class="col-sm-4">
                           <label class="control-label">Base Rock (Palm Beach) ${$mat['Base Rock (Palm Beach) per ton']}</label>
                       </div>
                       <div class="col-sm-1">
                           <input type="radio" id="rockcost" name="rockcost"
                                  class="form-control" value="{$mat['Base Rock (Broward & Dade) per ton']}" {IF $details.jordAdditive == $mat['Base Rock (Broward & Dade) per ton']} checked {/IF} onChange="Javascript:CALCME(this.form,'{$details.cmpServiceCat}','{$details.cmpServiceID}');">
                       </div>
                       <div class="col-sm-4">
                           <label class="control-label">Base Rock (Broward & Dade) ${$mat['Base Rock (Broward & Dade) per ton']}</label>
                       </div>


                   </div>

               {elseif $details['cmpServiceCat'] eq 'Seal Coating'}


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
                           <option value="{$details['jordYield']}">{$details['jordYield']}</option>
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
                              class="form-control"  style='background:yellow;' value="{$details['jordSquareFeet']}">
                   </div>

               </div>
                   <br/>

                   <div class="row" >
                       <div class="col-sm-4">
                           <label class="control-label"> Oil Spot Primer (gals)</label>
                           <input type="text" id="jordPrimer" name="jordPrimer"
                                  class="form-control"  style='background:yellow;' value="{$details['jordPrimer']}">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Fast Set (gals)</label>
                           <input type="text" id="jordFastSet" name="jordFastSet"
                                  class="form-control"  style='background:yellow;' value="{$details['jordFastSet']}">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Phases</label>
                           <input type="text" id="jordPhases" name="jordPhases"
                                  class="form-control"  style='background:yellow;' value="{$details['jordPhases']}">
                       </div>



                       <div class="col-sm-2">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'{$details['cmpServiceCat']}');" class="btn btn-primary btn-labeled">CALC</a>

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
                                  class="form-control"  value="{$details['jordSealer']}">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Sand (SEALER * 2)</label>
                           <input type="text" id="jordSand" name="jordSand"
                                  class="form-control"  value="{$details['jordSand']}">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Additive (SEALER / 50)</label>
                           <input type="text" id="jordAdditive" name="jordAdditive"
                                  class="form-control"   value="{$details['jordAdditive']}">
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
                                  class="form-control"  value="{$mat['Sealer (per gal)']|number_format:2}" disabled>
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="SandCost" name="SandCost"
                                  class="form-control"  value="{$mat['Sand (lbs.)']|number_format:2}" disabled>
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="AdditiveCost" name="AdditiveCost"
                                  class="form-control"  value="{$mat['Additive (per gal)']|number_format:2}" disabled>
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="PrimerCost" name="PrimerCost"
                                  class="form-control"  value="{$mat['Oil Spot Primer (per gal)']|number_format:2}" disabled>
                       </div>
                       <div class="col-sm-2">
                           <input type="text" id="FastSetCost" name="FastSetCost"
                                  class="form-control"  value="{$mat['Fastset (per gal)']|number_format:2}" disabled>
                       </div>

                   </div>

</div>
               {elseif $details['cmpServiceCat'] eq 'Striping'}
                   {$details['cmpServiceCat']}

               {elseif $details['cmpServiceCat'] eq 'Sub Contractor'}

                   <div class="row" >
                       <div class="col-sm-6">
                           <label class="control-label">Sub Contractor</label>
                           <h4>{$details['cntFirstName']} {$details['cntLastName']}</h4>
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Cost</label>
                           <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                  class="form-control"  style='background:yellow;' value="{$details['jordCostPerDay']}">
                       </div>
                       <div class="col-sm-2">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'{$details['cmpServiceCat']}');" class="btn btn-primary btn-labeled">CALC</a>

                       </div>

                   </div>


                   <div class="row" >
                       <div class="col-sm-6">
                           <label class="control-label">Job Description</label>
                           <textarea id="jordVendorServiceDescription" name="jordVendorServiceDescription"
                                     class="form-control"  style='background:yellow;' >{$details['jordVendorServiceDescription']}</textarea>
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Over Head %</label>
                           <input type="text" id="jordAdditive" name="jordAdditive"
                                  class="form-control"  style='background:yellow;' value="{$details['jordAdditive']}">
                       </div>

                       <div class="col-sm-3">
                           <label class="control-label">Sub Over Head %</label>
                           <input type="text" id="boh" name="boh"
                                  class="form-control"  value="{$details['cntOverHead']}" disabled>
                       </div>

                   </div>

               {elseif $details['cmpServiceCat'] eq 'Paver Brick'}

                   <br />
                   <div class="row" >
                       <div class="col-sm-3">
                           <label class="control-label">SQ. Ft.</label>
                           <input type="text" id="jordSquareFeet" name="jordSquareFeet"
                                  class="form-control"  style='background:yellow;' value="{$details['jordSquareFeet']}">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Cost</label>
                           <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                  class="form-control"  style='background:yellow;' value="{$details['jordCostPerDay']}">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Excavate Tons</label>
                           <input type="text" id="jordTons" name="jordTons"
                                  class="form-control"  style='background:yellow;' value="{$details['jordTons']}">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'{$details['cmpServiceCat']}');" class="btn btn-primary btn-labeled">CALC</a>

                       </div>

                   </div>
                   <br />
                   <div class="row" >

                       <div class="col-sm-9">
                           <label class="control-label">Job Description</label>
                           <textarea id="jordVendorServiceDescription" name="jordVendorServiceDescription"
                                     class="form-control"  style='background:yellow;' >{$details['jordVendorServiceDescription']}</textarea>
                       </div>
                   </div>

               {elseif $details['cmpServiceCat'] eq 'Drainage and Catchbasins'}

                   <br />
                   <div class="row" >
                       <div class="col-sm-4">
                           <label class="control-label">Number of Catch Basins</label>
                           <input type="text" id="jordAdditive" name="jordAdditive"
                                  class="form-control"  style='background:yellow;' value="{$details['jordAdditive']}">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Cost</label>
                           <input type="text" id="jordCostPerDay" name="jordCostPerDay"
                                  class="form-control"  style='background:yellow;' value="{$details['jordCostPerDay']}">
                       </div>
                       <div class="col-sm-3">
                           <label class="control-label">Calculate</label>
                           <a href="Javascript:CALCME(this.dataform,'{$details['cmpServiceCat']}');" class="btn btn-primary btn-labeled">CALC</a>

                       </div>

                   </div>
                   <br />
               <div class="row" >

                   <div class="col-sm-9">
                       <label class="control-label">Job Description</label>
                       <textarea id="jordVendorServiceDescription" name="jordVendorServiceDescription"
                                 class="form-control"  style='background:yellow;' >{$details['jordVendorServiceDescription']}</textarea>
                   </div>
                </div>
               {else}
                   xxxxxxxxxxxxxxxxxxxxxxxxxxxxx    ALERT:UNKNOWN SERVICE    xxxxxxxxxxxxxxxxxxxxxxxxxxxxx

               {/if}



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
               <textarea class="form-control"  id="jordNote" name="jordNote" placeholder="Short Note" >{$details['jordNote']}</textarea>
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
                           <input type="hidden" name="refreshtext" value="{$services['cmpProposalText']|escape}">
                           <br>             <a href="Javascript:refreshText(this.dataform);" class="btn btn-info btn-labeled">reset proposal text</a>
                                  <br>
                        {$services['cmpProposalText']}
                        {assign var="ProposalText" value = ''}
                        {$ProposalText = $details['jordProposalText']}


                        {IF !$details['jordProposalText']}
                               {$ProposalText = $services['cmpProposalText']}

                        {/IF}
                      </div>
                     <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>

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

               <form action="{$SITE_URL}workorders/addPOvehicle/{$pid}/{$sid}"  name="vdataform" id="vdataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="sid" id="sid" value="{$sid}">
               <input type="hidden" name="pid" id="pid" value="{$pid}">
               <input type="hidden" name="jordServiceID" id="jordServiceID" value="{$details.cmpServiceID}">
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
                                           {foreach $vehiclelist as $data}
                                         <option value="{$data['vtypeID']}">{$data['vtypeName']}  -rate:{$data['vtypeRate']} per hour </option>
                                           {/foreach}
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
                               {assign var="tv" value=0}
                               {IF $vehicles}
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


                               {foreach $vehicles as $data}
                               <!-- begin row -->
                               <div class="row" >

                                   <div class="col-sm-4">
                                       {$data['POVvehicleName']}<br />Rate:{$data['POVRate']}
                                   </div>

                                   <div class="col-sm-2">
                                       {$data['POVNumber']}
                                   </div>

                                   <div class="col-sm-1">
                                       {$data['POVDaysNeeded']}
                                   </div>

                                   <div class="col-sm-1">
                                       {$data['POVHoursDay']}
                                   </div>
                                   <div class="col-sm-2">$
                                       {$data['POVHoursDay'] * $data['POVRate'] * $data['POVNumber'] * $data['POVDaysNeeded']}
                                   </div>

                                   <div class="col-sm-2">
                                       <a href='{$SITE_URL}workorders/deletePOVehicle/{$pid}/{$sid}/{$data['POVID']}'>remove</a>
                                   </div>


                               </div>

                                        {$tv = $tv + ($data['POVHoursDay'] * $data['POVRate'] * $data['POVNumber'] * $data['POVDaysNeeded'])}

                               {/foreach}
                            {/IF}
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
                                            class="form-control"   style='background:lightblue;' value="{$tv|string_format:"%.2f"}" disabled>
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

           <form action="{$SITE_URL}workorders/addPOequipment/{$pid}/{$sid}"  name="edataform" id="edataform" method="POST">
               <input type="hidden" name="beenhere" value="1">

               <input type="hidden" name="sid" id="sid" value="{$sid}">
               <input type="hidden" name="pid" id="pid" value="{$pid}">
               <input type="hidden" name="jordServiceID" id="jordServiceID" value="{$details.cmpServiceID}">
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

                        {foreach $equipmentlist as $data}
                           <option value="{$data['equipID']}">{$data['equipName']} {$data['equipRate']}</option>
                        {/foreach}
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

              {assign var="ev" value=0}
               {assign var="ecost" value=0}
              {IF $equipment}
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

              {foreach $equipment as $data}
                  <!-- begin row -->
                  <div class="row" >

                      <div class="col-sm-4">
                          {$data['POequipName']}<br />Rate:${$data['POequipCost']} {$data['POequipRate']}
                      </div>

                      <div class="col-sm-2">
                          {$data['POequipNumber']}
                      </div>

                      <div class="col-sm-1">
                          {$data['POequipDaysNeeded']}
                      </div>

                      <div class="col-sm-1">
                          {$data['POequipHoursDay']}
                      </div>
                      <div class="col-sm-2">$
                          {IF $data['POequipRate'] eq "per day"}
                               {$ecost = $data['POequipCost'] * $data['POequipNumber'] * $data['POequipDaysNeeded']}

                          {ELSE}
                               {$ecost = $data['POequipHoursDay'] * $data['POequipCost'] * $data['POequipNumber'] * $data['POequipDaysNeeded']}

                          {/IF}

                          {IF $ecost < $data['POequipMinCost']}
                              {$ecost = $data['POequipMinCost']}
                          {/IF}
                          {$ev = $ev + $ecost}
                          {$ecost}

                      </div>

                      <div class="col-sm-2">
                          <a href='{$SITE_URL}workorders/deletePOEquipment/{$pid}/{$sid}/{$data['POequipID']}'>remove</a>
                      </div>


                  </div>


              {/foreach}
              {/IF}

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
                              class="form-control"   style='background:lightblue;' value="{$ev|string_format:"%.2f"}"  disabled >
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

               <form action="{$SITE_URL}workorders/addPOlabor/{$pid}/{$sid}"  name="ldataform" id="ldataform" method="POST">
                   <input type="hidden" name="beenhere" value="1">
                   <input type="hidden" name="sid" id="sid" value="{$sid}">
                   <input type="hidden" name="pid" id="pid" value="{$pid}">
                   <input type="hidden" name="jordServiceID" id="jordServiceID" value="{$details.cmpServiceID}">

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
                               {foreach $laborlist as $data}
                               <option value="{$data['rateID']}">{$data['rateName']}</option>
                               {/foreach}

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
              {assign var="lv" value=0}

              {IF $labor}
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

              {foreach $labor as $data}
                  <!-- begin row -->
                  <div class="row" >

                      <div class="col-sm-4">
                          {$data['POlaborName']}<br />Rate:{$data['POlaborRate']}
                      </div>

                      <div class="col-sm-2">
                          {$data['POlaborNumber']}
                      </div>

                      <div class="col-sm-1">
                          {$data['POlaborDaysNeeded']}
                      </div>

                      <div class="col-sm-1">
                          {$data['POlaborHoursDay']}
                      </div>
                      <div class="col-sm-2">$
                          {$data['POlaborHoursDay'] * $data['POlaborRate'] * $data['POlaborNumber'] * $data['POlaborDaysNeeded']}
                      </div>

                      <div class="col-sm-2">
                          <a href='{$SITE_URL}workorders/deletePOlabor/{$pid}/{$sid}/{$data['POlaborID']}'>remove</a>
                      </div>


                  </div>

                  {$lv = $lv + ($data['POlaborHoursDay'] * $data['POlaborRate'] * $data['POlaborNumber'] * $data['POlaborDaysNeeded'])}

              {/foreach}
              {/IF}

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
                              class="form-control"   style='background:lightblue;' value="{$lv|string_format:"%.2f"}"  disabled>
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

       <form action="{$SITE_URL}workorders/addPOOther/{$pid}/{$sid}"  name="odataform" id="odataform" method="POST">
           <input type="hidden" name="beenhere" value="1">
           <input type="hidden" name="sid" id="sid" value="{$sid}">
           <input type="hidden" name="pid" id="pid" value="{$pid}">
           <input type="hidden" name="jordServiceID" id="jordServiceID" value="{$details.cmpServiceID}">


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
                               <a href='{$SITE_URL}workorders/deletePOother/{$pid}/{$sid}/{$data['jobcostID']}'>remove</a>
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

                <form action="{$SITE_URL}workorders/addPOSub/{$pid}/{$sid}"  name="udataform" id="udataform" method="POST">
                    <input type="hidden" name="beenhere" value="1">
                    <input type="hidden" name="sid" id="sid" value="{$sid}">
                    <input type="hidden" name="pid" id="pid" value="{$pid}">
                    <input type="hidden" name="posubjordID" id="posubjordID" value="{$sid}">
                    <input type="hidden" name="jordServiceID" id="jordServiceID" value="{$details.cmpServiceID}">

                <!-- begin row -->
                <div class="row" >
                    <div class="col-sm-7">
                        <label class="control-label">Sub Contractor</label>
                        <select class="form-control" name="posubVendorID" id="posubVendorID" onChange="Javascript:getSubOH(this.form);">
                            <option value="0">Select a Sub Contractor</option>
                            {foreach $subcontractors as $o}
                                <option value="{$o.cntId}">{$o.cntFirstName} {$o.cntLastName} - {$o.cntOverHead}%</option>
                            {/foreach}
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
                {assign var="sv" value=0}

                {IF $subs}
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

                {foreach $subs as $data}
                    {assign var="sov" value=1-($data['posubOverHead']/100)}
                    {assign var="suboh" value=($data['posubCost']/$sov) - $data['posubCost']}
                    ${assign var="tscost" value=($data['posubCost'] + $suboh)}

                    <!-- begin row -->
                    <div class="row" >

                        <div class="col-sm-2">
                            {$data['cntFirstName']} {$data['cntLastName']}
                            <br />{$data['posubOverHead']}%
                        </div>

                        <div class="col-sm-3">
                            {$data['posubDescription']}
                        </div>

                        <div class="col-sm-2">
                            ${$suboh|number_format:2}
                        </div>

                        <div class="col-sm-2">
                            ${$data['posubCost']|number_format:2}
                        </div>

                        <div class="col-sm-2">

                            ${$tscost|number_format:2}
                        </div>

                        <div class="col-sm-1">
                            <a href='{$SITE_URL}workorders/deletePOSub/{$pid}/{$sid}/{$data['posubID']}'>remove</a>
                        </div>


                    </div>

                    {$sv = $sv + ($data['posubCost'] +  $suboh)}

                {/foreach}
                {/IF}
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
                        <input type="hidden" id="SubTotal" name="SubTotal" value="{$sv|string_format:"%.2f"}" >
                        <input type="text" id="SubTotals" name="SubTotals"
                               class="form-control"   style='background:lightblue;' value="${$sv|number_format:2}" disabled>
                    </div>
                </div>

                </form>
                </div>
            </div>
       </div>


<!-- added sub contractor sections -->




   </div>



