

<!DOCTYPE HTML>
<html lang="en">
<head>
    <style>
        @page { margin: 185px 40px 85px; }
        body { margin: 0px; font-family:Arial, Tahoma, Verdana, Helvetica; font-size:16px;}
        #header { position: fixed; left: 0px; top: -170px; right: 0px; width: 100%; height: 170px; background-color: #fff; text-align: center; }

        td{
            font-family:Times, Arial, Verdana, Helvetica; font-size:12px;
            color:#000;
        }

        P.breakhere {page-break-after: always;}

    </style>
    <title>3D Paving Work Order</title>
</head>

<body style="font-family:Times, Arial, Verdana, Helvetica; font-size:12px;
            color:#000;">
<div id="header">

    <img src="./assets/images/Header.jpg" width="750" height="164" alt="3D Paving" />

</div>
<center>


<?php

$st = 0;
 //echo date('F-d-Y',strtotime($CurrentDate));
;

?>
    <h2>Work Order#  <?php echo $proposal['jobMasterYear']; ?>-<?php echo $proposal['jobMasterMonth']; ?>-<?php echo str_pad($proposal['jobMasterNumber'], 5, "0", STR_PAD_LEFT); ?></h2>

<table width='98%'>
<tr>
<td>
<center><h2><?php echo $proposal['jobName']?></h2></center>
<br/>
<h3>Estimator:<?php echo $proposal['salesfirst'] . ' ' . $proposal['saleslast']?>
    &nbsp;
    &nbsp;
<?php echo $proposal['salesphone']?></h3>
 </td>
</tr>
</table>
<br/>

<table width="90%">
    <tr>
        <td style="font-size:1.2EM;"><b>Site Address:</b>
            <br/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $proposal['jobAddress1'];?>
            &nbsp;<?php echo $proposal['jobAddress2'];?>
           <br/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $proposal['jobCity'];?>,
            <?php echo $proposal['jobState'];?>.
            <?php echo $proposal['jobZip'];?>

        </td>
    </tr>
</table>
<?php if(isset($siteplan['jobmdFileName'])) {
    ?>
    <center><table width="100%" cellpadding="6" cellspacing="6">
            <tr>
                <td><center>
                        <img src="./media/projects/<?php echo $siteplan['jobmdFileName'];?>" border="0"
                            <?php if($siteplan['jobmdImageWidth'] >= $siteplan['jobmdImageHeight'])
                            {
                                echo "width ='550'";
                            }
                            else
                            {
                                echo "height ='420'";

                            }
                            ?>
                             alt="<?php echo $siteplan['jobmdDescription'];?>" />
                        <br/>
                        <span style="font-size:12px;width:600px;"><?php echo wordwrap($siteplan['jobmdDescription'], 70, "<br />\n");?></span>
                    </center>
                </td>
            </tr>

        </table>
    </center>
<?php
}

?>
<br/>
<?php
$p = $proposal['details']

?>
<P CLASS="breakhere"></P>

    <h2>Work Order#  <?php echo $proposal['jobMasterYear']; ?>-<?php echo $proposal['jobMasterMonth']; ?>-<?php echo str_pad($proposal['jobMasterNumber'], 5, "0", STR_PAD_LEFT); ?></h2>
<br/>
    <table width="90%">
        <tr>
            <td>
                <h2><?php echo $p['jordName']; ?></h2>
           </td>
        </tr>
    </table>
<br/>
    <table width='98%'>
    <tr>
        <td>
            <b>Job Manager: </b><?php echo $p['manager1firstname'] . ' ' . $p['manager1lastname']?>
            &nbsp;
         &nbsp;
            <?php echo $p['manager1phone']?>
        </td>
    </tr>
</table>

    <br/>
    <?php if($p['jordCustomNote'] != '')
{
    ?>

<table width='98%'>
    <tr>
        <td>
            <b>Notes: </b><?php echo $p['jordCustomNote']?>
        </td>
    </tr>
</table>

<?php
}
    ?>


<table width="98%">
<tr>
<td style="font-size:1.2EM;">
<center><h3>Service Details</h3></center>
</td>
</tr>
</table>
<table width="98%">
    <tr>
        <td style="font-size:1.2EM;">
