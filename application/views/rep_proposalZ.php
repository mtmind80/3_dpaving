

<!DOCTYPE HTML>
<html lang="en">
<head>
    <style>

        #header { position: fixed; left: 0px; top: 0px; right: 0px; height: 150px; background-color: #fff; text-align: center; }
        #footer { position: fixed; left: 0px; top: 800px; right: 0px; height: 100px; background-color: #fff; text-align: center; page-break-after: always;}

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

<body style="font-family:Times, Arial, Verdana, Helvetica; font-size:10px;
            color:#000;">

<div id="header">
    <?php echo $repheader; ?>
</div>



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
    </table>
    <table width="90%">
    <tr>
        <td>
            <?php echo $TandC; ?>
        </td>
    </tr>
</table>

<div id="footer">
    <img src="./assets/images/Foot6.jpg" border="0" width='800' alt="3D Paving" />
</div>

</body>
</html>
