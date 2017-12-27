<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LUXOR</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/zone_1.css" rel="stylesheet" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body style="background-color:#48a743">

    <!-- Page Content -->
    <div class="container-fluid">

      <div class="row">
        <div class="col-xs-12" style='text-align:center;'> 
          <h1 class="gold title"><image src='images/Sofitel Hotel Logo 150.png'></h1>
          <!--h3 class="gold sub-title"> LUXURY HOTEL</h3-->
        </div> 
      </div>
      <div class="row">
        <div class="col-xs-12" style='text-align:center;'>
          <h2 style='color:white;font-weight:600' class="text-center">Today's Event - <span style='font-weight:500'><?php echo $floor_title; ?></span></h2>
        </div>
      </div>
      <div class="row">
        <table class="table">
          <tbody>
            <?php
            if (is_array($reservations)) {
              foreach ($reservations as $reservation) {
                $getResource1 = $bookedapiclient->getReservation($reservation['referenceNumber']);
                $resource_id = $getResource1['resourceId'];
                if ($resource_data[$resource_id][0] != $current_floor)
                  continue;
                ?>
                <tr> 
                  <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 heig" style="background-color:#666666;" rowspan="2"> 
                    <image class='img-responsive center-block' style='min-width:35%; width:35%' src='<?php echo $resource_data[$resource_id][1]; ?>' />
                  </td>

                  <td class="col-lg-3 col-md-3 col-sm-3 col-xs-4 heig" style="background-color:#026900;" rowspan="2">
                    <?php echo $getResource1['title']; ?>
                  </td>
                  <td class="col-lg-1 col-md-1 col-sm-1 col-xs-2 heig" style="background-color:#666666; width: 4.333333% !important;" rowspan="2">
                    <?php
                    if (file_exists('./images/logos/' . $getResource1['title'] . '.png')) {
                      ?>
                      <image class='img-responsive center-block' style='min-width:85%; width:95%' src='images/logos/<?php echo $getResource1['title'] . '.png'; ?>' />
                      <?php
                    }
                    ?>
                  </td>
                  <td class="col-lg-2 col-md-2 col-sm-3 col-xs-4 heig" style="background-color:#026900; padding: 0; border-bottom:0px solid #3fa63b; border-top : 2px solid #3fa63b !important;">
                    <div style="border-bottom:2px solid #3fa63b;height: 25%"><?php echo $reservation['description']; ?></div>
                  </td>
                  <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 heig" style="background-color:#666666;" rowspan="2"> 
                    <image class='img-responsive center-block' style='min-width:35%; width:35%' src='<?php echo $resource_data[$resource_id][2]; ?>' />
                  </td>
                </tr>
                <tr>
                  <td class="col-lg-2 col-md-2 col-sm-3 col-xs-4 heig" style="background-color:#026900; padding: 0; border-bottom:0px solid #3fa63b;">
                    <div style="height: 25%"><?php echo $getResource1['resources'][$resource_id]['name'] ?></div>
                  </td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>    
    </div>

    <!-- /.container -->
    <footer class="footer">
      <div class="container-fluid">
        <h5 class=" pull-left"><?php echo date('h:i'); ?></h5>
        <h5 class=" pull-right"><?php echo date("l, jS F Y"); ?></h5>
      </div>
    </footer>
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
  <!-- Mirrored from dev1.fmgegypt.net/api/summury by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 18:46:16 GMT -->
</html>
