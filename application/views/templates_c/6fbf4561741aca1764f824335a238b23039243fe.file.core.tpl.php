<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-18 18:53:15
         compiled from "application/views/templates/core/core.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67228696658800dfbbbdb21-81666669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fbf4561741aca1764f824335a238b23039243fe' => 
    array (
      0 => 'application/views/templates/core/core.tpl',
      1 => 1479246486,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67228696658800dfbbbdb21-81666669',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'PAGE_TITLE' => 0,
    'msg' => 0,
    'CurrentDate' => 0,
    'messagecount' => 0,
    'PAGE_THEME' => 0,
    'CONTENT_TEMPLATE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58800dfbc291f5_24626568',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58800dfbc291f5_24626568')) {function content_58800dfbc291f5_24626568($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Pixel Admin's stylesheets -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/jquery.ui.core.css" rel="stylesheet" type="text/css">

    <!-- custom and overrides stylesheets -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/stylesheets/mystyle.css" rel="stylesheet" type="text/css">

    <title><?php if (isset($_smarty_tpl->tpl_vars['PAGE_TITLE']->value)) {
echo $_smarty_tpl->tpl_vars['PAGE_TITLE']->value;
} else { ?>Title<?php }?></title>


    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
favicon.ico" type="image/x-icon">





    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/tools.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/validate.js"><?php echo '</script'; ?>
>
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/ie.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <!-- Pixel Admin's javascripts TEMPLATE SPECIFIC-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/javascripts/pixel-admin.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src='//cdn.tinymce.com/4/tinymce.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
	  tinymce.init({
		selector: '#tinyMCETextarea',
		height : "150"
	  });
    <?php echo '</script'; ?>
>



<?php echo '<script'; ?>
 type="text/javascript">

   var site_url ="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
";
   var popupmsg = '<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
';

   var current_date ='<?php echo $_smarty_tpl->tpl_vars['CurrentDate']->value;?>
';

   var messages = <?php echo $_smarty_tpl->tpl_vars['messagecount']->value;?>
;

   $(document).ready(function(){

       if(messages)
        {
        $.growl.error({ title: "Check Your Inbox", message: "You have new messages to review!"});
        }

       if(popupmsg != '')
       {
           $('#privatemessage').modal('show');
            window.setTimeout(function(){ $("#privatemessage").modal('hide'); },1500);
       }

       $('#buttonclose').click(function() {

           $('#privatemessage').modal('hide');

       });
       $('#easteregg').click(function() {
           $("#msg").html('Easter Egg!<br>You Found the hidden secret.');
           $('#privatemessage').modal('show');
           HideControls();
           setTimeout(function(){
               $('#privatemessage').modal('hide');
           }, 3000);

       });


   });

   function ShowTools(label, id, action)
   {

       
       HideControls();
       $.post( site_url + action + "/", { id: id , username: label})
               .done(function( data ) {
                   $('#DocManageLabel').html(label);
                   $('#ManagedContent').html(data);
                   $("#DocManage").css({left:mouseX,top:mouseY });
                   $('#DocManage').show();
               });
       

   }

   function HideControls() {
       $('#DocManage').hide();
   }


   function showSpinner(msg)
   {
       $("#spinmessage").html(msg);
       $("#loading-div-background").show();

   }
   function hideSpinner()
   {
       $("#loading-div-background").hide();

   }

   var mouseX;
   var mouseY;
   $(document).mousedown( function(e) {
       mouseX = e.pageX - 430;
       mouseY = e.pageY -30;




   });

<?php echo '</script'; ?>
>

</head>

<body  class="<?php echo $_smarty_tpl->tpl_vars['PAGE_THEME']->value;?>
">
<?php echo '<script'; ?>
 type="text/javascript">
        var init = [];
<?php echo '</script'; ?>
>
    <?php echo $_smarty_tpl->getSubTemplate ("core/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['CONTENT_TEMPLATE']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php echo $_smarty_tpl->getSubTemplate ("core/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- message div
-->
<div id="privatemessage" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title" id="myModalLabel"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/images/ex.gif" border="0" alt="information" width="40" VALIGN='top'> &nbsp; Information Message</h4>
            </div>
            <div class="modal-body">
                <div id="msg">
                <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- docmanage content popup -->


<div id="DocManage" draggable="true" tabindex="-1" role="dialog" style="display: none; position:absolute; overflow:hidden; padding:12px;">
<!--
<div id="DocManage" draggable="true" class="dialog" tabindex="-1" role="dialog" style="display: none; position:absolute; overflow:hidden; padding:12px;">
-->
        <div class="modal-content"  style="width:440px;">
            <div class="modal-header" style="width:440px;color:#ffffff;background:#0070a3; padding:6px;">
                <button type="button" class="close" onClick="javascript:HideControls();" aria-hidden="true" ><span style='font-size:1.6EM;vertical-align: middle;text-align: center;'>X</span></button>
                <span class="modal-title" id="DocManageLabel" style='font-size:1.25EM;text-shadow:#000000 0 1px 0;'>Information Message</span>
            </div>
            <div class="modal-body" id="ManagedContent" style='background:#e4e4e4;padding-top:0px;font-size:1EM;'>
               Content Here

            </div>
            <div style="opacity: 0.0;"><a id="easteregg" href="#">Easter Egg</a></div>
        </div>

</div>

<!-- end content popup -->

<div style="opacity: 0.8; display: none;" id="loading-div-background">
    <div id="loading-div" class="ui-corner-all" >
        <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
assets/images/ajax-loader1.gif" alt="Loading..."/>
        <h2 id='spinmessage'>Please wait....</h2>
    </div>
</div>

</body>
</html>
<?php }} ?>
