<?php
if (is_array($reservations) && count($reservations)) {
  ?>
  <div class="section page show appear flow row">
    <?php
    foreach ($reservations as $reservation) {
      include 'reservation.html.php';
    }
    ?>
  </div>
<?php } else {
  ?>
  <div class="text-center text-white">
    <h1>No results found</h1>
  </div>
<?php }
?>
