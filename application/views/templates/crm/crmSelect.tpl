<!--
14 	HOA - Board Member
12 	Property Manager - Commercial
17 	Property Owner - Commercial
16 	Property Owner - Residential
15 	COA - Board Member
13 	Property Manager - Residential
7 	Property Management Company
-->

<script type="text/javascript">

    $(document).ready(function() {



        $('input[name="cntcid"]').change(function(){

            var cntcid = $('input[name="cntcid"]:checked').val();
            var usewizard = $('input[name="cntcid"]:checked').attr("data-usewizard");
            var catDesc = $('input[name="cntcid"]:checked').attr("data-catDesc");
            var catname = $('input[name="cntcid"]:checked').attr("data-catname");
            if(usewizard == 1)
            {
                $("#dataform").attr("action", site_url + 'crm/startWizard/' + cntcid);
            }
            else
            {
                $("#dataform").attr("action", site_url + 'crm/select/' + cntcid);

            }
            $("#usewizard").val(usewizard);
            $("#catmsg").html('');
            $("#gonextmsg").html('');
            $("#catmsg").html('<h3>' + catname + '</h3>' + catDesc );
            if(cntcid == 12) //prop manager
            {

                $("#gonextmsg").html('<h3>Click Next</h3>Click Next to enter the primary contact information, then you can also add properties that may be related to this manager. If this property manager is employed by a <b>property management company</b>, please enter that company first.');

            }
           else if(cntcid == 13) //prop manager
            {
                $("#gonextmsg").html('<h3>Click Next</h3>Click Next to enter the primary contact information, then you can also add properties that may be related to this manager.If this property manager is employed by a <b>property management company</b>, please enter that company first.');
            }
           else if(cntcid == 14 || cntcid == 7 || cntcid == 17 || cntcid == 16 || cntcid == 15) //entity
                  {
                      $("#gonextmsg").html('<h3>Click Next</h3>Click Next to enter the primary contact. You can then enter Property Managers or Employees that may be related to this new contact, and finally any properties that may be related to this new contact');

                   }
           else if(cntcid == 10) //government
           {
               $("#gonextmsg").html('<h3>Click Next</h3>Click Next to enter the primary contact. You can then enter Employees that may be related to this government agency, and finally any properties that may be related to this government agency');

           }
            else
                {

                    $("#gonextmsg").html('<h3>Click Next</h3>Click Next to enter the primary contact.');
                }

        });

    });

    var id = 0;

    function CHECKIT(form)
    {
        if(!$('input[name="cntcid"]:checked').val()){
            document.getElementById("pagetop").scrollIntoView();

            $.growl.error({ title: "Make a Selection", message: "You must make a selection!" });
        return ;
        }

        var cntcid = $('input[name="cntcid"]:checked').val();
        var usewizard = $('input[name="cntcid"]:checked').attr("data-usewizard");
        var catDesc = $('input[name="cntcid"]:checked').attr("data-catDesc");
        var catname = $('input[name="cntcid"]:checked').attr("data-catname");

        if(usewizard == 1)
        {
            $("#dataform").attr("action", site_url + 'crm/startWizard/' + cntcid);
        }
        else
        {
            $("#dataform").attr("action", site_url + 'crm/create/' + cntcid);

        }
        $("#usewizard").val(usewizard);

        form.submit();
    }

    function checkEmail(email)
    {

        $.post( site_url + "crm/checkEmail/", { email: email , id: 0})
                .done(function( data ) {

                 if(data)
                   {
                       var popupmsg = 'This email ' + email + ' is already in this system.\nYou will have to use another email';
                       $('#msg').html(popupmsg);
                       $('#privatemessage').modal('show');
                       window.setTimeout(function(){ $("#privatemessage").modal('hide'); },5000);

                      // alert("This email " + email + " is already in this system.\nYou will have to use another email");
                       $("#cntPrimaryEmail").val('');

                   }
                    return data;
                });

    }
</script>

<a id="pagetop" name="pagetop"></a>
<div class="panel">
    <div class="panel-heading">



            <h2>Select Contact Type</h2>
            <i>(If you are entering multiple contacts related to a Property Management Company, Please start by entering that management company. HOA - Board Member,Property Owner - Commercial,Property Owner - Residential OR COA - Board Member, you will be able to enter multiple linked contacts, managers and properties using our wizard.)</i>

    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" style="color: #000000;">Select a Contact Type </span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"><a href='#'><span class="wizard-step-description" >Primary Contact Info </span></a> </span> </li
                    >

        </ul>
    </div>
   <div class="body">
        <form action="{$SITE_URL}crm/startContact/"  name="dataform" id="dataform" class="panel" method="POST">
            <input type="hidden" name="beenhere" value="1">        <input type="hidden" name="usewizard" id="usewizard" value="0">


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">

                        {foreach $cidname as $c}
                            {if $c['ccatWizard'] eq 0}
                                <label class="control-label"> {$c['ccatName']}</label>
                                <input type="radio" id="cntcid" data-usewizard="{$c['ccatWizard']}"  data-catdesc="{$c['ccatDescription']}"  data-catname="{$c['ccatName']}" name="cntcid" class="form-control-sm" value="{$c['ccatId']}" >
                                <br/>
                            {/if}
                        {/foreach}
                        <br/>

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                       {foreach $cidname as $c}
                            {if $c['ccatWizard'] eq 1}
                                <label class="control-label"> {$c['ccatName']}</label>
                                <input type="radio" id="cntcid" data-usewizard="{$c['ccatWizard']}"  data-catdesc="{$c['ccatDescription']}" data-catname="{$c['ccatName']}" name="cntcid" class="form-control-sm" value="{$c['ccatId']}" >
                                <br/>
                            {/if}
                        {/foreach}

                        <div>
                            <a href="{$SITE_URL}crm/showList/1" class="btn btn-flat btn-labeled">Cancel</a> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="Javascript:CHECKIT(this.dataform);"> NEXT <span class="btn-label icon fa fa-arrow-right"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div id="catmsg" style='min-height:80px;'></div>
                    <div id="gonextmsg" style='min-height:80px;'></div>
                </div>
            </div>
            <!-- row -->




        </form>

        </div>
    </div>




