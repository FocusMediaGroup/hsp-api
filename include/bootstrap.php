<?php

/*
 * The following content was designed & implemented under AlexSeif.com
 */
const DEBUG = true;

require_once 'config/appConfig.php';
require_once 'loader.php';

if (DEBUG) {
  echo "<pre>";
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
} else {
  ini_set('display_errors', '0');
  ob_start();
}

session_start();



$App = new App();
$Controller = new Controller();
if (!file_exists("data/reservations.json") || !file_exists("data/resources.json")) {
  $Controller->cronAction(null);
}
$strResources = null;
if (file_exists('data/resources.json')) {
  $strResources = file_get_contents('data/resources.json');
}
$resources = json_decode($strResources, true); // decode the JSON into an associative array

$strReservations = null;
if (file_exists('data/reservations.json')) {
  $strReservations = file_get_contents('data/reservations.json');
}
$reservations = json_decode($strReservations, true); // decode the JSON into an associative array
// TODO: move this to data or config, preferably config
$buildings = array(
  1 => "Jameel",
  2 => "Falaki",
  3 => "Walace",
  4 => "Greek",
  5 => "Library"
);

extract($Controller->run($App->getPath(), $App->getArg()));

/**
 * Template parts
 */
$scripts = array(
  "js/jquery.js",
  "assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js",
  "js/jquery.fittext.js",
  "js/moment.min.js",
  "js/bootstrap.min.js",
  "assets/plugins/Keyboard-master/js/jquery.keyboard.js",
  "assets/plugins/Keyboard-master/js/jquery.mousewheel.js",
  "assets/plugins/Keyboard-master/js/jquery.keyboard.extension-typing.js",
  "assets/plugins/Keyboard-master/js/jquery.keyboard.extension-autocomplete.js",
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
  die('No such template');
}

ob_flush();
