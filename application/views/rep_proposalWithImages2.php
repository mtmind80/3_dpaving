<!DOCTYPE HTML>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <style>

        @page { margin: 185px 40px 85px;text-align:right }
        body { margin: 0px; font-family:Arial, Tahoma, Verdana, Helvetica; font-size:16px;}
        #header { position: fixed; left: 0px; top: -170px; right: 0px; width: 100%; height: 170px; background-color: #fff; text-align: center; }
        #footer { position: fixed; left: 0px; bottom: -55px; right: 0px; height: 70px; background-color: #fff;  font-size:12px; text-align: right;}

        P.breakhere {page-break-after: always;}

        td{
            font-family:Arial, Tahoma, Verdana, Helvetica; font-size:16px;
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

        .flyleaf {
            page-break-after: always;
        }

    </style>
    <title>3-D Paving Proposal</title>
</head>

<body>



<?php
$st = 0;
$ns = 0;
?>

<div style="font-family:Arial, Tahoma, Verdana, Helvetica;font-size:12px;z-index: 2;padding-top:-120px;margin:auto;text-align: center;align-content: center " >
    <img src="./assets/images/3d-Paving-Logo.jpg" width="380" alt="3-D Paving" /><br/>
    <?php echo $WEB_CONFIG['compAddress'] . '  ' . $WEB_CONFIG['webPhone']; ?>
<hr>
</div>
<br/><br/>
<table width="98%">
<tr>
    <td align='center' valign='top'>
        <font style="font-size:45px;text-align:center;"><b>Proposal</b></font>
        <br/>
        <br/>
        <br/>
    </td>
</tr>
    <tr>
        <td  align='center' valign='top'><font style="font-size:30px;"><b><?php echo $proposal['jobName']?></b></font>
            <br/>
            <br/>
            <font style="font-size:20px;">
            <b><?php echo $proposal['communityFirst'];?></b></font>
            <br/>
            <?php echo $proposal['jobAddress1'];?> <br/>
            <?php if($proposal['jobAddress2'] != '') {echo $proposal['jobAddress2'].'<br />';}?>
            <?php echo $proposal['jobCity'].', ';?>
            <?php echo $proposal['jobState'].'. ';?>
            <?php echo $proposal['jobZip'];?>
</font>
            <br/>
            <br/>
            <br/>

        </td>

    </tr>
    <tr>
        <td  align='center' valign='top'><br/><font style="font-size:30px;"><b>Prepared For</b></font>

        </td>

    </tr>
    <tr>
        <td align='center' valign='top'>
            <br/>
            <font style="font-size:25px;"><b><?php echo $proposal['clientfirst']; ?> <?php echo $proposal['clientlast']; ?></b></font>
            <font style="font-size:18px;">
                <?php if ($proposal['jobPrimaryContact'] != "")
            {
            ?>
            <br />ATTN:<?php echo $proposal['jobPrimaryContact'];?>
            <?php
            }
            ?>

            <br /><?php echo $proposal['jobBillingAddress1'];?> <br/>
            <?php if($proposal['jobBillingAddress2'] != '') {echo $proposal['jobBillingAddress2'].'<br />';}?>
            <?php echo $proposal['jobBillingCity'].', ';?>
            <?php echo $proposal['jobBillingState'].'. ';?>
            <?php echo $proposal['jobBillingZip'];?>
            <?php if($proposal['jobPrimaryPhone'] != '') {
            ?>
                <br />
                OFC: <?php echo $proposal['jobPrimaryPhone'];?>
            <?php }

            if($proposal['jobAltPhone'] != "")
            {
            ?>
                <br />
                CELL: <?php echo $proposal['jobAltPhone'];?>
            <?php
            }
            if($proposal['jobPrimaryEmail'] != "")
            {
                ?>
                <br />
                EMAIL: <a href="mailto:<?php echo $proposal['jobPrimaryEmail'];?>"><?php echo $proposal['jobPrimaryEmail'];?></a>
            <?php
            }
            ?>
                <br/>

            </font>

        </td>
    </tr>
</table>

<P CLASS="breakhere"></P>

<div id="header">
    <table width="98%">
        <tr>
            <td align='center' valign='top'>
                <img src="./assets/images/3d-Paving-Logo.jpg" width="240" hspace='0' vspace="0" alt="3-D Paving" />
                <hr/>
            </td>
        </tr>
    </table>
</div>

<div id="footer">
    <p class="page"><?php echo $proposal['communityFirst'];?> &nbsp;<?php echo $proposal['jobAddress1'];?>
        <?php if($proposal['jobAddress2'] != '') {echo $proposal['jobAddress2'];}?>
        <?php echo $proposal['jobCity'].', ';?></br>
      <!--  <?php echo $proposal['jobState'].'. ';?>
        <?php echo $proposal['jobZip'];?>&nbsp;&nbsp; &nbsp;
       -->
        Initials _______</p>
</div>

        <?php

        foreach($proposalDetails as $p)
        {
            ?>
            <table width="100%">
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

            </table>
<hr/>
            <?php
            $st = $st + $p['jordCost'];
            $ns = $ns + 1;
        }



        $fs = 14;
        if($ns > 10)
        {
            $fs = 10;
        }
        
        ?>

<P CLASS="breakhere"></P>

<table width="100%">
    <tr>
         <td  style="color:#000000;">

             <strong>Service Breakdown</strong>

             <table width="90%">
             <?php
                $numrec =0;
             foreach($proposalDetails as $p)
             
             {

             $numrec++;

             ?>
                     <!-- begin row -->
                     <tr style="background: #EAEDED;font-size:<?php echo $fs;?>px;">
                         <td style="font-size:<?php echo $fs;?>px;">
                             <?php echo $p['jordName']; ?>
                         </td>
                         <td align='right'  style="font-size:<?php echo $fs;?>px;">
                             $<?php echo number_format($p['jordCost'],2); ?>
                         </td>
             <?php } ?>

             <!-- begin row -->
                     <tr style="background:  #EAEDED;">
                         <td  style="font-size:<?php echo $fs;?>px;">
                             <strong>Grand Total</strong>
                         </td>
                         <td align='right'  style="font-size:<?php echo $fs;?>px;">
                             <strong> $<?php echo number_format($st, 2); ?></strong>
                         </td>


             </table>
             <br/>
<?php
if($numrec > 14) 
{ ?>

<P CLASS='breakhere'></P>
            <table width="90%">
                     <tr style="background:  #FFFFFF;">
                         <td  style="font-size:12px;">
                             <strong>Grand Total</strong>
                         </td>
                         <td align='right'  style="font-size:12px;">
                             <strong> $<?php echo number_format($st, 2); ?></strong>
                         </td>
            </table>
 
<?php }
?>
             <div style="text_align:center;"><b>Acceptances of proposal</b></div>
             <br/>
             We would like to thank you for the opportunity to visit your property and the possibility to earn

             your business. We are committed to providing our customers with great service and workmanship

             on all of our projects. Our commitment to customers is why we always warranty our projects and

             stand behind our work.

             <br/>  <br/>


             To proceed with our proposal please execute below and return to 3-D Paving and Sealcoating,

             LLC via e-mail. Upon execution this proposal becomes a binding contract. Customer

             acknowledges it has read this entire document including "General Terms and Conditions" and

             "Service Terms and Conditions".


             <br/>  <br/>

             <strong>Payment Terms: 40% Deposit Due Upon Signed Contract, 60% Due Upon Completion.</strong>
             <br/>  <br/>
             
             <i>This proposal expires thirty (30) days from the date hereof, but may be accepted at any later date at the sole option of 3-D Paving.</i>
             <br/>  <br/>
             

             <table width="100%">
                 <tr>
                     <td  width="50%"  style="color:#000000;" align='left' valign='top'>
                         <?php echo $WEB_CONFIG['webCompanyName'];?><br/>
                         Authorized By:
                         <?php echo $proposal['salesfirst']; ?> <?php echo $proposal['saleslast']; ?><br />
                         Title:<?php echo $proposal['salestitle']; ?><br />
                         <img src="./media/crm/<?php echo $proposal['salesSignature'];?>"  width='200' alt='signature'><br/>
                         Date:<?php echo date('m/d/y');?>

                     </td>

                     <td  width="50%" style="color:#000000;" align='left' valign='top'>

            <?php echo $proposal['clientfirst']; ?> <?php echo $proposal['clientlast']; ?><br />
                         <br />
                         <br />Accepted By:________________________
                         <br /><span style="font-size:10px;font_style:italic;">Name , Please print</span>

                         <br />
                         <br />Title:_______________________________
                         <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br />
            <br />Signature:___________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br />
            <br />Date:________________&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            </td>
            </tr> </table>


        </td>
    </tr>
</table>

<?php
if(count($images) > 0)
{
    $nc = 0;

    ?>

<P CLASS="breakhere"></P>
    <center><table width="100%" cellpadding="6" cellspacing="6">
            <?php

            foreach($images as $i)
            {
                $dwidth = 450;
                $dheight = 320;

                if(intval($i['PODocTypeSection']) == 1)
                {
                    $dwidth = 550;
                    $dheight = 520;

                }
                if($nc >= intval($i['PODocTypeSection']))
                {
                    echo '</table></center><P CLASS="breakhere"></P><center><table width="100%" cellpadding="6" cellspacing="6">';
                    $nc = 0;
                }
                $nc++;

                ?>

                <tr>
                    <td><center>
                            <img src="./media/projects/<?php echo $i['jobmdFileName'];?>" border="0"
                                <?php if($i['jobmdImageWidth'] >= $i['jobmdImageHeight'])
                                {
                                    echo "width ='". $dwidth ."'";
                                }
                                else
                                {
                                    echo "height ='". $dheight ."'";

                                }
                                ?>
                                 alt="<?php echo $i['jobmdDescription'];?>" />
                            <br/>
                            <span style="font-size:12px;width:600px;"><?php echo wordwrap($i['jobmdDescription'], 70, "<br />\n");?></span>
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
