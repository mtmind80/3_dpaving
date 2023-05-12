<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-10 18:28:07
         compiled from "application/views/templates/resources/servicesEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1219532683573dd007f2d930-53798599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba3051194bf2ee303d7e819a1bf1303eb4785597' => 
    array (
      0 => 'application/views/templates/resources/servicesEdit.tpl',
      1 => 1465508955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1219532683573dd007f2d930-53798599',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_573dd008017010_25074129',
  'variables' => 
  array (
    'SITE_URL' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573dd008017010_25074129')) {function content_573dd008017010_25074129($_smarty_tpl) {?><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/tiny_mce/tiny_mce.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">


    //when document ready add totals
    $(document).ready(function(){



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
            'width' : 400,
            'height': 340
        });



    });


        function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
    }

    function test(form)
    {


        var q = tinyMCE.get('cmpProposalText').getContent();
        tinyMCE.triggerSave();

        if(form.cmpServiceName.value == '')
        {
            alert('You must enter a value for service name');
            form.cmpServiceName.focus();
            return false;
        }

        if(form.cmpServiceDefaultRate.value != parseFloat(form.cmpServiceDefaultRate.value))
        {
            alert('You must enter a number for equipment cost');
            form.cmpServiceDefaultRate.value = 0;
            form.cmpServiceDefaultRate.focus();
            return false;
        }

        if(form.cmpServicePreferredRate.value != parseFloat(form.cmpServicePreferredRate.value))
        {
            alert('You must enter a number for equipment minimum cost');
            form.cmpServicePreferredRate.value = 0;
            form.cmpServicePreferredRate.focus();
            return false;
        }
        return true;

    }
    /*
     cmpServiceID 	cmpServiceCat 	cmpServiceName 	cmpServiceDesc 	cmpServiceCreatedby
     cmpServiceDefaultRate 	cmpServicePreferredRate 	cmpServiceOption 	cmpServiceUpdatedby 	cmpServiceLastUpdate

     */
<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit Service</h2>
        <a class="topbut btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/serviceList/"><span class="btn-label icon fa fa-shield"></span> List All Services</a>

        <!-- vehicleID,vehicleName,vehicleDescription,vehiclePurchaseDate,vehicleVinNumber,vehicleCreatedBy,vehicleActive,vehicleLocation,vehicleTypeID -->
    </div>
    <div class="panel-body">


        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/saveService/<?php echo $_smarty_tpl->tpl_vars['data']->value['cmpServiceID'];?>
"  name="dataform" id="dataform" class="panel" method="POST">
            <input type='hidden' name='cmpServiceID' value='<?php echo $_smarty_tpl->tpl_vars['data']->value['cmpServiceID'];?>
'>
            <input type='hidden' name="cmpServiceCat" id="cmpServiceCat" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cmpServiceCat'];?>
">

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Service Category:</label>
<?php echo $_smarty_tpl->tpl_vars['data']->value['cmpServiceCat'];?>
 - <?php echo $_smarty_tpl->tpl_vars['data']->value['cmpServiceCat'];?>


                                            </div>
                </div>
            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Service Name</label>
                        <input type="text" id="cmpServiceName" name="cmpServiceName" class="form-control" value='<?php echo $_smarty_tpl->tpl_vars['data']->value['cmpServiceName'];?>
'>
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Proposal Text</label>
                        <textarea rows="3" id="cmpProposalText" name="cmpProposalText" class="myTextEditor"><?php echo $_smarty_tpl->tpl_vars['data']->value['cmpProposalText'];?>
</textarea>
                    </div>
                </div>
            </div>
            <!-- row -->


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Work Order Text</label>
                        <textarea rows="3" id="cmpProposalTextAlt" name="cmpProposalTextAlt" class="myTextEditor"><?php echo $_smarty_tpl->tpl_vars['data']->value['cmpProposalTextAlt'];?>
</textarea>
                    </div>
                </div>
            </div>
            <!-- row -->

            <!-- begin row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Work Order Text <i>(SPANISH)</i></label>
                        <textarea rows="3" id="cmpProposalTextAltES" name="cmpProposalTextAltES" class="myTextEditor"><?php echo $_smarty_tpl->tpl_vars['data']->value['cmpProposalTextAltES'];?>
</textarea>
                    </div>
                </div>
            </div>
            <!-- row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Default Minimum</label>

                        <input type="text" id="cmpServiceDefaultRate" name="cmpServiceDefaultRate" class="form-control"  value='<?php echo $_smarty_tpl->tpl_vars['data']->value['cmpServiceDefaultRate'];?>
'>

                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Preferred Minimum</label>

                        <input type="text" id="cmpServicePreferredRate" name="cmpServicePreferredRate" class="form-control"  value='<?php echo $_smarty_tpl->tpl_vars['data']->value['cmpServicePreferredRate'];?>
'>

                    </div>
                </div>

            </div>

            <!-- row -->

            <!-- buton row -->
            <div class="row">
                <div class="col-sm-2">
                    <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Edit Service</a>
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
resources/equipmentList/" class="btn btn-primary btn-labeled">Cancel</a>
                </div>
            </div>
        </form>
        </div>
        </div>




<?php }} ?>
