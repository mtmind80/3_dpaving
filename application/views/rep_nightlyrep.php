
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
<h2>Nightly Report</h2>
    <h2>Work Order#  <?php echo $notes['jobMasterYear']; ?>-<?php echo $notes['jobMasterMonth']; ?>-<?php echo str_pad($notes['jobMasterNumber'], 5, "0", STR_PAD_LEFT); ?></h2>

    <h3><?php echo $notes['jordName'];?></h3>
    <br/>
 <table width="90%" cellpadding="6" cellspacing="6">
     <tr>
         <td>
             Created by:<?php echo $notes['cntFirstName'];?> <?php echo $notes['cntlastName'];?>
             <br/>
             Created Date:<?php echo date("m/d/Y", strtotime($notes['womCreatedDate']));?>
             <br/>
             Report Date; <?php echo date("m/d/Y", strtotime($notes['womDate']));?>
             <br/>
             Notes:<?php echo $notes['womNote'];?>
             <br/>

             <ul>
                 <li>Remove Equipment from Trucks Outside: <?php if($notes['womCheckRemoveEquipment']){echo 'YES';}else{echo 'NO';}?></li>
                 <li>Remove Tools from Trucks Outside: <?php if($notes['womCheckRemoveTools']){echo 'YES';}else{echo 'NO';}?></li>
                 <li>Refill Hand Tools and Tack Buckets: <?php if($notes['womCheckRefill']){echo 'YES';}else{echo 'NO';}?></li>
                 <li>Check Tire /Lights on Truck and Trailers: <?php if($notes['womCheckTruck']){echo 'YES';}else{echo 'NO';}?></li>
             </ul>

         </td>
     </tr>

 </table>

    <?php IF($materials)
    {
    ?>
<h3>Equipment</h3>
    <table width="90%" cellpadding="6" cellspacing="6">

        <!-- begin row -->
        <tr>

            <td>
                Material
            </td>
            <td>
                Vendor
            </td>
            <td>
                Date
            </td>
            <td>
                Amount
            </td>
       </tr>


        <?php foreach ($materials as $data)
        {

        ?>
        <tr>

            <td>
                <?php echo $data['matName'];?>
            </td>
            <td>
                <?php echo $data['cntFirstName'] . ' ' .$data['cntLastName'];?>
            </td>
            <td>
                <?php echo $data['womatDate'];?>
            </td>
            <td>
                <?php echo $data['womatAmount'];?>
            </td>

        </tr>


        <?php
}
?>



    </table>
    <?php
    }
    ?>




    <?php IF($vehicle)
    {
        ?>
        <h3>Vehicles</h3>
        <table width="90%" cellpadding="6" cellspacing="6">

            <!-- begin row -->
            <tr>

                <td>
                   Vehicle
                </td>
                <td>
                    Date
                </td>
                <td>
                    Hours
                </td>

            </tr>


            <?php foreach ($vehicle as $data)
            {

                ?>
                <tr>



                    <td>
                        <?php echo $data['vehicleName'];?>
                    </td>
                    <td>
                        <?php echo $data['POVDate'];?>
                    </td>

                    <td>
                        <?php echo $data['POVHoursUsed'];?>
                    </td>

                </tr>


            <?php
            }
            ?>



        </table>
    <?php
    }
    ?>

    <?php IF($materials)
    {
        ?>
        <h3>Materials</h3>
        <table width="90%" cellpadding="6" cellspacing="6">

            <!-- begin row -->
            <tr>

                <td>
                    Material
                </td>
                <td>
                    Vendor
                </td>
                <td>
                    Date
                </td>

                <td>
                    Amount
                </td>
            </tr>


            <?php foreach ($materials as $data)
            {

                ?>
                <tr>
                    <td>
                        <?php echo $data['matName'];?>
                    </td>
                    <td>
                        <?php echo $data['cntFirstName'] . ' ' . $data['cntLastName'];?>
                    </td>
                    <td>
                        <?php echo $data['womatDate'];?>
                    </td>
                    <td>
                        <?php echo $data['womatAmount'];?>
                    </td>
                </tr>


            <?php
            }
            ?>



        </table>
    <?php
    }
    ?>



    <?php IF($labor)
    {
        ?>
        <h3>Labor</h3>
        <table width="90%" cellpadding="6" cellspacing="6">

            <!-- begin row -->
            <tr>

                <td>
                    Name
                </td>
                <td>
                    Date
                </td>
                <td>
                    Hours
                </td>

            </tr>


            <?php foreach ($labor as $data)
            {

                ?>
                <tr>


                    <td>
                        <?php echo $data['cntFirstName'] . ' ' . $data['cntLastName'];?>
                    </td>

                    <td>
                        <?php echo $data['POlaborDate'];?>
                    </td>

                    <td>
                        <?php
                        $start = new DateTime('12/12/2016 ' . $data['POlaborStartTime']);
                        $end = new DateTime('12/12/2016 ' . $data['POlaborEndTime']);
                        $interval = $start->diff($end);
                        $interval->format('%H:%i');

                       // $diff = $end - $start;
                       // $time = date("h:i",$diff);
                       ?>
                        <?php echo $interval->format('%H:%i');?>
                    </td>

                    <td>
                        <?php echo $data['POlaborStartTime'];?>     to      <?php echo $data['POlaborEndTime'];?>

                    </td>
                </tr>

            <?php
            }
            ?>



        </table>
    <?php
    }
    ?>



    <?php IF($other)
    {
        ?>
        <h3>Other Costs</h3>
        <table width="90%" cellpadding="6" cellspacing="6">

            <!-- begin row -->
            <tr>

                <td>
                    Date
                </td>
                <td>
                    Description
                </td>
                <td>
                    Amount
                </td>
            </tr>


            <?php foreach ($other as $data)
            {

                ?>
                <tr>
                    <td>
                        <?php echo $data['jobcostDate'];?>
                    </td>
                    <td>
                        <?php echo $data['jobcostDescription'];?>
                    </td>
                    <td>
                        <?php echo '$'. money_format('%i', $data['jobcostAmount']);?>
                    </td>
                </tr>

            <?php
            }
            ?>



        </table>
    <?php
    }
    ?>


</center>

</div>
</body>
</html>