<!-- service details here -->
            <?php
            if($p['cmpServiceCat'] == 'Asphalt')
            {

                if($p['cmpServiceID'] == 19)
                {
                ?>
                        Size of project in SQ FT: <?php echo $p['jordSquareFeet'];?>
                        <br/>
                        Depth In Inches <?php echo $p['jordDepthInInches'];?>
                        <br/>
                        Days of Milling <?php echo $p['jordDays'];?>
                         <br/>
                        Locations <?php echo $p['jordLocations'];?>
                        <br/>
                        SQ. Yards <?php echo $p['jordSQYards'];?>
                    <center><h3>Materials Needed</h3></center>
                        Loads <?php echo $p['jordLoads'];?>
                <?php
                }
                else
                {
                ?>


                Size of project in SQ FT <?php echo $p['jordSquareFeet'];?>
                    <br/>
                Depth In Inches <?php echo $p['jordDepthInInches'];?>
                    <br/>
                Locations <?php echo $p['jordLocations'];?>
                    <br/>
                SQ. Yards <?php echo $p['jordSQYards'];?>

                    <center><h3>Materials Needed</h3></center>
                    Tons of Ashpalt <?php echo $p['jordTons'];?>
                    <br/>
                Tack (gals) <?php echo ceil($p['jordSquareFeet']/108);?>
                <?php
                 }
           }
  if ($p['cmpServiceCat'] == 'Concrete')
  {


            if($p['cmpServiceID'] < 12)
            {

            ?>
            <!-- Concrete -->

                Length In Feet (linear feet): <?php echo $p['jordLinearFeet']; ?>
                <br/>
                Locations: <?php echo $p['jordLocations'];?>
                <br/>
                CU YDS: <?php echo $p['jordCubicYards'];?>


            <?php
            }
            ELSE
            {
            ?>

            Sq. Ft. :<?php echo $p['jordSquareFeet'];?>
                <br/>
            Depth (inches): <?php echo $p['jordDepthInInches'];?>
                <br/>
            Locations: <?php echo $p['jordLocations'];?>

            <?php
            }
  }
           ?>

            <?php   if($p['cmpServiceCat'] == 'Striping')
            {
                ?>

                <?php echo $p['jordProposalText'];?>
                <br/>


            <?php
            }

           if($p['cmpServiceCat'] == 'Excavation')
          {
              ?>

              Sq. Ft.:
              <?php echo $p['jordSquareFeet'];?>
                <br />Depth In inches: <?php echo $p['jordDepthInInches'];?>

              <center><h3>Materials Needed</h3></center>

                <br/>Tons: <?php echo $p['jordTons'];?>
                <br/>Loads: <?php echo $p['jordLoads'];?>


        <?php
            }

            if ($p['cmpServiceCat'] == 'Other')
            {
            ?>

                <?php echo $p['jordProposalText'];?>
                <br/>


            <?php
            }

            if ($p['cmpServiceCat'] == 'Rock')

            {
            ?>

            SQ . Ft.: <?php echo $p['jordSquareFeet'];?>
            <br/>
            Depth In inches: <?php echo $p['jordDepthInInches'];?>
                <center><h3>Materials Needed</h3></center>


            <br />Tons: <?php echo $p['jordTons'];?>
            <br />Loads: <?php echo $p['jordLoads'];?>

            <?php
            }
             if ($p['cmpServiceCat'] == 'Seal Coating')
            {

            ?>


            Yield: <?php echo $p['jordYield'];?>
            <br />
            SQ. FT.:  <?php echo $p['jordSquareFeet'];?>
            <br />
            Phases:  <?php echo $p['jordPhases'];?>
                <center><h3>Materials Needed</h3></center>
               Oil Spot Primer (gals):  <?php echo $p['jordPrimer'];?>
               <br />
               Fast Set (gals):  <?php echo $p['jordFastSet'];?>
            <br/>
            Sealer (gals):  <?php echo $p['jordSealer'];?>
            <br/>
            Sand (lbs):  <?php echo $p['jordSand'];?>
            <br/>
            Additive (gals):  <?php echo $p['jordAdditive'];?>


        <?php
        }
        if($p['cmpServiceCat'] == 'Sub Contractor')
        {
        ?>

        Sub Contractor:
        <?php echo $p['subfirstname'] . ' ' . $p['sublastname'];?>
        <br />Description: <?php echo $p['jordVendorServiceDescription'];?>


    <?php
    }

     if ($p['cmpServiceCat'] == 'Paver Brick')
    {
    ?>
        SQ . Ft.: <?php echo $p['jordSquareFeet'];?>
        <br />Excavate Tons: <?php echo $p['jordTons'];?>
        <br />Description: <?php echo $p['jordVendorServiceDescription'];?>
    <?php
    }


     if ($p['cmpServiceCat'] == 'Drainage and Catchbasins')
    {
    ?>

        Number of Catch Basins: <?php echo $p['jordAdditive'];?>
        <br />Description: <?php echo $p['jordVendorServiceDescription'];?>
    <?php
    }
    ?>
    </td>
   </tr>

</table>

    <br/>
    <br/>


 <?php if(count($p['vehicles']) > 0)

