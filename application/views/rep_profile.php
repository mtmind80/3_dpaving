
<!DOCTYPE HTML>
<html lang="en">
<head>
    <style>
        td{
            font-family:Verdana; font-size:10px;
            vertical-align: top;
            text-align: left;
            color:#000;
        }
    </style>
    <title>3D Paving CRM Profile</title>
</head>

<body>
<table style="width:610px;">
    <tr>
        <!-- header -->
        <td class="profile" style='width:410px'>
            <img src="./assets/images/Header.jpg" width="750" height="164" alt="3D Paving" />
        </td>
        <td class="profile" style='width:200px'>
            3D Paving Corporate
            <!-- from web config -->
            <br />
            <br />6714 NW 20th Avenue
            <br />Fort Lauderdale, Florida 33309
            <br />Phone: 1-855-SFL-Road
        </td>
    </tr>
</table>
<table style="width:610px;">
    <tr>
        <td class="profile" style='width:400px'><h2><?php if($data['cntSalutation']) {echo $data['cntSalutation'];} ?> <?php echo $data['cntFirstName']; ?> <?php echo $data['cntLastName']; ?></h2>
        </td>
        <td class="profile"  style='width:210px'>
            <img src="./assets/images/pixel-admin/avatar.png" border="0" alt="User Avatar" width='100' />
        </td>

    </tr>

    <tr>
        <td class="profile" >
            <strong>Address</strong><br/>
            <?php echo $data['cntPrimaryAddress1']; ?><br/>
            <?php echo $data['cntPrimaryAddress2']; ?>
            <?php echo $data['cntPrimaryCity']; ?>, <?php echo $data['cntPrimaryState']; ?>. <?php echo $data['cntPrimaryZip']; ?>
        </td>

        <td class="profile" >
            <strong>Phone</strong><br/>
            Primary:
            <?php echo $data['cntPrimaryPhone']; ?><br/>Cell:
            <?php
            if($data['cntAltPhone1'])
            {
                echo $data['cntAltPhone1'].'<br />Fax';
            }
            if($data['cntAltPhone2'])
            {
                echo $data['cntAltPhone2'].'<br />';
            }
            ?>


            <strong>Email</strong><br/>
            <?php echo $data['cntPrimaryEmail']; ?><br/>
            <?php echo $data['cntAltEmail']; ?><br/>



        </td>

    </tr>
    <?php if($data['cntcid'] == 9 || $data['cntcid'] == 10 || $data['cntcid'] == 8)
    {
?>
    <tr>
        <td class="profile" >
            <strong>Created On</strong>:<?php echo $data['cntCreatedDate']; ?><br/>
            <strong>Created By</strong>:<?php echo $data['Creator']; ?><br/>
            <br/>
        </td>
        <td class="profile" >
            &nbsp;
        </td>

    </tr>

    <?php
    }
    else
    {
     ?>



    <tr>
        <td class="profile" >
            <strong>Created On</strong>:<?php echo $data['cntCreatedDate']; ?><br/>
            <strong>Created By</strong>:<?php echo $data['Creator']; ?><br/>
            <strong>Gender</strong>:
            <?php echo $data['cntGender']; ?><br/>
            <strong>DOB</strong>:
            <?php echo $data['cntDateOfBirth']; ?>
            <br/>
        </td>
        <td class="profile" >
            <strong>Title</strong>
            <?php echo $data['cntJobTitle']; ?><br/>
            <strong>Department</strong>
            <?php echo $data['cntDepartment']; ?><br/>
        </td>

    </tr>
<?php }
    ?>
    <tr>
        <td class="profile" >
            <strong>Company</strong><br/>
            <?php
            if($data['cntCompanyId'])
            {

            echo $data['CompanyName'].'<br/>';
            echo $data['companyAddress1'].'<br/>';
            echo $data['companyAddress2'].'<br/>';
            echo $data['companyCity'].', ';
            echo $data['companyState'].'.';
            echo $data['companyZip'].'<br/>';
            echo $data['companyPhone'];
            }
            else
            {
            echo 'NA';
            }
            ?>
        </td>
        <td class="profile" >               <strong>Development</strong><br/>

            <?php
            if($data['cntDevelopmentId'])
            {

            echo $data['DevelopmentName'].'<br/>';
            echo $data['developmentAddress1'].'<br/>';
            echo $data['developmentAddress2'].'<br/>';
            echo $data['developmentCity'].', ';
            echo $data['developmentState'].'. ';
            echo $data['developmentZip'].'<br/>';
            echo $data['developmentPhone'];

            }
            else
            {
            echo 'NA';
            }
            ?>
        </td>

    </tr>

    <tr>
        <td class="profile" >
            <strong>Billing Addresshhh</strong><br/>
            <?php echo $data['cntBillAddress1']; ?><br/>
            <?php echo $data['cntBillAddress2']; ?>
            <?php echo $data['cntBillCity']; ?>, <?php echo $data['cntBillState']; ?>. <?php echo $data['cntBillZip']; ?>
        </td>
        <td class="profile" >               <strong>Property Address (Shipping)</strong><br/>
            <?php echo $data['cntShipAddress1']; ?><br/>
            <?php echo $data['cntShipAddress2']; ?>
            <?php echo $data['cntShipCity']; ?>, <?php echo $data['cntShipState']; ?>. <?php echo $data['cntShipZip']; ?>
        </td>

    </tr>

    <tr>
        <td class="profile" >
            <strong>Contact Categories</strong><br/>
            <?php
            foreach ($categories as $value)
            {
               echo ($value['ccatName']).'<br />';
            }
            ?>
        </td>
        <td class="profile" >
            <strong>Services Provided</strong><br/>
            <?php
            foreach ($services as $value)
            {
                echo ($value['cservName']).'<br />';
            }
            ?>
        </td>

    </tr>


</table>


</body>
</html>
