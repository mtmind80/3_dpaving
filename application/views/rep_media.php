
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
    <br/>
 <table width="630" cellpadding="6" cellspacing="6">
     <tr>
         <?php
         $nc = 0;
         foreach($images as $i)
         {

          if($nc == 1)
          {
              echo '</tr><tr>';
              $nc = 0;
          }
             $nc++;

             ?>

         <td >

             <img src="./media/projects/<?php echo $i['jobmdFileName'];?>" border="0"
                  <?php if($i['jobmdImageWidth'] > $i['jobmdImageHeight'])
                  {
                  ?>
             width ='650'
                   <?php
             }
             else
             {
                 ?>
                 height ='650'

                <?php
             }
                  ?>

                  alt="<?php echo $i['jobmdDescription'];?>" />
             <br/><br/>
             <span style="font-size:14px;width:650px;"><?php echo wordwrap($i['jobmdDescription'], 70, "<br />\n");?></span>
         </td>
        <?php
         }
         ?>
     </tr>
 </table>
</center>

</div>
</body>
</html>
