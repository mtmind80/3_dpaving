

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
            font-family:Times, Arial, Verdana, Helvetica; font-size:12px;
            color:#000;
        }
        .signature_block
        {
            font-family:VarianeScript; font-size:15px;
            color:darkblue;

        }
    </style>
    <title>3D Paving Proposal</title>
</head>

<body style="font-family:Times, Arial, Verdana, Helvetica; font-size:12px;
            color:#000;">
<table width="90%">
    <tr>
        <td align='center' valign='top'>
            <img src="./assets/images/AllPaving_Logo.jpg" border="0" width='300' alt="3D Paving" />
        </td>
        </tr>
    <tr>
        <td align='center' valign='top'>
            6714 NW 20th Ave | Fort Lauderdale, FL 33309
            <br/>
            Office (954) 933-2053 | Fax (954) 933-1380
            <br/>
            <?php echo $proposal['salesfirst']; ?> <?php echo $proposal['saleslast']; ?> : 954-234-6381 | <?php echo $proposal['salesemail']; ?>
        </td>
    </tr>
</table>
<?php

$st = 0;
 echo date('F-d-Y',strtotime($CurrentDate));
;
?>
<br />



<table width="90%">
    <tr>
        <td width='8%' valign='top'>
        <b>TO:</b>
        </td>
        <td width='92%' align='left' valign='top'>
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
        <td width='8%' valign='top'>
            <b>RE:</b>
        </td>
        <td width='92%' align='left' valign='top'><b><?php echo $proposal['jobName']?></b>
        </td>
    </tr>

  </table>
<table width='98%'>
    <tr>
    <td width="45%"><hr></td>
    <td  width="10%" align='center'><h3>PROPOSAL</h3></td>
    <td width="45%"><hr></td>
    </tr>
</table>

<table width="90%">
    <tr>
        <td colspan='3'>
        3D Paving PROPOSES TO FURNISH ALL LABOR, MATERIALS & EQUIPMENT
        TO PERFORM THE FOLLOWING (IN PROCEDURAL ORDER):
        </td>
    </tr>
    <tr>
        <td width='30%'>
        &nbsp;
        </td>
        <td width='60%'>
            &nbsp;
        </td>
        <td width='10%'>
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
    <td>$
        <?php echo number_format($p['jordCost'],2); ?>
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

<table width="90%">
    <tr>
        <td align='center' valign='top'>
            <img src="./assets/images/AllPaving_Logo.jpg" border="0"  width='300' alt="3D Paving" />
        </td>
    </tr>
    <tr>
        <td align='center' valign='top'>
            6714 NW 20th Ave | Fort Lauderdale, FL 33309
            <br/>
            Office (954) 933-2053 | Fax (954) 933-1380
            <br/>
            <?php echo $proposal['salesfirst']; ?> <?php echo $proposal['saleslast']; ?> : 954-234-6381 | <?php echo $proposal['salesemail']; ?>
        </td>
    </tr>
</table>


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
    <table width="90%">
        <tr>
            <td align='center' valign='top'>
                <img src="./assets/images/AllPaving_Logo.jpg" border="0" width='300' alt="3D Paving" />
            </td>
        </tr>
        <tr>
            <td align='center' valign='top'>
                6714 NW 20th Ave | Fort Lauderdale, FL 33309
                <br/>
                Office (954) 933-2053 | Fax (954) 933-1380
                <br/>
                <?php echo $proposal['salesfirst']; ?> <?php echo $proposal['saleslast']; ?> : 954-234-6381 | <?php echo $proposal['salesemail']; ?>
            </td>
        </tr>
    </table>

    <table width="90%">
    <tr>
        <td>
            <?php echo $TandC; ?>
        </td>
    </tr>
</table>

</center>

</body>
</html>
