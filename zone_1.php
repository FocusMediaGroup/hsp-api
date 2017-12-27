<?php

$current_floor = '0';
$floor_title = 'Ground Floor';
if (isset($_GET['floor']))
  $current_floor = $_GET['floor'];

foreach ($_GET as $key => $val) {
  $key1 = $key;
}
session_start();
include('include/bookedapi.php');
$username = 'api';
$password = 'api$';
$bookedapiclient = new bookedapiclient($username, $password);
//$bookedapiclient->authenticate(true);
//the next call will get all reservations for the current user or all of them if that user is the admin
$getResource = $bookedapiclient->getReservation();
//echo '<pre>';	
//var_dump($getResource);
//exit;
//print the result to the screen
$all_getResources = $bookedapiclient->getResource();
$resource_data = [];

if (is_array($all_getResources)) {
  foreach ($all_getResources as $resource_arr) {
    $floor = 0;
    if (is_array($resource_arr)) {
      foreach ($resource_arr as $resource_1) {
        $tmp_arr = [];
        //echo '<pre>'; print_r($resource_1['customAttributes']);exit; 
        foreach ($resource_1['customAttributes'] as $custom_attr) {
          if ($custom_attr['label'] == 'Can be reach by Elevator on what floor ?') {
            array_push($tmp_arr, $custom_attr['value']);
            $floor = $custom_attr['value'];
          }
          if ($custom_attr['label'] == 'Floor') {
            $floor_title_r = $custom_attr['value'];
          }
          if ($custom_attr['id'] == 9) {
            array_push($tmp_arr, str_replace('http://localhost/api', '.', $custom_attr['value']));
          }
          if ($custom_attr['id'] == 10) {
            array_push($tmp_arr, str_replace('http://localhost/api', '.', $custom_attr['value']));
          }
        }
        if ($floor == $current_floor)
          $floor_title = $floor_title_r;
        array_push($tmp_arr, $floor);
        $resource_data[$resource_1['resourceId']] = $tmp_arr;
      }
    }
  }
}


$dt = new DateTime();
$currdate = $dt->format('Y-m-d');
if (is_array($getResource['reservations'])) {
  foreach ($getResource['reservations'] as $key => $val) {

    $date = new DateTime($val['startDate']);
    $edate = new DateTime($val['endDate']);
    $stdate = $date->format('Y-m-d');
    $etdate = $edate->format('Y-m-d');
    if ($currdate >= $stdate && $currdate >= $etdate) {
      $reservations[] = $val;
//      $newkey[]=$val['referenceNumber'];
    }
  }
}

//$getResource1 = $bookedapiclient->getReservation('584140fcd0967883697882');
//echo '<pre>';
//print_r($getResource1);
//exit;
// $getResource2 = $bookedapiclient->getResource(8);
//echo '<pre>';
//print_r($getResource2);



$scheduleId = $newdata['scheduleId'];

$resourceId = $newdata['resourceId'];
$referenceNumber = '';
$userId = 0;
$startDateTime = 0;
$endDateTime = 0;

include_once 'zone_1.html.php';
