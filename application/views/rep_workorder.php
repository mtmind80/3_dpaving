

<!DOCTYPE HTML>
<html lang="en">
<head>
    <style>
        @page { margin: 10px 30px 15px; }
        body { margin: 0px; }

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
<center>
            <img src="./assets/images/Header.jpg" width="750" height="164" alt="3D Paving" />

<?php

$st = 0;
 echo date('F-d-Y',strtotime($CurrentDate));
;

?>
    <h2>Work Order#  <?php echo $proposal['jobMasterYear']; ?>-<?php echo $proposal['jobMasterMonth']; ?>-<?php echo str_pad($proposal['jobMasterNumber'], 5, "0", STR_PAD_LEFT); ?></h2>

<table width="90%">
    <tr>
    <!--
        <td width='8%' valign='top'>
        <b>TO:</b>
        </td>
        <td width='92%' align='left' valign='top'>
            <?php echo $proposal['clientfirst']; ?> <?php echo $proposal['clientlast']; ?>
            <br />
            ATTN:<?php echo $proposal['jobPrimaryContact'];?>
            <br />
            <?php echo $proposal['jobAddress1'];?> &nbsp;
            <?php if($proposal['jobAddress2'] != 0)
            {
                echo '<br />' .$proposal['jobAddress2'];
            }
            ?>

            <br />
            <?php if ($proposal['jobCity'] != 0)
            {
                echo $proposal['jobCity'].', ';
            }?>
            <?php if($proposal['jobState'] != 0)
            {
                echo $proposal['jobState'].'. ';
            }
            ?>
            <?php if($proposal['jobZip'] != 0)
            {
                echo $proposal['jobZip'];
            }?>
            <br />
            Phone: <?php echo $proposal['jobPrimaryPhone'];?>
            <?php if($proposal['jobAltPhone'] != '')
            {
                echo "<br/>Phone: ". $proposal['jobAltPhone'];

            }
            ?>
            <?php
            if($proposal['jobParcel'] != '')
            {

                 echo '<br />Parcel Number:' . $proposal['jobParcel'];
            }
            ?>
        </td>
       </tr>
-->
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
    <td  width="10%" align='center'><h3>WORK ORDER</h3></td>
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
        <td width='50%'>
        &nbsp;
        </td>
        <td width='50%'>
            &nbsp;
        </td>
    </tr>

    <?php

foreach($proposalDetails as $p)
{
?>

<!-- begin row -->
<tr>
    <td colspan='2'>
        <?php echo $p['jordName']; ?>
    </td>
</tr>

 <tr >
     <td valign='top'>
         <?php echo $p['jordAddress1'];?> &nbsp;
         <?php echo $p['jordAddress2'];?><br />
         <?php echo $p['jordCity'];?>, &nbsp;
         <?php echo $p['jordState'];?>. &nbsp;
         <?php echo $p['jordZip'];?>
         <?php
         if($p['jordParcel'] != '')
         {

             echo '<br />Parcel Number:' . $p['jordParcel'];
         }
         ?>
     </td>
     <td valign='top'>
        <?php echo $p['cmpProposalTextAlt']; ?>
    </td>
</tr>

<tr>
    <td>
        Schedule: Start: <?php echo date('m-d-Y',strtotime($p['jordStartDate'])); ?>
        &nbsp;
        End: <?php echo date('m-d-Y',strtotime($p['jordEndDate'])); ?><?php echo $p['cmpServiceCat'];?>

    </td>
    <td>
        Job Managers:<br />
        <?php echo $p['manager1firstname']; ?><?php echo $p['manager1lastname']; ?>
        <br /><?php echo $p['manager2firstname']; ?><?php echo $p['manager2lastname']; ?>
    </td>
</tr>
    <tr>
        <td colspan='2'>
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
    <br/>
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


          <?php   if($p['cmpServiceCat'] == 'Excavation')
          {
              ?>

              Sq. Ft.:
              <?php echo $p['jordSquareFeet'];?>
                <br />Depth In inches: <?php echo $p['jordDepthInInches'];?>
                <br/>Tons: <?php echo $p['jordTons'];?>
                <br/>Loads: <?php echo $p['jordLoads'];?>


<?php
}

            if ($p['cmpServiceCat'] == 'Other')
            {
?>

            Description         <?php echo $p['jordVendorServiceDescription'];?>


            <?php
            }
?>
<?php
if ($p['cmpServiceCat'] == 'Rock')
            {
            ?>

            SQ . Ft.: <?php echo $p['jordSquareFeet'];?>
            <br/>
            Depth In inches: <?php echo $p['jordDepthInInches'];?>
            <br />Tons: <?php echo $p['jordTons'];?>
            <br />Loads: <?php echo $p['jordLoads'];?>

            <?php
            }
?>
<?php            if ($p['cmpServiceCat'] == 'Seal Coating')
{

    ?>


    Yield: <?php echo $p['jordYield'];?>
    <br />
    SQ. FT.:  <?php echo $p['jordSquareFeet'];?>
    <br/>
    Oil Spot Primer (gals):  <?php echo $p['jordPrimer'];?>
    <br />
    Fast Set (gals):  <?php echo $p['jordFastSet'];?>
    <br />
    Phases:  <?php echo $p['jordPhases'];?>
    <br/>
    <b>Materials Needed</b>
    <br/>
    Sealer:  <?php echo $p['jordSealer'];?>
    <br/>
    Sand:  <?php echo $p['jordSand'];?>
    <br/>
    Additive:  <?php echo $p['jordAdditive'];?>


<?php
}
?>
<?php
if($p['cmpServiceCat'] == 'Sub Contractor')
{
    ?>

    Sub Contractor:
    <?php echo $p['subfirstname'] . ' ' . $p['sublastname'];?>
    <br />Description: <?php echo $p['jordVendorServiceDescription'];?>


<?php
}
   ?>

<?php
if ($p['cmpServiceCat'] == 'Paver Brick')
{
    ?>
    SQ . Ft.: <?php echo $p['jordSquareFeet'];?>
    <br />ExcavateTons: <?php echo $p['jordTons'];?>
    <br />Description: <?php echo $p['jordVendorServiceDescription'];?>
<?php
}
?>

<?php
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






        <tr>
    <td colspan='2'>
        <hr noshade>
    </td>
</tr>

 <?php
  $st = $st + $p['jordCost'];
}
  ?>

</table>




</center>

</body>
</html>
