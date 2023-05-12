
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
<div id="main-wrapper">
<center>
<img src="./assets/images/Header.jpg" width="750" height="164" alt="3D Paving" />
<h2>Daily Checklist</h2>
<h2>Work Order#  <?php echo $notes['jobMasterYear']; ?>-<?php echo $notes['jobMasterMonth']; ?>-<?php echo str_pad($notes['jobMasterNumber'], 5, "0", STR_PAD_LEFT); ?></h2>

    <h3><?php echo $notes['jordName'];?></h3>
    <br/>
 <table width="630" cellpadding="6" cellspacing="6">
     <tr>
         <td>
            <?php
            if(isset($notes['Trencher']) && $notes['Trencher'] ==1)
            {
            ?>
                         Trencher and Curb Machine (If Needed)

            <?php
            }?>

            <?php
            if(isset($notes['HandSaw']) && $notes['HandSaw'] == 1)
            {
            ?>
            <br/>Hand Saw (1)
             <?php
            }
            ?>


             <?php
             if(isset($notes['PlateCompactor']) && $notes['PlateCompactor'] == 1)
             {
                 ?>
                 <br/>             Plate Compactor (1)
             <?php
             }?>

             <?php
             if(isset($notes['Shovel']) && $notes['Shovel'] == 1)
             {
                 ?>
                 <br/>                 Shovels (4)
             <?php
             }?>

             <?php
             if(isset($notes['Pick']) && $notes['Pick'] ==1)
             {
                 ?>
                 <br/>                 Pick (1-2)
             <?php
             }?>



             <?php
             if(isset($notes['FormsPins']) && $notes['FormsPins'] ==1)
             {
                 ?>
                 <br/>                 Forms - Pins
             <?php
             }?>


             <?php
             if(isset($notes['Roller']) && $notes['Roller'] == 1)
             {
                 ?>
                 <br/>                 Roller (Make sure roller is tied down on trailer
             <?php
             }?>

             <?php
             if(isset($notes['StreetSaw']) && $notes['StreetSaw'] == 1)
             {
                 ?>
                 <br/>                 Street Saw (1)
             <?php
             }?>

             <?php
             if(isset($notes['HandFinishingTools']) && $notes['HandFinishingTools'] == 1)
             {
                 ?>
                 <br/>Hand Finishing Tools
             <?php
             }?>

             <?php
             if(isset($notes['OrangePaint']) && $notes['OrangePaint'] == 1)
             {
                 ?>
                 <br/>Orange Paint and String Line
             <?php
             }?>

             <?php
             if(isset($notes['Gasoline']) && $notes['Gasoline'] ==1)
             {
                 ?>
                 <br/>Gasoline for Hand Tools
             <?php
             }?>

             <?php
             if(isset($notes['Rake']) && $notes['Rake'] ==1)
             {
                 ?>
                 <br/>    Asphalt Rake (2)
             <?php
             }?>

             <?php
             if(isset($notes['Tack']) && $notes['Tack'] == 1)
             {
                 ?>
                 <br/> Tack (5-10 Gallons)
             <?php
             }?>

             <?php
             if(isset($notes['HandSaw']) && $notes['HandSaw'] == 1)
             {
                 ?>
                 <br/> Hand Saw (1)
             <?php
             }?>


             <?php
             if(isset($notes['Blower']) && $notes['Blower'] == 1)
             {
                 ?>
                 <br/> Blower (1)
             <?php
             }?>

             <?php
             if(isset($notes['Wands']) && $notes['Wands'] == 1)
             {
                 ?>
                 <br/>Wands (As Needed)
             <?php
             }?>


             <?php
             if(isset($notes['BrushBroom']) && $notes['BrushBroom'] == 1)
             {
                 ?>
                 <br/>   Brush/Broom
             <?php
             }?>

             <?php
             if(isset($notes['StringLine']) && $notes['StringLine'] ==1)
             {
                 ?>
                 <br/>                 String Line & Ribbon
             <?php
             }?>


             <?php
             if(isset($notes['Barricades']) && $notes['Barricades'] ==1)
             {
                 ?>
                 <br/>                 Barricades (As Needed)
             <?php
             }?>



             <?php
             if(isset($notes['CheckTanker']) && $notes['CheckTanker'] == 1)
             {
                 ?>
                 <br/>Check Tanker Levels for Sand Additive and Sealer
             <?php
             }?>


             <?php
             if(isset($notes['CheckTires']) && $notes['CheckTires'] == 1)
             {
                 ?>
                 <br/>Check Tires/Lights on Truck and Trailers
             <?php
             }?>



             <br/><br/>
             Created by:<?php echo $notes['cntFirstName'];?> <?php echo $notes['cntLastName'];?>
             <br/>


             Date; <?php echo date("m/d/Y", strtotime($notes['checklistDate']));?>
             <br/>
             Notes:<?php echo $notes['Notes'];?>
             <br/>

         </td>
     </tr>

 </table>
</center>

</div>
</body>
</html>
