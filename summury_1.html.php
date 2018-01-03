<?php include_once 'template/head.html.php'; ?>
<!-- Page Content -->
<div class="container">
  <h1 class="text-center"><img src='images/Sofitel Hotel Logo 150.png'/></h1>
  <?php
  if (is_array($currentReservations)) {
    $height = floor(65 / count($currentReservations));
    ?>
    <style>
      .table > tbody > tr > td {
        height: <?php echo $height; ?>vh;
      }
    </style>
    <h2 class="text-center">Today's Events</h2>
    <div class="table-holder">
      <div class="table-div">
        <table class="table">
          <tbody>
            <?php
            foreach ($currentReservations as $reservation) {
              ?>
              <tr>
                <td class="col-md-1 tbl-logo-bg"> 
                  <?php if (!in_array($reservation['arrowDirection'], array('right', 'down'))) { ?>
                    <span class="glyphicon glyphicon-circle-arrow-<?php echo $reservation['arrowDirection']; ?>"></span>
                  <?php } ?>
                  <?php if (in_array($reservation['arrowDirection'], array('right', 'down'))) { ?>
                    <span class="glyphicon glyphicon-circle-arrow-<?php echo $reservation['arrowDirection']; ?>"></span>
                  <?php } ?>
                </td>
                <td class="col-md-4 tbl-title-bg">
                  <strong><?php echo $reservation['title']; ?></strong>
                </td>
                <td class="col-md-1 tbl-logo-bg">
                  <?php if (file_exists('./images/logos/' . $reservation['title'] . '.png')) { ?>
                    <img class='text-center' src='images/logos/<?php echo $reservation['title'] ?>.png'/>
                    <?php
                  }
                  ?>
                </td>
                <td class="col-md-4 tbl-title-bg">
                  <div style="border-bottom:2px solid #3fa63b;height: 50%"><?php echo $reservation['resourceName']; ?></div>
                  <div style="height: 50%"><?php echo $reservation['description'] ?></div>
                </td>
                <td class="col-md-1 tbl-logo-bg">
                </td>

              </tr>
            <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php
  } else {
    include_once 'room_ad.html.php';
  }
  ?>

</div>
<!-- /.container-fluid -->
<?php include_once 'template/footer.html.php'; ?>