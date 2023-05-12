

<!DOCTYPE HTML>
<html lang="en">
<head>
    <style>
.toga
{
    background:#FFFFFF;
    border:solid 1px #000000;

}

        td{
            font-family:Tahoma, Verdana, Helvetica; font-size:14px;
            color:#000;
        }
        .signature_block
        {
            font-family:VarianeScript; font-size:15px;
            color:darkblue;

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


        .tc
        {
            font-family:Tahoma, Verdana, Helvetica;
            font-size:10px;
            color:#000;

        }
    </style>
    <title>3D Paving Proposal</title>
</head>

<body style="font-family:Times, Arial, Verdana, Helvetica; font-size:12px;
            color:#000;">
<?php echo $repheader; ?>
<?php
$st = 0;
?>
<br />

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
    </tr>
    <tr>
        <td class='yellowbar'>
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
        <td class='greenbar'></td>
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

 <tr class='toga'>
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


<p style='page-break-after: always;'>
    &nbsp;
<p />
<?php echo $repheader; ?>


<table width="90%">
    <tr>
        <td colspan='3'>
            <h3><?php echo $proposal['jobName']?></h3>
            THANK YOU FOR THE OPPORTUNITY TO SUBMIT THIS QUOTATION.
            <br /><br />
        </td>
    </tr>
    <tr style="font-size:18px;">
        <td>
           <b>Total</b>
        </td>
        <td>
            &nbsp;
        </td>
        <td><b>
            $<?php echo number_format($st, 2); ?></b>
        </td>
    </tr>
    <tr>
        <td colspan='3'>
<br />
            NOTE: INITIAL EACH PAGE, SIGN BELOW AND RETURN BY FAX TO THIS OFFICE. NO WORK WILL BE SCHEDULED UNTIL THIS WRITTEN AUTHORIZATION IS RECEIVED.

<br />
<br />
<br />
<br />Customers authorized signature: __________________________________________
<br />
&nbsp; &nbsp;
<br />
&nbsp; &nbsp;
<br />Date of acceptance: _________________________
            <br />
            <br />



            <i>Note: This proposal may be withdrawn by us if not accepted in thirty (30) days</i>
           <div class="signature_block">

            <?php echo $proposal['salesfirst']?>
            <?php echo $proposal['saleslast']?>
       </div>
        </td>
    </tr>
</table>

<p style='page-break-after: always;'>
    &nbsp;
<p />


<center>
    <?php echo $repheader; ?>
    <table width="90%">
    <tr>
        <td>
            <?php echo $TandC; ?>
        </td>
    </tr>
</table>

</center>

<div style="position: fixed;bottom: 80px; left: 0px; ">
    <img src="./assets/images/foot6.jpg" border="0"  width="700" alt="3D Paving" />
</div>
</body>
</html>
