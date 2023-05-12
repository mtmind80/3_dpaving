<script type="text/javascript">

    init.push(function () {



        $('#bs-datepicker-component').datepicker({
            dateFormat: 'mm-dd-yy'
        });


    });


    var id = 0;

    function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {

        if(form.cntFirstName.value == '')
        {
            alert('You must enter a value for name');
            form.cntFirstName.focus();
            return false;
        }

        if ($('input[name=cntcid]:checked').length > 0)
        {

        }
        else
        {
            alert('You must select a contact category');
            form.cntcid.focus();
            return false;

        }

        if(form.cntPrimaryEmail.value == '')
        {
            alert('You must enter a value for email');
            form.cntFirstName.focus();
            return false;
        }
        return true;

    }

    function checkEmail(email)
    {

        $.post( site_url + "crm/checkEmail/", { email: email , id: 0})
                .done(function( data ) {

                 if(data)
                   {
                       var popupmsg = 'This email ' + email + ' is already in this system.\nDo you want to check for a duplicate record?';
                       $('#msg').html(popupmsg);
                       $('#privatemessage').modal('show');
                       window.setTimeout(function(){ $("#privatemessage").modal('hide'); },5000);

                      // alert("This email " + email + " is already in this system.\nYou will have to use another email");
                      // $("#cntPrimaryEmail").val('');

                   }
                    return data;
                });

    }
    function addname(form)
    {

        form.cntAltContactName.value = form.cntFirstName.value + ' ' + form.cntLastName.value;
    }


    $(document).ready(function() {

        var howlong = 0;
        var scount = 1;
        $("#cntPrimaryPhone").mask("(999) 999-9999");

        $("#cntAltPhone1").mask("(999) 999-9999");

        $("#cntAltPhone2").mask("(999) 999-9999");

        var cid = {$company['cntId']};

        $("#cntFirstName").on("keyup paste", function(){

            firstname = $('#cntFirstName').val();
            lastname = $('#cntLastName').val();
            howlong = firstname.length;
            //alert(parseInt(howlong) +' = '+ parseInt(donit));
            if(parseInt(howlong) > 3 && (scount/3 == parseInt(scount/3)))
            {
                searchProcess(firstname, lastname, cid);
            }
            scount++;

        });

        $("#cntLastName").on("keyup paste", function(){

            firstname = $('#cntFirstName').val();
            lastname = $('#cntLastName').val();
            howlong = lastname.length;
            //alert(parseInt(howlong) +' = '+ parseInt(donit));
            if(parseInt(howlong) > 3 && (scount/3 == parseInt(scount/3)))
            {
                searchProcess(firstname, lastname, cid);
            }
            scount++;

        });

        $("#cntFirstName").on("change", function(){
            firstname = $('#cntFirstName').val();
            lastname = $('#cntLastName').val();
            if(firstname.length > 3)
            {
                searchProcess(firstname, lastname, cid);
            }
        });
        $("#cntLastName").on("change", function(){
            firstname = $('#cntFirstName').val();
            lastname = $('#cntLastName').val();
            if(lastname.length > 3)
            {
                searchProcess(firstname, lastname, cid);
            }
        });

    });


    function searchProcess(firstname, lastname, cid)
    {


        $.post( site_url + "crm/searchName2/", { firstname: firstname , lastname: lastname, cid: cid})
                .done(function( data ) {
                    $('#infomsg').html("<h3>Possible Name Matches</h3>");

                    if(data)
                    {
                        if(data.trim() != '<h3>Possible Name Matches</h3>')
                        {
                            $.growl.error({ title: "Search Results", message: "We found some matching records. Please make sure you do not enter a duplicate record." });
                        }
                        $('#infomsg').html(data);
                    }
                    // $('#infomsg').html("nothing");
                });

    }



    function searchEmail()
    {

        var cid = $('#cntcid').val();
        email = $('#cntPrimaryEmail').val();
        $.post( site_url + "crm/searchEmail/", { email: email, cid: cid})
                .done(function( data ) {
                    $('#infomsg').html("<h3>Possible Email Matches</h3>");

                    if(data)
                    {
                        if(data.trim() != '<h3>Possible Email Matches</h3>')
                        {
                            $.growl.error({ title: "Search Results", message: "We found some matching emails. Please make sure you do not enter a duplicate record." });
                        }
                        $('#infomsg').html(data);
                    }
                    // $('#infomsg').html("nothing");
                });

    }

    function changeMe(id)
    {
        var company = $('#' + id).attr("data-company")
        var cm =  confirm("Do you want to change the connection of this manager from "+ company + " to {$company['cntFirstName']} {$company['cntLastName']}?");
        var primaryid = {$cid};
        if(cm)
        {
            window.location.href= site_url + "crm/changeManager/" + primaryid + "/" + id;
        }
    }

</script>


