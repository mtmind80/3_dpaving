

<!DOCTYPE HTML>
<html lang="en">
<head>
    <style>

        @page
        {
            size: auto;   /* auto is the initial value */
            margin: 25mm 25mm 25mm 25mm;
            page-break-after:always;

        }

        #header { position: fixed; left: 0px; top: -80px; right: 0px; width: 100%; background-color: #fff; text-align: center; }
        #container {
            padding-top:50px;
        }

        td{
            font-family:Tahoma, Verdana, Helvetica; font-size:14px;
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


    </style>
    <title>3D Paving Proposal</title>
</head>

<body>
<div id="header">
    <?php echo $repheader; ?>
</div>

<?php
$st = 0;
?>
<br />
<div id="container">
<table width="90%">
    <tr>
        <td width='10%' class='labelclass' >
            <b>TO:</b>
        </td>
        <td rowspan='3' width='90%' align='left' valign='top'>
            <?php echo $proposal['clientfirst']; ?> <?php echo $proposal['clientlast']; ?>
            <br />ATTN:<?php echo $proposal['jobPrimaryContact'];?>
            <?php echo $proposal['jobAddress1'];?> &nbsp;
            <?php echo $proposal['jobAddress2'];?><br />
            <?php echo $proposal['jobCity'];?>, &nbsp;
            <?php echo $proposal['jobState'];?>. &nbsp;
            <?php echo $proposal['jobZip'];?>
            <br />
            Email: <?php echo $proposal['jobPrimaryEmail'];?>
            <?php
            if($proposal['jobParcel'] != '')
            {

                echo '<br />Parcel Number:' . $proposal['jobParcel'];
            }
            ?>
        </td>
    </tr>
    <tr>
        <td class='yellowbar' style="background:yellow;
            height:2px;
            max-height:2px;">
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;

        </td>
    </tr>
    <tr>
        <td width='10%' class='labelclass'>
            <b>PROJECT:</b>
        </td>
        <td rowspan='3' width='90%' align='left' valign='top'><b><?php echo $proposal['jobName']?></b>
        </td>
    </tr>
    <tr>
        <td class='yellowbar' >
        </td>
    </tr>
    <tr>
        <td align='center' valign='top' >
            &nbsp;
        </td>
    </tr>

    </table>

    <table width="90%">
        <tr>
            <td colspan='3'>
                <b>LISTED SERVICES</b>
            </td>
        </tr>
        <tr>
            <td width='30%'>
                &nbsp;
            </td>
            <td width='58%'>
                &nbsp;
            </td>
            <td width='12%'>
                &nbsp;
            </td>
        </tr>

        <?php

        foreach($proposalDetails as $p)
        {
            ?>

            <!-- begin row -->
            <tr>
                <td colspan='3'>
                    <?php echo $p['jordName']; ?>
                </td>
            </tr>

            <tr>
                <td>
                    &nbsp;
                </td>
                <td>
                    <?php echo $p['jordProposalText']; ?>
                </td>
                <td>
                    &nbsp;
                </td>
            </tr>

            <tr>
                <td>
                    &nbsp;
                </td>
                <td>
                    &nbsp;
                </td>
                <td>$<?php echo number_format($p['jordCost'],2); ?>
                </td>
            </tr>

            <tr>
                <td colspan='3'>
                    <hr noshade>
                </td>
            </tr>

            <?php
            $st = $st + $p['jordCost'];
        }
        ?>

        <tr>
            <td>
                Total
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                $<?php echo number_format($st, 2); ?>
            </td>
        </tr>
    </table>

</div>
</body>
</html>
