<?php
if (is_array($reservations)) {
  ?>
  <div class="section page show appear flow row">
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
