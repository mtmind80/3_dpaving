<?php /* Smarty version Smarty-3.1.21-dev, created on 2021-01-29 14:18:24
         compiled from "application/views/templates/projects/proposalText.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1205892949601419306e8e93-65754831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe7cde138452887e2197d99dd35ee58b1e8d7d2e' => 
    array (
      0 => 'application/views/templates/projects/proposalText.tpl',
      1 => 1497341011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1205892949601419306e8e93-65754831',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'id' => 0,
    'proposal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_601419307c3734_46987958',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_601419307c3734_46987958')) {function content_601419307c3734_46987958($_smarty_tpl) {?><?php echo '<script'; ?>
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
        HideControls();

    }

    function test(form)
    {


        var q = tinyMCE.get('jordProposalText').getContent();
        tinyMCE.triggerSave();

        return true;

    }
<?php echo '</script'; ?>
>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit Proposal Text</h2>
    </div>
    <div class="body">

        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
workorders/savePOText/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"  name="dataform" id="dataform"  method="POST">


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Proposal Text</label>
                        <textarea rows="3" id="jordProposalText" name="jordProposalText" class="myTextEditor"><?php echo $_smarty_tpl->tpl_vars['proposal']->value['jordProposalText'];?>
</textarea>
                    </div>
                </div>
            </div>
            <!-- row -->


            <!-- buton row -->
            <div class="row">
                <div class="col-sm-6">
                    <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
                </div>
                <div class="col-sm-6">
                    <a href="Javascript:HideControls();" class="btn btn-primary btn-labeled">Cancel</a>
                </div>
            </div>
        </form>
        </div>
        </div>




<?php }} ?>
