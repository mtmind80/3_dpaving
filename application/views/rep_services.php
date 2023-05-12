{if $details['cmpServiceCat'] eq 'Asphalt'}


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
                <label class="control-label">Asphalt Cost (<i>${$mat['Asphalt per ton']} per ton</i>)</label>
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
                       class="form-control"   value="" >
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
                       class="form-control"  style='background:yellow;' value="" >
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
                   class="form-control" value="{$mat['Base Rock (Palm Beach) per ton']}" checked  onChange="Javascript:CALCME(this.form,'{$details.cmpServiceCat}','{$details.cmpServiceID}');">
        </div>

        <div class="col-sm-4">
            <label class="control-label">Base Rock (Palm Beach) ${$mat['Base Rock (Palm Beach) per ton']}</label>
        </div>
        <div class="col-sm-1">
            <input type="radio" id="rockcost" name="rockcost"
                   class="form-control" value="{$mat['Base Rock (Broward & Dade) per ton']}" onChange="Javascript:CALCME(this.form,'{$details.cmpServiceCat}','{$details.cmpServiceID}');">
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

{/if}




<!-- begin vehicles -->
<br />
<div class="row panel"  style='border:1px #000000 solid;'>

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

            {/foreach}
            {/IF}
</div>

<br />
<div class="row panel"  style='border:1px #000000 solid;'>
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
            </div>


            {/foreach}
            {/IF}

</div>

<!-- labor sections -->



<br />

<br />
<div class="row panel"  style='border:1px #000000 solid;'>

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


            </div>


            {/foreach}
            {/IF}


    </div>
</div>
