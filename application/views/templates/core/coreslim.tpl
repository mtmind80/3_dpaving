<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Pixel Admin's stylesheets -->
    <link href="{$SITE_URL}assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{$SITE_URL}assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
    <link href="{$SITE_URL}assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="{$SITE_URL}assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="{$SITE_URL}assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <!-- custom and overrides stylesheets -->
    <link href="{$SITE_URL}assets/stylesheets/mystyle.css" rel="stylesheet" type="text/css">

    <script src="{$SITE_URL}assets/javascripts/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="{$SITE_URL}assets/javascripts/ie.min.js"></script>
    <![endif]-->
    <!-- Pixel Admin's javascripts TEMPLATE SPECIFIC-->
    <script src="{$SITE_URL}assets/javascripts/bootstrap.min.js"></script>
    <script src="{$SITE_URL}assets/javascripts/pixel-admin.min.js"></script>



    <title>{if isset($PAGE_TITLE)}{$PAGE_TITLE}{else}Title{/if}</title>

</head>
<body >
<div id="main-wrapper">
   {include file = $CONTENT_TEMPLATE}
</div>
</body>
</html>
