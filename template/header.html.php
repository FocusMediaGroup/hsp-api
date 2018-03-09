<header>
  <div class="container-fluid">
    <h1 class="pull-left"><img src='<?php echo $config['logo']; ?>' height="100px"/></h1>
    <div class="pull-right">
      <div id="fs-time-date" class="fs-resize">
        <div class="fs-time">
          <span id="fshrmin"><?php echo date(TIME_FORMAT); ?></span>
          <span id="fssec"><?php echo date('s'); ?></span>
          <span id="fsampm"></span>
        </div>
        <span id="fsdate" class="fs-date"><?php echo date(DATE_FORMAT); ?></span>
      </div>
    </div>
  </div>
</header>