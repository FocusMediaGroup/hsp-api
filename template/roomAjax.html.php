<?php
if (is_array($reservations)) {
  ?>
  <div class="section page show appear flow row">
    <?php
    foreach ($reservations as $reservation) {
      ?>
      <div class="event-container col-md-9 col-md-push-1" data-id="<?php print_r($reservation['referenceNumber']); ?>">
        <div class="left-col">
          <button class="btn red btn-block"><strong>Jameel</strong>
            <?php //print_r($reservation['floorTitle']);        ?>
          </button>
        </div>
        <div id="box-button" class="box middle-col">
          <h2>
            <?php print_r($reservation['title']); ?>
            <small class="pull-right">
              <?php print_r($reservation['start']); ?> - 
              <?php print_r($reservation['end']); ?>
            </small>
          </h2>
          <div>
            <?php //print_r($reservation['arrowDirection']); ?>
            <?php print_r($reservation['description']); ?>
          </div>
          <div class="colored-button">
            <button class="btn"><strong>Room</strong>
              <?php print_r($reservation['resourceName']); ?></button><br/>
            <button class="btn"><strong>Floor</strong>
              Floor <?php //print_r($reservation['floorTitle']);                   ?></button>
          </div>
        </div>
        <div class="right-col">
          <img src="<?php echo $reservation['image'] ?>"
               class="img-responsive" alt="<?php echo $reservation['title']; ?>" />
        </div>
      </div>
    <?php }
    ?>
  </div>
  <?php
} else {
  include_once 'ad.html.php';
}
?>
