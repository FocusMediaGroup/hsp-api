<?php
include_once 'head.html.php';
include_once 'header.html.php';
?>
<div class="container-fluid">
  <h2 class="text-center">Today's Events</h2>
  <!-- Page Content -->
  <div class="list-group" id="content">
  </div>
  <?php
  if (is_array($reservations)) {
    $height = floor(65 / count($reservations)) / 2;
    ?>
    <ul class="list-group">
      <?php
      foreach ($reservations as $reservation) {
        ?>
        <li class="list-group-item list-group-item-info">
          <div class="row">
            <?php if (file_exists('./images/logos/' . $reservation['title'] . '.png')) { ?>
              <div class="col-md-3">
                <img class='img-thumbnail img-responsive' src='images/logos/<?php echo $reservation['title'] ?>.png'/>
              </div>
              <?php
            }
            ?>
            <div class="col-md-8">
              <strong><?php echo $reservation['title']; ?></strong>
            </div>
            <div class="col-md-8">
              <!-- Room name -->
              <!--<div style="border-bottom:2px solid #3fa63b;height: 50%" class="text-uppercase">-->
              <?php echo $reservation['resourceName']; ?>
            </div>
            <div class="col-md-8">
              <!-- Event name -->
              <?php echo $reservation['description']; ?>
            </div>
            <div class="col-md-8">
              <!-- Floor Title -->
              <?php echo $reservation['floorTitle']; ?>
            </div>
            <div class="col-md-1">
              <span class="glyphicon glyphicon-circle-arrow-<?php echo $reservation['arrowDirection']; ?>"></span>
            </div>
          </div>
        </li>
      <?php }
      ?>
    </ul>
    <?php
  } else {
    include_once 'ad.html.php';
  }
  ?>
</div>
<!-- /.container-fluid -->
<?php include_once 'footer.html.php'; ?>
