<div class="event-container col-md-8 col-md-push-2" data-id="<?php print_r($reservation['referenceNumber']); ?>">
  <div class="left-col">
    <?php if (file_exists('./images/logos/' . $reservation['title'] . '.png')) { ?>
      <img src="images/logos/<?php echo $reservation['title'] ?>.png"
           class="img-responsive" alt="<?php echo $reservation['title']; ?>" />
         <?php } ?>
  </div>
  <div id="box-button" class="box middle-col">
    <h2>
      <?php print_r($reservation['title']); ?>
      <small class="pull-right">
        <?php print_r($reservation['start']); ?> - 
        <?php print_r($reservation['end']); ?>
      </small>
    </h2>
    <div class="colored-button text-center">
      <button class="btn"><strong>Room</strong>
        <?php print_r($reservation['resourceName']); ?></button>
      <button class="btn"><strong>Floor</strong>
        Floor <?php //print_r($reservation['floorTitle']);   ?></button>
      <button class="btn red"><strong>Building</strong> 
        Building<?php //print_r($reservation['floorTitle']);   ?></button>
    </div>
    <div class="text-center">
      <?php //print_r($reservation['arrowDirection']); ?>
    </div>
  </div>
  <div class="right-col">
      <?php print_r($reservation['description']); ?>
    
  </div>
</div>