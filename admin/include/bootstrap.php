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



$AdminApp = new AdminApp();
$AdminController = new AdminController();
if (!file_exists("data/appConfig.json")) {
//  $AdminController->generateConfigAction(null);
}

extract($AdminController->run($AdminApp->getPath(), $AdminApp->getArg()));

/**
 * Template parts
 */
$scripts = array(
  "js/jquery.js",
  "assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js",
  "js/bootstrap.min.js",
  "js/adminapp.js"
);
$template = 'template/' . $AdminApp->getPath() . '.html.php';

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
