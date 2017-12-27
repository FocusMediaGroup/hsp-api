<?php

require_once 'include/bootstrap.php';
$roomName = str_replace("_", " ", key($_GET));
$htmlTitle = "Summary";
$currentReservations = $Reservations->getCurrentReservations();
//the next call will get all reservations for the current user or all of them if that user is the admin




//$all_getResources = $Reservations->getApiClient()->getResource();
//$resource_data = [];
//
//if (is_array($all_getResources)) {
//  foreach ($all_getResources as $resource_arr) {
//    $floor = 0;
//    if (is_array($resource_arr)) {
//      foreach ($resource_arr as $resource_1) {
//        $tmp_arr = [];
//        //echo '<pre>'; print_r($resource_1['customAttributes']);exit; 
//        foreach ($resource_1['customAttributes'] as $custom_attr) {
//          if ($custom_attr['label'] == 'Can be reach by Elevator on what floor ?') {
//            array_push($tmp_arr, $custom_attr['value']);
//            $floor = $custom_attr['value'];
//          }
//          if ($custom_attr['label'] == 'Floor') {
//            $floor_title_r = $custom_attr['value'];
//          }
//          if ($custom_attr['id'] == 9) {
//            array_push($tmp_arr, str_replace('http://localhost/api', '.', $custom_attr['value']));
//          }
//          if ($custom_attr['id'] == 10) {
//            array_push($tmp_arr, str_replace('http://localhost/api', '.', $custom_attr['value']));
//          }
//        }
////        if ($floor == $current_floor) {
//        $floor_title = $floor_title_r;
////        }
//        array_push($tmp_arr, $floor);
//        $resource_data[$resource_1['resourceId']] = $tmp_arr;
//      }
//    }
//  }
//}

include_once 'summury_1.html.php';
