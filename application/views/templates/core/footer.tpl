</div>

<!-- / #content-wrapper -->

{assign var="from" value = 2014}

{assign var="to" value = {$smarty.now|date_format:"%Y"}}

<!--
<div class="pull-left collapse" style="margin-left: 9px;">
	<img src="{$SITE_URL}assets/images/3D_Footer.png" alt="footer-logo" width="99.5%" height="50%">
</div>
-->
<div id='copyright' style='float:right;padding-right:50px;'>copyright&copy; 3D Paving

    {for $foo=$from to $to}

    {$foo},

    {/for}

</div>

</div>







<!-- / #main-wrapper -->

<script type="text/javascript">

    init.push(function () {

        // Javascript code here

    })

    window.PixelAdmin.start(init);

</script>