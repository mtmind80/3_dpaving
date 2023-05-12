<!DOCTYPE HTML>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <style>

        @page {
            margin: 185px 40px 85px;
        }

        body {
            margin: 0px;
            font-family: Arial, Tahoma, Verdana, Helvetica;
            font-size: 16px;
        }

        #header {
            position: fixed;
            left: 0px;
            top: -170px;
            right: 0px;
            width: 100%;
            height: 170px;
            background-color: #fff;
            text-align: center;
        }

        #footer {
            position: fixed;
            left: 0px;
            bottom: -55px;
            right: 0px;
            height: 70px;
            background-color: #fff;
            text-align: center;
        }

        P.breakhere {
            page-break-after: always;
        }

        td {
            font-family: Arial, Tahoma, Verdana, Helvetica;
            font-size: 16px;
            font-weight: normal;
            color: #000;
        }

        .headerclass {
            text-align: center;
            background: #008000;
            color: #fff;

        }

        .labelclass {
            text-align: right;
            color: #fff;
            height: 12px;
            max-height: 12px;
            background: #008000;

        }

        .yellowbar {
            background: yellow;
            height: 2px;
            max-height: 2px;
        }

        .greenbar {
            background: #585657;
            height: 2px;
            max-height;
            2px;
        }

        #signature {
            font-family: 'Dancing Script', cursive;
            font-size: 21px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            line-height: 30px;
        }
    </style>
    <title>3-D Paving & Sealcoating Proposal</title>
</head>

<body>

<div id="header">

    <img src="./assets/images/Header.jpg" width="750" height="164" alt="3-D Paving & Sealcoating"/>

</div>
<div id="footer">
    <img src="./assets/images/Footer.jpg" width="750" height="90" alt="3-D Paving & Sealcoating"/>
</div>


<?php
    $st = 0;
?>
<br/><br/>
<table width="98%">
    <tr>
        <td valign='top' width='10%'>
            <img src="./assets/images/to.jpg" border="0" width='80' alt="3-D Paving & Sealcoating"/>
        </td>
        <td width='90%' align='left' valign='top'>
            <b><?php echo $proposal['clientfirst']; ?><?php echo $proposal['clientlast']; ?></b>
            <?php if ($proposal['jobPrimaryContact'] != "") {
                ?>
                <br/>ATTN:<?php echo $proposal['jobPrimaryContact']; ?>
                <?php
            }
            ?>

            <br/><?php echo $proposal['jobBillingAddress1']; ?> <br/>
            <?php if ($proposal['jobBillingAddress2'] != '') {
                echo $proposal['jobBillingAddress2'] . '<br />';
            } ?>
            <?php echo $proposal['jobBillingCity'] . ', '; ?>
            <?php echo $proposal['jobBillingState'] . '. '; ?>
            <?php echo $proposal['jobBillingZip']; ?>
            <?php if ($proposal['jobPrimaryPhone'] != '') {
                ?>
                <br/>
                OFC: <?php echo $proposal['jobPrimaryPhone']; ?>
            <?php }

                if ($proposal['jobAltPhone'] != "") {
                    ?>
                    <br/>
                    CELL: <?php echo $proposal['jobAltPhone']; ?>
                    <?php
                }
                if ($proposal['jobPrimaryEmail'] != "") {
                    ?>
                    <br/>
                    EMAIL: <a
                        href="mailto:<?php echo $proposal['jobPrimaryEmail']; ?>"><?php echo $proposal['jobPrimaryEmail']; ?></a>
                    <?php
                }
            ?>

            <br/>
            <br/>
            <b><?php echo $proposal['communityFirst']; ?></b>
            <br/>
            <?php echo $proposal['jobAddress1']; ?> <br/>
            <?php if ($proposal['jobAddress2'] != '') {
                echo $proposal['jobAddress2'] . '<br />';
            } ?>
            <?php echo $proposal['jobCity'] . ', '; ?>
            <?php echo $proposal['jobState'] . '. '; ?>
            <?php echo $proposal['jobZip']; ?>
            <br/>
            <br/>

        </td>
    </tr>
    <tr>
        <td valign='top' width='10%'>
            <img src="./assets/images/project.jpg" border="0" width='80' alt="3-D Paving & Sealcoating"/>
        </td>
        <td width='90%' align='left' valign='top'><strong><b><?php echo $proposal['jobName'] ?></b></strong>
            <br/> <br/>
        </td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td colspan='3' class='greenbar'></td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td>
            <b>LISTED SERVICES</b>
            <br/>
            <br/>
        </td>
    </tr>
    </tr>
</table>

<?php
$numrec =0;
    foreach ($proposalDetails as $p) {
$numrec++;
        ?>
        <table width="100%">
            <!-- begin row -->
            <tr>
                <td>
                    <strong><?php echo $p['jordName']; ?></strong>
                </td>
            </tr>

            <tr>
                <td>
                    <?php echo $p['jordProposalText']; ?>
                </td>
            </tr>

            <tr>
                <td align='right'>
                    $<?php echo number_format($p['jordCost'], 2); ?>
                </td>
            </tr>

            <tr>
                <td>
                    <hr noshade>
                </td>
            </tr>

        </table>
        <br/><br/>
        <?php
        $st = $st + $p['jordCost'];
    }
