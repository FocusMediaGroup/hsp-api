<div class="event-container col-md-10 col-md-push-1" data-id="<?php print_r($reservation['referenceNumber']); ?>">
  <div class="left-col">
    <button class="btn <?php print_r(strtolower($reservation['building'])); ?> btn-block"><strong>
        <!--Jameel-->
        <?php print_r($reservation['building']); ?>
      </strong>
    </button>
  </div>
  <div id="box-button" class="box middle-col">
    <a href="room?<?php print_r($reservation['resourceName']); ?>">
      <h2>
        <?php print_r($reservation['title']); ?>
        <small class="pull-right">
          <?php print_r($reservation['start']); ?> - 
          <?php print_r($reservation['end']); ?>
        </small>
      </h2>
    </a>
    <div class="colored-button pull-left">
      <button class="btn"><strong>Room</strong>
        <?php print_r($reservation['resourceName']); ?></button>
      <button class="btn"><strong>Floor</strong>
        <?php print_r($reservation['floorTitle']); ?></button>
    </div>
    <div class="pull-right">
      <?php //print_r($reservation['arrowDirection']); ?>
      <?php print_r($reservation['description']); ?>
    </div>
  </div>
  <div class="right-col">
    <img src="<?php echo $reservation['image'] ?>"
         class="img-responsive" alt="<?php echo $reservation['title']; ?>" />
  </div>
</div>