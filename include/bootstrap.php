<?php

/*
 * The following content was designed & implemented under AlexSeif.com
 */
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

ob_start();
require_once 'config/appConfig.php';
require_once 'loader.php';
session_start();


//echo "<pre>";
$App = new App();
$Controller = new Controller();
extract($Controller->run($App->getPath(), $App->getArg()));

$template = 'template/' . $App->getPath() . '.html.php';
//echo "</pre>";
ob_clean();

if (file_exists($template)) {
  include_once $template;
} else {
  echo 'No such template';
}



ob_flush();
