
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
<center><img src="./assets/images/AllPaving_Logo600.jpg" border="0" width='300' alt="3D Paving" /></center>

<h3> <?php echo $details['jordName'];?>

</h3>

<div class="row panel"  style='border:1px #000000 solid;'>

    <div class="row">

        <div class="col-xs-4">
            <div class="form-group no-margin-hr">
                Location:
                <br/>


                <?php echo $details['jordAddress1'];?>
                &nbsp;
                <?php echo $details['jordAddress2'];?>
                <br />
                <?php echo $details['jordCity'];?>,
                <?php echo $details['jordState'];?>.
                <?php echo $details['jordZip'];?>

                <br />
                Start Date: <?php echo date('m-d-Y',strtotime($details['jordStartDate']))?>

                <br />
                End Date: <?php echo date('m-d-Y',strtotime($details['jordEndDate']))?>

            </div>
        </div>
        <div class="col-xs-4">
            <strong>NOTE: </strong>
            <?php echo $details['jordNote'];?>
            <br/><br/>
            <strong>SERVICE: </strong>
            <?php echo $details['cmpProposalTextAlt'];?>

        </div>
    </div>
    <!-- row -->
</div>


<!-- begin row -->

<div class="row panel"  style='border:1px #000000 solid;'>

    <br />
<table>
    <tr>
        <td colspan='2'>
            <!-- service details here -->
            <?php
            if($details['cmpServiceCat'] == 'Asphalt')
            {

                if($details['cmpServiceID'] == 19)
                {
                    ?>
                    Size of project in SQ FT: <?php echo $details['jordSquareFeet'];?>
                    <br/>
                    Depth In Inches <?php echo $details['jordDepthInInches'];?>
                    <br/>
                    Days of Milling <?php echo $details['jordDays'];?>
                    <br/>
                    Locations <?php echo $details['jordLocations'];?>
                    <br/>
                    SQ. Yards <?php echo $details['jordSQYards'];?>
                    <br/>
                    Loads <?php echo $details['jordLoads'];?>
                <?php
                }
                else
                {
                    ?>

                    Size of project in SQ FT <?php echo $details['jordSquareFeet'];?>
                    <br/>
                    Depth In Inches <?php echo $details['jordDepthInInches'];?>
                    <br/>
                    Locations <?php echo $details['jordLocations'];?>
                    <br/>
                    SQ. Yards <?php echo $details['jordSQYards'];?>

                <?php
                }
            }

            if ($details['cmpServiceCat'] == 'Concrete')
            {


                if($details['cmpServiceID'] < 12)
                {

                    ?>
                    <!-- Concrete -->

                    Length In Feet (linear feet): <?php echo $details['jordLinearFeet']; ?>
                    <br/>
                    Locations: <?php echo $details['jordLocations'];?>
                    <br/>
                    CU YDS: <?php echo $details['jordCubicYards'];?>


                <?php
                }
                ELSE
                {
                    ?>

                    Sq. Ft. :<?php echo $details['jordSquareFeet'];?>
                    <br/>
                    Depth (inches): <?php echo $details['jordDepthInInches'];?>
                    <br/>
                    Locations: <?php echo $details['jordLocations'];?>

                <?php
                }
            }
            ?>


            <?php   if($details['cmpServiceCat'] == 'Excavation')
            {
                ?>

                Sq. Ft.:
                <?php echo $details['jordSquareFeet'];?>
                <br />Depth In inches: <?php echo $details['jordDepthInInches'];?>
                <br/>Tons: <?php echo $details['jordTons'];?>
                <br/>Loads: <?php echo $details['jordLoads'];?>


            <?php
            }

            if ($details['cmpServiceCat'] == 'Other')
            {
                ?>

                Description         <?php echo $details['jordVendorServiceDescription'];?>


            <?php
            }
            ?>
            <?php
            if ($details['cmpServiceCat'] == 'Rock')
            {
                ?>

                SQ . Ft.: <?php echo $details['jordSquareFeet'];?>
                <br/>
                Depth In inches: <?php echo $details['jordDepthInInches'];?>
                <br />Tons: <?php echo $details['jordTons'];?>
                <br />Loads: <?php echo $details['jordLoads'];?>

            <?php
            }
            ?>
            <?php            if ($details['cmpServiceCat'] == 'Seal Coating')
            {

                ?>


                Yield: <?php echo $details['jordYield'];?>
                <br />
                SQ. FT.:  <?php echo $details['jordSquareFeet'];?>
                <br/>
                Oil Spot Primer (gals):  <?php echo $details['jordPrimer'];?>
                <br />
                Fast Set (gals):  <?php echo $details['jordFastSet'];?>
                <br />
                Phases:  <?php echo $details['jordPhases'];?>
                <br/>
                <b>Materials Needed</b>
                <br/>
                Sealer:  <?php echo $details['jordSealer'];?>
                <br/>
                Sand:  <?php echo $details['jordSand'];?>
                <br/>
                Additive:  <?php echo $details['jordAdditive'];?>


            <?php
            }
            ?>
            <?php
            if($details['cmpServiceCat'] == 'Sub Contractor')
            {
                ?>

                Sub Contractor:
                <?php echo $details['subfirstname'] . ' ' . $details['sublastname'];?>
                <br />Description: <?php echo $details['jordVendorServiceDescription'];?>


            <?php
            }
            ?>

            <?php
            if ($details['cmpServiceCat'] == 'Paver Brick')
            {
                ?>
                SQ . Ft.: <?php echo $details['jordSquareFeet'];?>
                <br />ExcavateTons: <?php echo $details['jordTons'];?>
                <br />Description: <?php echo $details['jordVendorServiceDescription'];?>
            <?php
            }
            ?>

            <?php
            if ($details['cmpServiceCat'] == 'Drainage and Catchbasins')
            {
                ?>

                Number of Catch Basins: <?php echo $details['jordAdditive'];?>
                <br />Description: <?php echo $details['jordVendorServiceDescription'];?>
            <?php
            }
            ?>


        </td>
    </tr>

    </table>
    </div>
    <br/>







