<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-11-15 11:55:32
         compiled from "application/views/templates/projects/poNew.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19738193435928687cd90899-84778149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd3390b35832a5e1f2506500907ea12b74b778ec' => 
    array (
      0 => 'application/views/templates/projects/poNew.tpl',
      1 => 1542259009,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19738193435928687cd90899-84778149',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5928687cdd5768_93358106',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'states' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5928687cdd5768_93358106')) {function content_5928687cdd5768_93358106($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">


    function createnew(tp,form)
    {

        var desc = form.cid[form.cid.selectedIndex].text;

        if(tp != 0)
        {
            $("#chooseexisting").fadeOut();
            $("#choosenew").fadeOut();
            $("#cid").val(tp);


            var arr = ["8","9","10"]; // entities not people

            if(jQuery.inArray(tp, arr) !== -1)
            {
                $("#newclientc").fadeIn();
                $("#jobType2").html(desc);
            }
            else
            {
                $("#newclient").fadeIn();
                $("#jobType").html(desc);
            }

        }
    }

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



        if(form.jobName.value == '')
        {
            alert('You must enter a value for proposal name');
            form.jobName.focus();
            return false;
        }



        if(form.cntFirstName.value == '')
        {
            alert('You must enter a value for name');
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



    function HideForms()
    {
        $("#chooseexisting").fadeIn();
        $("#choosenew").fadeIn();
        $("#newclient").fadeOut();
        $("#newclientc").fadeOut();

    }

<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">
            <h2>Create New Proposal </h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/showPOList/"><span class="btn-label icon fa fa-male"></span> List Proposals</a>
    </div>

    <div class="wizard-wrapper">
        <ul class="wizard-steps">
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">1</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" style="color: #000000;">Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">2</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">3</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" >Notes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">4</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description" >Upload &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">5</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
            <li>
                <!-- ! Remove space between elements by dropping close angle -->
                <span class="wizard-step-number">6</span> <span class="wizard-step-caption"> <a href='#'><span class="wizard-step-description">Preview &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a> </span> </li
                    >
        </ul>
    </div>
   <div class="panel-body">



     <div id="chooseexisting">
    <h3><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showCRMList">Select an Existing Client</a></h3>
    </div>
     <form id="newofrm">
     <div id="choosenew">
         <h3><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/select">Create a New  Client</a></h3>
        <!-- <h3>Create a New &nbsp;
             <select onChange="createnew(this.value, this.form);" name="cid" id="cid">
             <option value="0">Make A Selection</option>
             <option value="6">Client</option>
             <option value="9">Community/Development</option>
             <option value="8">Company</option>
             <option value="10">Government Agency</option>

                 <option value="12">Property Manager - Commercial</option>
                 <option value="13">Property Manager - Residential</option>
                 <option value="11">Sub Contractor</option>
                 <option value="18">General Contact</option>
             </select>
       -->
         </h3>
     </div>
     </form>






       <div id="newclient" style='display:none;'>

           <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/createProposalNewClient/"  name="dataform1" id="dataform1" class="panel" method="POST"
                 enctype="multipart/form-data">

               <input type="hidden" name="beenhere" value="1">
               <input type="hidden" name="cid" id="cid" value="">
               <input type="hidden"  id="cntQualified" name="cntQualified" value="1">
               <input type="hidden" id="cntAltContactName" name="cntAltContactName" value="">

               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-12">
                       <div class="form-group no-margin-hr">
                          <h3> <label class="label label-light-green"><span class="fa fa-check-circle"></span> &nbsp;Create Proposal with a New Contact - Primary Category:
                               <span id="jobType" > </span> &nbsp; &nbsp; &nbsp; &nbsp; </label></h3> <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/create/" class="btn btn-flat">Cancel</a>

                       </div>
                   </div>
               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-8">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"><span style="color:red;">*</span>Proposal Name</label>
                           <input type="text" id="jobName" name="jobName" class="form-control">
                       </div>
                   </div>
                   <div class="col-sm-1">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">NTO</label>
                           <input type="checkbox" id="jobNTO" name="jobNTO" class="form-control checkbox-inline" value ="1">
                       </div>
                   </div>

                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Permit Required</label>
                           <input type="checkbox" id="jobPermit" name="jobPermit" class="form-control checkbox-inline" value ="1">
                       </div>
                   </div>


               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Salutation</label>
                           <select name="cntSalutation" id="cntSalutation" class="form-control">
                               <option>Mr.</option>
                               <option>Mrs.</option>
                               <option>Ms.</option>
                           </select>
                       </div>
                   </div>

                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"><span style="color:red;">*</span>First Name</label>
                           <input type="text" id="cntFirstName" name="cntFirstName" class="form-control">
                       </div>
                   </div>

                   <div class="col-sm-3">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"><span style="color:red;">*</span>Last Name</label>
                           <input type="text" id="cntLastName" name="cntLastName" class="form-control">
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

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"> Primary Phone</label>
                           <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" class="form-control">
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"> Cell Phone</label>
                           <input type="text" id="cntAltPhone1" name="cntAltPhone1" class="form-control">
                       </div>
                   </div>


                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"> Fax Number</label>
                           <input type="text" id="cntAltPhone2" name="cntAltPhone2" class="form-control">
                       </div>
                   </div>


               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"><span style="color:red;">*</span>Primary Email</label>
                           <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" onChange="Javascript:checkEmail(this.value);">
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
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">City</label>
                           <input type="text" id="cntPrimaryCity" name="cntPrimaryCity" class="form-control">
                       </div>
                   </div>
                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"> State</label>
                           <select id="cntPrimaryState" name="cntPrimaryState" class="form-control">
                               <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

                           </select>
                       </div>
                   </div>

                   <div class="col-sm-4">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Zip Code</label>
                           <input type="text" id="cntPrimaryZip" name="cntPrimaryZip" class="form-control">
                       </div>
                   </div>

               </div>
               <!-- row -->
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Parcel Number</label>
                           <input type="text" id="cntParcelNumber" name="cntParcelNumber" class="form-control">
                       </div>
                   </div>
                   <div class="col-sm-6">

                   </div>

               </div>
               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-12">
                       <div class="form-group no-margin-hr">
                           <label class="control-label">Client Comments</label>
                           <textarea rows="4" cols="54" id="cntComment" name="cntComment" class="form-control"></textarea>
                       </div>
                   </div>

               </div>
               <!-- row -->



               <!-- begin row -->
               <div class="row">
                   <div class="col-sm-12">
                       <div class="form-group no-margin-hr">
                           <label class="control-label"> Upload Contact Picture</label>
                           <input type="file" name="avatar" id="avatar">
                       </div>
                   </div>


               </div>
               <!-- row -->

               <!-- buton row -->
               <div class="row">
                   <div class="col-sm-4">
                       <a href="Javascript:CHECKIT(this.dataform1);" class="btn btn-primary btn-labeled">Save and Continue</a>
                   </div>
                   <div class="col-sm-4">
                       <a href="Javascript:HideForms();" class="btn btn-primary btn-labeled">Cancel</a>
                   </div>
                   <div class="col-sm-4">
                   </div>
               </div>

        </form>
   </div>
<!-- other form -->

 <div id="newclientc" style='display:none;'>

     <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/createProposalNewClient/"  name="dataform2" id="dataform2" class="panel" method="POST"
           enctype="multipart/form-data">

     <input type="hidden" name="beenhere" value="1">
     <input type="hidden" name="cid" id="cid" value="">
     <input type="hidden"  id="cntQualified" name="cntQualified" value="1">
     <input type="hidden" name="cntSalutation" value="">
     <input type="hidden" name="cntLastName" value="">
     <input type="hidden" name="cntMiddleName" value="">
     <input type="hidden" name="cntGender" value="M">
     <input type="hidden" name="cntDateOfBirth" value="">
     <input type="hidden" name="cntDepartment" value="">
     <input type="hidden" name="cntJobTitle" value="">


     <!-- begin row -->
     <div class="row">
         <div class="col-sm-12">
             <div class="form-group no-margin-hr">
                 <h3> <label class="label label-light-green"><span class="fa fa-check-circle"></span> &nbsp;Create Proposal with a New Contact - Primary Category:
                         <span id="jobType2" > </span> &nbsp; &nbsp; &nbsp; &nbsp; </label></h3> <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/create/" class="btn btn-flat">Cancel</a>
             </div>
         </div>
     </div>
     <!-- row -->
         <!-- begin row -->
     <div class="row">
         <div class="col-sm-6">
             <div class="form-group no-margin-hr">
                 <label class="control-label"><span style="color:red;">*</span>Proposal Name</label>
                 <input type="text" id="jobName" name="jobName" class="form-control">
             </div>
         </div>
         <div class="col-sm-1">
             <div class="form-group no-margin-hr">
                 <label class="control-label">NTO</label>
                 <input type="checkbox" id="jobNTO" name="jobNTO" class="form-control checkbox-inline" value ="1">
             </div>
         </div>

         <div class="col-sm-3">
             <div class="form-group no-margin-hr">
                 <label class="control-label">Permit Required</label>
                 <input type="checkbox" id="jobPermit" name="jobPermit" class="form-control checkbox-inline" value ="1">
             </div>
         </div>
     </div>
     <!-- row -->
     <!-- begin row -->
     <div class="row">


         <div class="col-sm-5">
             <div class="form-group no-margin-hr">
                 <label class="control-label"><span style="color:red;">*</span>New Client Name</label>
                 <input type="text" id="cntFirstName" name="cntFirstName" class="form-control">
             </div>
         </div>

         <div class="col-sm-5">
             <div class="form-group no-margin-hr">
                 <label class="control-label"><span style="color:red;">*</span>Primary Contact Person</label>
                 <input type="text" id="cntAltContactName" name="cntAltContactName" class="form-control">
             </div>
         </div>

     </div>


     <!-- begin row -->
     <div class="row">

         <div class="col-sm-3">
             <div class="form-group no-margin-hr">
                 <label class="control-label"> Primary Phone</label>
                 <input type="text" id="cntPrimaryPhone" name="cntPrimaryPhone" class="form-control">
             </div>
         </div>

         <div class="col-sm-3">
             <div class="form-group no-margin-hr">
                 <label class="control-label"> Cell Phone</label>
                 <input type="text" id="cntAltPhone1" name="cntAltPhone1" class="form-control">
             </div>
         </div>


         <div class="col-sm-4">
             <div class="form-group no-margin-hr">
                 <label class="control-label"> Fax Number</label>
                 <input type="text" id="cntAltPhone2" name="cntAltPhone2" class="form-control">
             </div>
         </div>


             </div>
         <!-- row -->
         <!-- begin row -->
         <div class="row">
             <div class="col-sm-5">
                 <div class="form-group no-margin-hr">
                     <label class="control-label"><span style="color:red;">*</span>Primary Email</label>
                     <input type="text" id="cntPrimaryEmail" name="cntPrimaryEmail" class="form-control" onChange="Javascript:checkEmail(this.value);">
                 </div>
             </div>

             <div class="col-sm-5">
                 <div class="form-group no-margin-hr">
                     <label class="control-label">Alternate Email</label>
                     <input type="text" id="cntAltEmail" name="cntAltEmail" class="form-control">
                 </div>
             </div>

         </div>
         <!-- row -->


         <!-- begin row -->
         <div class="row">
             <div class="col-sm-5">
                 <div class="form-group no-margin-hr">
                     <label class="control-label"> Address Line 1</label>
                     <input type="text" id="cntPrimaryAddress1" name="cntPrimaryAddress1" class="form-control" size="45">
                 </div>
             </div>

             <div class="col-sm-5">
                 <div class="form-group no-margin-hr">
                     <label class="control-label">Address line 2</label>
                     <input type="text" id="cntPrimaryAddress2" name="cntPrimaryAddress2" class="form-control"  size="45">
                 </div>
             </div>

         </div>
         <!-- row -->
         <!-- begin row -->
         <div class="row">
             <div class="col-sm-4">
                 <div class="form-group no-margin-hr">
                     <label class="control-label">City</label>
                     <input type="text" id="cntPrimaryCity" name="cntPrimaryCity" class="form-control">
                 </div>
             </div>
             <div class="col-sm-3">
                 <div class="form-group no-margin-hr">
                     <label class="control-label"> State</label>
                     <select id="cntPrimaryState" name="cntPrimaryState" class="form-control">
                         <?php echo $_smarty_tpl->tpl_vars['states']->value;?>

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
             <div class="col-sm-6">
                 <div class="form-group no-margin-hr">
                     <label class="control-label">Parcel Number</label>
                     <input type="text" id="cntParcelNumber" name="cntParcelNumber" class="form-control">
                 </div>
             </div>
             <div class="col-sm-6">

             </div>
         </div>
         <!-- begin row -->
         <div class="row">
             <div class="col-sm-10">
                 <div class="form-group no-margin-hr">
                     <label class="control-label">Client Comments</label>
                     <textarea rows="4" cols="64" id="cntComment" name="cntComment" class="form-control"></textarea>
                 </div>
             </div>

         </div>
         <!-- row -->



         <!-- begin row -->
         <div class="row">
             <div class="col-sm-3">
                 <div class="form-group no-margin-hr">
                     <label class="control-label"> Upload Contact Picture</label>
                     <input type="file" name="avatar" id="avatar">
                 </div>
             </div>


         </div>
         <!-- row -->

         <!-- buton row -->
         <div class="row">
             <div class="col-sm-4">
                 <a href="Javascript:CHECKIT(this.dataform2);" class="btn btn-primary btn-labeled">Save and Continue</a>
             </div>
             <div class="col-sm-2">
                 <a href="Javascript:HideForms();" class="btn btn-primary btn-labeled">Cancel</a>
             </div>
         </div>

 </form>

    <!-- end if form2 -->
   </div>


        </div>
    </div>




<?php }} ?>
