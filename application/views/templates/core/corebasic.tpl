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


    <script src="{$SITE_URL}assets/javascripts/tools.js"></script>
    <script src="{$SITE_URL}assets/javascripts/validate.js"></script>
    <script src="{$SITE_URL}assets/javascripts/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="{$SITE_URL}assets/javascripts/ie.min.js"></script>
    <![endif]-->
    <!-- Pixel Admin's javascripts TEMPLATE SPECIFIC-->
    <script src="{$SITE_URL}assets/javascripts/bootstrap.min.js"></script>
    <script src="{$SITE_URL}assets/javascripts/pixel-admin.min.js"></script>


<script type="text/javascript">

   var site_url ="{$SITE_URL}";
   var popupmsg = '{$msg}';

   $(document).ready(function(){

       if(popupmsg != '')
       {
           $('#privatemessage').modal('show');
            window.setTimeout(function(){ $("#privatemessage").modal('hide'); },3000);
       }

       $('#buttonclose').click(function() {

           $('#privatemessage').modal('hide');

       });

   });


   var init = [];

</script>

</head>

<body  class="{$PAGE_THEME}">

    {include file = $CONTENT_TEMPLATE}


</body>
</html>