<div class="panel">
    <div class="panel-heading">
{*

             * 9 	Community/Development
             * 10 	Government Agency
             * 8 	Company
             * 6 	Client
             * 2 	Vendor
             * 11 	Sub Contractor


             *}

            <h2>Add Managers or Employees</h2>
        <h3 class="alert">Related To : <a href="{$SITE_URL}crm/additionalInformation/{$cid}">{$company['cntFirstName']|html_entity_decode} {$company['cntLastName']|html_entity_decode}</a></h3>
            <i>(Name, Email and Phone are recommended fields)</i>
           </div>
    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" >Primary Contact </span></a> </span> </li
                    >

            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='#'><span class="wizard-step-description" style="color: #000000;">Managers Employees </span></a> </span> </li
                    >
                <li>
                    <!-- ! Remove space between elements by dropping close angle -->
                    <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Properties</span></a> </span> </li
                        >
            </ul>
    </div>
   <div class="panel-body">


        <form action="{$SITE_URL}crm/saveWizardManager/{$cid}"  name="dataform" id="dataform" class="panel" method="POST">
        <input type="hidden" name="beenhere" value="1">
        <input type="hidden" name="cid" value="{$cid}">
        <input type="hidden" id="cntQualified" name="cntQualified"  value="1">
        <input type="hidden" id="cntAltContactName" name="cntAltContactName"  value="">
        <input type="hidden" name="cntCompanyId" value="{$cid}">


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                   <label><span style="color:Red;">Select a Contact Type:</span>&nbsp;</label> <label class="radio-inline"><input type="radio" name="cntcid" value='13'>Property Manager Residential</label>
                    <label class="radio-inline"><input type="radio" name="cntcid" value='12'>Property Manager Commercial</label>
                    <label class="radio-inline"><input type="radio" name="cntcid" value='18'>General Contact</label>

                </div>
            </div>
        </div>
        <!-- row -->

        <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Salutation</label>
                        <select name="cntSalutation" id="cntSalutation" tabindex="1" class="form-control">
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>First Name</label>
                        <input type="text" id="cntFirstName" name="cntFirstName" class="form-control" onchange="Javascript:addname(this.form);">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Last Name</label>
                        <input type="text" id="cntLastName" name="cntLastName" class="form-control" onchange="Javascript:addname(this.form);">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Middle Name</label>
                        <input type="text" id="cntMiddleName" name="cntMiddleName" class="form-control">
                    </div>
                </div>



            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Gender</label><br>
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGenderYES" value="M" checked> MALE
                        <input type="radio" class="radio-inline" name="cntGender" id="cntGenderNO" value="F"> FEMALE
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Date of Birth</label>
                        <div class="input-group date" id="bs-datepicker-component">
                            <input type="text" id="cntDateOfBirth" name="cntDateOfBirth"
                                   class="form-control">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Department</label>
                        <input type="text" id="cntDepartment" name="cntDepartment" class="form-control">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Title</label>
                        <input type="text" id="cntJobTitle" name="cntJobTitle" class="form-control">
                    </div>
                </div>

            </div>
            <!-- row -->




        <!-- begin row -->
            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Primary Phone</label>
                        <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" tabindex="2" type="number" class="form-control">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Cell Phone</label>
                        <input type="text" id="cntAltPhone1" name="cntAltPhone1" tabindex="3" type="number"  class="form-control">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Fax</label>
                        <input type="text" id="cntAltPhone2" name="cntAltPhone2" tabindex="4" type="number"  class="form-control">
                    </div>
                </div>


            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"><span style="color:red;">*</span>Primary Email</label>
                        <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" onChange="Javascript:searchEmail();">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Alternate Email</label>
                        <input type="text" id="cntAltEmail" name="cntAltEmail" class="form-control">
                    </div>
                </div>

            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> Address Line 1</label>
                        <input type="text" id="cntPrimaryAddress1" name="cntPrimaryAddress1" class="form-control" size="45">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Address line 2</label>
                        <input type="text" id="cntPrimaryAddress2" name="cntPrimaryAddress2" class="form-control"  size="45">
                    </div>
                </div>

            </div>
            <!-- row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">City</label>
                        <input type="text" id="cntPrimaryCity" name="cntPrimaryCity" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label"> State</label>
                        <select id="cntPrimaryState" name="cntPrimaryState" class="form-control">
                        {$states}
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Zip Code</label>
                        <input type="text" id="cntPrimaryZip" name="cntPrimaryZip" class="form-control">
                    </div>
                </div>

            </div>
            <!-- row -->

        <!-- begin row -->
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Comments</label>
                    <textarea rows="4" cols="54" id="cntComment" name="cntComment" class="form-control"></textarea>
                </div>
            </div>

        </div>
        <!-- row -->

    <!-- buton row -->
        <div class="row">
            <div class="col-sm-5">
                <a class="topbut btn btn-success" href="Javascript:CHECKIT(this.dataform);"> ADD MANAGER EMPLOYEE </a>

            </div>
            <div class="col-sm-5">
                <a class="topbut btn btn-error" href="{$SITE_URL}crm/PropertyWizard/{$cid}"> SKIP TO PROPERTIES <span class="btn-label icon fa fa-arrow-right"></span></a>

            </div>

        </div>
        </form>

        </div>
    </div>




