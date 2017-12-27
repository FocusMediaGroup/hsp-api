<?php
foreach($_GET as $key=>$val)
{
$key1=$key;	
}
 session_start();
 include('include/bookedapi.php'); 
            $username = 'api';
            $password = 'api$';
            $bookedapiclient = new bookedapiclient($username, $password);
            $bookedapiclient-> authenticate(true);

            //the next call will get all reservations for the current user or all of them if that user is the admin
            $getResource = $bookedapiclient->getReservation('583405fc0e9b3580989146');
			
			echo '<pre>';
			print_r($getResource);
            //print the result to the screen
     

	
$dt = new DateTime();
$currdate=$dt->format('Y-m-d');
foreach($getResource['reservations'] as $key=>$val)
{
	
	$date = new DateTime($val['startDate']);
	$edate = new DateTime($val['endDate']);
    $stdate= $date->format('Y-m-d');
    $etdate= $edate->format('Y-m-d');
	if($val['resourceName']==$key1 && ($currdate >= $stdate && $currdate >= $etdate ))
	{
	$newkey[]=$val;
	}
}



$scheduleId=$newdata['scheduleId'];

 $resourceId=$newdata['resourceId'];
$referenceNumber='';
$userId=0;
$startDateTime=0;
$endDateTime=0;

$getReservation = $bookedapiclient->getReservation();




			?>