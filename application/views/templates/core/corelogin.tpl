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
    <!--[if lt IE 9]>
    <script src="{$SITE_URL}assets/javascripts/ie.min.js"></script>
    <![endif]-->
    <!-- custom and overrides stylesheets -->
    <link href="{$SITE_URL}assets/stylesheets/mystyle.css" rel="stylesheet" type="text/css">


    <title>{if isset($PAGE_TITLE)}{$PAGE_TITLE}{else}Title{/if}</title>

    <link rel="shortcut icon" href="{$SITE_URL}favicon.ico">

    <script src="{$SITE_URL}assets/javascripts/jquery.min.js"></script>
    <!-- Pixel Admin's javascripts -->
    <script src="{$SITE_URL}assets/javascripts/bootstrap.min.js"></script>
    <script src="{$SITE_URL}assets/javascripts/pixel-admin.min.js"></script>

    <script type="text/javascript">

        var popupmsg = '{$msg}';

        $(document).ready(function(){
            if(popupmsg != '')
            {
                alert(popupmsg);
            }
        });

    </script>
</head>
<body   class="{$PAGE_THEME}">
<script type="text/javascript">
    var init = [];
</script>


    {include file = "core/headerlogin.tpl"}
    
	 {include file = $CONTENT_TEMPLATE}

 {include file = "core/footer.tpl"}

</body>
</html>
