<?php

require_once 'include/bootstrap.php';
$roomName = str_replace("_", " ", key($_GET));
$htmlTitle = "Summary";
$currentReservations = $Reservations->getCurrentReservations();

include_once 'summury_1.html.php';