?>
<P CLASS="breakhere"></P>
<table>
    <tr>
        <td valign='top' width='10%'>
            <br/>
            <img src="./assets/images/project.jpg" border="0" width='80' alt="3-D Paving & Sealcoating"/>
        </td>
        <td  align='left' valign='top'>
            <br/>
            <strong><b><?php echo $proposal['jobName'] ?></b></strong>
            <br/>
            <br/>
        </td>
    </tr>
    <tr>
        <td valign='top' >
            &nbsp;
        </td>
        <td width='90%' align='left' valign='top'>
            <br/> <br/>
            THANK YOU FOR THE OPPORTUNITY TO SUBMIT THIS QUOTATION.
        </td>
    </tr>
    <tr>
        <td valign='top' width='10%'>
            &nbsp;
        </td>


        <td>
            <b>
            <span style="text-align:right;">
                        <br/>
                        <br/>
                <?php if ($proposal['jobDiscount'] > 0) {
                    $d = (($proposal['jobDiscount'] * $st) / 100);
                    echo 'Total:$ ' . number_format($st, 2) . ' <br/><br/>';
                    echo 'Discount:' . $proposal['jobDiscount'] . ' %  &nbsp; &nbsp; <span style="color:red;">(-' . number_format($d, 2) . ')</span> <br/><br/>';
                    //apply discount
                    $st = $st - $d;
                }
                ?>
                <b>
                    Grand Total: $<?php echo number_format($st, 2); ?></span><br/>
                    Presented Date: <?php echo date('F d, Y',strtotime($proposal['jobProjectDate'])); ?></b>

            </b>
            <br/>* This proposal will expire in 30 days of presented date.
            <br/>
            <br/>
            If you have any questions or concerns please feel free to contact us!
            <br/><br/>

            <img src="./media/crm/<?php echo $proposal['salesSignature']; ?>" width="100" alt="3-D Paving & Sealcoating"/>
        </td>
    </tr>
    </table>
<P CLASS="breakhere"></P>
<table>
    <tr>
        <td style="color:#000000;" >
            <h3><?php echo $proposal['jobName'] ?></h3>
            <center><b>Acceptance of proposal;</b></center>
            <br/> <br/>
            We would like to thank you for the opportunity to visit your property and the possibility to earn your
            project and business.
            We are committed to providing our customers with great service and workmanship on all of our projects. Our
            commitment to customers is why we always
            warranty our projects and stand behind our work.
            <br/>
            <br/>
            To proceed with our proposal please sign the area below and return a copy either electronically to your
            estimator on the project to our office at <a href="mailto:info@3-dpaving.com">info@3-dpaving.com</a>,
            or via fax at 954-933-1380

        <span style="color:#585657;">
         <br/>

            <br/>____________________________________________________________________________________
            <br/>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Company/Community
            <br/>
            <br/>____________________________________________________________________________________
            <br/>Address
            <br/>
            <br/>____________________________________________________________________________________
            <br/>City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;State/Province &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zip/Postal Code

            <br/>
            <br/>____________________________________________________________________________________
            <br/>Telephone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Fax
            <br/>
            <br/>____________________________________________________________________________________
            <br/>Email

                <br/><span style="color:#000;">Method of Payment</span>
            <br/>
            <br/> <img src="./assets/images/checkbox.jpg" border="0" width="20"/> Check made payable to 3-D Paving and Sealcoating enclosed for. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$_____________________


                <br/>
                <br/>________________________________________________  __________________________
                <br/>Signature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  Date


            </span>

        </td>
    </tr>
</table>

<?php
    if (count($images) > 0) {
        $nc = 0;

        ?>

        <P CLASS="breakhere"></P>
        <center>
            <table width="100%" cellpadding="6" cellspacing="6">
                <?php

                    foreach ($images as $i) {
                        $dwidth = 450;
                        $dheight = 320;

                        if (intval($i['PODocTypeSection']) == 1) {
                            $dwidth = 550;
                            $dheight = 520;

                        }
                        if ($nc >= intval($i['PODocTypeSection'])) {
                            echo '</table></center><P CLASS="breakhere"></P><center><table width="100%" cellpadding="6" cellspacing="6">';
                            $nc = 0;
                        }
                        $nc++;

                        ?>

                        <tr>
                            <td>
                                <center>
                                    <img src="./media/projects/<?php echo $i['jobmdFileName']; ?>" border="0"
                                        <?php if ($i['jobmdImageWidth'] >= $i['jobmdImageHeight']) {
                                            echo "width ='" . $dwidth . "'";
                                        } else {
                                            echo "height ='" . $dheight . "'";

                                        }
                                        ?>
                                         alt="<?php echo $i['jobmdDescription']; ?>"/>
                                    <br/>
                                    <span
                                        style="font-size:12px;width:600px;"><?php echo wordwrap($i['jobmdDescription'], 70, "<br />\n"); ?></span>
                                </center>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </center>
        <?php
    }

?>

<P CLASS="breakhere"></P>

<?php echo $TandC; ?>

</body>
</html>