{
?>

   <table width="600">

        <tr>
            <td width="300">
                    <b>Vehicles</b>
            </td>
            <td width="300">

                    <b>Quantity</b>
            </td>
        </tr>

            <?php foreach ($p['vehicles'] as $data)
            {
            ?>
                <tr>
                    <td>
                        <?php echo $data['POVvehicleName'];?>
                    </td>
                    <td>
                        <?php echo $data['POVNumber'];?>
                    </td>
                </tr>


        <?php
            }
        ?>
        </table>
  <?php
  }
 ?>

    <br/>

    <?php if(count($p['equipment']) > 0)

    {


    ?>

        <table width="600">

            <tr>
                <td width="300">
                    <b>Equipment</b>
                </td>
                <td width="300">

                    <b>Quantity</b>
                </td>
            </tr>

         <?php foreach ($p['equipment'] as $data)
        {
            ?>
            <tr>
                <td>
                    <?php echo $data['POequipName'];?>
                </td>
                <td>
                    <?php echo $data['POequipNumber'];?>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>
<?php

}
?>
    <br/>


 <?php if(count($p['labor']) > 0)

{
   ?>

    <table width="600">

        <tr>
            <td width="300">
                <b>Labor</b>
            </td>
            <td width="300">

                <b>Quantity</b>
            </td>
        </tr>

        <?php foreach ($p['labor'] as $data)
        {
            ?>
            <tr>
                <td>
                    <?php echo $data['POlaborName'];?>
                </td>
                <td>
                    <?php echo $data['POlaborNumber'];?>
                </td>
            </tr>


        <?php
        }
        ?>
    </table>
<?php

}

  ?>

    <br/>
 <?php if(count($p['other']) > 0)

{

 ?>

    <table width="600">

        <tr>
            <td width="300">
                <b>Other Cost</b>
            </td>
            <td width="300">

                <b>Description</b>
            </td>
        </tr>

        <?php foreach ($p['other'] as $data)
        {
            ?>
            <tr>
                <td>
                    <?php echo $data['jobcostTitle'];?>
                </td>
                <td>
                    <?php echo $data['jobcostDescription'];?>
                </td>
            </tr>


        <?php
        }
        ?>
    </table>
<?php

}
 ?>

    <br/>

   <?php if(count($p['subs']) > 0)

{
   ?>

    <table width="600">

        <tr>
            <td width="300">
                <b>Sub Contractor</b>
            </td>
            <td width="300">

                <b>Description</b>
            </td>
        </tr>

        <?php foreach ($p['subs'] as $data)
        {
            ?>
            <tr>
                <td>
                    <?php echo $data['cntFirstName'] . ' ' . $data['cntLastName'];?>
                </td>
                <td>
                    <?php echo $data['posubDescription'];?>
                </td>
            </tr>


        <?php
        }
        ?>
    </table>
    <br/>
<?php

}

?>

    <table width="98%">

    <tr>
        <td width="50%" valign='top'>
            <b>Special instructions: </b>
            <?php echo $p['cmpProposalTextAlt']; ?>
        </td>
        <td width="50%" valign='top'>
        <b>Instrucciones especiales:</b>
        <?php echo $p['cmpProposalTextAltES']; ?>
        </td>
    </tr>
    </table>
    <br/>
<P CLASS="breakhere"></P>
    <h2>Work Order#  <?php echo $proposal['jobMasterYear']; ?>-<?php echo $proposal['jobMasterMonth']; ?>-<?php echo str_pad($proposal['jobMasterNumber'], 5, "0", STR_PAD_LEFT); ?></h2>
    <br/>

    <table width="90%">
        <tr>
            <td>
                <h2>Checklist For <?php echo $p['jordName']; ?></h2>
            </td>
        </tr>
    </table>
    <br/>
    <table width="98%">
        <tr>
        <td style="font-size:1.2EM;">
            Responsibilities in the Morning
            <br/>Make sure all items are checked off on the Truck before leaving
            <ul>
                <?php if ($p['cmpServiceCat'] == 'Asphalt')
                {
                    ?>

                <li>Asphalt Rake (2)
                </li>
                <li>Plate Compactor (1)
                </li>
                <li>Shovels (4)
                </li>
                <li>Asphalt Pick (1-2)
                </li>
                <li>Roller (Make sure roller is tied down on trailer properly)
                </li>
                <li>Street Saw (1)/Hand Saw (1)
                </li>
                <li>Hand Finishing Tools
                </li>
                <li>Orange Paint and String Line
                </li>
                <li>Gasoline for Hand Tools
                </li>
                <li>Tack (5-10 Gallons)
                </li>

                <?php
                }
                elseif($p['cmpServiceCat'] == 'Concrete')
                {
                 ?>

                <li> Trencher and Curb Machine (If Needed)
                </li>
                <li>Hand Saw (1)
                </li>
                <li>Plate Compactor (1)
                </li>
                <li>Shovels (4)
                </li>
                <li>Pick (1-2)
                </li>
                <li>Forms - Pins
                </li>
                 <li>Roller (Make sure roller is tied down on trailer properly)
                 </li>
                 <li>Street Saw (1)
                 </li>
                 <li>Hand Finishing Tools
                 </li>
                 <li>Orange Paint and String Line
                 </li>
                 <li>Gasoline for Hand Tools
                 </li>
                <?php
                }
                elseif($p['cmpServiceCat'] == 'Seal Coating')
                {
                    ?>


                    <li>Blower (1)
                    </li>
                    <li>Wands (As Needed)
                    </li>
                    <li>Brush/Broom (1)
                    </li>
                    <li>String Line & Ribbon
                    </li>
                    <li>Barricades (as needed)
                    </li>
                    <li>Check Tanker Levels for Sand, Additive, and
                        Sealer
                    </li>


                <?php
                }
                else
                {

                }
                    ?>


                <li>Check Tires/Lights on Truck and Trailers</li>
                <li>Note: Anything Broken or Missing</li>
            </ul>
        </td>
        </tr>
    </table>




</center>




       <br/>

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


</body>
</html>
