<?php
include_once 'head.html.php';
include_once 'header.html.php';
?>
<style>
  #content{
    top: 100px;
    position: relative;
  }
</style>
<div class="container-fluid" id='content'>
  <h1 class="text-center text-white">Today's Events</h1>

  <!-- Page Content -->
  <button id="basic-demo" class="waves-effect waves-button waves-light">Basic Demo</button>
  <?php // include_once 'sample_reservation.html.php';?>
  <?php
  if (is_array($reservations)) {
    ?>
    <div id="example" class="section page show appear flow row">
      <?php
      foreach ($reservations as $reservation) {
        include 'reservation.html.php';
      }
      ?>
    </div>
    <?php
  } else {
    include_once 'ad.html.php';
  }
  ?>
  <div class="list-group" id="content">

  </div>
</div>
<!-- /.container-fluid -->
<?php include_once 'footer.html.php'; ?>
