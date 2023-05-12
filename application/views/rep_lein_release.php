
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Pixel Admin's stylesheets -->
    <link href="/assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/stylesheets/jquery.ui.core.css" rel="stylesheet" type="text/css">

    <!-- custom and overrides stylesheets -->
    <link href="/assets/stylesheets/mystyle.css" rel="stylesheet" type="text/css">
    <title>3D Paving Application</title>

</head>
<body >
<div id="main-wrapper" style="font-family:Arial,Tahoma,Helvetica;">
<center>
    <img src="./assets/images/Header.jpg" width="750" height="164" alt="3D Paving" />
<h2>FINAL WAIVER AND CONDITIONAL RELEASE OF LIEN</h2>
</center>
    <br/>

    The undersigned lienor, in consideration and upon receipt of the final payment in the amount of
    <u><b>$<?php echo money_format('%i', $proposal['jobBillingAmount']);?></b></u>
    hereby waives and releases its lien, and right to claim a lien, for labor, services or materials, furnished to
    <u></u><b><?php echo $proposal['clientfirst'];?> <?php echo $proposal['clientlast'];?></b></u> on the job of  <u></u><b>(<?php echo $proposal['jobName'];?>, Work Order # <?php echo $proposal['jobMasterYear']; ?>-<?php echo $proposal['jobMasterMonth']; ?>-<?php echo str_pad($proposal['jobMasterNumber'], 5, "0", STR_PAD_LEFT); ?>)</b></u>  to the following described property:
    <br/>
    <br/><span style="text-align:center;width:600px;">
        <center>
    <?php echo $proposal['communityFirst'];?>     <?php echo $proposal['communityLast'];?>
    <br/>
        <?php echo $proposal['communityAddress1'];?>
        <?php echo $proposal['communityAddress2'];?>
    <br/><?php echo $proposal['communityCity'];?>,
        <?php echo $proposal['communityState'];?>,
        <?php echo $proposal['communityZip'];?>)
            <h3>Work Order  <?php echo $proposal['jobMasterYear']; ?>-<?php echo $proposal['jobMasterMonth']; ?>-<?php echo str_pad($proposal['jobMasterNumber'], 5, "0", STR_PAD_LEFT); ?></h3>

        </center>
        <br/>Dated on <?php echo $CurrentDate;?>
    <br/></span>
    <br/>
    3D Paving
    <br/>
    6700 NW 20TH AVE, SUITE C
    <br/>
    FT. LAUDERDALE, FL 33309
    <br/>
    <br/>
    <br/>
    By:_____________________________________________
    <br/>&nbsp;&nbsp;    Elizabeth Daly, Owner
    <br/>
    <br/>
<b>    The foregoing instrument was acknowledged before me on this  <b><?php echo date("jS \d\a\y \ \of \ F, Y", strtotime($CurrentDate));?></b> by
    <b>Elizabeth Daly</b>  of <b>3D Paving</b> who is personally known to me and who did not take an oath.
<br/>
    WITNESS my hand and official seal, this <?php echo date("jS \d\a\y \ \of \ F, Y", strtotime($CurrentDate));?>.
</b>
    <p>
        &nbsp;
    </p>
    <p>
&nbsp;
    </p>

    <br/>
    <br/>
    <br/>
    (Notary Seal) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; __________________________________________</span>
<br/>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   Notary Public Signature
    <br/>
NOTE:  This is a statutory form prescribed by Section 713.20, Florida Statutes (1996).  Effective October 1, 1996, a person may not require a lienor to furnish a waiver or release of lien that is different from the statutory form.

</div>
</body>
</html>
