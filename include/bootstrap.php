<?php

/*
 * The following content was designed & implemented under AlexSeif.com
 */


if (DEBUG) {
  echo "<pre>";
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
} else {
  ob_start();
}

require_once 'config/appConfig.php';
require_once 'loader.php';
session_start();



$App = new App();
$Controller = new Controller();
if (!file_exists("data/reservations.json") || !file_exists("data/resources.json")) {
  $Controller->cronAction();
}

$strResources = file_get_contents('data/resources.json');
$resources = json_decode($strResources, true); // decode the JSON into an associative array

$strReservations = file_get_contents('data/reservations.json');
$reservations = json_decode($strReservations, true); // decode the JSON into an associative array

extract($Controller->run($App->getPath(), $App->getArg()));

/**
 * Template parts
 */
$scripts = array(
  "js/jquery.js",
  "js/jquery.fittext.js",
  "js/moment.min.js",
  "js/bootstrap.min.js",
  "assets/plugins/jquery.virtual_keyboard/jquery.virtual_keyboard.js",
  "assets/plugins/waves/waves.min.js",
  "assets/plugins/snarl/snarl.min.js",
  "js/app.js"
);
$template = 'template/' . $App->getPath() . '.html.php';

if (DEBUG) {
  echo "</pre>";
} else {
  ob_clean();
}

if (file_exists($template)) {
  include_once $template;
} else {
  echo 'No such template';
}

ob_flush();