<?php if($vehicles)
{

?>
<!-- begin vehicles -->
<!-- begin row -->
<div class="row" >
    <div class="col-xs-3">

        Vehicles
    </div>
    <div class="col-xs-2">
        Quantity
    </div>
</div>


<?php
foreach ($vehicles as $data)
{
    ?>
<!-- begin row -->
<div class="row" >

    <div class="col-xs-3">
        <?php echo $data['POVvehicleName'];?>
    </div>

    <div class="col-xs-2">
        <?php echo $data['POVNumber'];?>
    </div>

</div>
<?php
}
}

?>


<?php if($equipment)
{

?>

<br />
<!-- begin row -->
<div class="row" >
    <div class="col-xs-3">

        Equipment
    </div>
    <div class="col-xs-2">
        Quantity
    </div>
</div>

<?php foreach ($equipment as $data)
{
    ?>

<!-- begin row -->
<div class="row" >

    <div class="col-xs-3">
        <?php echo $data['POequipName'];?>
    </div>

    <div class="col-xs-2">
        <?php echo $data['POequipNumber'];?>
    </div>


</div>

<?php
}
}
?>

<br/>
<?php if($labor)
{
    ?>

<!-- labor sections -->

<!-- begin row -->
<div class="row" >
    <div class="col-xs-3">

        Labor
    </div>
    <div class="col-xs-2">
        Quantity
    </div>
</div>

<?php foreach ($labor as $data)
{
    ?>
<!-- begin row -->
<div class="row" >

    <div class="col-xs-3">
        <?php echo $data['POlaborName'];?>
    </div>

    <div class="col-xs-2">
        <?php echo $data['POlaborNumber'];?>
    </div>


</div>

<?php
}
}
?>


<?php if($other)
{
    ?>

    <!-- other cost sections -->
    <br/>
    <!-- begin row -->
    <div class="row" >
        <div class="col-xs-3">

            Other Service
        </div>
        <div class="col-xs-6">
            Description
        </div>
    </div>

    <?php foreach ($other as $data)
{
    ?>
    <!-- begin row -->
    <div class="row" >
        <div class="col-xs-3">
            <?php echo $data['jobcostTitle'];?>
        </div>

        <div class="col-xs-6">
            <?php echo $data['jobcostDescription'];?>
        </div>
    </div>

<?php
}
}
?>


<?php if($subs)
{

?>

<!-- sub contractor sections -->
<br />

<!-- begin row -->
<div class="row" >
    <div class="col-xs-4">
        Sub Contractor
    </div>
    <div class="col-xs-5 left">
        Description
    </div>

</div>

<?php foreach ($subs as $data)
{

?>

<!-- begin row -->
<div class="row" >

    <div class="col-xs-4">
        <?php echo $data['cntFirstName'];?> <?php echo $data['cntLastName'];?>
    </div>

    <div class="col-xs-5">
        <?php echo $data['posubDescription'];?>
    </div>

</div>

<?php
}
}
?>

<br/>



</div>
</body>
</html>
