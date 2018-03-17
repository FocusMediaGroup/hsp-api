<?php include_once 'template/head.html.php'; ?>
<header>
  <div class="container-fluid">
    <h1 class=" pull-left text-uppercase"><?php echo $roomName; ?></h1>
    <h1 class=" pull-right"><image src='images/Sofitel Hotel Logo 150.png'></h1>
  </div>
</header>
<div class="container-fluid" id="content">  
  <?php if (is_array($currentReservations)) {
    ?>
    <div class="mid-section">
      <h2 class="text-center fit-text"><?php echo $currentReservations['0']['title']; ?></h2>
      <div class="text-center pad10">
        <?php
        if (file_exists('./images/logos/' . $currentReservations['0']['title'] . '.png')) {
          echo "<image class='img-responsive center-block' style=' height:200px;' src='images/logos/" . $currentReservations['0']['title'] . '.png' . "' />";
        }
        ?>
      </div>
      <h3 class="text-center fit-text"><?php echo $currentReservations['0']['description']; ?></h3>
      <?php
      foreach ($currentReservations as $reservation) {
        ?>
        <div class="meeting-time">
          <h3 class="text-center fit-text"><?php echo $reservation['startDate']->format(TIME_FORMAT); ?> To <?php echo $reservation['endDate']->format(TIME_FORMAT); ?></h3>
        </div>
        <?php
      }
    } else {
      include_once 'ad.html.php';
    }
    ?>
  </div>
</div>
<!-- /.container-fluid -->
<?php include_once 'template/footer.html.php'; ?>
