<?php

require_once 'include/bootstrap.php';

$roomName = str_replace("_", " ", key($_GET));
$htmlTitle = $roomName;

$currentReservations = $Reservations->getCurrentReservationByRoom($roomName);

include_once 'room_1.html.php';
