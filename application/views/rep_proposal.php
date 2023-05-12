

<!DOCTYPE HTML>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <style>
        @page { margin: 185px 40px 85px; }
        body { margin: 0px; }
        #header { position: fixed; left: 0px; top: -170px; right: 0px; height: 170px; background-color: #fff; text-align: center; }
        #footer { position: fixed; left: 0px; bottom: -55px; right: 0px; height: 70px; background-color: #fff;  text-align: center;}

        p {page-break-after: always;}

        td{
            font-family:Tahoma, Verdana, Helvetica; font-size:14px;
            font-weight: normal;
            color:#000;
        }

        .headerclass
        {
            text-align:center;
            background:#008000;
            color:#fff;

        }
        .labelclass
        {
            text-align:right;
            color:#fff;
            height:12px;
            max-height:12px;
            background:#008000;

        }

        .yellowbar
        {
            background:yellow;
            height:2px;
            max-height:2px;
        }

        .greenbar
        {
            background:#008000;
            height:2px;
            max-height;2px;
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
    <title>3D Paving Proposal</title>
</head>

<body>

<div id="header">

    <img src="./assets/images/AllPavingLogoNew.jpg" border="0" width='700' height='153' alt="3D Paving" />

</div>
<div id="footer">
    <img src="./assets/images/foot6.jpg" border="0" width="700" alt="3D Paving" />
</div>


<?php
$st = 0;
?>
<br /><br />
<table width="98%">
    <tr>
        <td valign='top' width='10%'  >
            <img src="./assets/images/to.jpg" border="0"  alt="3D Paving" />
        </td>
        <td  width='90%' align='left' valign='top'>
            <?php echo $proposal['clientfirst']; ?> <?php echo $proposal['clientlast']; ?>
            <br />ATTN:<?php echo $proposal['jobPrimaryContact'];?>
            <br /><?php echo $proposal['jobAddress1'];?>
            <?php if($proposal['jobAddress2'] != '') {echo $proposal['jobAddress2'].'<br />';}?>
            <?php echo $proposal['jobCity'].', ';?>
            <?php echo $proposal['jobState'].'. ';?>
            <?php echo $proposal['jobZip'];?>
            <br />
            Email: <?php echo $proposal['jobPrimaryEmail'];?>
            <?php
            if($proposal['jobParcel'] != 0 )
            {

                echo '<br />Parcel Number:' . $proposal['jobParcel'];
            }
            ?>
            <br/>
            <br/>
        </td>
    </tr>
    <tr>
        <td valign='top' width='10%' >
            <img src="./assets/images/project.jpg" border="0"  alt="3D Paving" />
        </td>
        <td  width='90%' align='left' valign='top'><b><?php echo $proposal['jobName']?></b>
            <br/>         <br/>
        </td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td colspan='3' class='greenbar'></td>
    </tr>
</table>
<br />
<table width="100%">
        <tr>
            <td >
                <b>LISTED SERVICES</b>
            </td>
        </tr>
        <tr>
        <td >
               &nbsp;
        </td>
        </tr>

        <?php

        foreach($proposalDetails as $p)
        {
            ?>

            <!-- begin row -->
            <tr>
                <td >
                    <strong><?php echo $p['jordName']; ?></strong>
                </td>
            </tr>

            <tr>
                <td >
                    <?php echo $p['jordProposalText']; ?>
                </td>
            </tr>

            <tr>
                <td align='right'>
                    $<?php echo number_format($p['jordCost'],2); ?>
                </td>
            </tr>

            <tr>
                <td>
                    <hr noshade>
                </td>
            </tr>


            <?php
            $st = $st + $p['jordCost'];
        }
        ?>

    <tr>
        <td >
<p></p>
            <h3><?php echo $proposal['jobName']?></h3>
        </td>
    </tr>
    <tr>
        <td >

            THANK YOU FOR THE OPPORTUNITY TO SUBMIT THIS QUOTATION.
            <br /><br />
        </td>
    </tr>
    <tr style="font-size:18px;">
        <td>
            <b>
            <span style="text-align:right;">
                <?php if($proposal['jobDiscount'] > 0 )
                {   $d = (($proposal['jobDiscount'] * $st)/100);
                    echo 'Total:$ ' .number_format($st, 2) .' <br/>';
                    echo 'Discount:' . $proposal['jobDiscount'] .' %  &nbsp; &nbsp; <span style="color:red;">(-'.number_format($d, 2).')</span> <br/>';
                    //apply discount
                    $st = $st - $d;
                }
                ?>
                Grand Total: $<?php echo number_format($st, 2); ?></span></b>
        </td>
    </tr>
    <tr>

            <td  style="color:#008000;">
            <br />
            <br />
            <br />____________________________________________________________________________________
            <br />Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Company/Community
            <br />
            <br />____________________________________________________________________________________
            <br />Address
            <br />
            <br />____________________________________________________________________________________
            <br />City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;State/Province &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zip/Postal Code

            <br />
            <br />____________________________________________________________________________________
            <br />Telephone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Fax
            <br />
            <br />____________________________________________________________________________________
            <br />Email
                <br />
                <br />

                <br /><span style="color:#000;">Method of Payment</span>
            <br />
            <br /> <img src="./assets/images/checkbox.jpg" border="0" width="20"  /> Check made payable to 3D Paving enclosed for. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$_____________________

                <br />
                <br />________________________________________________  __________________________
                <br />Signature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Date

                <br/>
                <br/>
                <i>Note: This proposal may be withdrawn by us if not accepted in thirty (30) days</i>
            <br />
                <span class="signature" id="signature">
                <?php echo $proposal['salesfirst']?>
                <?php echo $proposal['saleslast']?>
                    </span>

        </td>
    </tr>
</table>
<p></p>
<?php echo $TandC; ?>

</body>
</html>
