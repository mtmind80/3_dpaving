<!DOCTYPE HTML>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Pixel Admin's stylesheets -->
    <link href="{$SITE_URL}assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{$SITE_URL}assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
    <link href="{$SITE_URL}assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="{$SITE_URL}assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="{$SITE_URL}assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
    <link href="{$SITE_URL}assets/stylesheets/jquery.ui.core.css" rel="stylesheet" type="text/css">

    <!-- custom and overrides stylesheets -->
    <link href="{$SITE_URL}assets/stylesheets/mystyle.css" rel="stylesheet" type="text/css">

    <title>{if isset($PAGE_TITLE)}{$PAGE_TITLE}{else}Title{/if}</title>


    <link rel="shortcut icon" href="{$SITE_URL}favicon.ico" type="image/x-icon">
    <link rel="icon" href="{$SITE_URL}favicon.ico" type="image/x-icon">





    <script src="{$SITE_URL}assets/javascripts/jquery.min.js"></script>
    <script src="{$SITE_URL}assets/javascripts/tools.js"></script>
    <script src="{$SITE_URL}assets/javascripts/validate.js"></script>
    <!--[if lt IE 9]>
    <script src="{$SITE_URL}assets/javascripts/ie.min.js"></script>
    <![endif]-->
    <!-- Pixel Admin's javascripts TEMPLATE SPECIFIC-->
    <script src="{$SITE_URL}assets/javascripts/bootstrap.min.js"></script>
    <script src="{$SITE_URL}assets/javascripts/pixel-admin.min.js"></script>
    <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
    <script>
	  tinymce.init({
		selector: '#tinyMCETextarea',
		height : "150"
	  });
    </script>



<script type="text/javascript">

   var site_url ="{$SITE_URL}";
   var popupmsg = '{$msg}';

   var current_date ='{$CurrentDate}';

   var messages = {$messagecount};

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

       {literal}
       HideControls();
       $.post( site_url + action + "/", { id: id , username: label})
               .done(function( data ) {
                   $('#DocManageLabel').html(label);
                   $('#ManagedContent').html(data);
                   $("#DocManage").css({left:mouseX,top:mouseY });
                   $('#DocManage').show();
               });
       {/literal}

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

</script>

</head>

<body  class="{$PAGE_THEME}">
<script type="text/javascript">
        var init = [];
</script>
    {include file = "core/header.tpl"}

    {include file = $CONTENT_TEMPLATE}

    {include file = "core/footer.tpl"}
<!-- message div
-->
<div id="privatemessage" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title" id="myModalLabel"><img src="{$SITE_URL}/images/ex.gif" border="0" alt="information" width="40" VALIGN='top'> &nbsp; Information Message</h4>
            </div>
            <div class="modal-body">
                <div id="msg">
                {$msg}
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
        <img src="{$SITE_URL}assets/images/ajax-loader1.gif" alt="Loading..."/>
        <h2 id='spinmessage'>Please wait....</h2>
    </div>
</div>

</body>
</html>
