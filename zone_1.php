<?php

require_once 'include/bootstrap.php';

$current_floor = '0';
$floor_title = 'Ground Floor';

if (isset($_GET['floor'])) {
  $current_floor = $_GET['floor'];
}



$currentReservations = $Reservations->getCurrentReservationsByFloor($current_floor);
$floor_title = $htmlTitle = $Reservations->getFloorTitle();

include_once 'zone_1.html.php';
