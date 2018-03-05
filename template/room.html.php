<?php
include_once 'head.html.php';
include_once 'header.html.php';
?>
<div class="container-fluid" id="content">  
  <h1 class=" pull-left text-uppercase"><?php echo $roomName; ?></h1>
  <?php
  if (is_array($reservations)) {
    ?>
    <div class="mid-section">
      <h2 class="text-center fit-text"><?php echo $reservations['0']['title']; ?></h2>
      <div class="text-center pad10">
        <?php
        if (file_exists('./images/logos/' . $reservations['0']['title'] . '.png')) {
          echo "<image class='img-responsive center-block' style=' height:200px;' src='images/logos/" . $reservations['0']['title'] . '.png' . "' />";
        }
        ?>
      </div>
      <h3 class="text-center fit-text"><?php echo $reservations['0']['description']; ?></h3>
      <?php
      foreach ($reservations as $reservation) {
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
<?php include_once 'footer.html.php'; ?>
