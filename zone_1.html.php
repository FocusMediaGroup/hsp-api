<?php include_once 'template/head.html.php'; ?>
<header>
  <h1 class="title text-center"><img src='images/Sofitel Hotel Logo 150.png'></h1>
  <h2 class="text-center text-uppercase">Today's Event - <?php echo $floor_title; ?></h2>
</header>
<!-- Page Content -->
<div class="container">

  <?php
  if (is_array($currentReservations)) {
    $height = floor(65 / count($currentReservations))/2;
    ?>
    <style>
      .table > tbody > tr > td {
        height: <?php echo (15 > $height) ? $height : 15; ?>vh;
      }
    </style>
    <div class="table-holder">
      <div class="table-div">
        <table class="table">
          <tbody>
            <?php
            foreach ($currentReservations as $reservation) {
              ?>
              <tr> 
                <td class="col-md-1 tbl-logo-bg" rowspan="2"> 
                  <?php if ("left" == $reservation['arrowDirection']) { ?>
                    <span class="glyphicon glyphicon-circle-arrow-left"></span>
                  <?php } ?>
                </td>
                <td class="col-md-4 tbl-title-bg fit-text" rowspan="2">
                  <?php echo $reservation['title']; ?>
                </td>
                <td class="col-md-1 tbl-logo-bg" rowspan="2">
                  <?php
                  if (file_exists('./images/logos/' . $reservation['title'] . '.png')) {
                    ?>
                    <img class='text-center' src='images/logos/<?php echo $reservation['title'] . '.png'; ?>' />
                    <?php
                  }
                  ?>
                </td>
                <td class="col-md-4 tbl-title-bg fit-text split-cell">
                  <?php echo $reservation['description']; ?>
                </td>
                <td class="col-md-1 tbl-logo-bg" rowspan="2"> 
                  <?php if ("right" == $reservation['arrowDirection']) { ?>
                    <span class="glyphicon glyphicon-circle-arrow-right"></span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td class="fit-text tbl-title-md text-uppercase">
                  <!--Room name-->
                  <?php echo $reservation['resourceName']; ?>
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
        <style>
          .table > tbody > tr > td {
            height: <?php echo $height; ?>vh;
          }
        </style>
      </div>
    </div>
    <?php
  } else {
    include_once 'ad.html.php';
  }
  ?>

</div>

<!-- /.container -->
<?php include_once 'template/footer.html.php'; ?>
