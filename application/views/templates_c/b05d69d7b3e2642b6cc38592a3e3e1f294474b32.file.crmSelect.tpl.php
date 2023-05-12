<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-10 14:32:44
         compiled from "application/views/templates/crm/crmSelect.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1482042615573c88e2434007-38475626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b05d69d7b3e2642b6cc38592a3e3e1f294474b32' => 
    array (
      0 => 'application/views/templates/crm/crmSelect.tpl',
      1 => 1465508944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1482042615573c88e2434007-38475626',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573c88e2469c31_83092147',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'cidname' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573c88e2469c31_83092147')) {function content_573c88e2469c31_83092147($_smarty_tpl) {?><!--
14 	HOA - Board Member
12 	Property Manager - Commercial
17 	Property Owner - Commercial
16 	Property Owner - Residential
15 	COA - Board Member
13 	Property Manager - Residential
7 	Property Management Company
-->

<?php echo '<script'; ?>
 type="text/javascript">

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
<?php echo '</script'; ?>
>

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
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/startContact/"  name="dataform" id="dataform" class="panel" method="POST">
            <input type="hidden" name="beenhere" value="1">        <input type="hidden" name="usewizard" id="usewizard" value="0">


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">

                        <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cidname']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['c']->value['ccatWizard']==0) {?>
                                <label class="control-label"> <?php echo $_smarty_tpl->tpl_vars['c']->value['ccatName'];?>
</label>
                                <input type="radio" id="cntcid" data-usewizard="<?php echo $_smarty_tpl->tpl_vars['c']->value['ccatWizard'];?>
"  data-catdesc="<?php echo $_smarty_tpl->tpl_vars['c']->value['ccatDescription'];?>
"  data-catname="<?php echo $_smarty_tpl->tpl_vars['c']->value['ccatName'];?>
" name="cntcid" class="form-control-sm" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['ccatId'];?>
" >
                                <br/>
                            <?php }?>
                        <?php } ?>
                        <br/>

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                       <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cidname']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['c']->value['ccatWizard']==1) {?>
                                <label class="control-label"> <?php echo $_smarty_tpl->tpl_vars['c']->value['ccatName'];?>
</label>
                                <input type="radio" id="cntcid" data-usewizard="<?php echo $_smarty_tpl->tpl_vars['c']->value['ccatWizard'];?>
"  data-catdesc="<?php echo $_smarty_tpl->tpl_vars['c']->value['ccatDescription'];?>
" data-catname="<?php echo $_smarty_tpl->tpl_vars['c']->value['ccatName'];?>
" name="cntcid" class="form-control-sm" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['ccatId'];?>
" >
                                <br/>
                            <?php }?>
                        <?php } ?>

                        <div>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
crm/showList/1" class="btn btn-flat btn-labeled">Cancel</a> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="Javascript:CHECKIT(this.dataform);"> NEXT <span class="btn-label icon fa fa-arrow-right"></span></a>
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




<?php }} ?>
