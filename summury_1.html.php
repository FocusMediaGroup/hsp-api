<?php include_once 'template/head.html.php'; ?>
<header>
  <div class="container">
    <h1 class="text-center"><img src='images/Sofitel Hotel Logo 150.png'/></h1>
    <h2 class="text-center">Today's Events</h2>
  </div>
</header>
<div class="container-fluid">
  <?php
  if (is_array($currentReservations)) {
    $height = floor(65 / count($currentReservations)) / 2;
    ?>
    <style>
      .table > tbody > tr > td {
        height: <?php echo (15 > $height) ? $height : 15; ?>vh;
      }
    </style>
    <!-- Page Content -->
    <div class="table-holder">
      <div class="table-div">
        <table class="table">
          <tbody>
            <?php
            foreach ($currentReservations as $reservation) {
              ?>
              <tr>
                <td class="col-md-1 tbl-logo-bg" rowspan="2"> 
                  <span class="glyphicon glyphicon-circle-arrow-<?php echo $reservation['arrowDirection']; ?>"></span>
                </td>
                <td class="col-md-4 tbl-title-bg text-uppercase fit-text split-cell">
                  <strong><?php echo $reservation['title']; ?></strong>
                </td>
                <td class="col-md-1 tbl-logo-bg fit-text" rowspan="2">
                  <?php if (file_exists('./images/logos/' . $reservation['title'] . '.png')) { ?>
                    <img class='text-center' src='images/logos/<?php echo $reservation['title'] ?>.png'/>
                    <?php
                  }
                  ?>
                </td>
                <td class="col-md-2 tbl-title-bg fit-text split-cell">
                  <!-- Room name -->
                  <!--<div style="border-bottom:2px solid #3fa63b;height: 50%" class="text-uppercase">-->
                  <?php echo $reservation['resourceName']; ?>
                  <!--</div>-->
                  <!--<div style="height: 50%"></div>-->
                </td>
                <td class="col-md-1 tbl-logo-bg" rowspan="2">
                </td>
              </tr>
              <tr>
                <td class="col-md-4 tbl-title-md fit-text">
                  <!-- Event name -->
                  <?php echo $reservation['description']; ?>
                </td>
                <td class="col-md-4 tbl-title-md fit-text">
                  <!-- Floor Title -->
                  <?php echo $reservation['floorTitle']; ?>
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
    include_once 'ad.html.php';
  }
  ?>
</div>
<!-- /.container-fluid -->
<?php include_once 'template/footer.html.php'; ?>